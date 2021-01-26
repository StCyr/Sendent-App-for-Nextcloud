<?php

// db/author.php
namespace OCA\sendent\db;

use OCP\AppFramework\Db\Entity;
use JsonSerializable;

class settingtemplate extends Entity implements JsonSerializable {
	protected $templatename;

	public function __construct() {
		// add types in constructor
	}
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'templatename' => $this->templatename
		];
	}
}
