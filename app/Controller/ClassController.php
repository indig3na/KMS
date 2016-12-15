<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 13:48
 */

namespace Controller;

use Model\ClassModel;
use Model\ProgramModel;
use Model\SchoolYearModel;


class ClassController extends ControllerTemplate{
    /**
     * Page de gestion CRUD pour table Class en GET
     */
    public function class_get()
    {
        $model = new ClassModel();
        $tabledata = $model->findAllColumns(['cls_id', 'cls_name', 'program_prg_id', 'school_year_scy_id' ]);

        //initialisation of $fkdata
        $fkData = array();
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $programModel = new ProgramModel();
        $schoolYearModel = new SchoolYearModel();
        $fkData['program_prg_id'] = $programModel->findIndexedColumn('prg_name');
        $fkData['school_year_scy_id'] =  $schoolYearModel->findIndexedColumn('scy_year');
        $vars = [
            'title' => 'Class',
            'header' => ['Class', 'Program', 'SchoolYear'],
            'primaryKey' => 'cls_id',
            'data' => $tabledata,
            'fkData' => $fkData
        ];
        $this->show('crud/crud', $vars);
    }
    /**
     * Page de gestion CRUD pour table Class en POST
     */
    public function class_post()
    {
        $name = isset($_POST['cls_name']) ? trim(strip_tags($_POST['cls_name'])) : '';
        $program = isset($_POST['program_prg_id']) ? trim(strip_tags($_POST['program_prg_id'])) : '';
        $schoolyear = isset($_POST['school_year_scy_id']) ? trim(strip_tags($_POST['school_year_scy_id'])) : '';
        $method = $_POST['method'];
        $id = '';

        //validation
        $succesList = array();
        $success = false;
        $errorList = array();
        $data = array();

        if (empty($name) || empty($program) || empty($schoolyear)) {
            $errorList[] = 'All champs are required';
            $success = false;
        }
        $data = [
            'cls_name' => $name,
            'program_prg_id' => $program,
            'school_year_scy_id' => $schoolyear
        ];
        // if input ok
        if (empty($errorList)) {

            $classModel = new ClassModel();
            //Insert
            if ($method === 'insert') {
                $tableData = $classModel->insert($data);
                // if not inserted error
                if ($tableData === false) {
                    $errorList[] = 'Insert Error';
                } else {
                    $succesList[] = 'Class inserted';
                    $success = true;
                }
            }//update
            elseif ($method === 'update') {
                $id = $_POST['id'];
                $updateData = $classModel->update($data, $id, $stripTags = true);
                // if not updated error
                if ($updateData === false) {
                    $errorList[] = 'Update Error';
                } else {
                    $succesList[] = 'Class Updated';
                    $success = true;
                }
            }
        }
        //delete
        if ($method === 'delete') {
            $id = $_POST['id'];
            $classModel = new ClassModel();
            $deletedData = $classModel->delete($id);
            if ($deletedData === false) {
                $errorList[] = 'Deletion Error';
            } else {
                $succesList[] = 'Class Deleted';
                $success = true;
            }
        }
        // show json errorList and/or successList message
        if ($success) {
            $this->showJson(['code' => 1, 'message' => implode('
            ', $succesList)]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('
            ', $errorList)]);
        }
    }

}