$(document).ready(function () {
    var that = this;
    that.settingTemplateCalls = new SettingTemplateAjaxCalls("settingTemplateList");
    that.settingTemplateCalls.list();
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


class SettingTemplateAjaxCalls {

    constructor(tableBodyClass) {
        this.url = OC.generateUrl('/apps/sendent/api/1.0/settingtemplate');
        this._tableBodyClass = tableBodyClass;
    }
get bodyClass() {
    return this._tableBodyClass;
}
set bodyClass(tableBodyClass)
{
    this._tableBodyClass = tableBodyClass;
}
    list() {
        var that = this;
        $.ajax({
            type: 'GET',
            url: that.url,
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                
                $.each(data, function (index, element) {
                    $('#' + that.bodyClass).append(that.getListItemBlock(element.id, element.templatename));
                    
                    var edit = document.querySelector('#settingtemplate-edit-' + element.id);
                    edit.addEventListener("click", that.showSettingTemplateBtnClick, false);
                    edit.templateId = element.id;
                    edit.templateName = element.templatename;
                })}
                    //document.getElementById(element.id).OnClick('remove('+element.id+')');
        });
    }
    getListItemBlock($id, $name)
    {
        var settingTemplateEditingBlock = '<a href="#" class="app-content-list-item" id="settingtemplate-edit-'+$id+'">'+
'            <div class="app-content-list-item-line-one">'+$name+'</div>'+
'            <div class="icon-edit"></div>' + 
'        </a>';
        return settingTemplateEditingBlock;
    }
    getSettingTemplateKeyBlock($templateid, $settingkeyid, $settingkeyname, $settingkeyvalue)
    {
        var settingKeyEditingBlock = 
        '       <div class="personal-settings-setting-box">'+
        '			<form id="settingKeyForm" class="section">'+
        '				<h3>'+
        '					<label for="templatesettingkeyname">'+$settingkeyname+'</label>'+
        '				</h3>'+
        '				<input type="text" name="settingkeyvalue" id="settingkeyvalue" value="'+$settingkeyvalue+'" placeholder="" autocomplete="on" autocapitalize="none" autocorrect="off">'+
        '				<input type="hidden" id="settingkeyid" value="'+$settingkeyid+'">'+
        '				<input type="hidden" id="templateid" value="'+$templateid+'">'+
        '			</form>'+
        '		</div>';
        return settingKeyEditingBlock;
    }

    showSettingTemplateBtnClick($element)
    {   
        var settingKeyCalls = new SettingKeyAjaxCalls('settingTemplateDetailInclude');    
        settingKeyCalls.list($element.currentTarget.templateId);
    }

    editSettingTemplateBtnClick($element)
    {
        
    }

    show($id) {
        var that = this;
        $.ajax({
            type: 'GET',
            url: that.url + '/' + $id,
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function (data) {
                return data;
            }
        });
    }

    update($id, $name) {
        var that = this;
        $.ajax({
            type: 'PUT',
            url: that.url + '/' + $id,
            contentType: 'application/json',
            data: '{"templatename" : "'+$name+'"}',
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function () {
                console.log('updated template was submitted new name: ' + $name);
                that.list();
            }
        });
    }

    create($name) {
        var that = this;
        $.ajax({
            type: 'POST',
            url: that.url,
            contentType: 'application/json',
            data: '{"templatename" : "'+$name+'"}',
            beforeSend: function (request) {
                //request.setRequestHeader("requesttoken", token);
                //request.setRequestHeader("OCS-APIRequest", true);
            },
            success: function () {
                console.log('new template was submitted named: ' + $name);
                that.list();
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