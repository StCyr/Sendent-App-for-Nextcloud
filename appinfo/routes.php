<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\sendent\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
	'routes' => [
		['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
		['name' => 'page#settingTemplateDetail', 'url' => '/settingTemplateDetail', 'verb' => 'GET'],
		['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
		[
			'name' => 'settingkey_api#preflighted_cors',
			'url' => '/api/1.0/{path}',
			'verb' => 'OPTIONS',
			'requirements' => ['path' => '.+']
		],
		['name' => 'settingkey_api#index', 'url' => '/api/1.0/settingkey/index', 'verb' => 'GET'],
		['name' => 'settingkey_api#showByKey', 'url' => '/api/1.0/settingkey/showByKey/{key}', 'verb' => 'GET'],
		['name' => 'settingkey_api#showByTemplateId', 'url' => '/api/1.0/settingkey/showByTemplateId/{templateid}', 'verb' => 'GET'],
		['name' => 'settingkey_api#create', 'url' => '/api/1.0/settingkey', 'verb' => 'POST'],
		['name' => 'settingkey_api#update', 'url' => '/api/1.0/settingkey/{id}', 'verb' => 'PUT'],
		['name' => 'settingkey_api#destroy', 'url' => '/api/1.0/settingkey/{id}', 'verb' => 'DELETE'],
		[
			'name' => 'settinggroupvalue_api#preflighted_cors',
			'url' => '/api/1.0/{path}',
			'verb' => 'OPTIONS',
			'requirements' => ['path' => '.+']
		],
		['name' => 'settinggroupvalue_api#index', 'url' => '/api/1.0/settinggroupvalue/index', 'verb' => 'GET'],
		['name' => 'settinggroupvalue_api#show', 'url' => '/api/1.0/settinggroupvalue/{id}', 'verb' => 'GET'],
		['name' => 'settinggroupvalue_api#showBySettingKeyId', 'url' => '/api/1.0/settinggroupvalue/showbysettingkeyid/{settingkeyid}', 'verb' => 'GET'],
		['name' => 'settinggroupvalue_api#create', 'url' => '/api/1.0/settinggroupvalue', 'verb' => 'POST'],
		['name' => 'settinggroupvalue_api#update', 'url' => '/api/1.0/settinggroupvalue/{id}', 'verb' => 'PUT'],
		['name' => 'settinggroupvalue_api#destroy', 'url' => '/api/1.0/settinggroupvalue/{id}', 'verb' => 'DELETE'],
		[
			'name' => 'settingtemplate_api#preflighted_cors',
			'url' => '/api/1.0/{path}',
			'verb' => 'OPTIONS',
			'requirements' => ['path' => '.+']
		],
		['name' => 'settingtemplate_api#index', 'url' => '/api/1.0/settingtemplate/index', 'verb' => 'GET'],
		['name' => 'settingtemplate_api#show', 'url' => '/api/1.0/settingtemplate/{id}', 'verb' => 'GET'],
		['name' => 'settingtemplate_api#create', 'url' => '/api/1.0/settingtemplate', 'verb' => 'POST'],
		['name' => 'settingtemplate_api#update', 'url' => '/api/1.0/settingtemplate/{id}', 'verb' => 'PUT'],
		['name' => 'settingtemplate_api#destroy', 'url' => '/api/1.0/settingtemplate/{id}', 'verb' => 'DELETE']
		
	]
];
