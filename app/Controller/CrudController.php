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

}