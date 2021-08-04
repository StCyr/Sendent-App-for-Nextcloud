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
	private $FileStorageManager;

	public function __construct(LicenseMapper $mapper, SendentFileStorageManager $FileStorageManager) {
		$this->mapper = $mapper;
		$this->FileStorageManager = $FileStorageManager;
	}

	public function findAll() {
		try {
			$list = $this->mapper->findAll();
			foreach ($list as $result) {
				if ($this->valueIsLicenseKeyFilePath($result->getLicensekey()) !== false) {
					$result->setLicensekey($this->FileStorageManager->getLicenseContent());
				}
			}
			return $list;
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
			throw new NotFoundException($e->getMessage());
		} else {
			throw $e;
		}
	}

	public function find(int $id) {
		try {
			$licensekey = $this->mapper->find($id);
			if ($this->valueIsLicenseKeyFilePath($licensekey->getLicensekey()) !== false) {
				$licensekey->setLicensekey($this->FileStorageManager->getLicenseContent());
			}

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
			$licensekey = $this->mapper->findByLicenseKey($key);
			if ($this->valueIsLicenseKeyFilePath($licensekey->getLicensekey()) !== false) {
				$licensekey->setLicensekey($this->FileStorageManager->getLicenseContent());
			}
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
		error_log(print_r("LICENSESERVICE-CREATE", true));

		try {
			$this->cleanupLicenses($license);
			error_log(print_r("LICENSESERVICE-LEVEL=		" . $level, true));

			return $this->update(0, $license,
			$dategraceperiodend, $datelicenseend,
			$maxusers, $maxgraceusers, $email, $datelastchecked, $level);
		} catch (Exception $e) {
			error_log(print_r("LICENSESERVICE-EXCEPTION=" . $e, true));

			$licenseobj = new License();
			
			$value = $this->FileStorageManager->writeLicenseTxt($license);
			$licenseobj->setLicensekey($value);
			$licenseobj->setEmail($email);
			$licenseobj->setLevel($level);
			$licenseobj->setMaxusers($maxusers);
			$licenseobj->setMaxgraceusers($maxgraceusers);
			$licenseobj->setDategraceperiodend(date_format($dategraceperiodend, "Y-m-d"));
			$licenseobj->setDatelicenseend(date_format($datelicenseend, "Y-m-d"));
			$licenseobj->setDatelastchecked(date_format($datelastchecked, "Y-m-d"));

			$value = $this->FileStorageManager->writeLicenseTxt($license);
			$licenseobj->setLicensekey($value);
			error_log(print_r("LICENSESERVICE-EXCEPTION-LEVEL=" . $licenseobj->getLevel(), true));

			$licenseresult = $this->mapper->insert($licenseobj);
			if ($this->valueIsLicenseKeyFilePath($licenseresult->getLicensekey()) !== false) {
				$licenseresult->setLicensekey($this->FileStorageManager->getLicenseContent());
			}

			return $licenseresult;
		}
	}

	public function createNew(string $license, string $email) {
		try {
			$this->cleanupLicenses($license);
		} catch (Exception $e) {
			$this->handleException($e);
		}
		$licenseobj = new License();
		
		$value = $this->FileStorageManager->writeLicenseTxt($license);
		$licenseobj->setLicensekey($value);
		$licenseobj->setEmail($email);
		$licenseobj->setLevel("none");
		$licenseobj->setMaxusers(1);
		$licenseobj->setMaxgraceusers(1);
		$licenseobj->setDategraceperiodend(date_format(date_create("now"), "Y-m-d"));
		$licenseobj->setDatelicenseend(date_format(date_create("now"), "Y-m-d"));
		$licenseobj->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));

		$licenseresult = $this->mapper->insert($licenseobj);
		if ($this->valueIsLicenseKeyFilePath($licenseresult->getLicensekey()) !== false) {
			$licenseresult->setLicensekey($this->FileStorageManager->getLicenseContent());
		}
		return $licenseresult;
	}

	public function update(int $id,string $license, DateTime $dategraceperiodend,
	DateTime $datelicenseend, int $maxusers, int $maxgraceusers,
	string $email, DateTime $datelastchecked, string $level) {
		error_log(print_r("LICENSESERVICE-UPDATE", true));

		$this->cleanupLicenses($license);
		$licenseobj = new License();


		$value = $this->FileStorageManager->writeLicenseTxt($license);
		$licenseobj->setLicensekey($value);

		$licenseobj->setEmail($email);
		$licenseobj->setLevel($level);
		$licenseobj->setMaxusers($maxusers);
		$licenseobj->setMaxgraceusers($maxgraceusers);
		$licenseobj->setDategraceperiodend(date_format($dategraceperiodend, "Y-m-d"));
		$licenseobj->setDatelicenseend(date_format($datelicenseend, "Y-m-d"));
		$licenseobj->setDatelastchecked(date_format($datelastchecked, "Y-m-d"));
		
		$licenseresult = $this->mapper->insert($licenseobj);
		if ($this->valueIsLicenseKeyFilePath($licenseresult->getLicensekey()) !== false) {
			$licenseresult->setLicensekey($this->FileStorageManager->getLicenseContent());
		}
		return $licenseresult;
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
				$this->destroy($license->getId());
			}
		}
	}
	private function valueIsLicenseKeyFilePath($value) {
		if (strpos($value, 'licenseKeyFile') !== false) {
			return true;
		}
		return false;
	}

	private function valueSizeForDb($value) {
		return strlen($value) > 254;
	}
}
