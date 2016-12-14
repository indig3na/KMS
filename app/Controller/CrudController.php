<?php

namespace Controller;

use Model\CountryModel;
use Model\ActivityModel;
use Model\SchoolYearModel;
use Model\NurseryModel;


class CrudController extends ControllerTemplate
{

	/**
	 * Page de gestion CRUD pour table country en GET
	 */
	public function country_get(){
            $model = new CountryModel();
            $tabledata = $model -> findAllColumns(['cou_id','cou_name']);
            $vars = [
                'title' => 'Country',
                'header' => ['Pays'],
                'primaryKey' => 'cou_id',
                'data' => $tabledata
            ];
            $this->show('crud/crud',$vars);
	}
        
	/**
	 * Page de gestion CRUD pour table country en POST
	 */
	public function country_post()
	{
            //validation & insertion données
            $this->showJson(['Succès / Erreur']);
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
        $activitymodel = new ActivityModel();
        $tabledata = $activitymodel -> findAllColumns(['act_id','act_name','act_material','act_description']);
        $actVars = [
            'title' => 'Activity',
            'header' => ['Activity','Insertion','Modification','Material','Description'],
            'primaryKey' => 'act_id',
            'data' => $tabledata
        ];
        $this->show('crud/crud', $actVars);
    }





    /**
     * Page de gestion CRUD pour table nursery en GET
     */
    public function nursery_get(){
        $model = new NurseryModel();
        $tabledata = $model -> findAll();
        $vars = [
            'title' => 'Nursery',
            'header' => ['Insertion','Modification', ],
            'primaryKey' => 'nur_id',
            'data' => $tabledata
        ];
        $this->show('crud/country',$vars);
    }

    /**
     * Page de gestion CRUD pour table nursery en POST
     */
    public function nursery_post()
    {
        $this->show('crud/nursery');
    }

}