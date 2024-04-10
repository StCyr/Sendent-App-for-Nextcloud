<div class="section" id="filehandling">
    <h2>
        <?php p($l->t('Share Files & Public share')); ?>
    </h2>

    <div class="personal-settings-setting-box">
        <div class="settingkeyvalue">
            <label>
                <span class="templatesettingkeyname">
                    <?php p($l->t('Path for Share Files')); ?>
                </span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathuploadfiles" value=""
                placeholder="e.g: /Outlook/Public-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
            <label style="display:none">
                <input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
                <span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
            </label>
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
            <details>
                <summary><?php p($l->t('Toggle editor')); ?></summary>

                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html"
                    id="sharefilehtml"></textarea>
				<label style="display:none">
					<input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
					<span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
				</label>
            </details>
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
                    <?php p($l->t('Path for Public share')); ?>
                </span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <input class="settingkeyvalueinput" type="text" name="settingkeyvalueinput" id="pathpublicshare" value=""
                placeholder="e.g:/Outlook/Upload-Share/" autocomplete="on" autocapitalize="none" autocorrect="off">
            <label style="display:none">
                <input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
                <span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
            </label>
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
                    <?php p($l->t('Public share snippet')); ?>
                </span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <details>
                <summary><?php p($l->t('Toggle editor')); ?></summary>

                <textarea class="settingkeyvalueinput" name="settingkeyvalueinput" type="html"
                id="sharefolderhtml"></textarea>
				<label style="display:none">
					<input class="settingkeyvalueinheritedcheckbox"  type="checkbox" />
					<span class="settingkeyvalueinheritedlabel"><?php p($l->t('Use default group settings'));?></span>
				</label>
            </details>
            <input type="hidden" name="settingkeyname" value="sharefolderhtml">
            <input type="hidden" name="settingkeytemplateid" value="0">
            <input type="hidden" name="settinggroupid" value="0">
            <input type="hidden" name="settingkeykey" value="9">
            <input type="hidden" name="settingkeyid" value="9">
        </div>
    </div>
</div>
