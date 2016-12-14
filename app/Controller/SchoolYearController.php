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
        $this->show('crud/crud', $vars);
    }

    /**
     * Page de gestion CRUD pour table schoolyear en POST
     */
    public function schoolyear_post()
    {
        $year = isset($_POST['scy_year']) ? trim(strip_tags($_POST['scy_year'])) : '';

        //validation & insertion données
        $errorList = array();
        $yearOk = true;

        if (empty($year)) {
            echo 'champ year est vide<br>';
            $yearOk = false;
        }
        if ($yearOk) {
            $schoolYearModel = new schoolYearModel();
            //Insert data
            $tableData = $schoolYearModel->insert(array(
                'scy_year' => $year
            ));
            // if not inserted error
            if ($tableData === false) {
                $errorList[] = 'Insertion Error<br>';
            }
        }
        $this->showJson(['Succès / Erreur']);
    }
}

