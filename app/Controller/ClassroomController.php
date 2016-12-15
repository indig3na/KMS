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
            $tabledata = $model -> findAllColumns(['clr_name', 'clr_caracteristics', 'clr_description']);
            $vars = [
                'title' => 'Liste des salles',
                'header' => ['Nom *', 'Caractéristiques', 'Description'],
                'primaryKey' => 'cou_id',
                'data' => $tabledata
            ];
            $this->show('classroom/classroom_get',$vars);
	} 
    public function classroom_post() {
        if (in_array($method = $_POST['method'],['insert','update'])){
            //validation données
            $success = false;
            $errors = array();
            $data = array_intersect_key($_POST, array_flip(['clr_name', 'clr_caracteristics', 'clr_description']));
            if (empty($data['clr_name'])){
                $errors[] = 'Le nom de la salle doit être renseigné';
            }
            if(empty($errors)){
                $model = new ClassroomModel();
                if ($method === 'insert'){
                    //insertion données
                    if($model ->insert($data) === false) {
                        $errors[] = 'Insertion en base de données échouée';
                    } else {
                        $message = 'Inseré en base de données';
                        $success = true;
                    }
                } else {
                    //modification données
                }
            }
        } elseif ($method === 'delete'){
        // suppression données
            
        } else {
            //error
        }
        if ($success){
            $this->showJson(['code' => 1, 'message' => $message]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br/>', $errors)]);
        }
    }
}