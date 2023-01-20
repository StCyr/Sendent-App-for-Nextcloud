<div class="settingTemplateDetailExclude section" id="defaultLicenseStatus">

    <h2>
        <?php p($l->t('Default license information')); ?>
    </h2>

    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname licenseitem">
                    <?php p($l->t('Subscription level')); ?></span>
            </label>
            <span class="statuskeyvalueinput statusitem"><?php p($_['defaultLicenseLevel']); ?></span>
        </div>
    </div>
    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname licenseitem">
                    <?php p($l->t('License status')); ?></span>
            </label>
            <span class="statuskeyvalueinput statusitem"><?php p($_['defaultLicenseStatus']); ?></span>
        </div>
    </div>

    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname licenseitem">
                    <?php p($l->t('License expiration date')); ?></span>
            </label>
            <span class="statuskeyvalueinput statusitem"><?php p($_['defaultLicenseExpirationDate']); ?></span>
        </div>
    </div>
    <div class="license-settings-setting-box">
        <div class="settingkeyvalue">
            <label class="licenselabel">
                <span class="templatesettingkeyname licenseitem">
                    <?php p($l->t('License last check')); ?></span>
            </label>
            <span class="statuskeyvalueinput statusitem"><?php p($_['defaultLicenseLastCheck']); ?></span>
        </div>
    </div>

    <div class="labelFullWidth" style="display:grid;float:left;text-align:left;color:slate-gray;font-style:italic;font-size:smaller">
        <p><?php p($l->t('To make changes to your license(s), please head out to the "Client Settings" tab.')); ?> 
    </div>
</div>
