<?php

namespace OCA\sendent\service;

use OCP\Files\IAppData;
use OCP\Files\NotFoundException;

class sendentfilestoragemanager {
	private $appData;

	public function __construct(IAppData $appData) {
		$this->appData = $appData;
		$this->ensureFolderExists();
	}
	private function ensureFolderExists() {
		try {
			$folder = $this->appData->getFolder('settings');
		} catch (NotFoundException $e) {
			$folder = $this->appData->newFolder('settings');
		}
	}
	public function writeTxt($group, $key, $content) {
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

	public function fileExists($group, $key) {
		try {
			$folder = $this->appData->getFolder('settings');
			$folder->getFile($group . '_' . $key . 'settinggroupvaluefile.txt');
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
}
