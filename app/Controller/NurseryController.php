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

        //validation & insertion données
        $errorList = array();
        $nurseryOk = true;

        if (empty($name) || empty($address) || empty($email) || empty($telephone) || empty($website)) {
            echo 'champ vide, remplir tous les champs obligatoires!<br>';
            $nurseryOk = false;
        }
        if ($nurseryOk) {
            $nurseryModel = new nurseryModel();
            //Insert data
            $tableData = $nurseryModel->insert(array(
                'nur_name' => $name,
                'nur_address' => $address,
                'nur_email' => $email,
                'nur_telephone' => $telephone,
                'nur_website' => $website
            ));
            // if not inserted error
            if ($tableData === false) {
                $errorList[] = 'Insertion Error<br>';
            }
        }
        $this->showJson(['Succès / Erreur']);

    }
}

