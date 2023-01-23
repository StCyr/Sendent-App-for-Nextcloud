/* eslint-disable @nextcloud/no-deprecations */
import LicenseHandler from "./imports/LicenseHandler"
import SettingFormHandler from "./imports/SettingFormHandler";
import GroupsManagementHandler from "./imports/GroupsManagementHandler";

$(() => {
    console.log('Setting script loaded');

    const licenseHandler = LicenseHandler.setup('');
    const settingFormHandler = SettingFormHandler.get();
	settingFormHandler.loopThroughSettings();
	GroupsManagementHandler.setup(settingFormHandler, licenseHandler);

	$('.tablink').on('click', function (ev) {
		// Get all elements with class="tabcontent" and hide them
    	$(".Settingspage").css('display', 'none');

		// Get all elements with class="tablinks" and remove the class "active"
		$(".tablink").removeClass("active");

		// Show the current tab, and add an "active" class to the button that opened the tab
		let tabName = ev.currentTarget.id;
		tabName = "#" + tabName.substring(4);	
		$(tabName).css('display', 'block');
		ev.currentTarget.className += " active";

	});

    $('#settingsform').on('submit', function (ev) {
        ev.preventDefault();
        //I had an issue that the forms were submitted in geometrical progression after the next submit.
        // This solved the problem.
        ev.stopImmediatePropagation();
    });
})
