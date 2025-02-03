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
}
