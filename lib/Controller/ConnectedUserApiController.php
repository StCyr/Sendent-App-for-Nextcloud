<?php

namespace OCA\Sendent\Controller;

use DateTime;
use Exception;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\Sendent\Db\ConnectedUser;
use OCA\Sendent\Service\ConnectedUserService;
use OCA\Sendent\Service\NotFoundException;

class ConnectedUserApiController extends ApiController
{

       private $service;

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
        * @NoCSRFRequired
        */
        public function ping()
        {
               try {
                      $user = $this->service->create($this->userId, date_create("now"));
               } catch (Exception $e) {
                      $user = $this->service->findByUserId($this->userId);
                      $this->service->update($user->getId(), $this->userId, date_create("now"));
               }
               return new DataResponse($user);
        }
}
