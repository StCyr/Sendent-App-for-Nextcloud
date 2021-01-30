<?php

namespace OCA\Sendent\AppInfo;

use OCP\AppFramework\App;

class Application extends App {
	/**
	 * @param array $params
	 */
	public function __construct(array $params = []) {
		parent::__construct('sendent', $params);
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
