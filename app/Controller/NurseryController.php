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
        $this->show('crud/country', $vars);
    }

    /**
     * Page de gestion CRUD pour table nursery en POST
     */
    public function nursery_post()
    {
        $this->show('crud/country');
    }

}