<?php

namespace Model;

/**
 * Modèle pour la table School Year
 * pas de foreign key
 */
class SchoolYearModel extends ModelTemplate
{
    /**
     * @var int
     */
    protected $scy_id;
    /**
     * @var int
     */
    protected $scy_year;
    /**
     * @var string
     */
    protected $scy_inserted;
    /**
     * @var string
     */
    protected $scy_updated;

    public function __construct($scy_id=0,$scy_year=0,$scy_inserted=NULL,$scy_updated=NULL) {
        parent::__construct();
        $this -> scy_id = $this -> setScyId($scy_id);
        $this -> scy_year = $this -> setScyYear($scy_year);
        $this -> scy_inserted = $this -> setScyInserted($scy_inserted);
        $this -> scy_updated = $this -> setScyUpdated($scy_updated);
    }


    //-----------------GETTERS & SETTERS--------------

    public function getScyId() {
        return $this->scy_id;
    }
    public function setScyId($scy_id) {
        $this->scy_id = $scy_id;
        return $this;
    }
    public function getScyYear() {
        return $this->scy_year;
    }
    public function setScyYear($scy_year) {
        $this->scy_year = $scy_year;
        return $this;
    }
    public function getScyInserted() {
        return $this->scy_inserted;
    }
    public function setScyInserted($scy_inserted) {
        $this->scy_inserted = $scy_inserted;
        return $this;
    }
    public function getScyUpdated() {
        return $this->scy_updated;
    }
    public function setScyUpdated($scy_updated) {
        $this->scy_updated = $scy_updated;
        return $this;
    }

}
