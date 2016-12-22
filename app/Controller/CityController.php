<?php

namespace Controller;

use Model\CityModel;
use Model\CountryModel;

class CityController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table country en GET
     */
    public function city_get()
    {
        //model nécessaire pour acces BD
        $model = new CityModel();
        //récupérer données
        $tabledata = $model->findAllColumns(['cit_id', 'cit_name', 'country_cou_id']);

        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $countryModel = new CountryModel();
        $fkData['country_cou_id'] = $countryModel->findIndexedColumn('cou_name');

        $vars = [
            //titre de page
            'title' => 'City',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Ville *', 'Pays *'],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'cit_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData
        ];
        $this->allowTo('ROLE_ADMIN');
        $this->show('crud/crud', $vars);
    }

    /**
     * Page de gestion CRUD pour table country en POST
     */
    public function city_post(){
        $postfields = ['cit_name' => 'cit_name','country_cou_id' => 'country_cou_id'];
        list($success,$messages) = self::city_post_db($postfields);
        $code = $success ? 1 : 0;
        $this->showJson(['code' => $code, 'message' => implode('
', $messages)]);
    }
    /**
     * fonction CRUD program
     */
    public static function city_post_db($postfields,$data = NULL){
        //initialiser
        $model = new CityModel;
        $controller = new CityController();
        
        return $controller->db_post($model,$postfields,[],$data);
    }
    /**
     * fonction dfe validation de données pour programm
     */
    public function validate($data, $method){
        $messages = array();
        if ($method === 'insert' || ($method === 'update' && isset($data['cit_name']))){
            if (empty($data['cit_name'])){
                $messages[] = 'Nom de la ville doit être renseigné';
            }
        }
        if ($method === 'insert' || ($method === 'update' && isset($data['country_cou_id']))){
            if (empty($data['country_cou_id'])){
                $messages[] = 'Nom du pays doit être renseigné';
            }
        }
        return $messages;
    }
}