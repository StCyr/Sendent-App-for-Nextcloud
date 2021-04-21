<?php
script('sendent', '3rdparty/jscolor/jscolor');
script('sendent', ['script']);
script('sendent', ['LicenseScript']);
script('sendent', ['SettingKeyScript']);
script('sendent', ['SettingGroupValueScript']);
script('sendent', ['SettingCreator']);
style('sendent', ['style']);
?>

<form class="form" method="post" id="settingsform">

    
    <div class="settingTemplateDetailInclude section" id="generalsettings">
        <h1>
            General
        </h1>
        <div class="personal-settings-setting-box" id="setlanguage">
            <div id="setlanguage" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Language</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="setlanguage">
                    <option value="en" selected>English</option>
                    <option value="nl">Nederlands</option>
                    <option value="fr">Français</option>
                    <option value="de">Deutsch</option>
                    <option value="it">Italiano</option>
                    <option value="es">Español</option>
                </select>
                <input type="hidden" id="settingkeyname" value="setlanguage">
                <input type="hidden" id="settingkeykey" value="20">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeyid" value="20">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="insertatcursor">
            <div id="insertatcursor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Insert snippet location</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="insertatcursor">
                    <option selected value="True">At cursor</option>
                    <option value="False">Top of email body</option>
                </select>
                <input type="hidden" id="settingkeyname" value="insertatcursor">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="28">
                <input type="hidden" id="settingkeyid" value="28">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="dateaddition">
            <div id="dateaddition" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Add upload date to folder path</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="dateaddition">
                    <option selected value="True">Add upload date to folder path</option>
                    <option value="False">Do not add upload date to folder path</option>
                </select>
                <input type="hidden" id="settingkeyname" value="dateaddition">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="6">
                <input type="hidden" id="settingkeyid" value="6">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="debugmode">
            <div id="debugmode" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Debug mode</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="debugmode">
                    <option value="True">Enabled</option>
                    <option value="False" selected>Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="debugmode">
                <input type="hidden" id="settingkeykey" value="22">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeyid" value="22">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="disablesettings">
            <div id="disablesettings" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Access to settings</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="disablesettings">
                    <option value="False" selected>Enabled</option>
                    <option value="True">Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="disablesettings">
                <input type="hidden" id="settingkeykey" value="17">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeyid" value="17">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="passwordcontrolbehavior">
            <div id="passwordcontrolbehavior" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Password control behavior</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="passwordcontrolbehavior">
                    <option value="Off">Off</option>
                    <option value="BeforeSend" selected>Before sending</option>
                    <option value="BeforeSendAndAfter">Before and after sending</option>
                </select>
                <input type="hidden" id="settingkeyname" value="passwordcontrolbehavior">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="19">
                <input type="hidden" id="settingkeyid" value="19">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="sendmode">
            <div id="sendmode" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Password communication mode</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="sendmode">
                    <option value="CurrentMail">Include in email body</option>
                    <option selected value="Separate">Send in separate email</option>
                    <option disabled value="External">Use external service (like sms-gateway)</option>
                </select>
                <input type="hidden" id="settingkeyname" value="sendmode">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="23">
                <input type="hidden" id="settingkeyid" value="23">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="htmlsnippetpassword">
            <div id="htmlsnippetpassword" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind" for="templatesettingkeyname">Password communication snippet</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="htmlsnippetpassword"></textarea>
                <input type="hidden" id="settingkeyname" value="htmlsnippetpassword">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="30">
                <input type="hidden" id="settingkeyid" value="30">
            </div>
        </div>
    </div>

    <div class="settingTemplateDetailInclude section" id="domainExceptions">
        <h1>
            Domain settings
        </h1>
        <div class="personal-settings-setting-box" id="attachmentdomainexceptionsinternal">
            <div id="attachmentdomainexceptionsinternal" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Internal domain exceptions</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="attachmentdomainexceptionsinternal" value="" placeholder="yourdomain.com;info@yourotherdomain.com" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="attachmentdomainexceptionsinternal">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="2">
                <input type="hidden" id="settingkeyid" value="2">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="attachmentdomainexceptions">
            <div id="attachmentdomainexceptions" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">External domain exceptions</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalue" id="attachmentdomainexceptions" value="" placeholder="thirdparty-domain.com;info@thirdparty-domain.com" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="attachmentdomainexceptions">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="0">
                <input type="hidden" id="settingkeyid" value="0">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="attachmentdomainexceptionsexternalpopup">
            <div id="attachmentdomainexceptionsexternalpopup" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">External domain exception notification</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="attachmentdomainexceptionsexternalpopup">
                    <option value="True">Enabled</option>
                    <option selected value="False">Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="attachmentdomainexceptionsexternalpopup">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="31">
                <input type="hidden" id="settingkeyid" value="31">
            </div>
        </div>
    </div>

    <div class="settingTemplateDetailInclude section" id="attachments">
        <h1>
            Attachment settings
        </h1>
        <div class="personal-settings-setting-box" id="attachmentmode">
            <div id="attachmentmode" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Attachment mode</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="attachmentmode">
                    <option selected value="MaximumAttachmentSize">Trigger on maximum attachment size</option>
                    <option value="Ask">Ask every time</option>
                    <option value="Off">None</option>
                </select>
                <input type="hidden" id="settingkeyname" value="attachmentmode">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="3">
                <input type="hidden" id="settingkeyid" value="3">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="attachmentsize">
            <div id="attachmentsize" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Auto upload attachment size
                        (MB)</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="numeric" name="settingkeyvalueinput" id="attachmentsize" value="1" placeholder="e.g: 10" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="attachmentsize">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="4">
                <input type="hidden" id="settingkeyid" value="4">


            </div>
        </div>
    </div>
    <div class="settingTemplateDetailInclude section" id="filehandling">
        <h1>
            Share Files & Share Public Folder
        </h1>

        <div class="personal-settings-setting-box" id="pathuploadfiles">
            <div id="pathuploadfiles" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Path for Share Files</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathuploadfiles" value="" placeholder="e.g: /Outlook/Public-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">

                <input type="hidden" id="settingkeyname" value="pathuploadfiles">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="8">
                <input type="hidden" id="settingkeyid" value="8">

            </div>
        </div>
        <div class="personal-settings-setting-box" id="sharefilehtml">
            <div id="sharefilehtml" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind" for="templatesettingkeyname">Share Files
                        snippet</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="sharefilehtml"></textarea>
                <input type="hidden" id="settingkeyname" type="html" value="sharefilehtml">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="10">
                <input type="hidden" id="settingkeyid" value="10">

            </div>
        </div>

        <div class="personal-settings-setting-box" id="pathpublicshare">
            <div id="pathpublicshare" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Path for Share Public
                        Folder</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathpublicshare" value="" placeholder="e.g:/Outlook/Upload-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="pathpublicshare">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="7">
                <input type="hidden" id="settingkeyid" value="7">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="sharefolderhtml">
            <div id="sharefolderhtml" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind" for="templatesettingkeyname">Share Public Folder
                        snippet</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="sharefolderhtml"></textarea>
                <input type="hidden" id="settingkeyname" value="sharefolderhtml">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="9">
                <input type="hidden" id="settingkeyid" value="9">
            </div>
        </div>


    </div>
    <div class="settingTemplateDetailInclude section" id="securemail">
        <h1>
            Secure Mail
        </h1>
        <div class="personal-settings-setting-box" id="securemail">
            <div id="securemail" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Activate Secure Mail</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="securemail">
                    <option value="True">Enabled</option>
                    <option selected value="False">Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="securemail">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="11">
                <input type="hidden" id="settingkeyid" value="11">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="securemailenforced">
            <div id="securemailenforced" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Enforce Secure Mail</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="securemailenforced">
                    <option value="True">Enabled</option>
                    <option selected value="False">Disabled</option>
                </select>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input type="hidden" id="settingkeyname" value="securemailenforced">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="25">
                <input type="hidden" id="settingkeyid" value="25">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="pathsecuremailbox">
            <div id="pathsecuremailbox" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Path for Secure Mail</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathsecuremailbox" value="" placeholder="e.g: /Outlook/SecureMail-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="pathsecuremailbox">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="24">
                <input type="hidden" id="settingkeyid" value="24">


            </div>
        </div>
        <div class="personal-settings-setting-box" id="securemailhtml">
            <div id="securemailhtml" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind" for="templatesettingkeyname">Secure Mail snippet</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="securemailhtml"></textarea>
                <input type="hidden" id="settingkeyname" value="securemailhtml">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="12">
                <input type="hidden" id="settingkeyid" value="12">


            </div>
        </div>
    </div>

    <div class="settingTemplateDetailInclude section" id="guestaccounts">
        <h1>
            Guest accounts
        </h1>
        <div class="personal-settings-setting-box" id="guestaccountsenabled">
            <div id="guestaccountsenabled" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Activate Guest accounts</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" name="settingkeyvalueinput" id="guestaccountsenabled">
                    <option value="True">Enabled</option>
                    <option selected value="False">Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="guestaccountsenabled">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="27">
                <input type="hidden" id="settingkeyid" value="27">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="guestaccountsenforced">
            <div id="guestaccountsenforced" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Enforce Guest accounts</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="guestaccountsenforced">
                    <option value="True">Enabled</option>
                    <option selected value="False">Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="guestaccountsenforced">
                <input type="hidden" id="settingkeytemplateid" value="0">
                <input type="hidden" id="settinggroupid" value="0">
                <input type="hidden" id="settingkeykey" value="26">
                <input type="hidden" id="settingkeyid" value="26">
            </div>
        </div>


    </div>

    <div class="settingTemplateDetailInclude section" id="AdvancedTheming">
        <h1>
            Theming
        </h1>
        <div class="personal-settings-setting-box" id="AdvancedThemingEnabled">
            <div id="AdvancedThemingEnabled" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Advanced Theming enabled</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" name="settingkeyvalueinput" id="AdvancedThemingEnabled">
                    <option value="true">Enabled</option>
                    <option selected value="false">Disabled</option>
                </select>
                <input type="hidden" id="settingkeyname" value="AdvancedThemingEnabled">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="80">
                <input type="hidden" id="settingkeyid" value="80">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="VendorName">
            <div id="VendorName" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Vendor name  
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="VendorName" value="" placeholder="Sendent" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="VendorName">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="104">
                <input type="hidden" id="settingkeyid" value="104">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="ButtonPrimaryColor">
            <div id="ButtonPrimaryColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button primary - color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonPrimaryColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="85">
                <input type="hidden" id="settingkeyid" value="85">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="ButtonPrimaryFontColor">
            <div id="ButtonPrimaryFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button primary - font-color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonPrimaryFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="86">
                <input type="hidden" id="settingkeyid" value="86">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="ButtonPrimaryHoverColor">
            <div id="ButtonPrimaryHoverColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button primary - hover color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryHoverColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonPrimaryHoverColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="87">
                <input type="hidden" id="settingkeyid" value="87">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="ButtonPrimaryIconColor">
            <div id="ButtonPrimaryIconColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button primary - icon color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonPrimaryIconColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="97">
                <input type="hidden" id="settingkeyid" value="97">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="ButtonSecondaryColor">
            <div id="ButtonSecondaryColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button secondary - color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonSecondaryColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="88">
                <input type="hidden" id="settingkeyid" value="88">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="ButtonSecondaryFontColor">
            <div id="ButtonSecondaryFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button secondary - font-color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonSecondaryFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="90">
                <input type="hidden" id="settingkeyid" value="90">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="ButtonSecondaryHoverColor">
            <div id="ButtonSecondaryHoverColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button secondary - hover color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryHoverColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonSecondaryHoverColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="89">
                <input type="hidden" id="settingkeyid" value="89">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="ButtonSecondaryIconColor">
            <div id="ButtonSecondaryIconColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Button secondary - icon color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="ButtonSecondaryIconColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="98">
                <input type="hidden" id="settingkeyid" value="98">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="DialogFooterBackgroundColor">
            <div id="DialogFooterBackgroundColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - footer background-color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterBackgroundColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogFooterBackgroundColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="100">
                <input type="hidden" id="settingkeyid" value="100">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="DialogFooterFontColor">
            <div id="DialogFooterFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - footer font-color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogFooterFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="101">
                <input type="hidden" id="settingkeyid" value="101">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="DialogFooterHoverColor">
            <div id="DialogFooterHoverColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - footer hover-color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterHoverColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogFooterHoverColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="102">
                <input type="hidden" id="settingkeyid" value="102">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="DialogFooterIconColor">
            <div id="DialogFooterIconColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - footer icon color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogFooterIconColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="103">
                <input type="hidden" id="settingkeyid" value="103">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="DialogFooterIconBackgroundColor">
            <div id="DialogFooterIconBackgroundColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - footer icon background color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterIconBackgroundColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogFooterIconBackgroundColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="82">
                <input type="hidden" id="settingkeyid" value="82">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="DialogHeaderColor">
            <div id="DialogHeaderColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - header color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogHeaderColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogHeaderColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="84">
                <input type="hidden" id="settingkeyid" value="84">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="DialogHeaderFontColor">
            <div id="DialogHeaderFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Dialog - header font-color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogHeaderFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="DialogHeaderFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="95">
                <input type="hidden" id="settingkeyid" value="95">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="PopupBackgroundColor">
            <div id="PopupBackgroundColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Popup - background color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="PopupBackgroundColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="PopupBackgroundColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="92">
                <input type="hidden" id="settingkeyid" value="92">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="GeneralFontColor" style="display:none">
            <div id="GeneralFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">General font - color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input id="GeneralFontColor" class="settingkeyvalueinput theming-color" name="settingkeyvalueinput" type="text" maxlength="7" value="" autocomplete="on" autocapitalize="none" autocorrect="off" />
                <input type="hidden" id="settingkeyname" value="GeneralFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="93">
                <input type="hidden" id="settingkeyid" value="93">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="GeneralIconColor">
            <div id="GeneralIconColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Icon - color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="GeneralIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="GeneralIconColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="81">
                <input type="hidden" id="settingkeyid" value="81">
            </div>
        </div>





        <div class="personal-settings-setting-box" id="TaskpaneActivityTrackerColor">
            <div id="TaskpaneActivityTrackerColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Taskpane - Activity Tracker - color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneActivityTrackerColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="TaskpaneActivityTrackerColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="83">
                <input type="hidden" id="settingkeyid" value="83">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="TaskpaneActivityTrackerFontColor">
            <div id="TaskpaneActivityTrackerFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Taskpane - Activity Tracker - font-color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneActivityTrackerFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="TaskpaneActivityTrackerFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="94">
                <input type="hidden" id="settingkeyid" value="94">
            </div>
        </div>

        <div class="personal-settings-setting-box" id="TaskpaneSecureMailColor">
            <div id="TaskpaneSecureMailColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Taskpane - Secure Mail - color</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneSecureMailColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="TaskpaneSecureMailColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="91">
                <input type="hidden" id="settingkeyid" value="91">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="TaskpaneSecureMailFontColor">
            <div id="TaskpaneSecureMailFontColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Taskpane - Secure Mail - font-color
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneSecureMailFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="TaskpaneSecureMailFontColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="96">
                <input type="hidden" id="settingkeyid" value="96">
            </div>
        </div>
        <div class="personal-settings-setting-box" id="TaskpaneSecureMailControlColor">
            <div id="TaskpaneSecureMailControlColor" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Taskpane - Secure Mail - control-color    
                    </span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneSecureMailControlColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="TaskpaneSecureMailControlColor">
                <input type="hidden" id="settingkeytemplateid" value="1">
                <input type="hidden" id="settinggroupid" value="1">
                <input type="hidden" id="settingkeykey" value="99">
                <input type="hidden" id="settingkeyid" value="99">
            </div>
        </div>
    </div>
    <div class="settingTemplateDetailExclude section" id="license">
        <h1>
            License
        </h1>
        <div class="license-settings-setting-box" id="licenseMessage">
            <div id="licenseMessage" class="settingkeyvalue">
               
                <div class="labelFullWidth" id="lblLicenseMessage" style="display:grid;float:left;text-align:left;color:slate-gray;font-style:italic;font-size:smaller">
                PLEASE NOTE: We made some adjustments in our licensing and will implement this gradually in several phases to our paid customers. If you haven't received your license key with instructions yet, you don't have to take action at this moment. You will receive a notification from our Team when it's your turn.<br><br>
                Using Sendent Free? Then you don't need a license key at all!<br><br>
                </div>
                <input type="hidden" id="settingkeyname" value="licenseMessage">
                <input type="hidden" id="settingkeykey" value="1000">
                <input type="hidden" id="settingkeyid" value="1000">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licensekey">
            <div id="licensekey" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">License key</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="licensekey" value=""
                    placeholder="Put your licensekey here" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="licensekey">
                <input type="hidden" id="settingkeykey" value="900">
                <input type="hidden" id="settingkeyid" value="900">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licenseEmail">
            <div id="licenseEmail" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname">Licensed email address</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="licenseEmail" value=""
                    placeholder="Enter email address" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" id="settingkeyname" value="licenseEmail">
                <input type="hidden" id="settingkeykey" value="901">
                <input type="hidden" id="settingkeyid" value="901">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licensebutton">
            <div id="licensebutton" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname"></span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input type="button" id="btnLicenseActivation" value="Activate license">
                <input type="hidden" id="settingkeyname" value="licensebutton">
                <input type="hidden" id="settingkeykey" value="900">
                <input type="hidden" id="settingkeyid" value="900">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licenseClearButton">
            <div id="licenseClearButton" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname"></span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input type="button" id="btnLicenseActivation" value="Clear license">
                <input type="hidden" id="settingkeyname" value="licenseClearButton">
                <input type="hidden" id="settingkeykey" value="900">
                <input type="hidden" id="settingkeyid" value="900">
            </div>
        </div>
        
        <div class="license-settings-setting-box" id="licenselevel">
            <div id="licenselevel" class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem" for="templatesettingkeyname">Subscription
                        level</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licenselevel"></span>
                <input type="hidden" id="settingkeyname" value="licenselevel">
                <input type="hidden" id="settingkeykey" value="902">
                <input type="hidden" id="settingkeyid" value="902">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licensestatus">
            <div id="licensestatus" class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem" for="templatesettingkeyname">License status</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licensestatus"></span>
                <input type="hidden" id="settingkeyname" value="licensestatus">
                <input type="hidden" id="settingkeykey" value="903">
                <input type="hidden" id="settingkeyid" value="903">
            </div>
        </div>
        
        <div class="license-settings-setting-box" id="licenseexpires">
            <div id="licenseexpires" class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem" for="templatesettingkeyname">License
                        expiration date</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licenseexpires"></span>
                <input type="hidden" id="settingkeyname" value="licenseexpires">
                <input type="hidden" id="settingkeykey" value="905">
                <input type="hidden" id="settingkeyid" value="905">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licenselastcheck">
            <div id="licenselastcheck" class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem" for="templatesettingkeyname">License last
                        check</span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licenselastcheck"></span>
                <input type="hidden" id="settingkeyname" value="licenselastcheck">
                <input type="hidden" id="settingkeykey" value="904">
                <input type="hidden" id="settingkeyid" value="904">
            </div>
        </div>
        <div class="license-settings-setting-box" id="supportButton">
            <div id="supportButton" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname"></span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input type="button" id="btnSupportButton" value="Contact support">
                <input type="hidden" id="settingkeyname" value="supportButton">
                <input type="hidden" id="settingkeykey" value="1100">
                <input type="hidden" id="settingkeyid" value="1100">
            </div>
        </div>
        <div class="licensesection test" id="licensesection">

        </div>
        <!-- <div class="license-settings-setting-box" id="addinDownload">
            <div id="addinDownload" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname"></span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <input type="button" id="btnAddinDownload" value="Download latest add-in version">
                <input type="hidden" id="settingkeyname" value="addinDownload">
                <input type="hidden" id="settingkeykey" value="1000">
                <input type="hidden" id="settingkeyid" value="1000">
            </div>
        </div>
        <div class="license-settings-setting-box" id="addinDownload">
            <div id="addinDownload" class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname" for="templatesettingkeyname"></span>
                </label>
                <div id="status-error" class="icon-error error hidden"></div>
                <div id="status-ok" class="icon-checkmark ok hidden"></div>
                <div id="lblAddinDownload" style="text-align:center;color:darkgray;font-size:smaller;font-style:italic">This downloadable add-in version reverts to Free edition if no license key is applied.</div>
                <input type="hidden" id="settingkeyname" value="addinDownload">
                <input type="hidden" id="settingkeykey" value="1000">
                <input type="hidden" id="settingkeyid" value="1000">
            </div>
        </div> -->
    </div>

</form>