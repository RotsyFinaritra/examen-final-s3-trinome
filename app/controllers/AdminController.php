<?php

namespace app\controllers;

use Flight;

class AdminController
{

    public function __construct() {}


    public function loginAction()
    {
        $nom = $_POST['nom'];
        $mdp =  $_POST['password'];
        if (empty($nom)) {
            $_SESSION['login_error'] = "Le nom d'utilisateur ne peut pas être vide.";
        }
        if (empty($mdp)) {
            $_SESSION['login_error'] = "Le de passe ne peut pas être vide.";
        }
        // Flight::adminModel()->inscrireAdmin("Rotsy","12345678");
        $response = Flight::adminModel()->verifierLogin($nom, $mdp);
        if (!$response['success']) {
            $_SESSION['login_error'] = $response['message'];
            Flight::redirect('/admin');
        } else {
            $_SESSION['admin'] = $response['user'];
            Flight::redirect('/admin/dashboard');
        }
    }

    public function dashboard()
    {
        $habitations = Flight::habitationModel()->getAllHabitations();
        $page_name = "list-habitation";
        $head_links = [
            "<script src=\"" . $_SESSION['base_url'] . "/assets/js/" . $page_name . "-search.js\" defer></script>"
        ];
        Flight::render('back/template', ['page_name' => $page_name, "habitations" => $habitations, "links" => $head_links]);
    }
}
