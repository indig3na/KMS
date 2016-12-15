<?php

namespace Controller;

class DefaultController extends ControllerTemplate
{

    /**
     * Page d'accueil par défaut
     */
    public function home()
    {
        $this->show('default/home');
    }

}