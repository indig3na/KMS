<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 14/12/2016
 * Time: 10:53
 */

namespace Model;
/**
 * Modèle pour la table Nursery
 * one foreign key
 */
class NurseryModel extends ModelTemplate
{
    /**
     * @var int
     */
    protected $nur_id;
    /**
     * @var string
     */
    protected $nur_name;
    /**
     * @var string
     */
    protected $nur_inserted;
    /**
     * @var string
     */
    protected $nur_updated;
    /**
     * @var string
     */
    protected $nur_address;
    /**
     * @var string
     */
    protected $nur_email;
    /**
     * @var string
     */
    protected $nur_telephone;
    /**
     * @var string
     */
    protected $nur_website;

    public function __construct($nur_id=0,$nur_name=null,$nur_inserted=NULL,$nur_updated=NULL, $nur_address=NULL,$nur_email=NULL,$nur_telephone=NULL,$nur_website=NULL) {
        parent::__construct();
        $this->setPrimaryKey('nur_id');
        $this ->nur_id = $nur_id;
        $this ->nur_name = $nur_name;
        $this ->nur_inserted = $nur_inserted;
        $this ->nur_updated = $nur_updated;
        $this ->nur_address = $nur_address;
        $this ->nur_email = $nur_email;
        $this ->nur_telephone = $nur_telephone;
        $this ->nur_website = $nur_website;
    }


    //-----------------GETTERS & SETTERS--------------


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

    /**
     * @return int
     */
    public function getNurId()
    {
        return $this->nur_id;
    }

    /**
     * @param int $nur_id
     */
    public function setNurId($nur_id)
    {
        $this->nur_id = $nur_id;
    }

    /**
     * @return string
     */
    public function getNurName()
    {
        return $this->nur_name;
    }

    /**
     * @param string $nur_name
     */
    public function setNurName($nur_name)
    {
        $this->nur_name = $nur_name;
    }

    /**
     * @return string
     */
    public function getNurInserted()
    {
        return $this->nur_inserted;
    }

    /**
     * @param string $nur_inserted
     */
    public function setNurInserted($nur_inserted)
    {
        $this->nur_inserted = $nur_inserted;
    }

    /**
     * @return string
     */
    public function getNurUpdated()
    {
        return $this->nur_updated;
    }

    /**
     * @param string $nur_updated
     */
    public function setNurUpdated($nur_updated)
    {
        $this->nur_updated = $nur_updated;
    }

    /**
     * @return string
     */
    public function getNurAddress()
    {
        return $this->nur_address;
    }

    /**
     * @param string $nur_address
     */
    public function setNurAddress($nur_address)
    {
        $this->nur_address = $nur_address;
    }

    /**
     * @return string
     */
    public function getNurEmail()
    {
        return $this->nur_email;
    }

    /**
     * @param string $nur_email
     */
    public function setNurEmail($nur_email)
    {
        $this->nur_email = $nur_email;
    }

    /**
     * @return string
     */
    public function getNurTelephone()
    {
        return $this->nur_telephone;
    }

    /**
     * @param string $nur_telephone
     */
    public function setNurTelephone($nur_telephone)
    {
        $this->nur_telephone = $nur_telephone;
    }

    /**
     * @return string
     */
    public function getNurWebsite()
    {
        return $this->nur_website;
    }

    /**
     * @param string $nur_website
     */
    public function setNurWebsite($nur_website)
    {
        $this->nur_website = $nur_website;
    }



}
