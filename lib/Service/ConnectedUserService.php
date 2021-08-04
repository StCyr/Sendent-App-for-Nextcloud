<?php

namespace OCA\Sendent\Service;

use DateTime;
use DateInterval;
use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Sendent\Db\ConnectedUser;
use OCA\Sendent\Db\ConnectedUserMapper;

class ConnectedUserService {
	private $mapper;

	public function __construct(ConnectedUserMapper $mapper) {
		$this->mapper = $mapper;
	}

	public function findAll() {
		return $this->mapper->findAll();
	}

	private function handleException($e) {
		if ($e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException) {
			throw new NotFoundException($e->getMessage());
		} else {
			throw $e;
		}
	}

	public function find(int $id) {
		try {
			return $this->mapper->find($id);

			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}
	public function findByUserId(string $userId) {
		try {
			return $this->mapper->findByUserId($userId);

			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}
	public function getCount() {
		try {
			return $this->mapper->getCount();

			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
			return 0;
		}
	}
	public function create(string $userid, DateTime $dateconnected) {
		$this->cleanup();
		$connecteduser = new ConnectedUser();
		$connecteduser->setUserid($userid);
		$connecteduser->setDateconnected(date_format($dateconnected,"Y-m-d H:i:s"));
		return $this->mapper->insert($connecteduser);
	}

	public function update(int $id,string $userid, DateTime $dateconnected) {
		$this->cleanup();
		try {
			$connecteduser = $this->mapper->find($id);
		} catch (Exception $e) {
			$this->handleException($e);
		}
		$connecteduser->setUserid($userid);
		$connecteduser->setDateconnected(date_format($dateconnected,"Y-m-d H:i:s"));
		return $this->mapper->update($connecteduser);
	}
	
	public function cleanup() {
		try {
			$connectedUsers = $this->mapper->findAll();
			$origin = new DateTime('NOW');
			$origin->sub(new DateInterval('P7D'));
			foreach ($connectedUsers as $connectedUser) {
				$dateconnected = new DateTime($connectedUser->getDateconnected());
				if ($dateconnected < $origin) {
					try {
						$this->destroy($connectedUser->getId());
					} catch (Exception $e) {
						$this->handleException($e);
					}
				}
			}
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function destroy(int $id) {
		try {
			$connecteduser = $this->mapper->find($id);
		} catch (Exception $e) {
			$this->handleException($e);
		}
		$this->mapper->delete($connecteduser);
		return $connecteduser;
	}
}
