/* eslint-disable @nextcloud/no-deprecations */
import { translate as t } from '@nextcloud/l10n'
import tinymce from 'tinymce';

/* Default icons are required for TinyMCE 5.3 or above */
import 'tinymce/icons/default';

/* A theme is also required */
import 'tinymce/themes/silver';

/* Import the skin */
import 'tinymce/skins/ui/oxide/skin.css';

import 'tinymce/plugins/code';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/table';
import 'tinymce/plugins/fullpage';
import 'tinymce/plugins/image';
import 'tinymce/plugins/save';

/* Import content css */
import 'tinymce/skins/ui/oxide/content.css';

const tags = {
    URL: t('sendent', 'URL'),
    PASSWORD: t('sendent', 'Password'),
    EXPIRATIONDATE: t('sendent', 'Expiration date'),
    RECIPIENTS: t('sendent', 'Recipients'),
    FROM: t('sendent', 'From'),
    SUBJECT: t('sendent', 'Subject'),
    FILES: t('sendent', 'Files'),
    CURRENTDATE: t('sendent', 'Current date'),
    CURRENTTIME: t('sendent', 'Current time'),
}

export default class TemplateEditor {
    constructor(private element: HTMLTextAreaElement) {
        this.init();
    }

    private init() {
        const element = this.element;

        tinymce.init({
            skin: false,
            target: element,
            height: 600,
            width: 700,
            resize: 'both',
            plugins: 'code fullpage link lists table image save',
            menubar: 'edit view format tools table',
            toolbar: 'save | undo redo | styleselect | bold italic | link image | sendentTags',
            setup: function (editor) {
                editor.ui.registry.addMenuButton('sendentTags', {
                    text: t('sendent', 'Tags'),
                    fetch: function (callback) {
                        const items = Object.keys(tags).map(variable => {
                            return {
                                type: 'menuitem' as any,
                                text: tags[variable],
                                onAction: function () {
                                    editor.insertContent(`{${variable}}`);
                                }
                            }
                        });

                        callback(items);
                    },
                });
            },
            save_onsavecallback: function () {
                this.save();

                $(element).trigger('change');
            },
        })
    }
}
