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
        if (in_array($method = $_POST['method'],['insert','update'])){
            //validation données
            $success = false;
            $errors = array();
            $data = array_intersect_key($_POST, array_flip(['cou_name']));
            if (empty($data['cou_name'])){
                $errors[] = 'Nom du pays doit être renseigné';
            }
            if(empty($errors)){
                $model = new CountryModel;
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
            $this->showJson([1, $message]);
        } else {
            $this->showJson([0, $errors]);
        }
    }

}