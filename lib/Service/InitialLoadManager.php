<?php

namespace OCA\Sendent\Service;

use Exception;


use OCA\Sendent\Db\SettingKey;
use OCA\Sendent\Db\SettingKeymapper;
use OCA\Sendent\Db\SettingGroupValueMapper;
use OCA\Sendent\Db\SettingGroupValue;

class InitialLoadManager {
	private $SettingKeyMapper;
	private $SettingGroupValueMapper;

	public function __construct(SettingKeyMapper $SettingKeyMapper, SettingGroupValueMapper $SettingGroupValueMapper, SendentFileStorageManager $SendentFileStorageManager) {
		$this->SettingKeyMapper = $SettingKeyMapper;
		$this->SettingGroupValueMapper = $SettingGroupValueMapper;
		$this->SendentFileStorageManager = $SendentFileStorageManager;

		try {
			if ($this->SettingKeyMapper->settingKeyCount("20") < 1) {
				$this->initialLoading();
			}
			if ($this->SettingKeyMapper->settingKeyCount("23") < 1) {
				$this->addSendmode();
			}
			if ($this->SettingKeyMapper->settingKeyCount("30") < 1) {
				$this->addHtmlpasswordsnippet();
			}
			if ($this->SettingKeyMapper->settingKeyCount("81") < 1 || $this->showNameBySettingKeyId("81") !== "GeneralIconColor") {
				$this->addAdvancedTheming();
			}
			if ($this->SettingKeyMapper->settingKeyCount("94") < 1 || $this->showNameBySettingKeyId("94") !== "TaskpaneActivityTrackerFontColor") {
				$this->addAdvancedThemingUpdate();
			}
			if ($this->SettingKeyMapper->settingKeyCount("98") < 1 || $this->showNameBySettingKeyId("98") !== "ButtonSecondaryIconColor") {
				$this->addAdvancedThemingUpdate2();
			}
			if ($this->SettingKeyMapper->settingKeyCount("99") < 1 || $this->showNameBySettingKeyId("99") !== "TaskpaneSecureMailControlColor") {
				$this->addAdvancedThemingUpdate3();
			}
			if ($this->SettingKeyMapper->settingKeyCount("100") < 1 || $this->showNameBySettingKeyId("100") !== "DialogFooterBackgroundColor") {
				$this->addAdvancedThemingUpdate4();
			}
			$this->fixPaths();
			$this->fixSnippets();
		} catch (Exception $e) {
		}
	}

	private function fixPaths() {
		try {
			$filepath = $this->showBySettingKeyId(8);
			$folderpath = $this->showBySettingKeyId(7);
			$securemailpath = $this -> showBySettingKeyId(24);
			if (!is_null($folderpath)) {
				if ($folderpath->getValue() === '') {
					$this->update($folderpath->getId(), $folderpath->getSettingkeyid(), $folderpath->getGroupid(), "/Outlook/Public-Share/");
				}
			}
			if (!is_null($filepath)) {
				if ($filepath->getValue() === '') {
					$this->update($filepath->getId(), $filepath->getSettingkeyid(), $filepath->getGroupid(), "/Outlook/Upload-Share/");
				}
			}
			if (!is_null($securemailpath)) {
				if ($securemailpath->getValue() === '') {
					$this->update($securemailpath->getId(), $securemailpath->getSettingkeyid(), $securemailpath->getGroupid(), "/Outlook/SecureMail-Share/");
				}
			}
		} catch (Exception $exception) {
		}
	}
	private function fixSnippets() {
		try {
			$filepath = $this->showBySettingKeyId(10);
			$folderpath = $this->showBySettingKeyId(9);
			$securemailpath = $this->showBySettingKeyId(12);
			$passwordhtmlsnippet = $this->showBySettingKeyId(30);
			if (!is_null($folderpath)) {
				if ($folderpath->getValue() === '') {
					$this->update($folderpath->getId(), $folderpath->getSettingkeyid(), $folderpath->getGroupid(), $this->getsharefolderhtml());
				}
			}
			if (!is_null($filepath)) {
				if ($filepath->getValue() === '') {
					$this->update($filepath->getId(), $filepath->getSettingkeyid(), $filepath->getGroupid(), $this->getsharefilehtml());
				}
			}
			if (!is_null($securemailpath)) {
				if ($securemailpath->getValue() === '') {
					$this->update($securemailpath->getId(), $securemailpath->getSettingkeyid(), $securemailpath->getGroupid(), $this->getsecuremailhtml());
				}
			}
			if (!is_null($passwordhtmlsnippet)) {
				if ($passwordhtmlsnippet->getValue() === '') {
					$this->update($passwordhtmlsnippet->getId(), $passwordhtmlsnippet->getSettingkeyid(), $passwordhtmlsnippet->getGroupid(), $this->gethtmlpasswordsnippet());
				}
			}
		} catch (Exception $exception) {
		}
	}

