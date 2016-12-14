<?php

namespace Controller;

use \Model\ClassroomModel;

class ClassroomController extends ControllerTemplate
{

	/**
	 * Page de gestion CRUD pour table classroom en GET
	 */
	
        public function classroom_get(){
            $model = new ClassroomModel();
            $tabledata = $model -> findAllColumns(['clr_id','clr_name', 'clr_caracteristics', 'clr_description']);
            $vars = [
                'title' => 'Liste des salles',
                'header' => ['Nom', 'Caractéristiques', 'Description'],
                'primaryKey' => 'cou_id',
                'data' => $tabledata
            ];
            $this->show('classroom/classroom_get',$vars);
	} 
}