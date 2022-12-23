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
	 * @param string $ncgroup
	 * @return DataResponse
	 */
	public function index(string $ncgroup=''): DataResponse {
		
		// Find group's gid
		if ($ncgroup !== '') {
			// TODO: Needs an exact match of the displayName here
			$group = $this->groupManager->search($ncgroup);
			$ncgroup = $group[0]->getGID();
		}

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
				// Initializes value
				if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
					$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
				}
				// Merges group settings
				if (!in_array($result->getSettingkeyid(), $settingkeyidList)) {
					// Setting is not defined for group, let's set the one from the default group
					array_push($list, $result);
				} else if (in_array($result->getSettingkeyid(), [0, 2])) {
					// multivalue settings must be merged with the ones from the default group
					$list = array_map(function($setting) use ($result) {
						if ($setting->getSettingkeyid() === $result->getSettingkeyid()) {
							$setting->setValue($setting->getValue() . ';' . $result->getValue());
						}
						return $setting;
					},$list);
				}
			}
		}

		return new DataResponse($list);
	}

	/**
	 * @param int $settingkeyid
	 * @param int $groupid
	 * @param string $value
	 * @param string $ncgroup
	 * @return DataResponse
	 */
	public function create(int $settingkeyid, int $groupid, string $value, string $group) {
		if ($this->valueSizeForDb($value) === false) {
			$value = $this->FileStorageManager->writeTxt($groupid, $settingkeyid, $value);
		}
		$SettingGroupValue = new SettingGroupValue();
		$SettingGroupValue->setSettingkeyid($settingkeyid);
		$SettingGroupValue->setGroupid($groupid);
		$SettingGroupValue->setValue($value);
		$SettingGroupValue->setNcgroup($group);
		$result = $this->mapper->insert($SettingGroupValue);
		return $this->showBySettingKeyId($settingkeyid, $group);
	}

	/**
	 * @param int $settingkeyid
	 * @param int $groupid
	 * @param string $ncgroup
	 * @return DataResponse
	 */
	public function delete(int $settingkeyid, string $group) {
		// Deletes requested setting
		$SettingGroupValue = $this->mapper->find($settingkeyid, $group);
		$this->mapper->delete($SettingGroupValue);
		// Returns corresponding default settting
		return $this->showBySettingKeyId($settingkeyid, '');
	}


	/**
	 * @param int $id
	 * @param int $settingkeyid
	 * @param int $groupid
	 * @param string $value
	 * @param string $ncgroup
	 * @return DataResponse
	 */
	public function update(int $id,int $settingkeyid, int $groupid, string $value, string $group) {
		try {
			if ($this->valueSizeForDb($value) === false) {
				$value = $this->FileStorageManager->writeTxt($groupid, $settingkeyid, $value);
			}
			$SettingGroupValue = $this->mapper->find($id, $group);
			$SettingGroupValue->setSettingkeyid($settingkeyid);
			$SettingGroupValue->setGroupid($groupid);
			$SettingGroupValue->setValue($value);
			$SettingGroupValue->setNcgroup($group);
			$result = $this->mapper->update($SettingGroupValue);
			return $this->showBySettingKeyId($settingkeyid, $group);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
	}

	/**
	 * @param int $settingkeyid
	 *
	 * @return DataResponse
	 */
	private function showBySettingKeyId(int $settingkeyid, string $ncgroup): DataResponse {
		try {
			$result = $this->mapper->findBySettingKeyId($settingkeyid, $ncgroup);
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
			return new DataResponse($result);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
	}

	private function valueIsSettingGroupValueFilePath($value): bool {
		if (strpos($value, 'settinggroupvaluefile') !== false) {
			return true;
		}
		return false;
	}

	private function valueSizeForDb(string $value): bool {
		return strlen($value) < 255 !== false;
	}

}
