<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/app/manage/country', 'Crud#country_get', 'crud_country_get'],
		['POST', '/app/manage/country', 'Crud#country_post', 'crud_country_post'],
		['GET', '/app/manage/schoolyear', 'Crud#schoolyear_get', 'crud_schoolyear_get'],
		['POST', '/app/manage/schoolyear', 'Crud#schoolyear_post', 'crud_schoolyear_post']
	);