<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 13/12/2016
 * Time: 16:32
 */

namespace Model;



class ActivityModel extends ModelTemplate
{
    /*----------------Properties------------------*/
    /**
     * @var int
     */
    private $act_id;
    /**
     * @var string
     */
    private $act_name;
    /**
     * @var string
     */
    private $act_inserted;
    /**
     * @var string
     */
    private $act_updated;
    /**
     * @var string
     */
    private $act_material;


    /*-----------------constructor---------*/

    /**
     * ActivityModel constructor.
     * @param int $act_id
     * @param string $act_name
     * @param string $act_inserted
     * @param string $act_updated
     * @param string $act_material
     */
    public function __construct($act_id=0, $act_name='', $act_inserted=null, $act_updated=null, $act_material='')
    {

        $this->act_id = $act_id;
        $this->act_name = $act_name;
        $this->act_inserted = $act_inserted;
        $this->act_updated = $act_updated;
        $this->act_material = $act_material;
        parent::__construct();
    }



    /*---------------------Setter--------------*/

    /**
     * @param int $act_id
     */
    public function setActId($act_id)
    {
        $this->act_id = $act_id;
    }

    /**
     * @param string $act_name
     */
    public function setActName($act_name)
    {
        $this->act_name = $act_name;
    }

    /**
     * @param string $act_inserted
     */
    public function setActInserted($act_inserted)
    {
        $this->act_inserted = $act_inserted;
    }

    /**
     * @param string $act_updated
     */
    public function setActUpdated($act_updated)
    {
        $this->act_updated = $act_updated;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @param int $primaryKey
     */
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }

    /**
     * @param \PDO $dbh
     */
    public function setDbh($dbh)
    {
        $this->dbh = $dbh;
    }

    /*--------------------Getter--------------*/


    /**
     * @param string $act_material
     */
    public function setActMaterial($act_material)
    {
        $this->act_material = $act_material;
    }

    /**
     * @return int
     */
    public function getActId()
    {
        return $this->act_id;
    }

    /**
     * @return string
     */
    public function getActName()
    {
        return $this->act_name;
    }

    /**
     * @return string
     */
    public function getActInserted()
    {
        return $this->act_inserted;
    }

    /**
     * @return string
     */
    public function getActUpdated()
    {
        return $this->act_updated;
    }

    /**
     * @return string
     */
    public function getActMaterial()
    {
        return $this->act_material;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @return \PDO
     */
    public function getDbh()
    {
        return $this->dbh;
    }




}