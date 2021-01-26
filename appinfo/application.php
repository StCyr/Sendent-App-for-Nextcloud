<?php

namespace OCA\sendent\appinfo;

use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;
use OCA\sendent\db\settingkeymapper;
use OCA\sendent\controller\pagecontroller;
use OCA\sendent\service\settingkeyservice;
use OCA\sendent\db\settinggroupvaluemapper;
use OCA\sendent\service\sendentfilestoragemanager;
use OCA\sendent\service\initialloadmanager;
use OCA\sendent\controller\settingkeyapicontroller;
use OCA\sendent\controller\settinggroupvalueapicontroller;

class application extends App {

	/**
	 * @param array $params
	 */
	public function __construct(array $params = []) {
		parent::__construct('sendent', $params);

		$container = $this->getContainer();
		$this->appName = $container->query('AppName');
		
		
		
		self::registerMappers($container);
		self::registerServices($container);
		self::registerControllers($container);
		self::registerCores($container);

		$container->registerService(
			'L10N', function (IAppContainer $c) {
				return $c->query('ServerContainer')
					 ->getL10N($c->query('AppName'));
			}
		);
		$container->query('initialloadmanager');
	}


	/**
	 * Register Controllers
	 *
	 * @param $container
	 */
	private static function registerControllers(IAppContainer &$container) {
		$container->registerService(
			'pagecontroller', function (IAppContainer $c) {
				return new PageController(
				$c->query('AppName'), $c->query('Request'), $c->query('UserId')
			);
			}
		);
		$container->registerService(
			'settingkeyapicontroller', function (IAppContainer $c) {
				return new settingkeyapicontroller(
				$c->query('AppName'), $c->query('Request'), $c->query('settingkeyservice'),
				$c->query('UserId')
			);
			}
		);
		$container->registerService(
			'settinggroupvalueapicontroller', function (IAppContainer $c) {
				return new settinggroupvalueapicontroller(
				$c->query('Request'), $c->query('settinggroupvaluemapper'),
				$c->query('sendentfilestoragemanager')
			);
			}
		);
	}

	/**
	 * Register Mappers
	 *
	 * @param $container
	 */
	private static function registerMappers(IAppContainer &$container) {
		$container->registerService(
			'settingkeymapper', function (IAppContainer $c) {
				return new settingkeymapper(
				$c->query('ServerContainer')
				  ->getDatabaseConnection()
			);
			}
		);
		$container->registerService(
			'settinggroupvaluemapper', function (IAppContainer $c) {
				return new settinggroupvaluemapper(
				$c->query('ServerContainer')
				  ->getDatabaseConnection()
			);
			}
		);
	}
	/**
	 * Register Services
	 *
	 * @param $container
	 */
	private static function registerServices(IAppContainer $container) {
		$container->registerService(
			'settingkeyservice', function (IAppContainer $c) {
				return new settingkeyservice(
				$c->query('settingkeymapper')
			);
			}
		);
		
		/**
		 * Storage Layer
		 */
		

		$container->registerService('sendentfilestoragemanager', function ($c) {
			$factory = $c->query('ServerContainer')->query(\OC\Files\AppData\Factory::class);
			$iAppData = $factory->get('sendent');
			return new sendentfilestoragemanager($iAppData);
		});
		

		
		$container->registerService(
			'initialloadmanager', function (IAppContainer $c) {
				return new initialloadmanager(
				$c->query('settingkeymapper'), $c->query('settinggroupvaluemapper'), $c->query('sendentfilestoragemanager'));
			}
		);
	}

	/**
	 * Register Cores
	 *
	 * @param $container
	 */
	private static function registerCores(IAppContainer &$container) {
		$container->registerService(
			'UserId', function (IAppContainer $c) {
				$user = $c->query('ServerContainer')
					  ->getUserSession()
					  ->getUser();

				/** @noinspection PhpUndefinedMethodInspection */
				return is_null($user) ? '' : $user->getUID();
			}
		);
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
