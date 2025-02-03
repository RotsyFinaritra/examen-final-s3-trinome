<?php

namespace app\controllers;

use Exception;
use Flight;

class AlimentController
{

    public function __construct()
    {
    }

    public function insertPage()
    {
        $allTypes = Flight::typeAnimalModel()->getAllTypeAnimals();
        Flight::render("back/template.php", [
            "view" => "ajoutAliment.php",
            "title" => "Ajouter un aliment",
            "types" => $allTypes
        ]);
    }
    public function insertAliments()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                // Vérification et récupération des données du formulaire
                if (isset($_POST["id_type_animal"], $_POST["quantite"], $_POST["prix_unitaire"], $_POST["date_ajout"])) {
                    // Préparation des données pour l'insertion
                    $data = [
                        "id_type_animal" => $_POST["id_type_animal"],
                        "quantite" => $_POST["quantite"],
                        "prix_unitaire" => $_POST["prix_unitaire"],
                        "date_ajout" => $_POST["date_ajout"]
                    ];

                    // Appel de la méthode addAliment du modèle
                    $alimentModel = Flight::alimentModel();
                    $insertedId = $alimentModel->addAliment($data);

                    if ($insertedId) {
                        Flight::redirect("/admin/aliments/insertion");
                        // echo json_encode(["success" => true, "message" => "Aliment ajouté avec succès!", "id" => $insertedId]);
                    } else {
                        throw new Exception("Échec de l'ajout de l'aliment.");
                    }
                } else {
                    throw new Exception("Données incomplètes.");
                }
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => $e->getMessage()]);
            }
        }
    }

}