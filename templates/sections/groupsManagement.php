<div class="settingTemplateDetailInclude section" id="groupsManagement">
    <h1>
        <?php p($l->t('Sendent groups')); ?>
    </h1>

	<div style="display: flex;">
		<ul id="ncGroups" class="connectedSortable" style="min-width:270px; margin-right: 5px; padding: 2px; border: 1px solid #eee; min-height: 270px;">
			<?php foreach($_['ncGroups'] as $group) { ?>
				<li class="ui-state-default" style="padding-left: 2px;"> <?php p($group); ?> </li>
			<?php } ?>
		</ul>
 
		<ul id="sendentGroups" class="connectedSortable" style="min-width:270px; margin-right: 5px; padding: 2px; border: 1px solid #eee; min-height: 270px;">
			<?php foreach($_['sendentGroups'] as $group) { ?>
				<li class="ui-state-default" style="padding-left: 2px;"> <?php p($group); ?> </li>
			<?php } ?>
		</ul>
	</div>
</div>
