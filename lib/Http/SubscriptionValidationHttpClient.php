<?php

namespace OCA\Sendent\Http;

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

	public function validate(License $licenseData) {
		$connectedUserCount = $this->connecteduserservice->getCount();
		$data = new SubscriptionIn($licenseData, $connectedUserCount);
		//Initiate cURL.
		$result = $this->licensehttpclient->Post('subscription/validate', $data);
		$validatedLicense = new License();
		$validatedLicense->setId($licenseData->getId());
		$validatedLicense->setKey($licenseData->getKey());
		$validatedLicense->setLevel($result->level);
		$validatedLicense->setEmail($licenseData->getEmail());
		$validatedLicense->setDategraceperiodend(date_format(date_create($result->gracePeriodEnd), "Y-m-d"));
		$validatedLicense->setDatelicenseend(date_format(date_create($result->expirationDate), "Y-m-d"));
		$validatedLicense->setMaxusers($result->amountUsers);
		$validatedLicense->setMaxgraceusers($result->amountUsersMax);
		$validatedLicense->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));
		return $validatedLicense;
	}
	public function activate(License $licenseData) {
		$data = new SubscriptionIn($licenseData, 1);
		//Initiate cURL.
		$result = $this->licensehttpclient->Post('subscription/validate', $data);
		$activatedLicense = new License();
		$activatedLicense->setId($licenseData->getId());
		$activatedLicense->setKey($licenseData->getKey());
		$activatedLicense->setLevel($result->level);
		$activatedLicense->setEmail($licenseData->getEmail());
		$activatedLicense->setDategraceperiodend(date_format(date_create($result->gracePeriodEnd), "Y-m-d"));
		$activatedLicense->setDatelicenseend(date_format(date_create($result->expirationDate), "Y-m-d"));
		$activatedLicense->setMaxusers($result->amountUsers);
		$activatedLicense->setMaxgraceusers($result->amountUsersMax);
		$activatedLicense->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));
		return $activatedLicense;
	}
}
