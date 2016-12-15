<?php

namespace Controller;

use \Model\ClassroomModel;

class ClassroomController extends ControllerTemplate
{

    /**
     * Page de gestion CRUD pour table classroom en GET
     */

    public function classroom_get()
    {
        $classroom = new ClassroomModel();
        $tabledata = $classroom->findAll();
        $vars = [
            'title' => 'Liste des Salles',
            'header' => ['Salle', 'Nombre de places', 'Caractéristiques'],
            'primaryKey' => 'clr_id'
        ];
        $this->show('classroom/classroom_get', array('vars' => $vars, 'tabledata' => $tabledata));
    }
}