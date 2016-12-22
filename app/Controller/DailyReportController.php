<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 20/12/2016
 * Time: 10:06
 */

namespace Controller;

use Model\DailyReportModel;
use Model\ChildModel;
use Model\UserFunctionsModel;


class DailyReportController extends ControllerTemplate{

    /**
     * Page de gestion CRUD pour table dailyReport en GET
     */
    public function dailyReportSingle_get($date,$childId){
        $childId = intval($childId);
        $date = trim(strip_tags($date));
        $model = new DailyReportModel();
        $report = $model ->findDailyReport($childId, $date);
        $childModel = new ChildModel();
        $child = $childModel->find($childId);
        $vars = [
            'title'=> 'Rapport journalier',
            'report' => $report,
            'child' => $child,
            'date' => $date,
        ];
        $this->show('reports/dailyReportSingle',$vars);
    }

    public function dailyReport_get()
    {
        $model = new DailyReportModel();
        $tabledata = $model->findAllColumns(['drp_id', 'drp_repas_matin', 'drp_repas_midi', 'drp_repas_apresmidi', 'drp_fisio_wet',
            'drp_fisio_poo', 'drp_sieste', 'drp_comments', 'child_chd_id', 'user_usr_id', 'drp_date']);

        //initialisation of $fkdata
        $fkData = array();
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $childModel = new ChildModel();
        $userModel = new UserFunctionsModel();
        $fkData['child_chd_id'] = $childModel->findIndexedColumns(['chd_firstname','chd_lastname'],' ');
        $fkData['user_usr_id'] = $userModel->findIndexedColumns(['usr_firstname','usr_lastname'],' ');

        $vars = [
            'title' => 'Daily Report',
            'header' => ['Report', 'Repas matin', 'Repas midi', 'Repas apres-midi', 'Wet', 'Poo', 'Sieste', 'Comments', 'Child', 'User', 'Date'],
            'primaryKey' => 'drp_id',
            'data' => $tabledata,
            'fkData' => $fkData
        ];
        // pour debug
        $this->show('reports/dailyReport', $vars);
    }

    /**
     * Page de gestion CRUD pour table dailyReport en POST
     */
    public function dailyReport_post($date,$childId)
    {

        $childId = intval($childId);
        $date = trim(strip_tags($date));
        $mealQuant = isset($_POST['quant']) ? trim(strip_tags($_POST['quant'])) : '';
        $mealType = isset($_POST['repas']) ? trim(strip_tags($_POST['repas'])) : '';
        $fisio = isset($_POST['quelle']) ? trim(strip_tags($_POST['quelle'])) : '';
        $sieste = isset($_POST['sieste']) ? trim(strip_tags($_POST['sieste'])) : '';
        $comments = isset($_POST['comments']) ? trim(strip_tags($_POST['comments'])) : '';
        $user = $this -> getUser()['usr_id'];

        $model = new DailyReportModel();
        $report = $model ->findDailyReport($childId, $date);
        if (empty($report)){
            $method = 'insert';
        } else {
            $method = 'update';
        }
        //$method = $_POST['method'];
        $id = '';
        debug($report);
        //validation
        $succesList = array();
        $success = false;
        $errorList = array();

        if (!isset($date)) {
            $errorList[] = 'La date est a remplir!!';
            $success = false;
        }
        if ($mealType=='matin') {
            $report['drp_repas_matin'] = $mealQuant;
        } elseif ($mealType=='midi') {
            $report['drp_repas_midi'] = $mealQuant;
        } elseif ($mealType=='apresmidi') {
            $report['drp_repas_apresmidi'] = $mealQuant;
        }

        if ($fisio == 'Pipi'){
            $report['drp_fisio_wet']++;
        } elseif ($fisio == 'Caca'){
            $report['drp_fisio_poo']++;
        }
        $report['drp_comments']=$comments;
        $report['drp_sieste']=$sieste;
        $data = $report;
        debug($data);
        // if input ok
        if (empty($errorList)) {

            $dailyReportModel = new DailyReportModel();

            //Insert
            if ($method === 'insert') {
                $tableData = $dailyReportModel->insert($data);
                // if not inserted error
                if ($tableData === false) {
                    $errorList[] = 'Insert Error';
                } else {
                    $succesList[] = 'Report inserted';
                    $success = true;
                }
            }//update
            elseif ($method === 'update') {
                $id = $report['drp_id'];
                $updateData = $dailyReportModel->update($data, $id, $stripTags = true);
                // if not updated error
                if ($updateData === false) {
                    $errorList[] = 'Update Error';
                } else {
                    $succesList[] = 'Report Updated';
                    $success = true;
                }
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