/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';
import { translate as t } from '@nextcloud/l10n'
import SettingFormHandler from "./SettingFormHandler";

require("jquery-ui/ui/widgets/sortable");
require("jquery-ui/ui/widgets/selectable");

export default class GroupsManagementHandler {
    private static instance: GroupsManagementHandler;
	private settingFormHandler: SettingFormHandler;

    private constructor() {
		console.log('Initializing sendent groups lists');

		// Makes the Sendent groups lists sortable
		$("#ncGroups").sortable({
			connectWith: ".connectedSortable"
		}).find( "li" )
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );
		$("#sendentGroups").sortable({
			cancel: ".unsortable",
			connectWith: ".connectedSortable",
			handle: ".handle",
			update: this.updateSendentGroups
		}).selectable({
			cancel: ".handle",
			filter: "li",
			selected: this.showSettingsForGroup.bind(this),
		}).find( "li" )
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );
		$("#defaultGroup").sortable({
			cancel: ".unsortable",
			handle: ".handle",
		}).selectable({
			cancel: ".handle",
			filter: "li",
			selected: this.showSettingsForGroup.bind(this),
		}).find( "li" )
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );

    }

    public static setup(settingFormHandler): GroupsManagementHandler {
        if (!this.instance) {
            this.instance = new GroupsManagementHandler();
        }

		this.instance.settingFormHandler = settingFormHandler;

        return this.instance;
    }

	private showSettingsForGroup(event, ui) {
		// Unselect all other previously selected groups
		$('#groupsManagement div ul li').each(function() {
			if (this !== ui.selected) {
				$(this).removeClass('ui-selected');
			}
		});

		// Updates settings value
		let ncgroup = ui.selected.textContent;
		ncgroup = ncgroup === t('sendent', 'Default') ? '' : ncgroup;
		this.settingFormHandler.loopThroughSettings(ncgroup);
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
