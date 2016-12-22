<?php
/**
 * Created by PhpStorm.
 * User: Indig3na
 * Date: 21/12/2016
 * Time: 22:49
 */

namespace Controller;

use Model\MonthlyReportModel;
use Model\ChildModel;
use Model\UserModel;


class MonthlyReportController extends ControllerTemplate{
    /**
     * Page de gestion CRUD pour table monthlyReport en GET
     */
    public function monthlyReport_get()
    {
        $model = new MonthlyReportModel();
        $tabledata = $model->findAllColumns(['mrp_id', 'mrp_dev_cog', 'mrp_dev_mot', 'mrp_mot_fin', 'mrp_dev_lin',
            'mrp_dev_emo', 'child_chd_id', 'user_usr_id', 'mrp_month']);

        //initialisation of $fkdata
        $fkData = array();
        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $childModel = new ChildModel();
        $userModel = new UserModel();
        $fkData['child_chd_id'] = $childModel->findIndexedColumn('chd_firstname');
        $fkData['user_usr_id'] = $userModel->findIndexedColumn('usr_firstname');

        $vars = [
            'title' => 'Monthly Report',
            'header' => ['Report', 'Development Cognitive', 'Development Motrice', 'Motrocite Fine', 'Development Linguistique', 'Development Emotionnel' ],
            'primaryKey' => 'mrp_id',
            'data' => $tabledata,
            'fkData' => $fkData
        ];
        // pour debug
        $this->show('reports/monthlyReport', $vars);
    }

    /**
     * Page de gestion CRUD pour table monthlyReport en POST
     */
    public function monthlyReport_post()
    {
        $month = isset($_POST['mrp_month']) ? trim(strip_tags($_POST['mrp_month'])) : '';
        $devCog = isset($_POST['mrp_dev_cog']) ? trim(strip_tags($_POST['mrp_dev_cog'])) : '';
        $devMot = isset($_POST['mrp_dev_mot']) ? trim(strip_tags($_POST['mrp_dev_mot'])) : '';
        $motFin = isset($_POST['mrp_mot_fin']) ? trim(strip_tags($_POST['mrp_mot_fin'])) : '';
        $devLin = isset($_POST['mrp_dev_lin']) ? trim(strip_tags($_POST['mrp_dev_lin'])) : '';
        $devEmo = isset($_POST['mrp_dev_emo']) ? trim(strip_tags($_POST['mrp_dev_emo'])) : '';
        $child = isset($_POST['child_chd_id']) ? trim(strip_tags($_POST['child_chd_id'])) : '';
        $user = isset($_POST['user_usr_id']) ? trim(strip_tags($_POST['user_usr_id'])) : '';
        $method = $_POST['method'];
        $id = '';

        //validation
        $succesList = array();
        $success = false;
        $errorList = array();
        $data = array();

        if (!isset($month)) {
            $errorList[] = 'La date est a remplir!!';
            $success = false;
        }
        $data = [
            'mrp-month' => $month,
            'mrp_dev_cog' => $devCog,
            'mrp_dev_mot' => $devMot,
            'mrp_mot_fin' => $motFin,
            'mrp_dev_lin' => $devLin,
            'mrp_dev_emo' => $devEmo,
            'child_chd_id' => $child,
            'user_usr_id' => $user
        ];
        // if input ok
        if (empty($errorList)) {

            $dailyMonthlyModel = new MonthlyReportModel();

            //Insert
            if ($method === 'insert') {
                $tableData = $dailyMonthlyModel->insert($data);
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
                $updateData = $dailyMonthlyModel->update($data, $id, $stripTags = true);
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