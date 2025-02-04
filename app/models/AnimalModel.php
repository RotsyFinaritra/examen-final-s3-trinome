<?php

namespace app\models;

use DateTime;
use Exception;
use Flight;
use PDO;
use PDOException;

class AnimalModel extends BaseModel
{
    private $table = "exam_fin_s3_animal";

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllAnimals()
    {
        return $this->findAll($this->table);
    }

    public function getAnimalById($id)
    {
        return $this->findBy($this->table, "id_animal", $id);
    }

    public function addAnimal($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateAnimal($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteAnimal($id)
    {
        return $this->delete($this->table, $id);
    }

    public function getAnimalsByType($idType)
    {
        $sql = "SELECT * FROM $this->table WHERE id_type_animal = :id_type_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id_type_animal" => $idType]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function uploadImage($image)
    {
        try {
            $upload_dir = Flight::get('upload_dir');

            // Vérifier si un fichier a bien été envoyé
            if (!isset($image['tmp_name']) || empty($image['tmp_name'])) {
                throw new Exception("Aucune image envoyée.");
            }

            // Récupérer le nom original de l'image
            $originalName = $image['name'];

            // Générer un nom unique pour l'image
            $extension = pathinfo($originalName, PATHINFO_EXTENSION); // Récupérer l'extension
            $uniqueName = uniqid() . '.' . $extension; // Nom unique

            // Chemin de destination complet
            $destination = $upload_dir . '/' . $uniqueName;

            // Déplacer l'image vers le dossier d'upload
            if (move_uploaded_file($image['tmp_name'], $destination)) {
                return $uniqueName; // Retourne uniquement le nom de l'image
            } else {
                throw new Exception("Erreur lors du déplacement du fichier : $originalName");
            }
        } catch (Exception $e) {
            throw new Exception("Erreur lors de l'upload de l'image : " . $e->getMessage());
        }
    }

    public function getTotalQuotaJournalierByType($idType)
    {
        $sql = "SELECT SUM(quota_nourriture) as total_quota FROM $this->table WHERE id_type_animal = :id_type_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id_type_animal" => $idType]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 
    public function getNbJourNourrissageByType($idType)
    {
        $total_quota = $this->getTotalQuotaJournalierByType($idType);
        $stock_aliment = Flight::alimentModel()->getTotalStockAlimentByType($idType);

        $total_jour = 0;
        while ($stock_aliment['total_stock'] >= $total_quota) {
            $total_jour++;
            $stock_aliment['total_stock'] -= $total_quota;
        }

        return $total_jour;
    }

    public function getAnimauxAvecPoidsOfTypeByDate($date, $idType)
    {
        $nb_jour_mihinana = $this->getNbJourNourrissageByType($idType);
        $date_depart = new DateTime("2025-02-03");
        $date_arrive = new DateTime($date);
        $interval = $date_depart->diff($date_arrive);
        $jours_diff = $interval->days;
        $type = Flight::typeAnimalModel()->getTypeAnimalById($idType);
        $allAnimalsByType = $this->getAnimalsByType($idType);

        // Utilisation de `&$animal` pour modifier directement le tableau
        foreach ($allAnimalsByType as &$animal) {
            $animal['poids_variable'] = $animal['poids_initial'];
        }
        unset($animal); // Important : éviter les effets de bord avec la référence

        if ($nb_jour_mihinana >= $jours_diff) {
            for ($i = 0; $i < $jours_diff; $i++) {
                foreach ($allAnimalsByType as &$animal) {
                    $animal['poids_variable'] *= (1 + ($type['pourcentage_gain_poids'] / 100));
                }
                unset($animal);
            }
            return $allAnimalsByType;
        } else {
            for ($i = 0; $i < $jours_diff; $i++) {
                foreach ($allAnimalsByType as &$animal) {
                    $animal['poids_variable'] *= (1 + ($type['pourcentage_gain_poids'] / 100));
                }
                unset($animal);
            }

            $diff = $jours_diff - $nb_jour_mihinana;
            for ($i = 0; $i < $diff; $i++) {
                foreach ($allAnimalsByType as &$animal) {
                    $animal['poids_variable'] *= (1 - ($type['pourcentage_perte_poids'] / 100));
                    if ($diff >= $type['nb_jour_sans_manger']) {
                        $animal['poids_variable'] = 0;
                    }
                }
                unset($animal);
            }
            return $allAnimalsByType;
        }
    }


}
