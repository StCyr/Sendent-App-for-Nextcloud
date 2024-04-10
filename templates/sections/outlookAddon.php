<div class=" section" id="outlookAddon">
	<h2>
        <?php p($l->t('Outlook Add-in version information')); ?>
	</h2>
    <div class="license-settings-setting-box" id="outlookAddon_Latestversion">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Latest downloadable version')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <span class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersion"></span><span class="badge" id="newbadge">New</span>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersion">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>
    <div class="license-settings-setting-box" id="outlookAddon_Releasedate">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Release date')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <span class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersionReleaseDate"></span>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersionReleaseDate">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>
    <div class="license-settings-setting-box" id="outlookAddon_download">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Download latest version')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <a style="color:blue; text-decoration:underline;" class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersionDownload"><?php p($l->t('Download')); ?></a> <br>
            <input type="hidden" name="settingkeyname" value="latestVSTOVersionDownload">
            <input type="hidden" name="settingkeykey" value="905">
            <input type="hidden" name="settingkeyid" value="905">
        </div>
    </div>

    <div class="license-settings-setting-box" id="outlookAddon_releasenotes">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname statusitem">
                    <?php p($l->t('Release notes')); ?></span>
            </label>
            <div class="status-error icon-error error hidden"></div>
            <div class="status-ok icon-checkmark ok hidden"></div>
            <a style="color:blue; text-decoration:underline;" target="_Blank" class="statuskeyvalueinput statusitem" name="statuskeyvalueinput" id="latestVSTOVersionReleaseNotes"><?php p($l->t('Open')); ?></a> <br>
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
