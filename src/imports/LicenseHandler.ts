/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';
import { translate as t } from '@nextcloud/l10n'

type LicenseStatus = {
    status: string
    statusKind: string,
    dateExpiration: string,
    email: string,
    level: string,
    licensekey: string,
    dateLastCheck: string,
    LatestVSTOAddinVersion : AppVersionStatus,
	ncgroup: string,
}
type AppVersionStatus = {
    ApplicationName : string
    ApplicationId : string
    Version : string
    UrlBinary: string
    UrlManual: string,
    UrlReleaseNotes : string,
    ReleaseDate: string
}
export default class LicenseHandler {
    private static instance: LicenseHandler;

    private constructor(ncgroup: string) {
        $("#btnLicenseActivation").on('click', {ncgroup}, (ev) => {
            ev.preventDefault();

            const email = $("#licenseEmail").val()?.toString().replace(/\s+/g, '') || '';
            const key = $("#licensekey").val()?.toString().replace(/\s+/g, '') || '';

            this.createLicense(email, key, ev.data.ncgroup);
        });

        $("#btnClearLicense").on('click', {ncgroup}, (ev) => {
            $("#licenseEmail").val('');
            $("#licensekey").val('');
            this.createLicense('', '', ev.data.ncgroup);
        });

        $("#licenseEmail, #licensekey").on('change', () => {
            $("#btnLicenseActivation").val(t("sendent", "Activate license"));
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
        });

        $('#btnSupportButton').on('click', () => {
            (window as any).location = 'mailto:support@sendent.nl';
        });
    }

    public static setup(ncgroup: string): LicenseHandler {
        if (!this.instance) {
            this.instance = new LicenseHandler(ncgroup);

            this.instance.refreshLicenseStatus(ncgroup);
        }

        return this.instance;
    }

    public async createLicense(email: string, key: string, ncgroup: string): Promise<void> {
        this.disableButtons();

        try {
            await this.sendCreationRequest(email, key, ncgroup);
        } catch (err) {
            console.log('Could not create license', err);
        }

        this.enableButtons();

        return this.refreshLicenseStatus(ncgroup);
    }

    public async refreshLicenseStatus(ncgroup: string): Promise<void> {
        this.insertLoadIndicator('#licensestatus, #latestVSTOVersion, #licenselastcheck, #licenseexpires, #licenselevel');
        this.disableButtons();

		console.log('Refreshing license status', ncgroup);
        try {
            const { data: status } = await this.requestStatus(ncgroup);
            const { data: appStatus } = await this.requestApplicationStatus();

            if (status.level !== 'Free' && status.level !== '-' && status.level !== '') {
                $("#btnSupportButton").removeClass("hidden").addClass("shown");
                $("#latestVSTOVersion").text(appStatus.LatestVSTOAddinVersion.Version);
                $("#latestVSTOVersionReleaseDate").text(appStatus.LatestVSTOAddinVersion.ReleaseDate);
                document.getElementById("latestVSTOVersionDownload")?.setAttribute("href", appStatus.LatestVSTOAddinVersion.UrlBinary);
                document.getElementById("latestVSTOVersionReleaseNotes")?.setAttribute("href", appStatus.LatestVSTOAddinVersion.UrlReleaseNotes);
            }

            $("#licensestatus").html(status.status);
            $("#licenselastcheck").text(status.dateLastCheck);
            $("#licenseexpires").text(status.dateExpiration);
            $("#licenselevel").text(status.level);
            $("#licenseEmail").val(status.email);
            $("#licensekey").val(status.licensekey);
            
			if (ncgroup === '') {
				$("#defaultlicensestatus").html(status.status);
	            $("#defaultlicenselastcheck").text(status.dateLastCheck);
				$("#defaultlicenseexpires").text(status.dateExpiration);
				$("#defaultlicenselevel").text(status.level);
			}

            this.updateStatus(status.statusKind);
            this.updateButtonStatus(status.statusKind);

			// Shows/Hides inheritance checkbox and disables user input if needed
			if (ncgroup !== '') {
				$("#licensekey").next().addClass('settingkeyvalueinherited');
				if (status.ncgroup === '') {
					// Group inherits the default license
					$("#licensekey").next().find("input").prop('checked', true);
					$("#licensekey").prop('disabled', true);
					$("#licenseEmail").prop('disabled', true);
					this.disableButtons();
				} else {
					// Group has a specific license
					$("#licensekey").next().find("input").prop('checked', false);
					$("#licensekey").prop('disabled', false);
					$("#licenseEmail").prop('disabled', false);
			        this.enableButtons();
				}
			} else {
				// We are showing the default license
				$("#licensekey").next().removeClass('settingkeyvalueinherited');
				$("#licensekey").prop('disabled', false);
				$("#licenseEmail").prop('disabled', false);
		        this.enableButtons();
			}

			// Sets up inheritance checkbox's action
            $("#licensekey").next().find("input").off('change')
            $("#licensekey").next().find("input").on('change', {ncgroup}, (ev) => {
				if ($("#licensekey").next().find('input:checked').val()) {
					this.deleteLicense(ev.data.ncgroup);
					this.refreshLicenseStatus(ev.data.ncgroup).then(() => {
						$("#licensekey").prop('disabled', true);
						$("#licenseEmail").prop('disabled', true);
						this.disableButtons()
					});
	            } else {
					$("#licensekey").prop('disabled', false);
					$("#licenseEmail").prop('disabled', false);
					this.createLicense('', '', ev.data.ncgroup);
					this.enableButtons();
                }
            });

			// Makes sure the buttons' click action act on the correct group
			$("#btnLicenseActivation").off('click')
			$("#btnLicenseActivation").on('click', {ncgroup}, (ev) => {
	            ev.preventDefault();
	            const email = $("#licenseEmail").val()?.toString().replace(/\s+/g, '') || '';
	            const key = $("#licensekey").val()?.toString().replace(/\s+/g, '') || '';
	            this.createLicense(email, key, ev.data.ncgroup);
	        });
		    $("#btnClearLicense").off('click')
		    $("#btnClearLicense").on('click', {ncgroup}, (ev) => {
				$("#licenseEmail").val('');
		        $("#licensekey").val('');
	            this.createLicense('', '', ev.data.ncgroup);
	        });

        } catch (err) {
            console.warn('Error while fetching license status', err);

            $("#licensestatus").text(t("sendent", "Cannot verify your license. Please make sure your licensekey and emailaddress are correct before you try to 'Activate license'."));
            $("#licenselastcheck").text(t("sendent", "Just now"));
            $("#licenseexpires, #licenselevel").text("-");

            this.showErrorStatus();

            $("#btnLicenseActivation").val(t("sendent", "Activate license"));
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $("#btnSupportButton").removeClass("shown").addClass("hidden");

	        this.enableButtons();
        }

		return;
    }

