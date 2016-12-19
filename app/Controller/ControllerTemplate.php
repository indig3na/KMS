<?php

namespace Controller;

use \W\Controller\Controller;

/**
 * Notre contrôleur de base modifiable à hériter depuis
 */
class ControllerTemplate extends Controller
{
    /**
     * S'occupe de la base de données
     * 
     * @param $model object Modèle correspondant à la table en DB
     * @param $postfields array Liste des indexes attendus dans $_POST => indexes des colonnes en DB
     * @param $mult array Optionnel: Liste des indexes attendus pour les  tables de correspondances
     * Default: []
     * @param $data Optionnel: array qui contient au lieu de $_POST les données à insérer en DB
     * Default: NULL
     */
    public function db_post($model,$postfields,$mult=[],$rawData = NULL){
        if (!isset($rawData)){
            $rawData = $_POST;
        }
        $data=self::clean($rawData);
        $success = false;
        if (in_array($method = $data['method'],['insert','update'])){
            //récupérer les champs nécessaires de $_POST et les renommer
            $dbKeys = array_intersect_key($postfields,$data);
            $dbValues = array_intersect_key($data,$postfields);
            $dbData = array_combine($dbKeys,$dbValues);
            
            $corrTableDbData = array_intersect_key($data,$mult);
           
            //validation données
            $messages = $this -> validate($dbData, $method);
            //modifier la BD
            if(empty($messages)){
                //insertion données
                if ($method === 'insert'){
                    $prettyMethod='Insertion';
                    $result = $model ->insert($dbData);
                } else if ($method === 'update'){
                    $prettyMethod='Modification';
                    $id = intval($data['id']);
                    $result = $model ->update($dbData,$id);
                }
                if($result === false){
                    $messages[] = $prettyMethod.' générale en BD échouée';
                } else {
                    $messages[] = $prettyMethod.' générale en BD réussie';
                    $success = true;
                    $id = $result[$model->getPrimaryKey()];
                    foreach ($mult as $multKey => $ctd){
                        if ($method === 'update'){
                            $model -> deleteFromCorrTable($ctd,$id);
                        }
                        $corrSuccess = true;
                        foreach ($corrTableDbData[$multKey] as $corrDbData){
                            $insert = [$ctd[1] => $id, $ctd[2] => intval($corrDbData)];
                            if($model->insertIntoCorrTable($insert,$ctd) === false){
                                $corrSuccess = false;
                            }
                        }
                        if ($corrSuccess){
                            $messages[] = $prettyMethod.' de certaines données en BD échouée';
                        } else {
                            $messages[] = $prettyMethod.' en BD tout à fait réussie';
                        }
                    }
                }
            }
        } elseif ($method === 'delete'){
            // suppression données
            $id = intval($data['id']);
            if($model -> delete($id) === false) {
                $messages[] = 'Suppression générale en BD échouée';
            } else {
                $messages[] = 'Suppression générale en BD réussie';
                $success = true;
                foreach ($mult as $ctd){
                    $model -> deleteFromCorrTable($ctd,$id);
                }
            }    
        } else {
            $messages[] = 'méthode inconnue';
        }
        return [$success, $messages];
    }
    
    /*
     * Recursively cleans an array using htmlspecialchars
     * @param $arr array Array to be cleaned
     * @returns array
     */
    public static function clean ($arr){
        return is_array($arr) ? array_map('self::clean',$arr) : htmlspecialchars($arr, ENT_HTML5 | ENT_QUOTES);
    }
}