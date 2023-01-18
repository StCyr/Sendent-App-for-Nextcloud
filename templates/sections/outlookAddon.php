<div class="settingTemplateDetailExclude section" id="outlookAddon">
	<h1>
        <?php p($l->t('Outlook Add-in version information')); ?>
	</h1>
    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Latest Outlook Add-in version')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <span class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersion"></span>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersion">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>
    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Releasedate')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <span class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersionReleaseDate"></span>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersionReleaseDate">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>
    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Downloadlink')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <a style="color:blue; text-decoration:underline;" class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersionDownload"><?php p($l->t('Download')); ?></a> <br>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersionDownload">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>

    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Releasenotes')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <a style="color:blue; text-decoration:underline;" class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersionReleaseNotes"><?php p($l->t('Open')); ?></a> <br>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersionReleaseNotes">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>
    <!-- <div class="license-settings-setting-box">
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
    </div> -->
</div>