    private insertLoadIndicator(selector: string) {
        $(selector).html('<div class="spinner"> <div class="bounce1"></div> <div class="bounce2"></div> <div class="bounce3"></div></div>');
    }

    private updateStatus(kind: string) {
        if (['valid'].includes(kind)) {
            this.showOkStatus();
        } else if (['check', 'nolicense', 'userlimit'].includes(kind)) {
            this.showWarningStatus();
        } else {
            this.showErrorStatus();
        }
    }

    private updateButtonStatus(kind: string) {
        if (kind === 'valid') {
            $("#btnLicenseActivation")
                .removeClass("shown")
                .addClass("hidden")
                .val(t("sendent", "Activate license"));
        } else if (['check', 'expired', 'userlimit'].includes(kind)) {
            $("#btnLicenseActivation")
                .removeClass("hidden")
                .addClass("shown")
                .val(t("sendent", "Revalidate license"));
        } else {
            $("#btnLicenseActivation")
                .removeClass("hidden")
                .addClass("shown")
                .val(t("sendent", "Activate license"));
        }
    }

    private showErrorStatus() {
        $("#license .licensekeyvalueinput").addClass("errorStatus").removeClass("okStatus warningStatus");
    }

    private showWarningStatus() {
        $("#license .licensekeyvalueinput").addClass("warningStatus").removeClass("okStatus errorStatus");
    }

    private showOkStatus() {
        $("#license .licensekeyvalueinput").addClass("okStatus").removeClass("errorStatus warningStatus");
    }

    private disableButtons() {
        $("#btnSupportButton, #btnClearLicense, #btnLicenseActivation").prop('disabled', true);
    }

    private enableButtons() {
        $("#btnSupportButton, #btnClearLicense, #btnLicenseActivation").removeAttr("disabled");
    }

	private deleteLicense(ncgroup: string) {
        const url = generateUrl('/apps/sendent/api/1.0/license');

        return axios.delete(url, { data: { group: ncgroup } });
	}

    private sendCreationRequest(email: string, license: string, ncgroup: string) {
        const url = generateUrl('/apps/sendent/api/1.0/license');

        return axios.post(url, { email, license, ncgroup });
    }

    private requestStatus(ncgroup: string) {
        const url = generateUrl('/apps/sendent/api/1.0/licensestatus?ncgroup=' + ncgroup);

        return axios.get<LicenseStatus>(url);
    }
    private requestApplicationStatus() {
        const url = generateUrl('/apps/sendent/api/1.0/status');

        return axios.get<LicenseStatus>(url);
    }
}
