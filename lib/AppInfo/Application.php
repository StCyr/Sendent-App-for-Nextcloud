<?php

namespace OCA\Sendent\AppInfo;

use OCA\Files\Event\LoadAdditionalScriptsEvent;
use OCA\Files_Sharing\Event\BeforeTemplateRenderedEvent;
use OCA\Sendent\Listener\LoadAdditionalScriptsListener;
use OCA\Sendent\Listener\ShareCreatedListener;
use OCA\Sendent\Listener\ShareDeletedListener;
use OCA\Sendent\Service\InitialLoadManager;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;

class Application extends App implements IBootstrap {

	const APPID = 'sendent';

	/**
	 * @param array $params
	 */
	public function __construct(array $params = []) {
		parent::__construct('sendent', $params);
	}

	public function register(IRegistrationContext $context): void {
		$context->registerEventListener(LoadAdditionalScriptsEvent::class, LoadAdditionalScriptsListener::class);
		$context->registerEventListener(BeforeTemplateRenderedEvent::class, LoadAdditionalScriptsListener::class);

		if (class_exists('\\OCP\\Share\\Events\\ShareDeletedEvent')) {
			$context->registerEventListener(\OCP\Share\Events\ShareDeletedEvent::class, ShareDeletedListener::class);
			$context->registerEventListener(\OCP\Share\Events\ShareCreatedEvent::class, ShareCreatedListener::class);
		}
	}

	public function boot(IBootContext $context): void {
		$context->getAppContainer()->query(InitialLoadManager::class);
	}
}
