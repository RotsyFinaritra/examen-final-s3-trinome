<?php

namespace app\models;

use Exception;
use Flight;
use PDO;
use PDOException;

class UserModel extends BaseModel
{
    private $table = "agence_immobiliere_user";

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllUsers()
    {
        return $this->findAll($this->table);
    }

    public function getUserById($id)
    {
        return $this->findBy($this->table, "id", $id);
    }

    public function addUser($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteUser($id)
    {
        return $this->delete($this->table, $id);
    }

    function inscrireUtilisateur($nom, $email, $mdp)
    {

        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->rowCount() > 0) {
            return "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        }

        $sql = "INSERT INTO users (nom, email, mdp) VALUES (:nom, :email, :mdp)";
        $stmt = $this->db->prepare($sql);

        $result = $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'mdp' => $mdp
        ]);

        if ($result) {
            return "Utilisateur inscrit avec succès.";
        } else {
            return "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
        }
    }

    function verifierLogin($email, $mdp)
    {
        $stmt = $this->db->prepare("SELECT id, nom, email, mdp FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($mdp === $user['mdp']) {
                return ['success' => true, 'user' => $user];
            } else {
                return ['success' => false, 'message' => 'Mot de passe incorrect.'];
            }
        } else {
            return ['success' => false, 'message' => 'Aucun utilisateur trouvé avec cet email.'];
        }
    }

    function insererDepot($idUser, $montant)
    {
        $stmt = $this->db->prepare("INSERT INTO depot (idUser, montant) VALUES (:idUser, :montant)");
        $stmt->execute([
            'idUser' => $idUser,
            'montant' => $montant
        ]);
        $idDepot = $this->db->lastInsertId();
        $stmt = $this->db->prepare("INSERT INTO depot_en_cours (idDepot, status) VALUES (:idDepot, 'en attente')");
        $stmt->execute([
            'idDepot' => $idDepot
        ]);
        return ['success' => true, 'idDepot' => $idDepot];
    }
    
}
