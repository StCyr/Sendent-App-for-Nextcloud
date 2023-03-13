<?php

namespace OCA\Sendent\Db;

use OCP\AppFramework\Db\Entity;
use JsonSerializable;

class TermsAgreement extends Entity implements JsonSerializable {
	protected $version;
	protected $agreed;

	public function __construct() {
		// add types in constructor
	}
	public function jsonSerialize() : mixed {
		return [
			'Version' => $this->version,
			'Agreed' => $this->agreed,
		];
	}
}
