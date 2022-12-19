/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';
import SettingGroupValueAjaxCalls from "./SettingGroupValueAjaxCalls";

require("jquery-ui/ui/widgets/sortable");
require("jquery-ui/ui/widgets/selectable");

export default class GroupsManagementHandler {
    private static instance: GroupsManagementHandler;
	private valuecalls: SettingGroupValueAjaxCalls;

    private constructor() {
		console.log('Initializing sendent groups lists');

		this.valuecalls = new SettingGroupValueAjaxCalls();

		// Makes the Sendent groups lists sortable
		$("#ncGroups").sortable({
			connectWith: ".connectedSortable"
		}).find( "li" )
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );
		$("#sendentGroups").sortable({
			connectWith: ".connectedSortable",
			handle: ".handle",
			update: this.updateSendentGroups
		}).selectable({
			cancel: ".handle",
			filter: "li",
			selected: this.showSettingsForGroup.bind(this),
		}).find( "li" )
        .prepend( "<div class='handle'><span class='ui-icon ui-icon-carat-2-n-s'></span></div>" );

    }

    public static setup(): GroupsManagementHandler {
        if (!this.instance) {
            this.instance = new GroupsManagementHandler();
        }

        return this.instance;
    }

	private showSettingsForGroup(event, ui) {
		console.log('Retrieving settings from server');
		const ncgroup = ui.selected.textContent;
		this.valuecalls.list(ncgroup);
	}

	private updateSendentGroups() {
		console.log('Updating backend');

		/* Get the list of sendent groups from the UI */
		const li = $('#sendentGroups li');
		const sendentGroups = Object.values(li).map(htmlElement => htmlElement.textContent).filter(text => text !== undefined);

		/* Update backend */
		const url = generateUrl('/apps/sendent/api/2.0/groups/update');
		return axios.post(url, {sendentGroups});

	}
}
