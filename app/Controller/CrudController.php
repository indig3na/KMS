<?php

namespace Controller;

use Model\CountryModel;
use Model\ActivityModel;



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



}