	public function addHtmlpasswordsnippet() {
		$this->createKey("30", "htmlsnippetpassword", "0", "textarea");
		$this->createGroupValue("0", "30", $this->gethtmlpasswordsnippet());
	}

	public function addAdvancedTheming() {
		if (!is_null($this->showNameBySettingKeyId("81")) && $this->showNameBySettingKeyId("81") !== "GeneralIconColor") {
			$this->updateKey("81", "GeneralIconColor", "0", "text");
		} else {
			$this->createKey("81", "GeneralIconColor", "0", "text");
			$this->createGroupValue("0", "81", "#151c62");
		}
		if (!is_null($this->showNameBySettingKeyId("82")) && $this->showNameBySettingKeyId("82") !== "DialogFooterIconBackgroundColor") {
			$this->updateKey("82", "DialogFooterIconBackgroundColor", "0", "text");
		} else {
			$this->createKey("82", "DialogFooterIconBackgroundColor", "0", "text");
			$this->createGroupValue("0", "82", "#FFFFFF");
		}
		if (!is_null($this->showNameBySettingKeyId("83")) && $this->showNameBySettingKeyId("83") !== "TaskpaneActivityTrackerColor") {
			$this->updateKey("83", "TaskpaneActivityTrackerColor", "0", "text");
		} else {
			$this->createKey("83", "TaskpaneActivityTrackerColor", "0", "text");
			$this->createGroupValue("0", "83", "#151c62");
		}
		if (!is_null($this->showNameBySettingKeyId("84")) && $this->showNameBySettingKeyId("84") !== "DialogHeaderColor") {
			$this->updateKey("84", "DialogHeaderColor", "0", "text");
		} else {
			$this->createKey("84", "DialogHeaderColor", "0", "text");
			$this->createGroupValue("0", "84", "#161c5e");
		}
		if (!is_null($this->showNameBySettingKeyId("85")) && $this->showNameBySettingKeyId("85") !== "ButtonPrimaryColor") {
			$this->updateKey("85", "ButtonPrimaryColor", "0", "text");
		} else {
			$this->createKey("85", "ButtonPrimaryColor", "0", "text");
			$this->createGroupValue("0", "85", "#151c62");
		}
		if (!is_null($this->showNameBySettingKeyId("86")) && $this->showNameBySettingKeyId("86") !== "ButtonPrimaryFontColor") {
			$this->updateKey("86", "ButtonPrimaryFontColor", "0", "text");
		} else {
			$this->createKey("86", "ButtonPrimaryFontColor", "0", "text");
			$this->createGroupValue("0", "86", "#FFFFFF");
		}
		if (!is_null($this->showNameBySettingKeyId("87")) && $this->showNameBySettingKeyId("87") !== "ButtonPrimaryHoverColor") {
			$this->updateKey("87", "ButtonPrimaryHoverColor", "0", "text");
		} else {
			$this->createKey("87", "ButtonPrimaryHoverColor", "0", "text");
			$this->createGroupValue("0", "87", "#5d66cd");
		}
		if (!is_null($this->showNameBySettingKeyId("88")) && $this->showNameBySettingKeyId("88") !== "ButtonSecondaryColor") {
			$this->updateKey("88", "ButtonSecondaryColor", "0", "text");
		} else {
			$this->createKey("88", "ButtonSecondaryColor", "0", "text");
			$this->createGroupValue("0", "88", "#EDEDED");
		}
		if (!is_null($this->showNameBySettingKeyId("89")) && $this->showNameBySettingKeyId("89") !== "ButtonSecondaryHoverColor") {
			$this->updateKey("89", "ButtonSecondaryHoverColor", "0", "text");
		} else {
			$this->createKey("89", "ButtonSecondaryHoverColor", "0", "text");
			$this->createGroupValue("0", "89", "#adadad");
		}
		if (!is_null($this->showNameBySettingKeyId("90")) && $this->showNameBySettingKeyId("90") !== "ButtonSecondaryFontColor") {
			$this->updateKey("90", "ButtonSecondaryFontColor", "0", "text");
		} else {
			$this->createKey("90", "ButtonSecondaryFontColor", "0", "text");
			$this->createGroupValue("0", "90", "#151c62");
		}
		if (!is_null($this->showNameBySettingKeyId("91")) && $this->showNameBySettingKeyId("91") !== "TaskpaneSecureMailColor") {
			$this->updateKey("91", "TaskpaneSecureMailColor", "0", "text");
		} else {
			$this->createKey("91", "TaskpaneSecureMailColor", "0", "text");
			$this->createGroupValue("0", "91", "#151C62");
		}
		if (!is_null($this->showNameBySettingKeyId("92")) && $this->showNameBySettingKeyId("92") !== "PopupBackgroundColor") {
			$this->updateKey("92", "PopupBackgroundColor", "0", "text");
		} else {
			$this->createKey("92", "PopupBackgroundColor", "0", "text");
			$this->createGroupValue("0", "92", "#cfd2f1");
		}
		if (!is_null($this->showNameBySettingKeyId("93")) && $this->showNameBySettingKeyId("93") !== "GeneralFontColor") {
			$this->updateKey("93", "GeneralFontColor", "0", "text");
		} else {
			$this->createKey("93", "GeneralFontColor", "0", "text");
			$this->createGroupValue("0", "93", "#FFFFFF");
		}
		if (!is_null($this->showNameBySettingKeyId("80")) && $this->showNameBySettingKeyId("80") !== "AdvancedThemingEnabled") {
			$this->updateKey("80", "AdvancedThemingEnabled", "0", "text");
		} else {
			$this->createKey("80", "AdvancedThemingEnabled", "0", "select-one");
			$this->createGroupValue("0", "80", "false");
		}
	}
	public function addAdvancedThemingUpdate() {
		if (!is_null($this->showNameBySettingKeyId("94")) && $this->showNameBySettingKeyId("94") !== "TaskpaneActivityTrackerFontColor") {
			$this->updateKey("94", "TaskpaneActivityTrackerFontColor", "0", "text");
		} else {
			$this->createKey("94", "TaskpaneActivityTrackerFontColor", "0", "text");
			$this->createGroupValue("0", "94", "#FFFFFF");
		}
		if (!is_null($this->showNameBySettingKeyId("95")) && $this->showNameBySettingKeyId("95") !== "DialogHeaderFontColor") {
			$this->updateKey("95", "DialogHeaderFontColor", "0", "text");
		} else {
			$this->createKey("95", "DialogHeaderFontColor", "0", "text");
			$this->createGroupValue("0", "95", "#FFFFFF");
		}
		if (!is_null($this->showNameBySettingKeyId("96")) && $this->showNameBySettingKeyId("96") !== "TaskpaneSecureMailFontColor") {
			$this->updateKey("96", "TaskpaneSecureMailFontColor", "0", "text");
		} else {
			$this->createKey("96", "TaskpaneSecureMailFontColor", "0", "text");
			$this->createGroupValue("0", "96", "#FFFFFF");
		}
	}
	public function addAdvancedThemingUpdate2() {
		if (!is_null($this->showNameBySettingKeyId("97")) && $this->showNameBySettingKeyId("97") !== "ButtonPrimaryIconColor") {
			$this->updateKey("97", "ButtonPrimaryIconColor", "0", "text");
		} else {
			$this->createKey("97", "ButtonPrimaryIconColor", "0", "text");
			$this->createGroupValue("0", "97", "#FFFFFF");
		}
		if (!is_null($this->showNameBySettingKeyId("98")) && $this->showNameBySettingKeyId("98") !== "ButtonSecondaryIconColor") {
			$this->updateKey("98", "ButtonSecondaryIconColor", "0", "text");
		} else {
			$this->createKey("98", "ButtonSecondaryIconColor", "0", "text");
			$this->createGroupValue("0", "98", "#151c62");
		}
	}
	public function addAdvancedThemingUpdate3() {
		if (!is_null($this->showNameBySettingKeyId("99")) && $this->showNameBySettingKeyId("99") !== "TaskpaneSecureMailControlColor") {
			$this->updateKey("99", "TaskpaneSecureMailControlColor", "0", "text");
		} else {
			$this->createKey("99", "TaskpaneSecureMailControlColor", "0", "text");
			$this->createGroupValue("0", "99", "#FFFFFF");
		}
	}
	public function addAdvancedThemingUpdate4() {
		if (!is_null($this->showNameBySettingKeyId("100")) && $this->showNameBySettingKeyId("100") !== "DialogFooterBackgroundColor") {
			$this->updateKey("100", "DialogFooterBackgroundColor", "0", "text");
		} else {
			$this->createKey("100", "DialogFooterBackgroundColor", "0", "text");
			$this->createGroupValue("0", "100", "#cfd2f1");
		}
		if (!is_null($this->showNameBySettingKeyId("101")) && $this->showNameBySettingKeyId("101") !== "DialogFooterFontColor") {
			$this->updateKey("101", "DialogFooterFontColor", "0", "text");
		} else {
			$this->createKey("101", "DialogFooterFontColor", "0", "text");
			$this->createGroupValue("0", "101", "#000000");
		}
		if (!is_null($this->showNameBySettingKeyId("102")) && $this->showNameBySettingKeyId("102") !== "DialogFooterHoverColor") {
			$this->updateKey("102", "DialogFooterHoverColor", "0", "text");
		} else {
			$this->createKey("102", "DialogFooterHoverColor", "0", "text");
			$this->createGroupValue("0", "102", "#616bd5");
		}
		if (!is_null($this->showNameBySettingKeyId("103")) && $this->showNameBySettingKeyId("103") !== "DialogFooterIconColor") {
			$this->updateKey("103", "DialogFooterIconColor", "0", "text");
		} else {
			$this->createKey("103", "DialogFooterIconColor", "0", "text");
			$this->createGroupValue("0", "103", "#151c62");
		}
	}
	public function addSendmode() {
		$this->createKey("23", "sendmode", "0", "select-one");
		$this->createGroupValue("0", "23", "CurrentMail");
	}
	public function initialLoading() {
		$this->createKey("20", "setlanguage", "0", "select-one");
		$this->createKey("19", "passwordcontrolbehavior", "0", "select-one");
		$this->createKey("28", "insertatcursor", "0", "select-one");
		$this->createKey("30", "htmlsnippetpassword", "0", "textarea");
		$this->createKey("6", "dateaddition", "0", "select-one");
		$this->createKey("22", "debugmode", "0", "select-one");
		$this->createKey("23", "sendmode", "0", "select-one");
		$this->createKey("17", "disablesettings", "0", "select-one");
		$this->createKey("2", "attachmentdomainexceptionsinternal", "0", "text");
		$this->createKey("0", "attachmentdomainexceptions", "0", "text");
		$this->createKey("3", "attachmentmode", "0", "select-one");
		$this->createKey("4", "attachmentsize", "0", "text");
		$this->createKey("7", "pathpublicshare", "0", "text");
		$this->createKey("10", "sharefilehtml", "0", "textarea");
		$this->createKey("8", "pathuploadfiles", "0", "text");
		$this->createKey("9", "sharefolderhtml", "0", "textarea");
		$this->createKey("11", "securemail", "0", "select-one");
		$this->createKey("25", "securemailenforced", "0", "select-one");
		$this->createKey("24", "pathsecuremailbox", "0", "text");
		$this->createKey("12", "securemailhtml", "0", "textarea");
		$this->createKey("27", "guestaccountsenabled", "0", "select-one");
		$this->createKey("26", "guestaccountsenforced", "0", "select-one");

		$this->createGroupValue("0", "20", "en");
		$this->createGroupValue("0", "19", "BeforeSend");
		$this->createGroupValue("0", "28", "True");
		$this->createGroupValue("0", "23", "CurrentMail");
		$this->createGroupValue("0", "6", "True");
		$this->createGroupValue("0", "22", "False");
		$this->createGroupValue("0", "17", "True");
		$this->createGroupValue("0", "2", "");
		$this->createGroupValue("0", "0", "");
		$this->createGroupValue("0", "3", "MaximumAttachmentSize");
		$this->createGroupValue("0", "4", "1");
		$this->createGroupValue("0", "7", "/Outlook/Public-Share/");
		$this->createGroupValue("0", "10", $this->getsharefilehtml());
		$this->createGroupValue("0", "8", "Outlook/Upload-Share/");
		$this->createGroupValue("0", "9", $this->getsharefolderhtml());
		$this->createGroupValue("0", "11", "False");
		$this->createGroupValue("0", "25", "False");
		$this->createGroupValue("0", "24", "/Outlook/SecureMail-Share/");
		$this->createGroupValue("0", "12", $this->getsharefilehtml());
		$this->createGroupValue("0", "30", $this->gethtmlpasswordsnippet());
		$this->createGroupValue("0", "27", "False");
		$this->createGroupValue("0", "26", "False");
	}

