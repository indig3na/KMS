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
            $tabledata = $model -> findAllColumns(['clr_id','clr_name','clr_name', 'clr_caracteristics', 'clr_description']);
            $vars = [
                'title' => 'Liste des salles',
                'header' => ['Nom *', 'Caractéristiques', 'Description'],
                'primaryKey' => 'clr_id',
                'data' => $tabledata
            ];
            $this->show('classroom/classroom',$vars);
	} 
    public function classroom_post() {
        if (in_array($method = $_POST['method'],['insert','update'])){
            //validation donnÃ©es
            $success = false;
            $errors = array();
            $data = array_intersect_key($_POST, array_flip(['clr_name', 'clr_caracteristics', 'clr_description']));
            if (empty($data['clr_name'])){
                $errors[] = 'Le nom de la salle doit être renseigné';
            }
            if(empty($errors)){
                $model = new ClassroomModel();
                if ($method === 'insert'){
                    //insertion donnÃ©es
                    if($model ->insert($data) === false) {
                        $errors[] = 'Insertion en base de données échouée';
                    } else {
                        $message = 'Inserer en base de données';
                        $success = true;
                    }
                } else {
                    $id = intval($_POST['id']);
                    if($model ->update($data,$id) === false) {
                        $errors[] = 'Modification de la base de données échouée';
                    } else {
                        $message = 'Modifié dans la base de données';
                        $success = true;
                    }
                }
            }
        } elseif ($method === 'delete'){
         // suppression données
            $id = intval($_POST['id']);
            $model = new ClassroomModel();
            if($model -> delete($id) === false) {
                $errors[] = 'Suppression de la base de données échouée';
            } else {
                $message = 'Supprimé de la base de données';
                $success = true;
            }    
            
        } else {
            $errors[] = 'méthode inconnue';
        }
        if ($success){
            $this->showJson(['code' => 1, 'message' => $message]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br/>', $errors)]);
        }

    }
}