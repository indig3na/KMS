<?php

namespace Model;

/**
 * Modèle pour la table country
 * pas de foreign key
 */
class ProgramModel extends ModelTemplate
{
	/**
	 * @var int
	 */
	protected $prg_id;
	/**
	 * @var string
	 */
	protected $prg_name;
	/**
	 * @var string
	 */
	protected $prg_inserted;
	/**
	 * @var string
	 */
	protected $prg_updated;

	
        public function __construct($prg_id=0, $prg_name='', $prg_inserted='', $prg_updated='') {
            parent::__construct();
            $this ->setPrimaryKey('prg_id');
            $this->prg_id = $prg_id;
            $this->prg_name = $prg_name;
            $this->prg_inserted = $prg_inserted;
            $this->prg_updated = $prg_updated;
        }
        
        //-----------------GETTERS & SETTERS--------------
        
	public function getPrg_id() {
            return $this->prg_id;
        }

        public function getPrg_name() {
            return $this->prg_name;
        }

        public function getPrg_inserted() {
            return $this->prg_inserted;
        }

        public function getPrg_updated() {
            return $this->prg_updated;
        }

        public function setPrg_id($prg_id) {
            $this->prg_id = $prg_id;
        }

        public function setPrg_name($prg_name) {
            $this->prg_name = $prg_name;
        }

        public function setPrg_inserted($prg_inserted) {
            $this->prg_inserted = $prg_inserted;
        }

        public function setPrg_updated($prg_updated) {
            $this->prg_updated = $prg_updated;
        }


	
}