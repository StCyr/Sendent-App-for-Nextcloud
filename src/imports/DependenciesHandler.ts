/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';

export default class DependenciesHandler {
    private static instance: DependenciesHandler;

    public static setup() {
		console.log('Initializing dependencies');

        if (!this.instance) {
            this.instance = new DependenciesHandler();
        }

		$('#requiredApps').html('<div class="spinner"> <div class="bounce1"></div> <div class="bounce2"></div> <div class="bounce3"></div></div>')
		$('#recommendedApps').html('<div class="spinner"> <div class="bounce1"></div> <div class="bounce2"></div> <div class="bounce3"></div></div>')

		this.instance.getCapabilities().then(resp => {
			const capabilities = resp.data.ocs.data.capabilities
			const capabilitiesKeys = Object.keys(capabilities)

			const requiredApps = ["core", "files", "dav", "ocm", "files_sharing", "password_policy", "theming"]			
			$('#requiredApps').html('')
			let allGood = true
			requiredApps.forEach(app => {
				const idx = capabilitiesKeys.findIndex((key) => key === app)
				if (idx !== -1) {
					let div = this.instance.createSettingBox(app, true)
					const capability = capabilities[idx]
					$(div).appendTo('#requiredApps')
				} else {
					allGood = false
					let div = this.instance.createSettingBox(app, false)
					$(div).appendTo('#requiredApps')
				}
			})

			if (allGood) {
				$('#requiredApps').html('')
				let div = this.instance.createSettingBox('All installed', true)
				$(div).appendTo('#requiredApps')
			}

			const recommendedApps = ["activity", "talk"]
			allGood = true
			$('#recommendedApps').html('')
			recommendedApps.forEach(app => {
				const idx = capabilitiesKeys.findIndex((key) => key === app)
				if (idx !== -1) {
					let div = this.instance.createSettingBox(app, true)
					const capability = capabilities[idx]
					$(div).appendTo('#recommendedApps')
				} else {
					allGood = false
					let div = this.instance.createSettingBox(app, false)
					$(div).appendTo('#recommendedApps')
				}
			})

			if (allGood) {
				$('#recommendedApps').html('')
				let div = this.instance.createSettingBox('All installed', true)
				$(div).appendTo('#recommendedApps')
			}

		});

        return;
    }

	private async getCapabilities() {
		let url = generateUrl('/ocs/v1.php/cloud/capabilities').replace('/index.php','')
		return axios.get(url,{
			headers: {
				'OCS-APIRequest': true
			}
		})
	}

	private createSettingBox(app, state) {
		let div1 = document.createElement('div')
		$(div1).addClass('dependency-settings-setting-box')
		let div2 = document.createElement('div')
		$(div2).addClass('settingkeyvalue')
		if (state) {
			$(div2).attr('data-state', 'success')
		} else {
			$(div2).attr('data-state', 'fail')
		}
		let label = document.createElement('label')
		$(label).addClass('licenselabel')
		let span = document.createElement('span')
		$(span).addClass('templatesettingkeyname').addClass('licenseitem').text(app)
		$(span).appendTo(label)
		$(label).appendTo(div2)
		$(div2).appendTo(div1)

		return div1
	}
}
