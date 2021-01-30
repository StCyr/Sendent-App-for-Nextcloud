<?php

 namespace OCA\Sendent\Controller;

 use Exception;

 use OCP\IRequest;
 use OCP\AppFramework\Http;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Controller;

 use OCA\Sendent\Db\SettingTemplate;
 use OCA\Sendent\Db\SettingTemplatemapper;

 class SettingTemplateApiController extends Controller {
 	private $mapper;

 	public function __construct(IRequest $request, SettingTemplateMapper $mapper) {
 		parent::__construct(
			"sendent",
			$request,
			'PUT, POST, GET, DELETE, PATCH',
			'Authorization, Content-Type, Accept',
			1728000);
 		$this->mapper = $mapper;
 	}

 	/**
 	 * @NoAdminRequired
 	 * @NoCSRFRequired
 	 */
 	public function index() {
 		return new DataResponse($this->mapper->findAll());
 	}

 	/**
 	 * @NoAdminRequired
 	 * @NoCSRFRequired
 	 * @param int $id
 	 */
 	public function show(int $id) {
 		try {
 			return new DataResponse($this->mapper->find($id));
 		} catch (Exception $e) {
 			return new DataResponse([], Http::STATUS_NOT_FOUND);
 		}
 	}

 	/**
 	 * @NoAdminRequired
 	 * @NoCSRFRequired
 	 * @param string $name
 	 */
 	public function create($name) {
 		$body = $_POST;
 		$SettingTemplate = new settingtemplate();
 		$SettingTemplate->setTemplatename($name);
 		return new DataResponse($this->mapper->insert($SettingTemplate));
 	}

 	/**
 	 * @NoAdminRequired
 	 * @NoCSRFRequired
 	 * @param int $id
 	 * @param string $templatename
 	 */
 	public function update(int $id, string $templatename) {
 		try {
 			$SettingTemplate = $this->mapper->find($id);
 		} catch (Exception $e) {
 			return new DataResponse([], Http::STATUS_NOT_FOUND);
 		}
 		$SettingTemplate->setTemplatename($templatename);
 		return new DataResponse($this->mapper->update($SettingTemplate));
 	}

 	/**
 	 * @NoAdminRequired
 	 * @NoCSRFRequired
 	 * @param int $id
 	 */
 	public function destroy(int $id) {
 		try {
 			$SettingTemplate = $this->mapper->find($id);
 		} catch (Exception $e) {
 			return new DataResponse([], Http::STATUS_NOT_FOUND);
 		}
 		$this->mapper->delete($SettingTemplate);
 		return new DataResponse($SettingTemplate);
 	}
 }
