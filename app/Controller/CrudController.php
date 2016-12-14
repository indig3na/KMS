<?php

namespace Controller;

class CrudController extends ControllerTemplate
{

	/**
	 * Page de gestion CRUD pour table country en GET
	 */
	public function country_get()
	{
		$this->show('crud/country');
	}
        
	/**
	 * Page de gestion CRUD pour table country en POST
	 */
	public function country_post()
	{
		$this->show('crud/country');
	}

    /**
     * CRUD Activity table in GET method
     */
	public function activity_get()
    {
        $this->show('crud/activity');
    }

    /**
     * CRUD Activity table in POST method
     */
    public function activity_post()
    {
        $this->show('crud/activity');
    }

}