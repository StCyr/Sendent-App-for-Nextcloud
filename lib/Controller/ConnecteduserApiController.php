<?php

namespace OCA\Sendent\Controller;

use Exception;

use OCP\IRequest;
use OCP\IUserManager;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;
use Psr\Log\LoggerInterface;

use OCA\Sendent\Service\LicenseService;
use OCA\Sendent\Service\ConnectedUserService;

class ConnecteduserApiController extends ApiController {
	private $licenseService;
	private $logger;
	private $service;
	private $userId;
	private $userManager;

	public function __construct(
			  $appName,
			  IRequest $request,
			  LicenseService $licenseService,
			  LoggerInterface $logger,
			  ConnectedUserService $service,
			  IUserManager $userManager,
			  $userId
	   ) {
		parent::__construct($appName, $request);
		$this->licenseService = $licenseService;
		$this->logger = $logger;
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

		$this->logger->info('Got outlook add-in connection for user ' . $this->userId);

		// Finds out user's licenceId
		$license = $this->licenseService->findUserLicense($this->userId);
		$licenseId = is_null($license) ? null : $license->getId();

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
