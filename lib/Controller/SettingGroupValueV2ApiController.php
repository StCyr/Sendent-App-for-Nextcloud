<?php

namespace OCA\Sendent\Controller;

use Exception;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\Sendent\Db\SettingGroupValue;
use OCA\Sendent\Db\SettingGroupValueMapper;
use OCA\Sendent\Service\SendentFileStorageManager;

class SettingGroupValueV2ApiController extends ApiController {
	private $mapper;
	private $FileStorageManager;
	private $groupManager;

	public function __construct(IRequest $request, SettingGroupValueMapper $mapper,
	 SendentFileStorageManager $FileStorageManager, IGroupManager $groupManager) {
		parent::__construct(
			"sendent",
			$request,
			'PUT, POST, GET, DELETE, PATCH',
			'Authorization, Content-Type, Accept',
			1728000);
		$this->mapper = $mapper;
		$this->FileStorageManager = $FileStorageManager;
		$this->groupManager = $groupManager;
	}

	/**
	 * @return DataResponse
	 */
	public function index(string $ncgroup=''): DataResponse {
		
		// Find group's gid
		$group = $this->groupManager->search($ncgroup);
		$ncgroup = $group[0]->getGID();

		// Gets settings for group
		$list = $this->mapper->findSettingsForNCGroup($ncgroup);
		foreach ($list as $result) {
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
		}

		// Merges settings from default group
		if ($ncgroup !== '') {
			// Gets a list of all settings defined for the group
			$settingkeyidList = array_map(function($setting) {
				return $setting->getSettingkeyid();
			}, $list);
			
			// Gets settings for the default group
			$defaults = $this->mapper->findSettingsForNCGroup();

			// Merges group settings with default group settings
			foreach ($defaults as $result) {
				if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
					$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
				}
				if (!in_array($result->getSettingkeyid(), $settingkeyidList)) {
					// Setting is not defined for group, let's set the one from the default group
					array_push($list, $result);
				}
			}
		}

		return new DataResponse($list);
	}

	private function valueIsSettingGroupValueFilePath($value): bool {
		if (strpos($value, 'settinggroupvaluefile') !== false) {
			return true;
		}
		return false;
	}

}
