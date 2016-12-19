<?php
/**
 * Created by PhpStorm.
 * User: Hicham
 * Date: 18/12/2016
 * Time: 20:14
 */

namespace Controller;


use W\Controller\Controller;

class CalendarController extends Controller {


    public function calendar_get()
    {

        $this->show('calendar/calendar');
    }

}