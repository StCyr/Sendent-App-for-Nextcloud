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
                <div class="dependency-settings-setting-box">						
                    <div class="settingkeyvalue"
						<?php if ($app['status']) { ?>
							data-state='success'
    	                <?php } else { ?>
							data-state='fail'
            	        <?php }; ?>
					>
                        <label class="licenselabel">
                            <span class="templatesettingkeyname licenseitem">
                                <?php p($app['name']); ?></span>
                        </label>
					</div>
                </div>
            <?php }; ?>
        </div>

        <div style="margin-left: 100px">
            <h1>
                <?php p($l->t('Recommended applications')); ?>
            </h1>
            <?php foreach($_['recommendedApps'] as $app) { ?>
                <div class="dependency-settings-setting-box">
                    <div class="settingkeyvalue"
						<?php if ($app['status']) { ?>
							data-state='success'
    	                <?php } else { ?>
							data-state='fail'
            	        <?php }; ?>
					>
                        <label class="licenselabel">
                            <span class="templatesettingkeyname licenseitem">
                                <?php p($app['name']); ?></span>
                        </label>
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
