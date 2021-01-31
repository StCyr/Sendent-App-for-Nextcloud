<?php

namespace OCA\Sendent\Service;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Sendent\Service\Http\Dto\SubscriptionIn;
use OCA\Sendent\Service\ConnectedUserService;
use OCA\Sendent\Db\License;
use OCA\Sendent\Service\http\SubscriptionValidationHttpClient;
use OCA\Sendent\Service\LicenseService;

use DateTime;
use Exception;

class LicenseManager
{
    protected $licenseservice;
    protected $connecteduserservice;
    protected $subscriptionvalidationhttpclient;

    public function __construct(LicenseService $licenseservice, 
    ConnectedUserService $connecteduserservice, 
    SubscriptionValidationHttpClient $subscriptionvalidationhttpclient)
    {
        $this->licenseservice = $licenseservice;
        $this->connecteduserservice = $connecteduserservice;
        $this->subscriptionvalidationhttpclient = $subscriptionvalidationhttpclient;
    }

    private function handleException($e)
    {
        if (
            $e instanceof DoesNotExistException ||
            $e instanceof MultipleObjectsReturnedException
        ) {
            throw new notfoundexception($e->getMessage());
        } else {
            throw $e;
        }
    }

    function renewLicense()
    {
        try {
            $licenses = $this->licenseservice->findAll();
            if (isset($licenses) && $licenses !== null && $licenses[0] !== null) {
                $license = $licenses[0];
                $license = $this->subscriptionvalidationhttpclient->validate($license);
                if (isset($license)) {
                    return $this->licenseservice->update(
                        $license->getId(),
                        $license->getLicensekey(),
                        date_create($license->getDategraceperiodend()),
                        date_create($license->getDatelicenseend()),
                        $license->getMaxusers(),
                        $license->getMaxgraceusers(),
                        $license->getEmail(),
                        date_create($license->getDatelastchecked()),
                        $license->getLevel()
                    );
                }
            }
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }

    function createLicense(string $license, string $email)
    {
        try {
            $existingLicense = $this->licenseservice->findByLicenseKey($license);
            if (isset($existingLicense)) {
                return $this->activateLicense($existingLicense);
            }
        } catch (Exception $e) {
            try {
                $licenseData = $this->licenseservice->createNew($license, $email);
                return $this->activateLicense($licenseData);
            } catch (Exception $e) {
                $this->handleException($e);
            }
        }
    }

    function activateLicense(license $license)
    {
        $activatedLicense = $this->subscriptionvalidationhttpclient->activate($license);
        if (isset($activatedLicense)) {
            return $this->licenseservice->update(
                $activatedLicense->getId(),
                $activatedLicense->getLicensekey(),
                date_create($activatedLicense->getDategraceperiodend()),
                date_create($activatedLicense->getDatelicenseend()),
                $activatedLicense->getMaxusers(),
                $activatedLicense->getMaxgraceusers(),
                $activatedLicense->getEmail(),
                date_create("now"),
                $activatedLicense->getLevel()
            );
        }
        return false;
    }

    function isLocalValid()
    {
        return $this->licenseExists() && !$this->isExpired() && ($this->isWithinUserCount() || $this->isWithinGraceUserCount()) && !$this->isLicenseCheckNeeded();
    }
    function isValidLicense()
    {
        return $this->licenseExists() && !$this->isExpired() && ($this->isWithinUserCount() || $this->isWithinGraceUserCount());
    }
    function isExpired()
    {
        $licenses = $this->licenseservice->findAll();
        if (isset($licenses) && $licenses->count > 0) {
            $license = $licenses[0];
            return $license->isExpired();
        }
        return false;
    }

    function licenseExists()
    {
        $licenses = $this->licenseservice->findAll();
        if (isset($licenses) && $licenses->count > 0) {
            return true;
        }
        return false;
    }

    function isWithinUserCount()
    {
        $licenses = $this->licenseservice->findAll();
        if (isset($licenses) && $licenses->count > 0) {
            $license = $licenses[0];
            $userCount = $this->connecteduserservice->getCount();
            $maxUserCount = $license->getMaxusers();
            return $userCount <= $maxUserCount;
        }
        return false;
    }

    function isWithinGraceUserCount()
    {
        $licenses = $this->licenseservice->findAll();
        if (isset($licenses) && $licenses->count > 0) {
            $license = $licenses[0];
            $userCount = $this->connecteduserservice->getCount();
            $maxUserCount = $license->getMaxgraceusers();
            return $userCount <= $maxUserCount;
        }
        return false;
    }
    function getCurrentUserCount()
    {
        return $this->connecteduserservice->getCount();
    }

    function isLicenseCheckNeeded()
    {
        $licenses = $this->licenseservice->findAll();
        if (isset($licenses) && $licenses->count > 0) {
            $license = $licenses[0];
            return $license->isLicenseCheckNeeded();
        }
        return false;
    }
}
