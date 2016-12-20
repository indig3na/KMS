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
use Model\UserModel;


class DailyReportController extends ControllerTemplate{
    /**
     * Page de gestion CRUD pour table dailyReport en GET
     */
    public function dailyReport_get()
    {
        $model = new DailyReportModel();
        $tabledata = $model->findAllColumns(['drp_id', 'drp_repas_matin', 'drp_repas_midi', 'drp_repas_apresmidi', 'drp_fisio_wet',
            'drp_fisio_poo', 'drp_sieste', 'drp_comments', 'child_chd_id', 'user_usr_id', 'drp_date']);

        //initialisation of $fkdata
        $fkData = array();
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $childModel = new ChildModel();
        $userModel = new UserModel();
        $fkData['child_chd_id'] = $childModel->findIndexedColumn('chd_firstname');
        $fkData['user_usr_id'] = $userModel->findIndexedColumn('usr_firstname');

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
    public function dailyReport_post()
    {
        $date = isset($_POST['drp_date']) ? trim(strip_tags($_POST['drp_date'])) : '';
        $repasMatin = isset($_POST['drp_repas_matin']) ? trim(strip_tags($_POST['drp_repas_matin'])) : '';
        $repasMidi = isset($_POST['drp_repas_midi']) ? trim(strip_tags($_POST['drp_repas_midi'])) : '';
        $repasApresmidi = isset($_POST['drp_repas_apresmidi']) ? trim(strip_tags($_POST['drp_repas_apresmidi'])) : '';
        $wet = isset($_POST['drp_fisio_wet']) ? trim(strip_tags($_POST['drp_fisio_wet'])) : '';
        $caca = isset($_POST['drp_fisio_poo']) ? trim(strip_tags($_POST['drp_fisio_poo'])) : '';
        $sieste = isset($_POST['drp_sieste']) ? trim(strip_tags($_POST['drp_sieste'])) : '';
        $comments = isset($_POST['drp_comments']) ? trim(strip_tags($_POST['drp_comments'])) : '';
        $child = isset($_POST['child_chd_id']) ? trim(strip_tags($_POST['child_chd_id'])) : '';
        $user = isset($_POST['user_usr_id']) ? trim(strip_tags($_POST['user_usr_id'])) : '';
        $method = $_POST['method'];
        $id = '';

        //validation
        $succesList = array();
        $success = false;
        $errorList = array();
        $data = array();

        if (empty($date)) {
            $errorList[] = 'La date est a remplir!!';
            $success = false;
        }
        $data = [
            'drp_date' => $date,
            'drp_repas_matin' => $repasMatin,
            'drp_repas_midi' => $repasMidi,
            'drp_repas_apresmidi' => $repasApresmidi,
            'drp_fisio_wet' => $wet,
            'drp_fisio_poo' => $caca,
            'drp_sieste' => $sieste,
            'drp_comments' => $comments,
            'child_chd_id' => $child,
            'user_usr_id' => $user
        ];
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
                $id = $_POST['id'];
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
        //delete
        if ($method === 'delete') {
            $id = $_POST['id'];
            $dailyReportModel = new DailyReportModel();
            $deletedData = $dailyReportModel->delete($id);
            if ($deletedData === false) {
                $errorList[] = 'Deletion Error';
            } else {
                $succesList[] = 'Report Deleted';
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