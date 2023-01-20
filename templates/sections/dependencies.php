<div class="settingTemplateDetailExclude section">

    <h2>
        <?php p($l->t('Dependencies')); ?>
    </h2>

    <div style="display: flex; flex-direction: row">
        <div style="min-width: 270px">
            <h1>
                <?php p($l->t('Required applications')); ?>
            </h1>
            <?php foreach($_['requiredApps'] as $app) { ?>
                <div class="license-settings-setting-box">
                    <div class="settingkeyvalue">
                        <label class="licenselabel">
                            <span class="templatesettingkeyname licenseitem">
                                <?php p($app['name']); ?></span>
                        </label>
                        <?php if ($app['status']) { ?>
                            <span class="statuskeyvalueinput statusitem statusOK">
                            <?php p($l->t('Installed')); ?>
                        <?php } else { ?>
                            <span class="statuskeyvalueinput statusitem statusNOK">
                            <?php p($l->t('Not installed')); ?>
                        <?php }; ?>
                            </span>
                    </div>
                </div>
            <?php }; ?>
        </div>

        <div style="margin-left: 100px">
            <h1>
                <?php p($l->t('Recommended applications')); ?>
            </h1>
            <?php foreach($_['recommendedApps'] as $app) { ?>
                <div class="license-settings-setting-box">
                    <div class="settingkeyvalue">
                        <label class="licenselabel">
                            <span class="templatesettingkeyname licenseitem">
                                <?php p($app['name']); ?></span>
                        </label>
                        <?php if ($app['status']) { ?>
                            <span class="statuskeyvalueinput statusitem statusOK">
                            <?php p($l->t('Installed')); ?>
                        <?php } else { ?>
                            <span class="statuskeyvalueinput statusitem statusNOK">
                            <?php p($l->t('Not installed')); ?>
                        <?php }; ?>
                            </span>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>
    <br>
    <p>
        <?php p($l->t('Click ')); ?>
        <a href='../apps' style="color: blue; text-decoration: underline">here</a>
        <?php p($l->t(' to open the app store to install missing dependencies.')); ?>
    </p>
</div>
