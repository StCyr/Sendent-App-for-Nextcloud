<?php

// db/author.php
namespace OCA\Sendent\Db;

use DateInterval;
use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class License extends Entity implements JsonSerializable {
	protected $key;
	protected $email;
	protected $dategraceperiodend;
	protected $datelicenseend;
	protected $maxusers;
	protected $maxgraceusers;
	protected $datelastchecked;
	protected $level;
	
	public function __construct() {
		// add types in constructor
	}
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'email' => $this->email,
			'dategraceperiodend' => $this->dategraceperiodend,
			'maxusers' => $this->maxusers,
			'maxgraceusers' => $this->maxgraceusers,
			'level' => $this->level,
			'key' => $this->key,
			'datelicenseend' => $this->datelicenseend,
			'datelastchecked' => $this->datelastchecked
		];
	}

	public function isCheckNeeded() {
		$diffDay = new DateInterval('P7D');
		if (date_create($this->datelastchecked) >= date_sub(date_create("now"), $diffDay)) {
			return false;
		}
		return true;
	}

	public function isLicenseExpired() {
		if (date_create($this->datelicenseend) < date_create("now")
		&& date_create($this->dategraceperiodend) < date_create("now")) {
			return true;
		}
		return false;
	}
}
