<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */

script('sendent', '3rdparty/jscolor/jscolor');
script('sendent', 'settings');
style('sendent', ['style']);
?>

<form class="form" method="post" id="settingsform">

    <?php print_unescaped($this->inc('sections/general')); ?>

    <?php print_unescaped($this->inc('sections/talk')); ?>

    <?php print_unescaped($this->inc('sections/domainExceptions')); ?>

    <?php print_unescaped($this->inc('sections/attachments')); ?>

    <?php print_unescaped($this->inc('sections/fileHandling')); ?>

    <?php print_unescaped($this->inc('sections/secureMail')); ?>

    <?php print_unescaped($this->inc('sections/guestAccounts')); ?>

    <?php print_unescaped($this->inc('sections/advancedTheming')); ?>

</form>

<?php print_unescaped($this->inc('sections/license')); ?>

<?php print_unescaped($this->inc('sections/retentionAssistant')); ?>

