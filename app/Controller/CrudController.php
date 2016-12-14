<?php

namespace Controller;

use Model\CountryModel;

class CrudController extends ControllerTemplate
{

	/**
	 * Page de gestion CRUD pour table country en GET
	 */
	public function country_get(){
            $model = new CountryModel();
            $tabledata = $model -> findAllColumns(['cou_name']);
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
            $this->show('crud/schoolyear');
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