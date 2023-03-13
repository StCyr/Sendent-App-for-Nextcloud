<?php

// db/author.php
namespace OCA\Sendent\Db;

use OCP\AppFramework\Db\Entity;
use JsonSerializable;

class SettingTemplate extends Entity implements JsonSerializable {
	protected $templatename;

	public function __construct() {
		// add types in constructor
	}

	public function jsonSerialize() : mixed {
		return [
			'id' => $this->id,
			'templatename' => $this->templatename
		];
	}
}
