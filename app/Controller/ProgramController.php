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
        $pk = $model ->getPrimaryKey();
        //récupérer données
        $tabledata = $model -> findAllColumns(['prg_id','prg_name']);
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $fkData = array();
        //-vide-
        
        //tables de correspondance
        //Indiquer les name du select correspondant suivi des données de la table de correspondance
        $mult = ['activities' => ['program_has_activity','program_prg_id','activity_act_id']];
        $multColumn = 'act_name';
        //récupérer les données de la table de correspondance
        
        $multdata = array();
        foreach ($mult as $multKey => $ctd){
            $multdata[$multKey] = $model -> getCorrTableData($ctd);
            //inclure les données de la table de correspondance dans la table données
            foreach ($tabledata as &$row){
               $row[$multKey]= isset ($multdata[$multKey][$row[$pk]]) ? $multdata[$multKey][$row[$pk]] : Null;
            }
            unset($row);
            $activityModel = new ActivityModel(); //automatically call right model???
            $fkData[$multKey] = $activityModel ->findIndexedColumn($multColumn);
        }
        
        
         
        $vars = [
            //titre de page
            'title' => 'Programme',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Programme *','Activités'],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'prg_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData,
            'mult' => array_keys($mult),
        ];
        
        if ($this->getUser()['usr_role'] == 'ROLE_EDU'){
            $vars['noAction'] = true;
        }
        $this->show('crud/crud',$vars);
    }

    /**
     * Page de gestion CRUD pour table country en POST
     */
    public function program_post(){
        $postfields = ['prg_name' => 'prg_name'];
        list($success,$messages) = self::program_post_db($postfields,'activities');
        $code = $success ? 1 : 0;
        $this->showJson(['code' => $code, 'message' => implode('
', $messages)]);
    }
    /**
     * fonction CRUD program
     */
    public static function program_post_db($postfields,$multIndex=NULL){
        //initialiser
        $model = new ProgramModel;
        $controller = new ProgramController();
        $postfieldsMult = isset ($multIndex) ? [$multIndex => ['program_has_activity','program_prg_id','activity_act_id']] : [];
        return $controller->db_post($model,$postfields,$postfieldsMult);
    }
    /**
     * fonction de validation de données pour programm
     */
    public function validate($data, $method){
        $messages = array();
        if ($method === 'insert' || ($method === 'update' && isset($data['prg_name']))){
            if (empty($data['prg_name'])){
                $messages[] = 'Nom du programme doit être renseigné';
            }
        }
        return $messages;
    }
}