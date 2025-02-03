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

    public function updateTypeAnimal($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }
}
