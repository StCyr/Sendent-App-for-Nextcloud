/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';
import { translate as t } from '@nextcloud/l10n'
import SettingFormHandler from "./SettingFormHandler";
import LicenseHandler from "./LicenseHandler"

require("jquery-ui/ui/widgets/sortable");

export default class GroupsManagementHandler {
    private static instance: GroupsManagementHandler;
	private settingFormHandler: SettingFormHandler;
	private licenseHandler: LicenseHandler;

    public static setup(settingFormHandler: SettingFormHandler, licenseHandler: LicenseHandler): GroupsManagementHandler {
		console.log('Initializing sendent groups lists');

        if (!this.instance) {
            this.instance = new GroupsManagementHandler();
        }

		this.instance.settingFormHandler = settingFormHandler;
		this.instance.licenseHandler = licenseHandler;

		// Makes the Sendent groups lists sortable
		$("#ncGroups").sortable({
			connectWith: ".connectedSortable"
		}).find( "li" )
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );
		$("#sendentGroups").sortable({
			cancel: ".unsortable",
			connectWith: ".connectedSortable",
			handle: ".handle",
			update: () => this.instance.updateSendentGroups()
		}).find( "li" )
		.on( "click", this.instance.showSettingsForGroup)
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );
		$("#defaultGroup").sortable({
			cancel: ".unsortable",
			handle: ".handle",
		}).find( "li" )
		.on( "click", this.instance.showSettingsForGroup)
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );

        return this.instance;
    }

	private showSettingsForGroup(event) {
		// Unselect all other previously selected groups
		$('#groupsManagement div ul li').each(function() {
			if (this !== event.target) {
				$(this).removeClass('ui-selected');
			} else {
				$(this).addClass('ui-selected');
			}
		});

		// Gets group for which settings are to be shown
		let ncgroup = event.target.textContent;
		ncgroup = ncgroup === t('sendent', 'Default') ? '' : ncgroup;

		// Updates license
		GroupsManagementHandler.instance.licenseHandler.refreshLicenseStatus(ncgroup)

		// Updates settings value
		GroupsManagementHandler.instance.settingFormHandler.loopThroughSettings(ncgroup);
	}

	private updateSendentGroups() {
		console.log('Updating backend');

		// Get the list of sendent groups from the UI
		// TODO: Rewrite the selection with a each()
		const li = $('#sendentGroups li');
		const sendentGroups = Object.values(li).map(htmlElement => htmlElement.textContent).filter(text => text !== undefined);

		// Update backend
		const url = generateUrl('/apps/sendent/api/2.0/groups/update');
		return axios.post(url, {sendentGroups});

	}
}
