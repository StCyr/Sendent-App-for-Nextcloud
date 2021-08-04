<?php

namespace OCA\Sendent\Controller;

use Exception;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\Sendent\Service\ConnectedUserService;

class ConnecteduserApiController extends ApiController {
	private $service;
	private $userId;

	public function __construct(
			  $appName,
			  IRequest $request,
			  ConnectedUserService $service,
			  $userId
	   ) {
		parent::__construct($appName, $request);
		$this->service = $service;
		$this->userId = $userId;
	}
	/**
	 * @NoAdminRequired
	 *
	 * @NoCSRFRequired
	 *
	 * @return DataResponse
	 */
	public function ping(): DataResponse {
		try {
			$user = $this->service->create($this->userId, date_create("now"));
		} catch (Exception $e) {
			$user = $this->service->findByUserId($this->userId);
			$this->service->update($user->getId(), $this->userId, date_create("now"));
		}

		return new DataResponse($user);
	}
}
