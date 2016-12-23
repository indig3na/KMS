<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 22/12/2016
 * Time: 14:50
 */

namespace Controller;
use Controller\ControllerTemplate;
use Model\ContactModel;
use Model\UserFunctionsModel;
use Model\UserModel;


class MessageController extends ControllerTemplate
{
    public function message_get(){

        //model to access db
        $model = new ContactModel();
        //get datas

        $tabledata = $model -> findAllColumns(['ctc_inserted','ctc_id','ctc_name','ctc_email','ctc_subject','ctc_message'],'','','ctc_inserted','DESC');

        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();
        //$flData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs

        $userModel = new UserFunctionsModel();
        $fkData['user_usr_id'] = $userModel ->findIndexedColumns(['usr_firstname','usr_lastname']);


        $vars = [

            //titre de page
            'title' => 'Messages',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Date d\'envoi','Nom ','E-mail','Sujet','Message'],

            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'ctc_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData,
            'noAdd' => true,
            'noEdit' => true,
        ];
        $this->allowTo('ROLE_ADMIN');
        $this->show('crud/crud',$vars);
    }


}