<?php

namespace OCA\Sendent\appinfo;

use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;
use OCA\Sendent\Db\SettingKeymapper;
use OCA\Sendent\Controller\PageController;
use OCA\Sendent\Service\SettingKeyservice;
use OCA\Sendent\Db\SettingGroupValuemapper;
use OCA\Sendent\Service\SendentFileStorageManager;
use OCA\Sendent\Service\InitialLoadManager;
use OCA\Sendent\Controller\SettingKeyApiController;
use OCA\Sendent\Controller\SettingGroupValueApiController;

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
		$container->query('InitialLoadManager');
	}


	/**
	 * Register Controllers
	 *
	 * @param $container
	 */
	private static function registerControllers(IAppContainer &$container) {
		$container->registerService(
			'PageController', function (IAppContainer $c) {
				return new PageController(
				$c->query('AppName'), $c->query('Request'), $c->query('UserId')
			);
			}
		);
		$container->registerService(
			'SettingKeyApiController', function (IAppContainer $c) {
				return new SettingKeyApiController(
				$c->query('AppName'), $c->query('Request'), $c->query('SettingKeyService'),
				$c->query('UserId')
			);
			}
		);
		$container->registerService(
			'SettingGroupValueApiController', function (IAppContainer $c) {
				return new SettingGroupValueApiController(
				$c->query('Request'), $c->query('SettingGroupValueMapper'),
				$c->query('SendentFileStorageManager')
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
			'SettingKeyMapper', function (IAppContainer $c) {
				return new SettingKeyMapper(
				$c->query('ServerContainer')
				  ->getDatabaseConnection()
			);
			}
		);
		$container->registerService(
			'SettingGroupValueMapper', function (IAppContainer $c) {
				return new SettingGroupValueMapper(
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
			'SettingKeyService', function (IAppContainer $c) {
				return new SettingKeyService(
				$c->query('SettingKeyMapper')
			);
			}
		);

		/**
		 * Storage Layer
		 */


		$container->registerService('SendentFileStorageManager', function ($c) {
			$factory = $c->query('ServerContainer')->query(\OC\Files\AppData\Factory::class);
			$iAppData = $factory->get('sendent');
			return new SendentFileStorageManager($iAppData);
		});



		$container->registerService(
			'InitialLoadManager', function (IAppContainer $c) {
				return new InitialLoadManager(
				$c->query('SettingKeyMapper'), $c->query('SettingGroupValueMapper'), $c->query('SendentFileStorageManager'));
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
