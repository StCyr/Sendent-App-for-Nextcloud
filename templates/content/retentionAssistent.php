<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */

script('sendent', 'retentionAssistent');
?>

<div id="sendent-retention-assistent" class="section">
    <h1>Retention Assistent</h1>

    <p><?php p($l->t('Our assistent helps you to setup every step to clean up unused content.')); ?> <a href="#assistent" class="button"><?php p($l->t('Start assistent')); ?></a></p>

    <ul class="sendent-steps">
        <li data-action="automatedTaggingApp"><?php p($l->t('Check automated tagging app')); ?></li>
        <li data-action="workflow"><?php p($l->t('Check workflow for upload tagging')); ?></li>
        <li data-action="retentionApp"><?php p($l->t('Check retention app')); ?></li>
        <li data-action="retention"><?php p($l->t('Check retention rules')); ?></li>
    </ul>
</div>