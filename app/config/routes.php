<?php

use app\controllers\AdminController;
use app\controllers\AlimentController;
use app\controllers\AnimalController;
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
$router->get('/', function () {
    echo "hello world";
});
$router->get("/admin", [$appController, "login"]);


$adminController = new AdminController();
$router->post("/admin/login", [$adminController, 'loginAction']);
$router->get("/admin/dashboard", [$adminController, 'dashboard']);


$animalController = new AnimalController();
$router->get("/admin/animals", [$animalController, 'getAllAnimals']);
$router->get("/admin/animals/insertion", [$animalController, 'insertPage']);
$router->post("/admin/animals/insert", [$animalController, 'insertAnimals']);

$alimentController = new AlimentController();
$router->get("/admin/aliments/insertion", [$alimentController, 'insertPage']);
$router->post("/admin/aliments/insert", [$alimentController, 'insertAliments']);


