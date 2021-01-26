<?php

namespace OCA\sendent\settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\Settings\ISettings;

class sendentsettings implements ISettings {
	/**
	 * SendentSettings constructor.
	 */
	public function __construct() {
	}

	/**
	 * @return TemplateResponse
	 */
	public function getForm() {
		return new TemplateResponse('sendent', 'index');
	}

	/**
	 * @return string the section ID, e.g. 'sharing'
	 */
	public function getSection() {
		return 'sendent';
	}

	/**
	 * @return int whether the form should be rather on the top or bottom of
	 * the admin section. The forms are arranged in ascending order of the
	 * priority values. It is required to return a value between 0 and 100.
	 */
	public function getPriority() {
		return 50;
	}
}
