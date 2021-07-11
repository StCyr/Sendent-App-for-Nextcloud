<?php

namespace OCA\Sendent\Service;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Sendent\Db\License;
use OCA\Sendent\Http\SubscriptionValidationHttpClient;

use Exception;

class LicenseManager {
	protected $licenseservice;
	protected $connecteduserservice;
	protected $subscriptionvalidationhttpclient;

	public function __construct(LicenseService $licenseservice,
	ConnectedUserService $connecteduserservice,
	SubscriptionValidationHttpClient $subscriptionvalidationhttpclient) {
		$this->licenseservice = $licenseservice;
		$this->connecteduserservice = $connecteduserservice;
		$this->subscriptionvalidationhttpclient = $subscriptionvalidationhttpclient;
	}

	private function handleException($e) {
		if (
			$e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException
		) {
			throw new NotFoundException($e->getMessage());
		} else {
			throw $e;
		}
	}
	public function pingLicensing()
	{
		try{
			$licenses = $this->licenseservice->findAll();
			if (isset($licenses) && $licenses !== null && count($licenses) > 0) {
				$license = $licenses[0];
				$license = $this->subscriptionvalidationhttpclient->validate($license);
			}
		}
			catch(Exception $e)
			{

			}
		}
	public function renewLicense() {
		try {
			$licenses = $this->licenseservice->findAll();
			if (isset($licenses) && $licenses !== null && count($licenses) > 0) {
				$license = $licenses[0];
				$license = $this->subscriptionvalidationhttpclient->validate($license);
				if (isset($license)) {

					$maxUsers = $license->getMaxusers();
					if(!isset($maxUsers))
					{
						$maxUsers = 1;
					}
					$maxGraceUsers = $license->getMaxgraceusers();
					if(!isset($maxGraceUsers))
					{
						$maxGraceUsers = 1;
					}
					$level = $license->getLevel();
					if(!isset($level) && ($license->getEmail() == "" || $license->getLicensekey() == ""))
					{
						$level = "Error_incomplete";
					}
					else if(!isset($level))
					{
						$level = "Error_validating";
					}
					
					return $this->licenseservice->update(
						$license->getId(),
						$license->getLicensekey(),
						date_create($license->getDategraceperiodend()),
						date_create($license->getDatelicenseend()),
						$maxUsers,
						$maxGraceUsers,
						$license->getEmail(),
						date_create($license->getDatelastchecked()),
						$level
					);
				}
				else{
					$license = new License();
					$license->setLevel("nolicense");
					return $license;
				}
			}
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function createLicense(string $license, string $email) {
		try {
			$existingLicense = $this->licenseservice->findByLicenseKey($license);
			if (isset($existingLicense)) {
				return $this->activateLicense($existingLicense);
			}
		} catch (Exception $e) {
			try {
				$licenseData = $this->licenseservice->createNew($license, $email);
				return $this->activateLicense($licenseData);
			} catch (Exception $e) {
				$this->handleException($e);
			}
		}
	}

	public function activateLicense(License $license) {
		error_log(print_r("LICENSEMANAGER-ACTIVATELICENSE", TRUE)); 

		$activatedLicense = $this->subscriptionvalidationhttpclient->activate($license);
		if (isset($activatedLicense)) {
			$level = $activatedLicense->getLevel();
			error_log(print_r("LICENSEMANAGER-LEVEL=		" . $level, TRUE)); 

					if(!isset($level) && ($activatedLicense->getEmail() == "" || $activatedLicense->getLicensekey() == ""))
					{
						$level = "Error_incomplete";
						error_log(print_r("LICENSEMANAGER-LEVEL=		Error_incomplete", TRUE)); 
					}
					else if(!isset($level))
					{
						$level = "Error_validating";						
						error_log(print_r("LICENSEMANAGER-LEVEL=		Error_validating", TRUE)); 
					}
					$maxUsers = $activatedLicense->getMaxusers();
					if(!isset($maxUsers))
					{
						$maxUsers = 1;
					}
					$maxGraceUsers = $activatedLicense->getMaxgraceusers();
					if(!isset($maxGraceUsers))
					{
						$maxGraceUsers = 1;
					}
					error_log(print_r("LICENSEMANAGER-LEVEL=		" . $level, TRUE)); 

			return $this->licenseservice->create(
				$activatedLicense->getLicensekey(),
				date_create($activatedLicense->getDategraceperiodend()),
				date_create($activatedLicense->getDatelicenseend()),
				$maxUsers,
				$maxGraceUsers,
				$activatedLicense->getEmail(),
				date_create("now"),
				$level
			);
		}
		else{
			$license = new License();
			$license->setLevel("nolicense");
			return $license;
		}
		return false;
	}

	public function isLocalValid() {
		return $this->licenseExists() && !$this->isExpired() && ($this->isWithinUserCount() || $this->isWithinGraceUserCount()) && !$this->isLicenseCheckNeeded();
	}
	public function isValidLicense() {
		return $this->licenseExists() && !$this->isExpired() && ($this->isWithinUserCount() || $this->isWithinGraceUserCount());
	}
	public function isExpired() {
		$licenses = $this->licenseservice->findAll();
		if (isset($licenses)) {
			foreach($licenses as $license){
				return $license->isLicenseExpired();
			}
		}
		return false;
	}

	public function licenseExists() {
		$licenses = $this->licenseservice->findAll();
		if (isset($licenses)) {
			return true;
		}
		return false;
	}

	public function isWithinUserCount() {
		$licenses = $this->licenseservice->findAll();
		if (isset($licenses)) {
			foreach($licenses as $license){
			$userCount = $this->connecteduserservice->getCount();
			$maxUserCount = $license->getMaxusers();
			return $userCount <= $maxUserCount;
			}
		}
		return false;
	}

	public function isWithinGraceUserCount() {
		$licenses = $this->licenseservice->findAll();
		if (isset($licenses)) {
			foreach($licenses as $license){
			$userCount = $this->connecteduserservice->getCount();
			$maxUserCount = $license->getMaxgraceusers();
			return $userCount <= $maxUserCount;
			}
		}
		return false;
	}
	public function getCurrentUserCount() {
		return $this->connecteduserservice->getCount();
	}

	public function isLicenseCheckNeeded() {
		$licenses = $this->licenseservice->findAll();
		if (isset($licenses)) {
			foreach($licenses as $license){
			return $license->isCheckNeeded();
			}
		}
		return false;
	}
}
