<?php
// db/authormapper.php

namespace OCA\sendent\db;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\AppFramework\Db\QBMapper;

class settinggroupvaluemapper extends QBMapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'sndnt_stnggrval', settinggroupvalue::class);
    }


    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function find(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stnggrval')
           ->where(
               $qb->expr()->eq('settingkeyid', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }

    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function findBySettingKeyId(int $settingkeyid) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stnggrval')
           ->where(
               $qb->expr()->eq('settingkeyid', $qb->createNamedParameter($settingkeyid, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }

    public function findAll($limit=null, $offset=null) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stnggrval')
           ->setMaxResults($limit)
           ->setFirstResult($offset);

        return $this->findEntities($qb);
    }


    public function settingKeyCount($groupid) {
        $qb = $this->db->getQueryBuilder();

        $qb->selectAlias($qb->createFunction('COUNT(*)'), 'count')
           ->from('sndnt_stnggrval')
           ->where(
               $qb->expr()->eq('groupid', $qb->createNamedParameter($groupid, IQueryBuilder::PARAM_STR))
           );

        $cursor = $qb->execute();
        $row = $cursor->fetch();
        $cursor->closeCursor();

        return $row['count'];
    }

}