<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */

script('sendent', 'retentionAssistant');
?>
<div id="sendent-retention-assistant" class="settingTemplateDetailExclude section">
    <h2><?php p($l->t('Retention Assistant')); ?> <a style="color:darkgray;font-size:large;margin-left:10px" href="https://sendent.freshdesk.com/support/solutions/articles/80000600279">i</a></h2>

    <p><?php p($l->t('With the help of our Retention Assistant, you can easily set up each step of the process for cleaning up unused content.')); ?></p>
     <br> 
     <a style="margin-top:25px" href="#assistant" class="button hidden"><?php p($l->t('Start assistant')); ?></a>
     <br>

    <p class="sendent-is-loading"><br /><span class="icon-loading" style="padding-left:32px;margin-right:0.5em;"></span> <?php p($l->t('Assistant is loading...')); ?></p>

    <ul style="margin-top:25px" class="sendent-steps hidden">
        <li class="RetentionListItem" data-action="automatedTaggingApp"><?php p($l->t('Check automated tagging app')); ?></li>
        <li class="RetentionListItem" data-action="workflow"><?php p($l->t('Check workflow for upload tagging')); ?></li>
        <li class="RetentionListItem" data-action="retentionApp"><?php p($l->t('Check retention app')); ?></li>
        <li class="RetentionListItem" data-action="retention"><?php p($l->t('Check retention rules')); ?></li>
    </ul>
</div>
