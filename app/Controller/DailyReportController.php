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


    public function dailyReportSingle_get($date,$childId){
        
        $childId = intval($childId);
        $date = trim(strip_tags($date));
        
        $model = new DailyReportModel();
        $report = $model ->findDailyReport($childId, $date);
        $childModel = new ChildModel();
        $child = $childModel->find($childId);
        $fkData['child_chd_id'] = $childModel->findIndexedColumns(['chd_firstname','chd_lastname'],' ');
       
        $vars = [
            'title'=> 'Rapport journalier',
            'report' => $report,
            'child' => $child,
            'date' => $date,
            'fkData' => $fkData,
        ];
        
        $this->show('reports/dailyReportSingle',$vars);
    }
    /**
     * Page de gestion CRUD pour table dailyReport en GET
     */
    public function dailyReport_get()
    {
        //initialisation of $fkdata
        $fkData = array();
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $childModel = new ChildModel();
        $fkData['child_chd_id'] = $childModel->findIndexedColumns(['chd_firstname','chd_lastname'],' ');
        
        
        $vars = [
            'title' => 'Rapport journalier',
            'fkData' => $fkData,
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
        $sieste = isset($_POST['sieste']) ? trim(strip_tags($_POST['sieste'])) : NULL;
        $comments = isset($_POST['comments']) ? trim(strip_tags($_POST['comments'])) : NULL;
        $user = $this -> getUser()['usr_id'];

        $model = new DailyReportModel();
        $report = $model ->findDailyReport($childId, $date);
        if (empty($report)){
            $method = 'insert';
            $report['drp_date'] = date('Y-m-d');
        } else {
            $method = 'update';
        }
        //$method = $_POST['method'];
        $id = '';
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
        isset($comments) ? $report['drp_comments']=$comments : '';
        isset ($sieste) ? $report['drp_sieste']=$sieste : '';
        $report['child_chd_id']=$childId;
        $report['user_usr_id']=$this -> getUser()['usr_id'];
        $data = $report;
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
            $this->redirectToRoute('dailyReport_dailyReportSingle_get',['date' => $date, 'childId' => $childId]);
        } else {
            $vars = [
            'title'=> 'Rapport journalier',
            'report' => $report,
            'child' => $child,
            'date' => $date,
            'message' => implode('
', $errorList)
        ];
        
        $this->show('reports/dailyReportSingle',$vars);
        }
    }
    public function getTheDailyReport($date, $childId){
        $dailyReport = new DailyReportModel();
        $childDaylyReport = $dailyReport->dailyReport_get($date, $childId);
        $this->show('dailyReport/get_the_daily_report',array('childDaylyReport'=> $childDaylyReport));
    }
    public function getChildDailyReports($childId){
        $dailyReport = new DailyReportModel();
        $childDaylyReports = $dailyReport->childDailyReports_get($childId);
        $this->show('dailyReport/get_the_daily_reports',array('childDaylyReports'=> $childDaylyReports));
    }
}