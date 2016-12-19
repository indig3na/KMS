<?php

$w_routes = array(
    ['GET', '/', 'Default#home', 'default_home'],

    //--------------------- CRUD ------------
    //Country
    ['GET', '/app/manage/country/', 'Country#country_get', 'crud_country_get'],
    ['POST', '/app/manage/country/', 'Country#country_post', 'crud_country_post'],
    //SchoolYear
    ['GET', '/app/manage/schoolyear/', 'SchoolYear#schoolyear_get', 'schoolYear_schoolyear_get'],
    ['POST', '/app/manage/schoolyear/', 'SchoolYear#schoolyear_post', 'schoolYear_schoolyear_post'],
     //Classroom
    ['GET', '/app/manage/classroom/', 'Classroom#classroom_get', 'classroom_classroom_get'],
    ['POST', '/app/manage/classroom/', 'Classroom#classroom_post', 'classroom_classroom_post'],
    //Activity
    ['GET', '/app/manage/activity/', 'Activity#activity_get', 'crud_activity_get'],
    ['POST', '/app/manage/activity/', 'Activity#activity_post', 'crud_activity_post'],
    //Nursery
    ['GET', '/app/manage/nursery/', 'Nursery#nursery_get', 'nursery_nursery_get'],
    ['POST', '/app/manage/nursery/', 'Nursery#nursery_post', 'nursery_nursery_post'],
    //City
    ['GET', '/app/manage/city/', 'City#city_get', 'crud_city_get'],
    ['POST', '/app/manage/city/', 'City#city_post', 'crud_city_post'],
    //Class
    ['GET', '/app/manage/class/', 'Class#class_get', 'class_class_get'],
    ['POST', '/app/manage/class/', 'Class#class_post', 'class_class_post'],
    //Child
    ['GET', '/app/manage/child/', 'Child#child_get', 'child_child_get'],
    ['POST', '/app/manage/child/', 'Child#child_post', 'child_child_post'],
    //user
    ['GET', '/app/manage/user/', 'User#user_get', 'user_user_get'],
    ['POST', '/app/manage/user/', 'User#user_post', 'user_user_post'],
    //Program
    ['GET', '/app/manage/program/', 'Program#program_get', 'crud_program_get'],
    ['POST', '/app/manage/program/', 'Program#program_post', 'crud_program_post'],
    //Calendar
    ['GET', '/app/manage/calendar/', 'Calendar#calendar_get', 'calendar_calendar_get'],


);


