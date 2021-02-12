<?php

namespace OCA\Sendent\AppInfo;

use OCA\Sendent\Listener\ShareCreatedListener;
use OCP\AppFramework\App;
use OCP\EventDispatcher\IEventDispatcher;
use OCP\Share\Events\ShareCreatedEvent;

class Application extends App {
	/**
	 * @param array $params
	 */
	public function __construct(array $params = []) {
		parent::__construct('sendent', $params);

		// query is deprecated. Since NC 20 app bootstrap should be used.

		/** @var IEventDispatcher $dispatcher */
		$dispatcher = $this->getContainer()->query(IEventDispatcher::class);

		$dispatcher->addServiceListener(ShareDeletedEvent::class, ShareDeletedListener::class);
	}

	/**
	 * Register Navigation Tab
	 */
	public function registerNavigation() {

		// $this->getContainer()
		// 	 ->getServer()
		// 	 ->getNavigationManager()
		// 	 ->add(
		// 		 function() {
		// 			 $urlGen = \OC::$server->getURLGenerator();

		// 			 return [
		// 				 'id'    => $this->appName,
		// 				 'order' => 10,
		// 				 'href'  => $urlGen->linkToRoute('Sendent.page.index'),
		// 				 'name'  => 'Sendent'
		// 			 ];
		// 		 }
		// 	 );
	}
}
