<?php

namespace Controller;

use Model\SchoolYearModel;



class SchoolYearController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table schoolyear en GET
     */
    public function schoolyear_get()
    {
        $model = new SchoolYearModel();
        $tabledata = $model->findAllColumns(['scy_id', 'scy_year']);
        $vars = [
            'title' => 'Année Scolaire',
            'header' => ['Année Scolaire'],
            'primaryKey' => 'scy_id',
            'data' => $tabledata
        ];
        $this->show('crud/country', $vars);
    }

    /**
     * Page de gestion CRUD pour table schoolyear en POST
     */
    public function schoolyear_post()
    {
        //validation & insertion données
        $this->showJson(['Succès / Erreur']);
    }


}

