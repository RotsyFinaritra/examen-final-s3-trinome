<?php

namespace app\controllers;

use Flight;

class AppController
{

    public function __construct() {}


    public function login()
    {
        Flight::render('back/login_admin');
    }

    public function user_login()
    {
        Flight::render('front/login_user');
    }
}
