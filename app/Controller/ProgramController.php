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
        
        //tables de correspondance
        //Indiquer les name du select correspondant suivi des données de la table de correspondance
        $mult = ['activities' => ['program_has_activity','program_prg_id','activity_act_id']];
        
        //récupérer les données de la table de correspondance
        $multdata = array();
        foreach ($mult as $multKey => $ctd){
            $multdata[$multKey] = $model -> getCorrTableData($ctd);
            //inclure les données de la table de correspondance dans la table données
            foreach ($tabledata as &$row){
               $row[$multKey]= isset ($multdata[$multKey][$row[$pk]]) ? $multdata[$multKey][$row[$pk]] : Null;
            }
            unset($row);
        }
        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();
        
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $activityModel = new ActivityModel(); //automatically call right model???
        $fkData['activities'] = $activityModel ->findIndexedColumn('act_name');
        //spécifier les indexes des données des tables de correspondance
        
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
            'mult' => array_keys($mult)
        ];
        $this->show('crud/crud',$vars);
    }

    /**
     * Page de gestion CRUD pour table country en POST
     */
    public function program_post(){
        //initialiser
        $model = new ProgramModel;
        $postfieldsMult = ['activities' => ['program_has_activity','program_prg_id','activity_act_id']];
        $postfields = ['prg_name'];
        
        $result = $model ->db_post($postfields,$postfieldsMult);
        
        $success = $result[0];
        $messages = $result[1];
        if ($success){
            $this->showJson(['code' => 1, 'message' => implode('
', $messages)]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br/>', $messages)]);
        }
    }

}