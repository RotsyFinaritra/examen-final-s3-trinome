<?php

use app\controllers\AdminController;
use app\controllers\AppController;
use app\controllers\HabitationController;
use flight\Engine;
use flight\net\Router;
// use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
$appController = new AppController();
$router->get('/', [$appController, 'user_login']);
$router->get("/admin", [$appController, "login"]);



$adminController = new AdminController();
$router->post("/admin/login", [$adminController, 'loginAction']);

$router->get("/admin/dashboard", [$adminController, 'dashboard']);
