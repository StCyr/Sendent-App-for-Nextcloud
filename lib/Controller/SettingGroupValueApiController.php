<?php

namespace OCA\Sendent\Controller;

use Exception;
use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\Sendent\Db\SettingGroupValue;
use OCA\Sendent\Db\SettingGroupValueMapper;
use OCA\Sendent\Service\SendentFileStorageManager;

class SettingGroupValueApiController extends ApiController {
	private $mapper;
	private $FileStorageManager;

	public function __construct(IRequest $request, SettingGroupValueMapper $mapper,
	 SendentFileStorageManager $FileStorageManager) {
		parent::__construct(
			"sendent",
			$request,
			'PUT, POST, GET, DELETE, PATCH',
			'Authorization, Content-Type, Accept',
			1728000);
		$this->mapper = $mapper;
		$this->FileStorageManager = $FileStorageManager;
	}

	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @return DataResponse
	 */
	public function index(): DataResponse {
		$list = $this->mapper->findAll();
		foreach ($list as $result) {
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
		}
		return new DataResponse($list);
	}

	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @return DataResponse
	 */
	public function theming(): DataResponse {
		$list = $this->mapper->findAll();
		foreach ($list as $result) {
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
		}
		return new DataResponse($list);
	}

	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 *
	 * @return DataResponse
	 */
	public function show(int $id): DataResponse {
		try {
			$result = $this->mapper->find($id);
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
			return new DataResponse($result);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
	}
	
	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @param int $settingkeyid
	 *
	 * @return DataResponse
	 */
	public function showBySettingKeyId(int $settingkeyid): DataResponse {
		try {
			$result = $this->mapper->findBySettingKeyId($settingkeyid);
			if ($this->valueIsSettingGroupValueFilePath($result->getValue()) !== false) {
				$result->setValue($this->FileStorageManager->getContent($result->getGroupid(), $result->getSettingkeyid()));
			}
			return new DataResponse($result);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
	}
	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @PublicPage
	 *
	 * @param int $groupid
	 *
	 * @return DataResponse
	 */
	public function findByGroupId(int $groupid): DataResponse {
		try {
			if ($groupid == 1) {
				$result = $this->mapper->findByGroupId($groupid);
				foreach ($result as $item) {
					if ($this->valueIsSettingGroupValueFilePath($item->getValue()) !== false) {
						$item->setValue($this->FileStorageManager->getContent($item->getGroupid(), $item->getSettingkeyid()));
					}
				}
				return new DataResponse($result);
			} else {
				return new DataResponse([], Http::STATUS_NOT_FOUND);
			}
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

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $settingkeyid
	 * @param int $groupid
	 * @param string $value
	 */
	public function create(int $settingkeyid, int $groupid, string $value) {
		if ($this->valueSizeForDb($value) === false) {
			$value = $this->FileStorageManager->writeTxt($groupid, $settingkeyid, $value);
		}
		$SettingGroupValue = new SettingGroupValue();
		$SettingGroupValue->setSettingkeyid($settingkeyid);
		$SettingGroupValue->setGroupid($groupid);
		$SettingGroupValue->setValue($value);
		$result = $this->mapper->insert($SettingGroupValue);
		return $this->showBySettingKeyId($settingkeyid);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $id
	 * @param int $settingkeyid
	 * @param int $groupid
	 * @param string $value
	 */
	public function update(int $id,int $settingkeyid, int $groupid, string $value) {
		try {
			if ($this->valueSizeForDb($value) === false) {
				$value = $this->FileStorageManager->writeTxt($groupid, $settingkeyid, $value);
			}
			$SettingGroupValue = $this->mapper->find($id);
			$SettingGroupValue->setSettingkeyid($settingkeyid);
			$SettingGroupValue->setGroupid($groupid);

			$SettingGroupValue->setValue($value);
			$result = $this->mapper->update($SettingGroupValue);
			return $this->showBySettingKeyId($settingkeyid);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
	}

	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 *
	 * @return DataResponse
	 */
	public function destroy(int $id): DataResponse {
		try {
			$SettingGroupValue = $this->mapper->find($id);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
		$this->mapper->delete($SettingGroupValue);
		return new DataResponse($SettingGroupValue);
	}
}
