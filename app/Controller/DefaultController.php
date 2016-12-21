<?php

namespace Controller;

class DefaultController extends ControllerTemplate
{

    /**
     * Page d'accueil par défaut
     */
    public function home()
    {
        $errorList = array();
        $this->show('default/home', array('errorList'=>$errorList));
    }

}