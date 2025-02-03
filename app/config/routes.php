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

$habitationController = new HabitationController();
$router->get('/admin/dashboard/habitation/@id_habitation', [$habitationController, 'ficheHabitation']);
$router->get("/admin/dashboard/addHabitation",[$habitationController,"addHabitationPage"]);
$router->post("/admin/dashboard/addHabitation/submit-request",[$habitationController,"addHabitationAction"]);