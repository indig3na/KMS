<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
                ['GET', '/app/manage/country', 'Crud#country_get', 'crud_country_get'],
                ['POST', '/app/manage/country', 'Crud#country_post', 'crud_country_post']
	);