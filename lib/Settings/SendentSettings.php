<?php

namespace OCA\Sendent\Settings;

use OCA\Sendent\Constants;
use OCA\Sendent\Service\LicenseService;
use OCA\Sendent\Service\LicenseManager;
use OCP\App\IAppManager;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Services\IAppConfig;
use OCP\AppFramework\Services\IInitialState;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\Settings\ISettings;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\TagNotFoundException;

class SendentSettings implements ISettings {

	/** @var IAppManager */
	private $appManager;

	/** @var IGroupManager */
	private $groupManager;

	/** @var IInitialState */
	private $initialState;

	/** @var IAppConfig */
	private $appConfig;

	/** @var ISystemTagManager */
	private $tagManager;

	/** @var IL10N */
	private $l;

	/** @var LicenseManager */
	private $licenseManager;

	/** @var LicenseService */
	private $licenseService;

	public function __construct(
		IAppManager $appManager,
		IGroupManager $groupManager,
		IInitialState $initialState,
		IAppConfig $appConfig,
		ISystemTagManager $tagManager,
		IL10N $l,
		LicenseManager $licenseManager,
		LicenseService $licenseService
		) {
		$this->appManager = $appManager;
		$this->groupManager = $groupManager;
		$this->initialState = $initialState;
		$this->appConfig = $appConfig;
		$this->tagManager = $tagManager;
		$this->l = $l;
		$this->licenseManager = $licenseManager;
		$this->licenseService = $licenseService;
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

		$params = $this->initializeGroups();

		// Gets dependencies status
		$deps = $this->checkDependenciesStatus();
		$params = array_merge($params, $deps);

		// Gets default license info
		$license = $this->licenseService->findByGroup("");
		if (count($license) === 0) {
			$params['defaultLicenseStatus'] = $this->l->t("No license configured");
		} else {
			$params['defaultLicenseLevel'] = $license[0]->getLevel();
			$params['defaultLicenseExpirationDate'] = $license[0]->getDatelicenseend();
			$params['defaultLicenseLastCheck'] = $license[0]->getDatelastchecked();
			if ($license[0]->isCleared()) {
				$params['defaultLicenseStatus'] = $this->l->t("No license configured");
			} elseif ($license[0]->isIncomplete()) {
				$params['defaultLicenseStatus'] = $this->l->t("Missing email address or license key.");
			} elseif ($license[0]->isCheckNeeded()) {
				$params['defaultLicenseStatus'] = $this->l->t("Revalidation of your license is required");
			} elseif ($license[0]->isLicenseExpired()) {
				$params['defaultLicenseStatus'] = $this->l->t("Current license has expired.") .
					"</br>" .
					$this->l->t('%1$sContact sales%2$s to renew your license.', ["<a href='mailto:info@sendent.nl' style='color:blue'>", "</a>"]);
			} elseif (!$license[0]->isCheckNeeded() && !$license[0]->isLicenseExpired()) {
				$params['defaultLicenseStatus'] = $this->l->t("Current license is valid");
			} elseif (!$this->licensemanager->isWithinUserCount() && $this->licensemanager->isWithinGraceUserCount()) {
				$params['defaultLicenseStatus'] = $this->l->t("Current amount of active users exceeds licensed amount. Some users might not be able to use Sendent.");
			} elseif (!$this->licensemanager->isWithinUserCount() && !$this->licensemanager->isWithinGraceUserCount()) {
				$params['defaultLicenseStatus'] = $this->l->t("Current amount of active users exceeds licensed amount. Additional users trying to use Sendent will be prevented from doing so.");
			}
		}

		return new TemplateResponse('sendent', 'index', $params);
	}

	private function checkDependenciesStatus() {
		$apps = [];
		foreach (Constants::APPS_REQUIRED as $app) {
			$appInfo = $this->appManager->getAppInfo($app);
			if ($this->appManager->isInstalled($app)) {
				array_push($apps, [
					'name' => $appInfo['name'],
					'status' => True
				]);
			} else {
				array_push($apps, [
					'name' => $app,
					'status' => False
				]);
			}
		}
		$params['requiredApps'] = $apps;

		$apps = [];
		foreach (Constants::APPS_RECOMMENDED as $app) {
			$appInfo = $this->appManager->getAppInfo($app);
			if ($this->appManager->isInstalled($app)) {
				array_push($apps, [
					'name' => $appInfo['name'],
					'status' => True
				]);
			} else {
				array_push($apps, [
					'name' => $app,
					'status' => False
				]);
			}
		}
		$params['recommendedApps'] = $apps;

		return $params;
	}

	/**
	 * Returns 2 lists of groups:
	 * 	1- All Nextcloud groups except the groups in the second list;
	 * 	2- All Nextcloud groups that are used in for our client settings
	 */
	private function initializeGroups() {

		// Gets groups used in the app
		$sendentGroups = $this->appConfig->getAppValue('sendentGroups', '');
		$sendentGroups = $sendentGroups !== '' ? json_decode($sendentGroups) : [];

		// Gets all Nextcloud groups
		$NCGroups = $this->groupManager->search('');
		$NCGroups = array_map(function ($group) {
			return $group->getDisplayName();
		}, $NCGroups);

		// Removes sendentGroups from all Nextcloud groups
		$NCGroups = array_diff($NCGroups, $sendentGroups);

		// Finds out if a Nextcloud group used in the app has been deleted
		$sendentGroups = array_map(function ($sendentGroup) {
			$deleteString = ' *** DELETED GROUP ***';

			$sendentGroup = str_ends_with($sendentGroup, $deleteString) ? substr_replace($sendentGroup, '', -strlen($deleteString)): $sendentGroup;

			$groups = $this->groupManager->search($sendentGroup);
			foreach ($groups as $group) {
				if ($group->getDisplayName() === $sendentGroup) {
					return $sendentGroup;
				}
			}

			// Group hasn't been found in Nextcloud groups, so it has been deleted
			return $sendentGroup . $deleteString;
		}, $sendentGroups);

		$params['ncGroups'] = $NCGroups;
		$params['sendentGroups'] = $sendentGroups;

		return $params;
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
