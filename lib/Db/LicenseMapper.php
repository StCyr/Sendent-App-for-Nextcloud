<?php

// db/authormapper.php

namespace OCA\Sendent\Db;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\AppFramework\Db\QBMapper;

class LicenseMapper extends QBMapper {
	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'sndnt_license', License::class);
	}
	/**
	 * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
	 */
	public function find(int $id) {
		$qb = $this->db->getQueryBuilder();

		$qb->select('*')
		   ->from('sndnt_license')
		   ->where(
			   $qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
		   );

		return $this->findEntity($qb);
	}

	public function findByKey(string $key) {
		$qb = $this->db->getQueryBuilder();

		$qb->select('*')
		   ->from('sndnt_license')
		   ->where(
			   $qb->expr()->eq('key', $qb->createNamedParameter($key, IQueryBuilder::PARAM_STR))
		   );

		return $this->findEntity($qb);
	}

	public function findAll($limit = null, $offset = null) {
		$qb = $this->db->getQueryBuilder();

		$qb->select('*')
		   ->from('sndnt_license')
		   ->setMaxResults($limit)
		   ->setFirstResult($offset);

		return $this->findEntities($qb);
	}
}
