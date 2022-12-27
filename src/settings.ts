/* eslint-disable @nextcloud/no-deprecations */
import LicenseHandler from "./imports/LicenseHandler"
import SettingFormHandler from "./imports/SettingFormHandler";
import GroupsManagementHandler from "./imports/GroupsManagementHandler";

$(() => {
    console.log('Setting script loaded');

    const licenseHandler = LicenseHandler.setup('');
    const settingFormHandler = SettingFormHandler.get()
	settingFormHandler.loopThroughSettings();
	GroupsManagementHandler.setup(settingFormHandler, licenseHandler);

    $('#settingsform').on('submit', function (ev) {
        ev.preventDefault();
        //I had an issue that the forms were submitted in geometrical progression after the next submit.
        // This solved the problem.
        ev.stopImmediatePropagation();
    });
})
