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


class SettingKeyAjaxCalls {

    constructor() {
        this.settingGroupId = 0;
        this.settingTemplateId = 0;
        this.url = OC.generateUrl('/apps/sendent/api/1.0/settingkey');
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
    showByKey($key) {
        var that = this;
        return $.ajax({
            type: 'GET',
            url: that.url + '/showByKey/' + $key,
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
    update($id, $key, $name, $valuetype, $templateid) {
        var that = this;
        return $.ajax({
            type: 'PUT',
            url: that.url + '/' + $id,
            contentType: 'application/json',
            data: '{"name" : "'+$name+'","key" : "'+$key+'", "valuetype" : "'+$valuetype+'", "templateid" : "'+ $templateid +'"}',
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function () {
                console.log('updated settingkey was submitted new name: ' + $name + ' and valuetype: ' + $valuetype);
            },
            error: function(){
                console.log("update error, trying to create settingkey with provided values...");
                create($key, $name, $valuetype);
            }
        });
    }

    create($key, $name, $valuetype, $templateid) {
        var that = this;
        return $.ajax({
            type: 'POST',
            url: that.url,
            contentType: 'application/json',
             data: '{"name" : "'+$name+'","key" : "'+$key+'", "valuetype" : "'+$valuetype+'", "templateid" : "'+ $templateid +'"}',
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                console.log('new settingkey was submitted named: ' + $name);
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