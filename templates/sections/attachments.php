<div class="settingTemplateDetailInclude section" id="attachments">
    <h2>
        <?php p($l->t('Attachment settings and sender exceptions')); ?>
    </h2>
    <div class="personal-settings-setting-box">
        <div class="settingkeyvalue">
            <label>
                <span class="templatesettingkeyname"><?php p($l->t('Attachment mode')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <select class="settingkeyvalueinput" type="select" name="settingkeyvalueinput" id="attachmentmode">
                <option selected value="MaximumAttachmentSize"><?php p($l->t('Trigger on maximum attachment size')); ?>
                </option>
                <option value="Ask"><?php p($l->t('Ask every time')); ?></option>
                <option value="Off"><?php p($l->t('None')); ?></option>
            </select>
            <label style="display:none">
                <input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
                <span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
            </label>
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
            <input class="settingkeyvalueinput" type="numeric" name="settingkeyvalueinput" id="attachmentsize" value="1"
                placeholder="e.g: 10" autocomplete="on" autocapitalize="none" autocorrect="off">
            <label style="display:none">
                <input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
                <span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
            </label>
            <input type="hidden" name="settingkeyname" value="attachmentsize">
            <input type="hidden" name="settingkeytemplateid" value="0">
            <input type="hidden" name="settinggroupid" value="0">
            <input type="hidden" name="settingkeykey" value="4">
            <input type="hidden" name="settingkeyid" value="4">
        </div>
    </div>
    <div class="personal-settings-setting-box">
        <div class="settingkeyvalue">
            <label>
                <span class="templatesettingkeyname">
                    <?php p($l->t('Sender exceptions')); ?>
                </span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <input class="settingkeyvalueinput multiValueInput" type="text" name="settingkeyvalueinput"
                id="senderexceptions" value="" placeholder="foobar@acme.org"
                autocomplete="on" autocapitalize="none" autocorrect="off">
            <div class="multiInputContainer"></div>
            <input type="hidden" name="settingkeyname" value="senderexceptions">
            <input type="hidden" name="settingkeytemplateid" value="0">
            <input type="hidden" name="settinggroupid" value="0">
            <input type="hidden" name="settingkeykey" value="5">
            <input type="hidden" name="settingkeyid" value="5">
        </div>
    </div>

</div>
