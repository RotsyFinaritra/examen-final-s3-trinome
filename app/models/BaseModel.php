<?php

namespace app\models;

use Exception;
use PDO;
use PDOException;

class BaseModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findBy($table, $columnName, $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE $columnName = :id");
        $data = [
            ":id" => $id
        ];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
            $stmt->execute($data);
            return $this->db->lastInsertId(); // Retourne l'ID de l'élément inséré
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion : " . $e->getMessage());
        }
    }

    public function update($table, $data, $id)
    {
        $fields = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));
        $stmt = $this->db->prepare("UPDATE $table SET $fields WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($table, $id)
    {
        $stmt = $this->db->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
