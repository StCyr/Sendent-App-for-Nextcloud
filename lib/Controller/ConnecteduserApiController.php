<?php

namespace OCA\Sendent\Controller;

use Exception;

use OCP\IRequest;
use OCP\IUserManager;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\Sendent\Service\LicenseService;
use OCA\Sendent\Service\ConnectedUserService;

class ConnecteduserApiController extends ApiController {
	private $licenseService;
	private $service;
	private $userId;
	private $userManager;

	public function __construct(
			  $appName,
			  IRequest $request,
			  LicenseService $licenseService,
			  ConnectedUserService $service,
			  IUserManager $userManager,
			  $userId
	   ) {
		parent::__construct($appName, $request);
		$this->licenseService = $licenseService;
		$this->service = $service;
		$this->userId = $userId;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * Registers a user connection
	 * 
	 * @return DataResponse
	 */
	public function ping(): DataResponse {

		// Finds out user's licenceId
		$license = $this->licenseService->findUserLicense($this->userId);
		$licenseId = is_null($license) ? $license->getId() : null;

		// Creates or updates the connected user entry
		try {
			$user = $this->service->create($this->userId, date_create("now"), $licenseId);
		} catch (Exception $e) {
			$user = $this->service->findByUserId($this->userId);
			$this->service->update($user->getId(), $this->userId, date_create("now"), $licenseId);
		}

		return new DataResponse($user);
	}
}
