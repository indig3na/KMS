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
     * @param $model object Modèle
     * @param $postfields array Liste des indexes attendus dans $_POST
     * @param $mult array Optionnel: Liste des indexes attendus pour les  tables de correspondances
     * 
     */
    public function db_post($model,$postfields,$mult=[]){
        $success = false;
        if (in_array($method = $_POST['method'],['insert','update'])){
            //récupérer les champs nécessaires de $-POST
            $data = array_intersect_key($_POST, array_flip($postfields));
            $corrTableData = array_intersect_key($_POST, array_flip(array_keys($mult)));
            //validation données
            $messages = $this -> validate($data);
            //modifier la BD
            if(empty($messages)){
                //insertion données
                if ($method === 'insert'){
                    $prettyMethod='Insertion';
                    $result = $model ->insert($data);
                } else if ($method === 'update'){
                    $prettyMethod='Modification';
                    $id = intval($_POST['id']);
                    $result = $model ->update($data,$id);
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
                        foreach ($corrTableData[$multKey] as $corrData){
                            $insert = [$ctd[1] => $id, $ctd[2] => $corrData];
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
            $id = intval($_POST['id']);
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
        if ($success){
            $controller->showJson(['code' => 1, 'message' => implode('
', $messages)]);
        } else {
            $controller->showJson(['code' => 0, 'message' => implode('<br/>', $messages)]);
        }
    }
}