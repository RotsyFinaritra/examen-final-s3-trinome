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


$animalController = new AnimalController();
$router->get("/admin/dashboard", [$animalController, 'dashboard']);
$router->get("/admin/dashboard/@date", [$animalController, 'dashboardSearch']);
$router->get("/admin/animals", [$animalController, 'getAllTypeAnimals']);
$router->get("/admin/animals/insertion", [$animalController, 'insertPage']);
$router->post("/admin/animals/insert", [$animalController, 'insertAnimals']);
$router->get("/admin/animals/types/update/@idType", [$animalController, 'updateTypePage']);
$router->post("/admin/animals/types/update/@idType", [$animalController, 'validateUpdateType']);

$alimentController = new AlimentController();
$router->get("/admin/aliments/insertion", [$alimentController, 'insertPage']);
$router->post("/admin/aliments/insert", [$alimentController, 'insertAliments']);


