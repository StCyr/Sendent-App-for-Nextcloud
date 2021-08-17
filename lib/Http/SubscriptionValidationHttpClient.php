<?php

namespace OCA\Sendent\Http;

use Exception;
use OCA\Sendent\Http\Dto\SubscriptionIn;
use OCA\Sendent\Service\ConnectedUserService;
use OCA\Sendent\Db\License;

class SubscriptionValidationHttpClient {
	protected $licensehttpclient;
	protected $connecteduserservice;
	public function __construct(LicenseHttpClient $licensehttpclient, ConnectedUserService $connecteduserservice) {
		$this->licensehttpclient = $licensehttpclient;
		$this->connecteduserservice = $connecteduserservice;
	}

	public function validate(License $licenseData): ?License {
		error_log(print_r("SUBSCRIPTIONVALIDATIONHTTPCLIENT-VALIDATE", true));

		$connectedUserCount = $this->connecteduserservice->getCount();
		$data = new SubscriptionIn($licenseData, $connectedUserCount);
		//Initiate cURL.
		try {
			if ($licenseData->getLicensekey() == "" || $licenseData->getEmail() == "") {
				return null;
			}
			$result = $this->licensehttpclient->Post('subscription/validate', $data);
			$validatedLicense = new License();
			if (isset($result)) {
				$validatedLicense->setId($licenseData->getId());
				$validatedLicense->setLicensekey($licenseData->getLicensekey());
				$validatedLicense->setLevel($result->level);
				error_log(print_r("SUBSCRIPTIONVALIDATIONHTTPCLIENT-LEVEL=		" . $result->level, true));
				$validatedLicense->setEmail($licenseData->getEmail());
				$validatedLicense->setDategraceperiodend(date_format(date_create($result->gracePeriodEnd), "Y-m-d"));
				$validatedLicense->setDatelicenseend(date_format(date_create($result->expirationDate), "Y-m-d"));
				$validatedLicense->setMaxusers($result->amountUsers);
				$validatedLicense->setMaxgraceusers($result->amountUsersMax);
				$validatedLicense->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));
				return $validatedLicense;
			} else {
				$validatedLicense = new License();
				$validatedLicense->setId($licenseData->getId());
				$validatedLicense->setLevel("Error_validating");
				$validatedLicense->setLicensekey($licenseData->getLicensekey());
				$validatedLicense->setEmail($licenseData->getEmail());
				return $validatedLicense;
			}
		} catch (Exception $e) {
			error_log(print_r("SUBSCRIPTIONVALIDATIONHTTPCLIENT-VALIDATE-EXCEPTION", true));

			$validatedLicense = new License();
			$validatedLicense->setId($licenseData->getId());
			$validatedLicense->setLevel("Error_incomplete");
			$validatedLicense->setLicensekey($licenseData->getLicensekey());
			$validatedLicense->setEmail($licenseData->getEmail());
			return $validatedLicense;
		}
	}
	public function activate(License $licenseData): ?License {
		error_log(print_r("SUBSCRIPTIONVALIDATIONHTTPCLIENT-ACTIVATE", true));

		$data = new SubscriptionIn($licenseData, 1);
		//Initiate cURL.
		try {
			if ($licenseData->getLicensekey() == "" || $licenseData->getEmail() == "") {
				return null;
			}
			$result = $this->licensehttpclient->Post('subscription/validate', $data);
			if (isset($result)) {
				$activatedLicense = new License();
				$activatedLicense->setId($licenseData->getId());
				$activatedLicense->setLicensekey($licenseData->getLicensekey());
				$activatedLicense->setLevel($result->level);
				error_log(print_r("SUBSCRIPTIONVALIDATIONHTTPCLIENT-LEVEL=		" . $result->level, true));

				$activatedLicense->setEmail($licenseData->getEmail());
				$activatedLicense->setDategraceperiodend(date_format(date_create($result->gracePeriodEnd), "Y-m-d"));
				$activatedLicense->setDatelicenseend(date_format(date_create($result->expirationDate), "Y-m-d"));
				$activatedLicense->setMaxusers($result->amountUsers);
				$activatedLicense->setMaxgraceusers($result->amountUsersMax);
				$activatedLicense->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));
				return $activatedLicense;
			} else {
				$validatedLicense = new License();
				$validatedLicense->setLevel("Error_validating");
				$validatedLicense->setLicensekey($licenseData->getLicensekey());
				$validatedLicense->setEmail($licenseData->getEmail());
				return $validatedLicense;
			}
		} catch (Exception $e) {
			error_log(print_r("SUBSCRIPTIONVALIDATIONHTTPCLIENT-ACTIVATE-EXCEPTION", true));

			$validatedLicense = new License();
			$validatedLicense->setLevel("Error_incomplete");
			$validatedLicense->setLicensekey($licenseData->getLicensekey());
			$validatedLicense->setEmail($licenseData->getEmail());
			return $validatedLicense;
		}
	}
}
