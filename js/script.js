$(document).ready(function () {

  subscribeChangedEventSettingKeyValues();
});

function subscribeChangedEventSettingKeyValues() {
  var personalSettingBoxes = $('.section').find(".personal-settings-setting-box");

  personalSettingBoxes.each(function (settingboxIndex, settingbox) {
    var settingKeyValues = $(settingbox).find(".settingkeyvalueinput");
    var settingKeyId = $(settingbox).find("[name='settingkeyname']").val();

    settingKeyValues.each(function () {

      showHideAttachmentSize(settingKeyValues, settingKeyId);
      showHideAdvancedTheming(settingKeyValues, settingKeyId);

      $(this).on('change', function () {
        settingValueChanged(settingbox);
        showHideAttachmentSize(settingKeyValues, settingKeyId);
        showHideAdvancedTheming(settingKeyValues, settingKeyId);
      });

    });
  });
}

function showHideAttachmentSize(settingkeyvalues, settingkeyid) {
  var settingkeyvalue = settingkeyvalues[0].value;
  if (settingkeyid == "attachmentmode") {
    if (settingkeyvalue == "MaximumAttachmentSize") {
      $(".personal-settings-setting-box.attachmentSize").removeClass("hidden").addClass("shown");
    }
    else {
      $(".personal-settings-setting-box.attachmentSize").addClass("hidden").removeClass("shown");
    }
  }
  else if (settingkeyid == "sendmode") {
    if (settingkeyvalue == "Separate") {
      $(".personal-settings-setting-box.htmlSnippetPassword").removeClass("hidden").addClass("shown");
    }
    else {
      $(".personal-settings-setting-box.htmlSnippetPassword").addClass("hidden").removeClass("shown");
    }
  }
}

function showHideAdvancedTheming(settingkeyvalues, settingkeyid) {
  var settingkeyvalue = settingkeyvalues[0].value;
  if (settingkeyid == "AdvancedThemingEnabled") {
    if (settingkeyvalue == "true") {
      $(".advancedTheming").removeClass("hidden").addClass("shown");
    }
    else {
      $(".advancedTheming").addClass("hidden").removeClass("shown");
    }
  }
}

function settingValueChanged(personalSettingBox) {
  var handler = new SettingFormHandler();

  personalSettingBox.each(function (settingboxIndex, settingbox) {
    handler.SaveSetting(settingbox);
  });
}
