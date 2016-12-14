<?php

$w_routes = array(
    ['GET', '/', 'Default#home', 'default_home'],

    //--------------------- CRUD ------------
    //Country
    ['GET', '/app/manage/country', 'Crud#country_get', 'crud_country_get'],
    ['POST', '/app/manage/country', 'Crud#country_post', 'crud_country_post'],
    //SchoolYear
    ['GET', '/app/manage/schoolyear/', 'SchoolYear#schoolyear_get', 'schoolYear_schoolyear_get'],
    ['POST', '/app/manage/schoolyear/', 'SchoolYear#schoolyear_post', 'schoolYear_schoolyear_post'],
    //Activity
    ['GET', '/app/manage/activity', 'Crud#activity_get', 'crud_activity_get'],
    ['POST', '/app/manage/activity', 'Crud#activity_post', 'crud_activity_post'],
    //SchoolYear
    ['GET', '/app/manage/nursery/', 'Nursery#nursery_get', 'nursery_nursery_get'],
    ['POST', '/app/manage/nursery/', 'Nursery#nursery_post', 'nursery_nursery_post'],
);