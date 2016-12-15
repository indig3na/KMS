<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 13:29
 */

namespace Model;
/**
 * Modèle pour la table Class
 * two foreign keys
 */
class ClassModel extends ModelTemplate {
    /**
     * @var int
     */
    protected $cls_id;
    /**
     * @var string
     */
    protected $cls_name;
    /**
     * @var string
     */
    protected $cls_inserted;
    /**
     * @var string
     */
    protected $cls_updated;

    public function __construct($cls_id = 0, $cls_name = null, $cls_inserted = NULL, $cls_updated = NULL)
    {
        parent::__construct();
        $this->setPrimaryKey('cls_id');
        $this->cls_id = $cls_id;
        $this->cls_name = $cls_name;
        $this->cls_inserted = $cls_inserted;
        $this->cls_updated = $cls_updated;
    }

    //-----------------GETTERS & SETTERS--------------


    /**
     * @return int
     */
    public function getClsId()
    {
        return $this->cls_id;
    }

    /**
     * @param int $cls_id
     */
    public function setClsId($cls_id)
    {
        $this->cls_id = $cls_id;
    }

    /**
     * @return string
     */
    public function getClsName()
    {
        return $this->cls_name;
    }

    /**
     * @param string $cls_name
     */
    public function setClsName($cls_name)
    {
        $this->cls_name = $cls_name;
    }

    /**
     * @return string
     */
    public function getClsInserted()
    {
        return $this->cls_inserted;
    }

    /**
     * @param string $cls_inserted
     */
    public function setClsInserted($cls_inserted)
    {
        $this->cls_inserted = $cls_inserted;
    }

    /**
     * @return string
     */
    public function getClsUpdated()
    {
        return $this->cls_updated;
    }

    /**
     * @param string $cls_updated
     */
    public function setClsUpdated($cls_updated)
    {
        $this->cls_updated = $cls_updated;
    }

    /**
     * @return \PDO
     */
    public function getDbh()
    {
        return $this->dbh;
    }

    /**
     * @param \PDO $dbh
     */
    public function setDbh($dbh)
    {
        $this->dbh = $dbh;
    }
}