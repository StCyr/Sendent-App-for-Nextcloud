<?php

namespace OCA\Sendent\Controller;

use OCP\AppFramework\ApiController;
use OCP\AppFramework\Services\IAppConfig;
use OCP\IRequest;

class SettingGroupsManagementController extends ApiController {

	/** @var IAppConfig */
	private $appConfig;

	public function __construct($appName, IAppConfig $appConfig, IRequest $request) {
		parent::__construct($appName, $request);
		$this->appConfig = $appConfig;
	}

	public function update($sendentGroups) {
		$this->appConfig->setAppValue('sendentGroups', json_encode($sendentGroups));
		return;
	}
}
