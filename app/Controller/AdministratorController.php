<?php

namespace Controller;

use Model\AdministratorModel;
use Model\CityModel;

class AdministratorController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table country en GET
     */
    public function administrator_get(){
        //model nécessaire pour acces BD
        $model = new AdministratorModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['adm_id','adm_firstname','adm_lastname','adm_telephone','adm_email','city_cit_id']);
        
        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();
        
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $cityModel = new CityModel();
        $fkData['city_cit_id'] = $cityModel ->findIndexedColumn('cit_name');
        
        $vars = [
            //titre de page
            'title' => 'ADministrator',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Prénom', 'Nom *','Téléphone','E-mail *','Ville'],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'adm_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData      
        ];
        $this->show('crud/crud',$vars);
    }

    /**
     * Page de gestion CRUD pour table country en POST
     */
    public function city_post(){
        //initialiser
        $model = new AdministratorModel;
        $success = false;
        $errors = array();
        if (in_array($method = $_POST['method'],['insert','update'])){
            //récupérer les champs nécessaires de $-POST
            $data = array_intersect_key($_POST, array_flip(['cit_name','country_cou_id']));
            //validation données
            if (empty($data['cit_name'])){
                $errors[] = 'Nom de la ville doit être renseigné';
            }
            if (empty($data['country_cou_id'])){
                $errors[] = 'Pays doit être renseigné';
            }
            //modifier la BD
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
            $errors[] = 'méthode inconnue';
        }
        if ($success){
            $this->showJson(['code' => 1, 'message' => $message]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br/>', $errors)]);
        }
    }

}