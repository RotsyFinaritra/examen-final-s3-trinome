<?php

namespace app\models;

use Exception;
use Flight;
use PDO;
use PDOException;

class AlimentModel extends BaseModel
{
    private $table = "exam_fin_s3_aliment";

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllAliments()
    {
        return $this->findAll($this->table);
    }

    public function getAlimentById($id)
    {
        return $this->findBy($this->table, "id_aliment", $id);
    }

    public function addAliment($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateAliment($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function getAlimentsByTypeAnimal($idTypeAnimal)
    {
        $sql = "SELECT * FROM $this->table WHERE id_type_animal = :id_type_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id_type_animal" => $idTypeAnimal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalStockAlimentByType($idType)
    {
        $sql = "SELECT SUM(quantite) as total_stock FROM $this->table WHERE id_type_animal = :id_type_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id_type_animal" => $idType]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
