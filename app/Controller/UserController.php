<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:32
 */

namespace Controller;
use Controller\ControllerTemplate;
use Model\UserModel;
use Model\CityModel;
use Model\NurseryModel;
use Model\ClassModel;

class UserController extends ControllerTemplate
{
    /**
     *  CRUD Child table in GET method
     */
    public function user_get(){
        //model nécessaire pour acces BD
        $model = new UserModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['usr_id','usr_firstname','usr_lastname','usr_email','usr_tel_mobile_1','city_cit_id','nursery_nur_id',/*'class_cls_id'*/]);

        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $cityModel = new CityModel();
        $fkData['city_cit_id'] = $cityModel ->findIndexedColumn('cit_name');
        $nurseryModel = new NurseryModel();
        $fkData['nursery_nur_id'] = $nurseryModel ->findIndexedColumn('nur_name');
        //$classModel = new ClassModel();
        //$fkData['class_cls_id'] = $classModel ->findIndexedColumn('cls_name');


        $vars = [
            //titre de page
            'title' => 'User',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Firstname *', 'Lastname *','Email*','Contact_No *','City','nursery'/*, 'class'*/],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'usr_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData,
        ];
        $this->show('crud/crud',$vars);
    }

}