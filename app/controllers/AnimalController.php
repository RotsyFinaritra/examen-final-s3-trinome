<?php

namespace app\controllers;

use Exception;
use Flight;

class AnimalController
{

    public function __construct()
    {
    }

    public function dashBoardSearch($date)
{
    $animalModel = Flight::animalModel();
    $allTypes = Flight::typeAnimalModel()->getAllTypeAnimals();
    $animauxByType = [];

    // Récupérer les animaux pour chaque type en fonction de la date
    foreach ($allTypes as $type) {
        $animauxByType[$type['id_type_animal']] = $animalModel->getAnimauxAvecPoidsOfTypeByDate($date, $type['id_type_animal']);
    }

    Flight::render("back/dashBoard.php", [
        "types" => $allTypes,
        "date" => $date,
        "animauxByType" => $animauxByType // Passer les animaux à la vue
    ]);
}


    public function dashBoard()
    {
        $allTypes = Flight::typeAnimalModel()->getAllTypeAnimals();
        Flight::render("back/template.php", [
            "view" => "dashBoard.php",
            "types" => $allTypes
        ]);
    }

    public function validateUpdateType($idType)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                // Vérification et récupération des données du formulaire
                if (isset($_POST["espece"], $_POST["poids_min_vente"], $_POST["prix_kg"], $_POST["poids_max"], $_POST["nb_jour_sans_manger"], $_POST["pourcentage_perte_poids"])) {
                    // Préparation des données pour la mise à jour
                    $data = [
                        "espece" => $_POST["espece"],
                        "poids_min_vente" => $_POST["poids_min_vente"],
                        "prix_kg" => $_POST["prix_kg"],
                        "poids_max" => $_POST["poids_max"],
                        "nb_jour_sans_manger" => $_POST["nb_jour_sans_manger"],
                        "pourcentage_gain_poids" => $_POST["pourcentage_gain_poids"],
                        "pourcentage_perte_poids" => $_POST["pourcentage_perte_poids"]
                    ];

                    // Appel de la méthode updateTypeAnimal du modèle
                    $typeAnimalModel = Flight::typeAnimalModel();
                    $updated = $typeAnimalModel->updateTypeAnimal($data, $idType);

                    if ($updated) {
                        Flight::redirect("/admin/animals");
                    } else {
                        throw new Exception("Échec de la mise à jour du type d'animal.");
                    }
                } else {
                    throw new Exception("Données incomplètes.");
                }
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => $e->getMessage()]);
            }
        }
    }

    public function updateTypePage($idType)
    {
        $type = Flight::typeAnimalModel()->getTypeAnimalById($idType);

        Flight::render("back/formModif.php", [
            "type" => $type
        ]);
    }

    public function getAllTypeAnimals()
    {
        $allTypes = Flight::typeAnimalModel()->getAllTypeAnimals();
        Flight::render("back/template.php", [
            "view" => "listeTypeAnimal.php",
            "title" => "Liste des types d'animaux",
            "types" => $allTypes
        ]);
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
                if (isset($_POST["id_type_animal"], $_POST["date_entree"], $_POST["poids_initial"], $_POST["quota_nourriture"], $_POST["prix_achat"], $_POST["quota_nourriture"], $_POST["auto_vente"]) && isset($_FILES["image"])) {

                    // Récupération du fichier image
                    $image = $_FILES['image'];

                    // Instancier le modèle
                    $animalModel = Flight::animalModel();

                    // Upload de l'image et récupération du nom du fichier
                    $imageName = $animalModel->uploadImage($image);

                    // Préparation des données pour l'insertion
                    $data = [
                        "id_type_animal" => $_POST["id_type_animal"],
                        "date_entree" => $_POST["date_entree"],
                        "poids_initial" => $_POST["poids_initial"],
                        "prix_achat" => $_POST["prix_achat"],
                        "quota_nourriture" => $_POST["quota_nourriture"],
                        "auto_vente" => $_POST["auto_vente"],
                        "image" => $imageName // Stocke uniquement le nom de l'image
                    ];

                    // Insérer l'animal dans la base de données
                    $insertedId = $animalModel->addAnimal($data);

                    if ($insertedId) {
                        Flight::redirect("/admin/animals/insertion");
                    } else {
                        throw new Exception("Échec de l'ajout de l'animal.");
                    }
                } else {
                    throw new Exception("Données incomplètes ou image non envoyée.");
                }
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => $e->getMessage()]);
            }
        }
    }
}
