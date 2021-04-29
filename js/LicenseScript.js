

class LicenseStatus {
  constructor($email, $licensekey, $dateExpiration, $dateLastChecked, $status, $level) {
    this.email = $email;
    this.licensekey = $licensekey;
    this.dateExpiration = $dateExpiration;
    this.dateLastChecked = $dateLastChecked;
    this.status = $status;
    this.level = $level;
  }
}
class LicenseCreate {
  constructor($email, $license) {
    this.email = $email;
    this.license = $license;
  }
}

class LicenseManager {
  constructor() {
    this.licensecalls = new LicenseValidationCalls();
  }

  getLicenseStatus() {
    $.when(this.licensecalls.getLicenseDetails()).fail(function (failedvalueget) {
      $(".settingkeyvalueinput#licensestatus").text("Error fetching license status.");
      $(".settingkeyvalueinput#licenselastcheck").text("-");
      $(".settingkeyvalueinput#licenseexpires").text("-");
      $(".settingkeyvalueinput#licenselevel").text("-");
      $("#btnLicenseActivation").val("Activate license");
      $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
      $("#btnSupportButton").removeClass("shown").addClass("hidden");
      $(".settingkeyvalueinput#licenselevel").addClass("errorStatus").removeClass("okStatus").removeClass("warningStatus");
      $(".settingkeyvalueinput#licensestatus").addClass("errorStatus").removeClass("okStatus").removeClass("warningStatus");
      $(".settingkeyvalueinput#licenselastcheck").addClass("errorStatus").removeClass("okStatus").removeClass("warningStatus");
      $(".settingkeyvalueinput#licenseexpires").addClass("errorStatus").removeClass("okStatus").removeClass("warningStatus");
      $(".settingkeyvalueinput#licenseEmail").addClass("errorStatus").removeClass("okStatus").removeClass("warningStatus");
      $(".settingkeyvalueinput#licensekey").addClass("errorStatus").removeClass("okStatus").removeClass("warningStatus");
    })
      .done(function (status) {
        if (status !== false) {
          if(status.level != "Free" && status.level != "")
          {
            $("#btnSupportButton").removeClass("hidden").addClass("shown");
          }
          if (status.statusKind === "valid") {
            $(".settingkeyvalueinput#licensestatus").text(
              '' + status.status);
            $(".settingkeyvalueinput#licenselastcheck").text(
              '' + status.dateLastCheck);
            $(".settingkeyvalueinput#licenseexpires").text(
              '' + status.dateExpiration);
            $(".settingkeyvalueinput#licenselevel").text(
              '' + status.level);
            $(".settingkeyvalueinput#licenseEmail").val(status.email);
            $(".settingkeyvalueinput#licensekey").val(status.licensekey);
            $("#btnLicenseActivation").val("Activate license");
            $("#btnLicenseActivation").removeClass("shown").addClass("hidden");
            $(".settingkeyvalueinput#licenselevel").addClass("okStatus").removeClass("warningStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licensestatus").addClass("okStatus").removeClass("warningStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("okStatus").removeClass("warningStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("okStatus").removeClass("warningStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("okStatus").removeClass("warningStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licensekey").addClass("okStatus").removeClass("warningStatus").removeClass("errorStatus");
          }
          else if(status.statusKind === "check")
          {
            $(".settingkeyvalueinput#licensestatus").text(
              '' + status.status);
            $(".settingkeyvalueinput#licenselastcheck").text(
              '' + status.dateLastCheck);
            $(".settingkeyvalueinput#licenseexpires").text(
              '' + status.dateExpiration);
            $(".settingkeyvalueinput#licenselevel").text(
              '' + status.level);
            $(".settingkeyvalueinput#licenseEmail").val(status.email);
            $(".settingkeyvalueinput#licensekey").val(status.licensekey);
            $("#btnLicenseActivation").val("Revalidate license");
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $(".settingkeyvalueinput#licensestatus").addClass("warningStatus").removeClass("errorStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselevel").addClass("warningStatus").removeClass("errorStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("warningStatus").removeClass("errorStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("warningStatus").removeClass("errorStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("warningStatus").removeClass("errorStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licensekey").addClass("warningStatus").removeClass("errorStatus").removeClass("okStatus");
          }
          else if(status.statusKind === "expired")
          {
            $(".settingkeyvalueinput#licensestatus").html(
              '' + status.status);
            $(".settingkeyvalueinput#licenselastcheck").text(
              '' + status.dateLastCheck);
            $(".settingkeyvalueinput#licenseexpires").text(
              '' + status.dateExpiration);
            $(".settingkeyvalueinput#licenselevel").text(
              '' + status.level);
            $(".settingkeyvalueinput#licenseEmail").val(status.email);
            $(".settingkeyvalueinput#licensekey").val(status.licensekey);
            $("#btnLicenseActivation").val("Revalidate license");
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $(".settingkeyvalueinput#licensestatus").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselevel").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licensekey").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
          }
          else if(status.statusKind === "fatal")
          {
            $(".settingkeyvalueinput#licensestatus").text(
              '' + status.status);
            $(".settingkeyvalueinput#licenselastcheck").text(
              '' + status.dateLastCheck);
            $(".settingkeyvalueinput#licenseexpires").text(
              '' + status.dateExpiration);
            $(".settingkeyvalueinput#licenselevel").text(
              '' + status.level);
            $(".settingkeyvalueinput#licenseEmail").val(status.email);
            $(".settingkeyvalueinput#licensekey").val(status.licensekey);
            $("#btnLicenseActivation").val("Activate license");
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $(".settingkeyvalueinput#licensestatus").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselevel").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licensekey").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
          }
          else if(status.statusKind === "nolicense")
          {
            $(".settingkeyvalueinput#licensestatus").text("No license configured.");
            $(".settingkeyvalueinput#licenselastcheck").text("-");
            $(".settingkeyvalueinput#licenseexpires").text("-");
            $(".settingkeyvalueinput#licenselevel").text("-");
            $("#btnLicenseActivation").val("Activate license");
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $(".settingkeyvalueinput#licensestatus").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenselevel").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licensekey").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
          }
          else if(status.statusKind === "userlimit")
          {
            $(".settingkeyvalueinput#licensestatus").text(
              '' + status.status);
            $(".settingkeyvalueinput#licenselastcheck").text(
              '' + status.dateLastCheck);
            $(".settingkeyvalueinput#licenseexpires").text(
              '' + status.dateExpiration);
            $(".settingkeyvalueinput#licenselevel").text(
              '' + status.level);
            $(".settingkeyvalueinput#licenseEmail").val(status.email);
            $(".settingkeyvalueinput#licensekey").val(status.licensekey);
            $("#btnLicenseActivation").val("Revalidate license");
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $(".settingkeyvalueinput#licensestatus").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenselevel").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
            $(".settingkeyvalueinput#licensekey").addClass("warningStatus").removeClass("okStatus").removeClass("errorStatus");
          }
        }
        else {
          $(".settingkeyvalueinput#licensestatus").text(
            '' + status.status);
          $(".settingkeyvalueinput#licenselastcheck").text(
            '' + status.dateLastCheck);
          $(".settingkeyvalueinput#licenseexpires").text(
            '' + status.dateExpiration);
          $(".settingkeyvalueinput#licenselevel").text(
            '' + status.level);
            $(".settingkeyvalueinput#licenseEmail").val(status.email);
            $(".settingkeyvalueinput#licensekey").val(status.licensekey);
            $("#btnLicenseActivation").val("Activate license");
            $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
            $(".settingkeyvalueinput#licensestatus").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselevel").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenselastcheck").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseexpires").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licenseEmail").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
            $(".settingkeyvalueinput#licensekey").addClass("errorStatus").removeClass("warningStatus").removeClass("okStatus");
        }
      
      });
  }
}
class LicenseValidationCalls {
  constructor() {
    this.validationUrl = OC.generateUrl('/apps/sendent/api/1.0/licensevalidation');
    this.statusUrl = OC.generateUrl('/apps/sendent/api/1.0/licensestatus');
    this.createUrl = OC.generateUrl('/apps/sendent/api/1.0/license');
  }
  sendValidation() {
    var that = this;
    return $.ajax({
      type: 'GET',
      url: that.validationUrl,
      beforeSend: function (request) {
        //request.setRequestHeader("requesttoken", token);
        //request.setRequestHeader("OCS-APIRequest", true);
      },
      success: function (data) {
        console.log('validation was submitted with result: ' + data);
        return data;
      }
    });
  }
  
