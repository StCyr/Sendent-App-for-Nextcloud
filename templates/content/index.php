<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */

script('sendent', '3rdparty/jscolor/jscolor');
script('sendent', 'settings');
script('sendent', 'termsAgreement');
style('sendent', ['style']);
?>

<div style="overflow:hidden;border: 1px solid #ccc; background-color: #f1f1f1">
	<button class="tablink active" id="tab_sendent_general" style="margin-left: 5px">General</button>
	<button class="tablink" id="tab_sendent_settings">Client Settings</button>
</div>

<div class="Settingspage" id="sendent_general">

	<div class="TermsAgreement">
		<?php print_unescaped($this->inc('sections/termsAgreement')); ?>
	</div>

	<?php print_unescaped($this->inc('sections/defaultLicenseStatus')); ?>

	<?php print_unescaped($this->inc('sections/outlookAddon')); ?>

	<?php print_unescaped($this->inc('sections/dependencies')); ?>
	
	<?php print_unescaped($this->inc('sections/retentionAssistant')); ?>

</div>

<div class="Settingspage" id="sendent_settings" style="display:none">

	<form class="form" method="post" id="settingsform">

	    <?php print_unescaped($this->inc('sections/groupsManagement')); ?>

		<?php print_unescaped($this->inc('sections/license')); ?>

    	<?php print_unescaped($this->inc('sections/general')); ?>

	    <?php print_unescaped($this->inc('sections/talk')); ?>

	    <?php print_unescaped($this->inc('sections/domainExceptions')); ?>

    	<?php print_unescaped($this->inc('sections/attachments')); ?>

	    <?php print_unescaped($this->inc('sections/fileHandling')); ?>

    	<?php print_unescaped($this->inc('sections/secureMail')); ?>

	    <?php print_unescaped($this->inc('sections/guestAccounts')); ?>

    	<?php print_unescaped($this->inc('sections/advancedTheming')); ?>

	</form>

</div>
