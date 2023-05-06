<div class="settingTemplateDetailInclude section" id="groupsManagement">
    <h2>
        <?php p($l->t('Sendent Groups')); ?>
    </h2>

	<div class="license-settings-setting-box">
        <div class="settingkeyvalue">
<div class="labelFullWidth">
            <div style="margin-bottom:10px;" class="labelFullWidth">
			<p> 
				<?php p($l->t("With the integration of Nextcloud's Groups feature, Sendent now enables greater customization of settings within an organization. Administrators can assign specific Sendent settings to Nextcloud groups, which can then be used to create customized settings for users in that group.")); ?>
			</p>
			</div>
			<div style="margin-bottom:10px;" class="labelFullWidth">
			<p > 
				<?php p($l->t("To get started, simply select the relevant groups from the left list and drag them to the right. Arrange the right list by precedence, with higher-precedence groups at the top. If a user belongs to multiple groups, the settings of the group with the highest precedence will apply.")); ?>
			</p>
			</div>
			<div style="margin-bottom:10px;" class="labelFullWidth">
			<p> 
				<i><?php p($l->t("Note: When customizing a non-default group's settings, you may click on the 'Use Default group setting' check box to copy the Default group's setting.")); ?></i>
			</p>
            
        </div>
		</div>
    </div>
	<div style="display: flex; margin-top: 10px">
		<div>
			<h1>
		        <?php p($l->t('Inactive')); ?>
			</h1>
			<div style="display: flex; flex-direction: column; overflow: auto">
				<ul id="ncGroups" class="connectedSortable" style="min-height: 270px; max-height: 100%;max-width: 400px">
					<?php foreach ($_['ncGroups'] as $group) { ?>
						<li class="ui-state-default" data-gid="<?php p($group['displayName']); ?>"><?php p($group['displayName']); ?></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div>
			<h1>
		        <?php p($l->t('Active')); ?>
			</h1>
			<div style="display: flex; flex-direction: column; overflow: auto">
				<ul id="defaultGroup" class="defaultList">
					<li class="ui-state-default unsortable ui-selected"><?php p($l->t('Default')); ?></li>
				</ul>
				<ul id="sendentGroups" class="connectedSortable" style="min-height: 228px; max-height: 228px;max-width: 400px">
					<?php foreach ($_['sendentGroups'] as $group) { ?>
						<li class="ui-state-default" data-gid="<?php p($group['displayName']); ?>"><?php p($group['displayName']); ?></li>
					<?php } ?>
				</ul>
			</div>
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
