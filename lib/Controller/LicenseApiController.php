<?php

namespace OCA\Sendent\Controller;

use Exception;
use OCA\Sendent\Controller\Dto\LicenseStatus;
use OCA\Sendent\Service\LicenseManager;
use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\Sendent\Service\LicenseService;

class LicenseApiController extends ApiController {
	private $service;
	private $licensemanager;

	public function __construct(
			  $appName,
			  IRequest $request,
			  LicenseManager $licensemanager,
			  LicenseService $licenseservice,
			  $userId
	   ) {
		parent::__construct($appName, $request);
		$this->service = $licenseservice;
		$this->userId = $userId;
		$this->licensemanager = $licensemanager;
	}
	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function show() {
		try {
			try{
				$this->licensemanager->renewLicense();
			}
			catch(Exception $e){
				
			}
			$result = $this->service->findAll();
			if (isset($result) && $result !== null && $result !== false) {
				if (is_array($result) && $result[0] !== null && isset($result[0])) {
					$email = $result[0]->getEmail();
					$licensekey = $result[0]->getLicensekey();
					$dateExpiration = $result[0]->getDatelicenseend();
					$dateLastCheck = $result[0]->getDatelastchecked();
					$level = $result[0]->getLevel();
					$statusKind = "";
					$status = "";
					if ($result[0]->isCheckNeeded()) {
						$status = "Revalidation of your license is required";
						$statusKind = "check";
					}
					if ($result[0]->isLicenseExpired()) {
						$status = "Current license has expired. </br><u><a href='mailto:info@sendent.nl' style='color:blue'>Contact sales</a></u> to renew your license.";
						$statusKind = "expired";
					}
					if (!$result[0]->isCheckNeeded() && !$result[0]->isLicenseExpired()) {
						$status = "Current license is valid";
						$statusKind = "valid";
					}
					
					if(!$this->licensemanager->isWithinUserCount() && $this->licensemanager->isWithinGraceUserCount())
					{
						$status = "Current amount of active users exceeds licensed amount. Some users might not be able to use Sendent.";
						$statusKind = "userlimit";
					}
					else if (!$this->licensemanager->isWithinUserCount() && !$this->licensemanager->isWithinGraceUserCount()) {
						$status = "Current amount of active users exceeds licensed amount. Additional users trying to use Sendent will be prevented from doing so.";
						$statusKind = "userlimit";
					}
					return new DataResponse(new LicenseStatus($status, $statusKind, $level,$licensekey, $dateExpiration, $dateLastCheck, $email));
				} else {
					return new DataResponse(new LicenseStatus("No license configured", "nolicense" ,"-", "-", "-", "-", "-"));
				}
			} else {
				return new DataResponse(new LicenseStatus("No license configured", "nolicense" ,"-", "-", "-", "-", "-"));
			}
		} catch (Exception $e) {
			return new DataResponse(new LicenseStatus("An error occured while fetching your license", "fatal" ,"-", "-", "-", "-", "-"));
		}
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param string $license
	 * @param string $email
	 */
	public function create(string $license, string $email) {
		return $this->licensemanager->createLicense($license, $email);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function renew() {
		return $this->licensemanager->renewLicense();
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function validate() {
		$this->licensemanager->renewLicense();
		return $this->licensemanager->isLocalValid();
	}
}
