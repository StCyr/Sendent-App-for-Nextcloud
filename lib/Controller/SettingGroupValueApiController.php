<?php

 namespace OCA\Sendent\Controller;

 use Exception;
use OCP\IRequest;
 use OCP\AppFramework\Http;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\ApiController;

 use OCA\Sendent\Db\SettingGroupValue;
 use OCA\Sendent\Db\SettingGroupValuemapper;
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
 	 * @NoCSRFRequired
 	 */
 	public function index() {
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
 	 * @NoCSRFRequired
 	 * @param int $id
 	 */
 	public function show(int $id) {
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
 	 * @NoCSRFRequired
 	 * @param int $settingkeyid
 	 */
 	public function showBySettingKeyId(int $settingkeyid) {
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

 	private function valueIsSettingGroupValueFilePath($value) {
 		if (strpos($value, 'settinggroupvaluefile') !== false) {
 			return true;
 		}
 		return false;
 	}

 	private function valueSizeForDb($value) {
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
 	 * @NoCSRFRequired
 	 * @param int $id
 	 */
 	public function destroy(int $id) {
 		try {
 			$SettingGroupValue = $this->mapper->find($id);
 		} catch (Exception $e) {
 			return new DataResponse([], Http::STATUS_NOT_FOUND);
 		}
 		$this->mapper->delete($SettingGroupValue);
 		return new DataResponse($SettingGroupValue);
 	}
 }
