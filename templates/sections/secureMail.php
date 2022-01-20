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
            <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathsecuremailbox" value=""
                placeholder="e.g: /Outlook/SecureMail-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
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
            <details>
                <summary><?php p($l->t('Toggle editor')); ?></summary>

                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html"
                    id="securemailhtml"></textarea>
            </details>
            <input type="hidden" name="settingkeyname" value="securemailhtml">
            <input type="hidden" name="settingkeytemplateid" value="0">
            <input type="hidden" name="settinggroupid" value="0">
            <input type="hidden" name="settingkeykey" value="12">
            <input type="hidden" name="settingkeyid" value="12">


        </div>
    </div>
</div>
