<?php
// db/authormapper.php

namespace OCA\Sendent\Db;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\AppFramework\Db\QBMapper;

class ConnectedUserMapper extends QBMapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'sndnt_connuser', connecteduser::class);
    }
    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function find(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_connuser')
           ->where(
               $qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }
    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function findByUserId(string $userId) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_connuser')
           ->where(
               $qb->expr()->eq('userid', $qb->createNamedParameter($userId, IQueryBuilder::PARAM_STR))
           );

        return $this->findEntity($qb);
    }
    public function findAll($limit=null, $offset=null) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_connuser')
           ->setMaxResults($limit)
           ->setFirstResult($offset);

        return $this->findEntities($qb);
    }

    public function getCount() {
        $qb = $this->db->getQueryBuilder();

        $qb->selectAlias($qb->createFunction('COUNT(*)'), 'count')
           ->from('sndnt_connuser');

        $cursor = $qb->execute();
        $row = $cursor->fetch();
        $cursor->closeCursor();

        return $row['count'];
    }
}