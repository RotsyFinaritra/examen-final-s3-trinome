<?php

namespace app\controllers;

use Exception;
use Flight;

class AnimalController
{

    public function __construct()
    {
    }

    public function insertPage()
    {
        $allTypes = Flight::typeAnimalModel()->getAllTypeAnimals();
        Flight::render("back/template.php", [
            "view" => "ajoutAnimal.php",
            "title" => "Ajouter un animal",
            "types" => $allTypes
        ]);
    }

    public function insertAnimals()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                // Vérification et récupération des données du formulaire
                if (isset($_POST["id_type_animal"], $_POST["nombre"], $_POST["date_entree"], $_POST["poids_initial"], $_POST["prix_achat"])) {
                    // Préparation des données pour l'insertion
                    $data = [
                        "id_type_animal" => $_POST["id_type_animal"],
                        "nombre" => $_POST["nombre"],
                        "date_entree" => $_POST["date_entree"],
                        "poids_initial" => $_POST["poids_initial"],
                        "prix_achat" => $_POST["prix_achat"]
                    ];

                    // Appel de la méthode addAnimal du modèle
                    $animalModel = Flight::animalModel();
                    $insertedId = $animalModel->addAnimal($data);

                    if ($insertedId) {
                        Flight::redirect("/admin/animals/insertion");
                    } else {
                        throw new Exception("Échec de l'ajout de l'animal.");
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
