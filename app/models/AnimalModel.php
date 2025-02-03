<?php

namespace app\models;

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

    public function inscrireAdmin($nom, $mdp)
    {

        $stmt = $this->db->prepare("SELECT id_admin FROM $this->table WHERE nom = :nom");
        $stmt->execute(['nom' => $nom]);

        if ($stmt->rowCount() > 0) {
            return ["success" => false, "message" => "Ce nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre."];
        }

        $hashedPassword = password_hash($mdp, PASSWORD_BCRYPT);

        $sql = "INSERT INTO agence_immobiliere_admin (nom, password) VALUES (:nom, :password)";
        $stmt = $this->db->prepare($sql);

        $result = $stmt->execute([
            'nom' => $nom,
            'password' => $hashedPassword
        ]);

        if ($result) {
            return ["success" => true, "message" => "Administrateur inscrit avec succès."];
        } else {
            return ["success" => false, "message" => "Une erreur est survenue lors de l'inscription. Veuillez réessayer."];
        }
    }

    public function verifierLogin($nom, $mdp)
    {
        $stmt = $this->db->prepare("SELECT id_admin, nom, password FROM agence_immobiliere_admin WHERE nom = :nom");
        $stmt->execute(['nom' => $nom]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($mdp, $user['password'])) {
                return ['success' => true, 'user' => $user];
            } else {
                return ['success' => false, 'message' => 'Mot de passe incorrect.'];
            }
        } else {
            return ['success' => false, 'message' => 'Aucun utilisateur trouvé avec ce nom d\'utilisateur.'];
        }
    }
}
