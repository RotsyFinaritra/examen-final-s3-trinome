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
}
