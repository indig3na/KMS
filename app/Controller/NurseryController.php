<?php

namespace Controller;


use Model\NurseryModel;


class NurseryController extends ControllerTemplate
{
    /**
     * Page de gestion CRUD pour table nursery en GET
     */
    public function nursery_get()
    {
        $model = new NurseryModel();
        $tabledata = $model->findAllColumns(['nur_id', 'nur_name', 'nur_address', 'nur_email', 'nur_telephone', 'nur_website']);
        $vars = [
            'title' => 'Nursery',
            'header' => ['Nursery', 'Address', 'Email', 'Telephone', 'Website'],
            'primaryKey' => 'nur_id',
            'data' => $tabledata
        ];
        $this->show('crud/crud', $vars);
    }

    /**
     * Page de gestion CRUD pour table nursery en POST
     */
    public function nursery_post()
    {
        $name = isset($_POST['nur_name']) ? trim(strip_tags($_POST['nur_name'])) : '';
        $address = isset($_POST['nur_address']) ? trim(strip_tags($_POST['nur_address'])) : '';
        $email = isset($_POST['nur_email']) ? trim(strip_tags($_POST['nur_email'])) : '';
        $telephone = isset($_POST['nur_telephone']) ? trim(strip_tags($_POST['nur_telephone'])) : '';
        $website = isset($_POST['nur_website']) ? trim(strip_tags($_POST['nur_website'])) : '';
        $method = $_POST['method'];
        $id = '';

        //validation
        $succesList = array();
        $success = false;
        $errorList = array();
        $data = array();
        if (empty($name) || empty($address) || empty($email) || empty($telephone) || empty($website)) {
            $errorList[] = 'All champs are required, fill in the blanks please!!<br>';
            $success = false;
        }
        $data = [
            'nur_name' => $name,
            'nur_address' => $address,
            'nur_email' => $email,
            'nur_telephone' => $telephone,
            'nur_website' => $website
        ];
        // if input ok
        if (empty($errorList)) {

            $nurseryModel = new NurseryModel();
            //Insert
            if ($method === 'insert') {
                $tableData = $nurseryModel->insert($data);
                // if not inserted error
                if ($tableData === false) {
                    $errorList[] = 'Insert Error<br>';
                } else {
                    $succesList[] = 'Nursery inserted';
                    $success = true;
                }
            }//update
            elseif ($method === 'update') {
                $id = $_POST['id'];
                $updateData = $nurseryModel->update($data, $id, $stripTags = true);
                // if not updated error
                if ($updateData === false) {
                    $errorList[] = 'Update Error<br>';
                } else {
                    $succesList[] = 'Nursery Updated';
                    $success = true;
                }
            }
        }
        //delete
        if ($method === 'delete') {
            $id = $_POST['id'];
            $nurseryModel = new NurseryModel();
            $deletedData = $nurseryModel->delete($id);
            if ($deletedData === false) {
                $errorList[] = 'Deletion Error<br>';
            } else {
                $succesList[] = 'Nursery Deleted';
                $success = true;
            }
        }
        // show json errorList and/or successList message
        if ($success) {
            $this->showJson(['code' => 1, 'message' => implode('<br>', $succesList)]);
        } else {
            $this->showJson(['code' => 0, 'message' => implode('<br>', $errorList)]);
        }
    }
}

