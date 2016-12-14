<?php

namespace Controller;

use Model\CountryModel;
use Model\SchoolYearModel;

class CrudController extends ControllerTemplate
{

	/**
	 * Page de gestion CRUD pour table country en GET
	 */
	public function country_get(){
            $model = new CountryModel();
            $tabledata = $model -> findAll();
            $vars = [
                'title' => 'Country',
                'header' => ['Pays','Insertion','Modification'],
                'primaryKey' => 'cou_id',
                'data' => $tabledata
            ];
            $this->show('crud/country',$vars);
	}
        
	/**
	 * Page de gestion CRUD pour table country en POST
	 */
	public function country_post()
	{
            $this->show('crud/country');
	}

	/**
	 * Page de gestion CRUD pour table schoolyear en GET
	 */
	public function schoolyear_get(){
        $model = new SchoolYearModel();
        $tabledata = $model -> findAll();
        $vars = [
            'title' => 'Année Scolaire',
            'header' => ['Année Scolaire','Insertion','Modification'],
            'primaryKey' => 'scy_id',
            'data' => $tabledata
        ];
        $this->show('crud/schoolyear',$vars);
    }
        
	/**
	 * Page de gestion CRUD pour table schoolyear en POST
	 */
	public function schoolyear_post()
	{
            $this->show('crud/schoolyear');
	}

    /**
     * CRUD Activity table in GET method
     */
	public function activity_get()
    {
        $activitymodel = new CountryModel();
        $tabledata = $activitymodel -> findAll();
        $vars = [
            'title' => 'Activity',
            'header' => ['Activity','Material','Insertion','Modification'],
            'primaryKey' => 'cou_id',
            'data' => $tabledata
        ];
        $this->show('crud/activity', $vars);
    }

    /**
     * CRUD Activity table in POST method
     */
    public function activity_post()
    {
        $this->show('crud/activity');
    }

}