  getLicenseDetails() {
    var that = this;
    return $.ajax({
      type: 'GET',
      url: that.statusUrl,
      beforeSend: function (request) {
        //request.setRequestHeader("requesttoken", token);
        //request.setRequestHeader("OCS-APIRequest", true);
      },
      success: function (data) {
        console.log('status was returned with result: ' + data);
        return data;
      },
      error: function (xhr, ajaxOptions, thrownError) {
        if (xhr.status == 404) {
          console.warn(xhr.status);
          return false;
        }
        console.warn(thrownError);
        console.warn(xhr.data);
        console.warn(thrownError);
      }

    });
  }
  createLicense($email, $license) {
    var that = this;
    that.licensecreate = new LicenseCreate($email, $license);
    return $.ajax({
      type: 'POST',
      url: that.createUrl,
      contentType: 'application/json',
      data: JSON.stringify(that.licensecreate),
      beforeSend: function (request) {
        //request.setRequestHeader("requesttoken", token);
        //request.setRequestHeader("OCS-APIRequest", true);
      },
      success: function (data) {
        console.log('licensekey was created with result: ' + data);
        //that.getLicenseDetails();
        return data;
      }
    });
  }
}
$(document).ready(function () {
  var that = this;
  // $.trumbowyg.svgPath =  '/img/icons.svg';
  // $('.trumbowyg').trumbowyg();
  // $(this).htmlarea();
  that.LicenseValidationCalls = new LicenseValidationCalls();

  that.LicenseManager = new LicenseManager();
  

  $("#licensebutton").on('click', function () {
    var email = $(".settingkeyvalueinput#licenseEmail").val();
    var key = $(".settingkeyvalueinput#licensekey").val();
    that.LicenseValidationCalls.createLicense(email, key);
    sleep(1000);
    that.LicenseManager.getLicenseStatus();
  });
  $("#licenseClearButton").on('click', function () {
    $(".settingkeyvalueinput#licenseEmail").val("");
    $(".settingkeyvalueinput#licensekey").val("");
    that.LicenseValidationCalls.createLicense("", "");
    sleep(1000);
    that.LicenseManager.getLicenseStatus();
  });

  $(".settingkeyvalueinput#licenseEmail").on('change', function () {
    $("#btnLicenseActivation").val("Activate license");
      $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
  });
  $(".settingkeyvalueinput#licensekey").on('change', function () {
    $("#btnLicenseActivation").val("Activate license");
      $("#btnLicenseActivation").removeClass("hidden").addClass("shown");
  });
  var email = $(".settingkeyvalueinput#licenseEmail").val();
    var key = $(".settingkeyvalueinput#licensekey").val();

      that.LicenseManager.getLicenseStatus();
      that.LicenseValidationCalls.getLicenseDetails();
});

function sleep(delay) {
  var start = new Date().getTime();
  while (new Date().getTime() < start + delay);
}