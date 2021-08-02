<?php
script('sendent', ['script']);
script('sendent', ['SettingTemplateScript']);
?>

<div class="personal-settings-setting-box">
<form id="settingKeyForm" class="section">
	<h3>
		<label for="templatesettingkeyname"><?php p($l->t('Nextcloud Outlook Add-in settings')); ?></label>
	</h3>
	<input type="text" name="settingkeyvalue" id="settingkeyvalue" value="" placeholder="" autocomplete="on" autocapitalize="none" autocorrect="off">
	<input type="hidden" id="settingkeyid" value="">
	<input type="hidden" id="templateid" value="">
</form>
</div>
