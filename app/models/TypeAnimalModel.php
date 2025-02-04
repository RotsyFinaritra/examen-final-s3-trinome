<?php

namespace app\models;

use Exception;
use Flight;
use PDO;
use PDOException;

class TypeAnimalModel extends BaseModel
{
    private $table = "exam_fin_s3_type_animal";

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllTypeAnimals()
    {
        return $this->findAll($this->table);
    }

    public function getTypeAnimalById($id)
    {
        return $this->findBy($this->table, "id_type_animal", $id);
    }

    public function addTypeAnimal($data)
    {
        return $this->insert($this->table, $data);
    }


    public function updateTypeAnimal($data, $id)
    {
        $fields = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));
        $stmt = $this->db->prepare("UPDATE $this->table SET $fields WHERE id_type_animal = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }
}
