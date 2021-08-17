<?php

namespace OCA\Sendent\Settings;

use OCA\Sendent\Constants;
use OCP\App\IAppManager;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Services\IAppConfig;
use OCP\AppFramework\Services\IInitialState;
use OCP\Settings\ISettings;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\TagNotFoundException;

class SendentSettings implements ISettings {

	/** @var IAppManager */
	private $appManager;

	/** @var IInitialState */
	private $initialState;

	/** @var IAppConfig */
	private $appConfig;

	/** @var ISystemTagManager */
	private $tagManager;

	public function __construct(
		IAppManager $appManager,
		IInitialState $initialState,
		IAppConfig $appConfig,
		ISystemTagManager $tagManager
			) {
		$this->appManager = $appManager;
		$this->initialState = $initialState;
		$this->appConfig = $appConfig;
		$this->tagManager = $tagManager;
	}

	/**
	 * @return TemplateResponse
	 */
	public function getForm() {
		$this->initialState->provideInitialState('apps', [
			'files_retention' => $this->getEnabledAppVersion('files_retention'),
			'files_automatedtagging' => $this->getEnabledAppVersion('files_automatedtagging'),
		]);

		$this->initialState->provideInitialState('tags', $this->getTagState());

		return new TemplateResponse('sendent', 'index');
	}

	/**
	 * @param string $appId
	 *
	 * @return false|string
	 */
	private function getEnabledAppVersion(string $appId) {
		if (!$this->appManager->isInstalled($appId)) {
			return false;
		}

		return $this->appManager->getAppVersion($appId);
	}

	private function getTagState(): array {
		$tagKeys = [Constants::CONFIG_UPLOAD_TAG, Constants::CONFIG_EXPIRED_TAG, Constants::CONFIG_REMOVED_TAG];
		$state = array_flip($tagKeys);

		array_walk($state, function (&$value, $key) {
			$tagId = $this->appConfig->getAppValue($key, '');

			if ($tagId === '') {
				$tagId = -1;
			} else {
				try {
					$this->tagManager->getTagsByIds($tagId);
				} catch (TagNotFoundException $e) {
					$tagId = -1;
				}
			}

			$value = (int)$tagId;
		});

		return $state;
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
