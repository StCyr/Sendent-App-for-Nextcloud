<?php
// db/authormapper.php

namespace OCA\sendent\db;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Db\QBMapper;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;

class settingkeymapper extends QBMapper {

    var $db;
    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'sndnt_stngky', settingkey::class);
        $this->db = $db;
    }


    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function find(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngky')
           ->where(
               $qb->expr()->eq('key', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }
     /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function findById(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngky')
           ->where(
               $qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }
    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function findByKey(string $key) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngky')
           ->where(
               $qb->expr()->eq('key', $qb->createNamedParameter($key, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }
    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function findByTemplateId(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngky')
           ->where(
               $qb->expr()->eq('templateid', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntities($qb);
    }

    public function findAll($limit=null, $offset=null) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngky')
           ->setMaxResults($limit)
           ->setFirstResult($offset);

        return $this->findEntities($qb);
    }


    public function settingKeyCount($key) {
        $qb = $this->db->getQueryBuilder();

        $qb->selectAlias($qb->createFunction('COUNT(*)'), 'count')
           ->from('sndnt_stngky')
           ->where(
               $qb->expr()->eq('key', $qb->createNamedParameter($key, IQueryBuilder::PARAM_STR))
           );

        $cursor = $qb->execute();
        $row = $cursor->fetch();
        $cursor->closeCursor();

        return $row['count'];
    }

}