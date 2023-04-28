<div class="settingTemplateDetailInclude section" id="talk">
    <h2>
        <?php p($l->t('Talk settings')); ?>
    </h2>
    <div class="personal-settings-setting-box">
        <div class="settingkeyvalue">
            <label>
                <span class="templatesettingkeyname">
                <?php p($l->t('Activate')); ?> Talk
                </span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="talkenabled">
                <option value="True"><?php p($l->t('Enabled')); ?></option>
                <option selected value="False"><?php p($l->t('Disabled')); ?></option>
            </select>
            <label style="display:none">
                <input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
                <span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
            </label>
            <input type="hidden" name="settingkeyname" value="talkenabled">
            <input type="hidden" name="settingkeytemplateid" value="0">
            <input type="hidden" name="settinggroupid" value="0">
            <input type="hidden" name="settingkeykey" value="202">
            <input type="hidden" name="settingkeyid" value="202">
        </div>
    </div>
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
            <label style="display:none">
                <input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
                <span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
            </label>
            <input type="hidden" name="settingkeyname" value="generatetalkpassword">
            <input type="hidden" name="settingkeytemplateid" value="0">
            <input type="hidden" name="settinggroupid" value="0">
            <input type="hidden" name="settingkeykey" value="201">
            <input type="hidden" name="settingkeyid" value="201">
        </div>
    </div>
</div>
