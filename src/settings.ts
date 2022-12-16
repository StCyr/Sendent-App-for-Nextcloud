/* eslint-disable @nextcloud/no-deprecations */
import LicenseHandler from "./imports/LicenseHandler"
import SettingFormHandler from "./imports/SettingFormHandler";

require("jquery-ui/ui/widgets/sortable");

$(() => {
    console.log('Setting script loaded');

	// Makes the Sendent groups lists sortable
	$("#ncGroups, #sendentGroups").sortable({
      connectWith: ".connectedSortable"
    });

    LicenseHandler.setup();
    SettingFormHandler.get().loopThroughSettings();

    $('#settingsform').on('submit', function (ev) {
        ev.preventDefault();
        //I had an issue that the forms were submitted in geometrical progression after the next submit.
        // This solved the problem.
        ev.stopImmediatePropagation();
    });
})
