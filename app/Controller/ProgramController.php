<?php

namespace Controller;

use Model\ProgramModel;
use Model\ActivityModel;

class ProgramController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table country en GET
     */
    public function program_guiiuet(){
        $model = new ProgramModel();
        debug($model -> getActivities());
        debug($model -> getActivities2());
        
        
    }
    public function program_get(){
        //model nécessaire pour acces BD
        $model = new ProgramModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['prg_id','prg_name']);
        
        //récupérer les données de la table de correspondance
        $activities = $model -> getActivities2();
        
        //inclure les données de la table de correspondance dans la table données
        foreach ($tabledata as &$row){
           $row['activities']= isset ($activities[$row['prg_id']]) ? $activities[$row['prg_id']] : Null;
        }
        unset($row);
        
        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();
        
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $activityModel = new ActivityModel();
        $fkData['activities'] = $activityModel ->findIndexedColumn('act_name');
        $mult =['activities'];
        
        $vars = [
            //titre de page
            'title' => 'Program',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Programme *','Activités'],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'prg_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData,
            'mult' => $mult
        ];
        $this->show('crud/crud',$vars);
    }

    /**
     * Page de gestion CRUD pour table country en POST
     */
    public function program_post(){
        //initialiser
        debug ($_POST);
        die();
        $model = new ProgramModel;
        $success = false;
        $errors = array();
        if (in_array($method = $_POST['method'],['insert','update'])){
            //récupérer les champs nécessaires de $-POST
            $data = array_intersect_key($_POST, array_flip(['prg_name']));
            //validation données
            if (empty($data['prg_name'])){
                $errors[] = 'Nom de la ville doit être renseigné';
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