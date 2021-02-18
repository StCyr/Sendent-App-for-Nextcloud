$(document).ready(function () {
  // $.trumbowyg.svgPath =  '/img/icons.svg';
  // $('.trumbowyg').trumbowyg();
  // $(this).htmlarea();
  subscribeChangedEventSettingKeyValues();
});


function subscribeChangedEventSettingKeyValues() {
  $(".section").each(function () {
    var personalsettingboxes = $(this).find(".personal-settings-setting-box");
    personalsettingboxes.each(function (settingboxIndex, settingbox) {
      var settingkeyvalues = $(settingbox).find(".settingkeyvalueinput");
      var settingkeyid = $(settingbox).find("#settingkeyname")[0].value;
      settingkeyvalues.each(function (settingkeyvalueIndex, settingkeyvaluebox) {

showHideAttachmentSize(settingkeyvalues, settingkeyid);
showHideAdvancedTheming(settingkeyvalues,settingkeyid);

        $(this).change(function () {
          settingValueChanged(settingkeyid);
          showHideAttachmentSize(settingkeyvalues,settingkeyid);
          showHideAdvancedTheming(settingkeyvalues,settingkeyid);
        })
      });
    });
  });
}
function showHideAttachmentSize(settingkeyvalues, settingkeyid)
{
  var settingkeyvalue = settingkeyvalues[0].value;
          if (settingkeyid == "attachmentmode") {
            if(settingkeyvalue == "MaximumAttachmentSize")
            {
              $(".personal-settings-setting-box#attachmentsize").removeClass("hidden").addClass("shown");
            }
            else{
              $(".personal-settings-setting-box#attachmentsize").addClass("hidden").removeClass("shown");
            }
          }
          else if (settingkeyid == "sendmode") {
            if(settingkeyvalue == "Separate")
            {
              $(".personal-settings-setting-box#htmlsnippetpassword").removeClass("hidden").addClass("shown");
            }
            else{
              $(".personal-settings-setting-box#htmlsnippetpassword").addClass("hidden").removeClass("shown");
            }
          }
}
function showHideAdvancedTheming(settingkeyvalues, settingkeyid)
{
          var settingkeyvalue = settingkeyvalues[0].value;
          if (settingkeyid == "AdvancedThemingEnabled") {
            if(settingkeyvalue == "true")
            {
              $(".personal-settings-setting-box#GeneralIconColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogFooterIconBackgroundColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#TaskpaneActivityTrackerColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#TaskpaneActivityTrackerFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogHeaderColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogHeaderFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryIconColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryIconColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryHoverColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryHoverColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#TaskpaneSecureMailColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#TaskpaneSecureMailFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#TaskpaneSecureMailControlColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#SecureMailControlColorHex").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#PopupBackgroundColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#GeneralFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogFooterBackgroundColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogFooterFontColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogFooterHoverColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#DialogFooterIconColor").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#VendorName").removeClass("hidden").addClass("shown");
              $(".personal-settings-setting-box#attachmentdomainexceptionsexternalpopup").removeClass("hidden").addClass("shown");
            }
            else{
              $(".personal-settings-setting-box#GeneralIconColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogFooterIconBackgroundColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#TaskpaneActivityTrackerColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#TaskpaneActivityTrackerFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogHeaderColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogHeaderFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryIconColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryIconColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonPrimaryHoverColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryHoverColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#ButtonSecondaryFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#TaskpaneSecureMailColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#TaskpaneSecureMailFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#SecureMailControlColorHex").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#PopupBackgroundColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#GeneralFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogFooterBackgroundColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogFooterFontColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogFooterHoverColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#DialogFooterIconColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#TaskpaneSecureMailControlColor").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#VendorName").addClass("hidden").removeClass("shown");
              $(".personal-settings-setting-box#attachmentdomainexceptionsexternalpopup").addClass("hidden").removeClass("shown");
              
            }
          }
}
function settingValueChanged(settingid) {
  var that = this;
  that.handler = new SettingFormHandler();

  $(".section").each(function () {
    var personalsettingboxes = $(this).find(".personal-settings-setting-box#" + settingid);
    personalsettingboxes.each(function (settingboxIndex, settingbox) {
      that.handler.SaveSetting(settingbox);
    });
  });

}
