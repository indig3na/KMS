<?php
	
	$w_routes = array(
            ['GET', '/', 'Default#home', 'default_home'],
            
            //--------------------- CRUD ------------
            //Country
            ['GET', '/app/manage/country', 'Crud#country_get', 'crud_country_get'],
            ['POST', '/app/manage/country', 'Crud#country_post', 'crud_country_post'],
            //SchoolYear
            ['GET', '/app/manage/schoolyear', 'Crud#schoolyear_get', 'crud_schoolyear_get'],
            ['POST', '/app/manage/schoolyear', 'Crud#schoolyear_post', 'crud_schoolyear_post'],
            //Activity
            ['GET', '/app/manage/activity', 'Crud#activity_get', 'crud_activity_get'],
            ['POST', '/app/manage/activity', 'Crud#activity_post', 'crud_activity_post'],
	);