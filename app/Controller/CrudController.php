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
        $activitymodel = new ActivityModel();
        $tabledata = $activitymodel -> findAll();
        $actVars = [
            'title' => 'Activity',
            'header' => ['Activity','Insertion','Modification','Material'],
            'primaryKey' => 'act_id',
            'data' => $tabledata
        ];
        $this->show('crud/activity', $actVars);
    }

    /**
     * CRUD Activity table in POST method
     */
    public function activity_post()
    {
        $activity = isset($_POST['activity']) ? trim(strip_tags($_POST['activity'])) : '';
        $material = isset($_POST['material']) ? trim($_POST['material']) : '';

        // activity input validation
        $activityOk = true;
        if (empty($activity))
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
                'act_name' => $activity,
                'act_material' => $material
            ));
            // Si l'insertion a fonctionné
            if ($activityData === false)
            {
                $errorList[] = 'Insert Error<br>';
            }
        }
        $this->show('crud/activity', array(
            'errorList' => $errorList,
            'act_name' => $activity,
            'act_material' => $material
            )
        );
    }



}