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
            <?php p($l->t('General')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Language')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="setlanguage">
                    <option value="en" selected>English</option>
                    <option value="nl">Nederlands</option>
                    <option value="fr">Français</option>
                    <option value="de">Deutsch</option>
                    <option value="it">Italiano</option>
                    <option value="es">Español</option>
                </select>
                <input type="hidden" name="settingkeyname" value="setlanguage">
                <input type="hidden" name="settingkeykey" value="20">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeyid" value="20">
            </div>
        </div>

        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Insert snippet location')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="insertatcursor">
                    <option selected value="True"><?php p($l->t('At cursor')); ?></option>
                    <option value="False"><?php p($l->t('Top of email body')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="insertatcursor">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="28">
                <input type="hidden" name="settingkeyid" value="28">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Add upload date to folder path')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="dateaddition">
                    <option selected value="True"><?php p($l->t('Add upload date to folder path')); ?></option>
                    <option value="False"><?php p($l->t('Do not add upload date to folder path')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="dateaddition">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="6">
                <input type="hidden" name="settingkeyid" value="6">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Debug mode')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="debugmode">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option value="False" selected><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="debugmode">
                <input type="hidden" name="settingkeykey" value="22">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeyid" value="22">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Access to settings')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="disablesettings">
                    <option value="False" selected><?php p($l->t('Enabled')); ?></option>
                    <option value="True"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="disablesettings">
                <input type="hidden" name="settingkeykey" value="17">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeyid" value="17">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Password control behavior')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="passwordcontrolbehavior">
                    <option value="Off"><?php p($l->t('Off')); ?></option>
                    <option value="BeforeSend" selected><?php p($l->t('Before sending')); ?></option>
                    <option value="BeforeSendAndAfter"><?php p($l->t('Before and after sending')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="passwordcontrolbehavior">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="19">
                <input type="hidden" name="settingkeyid" value="19">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Password communication mode')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="sendmode">
                    <option value="CurrentMail"><?php p($l->t('Include in email body')); ?></option>
                    <option selected value="Separate"><?php p($l->t('Send in separate email')); ?></option>
                    <option disabled value="External"><?php p($l->t('Use external service (like sms-gateway)')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="sendmode">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="23">
                <input type="hidden" name="settingkeyid" value="23">
            </div>
        </div>

        <div class="personal-settings-setting-box htmlSnippetPassword">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind">
                        <?php p($l->t('Password communication snippet')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="htmlsnippetpassword"></textarea>
                <input type="hidden" name="settingkeyname" value="htmlsnippetpassword">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="30">
                <input type="hidden" name="settingkeyid" value="30">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="domainExceptions">
        <h1>
            <?php p($l->t('Talk settings')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Generate password for meetings')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="generatetalkpassword">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="False"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="generatetalkpassword">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="201">
                <input type="hidden" name="settingkeyid" value="201">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="domainExceptions">
        <h1>
            <?php p($l->t('Domain settings')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Internal domain exceptions')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="attachmentdomainexceptionsinternal" value="" placeholder="yourdomain.com;info@yourotherdomain.com" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="attachmentdomainexceptionsinternal">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="2">
                <input type="hidden" name="settingkeyid" value="2">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('External domain exceptions')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalue" id="attachmentdomainexceptions" value="" placeholder="thirdparty-domain.com;info@thirdparty-domain.com" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="attachmentdomainexceptions">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="0">
                <input type="hidden" name="settingkeyid" value="0">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('External domain exception notification')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="attachmentdomainexceptionsexternalpopup">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="False"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="attachmentdomainexceptionsexternalpopup">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="31">
                <input type="hidden" name="settingkeyid" value="31">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="attachments">
        <h1>
            <?php p($l->t('Attachment settings')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname"><?php p($l->t('Attachment mode')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="attachmentmode">
                    <option selected value="MaximumAttachmentSize"><?php p($l->t('Trigger on maximum attachment size')); ?></option>
                    <option value="Ask"><?php p($l->t('Ask every time')); ?></option>
                    <option value="Off"><?php p($l->t('None')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="attachmentmode">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="3">
                <input type="hidden" name="settingkeyid" value="3">
            </div>
        </div>
        <div class="personal-settings-setting-box attachmentSize">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Auto upload attachment size (MB)')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="numeric" name="settingkeyvalueinput" id="attachmentsize" value="1" placeholder="e.g: 10" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="attachmentsize">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="4">
                <input type="hidden" name="settingkeyid" value="4">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="filehandling">
        <h1>
            <?php p($l->t('Share Files & Share Public Folder')); ?>
        </h1>

        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Path for Share Files')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathuploadfiles" value="" placeholder="e.g: /Outlook/Public-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">

                <input type="hidden" name="settingkeyname" value="pathuploadfiles">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="8">
                <input type="hidden" name="settingkeyid" value="8">

            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind">
                        <?php p($l->t('Share Files snippet')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="sharefilehtml"></textarea>
                <input type="hidden" name="settingkeyname" type="html" value="sharefilehtml">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="10">
                <input type="hidden" name="settingkeyid" value="10">

            </div>
        </div>

        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Path for Share Public Folder')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathpublicshare" value="" placeholder="e.g:/Outlook/Upload-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="pathpublicshare">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="7">
                <input type="hidden" name="settingkeyid" value="7">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind">
                        <?php p($l->t('Share Public Folder snippet')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="sharefolderhtml"></textarea>
                <input type="hidden" name="settingkeyname" value="sharefolderhtml">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="9">
                <input type="hidden" name="settingkeyid" value="9">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="securemail">
        <h1>
            <?php p($l->t('Secure Mail')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname"><?php p($l->t('Activate Secure Mail')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="securemail">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="False"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="securemail">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="11">
                <input type="hidden" name="settingkeyid" value="11">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Enforce Secure Mail')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="securemailenforced">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="False"><?php p($l->t('Disabled')); ?></option>
                </select>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input type="hidden" name="settingkeyname" value="securemailenforced">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="25">
                <input type="hidden" name="settingkeyid" value="25">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Path for Secure Mail')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathsecuremailbox" value="" placeholder="e.g: /Outlook/SecureMail-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="pathsecuremailbox">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="24">
                <input type="hidden" name="settingkeyid" value="24">


            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeynametextareakind">
                        <?php p($l->t('Secure Mail snippet')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html" id="securemailhtml"></textarea>
                <input type="hidden" name="settingkeyname" value="securemailhtml">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="12">
                <input type="hidden" name="settingkeyid" value="12">


            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="guestaccounts">
        <h1>
            <?php p($l->t('Guest accounts')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Activate Guest accounts')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" name="settingkeyvalueinput" id="guestaccountsenabled">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="False"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="guestaccountsenabled">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="27">
                <input type="hidden" name="settingkeyid" value="27">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Enforce Guest accounts')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="guestaccountsenforced">
                    <option value="True"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="False"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="guestaccountsenforced">
                <input type="hidden" name="settingkeytemplateid" value="0">
                <input type="hidden" name="settinggroupid" value="0">
                <input type="hidden" name="settingkeykey" value="26">
                <input type="hidden" name="settingkeyid" value="26">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailInclude section" id="AdvancedTheming">
        <h1>
            <?php p($l->t('Theming')); ?>
        </h1>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Advanced Theming enabled')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <select class="settingkeyvalueinput" name="settingkeyvalueinput" id="AdvancedThemingEnabled">
                    <option value="true"><?php p($l->t('Enabled')); ?></option>
                    <option selected value="false"><?php p($l->t('Disabled')); ?></option>
                </select>
                <input type="hidden" name="settingkeyname" value="AdvancedThemingEnabled">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="80">
                <input type="hidden" name="settingkeyid" value="80">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Vendor name')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="VendorName" value="" placeholder="Sendent" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="VendorName">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="104">
                <input type="hidden" name="settingkeyid" value="104">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button primary - color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonPrimaryColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="85">
                <input type="hidden" name="settingkeyid" value="85">
            </div>
        </div>

        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button primary - font-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonPrimaryFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="86">
                <input type="hidden" name="settingkeyid" value="86">
            </div>
        </div>

        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button primary - hover color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryHoverColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonPrimaryHoverColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="87">
                <input type="hidden" name="settingkeyid" value="87">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button primary - icon color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonPrimaryIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonPrimaryIconColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="97">
                <input type="hidden" name="settingkeyid" value="97">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button secondary - color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonSecondaryColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="88">
                <input type="hidden" name="settingkeyid" value="88">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button secondary - font-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonSecondaryFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="90">
                <input type="hidden" name="settingkeyid" value="90">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button secondary - hover color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryHoverColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonSecondaryHoverColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="89">
                <input type="hidden" name="settingkeyid" value="89">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Button secondary - icon color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="ButtonSecondaryIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="ButtonSecondaryIconColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="98">
                <input type="hidden" name="settingkeyid" value="98">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - footer background-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterBackgroundColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogFooterBackgroundColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="100">
                <input type="hidden" name="settingkeyid" value="100">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - footer font-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogFooterFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="101">
                <input type="hidden" name="settingkeyid" value="101">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - footer hover-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterHoverColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogFooterHoverColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="102">
                <input type="hidden" name="settingkeyid" value="102">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - footer icon color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogFooterIconColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="103">
                <input type="hidden" name="settingkeyid" value="103">
            </div>
        </div>
        <div class="personal-settings-setting-box">
            <div class="settingkeyvalue advancedTheming">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - footer icon background color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogFooterIconBackgroundColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogFooterIconBackgroundColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="82">
                <input type="hidden" name="settingkeyid" value="82">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - header color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogHeaderColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogHeaderColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="84">
                <input type="hidden" name="settingkeyid" value="84">
            </div>
        </div>

        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Dialog - header font-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="DialogHeaderFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="DialogHeaderFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="95">
                <input type="hidden" name="settingkeyid" value="95">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Popup - background color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="PopupBackgroundColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="PopupBackgroundColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="92">
                <input type="hidden" name="settingkeyid" value="92">
            </div>
        </div>

        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('General font - color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input id="GeneralFontColor" class="settingkeyvalueinput theming-color" name="settingkeyvalueinput" type="text" maxlength="7" value="" autocomplete="on" autocapitalize="none" autocorrect="off" />
                <input type="hidden" name="settingkeyname" value="GeneralFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="93">
                <input type="hidden" name="settingkeyid" value="93">
            </div>
        </div>

        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Icon - color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="GeneralIconColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="GeneralIconColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="81">
                <input type="hidden" name="settingkeyid" value="81">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Taskpane - Activity Tracker - color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneActivityTrackerColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="TaskpaneActivityTrackerColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="83">
                <input type="hidden" name="settingkeyid" value="83">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Taskpane - Activity Tracker - font-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneActivityTrackerFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="TaskpaneActivityTrackerFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="94">
                <input type="hidden" name="settingkeyid" value="94">
            </div>
        </div>

        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Taskpane - Secure Mail - color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneSecureMailColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="TaskpaneSecureMailColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="91">
                <input type="hidden" name="settingkeyid" value="91">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Taskpane - Secure Mail - font-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneSecureMailFontColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="TaskpaneSecureMailFontColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="96">
                <input type="hidden" name="settingkeyid" value="96">
            </div>
        </div>
        <div class="personal-settings-setting-box advancedTheming">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Taskpane - Secure Mail - control-color')); ?>
                    </span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput theming-color" type="text" name="settingkeyvalueinput" id="TaskpaneSecureMailControlColor" value="" placeholder="#FFFFFF" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="TaskpaneSecureMailControlColor">
                <input type="hidden" name="settingkeytemplateid" value="1">
                <input type="hidden" name="settinggroupid" value="1">
                <input type="hidden" name="settingkeykey" value="99">
                <input type="hidden" name="settingkeyid" value="99">
            </div>
        </div>
    </div>


    <div class="settingTemplateDetailExclude section" id="license">
        <h1>
            <?php p($l->t('License')); ?>
        </h1>
        <div class="license-settings-setting-box" id="licenseMessage">
            <div class="settingkeyvalue">

                <div class="labelFullWidth" id="lblLicenseMessage" style="display:grid;float:left;text-align:left;color:slate-gray;font-style:italic;font-size:smaller">
                <?php p($l->t('PLEASE NOTE: We made some adjustments in our licensing and will implement this gradually in several phases to our paid customers. If you haven\'t received your license key with instructions yet, you don\'t have to take action at this moment. You will receive a notification from our Team when it\'s your turn.')); ?>
                <br><br>
                <?php p($l->t('Using Sendent Free? Then you don\'t need a license key at all!')); ?>
                <br><br>
                </div>
                <input type="hidden" name="settingkeyname" value="licenseMessage">
                <input type="hidden" name="settingkeykey" value="1000">
                <input type="hidden" name="settingkeyid" value="1000">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licensekey">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('License key')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="licensekey" value=""
                    placeholder="Put your licensekey here" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="licensekey">
                <input type="hidden" name="settingkeykey" value="900">
                <input type="hidden" name="settingkeyid" value="900">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licenseEmail">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname">
                        <?php p($l->t('Licensed email address')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="licenseEmail" value=""
                    placeholder="Enter email address" autocomplete="on" autocapitalize="none" autocorrect="off">
                <input type="hidden" name="settingkeyname" value="licenseEmail">
                <input type="hidden" name="settingkeykey" value="901">
                <input type="hidden" name="settingkeyid" value="901">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licensebutton">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname"></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input type="button" id="btnLicenseActivation" value="Activate license">
                <input type="hidden" name="settingkeyname" value="licensebutton">
                <input type="hidden" name="settingkeykey" value="900">
                <input type="hidden" name="settingkeyid" value="900">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licenseClearButton">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname"></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input type="button" id="btnLicenseClear" value="Clear license">
                <input type="hidden" name="settingkeyname" value="licenseClearButton">
                <input type="hidden" name="settingkeykey" value="900">
                <input type="hidden" name="settingkeyid" value="900">
            </div>
        </div>

        <div class="license-settings-setting-box" id="licenselevel">
            <div class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem">
                    <?php p($l->t('Subscription level')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licenselevel"></span>
                <input type="hidden" name="settingkeyname" value="licenselevel">
                <input type="hidden" name="settingkeykey" value="902">
                <input type="hidden" name="settingkeyid" value="902">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licensestatus">
            <div class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem">
                    <?php p($l->t('License status')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licensestatus"></span>
                <input type="hidden" name="settingkeyname" value="licensestatus">
                <input type="hidden" name="settingkeykey" value="903">
                <input type="hidden" name="settingkeyid" value="903">
            </div>
        </div>

        <div class="license-settings-setting-box" id="licenseexpires">
            <div class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem">
                        <?php p($l->t('License expiration date')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licenseexpires"></span>
                <input type="hidden" name="settingkeyname" value="licenseexpires">
                <input type="hidden" name="settingkeykey" value="905">
                <input type="hidden" name="settingkeyid" value="905">
            </div>
        </div>
        <div class="license-settings-setting-box" id="licenselastcheck">
            <div class="settingkeyvalue">
                <label class="licenselabel">
                    <span class="templatesettingkeyname licenseitem">
                        <?php p($l->t('License last check')); ?></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <span class="settingkeyvalueinput licenseitem" name="settingkeyvalueinput" id="licenselastcheck"></span>
                <input type="hidden" name="settingkeyname" value="licenselastcheck">
                <input type="hidden" name="settingkeykey" value="904">
                <input type="hidden" name="settingkeyid" value="904">
            </div>
        </div>
        <div class="license-settings-setting-box" id="supportButton">
            <div class="settingkeyvalue">
                <label>
                    <span class="templatesettingkeyname"></span>
                </label>
                <div class="status-error icon-error error hidden"></div>
                <div class="status-ok icon-checkmark ok hidden"></div>
                <input type="button" id="btnSupportButton" value="Contact support">
                <input type="hidden" name="settingkeyname" value="supportButton">
                <input type="hidden" name="settingkeykey" value="1100">
                <input type="hidden" name="settingkeyid" value="1100">
            </div>
        </div>


        <div class="licensesection test" id="licensesection">

        </div>
    </div>

    <?php print_unescaped($this->inc('content/retentionAssistant')); ?>

</form>
