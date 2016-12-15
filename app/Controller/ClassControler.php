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


class ClassControler extends ControllerTemplate{
    /**
     * Page de gestion CRUD pour table Class en GET
     */
    public function class_get()
    {
        $model = new ClassModel();
        $tabledata = $model->findAllColumns(['cls_id', 'cls_name', 'program_prg_id', 'schoolyear_scy_id' ]);

        //initialisation of $fkdata
        $fkData = array();
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $programModel = new ProgramModel();
        $schoolYearModel = new SchoolYearModel();
        $fkData['program_prg_id'] = $programModel->findIndexedColumn('prg_name');
        $fkData['schoolyear_scy_id'] =  $schoolYearModel->findIndexedColumn('scy_name');
        $vars = [
            'title' => 'Class',
            'header' => ['Class', 'Program', 'SchoolYear'],
            'primaryKey' => 'cls_id',
            'data' => $tabledata,
            'fkData' => $fkData
        ];
        $this->show('crud/crud', $vars);
    }

}