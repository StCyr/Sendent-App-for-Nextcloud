/* eslint-disable @nextcloud/no-deprecations */
import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';

require("jquery-ui/ui/widgets/sortable");

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

	private updateSendentGroups() {
		console.log('Updating backend');

		/* Get the list of sendent groups from the UI */
		const li = $('#sendentGroups li');
		const sendentGroups = Object.values(li).map(htmlElement => htmlElement.textContent).filter(text => text !== undefined);
		console.log(sendentGroups);

		/* Update backend */
		const url = generateUrl('/apps/sendent/api/2.0/groups/update');
		return axios.post(url, {sendentGroups});

	}
}
