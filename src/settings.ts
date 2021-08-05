/* eslint-disable @nextcloud/no-deprecations */
import LicenseHandler from "./imports/LicenseHandler"
import SettingFormHandler from "./imports/SettingFormHandler";

function subscribeChangedEventSettingKeyValues() {
    const personalSettingBoxes = $('.section').find(".personal-settings-setting-box");

    personalSettingBoxes.each(function (_, element) {
        const settingbox = $(element);

        updateUI(settingbox);

        $(this).on('change', function () {
            settingValueChanged(settingbox);

            updateUI(settingbox);
        });
    });
}

function updateUI(settingbox: JQuery<HTMLElement>) {
    const keyValue = $(settingbox).find(".settingkeyvalueinput").first().val()?.toString();
    const keyId = $(settingbox).find("[name='settingkeyname']").val()?.toString();

    if (!keyId || typeof keyValue !== 'string') {
        return;
    }

    if (keyId === "attachmentmode") {
        if (keyValue === "MaximumAttachmentSize") {
            $(".personal-settings-setting-box.attachmentSize").removeClass("hidden").addClass("shown");
        } else {
            $(".personal-settings-setting-box.attachmentSize").addClass("hidden").removeClass("shown");
        }
    }
    else if (keyId === "sendmode") {
        if (keyValue == "Separate") {
            $(".personal-settings-setting-box.htmlSnippetPassword").removeClass("hidden").addClass("shown");
        } else {
            $(".personal-settings-setting-box.htmlSnippetPassword").addClass("hidden").removeClass("shown");
        }
    } else if (keyId === "AdvancedThemingEnabled") {
        if (keyValue === "true") {
            $(".advancedTheming").removeClass("hidden").addClass("shown");
        }
        else {
            $(".advancedTheming").addClass("hidden").removeClass("shown");
        }
    }
}

function settingValueChanged(personalSettingBox: JQuery<HTMLElement>) {
    const handler = SettingFormHandler.get();

    personalSettingBox.each((_, settingbox) => {
        handler.saveSetting($(settingbox));
    });
}


$(() => {
    console.log('Setting script loaded');

    LicenseHandler.setup();
    subscribeChangedEventSettingKeyValues();

    SettingFormHandler.get().loopThroughSettings();

    $('#settingsform').on('submit', function (ev) {
        ev.preventDefault();
        //I had an issue that the forms were submitted in geometrical progression after the next submit.
        // This solved the problem.
        ev.stopImmediatePropagation();
        //that.handler.SaveSettingsForm();
    });
})
