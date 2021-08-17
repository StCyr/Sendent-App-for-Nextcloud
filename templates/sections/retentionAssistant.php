<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */

script('sendent', 'retentionAssistant');
?>
<div id="sendent-retention-assistant" class="settingTemplateDetailExclude section">
    <h1><?php p($l->t('Retention Assistant')); ?> <a style="color:darkgray;font-size:large;margin-left:10px" href="https://sendent.freshdesk.com/support/solutions/articles/80000600279">i</a></h1>

    <p><?php p($l->t('Our assistant helps you to setup every step to clean up unused content.')); ?> <a href="#assistant" class="button hidden"><?php p($l->t('Start assistant')); ?></a></p>

    <p class="sendent-is-loading"><br /><span class="icon-loading" style="padding-left:32px;margin-right:0.5em;"></span> <?php p($l->t('Assistant is loading...')); ?></p>

    <ul class="sendent-steps hidden">
        <li data-action="automatedTaggingApp"><?php p($l->t('Check automated tagging app')); ?></li>
        <li data-action="workflow"><?php p($l->t('Check workflow for upload tagging')); ?></li>
        <li data-action="retentionApp"><?php p($l->t('Check retention app')); ?></li>
        <li data-action="retention"><?php p($l->t('Check retention rules')); ?></li>
    </ul>
</div>
