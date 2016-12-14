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

    /**
     * CRUD Activity table in POST method
     */
    public function activity_post()
    {
        $name = isset($_POST['act_name']) ? trim(strip_tags($_POST['act_name'])) : '';
        $material = isset($_POST['act_material']) ? trim($_POST['act_material']) : '';
        $description = isset($_POST['act_description']) ? trim($_POST['act_description']) : '';

        // activity input validation
        $errorList = array();
        $activityOk = true;
        if (empty($name))
        {
            echo 'Activity required<br>';
            $activityOk = false;
        }
        // if input ok
        if ($activityOk)
        {

            $activityModel = new ActivityModel();
            //Insert data
            $activityData = $activityModel->insert(array(
                'act_name' => $name,
                'act_material' => $material,
                'act_description' => $description
            ));
            // if not inserted error
            if ($activityData === false)
            {
                $errorList[] = 'Insert Error<br>';
            }
        }
        $this->show('crud/activity', array(
            'errorList' => $errorList,
            'act_name' => $activity,
            'act_material' => $material,
            'act_description' => $description
            )
        );
    }
    public function deletItems()
    {


    }

}