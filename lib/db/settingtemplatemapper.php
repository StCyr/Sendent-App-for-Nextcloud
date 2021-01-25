<?php
// db/authormapper.php

namespace OCA\sendent\db;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\AppFramework\Db\QBMapper;

class settingtemplatemapper extends QBMapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'sndnt_stngtmplt');
    }


    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function find(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngtmplt')
           ->where(
               $qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }


    public function findAll($limit=null, $offset=null) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from('sndnt_stngtmplt')
           ->setMaxResults($limit)
           ->setFirstResult($offset);

        return $this->findEntities($qb);
    }


    public function settingKeyCount($name) {
        $qb = $this->db->getQueryBuilder();

        $qb->selectAlias($qb->createFunction('COUNT(*)'), 'count')
           ->from('sndnt_stngtmplt')
           ->where(
               $qb->expr()->eq('templatename', $qb->createNamedParameter($name, IQueryBuilder::PARAM_STR))
           );

        $cursor = $qb->execute();
        $row = $cursor->fetch();
        $cursor->closeCursor();

        return $row['count'];
    }

}