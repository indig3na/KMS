<?php

namespace Model;

/**
 * Modèle pour la table country
 * pas de foreign key
 */
class CityModel extends ModelTemplate
{
	/**
	 * @var int
	 */
	protected $cit_id;
	/**
	 * @var string
	 */
	protected $cit_name;
	/**
	 * @var CountryModel
	 */
	protected $country;
	/**
	 * @var string
	 */
	protected $cit_inserted;
	/**
	 * @var string
	 */
	protected $cit_updated;

	public function __construct($cit_id=0, $cit_name='', $country=NULL, $cit_inserted=NULL, $cit_updated=NULL) {
		parent::__construct();
        $this -> primaryKey = 'cit_id';
		$this -> cit_id = $cit_id;
		$this -> cit_name = $cit_name;
        $this -> country = $country;
        $this -> cit_inserted = $cit_inserted;
		$this -> cit_updated = $cit_updated;
	}
        
        
        //-----------------GETTERS & SETTERS--------------
        
	public function getCitId() {
		return $this->cit_id;
	}
	public function setCitId($cit_id) {
		$this->cit_id = $cit_id;
	}
	public function getCitName() {
		return $this->cit_name;
	}
	public function setCitName($cit_name) {
		$this->cit_name = $cit_name;
	}
	public function getCountry() {
		return $this->country;
	}
	public function setCountry($country) {
		$this->country = $country;
	}
	public function getCitInserted() {
		return $this->cit_inserted;
	}
	public function setCitInserted($cit_inserted) {
		$this->cit_inserted = $cit_inserted;
	}
	public function getCitUpdated() {
		return $this->cit_updated;
	}
	public function setCitUpdated($cit_updated) {
		$this->cit_updated = $cit_updated;
	}
	
}