$(document).ready(function () {
    var that = this;
    that.settingGroupId = 0;
    that.settingTemplateId = 0;
    // $('#settingTemplateCreateEditForm').on('submit', function (e) {
    //     e.preventDefault();
    //     //I had an issue that the forms were submitted in geometrical progression after the next submit. 
    //     // This solved the problem.
    //     e.stopImmediatePropagation();
    //     if(document.getElementById("templateid").value == '')
    //     {
    //         that.settingTemplateCalls.create(document.getElementById("templatename").value);
    //     }
    //     else
    //     {
    //         that.settingTemplateCalls.update(document.getElementById("templateid").value, document.getElementById("templatename").value);
    //         var modal = document.getElementById("settingTemplateCreateModal");
    //         modal.style.display = "none";
    //         document.getElementById("templateid").value ='';
    //         document.getElementById("templatename").value ='';
    //     }
    // });
});
class SettingGroupValue
{
    constructor($settingkeyid, $groupid, $value)
    {
        this.settingkeyid = $settingkeyid;
        this.groupid = $groupid;
        this.value = $value;
    }
}

class SettingGroupValueAjaxCalls {

    constructor() {
        this.settingGroupId = 0;
        this.settingTemplateId = 0;
        this.url = OC.generateUrl('/apps/sendent/api/1.0/settinggroupvalue');
    }

    list()
    {
        var that = this;
        return $.ajax({
            type: 'GET',
            url: that.url + '/index',
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                return data;
            },
            error:function (xhr, ajaxOptions, thrownError){
                if(xhr.status==404) {
                    console.warn(xhr.status);
                    return false;
                }
            }
        });
    }

    show($id) {
        var that = this;
        return $.ajax({
            type: 'GET',
            url: that.url + '/' + $id,
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                return data;
            },
            error:function (xhr, ajaxOptions, thrownError){
                if(xhr.status==404) {
                    console.warn(xhr.status);
                    return false;
                }
            }
        });
    }

    showBySettingKeyId($settingkeyid) {
        var that = this;
        return $.ajax({
            type: 'GET',
            url: that.url + '/showbysettingkeyid/' + $settingkeyid,
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                return data;
            },
            error:function (xhr, ajaxOptions, thrownError){
                if(xhr.status==404) {
                    console.warn(xhr.status);
                    return false;
                }
            }
        });
    }

    update($id, $settingkeyid, $value) {
        var that = this;
        var sgv = new SettingGroupValue($settingkeyid, that.settingGroupId, $value);
        return $.ajax({
            type: 'PUT',
            url: that.url + '/' + $id,
            contentType: 'application/json',
            data: JSON.stringify(sgv),
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function () {
                console.log('updated settingkey was submitted new value: ' + $value + ' and settingkeyid: ' + $settingkeyid);
            },
            error:function (xhr, ajaxOptions, thrownError){
                if(xhr.status==404) {
                    console.warn(xhr.status);
                    return false;
                }
            }
            // },
            // error: function(data){
            //     console.log("update error, trying to create settingkey with provided values..." + data);
            //     //return that.create($settingkeyid, encodeURIComponent($value));
            // }
        });
    }

    create($settingkeyid, $value) {
        var that = this;
        var sgv = new SettingGroupValue($settingkeyid, that.settingGroupId, $value);
        return $.ajax({
            type: 'POST',
            url: that.url,
            contentType: 'application/json',
            data: JSON.stringify(sgv),
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                console.log('new settingkey was submitted with value: ' + $value);
                return data;
            }
        });
    }

    remove($id) {
        var that = this;
        return $.ajax({
            type: 'DELETE',
            url: that.url + '/' + $id,
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function () {
                
            }
        });

    }
    
}