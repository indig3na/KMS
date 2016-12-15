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

        $insert = isset($_POST['insert']) ? trim(strip_tags($_POST['insert'])) : '';
        $update = isset($_POST['update']) ? trim(strip_tags($_POST['update'])) : '';
        $year = isset($_POST['scy_year']) ? trim(strip_tags($_POST['scy_year'])) : '';
        $id = isset($_POST['id']) ? trim($_POST['id']) : 0;

        if ('method' === $insert) {
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

        if ('method' === $update) {
            $errorList = array();
            $yearOk = true;
            if (empty($year)) {
                echo 'error<br>';
                $yeraOk = false;
            }
            // if input ok
            if ($yearOk) {

                $schoolYearModel = new SchoolYearModel();
                //Insert data
                $tableData = $schoolYearModel->update(array(
                    'scy_year' => $year
                ), $id ,$stripTags = true);
                // if not inserted error
                if ($tableData === false) {
                    $errorList[] = 'Error<br>';
                }
            }
            $this->showJson(['Succès / Erreur']);

        }
    }
}

