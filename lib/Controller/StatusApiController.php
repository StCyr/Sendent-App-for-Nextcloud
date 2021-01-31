<?php

namespace OCA\Sendent\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;
use OCA\Sendent\Db\Status;
use OCA\Sendent\Service\LicenseManager;

class StatusApiController extends ApiController {
	private $licensemanager;

	public function __construct(
		$appName,
		IRequest $request,
		$userId,
		LicenseManager $licensemanager
	) {
		parent::__construct($appName, $request);
		$this->userId = $userId;
		$this->licensemanager = $licensemanager;
	}
	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		$result = $this->licensemanager->renewLicense();
		$statusobj = new Status();
		$statusobj->app = "sendent";
		$statusobj->version = "1.1.0";
		$statusobj->currentuserid = $this->userId;
		$statusobj->datelicenseend = $result->getDatelicenseend();
		$statusobj->maxusers = $result->getMaxusers();
		$statusobj->dategraceperiodend = $result->getDategraceperiodend();
		$statusobj->maxusersgrace = $result->getMaxgraceusers();
		$statusobj->currentusers = $this->licensemanager->getCurrentUserCount();
		$statusobj->validlicense = !$result->isLicenseExpired() && $statusobj->currentusers <= $statusobj->maxusersgrace;
		$status = "";
		if ($result->isCheckNeeded()) {
			$status = "RevalidationRequired";
		}
		if ($result->isLicenseExpired()) {
			$status = "Expired";
		}
		if (!$result->isCheckNeeded() && !$result->isLicenseExpired()) {
			$status = "Valid";
		}
		$statusobj->licenseaction = $status;
		return new DataResponse($statusobj);
	}
}
