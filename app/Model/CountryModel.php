<?php

namespace Model;

/**
 * Modèle pour la table country
 * pas de foreign key
 */
class CountryModel extends ModelTemplate
{
	/**
	 * @var int
	 */
	protected $cou_id;
	/**
	 * @var string
	 */
	protected $cou_name;
	/**
	 * @var string
	 */
	protected $cou_inserted;
	/**
	 * @var string
	 */
	protected $cou_updated;

	public function __construct($cou_id=0,$cou_name='',$cou_inserted=NULL,$cou_updated=NULL) {
		parent::__construct();
		$this -> cou_id = $this -> setCouId($cou_id);
		$this -> cou_name = $this -> setCouName($cou_name);
		$this -> cou_inserted = $this -> setCouInserted($cou_inserted);
		$this -> cou_updated = $this -> setCouUpdated($cou_updated);
	}
        
        
        //-----------------GETTERS & SETTERS--------------
        
	public function getCouId() {
		return $this->cou_id;
	}
	public function setCouId($cou_id) {
		$this->cou_id = $cou_id;
		return $this;
	}
	public function getCouName() {
		return $this->cou_name;
	}
	public function setCouName($cou_name) {
		$this->cou_name = $cou_name;
		return $this;
	}
	public function getCouInserted() {
		return $this->cou_inserted;
	}
	public function setCouInserted($cou_inserted) {
		$this->cou_inserted = $cou_inserted;
		return $this;
	}
	public function getCouUpdated() {
		return $this->cou_updated;
	}
	public function setCouUpdated($cou_updated) {
		$this->cou_updated = $cou_updated;
		return $this;
	}
	
}