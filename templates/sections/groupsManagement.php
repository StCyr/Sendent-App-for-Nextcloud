<div class="settingTemplateDetailInclude section" id="groupsManagement">
    <h1>
        <?php p($l->t('Sendent Groups')); ?>
    </h1>

	<div class="license-settings-setting-box">
        <div class="settingkeyvalue">

            <div class="labelFullWidth">
                <?php p($l->t('Specify Nextcloud groups for which you want to apply specific settings by dragging them from the left list to the right one.')); ?>
                <br>
                <?php p($l->t('Specify precedence by sorting them in the right list; Groups that are higher in the list get greater precedence')); ?>
                <?php p($l->t(' (ie: If a user is member of several groups, the settings of the group with the greatest precedence will apply).')); ?>
            </div>
        </div>
    </div>
	<div style="display: flex; margin-top: 10px">
		<div style="min-height: 270px; max-height: 270px; overflow: auto">
			<ul id="ncGroups" class="connectedSortable" style="min-height: 100%">
				<?php foreach ($_['ncGroups'] as $group) { ?>
					<li class="ui-state-default"><?php p($group); ?></li>
				<?php } ?>
			</ul>
		</div>
		<div style="display: flex; flex-direction: column; overflow: auto">
			<ul id="defaultGroup" class="defaultList">
				<li class="ui-state-default unsortable ui-selected"><?php p($l->t('Default')); ?></li>
			</ul>
			<ul id="sendentGroups" class="connectedSortable" style="min-height: 228px; max-height: 228px;max-width: 400px">
				<?php foreach ($_['sendentGroups'] as $group) { ?>
					<li class="ui-state-default"><?php p($group); ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="settingTemplateDetailInclude section" id="groupsManagementShow">
    <h2 style="margin-bottom: 0px;">
        <?php p($l->t('Showing settings for ')); ?>
	<span id="currentGroup">Default</span>
        <?php p($l->t(' group ')); ?>
    </h2>
</div>
