<?php

namespace Controller;

use Model\ProgramModel;
use Model\ActivityModel;

class ProgramController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table program en GET
     */
    public function program_get(){
        //model nécessaire pour acces BD
        $model = new ProgramModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['prg_id','prg_name']);
        
        //récupérer les données de la table de correspondance
        $activities = $model -> getActivities();
        
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
        $model = new ProgramModel;
        $success = false;
        $errors = array();
        $messages = array();
        if (in_array($method = $_POST['method'],['insert','update'])){
            //récupérer les champs nécessaires de $-POST
            $data = array_intersect_key($_POST, array_flip(['prg_name']));
            $corrTableData = array_intersect_key($_POST, array_flip(['activities']));
            //validation données
            if (empty($data['prg_name'])){
                $errors[] = 'Nom de la ville doit être renseigné';
            }
            //modifier la BD
            if(empty($errors)){
                //insertion données
                if ($method === 'insert'){
                    if(!$result = $model ->insert($data)) {
                        $errors[] = 'Insertion en base de données échouée';
                    } else {
                        $messages[] = 'Inseré en base de données';
                        $success = true;
                        $id = $result[$model->getPrimaryKey()];
                        $insert=array();
                        $table = $model ->getTable();
                        $pk = $model->getPrimaryKey();
                        $model->setPrimaryKey('program_prg_id');
                        $model->setTable('program_has_activity');
                        foreach ($corrTableData['activities'] as $corrData){
                            $insert = ['program_prg_id' => $id, 'activity_act_id' => $corrData];
                            if(!$model->insert($insert)){
                                $errors[] = 'Insertion d\'une activité en base de données échouée';
                            } else {
                                $messages[] = 'Inseré les activités en base de données';
                            }
                        }
                        $model->setTable($table);
                        $model->setPrimaryKey($pk);
                    }
                //modification données
                } else {
                    $id = intval($_POST['id']);
                    if($model ->update($data,$id) === false) {
                        $errors[] = 'Modification de la base de données échouée';
                    } else {
                        $messages[] = 'Modifié dans la base de données';
                        $success = true;
                        $insert=array();
                        $model -> deleteActivities($id);
                        $table = $model ->getTable();
                        $pk = $model->getPrimaryKey();
                        $model->setPrimaryKey('program_prg_id');
                        $model->setTable('program_has_activity');
                        
                        foreach ($corrTableData['activities'] as $corrData){
                            $insert = ['program_prg_id' => $id, 'activity_act_id' => $corrData];
                            if(!$model->insert($insert)){
                                $errors[] = 'Insertion d\'une activité en base de données échouée';
                            } else {
                                $messages[] = 'Inseré les activités en base de données';
                            }
                        }
                        $model->setTable($table);
                        $model->setPrimaryKey($pk);
                        //todo update $corrTableData
                    }
                }
            }
        } elseif ($method === 'delete'){
            // suppression données
            $id = intval($_POST['id']);
            if($model -> delete($id) === false) {
                $errors[] = 'Suppression de la base de données échouée';
            } else {
                $messages[] = 'Supprimé de la base de données';
                $success = true;
                $model -> deleteActivities($id);
            }    
        } else {
            $errors[] = 'méthode inconnue';
        }
        if ($success){
            $this->showJson(['code' => 1, 'message' => implode('
', $messages)]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br/>', $errors)]);
        }
    }

}