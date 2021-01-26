<?php

// db/author.php
namespace OCA\sendent\db;

use OCP\AppFramework\Db\Entity;
use JsonSerializable;

class settinggroupvalue extends Entity implements JsonSerializable {
	protected $groupid;
	protected $settingkeyid;
	protected $value;

	public function __construct() {
		// add types in constructor
	}
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'groupid' => $this->groupid,
			'settingkeyid' => $this->settingkeyid,
			'value' => $this->value
		];
	}
}
