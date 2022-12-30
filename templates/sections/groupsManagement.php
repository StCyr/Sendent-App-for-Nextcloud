<div class="settingTemplateDetailInclude section" id="groupsManagement">
    <h1>
        <?php p($l->t('Sendent groups')); ?>
    </h1>

	<div style="display: flex;">
		<div style="min-height: 270px">
			<ul id="ncGroups" class="connectedSortable" style="min-height: 100%">
				<?php foreach ($_['ncGroups'] as $group) { ?>
					<li class="ui-state-default"><?php p($group); ?></li>
				<?php } ?>
			</ul>
		</div>
		<div style="display: flex; flex-direction: column">
			<ul id="defaultGroup" class="defaultList">
				<li class="ui-state-default unsortable ui-selected"><?php p($l->t('Default')); ?></li>
			</ul>
			<ul id="sendentGroups" class="connectedSortable" style="flex-grow: 1">
				<?php foreach ($_['sendentGroups'] as $group) { ?>
					<li class="ui-state-default"><?php p($group); ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
