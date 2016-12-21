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
    //Liste des élèves
    ['GET', '/app/manage/childList/[:userId]/', 'Child#childList_get', 'child_childList_get'],
    //Liste des parents d'élèves d'une classe
    ['GET', '/app/manage/parentList/[:classeId]/', 'Child#parentList_get', 'child_parentList_get'],
    //Liste des rapports journaliers d'une classe
    ['GET', '/app/manage/dailyReportList/[:classeId]/', 'DailyReport#dailyReportList_get', 'dailyReport_dailyReportList_get'],
    //DailyReport
    ['GET', '/app/manage/dailyReport/', 'DailyReport#dailyReport_get', 'dailyReport_dailyReport_get'],
    ['POST', '/app/manage/dailyReport/', 'DailyReport#dailyReport_post', 'dailyReport_dailyReport_post'],
    //MonthlyReport
    ['GET', '/app/manage/monthlyReport/', 'MonthlyReport#monthlyReport_get', 'monthlyReport_monthlyReport_get'],
    ['POST', '/app/manage/monthlyReport/', 'MonthlyReport#monthlyReport_post', 'monthlyReport_monthlyReport_post'],

    //user
    ['GET', '/app/manage/administrator/', 'User#admin_get', 'user_admin_get'],
    ['POST', '/app/manage/administrator/', 'User#admin_post', 'user_admin_post'],
    //user
    ['GET', '/app/manage/educator/', 'User#edu_get', 'user_edu_get'],
    ['POST', '/app/manage/educator/', 'User#edu_post', 'user_edu_post'],
    //user
    ['GET', '/app/manage/parent/', 'User#par_get', 'user_par_get'],
    ['POST', '/app/manage/parent/', 'User#par_post', 'user_par_post'],

    //Users login
    ['GET','/login/', 'User#login', 'user_login'],
    ['POST','/login/', 'User#loginPost', 'user_login_post'],
    //logout
    ['GET','/logout/', 'User#logout', 'users_logout'],
    //MDP oublié
    ['GET','/app/manage/user/lostpassword/', 'User#lostpassword', 'user_lostpassword'],
    ['POST','/app/manage/user/lostpassword/', 'User#lostpasswordPost', 'user_lostpassword_post'],
    //MDP réinitialisé
    ['GET','/app/manage/user/passwordreinit/[:token]/', 'User#passwordreinit', 'user_passwordreinit'],
    ['POST','/app/manage/user/passwordreinit/[:token]/', 'User#passwordreinitPost', 'user_passwordreinit_post'],

    //Program
    ['GET', '/app/manage/program/', 'Program#program_get', 'crud_program_get'],
    ['POST', '/app/manage/program/', 'Program#program_post', 'crud_program_post'],
    //Calendar
    ['GET', '/app/manage/calendar/', 'Calendar#calendar_get', 'calendar_calendar_get'],
);


