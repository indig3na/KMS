<?php

namespace Controller;

use Model\CountryModel;

class CountryController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table country en GET
     */
    public function country_get(){
        $model = new CountryModel();
        $tabledata = $model -> findAllColumns(['cou_id','cou_name']);
        $vars = [
            'title' => 'Country',
            'header' => ['Pays *'],
            'primaryKey' => 'cou_id',
            'data' => $tabledata
        ];
        $this->show('crud/crud',$vars);
    }

    /**
     * Page de gestion CRUD pour table country en POST
     */
    public function country_post(){
        $model = new CountryModel;
        $success = false;
        $errors = array();
        if (in_array($method = $_POST['method'],['insert','update'])){
            //validation données
            
            $data = array_intersect_key($_POST, array_flip(['cou_name']));
            if (empty($data['cou_name'])){
                $errors[] = 'Nom du pays doit être renseigné';
            }
            if(empty($errors)){
                //insertion données
                if ($method === 'insert'){
                    if($model ->insert($data) === false) {
                        $errors[] = 'Insertion en base de données échouée';
                    } else {
                        $message = 'Inseré en base de données';
                        $success = true;
                    }
                //modification données
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
        if($model -> delete($id) === false) {
            $errors[] = 'Suppression de la base de données échouée';
        } else {
            $message = 'Supprimé de la base de données';
            $success = true;
        }    
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