	public function createKey(string $key, string $name, string $templateid, string $valuetype) {
		try {
			$SettingKey = new settingkey();
			$SettingKey->setKey($key);
			$SettingKey->setName($name);
			$SettingKey->setTemplateid($templateid);
			$SettingKey->setValuetype($valuetype);
			return $this->SettingKeyMapper->insert($SettingKey);
		} catch (Exception $e) {
			return null;
		}
	}
	public function updateKey(string $key, string $name, string $templateid, string $valuetype) {
		try {
			$SettingKey = $this->SettingKeyMapper->findByKey($key);
			$SettingKey->setName($name);
			$result = $this->SettingKeyMapper->update($SettingKey);
			return $this->showBySettingKeyId($key);
		} catch (Exception $e) {
			return null;
		}
	}

	public function createGroupValue(string $groupid, string $settingkeyid, string $value) {
		try {
			$SettingGroupValue = new SettingGroupValue();
			$SettingGroupValue->setGroupid($groupid);
			$SettingGroupValue->setSettingkeyid($settingkeyid);
			if ($this->valueSizeForDb($value) !== true) {
				$value = $this->SendentFileStorageManager->writeTxt($groupid, $settingkeyid, $value);
			}
			$SettingGroupValue->setValue($value);
			return $this->SettingGroupValueMapper->insert($SettingGroupValue);
		} catch (Exception $e) {
			return null;
		}
	}



