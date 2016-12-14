<?php

namespace Controller;

use Model\CountryModel;
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
    public function schoolyear_get()
    {
        $model = new SchoolYearModel();
        $tabledata = $model -> findAllColumns(['scy_id','scy_year']);
        $vars = [
            'title' => 'Année Scolaire',
            'header' => ['Année Scolaire'],
            'primaryKey' => 'scy_id',
            'data' => $tabledata
        ];
        $this->show('crud/country', $vars);
    }

    /**
     * Page de gestion CRUD pour table schoolyear en POST
     */
    public function schoolyear_post()
    {
        //validation & insertion données
        $this->showJson(['Succès / Erreur']);
    }

    /**
     * CRUD Activity table in GET method
     */
    public function activity_get()
    {
        $activitymodel = new CountryModel();
        $tabledata = $activitymodel->findAll();
        $vars = [
            'title' => 'Activity',
            'header' => ['Activity', 'Material', 'Insertion', 'Modification'],
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

    /**
     * Page de gestion CRUD pour table nursery en GET
     */
    public function nursery_get()
    {
        $model = new NurseryModel();
        $tabledata = $model -> findAllColumns(['nur_id','nur_name','nur_address','nur_email','nur_telephone','nur_website']);
        $vars = [
            'title' => 'Nursery',
            'header' => ['Nursery','Address', 'Email', 'Telephone', 'Website'],
            'primaryKey' => 'nur_id',
            'data' => $tabledata
        ];
        $this->show('crud/country', $vars);
    }

    /**
     * Page de gestion CRUD pour table nursery en POST
     */
    public function nursery_post()
    {
        $this->show('crud/country');
    }

}