/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';
import { translate as t } from '@nextcloud/l10n'

export default class GroupsManagementHandler {
    private static instance: GroupsManagementHandler;

    private constructor() {
		console.log('Initializing sendent groups lists');

		// Makes the Sendent groups lists sortable
		$("#ncGroups").sortable({
			connectWith: ".connectedSortable"
		});
		$("#sendentGroups").sortable({
			connectWith: ".connectedSortable",
			update: this.updateSendentGroups
		});

    }

    public static setup(): GroupsManagementHandler {
        if (!this.instance) {
            this.instance = new GroupsManagementHandler();
        }

        return this.instance;
    }

	private updateSendentGroups(event, ui) {
		let li = $('#sendentGroups li');
		let sendentGroups = Object.values(li).map(htmlElement => htmlElement.textContent).filter(text => text !== undefined);
		console.log(sendentGroups);
	}
}
