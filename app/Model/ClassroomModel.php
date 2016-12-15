<?php

namespace Model;

/**
 * Modèle pour la table country
 * pas de foreign key
 */
class ClassroomModel extends ModelTemplate
{
	/**
	 * @var int
	 */
	protected $clr_id;
	/**
	 * @var string
	 */
	protected $clr_name;
        /**
	 * @var string
	 */
	protected $clr_caracteristics;
        /**
	 * @var string
	 */
	protected $clr_description;
	/**
	 * @var date
	 */
	protected $clr_inserted;
	/**
	 * @var date
	 */
	protected $clr_updated;

	public function __construct($clr_id=0,$clr_name='',$clr_caracteristics='',$clr_description='', $clr_inserted=NULL,$clr_inserted=NULL) {
		parent::__construct();
        $this->setPrimaryKey('clr_id');
		$this -> clr_id = $clr_id;
		$this -> clr_name = $clr_name;
                $this -> clr_caracteristics = $clr_caracteristics;
                $this -> clr_description = $clr_description;
		$this -> clr_inserted = $clr_inserted;
		$this -> clr_updated = $clr_inserted;
	}
     
        
        //-----------------GETTERS & SETTERS--------------
        
	public function getClrId() {
                return $this->clr_id;
            }
	public function setClrId($clr_id) {
                $this->clr_id = $clr_id;
            }
	public function getClrName() {
                return $this->clr_name;
            }
	public function setClrName($clr_name) {
		$this->clr_name = $clr_name;
            }
        	public function getClrCaracteristics() {
                return $this->clr_caracteristics;
            }
	public function setClrCaracteristics($clr_caracteristics) {
		$this->clr_caracteristics = $clr_caracteristics;
            }
        	public function getClrDescription() {
                return $this->clr_description;
            }
	public function setClrDescription($clr_description) {
		$this->clr_description = $clr_description;
            }
	public function getClrInserted() {
		return $this->clr_inserted;
            }
	public function setClrInserted($clr_inserted) {
		$this->clr_inserted = $clr_inserted;
            }
	public function getClrUpdated() {
		return $this->clr_updated;
            }
	public function setClrUpdated($clr_updated) {
		$this->clr_updated = $clr_updated;
            }
	
}