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
            <input class="settingkeyvalueinput multiValueInput" type="text" name="settingkeyvalueinput"
                id="attachmentdomainexceptionsinternal" value="" placeholder="yourdomain.com;info@yourotherdomain.com"
                autocomplete="on" autocapitalize="none" autocorrect="off">
            <div class="multiInputContainer"></div>
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
            <input class="settingkeyvalueinput multiValueInput" type="text" name="settingkeyvalue" id="attachmentdomainexceptions"
                value="" placeholder="thirdparty-domain.com;info@thirdparty-domain.com" autocomplete="on"
                autocapitalize="none" autocorrect="off">
            <div class="multiInputContainer"></div>
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
            <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput"
                id="attachmentdomainexceptionsexternalpopup">
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
