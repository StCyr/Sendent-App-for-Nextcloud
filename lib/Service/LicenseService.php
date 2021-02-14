<?php

namespace OCA\Sendent\Service;

use DateTime;
use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Sendent\Db\License;
use OCA\Sendent\Db\LicenseMapper;

class LicenseService {
	private $mapper;

	public function __construct(LicenseMapper $mapper) {
		$this->mapper = $mapper;
	}

	public function findAll() {
		try {
			return $this->mapper->findAll();

			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	private function handleException($e) {
		if ($e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException) {
			throw new notfoundexception($e->getMessage());
		} else {
			throw $e;
		}
	}

	public function find(int $id) {
		try {
			return $this->mapper->find($id);

			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function findByLicenseKey(string $key) {
		try {
			return $this->mapper->findByLicenseKey($key);

			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function create(string $license, DateTime $dategraceperiodend,
	DateTime $datelicenseend, int $maxusers, int $maxgraceusers,
	string $email, DateTime $datelastchecked, string $level) {
		try {
			$this->cleanupLicenses($license);
			$existingLicense = $this->mapper->findByLicenseKey($license);
			return $this->update($existingLicense->getId(), $license,
			$dategraceperiodend, $datelicenseend,
			$maxusers, $maxgraceusers, $email, $datelastchecked, $level);
		} catch (Exception $e) {
			$licenseobj = new License();
			$licenseobj->setLicensekey($license);
			$licenseobj->setEmail($email);
			$licenseobj->setLevel($level);
			$licenseobj->setMaxusers($maxusers);
			$licenseobj->setMaxgraceusers($maxgraceusers);
			$licenseobj->setDategraceperiodend(date_format($dategraceperiodend, "Y-m-d"));
			$licenseobj->setDatelicenseend(date_format($datelicenseend, "Y-m-d"));
			$licenseobj->setDatelastchecked(date_format($datelastchecked, "Y-m-d"));
			return $this->mapper->insert($licenseobj);
		}
	}

	public function createNew(string $license, string $email) {
		try {
			$this->cleanupLicenses($license);
		} catch (Exception $e) {
			$this->handleException($e);
		}
		$licenseobj = new License();
		$licenseobj->setLicensekey($license);
		$licenseobj->setEmail($email);
		$licenseobj->setLevel("none");
		$licenseobj->setMaxusers(1);
		$licenseobj->setMaxgraceusers(1);
		$licenseobj->setDategraceperiodend(date_format(date_create("now"), "Y-m-d"));
		$licenseobj->setDatelicenseend(date_format(date_create("now"), "Y-m-d"));
		$licenseobj->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));

		return $this->mapper->insert($licenseobj);
	}

	public function update(int $id,string $license, DateTime $dategraceperiodend,
	DateTime $datelicenseend, int $maxusers, int $maxgraceusers,
	string $email, DateTime $datelastchecked, string $level) {
		$this->cleanupLicenses($license);
		$licenseobj = new License();

		try {
			$licenseobj = $this->mapper->find($id);
		} catch (Exception $e) {
			$this->handleException($e);
		}
		
		$licenseobj->setLicensekey($license);
		$licenseobj->setEmail($email);
		$licenseobj->setLevel($level);
		$licenseobj->setMaxusers($maxusers);
		$licenseobj->setMaxgraceusers($maxgraceusers);
		$licenseobj->setDategraceperiodend(date_format($dategraceperiodend, "Y-m-d"));
		$licenseobj->setDatelicenseend(date_format($datelicenseend, "Y-m-d"));
		$licenseobj->setDatelastchecked(date_format($datelastchecked, "Y-m-d"));
		return $this->mapper->update($licenseobj);
	}

	public function destroy(int $id) {
		try {
			$license = $this->mapper->find($id);
		} catch (Exception $e) {
			$this->handleException($e);
		}
		$this->mapper->delete($license);
		return $license;
	}

	private function cleanupLicenses($licenseToKeep) {
		$licenses = $this->mapper->findAll();
		if (isset($licenses)) {
			foreach ($licenses as $license) {
				if ($license->getLicensekey() !== $licenseToKeep) {
					$this->destroy($license->getId());
				}
			}
		}
	}
}