	private function valueIsSettingGroupValueFilePath($value) {
		if (strpos($value, 'settinggroupvaluefile') !== false) {
			return true;
		}
		return false;
	}
	private function valueSizeForDb($value) {
		return strlen($value) < 256 !== false;
	}
	public function showBySettingKeyId(int $settingkeyid) {
		try {
			$result = $this->SettingGroupValueMapper->findBySettingKeyId($settingkeyid);
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->SendentFileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
			return $result;
		} catch (Exception $e) {
			return null;
		}
	}
	public function showNameBySettingKeyId(int $settingkeyid) {
		try {
			$result = $this->SettingKeyMapper->findByKey($settingkeyid);
			return $result->getName();
		} catch (Exception $e) {
			return null;
		}
	}
	public function update(int $id,int $settingkeyid, int $groupid, string $value) {
		try {
			$SettingGroupValue = $this->SettingGroupValueMapper->find($settingkeyid);
			$SettingGroupValue->setSettingkeyid($settingkeyid);
			$SettingGroupValue->setGroupid($groupid);
			if ($this->valueSizeForDb($value) === false) {
				$value = $this->SendentFileStorageManager->writeTxt($groupid, $settingkeyid, $value);
			}
			$SettingGroupValue->setValue($value);

			$result = $this->SettingGroupValueMapper->update($SettingGroupValue);
			return $this->showBySettingKeyId($settingkeyid);
		} catch (Exception $e) {
			return null;
		}
	}
	public function getsecuremailhtml() {
		return "<html>
           <head>
               <meta http-equiv=Content-Type content='text/html; charset=windows-1252'>
                   <meta name=Generator content='Microsoft Word 15 (filtered)'>
                       <style>
                           <!-- /* Font Definitions */ @font-face {font-family:'Cambria Math'; panose-1:2 4 5 3 5 4 6 3 2 4;} @font-face {font-family:Calibri; panose-1:2 15 5 2 2 2 4 3 2 4;} /* Style Definitions */ p.MsoNormal, li.MsoNormal, div.MsoNormal {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} a:link, span.MsoHyperlink {color:blue; text-decoration:underline;} p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} .MsoChpDefault {font-family:'Calibri',sans-serif;} .MsoPapDefault {margin-bottom:8.0pt; line-height:107%;} @page WordSection1 {size:612.0pt 792.0pt; margin:72.0pt 72.0pt 72.0pt 72.0pt;} div.WordSection1 {page:WordSection1;} -->
                       </style>
                   </head>
                   <body lang=EN-US link=blue vlink='#954F72'>
                       <div class=WordSection1>
                           <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=704 style='width:503.35pt;border-collapse:collapse;border:none'>
                               <tr>
                                   <td width=704 colspan=3 valign=top style='width:452.8pt;border:solid windowtext 1.0pt; background:#0f1237;padding:0cm 5.4pt 0cm 5.4pt'>
                                       <p class=MsoNoSpacing align=center style='text-align:center'>
                                           <span lang=NL>
                                               <img width=120 height=28 id='Afbeelding 11' src='cid:logo.png@logo'>
                                               </span>
                                           </p>
                                       </td>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border-top:none; border-left:solid windowtext 1.0pt;border-bottom:none;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                               <p class=MsoNoSpacing>This is a confidential email. Click on the Secure Mail link below to view your full message.</p>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Secure Mail link</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>
                                                       <a href='{0}'>{0}</a>
                                                   </span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Password</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{1}&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Expiration date</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{2}</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border-top:none; border-left:solid windowtext 1.0pt;border-bottom:none;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                               <p class=MsoNoSpacing>The sender uses Sendent to communicate in a secure way and to prevent data leaks. Therefore, by clicking on the Secure Mail link, the sender can see that you have opened the message. </p>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;background:#E7E6E6;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL style='color:black'>
                                                       <a href='http://www.sendent.nl/'>
                                                           <i>
                                                               <span style='font-size:9.0pt'>Sendent</span>
                                                           </i>
                                                       </a>
                                                   </span>
                                                   <i>
                                                       <span lang=NL style='font-size:9.0pt;color:black'> is a solution for secure email and file exchange.  </span>
                                                   </i>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr height=0>
                                           <td width=129 style='border:none'/>
                                           <td width=474 style='border:none'/>
                                           <td width=1 style='border:none'/>
                                       </tr>
                                   </table>
                                   <p class=MsoNormal>
                                       <span lang=NL>&nbsp;</span>
                                   </p>
                               </div>
                           </body>
                       </html>";
	}
	public function getsharefilehtml() {
		return "<html>
           <head>
               <meta http-equiv=Content-Type content='text/html; charset=windows-1252'>
                   <meta name=Generator content='Microsoft Word 15 (filtered)'>
                       <style>
                           <!-- /* Font Definitions */ @font-face {font-family:'Cambria Math'; panose-1:2 4 5 3 5 4 6 3 2 4;} @font-face {font-family:Calibri; panose-1:2 15 5 2 2 2 4 3 2 4;} /* Style Definitions */ p.MsoNormal, li.MsoNormal, div.MsoNormal {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} a:link, span.MsoHyperlink {color:blue; text-decoration:underline;} p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} .MsoChpDefault {font-family:'Calibri',sans-serif;} .MsoPapDefault {margin-bottom:8.0pt; line-height:107%;} @page WordSection1 {size:612.0pt 792.0pt; margin:72.0pt 72.0pt 72.0pt 72.0pt;} div.WordSection1 {page:WordSection1;} -->
                       </style>
                   </head>
                   <body lang=EN-US link=blue vlink='#954F72'>
                       <div class=WordSection1>
                           <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=704 style='width:503.35pt;border-collapse:collapse;border:none'>
                               <tr>
                                   <td width=704 colspan=3 valign=top style='width:452.8pt;border:solid windowtext 1.0pt; background:#0f1237;padding:0cm 5.4pt 0cm 5.4pt'>
                                       <p class=MsoNoSpacing align=center style='text-align:center'>
                                           <span lang=NL>
                                               <img width=120 height=28 id='Afbeelding 11' src='cid:logo.png@logo'>
                                               </span>
                                           </p>
                                       </td>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border-top:none; border-left:solid windowtext 1.0pt;border-bottom:none;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                               <p class=MsoNoSpacing>I want to share files with you in a secure way with respect for your privacy and that’s why I’m using Sendent. Click on the link below to download your files.</p>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Download link</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>
                                                       <a href='{0}'>{0}</a>
                                                   </span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Password</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{1}&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Expiration date</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{2}</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;background:#E7E6E6;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>

                                                   <span lang=NL style='color:black'>
                                                       <a href='http://www.sendent.nl/'>
                                                           <i>
                                                               <span style='font-size:9.0pt'>Sendent</span>
                                                           </i>
                                                       </a>
                                                   </span>
                                                   <i>
                                                       <span lang=NL style='font-size:9.0pt;color:black'> is a solution for secure email and file exchange.  </span>
                                                   </i>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr height=0>
                                           <td width=129 style='border:none'/>
                                           <td width=474 style='border:none'/>
                                           <td width=1 style='border:none'/>
                                       </tr>
                                   </table>
                                   <p class=MsoNormal>
                                       <span lang=NL>&nbsp;</span>
                                   </p>
                               </div>
                           </body>
                       </html>";
	}
	public function gethtmlpasswordsnippet() {
		return "<html>
           <head>
               <meta http-equiv=Content-Type content='text/html; charset=windows-1252'>
                   <meta name=Generator content='Microsoft Word 15 (filtered)'>
                       <style>
                           <!-- /* Font Definitions */ @font-face {font-family:'Cambria Math'; panose-1:2 4 5 3 5 4 6 3 2 4;} @font-face {font-family:Calibri; panose-1:2 15 5 2 2 2 4 3 2 4;} /* Style Definitions */ p.MsoNormal, li.MsoNormal, div.MsoNormal {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} a:link, span.MsoHyperlink {color:blue; text-decoration:underline;} p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} .MsoChpDefault {font-family:'Calibri',sans-serif;} .MsoPapDefault {margin-bottom:8.0pt; line-height:107%;} @page WordSection1 {size:612.0pt 792.0pt; margin:72.0pt 72.0pt 72.0pt 72.0pt;} div.WordSection1 {page:WordSection1;} -->
                       </style>
                   </head>
                   <body lang=EN-US link=blue vlink='#954F72'>
                       <div class=WordSection1>
                           <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=704 style='width:503.35pt;border-collapse:collapse;border:none'>
                               <tr>
                                   <td width=704 colspan=3 valign=top style='width:452.8pt;border:solid windowtext 1.0pt; background:#0f1237;padding:0cm 5.4pt 0cm 5.4pt'>
                                       <p class=MsoNoSpacing align=center style='text-align:center'>
                                           <span lang=NL>
                                               <img width=120 height=28 id='Afbeelding 11' src='cid:logo.png@logo'>
                                               </span>
                                           </p>
                                       </td>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border-top:none; border-left:solid windowtext 1.0pt;border-bottom:none;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                               <p class=MsoNoSpacing>I want to share files with you in a secure way with respect for your privacy and that’s why I’m using Sendent. Use the password below to download the files from the link that you just received in a separate email.</p>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Password</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{0}&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;background:#E7E6E6;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>

                                                   <span lang=NL style='color:black'>
                                                       <a href='http://www.sendent.nl/'>
                                                           <i>
                                                               <span style='font-size:9.0pt'>Sendent</span>
                                                           </i>
                                                       </a>
                                                   </span>
                                                   <i>
                                                       <span lang=NL style='font-size:9.0pt;color:black'> is a solution for secure email and file exchange.  </span>
                                                   </i>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr height=0>
                                           <td width=129 style='border:none'/>
                                           <td width=474 style='border:none'/>
                                           <td width=1 style='border:none'/>
                                       </tr>
                                   </table>
                                   <p class=MsoNormal>
                                       <span lang=NL>&nbsp;</span>
                                   </p>
                               </div>
                           </body>
                       </html>";
	}
	public function getsharefolderhtml() {
		return "<html>
           <head>
               <meta http-equiv=Content-Type content='text/html; charset=windows-1252'>
                   <meta name=Generator content='Microsoft Word 15 (filtered)'>
                       <style>
                           <!-- /* Font Definitions */ @font-face {font-family:'Cambria Math'; panose-1:2 4 5 3 5 4 6 3 2 4;} @font-face {font-family:Calibri; panose-1:2 15 5 2 2 2 4 3 2 4;} /* Style Definitions */ p.MsoNormal, li.MsoNormal, div.MsoNormal {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} a:link, span.MsoHyperlink {color:blue; text-decoration:underline;} p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing {margin:0cm; margin-bottom:.0001pt; font-size:12.0pt; font-family:'Calibri',sans-serif;} .MsoChpDefault {font-family:'Calibri',sans-serif;} .MsoPapDefault {margin-bottom:8.0pt; line-height:107%;} @page WordSection1 {size:612.0pt 792.0pt; margin:72.0pt 72.0pt 72.0pt 72.0pt;} div.WordSection1 {page:WordSection1;} -->
                       </style>
                   </head>
                   <body lang=EN-US link=blue vlink='#954F72'>
                       <div class=WordSection1>
                           <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=704 style='width:503.35pt;border-collapse:collapse;border:none'>
                               <tr>
                                   <td width=704 colspan=3 valign=top style='width:452.8pt;border:solid windowtext 1.0pt; background:#0f1237;padding:0cm 5.4pt 0cm 5.4pt'>
                                       <p class=MsoNoSpacing align=center style='text-align:center'>
                                           <span lang=NL>
                                               <img width=120 height=28 id='Afbeelding 11' src='cid:logo.png@logo'>
                                               </span>
                                           </p>
                                       </td>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border-top:none; border-left:solid windowtext 1.0pt;border-bottom:none;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                               <p class=MsoNoSpacing>I want to let you upload some files in a secure way with respect for your privacy and that’s why I’m using Sendent. Click on the link below to upload your files. </p>
                                               <p class=MsoNoSpacing>&nbsp;<br></p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Public share link</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>
                                                       <a href='{0}'>{0}</a>
                                                   </span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Password</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{1}&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=129 valign=top style='width:106.95pt;border:none;border-left:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <b>
                                                       <span lang=NL>Expiration date</span>
                                                   </b>
                                               </p>
                                           </td>
                                           <td width=475 colspan=2 valign=top style='width:356.4pt;border:none; border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=EN-GB style='font-size:11.0pt'>{2}</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL>&nbsp;</span>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td width=604 colspan=3 valign=top style='width:503.35pt;border:solid windowtext 1.0pt; border-top:none;background:#E7E6E6;padding:0cm 5.4pt 0cm 5.4pt'>
                                               <p class=MsoNoSpacing>
                                                   <span lang=NL style='color:black'>
                                                       <a href='http://www.sendent.nl/'>
                                                           <i>
                                                               <span style='font-size:9.0pt'>Sendent</span>
                                                           </i>
                                                       </a>
                                                   </span>
                                                   <i>
                                                       <span lang=NL style='font-size:9.0pt;color:black'> is a solution for secure email and file exchange.  </span>
                                                   </i>
                                               </p>
                                           </td>
                                       </tr>
                                       <tr height=0>
                                           <td width=129 style='border:none'/>
                                           <td width=474 style='border:none'/>
                                           <td width=1 style='border:none'/>
                                       </tr>
                                   </table>
                                   <p class=MsoNormal>
                                       <span lang=NL>&nbsp;</span>
                                   </p>
                               </div>
                           </body>
                       </html>";
	}
}
