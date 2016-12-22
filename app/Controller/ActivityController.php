<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 14/12/2016
 * Time: 14:00
 */

namespace Controller;

use Model\ActivityModel;

class ActivityController extends ControllerTemplate
{

    /**
     * CRUD Activity table in GET method
     */
    public function activity_get()
    {
        $activitymodel = new ActivityModel();
        $tabledata = $activitymodel->findAllColumns(['act_id', 'act_name', 'act_material', 'act_description']);
        $actVars = [
            'title' => 'Activités',
            'header' => ['Activités', 'Materiels', 'Déscription'],
            'primaryKey' => 'act_id',
            'data' => $tabledata
        ];
        $this->allowTo('ROLE_ADMIN');
        $this->show('crud/crud', $actVars);
    }

    /**
     * CRUD Activity table in POST method
     */
    public function activity_post()
    {
        $name = isset($_POST['act_name']) ? trim(strip_tags($_POST['act_name'])) : '';
        $material = isset($_POST['act_material']) ? trim($_POST['act_material']) : '';
        $description = isset($_POST['act_description']) ? trim($_POST['act_description']) : '';

        $method = $_POST['method'];
        $id = '';

        // activity input validation
        $succesList = array();
        $success = false;
        $errorList = array();
        $data = array();
        if (empty($name)) {
            $errorList[] = 'Activité obligatoire';
            $success = false;
        }
        $data = [
            'act_name' => $name,
            'act_material' => $material,
            'act_description' => $description
        ];
        // if input ok
        if (empty($errorList)) {

            $activityModel = new ActivityModel();
            //Insert data
            if ($method === 'insert') {
                $activityData = $activityModel->insert($data);
                // if not inserted error
                if ($activityData === false) {
                    $errorList[] = 'Erreur dans l\'insertion';
                } else {
                    $succesList[] = 'Activité insérée';
                    $success = true;
                }
            } //update data for given Id
            elseif ($method === 'update') {
                $id = $_POST['id'];
                $updateData = $activityModel->update($data, $id, $stripTags = true);
                // if not updated error
                if ($updateData === false) {
                    $errorList[] = 'Erreur dans la mise à jour';
                } else {
                    $succesList[] = 'Activité mise à jour';
                    $success = true;
                }
            }


        }
        //delete data for a given Id
        if ($method === 'delete') {
            $id = $_POST['id'];
            $activityModel = new ActivityModel();
            $deletedData = $activityModel->delete($id);
            // if not deleted error
            // if not updated error
            if ($deletedData === false) {
                $errorList[] = 'Erreur dans la suppression';
            } else {
                $succesList[] = 'Activité supprimée';
                $success = true;
            }

        }
        // show json errorList and/or successList message
        if ($success) {
            $this->show('crud/crud');
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br>', $errorList)]);
        }


    }


}