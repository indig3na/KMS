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
        $method = $_POST['method'];
        $id = '';

        //validation
        $successList = array();
        $success = false;
        $errorList = array();
        $data = array();
        if (empty($year)) {
            $errorList[] = 'Schoolyear required';
            $success = false;
        }
        $data = [
            'scy_year' => $year
        ];
        // if input ok
        if (empty($errorList)) {

            $schoolYearModel = new SchoolYearModel();
            //Insert
            if ($method === 'insert') {
                $tableData = $schoolYearModel->insert($data);
                // if not inserted error
                if ($tableData === false) {
                    $errorList[] = 'Insert Error';
                } else {
                    $successList[] = 'SchoolYear inserted';
                    $success = true;
                }
            } //update
            elseif ($method === 'update') {
                $id = $_POST['id'];
                $updateData = $schoolYearModel->update($data, $id, $stripTags = true);
                // if not updated error
                if ($updateData === false) {
                    $errorList[] = 'Update Error';
                } else {
                    $successList[] = 'SchoolYear Updated';
                    $success = true;
                }
            }
        }
        //delete
        if ($method === 'delete') {
            $id = $_POST['id'];
            $schoolYearModel = new SchoolYearModel();
            $deletedData = $schoolYearModel->delete($id);
            if ($deletedData === false) {
                $errorList[] = 'Deletion Error';
            } else {
                $successList[] = 'SchoolYear Deleted';
                $success = true;
            }
        }
        // show json errorList and/or successList message
        if ($success) {
            $this->showJson(['code' => 1, 'message' => implode('<br>', $successList)]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br>', $errorList)]);
        }
    }
}

