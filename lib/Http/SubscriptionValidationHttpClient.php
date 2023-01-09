<?php

namespace OCA\Sendent\Http;

use Exception;
use OCA\Sendent\Http\Dto\SubscriptionIn;
use OCA\Sendent\Service\ConnectedUserService;
use OCA\Sendent\Db\License;
use Psr\Log\LoggerInterface;

class SubscriptionValidationHttpClient {
	/** @var LicenseHttpClient */
	protected $licenseHttpClient;

	/** @var ConnectedUserService */
	protected $connectedUserService;

	/** @var LoggerInterface */
	protected $logger;

	public function __construct(LicenseHttpClient $licenseHttpClient, ConnectedUserService $connectedUserService, LoggerInterface $logger) {
		$this->licenseHttpClient = $licenseHttpClient;
		$this->connectedUserService = $connectedUserService;
		$this->logger = $logger;
	}

	public function validate(License $licenseData, $connectedUserCount = null): ?License {
		$this->logger->info('SUBSCRIPTIONVALIDATIONHTTPCLIENT-VALIDATE');

		if ($licenseData->getLicensekey() === "" || $licenseData->getEmail() === "") {
			return null;
		}

		$connectedUserCount = $connectedUserCount ?? $this->connectedUserService->getCount($licenseData->getId());
		$data = new SubscriptionIn($licenseData, $connectedUserCount);

		$validatedLicense = new License();
		$validatedLicense->setId($licenseData->getId());
		$validatedLicense->setLicensekey($licenseData->getLicensekey());
		$validatedLicense->setEmail($licenseData->getEmail());

		try {
			$result = $this->licenseHttpClient->post('subscription/validate', $data);

			if (isset($result)) {
				$validatedLicense->setLevel($result->level);
				$validatedLicense->setDategraceperiodend(date_format(date_create($result->gracePeriodEnd), "Y-m-d"));
				$validatedLicense->setDatelicenseend(date_format(date_create($result->expirationDate), "Y-m-d"));
				$validatedLicense->setMaxusers($result->amountUsers);
				$validatedLicense->setMaxgraceusers($result->amountUsersMax);
				$validatedLicense->setDatelastchecked(date_format(date_create("now"), "Y-m-d"));

				$this->logger->info('SUBSCRIPTIONVALIDATIONHTTPCLIENT-LEVEL=		' . $result->level);

				return $validatedLicense;
			}

			$validatedLicense->setLevel(License::ERROR_VALIDATING);
		} catch (Exception $e) {
			$this->logger->error('SUBSCRIPTIONVALIDATIONHTTPCLIENT-VALIDATE-EXCEPTION: ' . $e->getMessage(), [
				'exception' => $e,
			]);

			$validatedLicense->setLevel(License::ERROR_INCOMPLETE);
		}

		return $validatedLicense;
	}

	public function activate(License $licenseData): ?License {
		$this->logger->info('SUBSCRIPTIONVALIDATIONHTTPCLIENT-ACTIVATE');

		return $this->validate($licenseData, 1);
	}
}
