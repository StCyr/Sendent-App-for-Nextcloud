import './filelist.scss';
import { generateRemoteUrl, generateUrl } from '@nextcloud/router';
import axios from '@nextcloud/axios';
import sanitizeHtml from 'sanitize-html';

const FOOTER_NAME = '.SECUREMAIL.html';
const CONTENT_ID = '#sendent-content';

const SANITIZE_OPTIONS = {
    allowedTags: sanitizeHtml.defaults.allowedTags.concat(['img', 'html', 'head', 'body', 'meta', 'style']),
    allowedAttributes: {
        ...sanitizeHtml.defaults.allowedAttributes,
        '*': ['class'],
        img: ['src', 'width', 'height', 'style', 'id'],
        html: ['xmlns*'],
        meta: ['name', 'content'],
    },
    allowedSchemes: ['data'],
    allowedSchemesByTag: {
        a: ['http', 'https', 'mailto', 'tel'],
    }
};

type NextcloudFile = {
    id: number
    name: string
    path: string
    size: number
    type: 'dir' | 'file'
}

type NextcloudFileList = {
    $el: JQuery<HTMLElement>
    $fileList: JQuery<HTMLElement>
    files: NextcloudFile[]
}

class FooterFile {
    constructor(private fileList: NextcloudFileList, private file: NextcloudFile) {

    }

    public async appendBelowFiles(): Promise<void> {
        $(CONTENT_ID).remove();

        const containerElement = $('<div>');
        containerElement.attr('id', 'sendent-content');
        containerElement.insertAfter(this.fileList.$el);

        const loadingElement = $('<span>').addClass('icon-loading');
        loadingElement.appendTo(containerElement);

        let content = await this.getFileContent();
        content = sanitizeHtml(content, SANITIZE_OPTIONS);

        const iframeElement = this.generateIframeElement(content);
        containerElement.empty().append(iframeElement);
    }

    private async getFileContent(): Promise<string> {
        const path = this.getFilePath();
        const response = await axios.get(path);

        return response.data;
    }

    private getFilePath(): string {
        const path = encodeURI(this.file.path);
        const name = encodeURIComponent(this.file.name);

        if (OCA.Sharing?.PublicApp) {
            const token = $('#sharingToken').val();

            return generateUrl('/s/{token}/download?path={path}&files={name}',
                {
                    token,
                    path,
                    name,
                }
            );
        }

        return generateRemoteUrl(`files${path}/${name}`);
    }

    private generateIframeElement(content: string) {
        const iframeElement = $<HTMLFrameElement>('<iframe>');
        iframeElement.width(0);
        iframeElement.height(0);
        iframeElement.on('load', () => {
            const innerHeight = iframeElement.get(0).contentDocument?.documentElement?.scrollHeight;
            const innerWidth = iframeElement.get(0).contentDocument?.documentElement?.scrollWidth;

            innerHeight && iframeElement.height(innerHeight);
            innerWidth && iframeElement.width(innerWidth);
        });
        iframeElement.attr('srcdoc', content);

        return iframeElement
    }
}

class FileList {
    constructor(private fileList: NextcloudFileList) {

    }

    public getFooterFile(): FooterFile | undefined {
        for (const file of this.fileList.files) {
            if (file.type === 'file' && file.name === FOOTER_NAME) {
                return new FooterFile(this.fileList, file);
            }
        }
    }
}

function onFileListUpdated() {
    const fileList = new FileList(OCA.Files?.App?.fileList || OCA.Sharing?.PublicApp?.fileList);

    fileList.getFooterFile()?.appendBelowFiles();
}

function onDirectoryChanged() {
    $(CONTENT_ID).remove();
}

function addFooterWatcher() {
    if (!OCA?.Files?.App && !OCA?.Sharing?.PublicApp) {
        console.warn('[sendent] "OCA.Files.App" not available');

        return;
    }

    const fileList = OCA?.Files?.App?.fileList || OCA?.Sharing?.PublicApp?.fileList;

    if (!fileList?.$fileList) {
        setTimeout(() => addFooterWatcher(), 500);
        return;
    }

    fileList.$fileList.on('updated', onFileListUpdated);
    fileList?.$el.on('changeDirectory', onDirectoryChanged);

    onFileListUpdated();
}

if (document.readyState === 'complete') {
    addFooterWatcher();
} else {
    document.addEventListener('DOMContentLoaded', addFooterWatcher);
}
