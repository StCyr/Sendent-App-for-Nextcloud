<?php

namespace OCA\Sendent\Service;

use OCP\Files\IAppData;
use OCP\Files\NotFoundException;

class SendentFileStorageManager {
	private $appData;

	public function __construct(IAppData $appData) {
		$this->appData = $appData;
		$this->ensureFolderExists();
	}

	private function ensureFolderExists(): void {
		try {
			$folder = $this->appData->getFolder('settings');
		} catch (NotFoundException $e) {
			$folder = $this->appData->newFolder('settings');
		}
	}

	public function writeTxt($group, $key, $content): string {
		$this->ensureFolderExists();
		$folder = $this->appData->getFolder('settings');
		try {
			if (!$folder->fileExists($key)) {
				$pngFile = $folder->newFile($group . '_' . $key . 'settinggroupvaluefile.txt');
			} else {
				$pngFile = $folder->getFile($group . '_' . $key . 'settinggroupvaluefile.txt');
			}
		} catch (NotFoundException $e) {
			$pngFile = $folder->newFile($group . '_' . $key . 'settinggroupvaluefile.txt');
		}

		$pngFile->putContent($content);
		return $group . '_' . $key . 'settinggroupvaluefile.txt';
	}
	public function writeLicenseTxt(string $content): string {
		$this->ensureFolderExists();
		$folder = $this->appData->getFolder('settings');
		try {
			if (!$folder->fileExists('licenseKeyFile')) {
				$pngFile = $folder->newFile('licenseKeyFile.txt');
			} else {
				$pngFile = $folder->getFile('licenseKeyFile.txt');
			}
		} catch (NotFoundException $e) {
			$pngFile = $folder->newFile('licenseKeyFile.txt');
		}

		$pngFile->putContent($content);
		return 'licenseKeyFile.txt';
	}
	public function fileExists($group, $key): bool {
		try {
			$folder = $this->appData->getFolder('settings');
			$folder->getFile($group . '_' . $key . 'settinggroupvaluefile.txt');
			return true;
		} catch (NotFoundException $e) {
			return false;
		}
	}
	public function fileLicenseExists(): bool {
		try {
			$folder = $this->appData->getFolder('settings');
			$folder->getFile('licenseKeyFile.txt');
			return true;
		} catch (NotFoundException $e) {
			return false;
		}
	}
	public function getContent($group, $key) {
		try {
			$folder = $this->appData->getFolder('settings');
			$file = $folder->getFile($group . '_' . $key . 'settinggroupvaluefile.txt');
			// check if file exists and read from it if possible

			return $file->getContent();
		} catch (NotFoundException $e) {
			return '';
		}
	}
	public function getLicenseContent() {
		try {
			$folder = $this->appData->getFolder('settings');
			$file = $folder->getFile('licenseKeyFile.txt');
			// check if file exists and read from it if possible

			return $file->getContent();
		} catch (NotFoundException $e) {
			return '';
		}
	}
}
