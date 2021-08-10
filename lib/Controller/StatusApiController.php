<?php

namespace OCA\Sendent\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;
use OCA\Sendent\Db\Status;
use OCA\Sendent\Service\LicenseManager;
use OCA\Sendent\Service\LicenseService;

class StatusApiController extends ApiController {
	private $licensemanager;
	private $licenseservice;
	public function __construct(
		$appName,
		IRequest $request,
		$userId,
		LicenseManager $licensemanager,
		LicenseService $licenseservice
	) {
		parent::__construct($appName, $request);
		$this->userId = $userId;
		$this->licensemanager = $licensemanager;
		$this->licenseservice = $licenseservice;
	}
	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		$statusobj = new Status();
		$statusobj->app = "sendent";
		$statusobj->version = "1.2.6";
		$statusobj->currentuserid = $this->userId;
		if($this->licensemanager->isLicenseCheckNeeded())
		{
			$result = $this->licensemanager->renewLicense();
		}
			$result = $this->licenseservice->findAll();
			if (isset($result) && $result !== null && $result !== false) {
				if (is_array($result) && count($result) > 0 
				&& $result[0]->getLevel() != "Error_clear" && $result[0]->getLevel() != "Error_incomplete" && $result[0]->getLevel() != "none") {
					$statusobj->datelicenseend = $result[0]->getDatelicenseend();
					$statusobj->maxusers = $result[0]->getMaxusers();
					$statusobj->dategraceperiodend = $result[0]->getDategraceperiodend();
					$statusobj->maxusersgrace = $result[0]->getMaxgraceusers();
					$statusobj->currentusers = $this->licensemanager->getCurrentUserCount();
					$statusobj->validlicense = !$result[0]->isLicenseExpired();
					$status = "";
					if ($result[0]->isCheckNeeded()) {
						$status = "RevalidationRequired";
					}
					if ($result[0]->isLicenseExpired()) {
						$status = "Expired";
					}
					if (!$result[0]->isCheckNeeded() && !$result[0]->isLicenseExpired()) {
						$status = "Valid";
					}
					$statusobj->licenseaction = $status;
				}
				else{
					$statusobj->datelicenseend = date_format(date_create("2021-01-01"),"Y-m-d H:i:s");
					$statusobj->maxusers = 0;
					$statusobj->dategraceperiodend = date_format(date_create("2021-01-01"),"Y-m-d H:i:s");
					$statusobj->maxusersgrace = 0;
					$statusobj->currentusers = 0;
					$statusobj->validlicense = false;
					$status = "";
					$status = "Free";
					$statusobj->licenseaction = $status;
					return new DataResponse($statusobj, Http::STATUS_NOT_FOUND);
			}
			}
			else{
					$statusobj->datelicenseend = date_format(date_create("2021-01-01"),"Y-m-d H:i:s");
					$statusobj->maxusers = 0;
					$statusobj->dategraceperiodend = date_format(date_create("2021-01-01"),"Y-m-d H:i:s");
					$statusobj->maxusersgrace = 0;
					$statusobj->currentusers = 0;
					$statusobj->validlicense = false;
					$status = "";
					$status = "Free";
					$statusobj->licenseaction = $status;
					return new DataResponse($statusobj, Http::STATUS_NOT_FOUND);
			}
		
		
		return new DataResponse($statusobj);
	}
}
