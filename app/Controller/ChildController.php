<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:14
 */

namespace Controller;
use Controller\ControllerTemplate;
use Model\ChildModel;
use Model\UserModel;
use Model\ClassModel;

class ChildController extends ControllerTemplate
{
    /**
     *  CRUD Child table in GET method
     */
    public function child_get(){
        //model nécessaire pour acces BD
        $model = new ChildModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['chd_id','chd_firstname','chd_lastname','chd_birthday','chd_gender','chd_hobbies','chd_comments'/*,'chd_img_path','class_cls_id'*/,'user_usr_id']);

        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        //$classModel = new ClassModel();
        //$fkData['class_cls_id'] = $classModel ->findIndexedColumn('cls_name');

        $userModel = new UserModel();
        $fkData['user_usr_id'] = $userModel ->findIndexedColumn('usr_firstname','usr_lastname');

        $vars = [
            //titre de page
            'title' => 'Child',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Firstname *', 'Lastname *','birthday *','gender *','hobbies','comments','Parent'],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'chd_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData,
        ];
        $this->show('crud/crud',$vars);
    }

}