<?php

namespace App\Models;

class Model
{
    protected static string $table = '';
    protected \mysqli $db;

    public function __construct()
    {
        $this->db = new \mysqli('db', 'user', 'secret', 'rcs16-db');
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function store(array $data)
    {
        $columns = array_keys($data);
        $values = array_values($data);

        $query = "INSERT INTO `".static::getTable()."` ";
        $query .= "(".implode(', ', $columns).")";
        $query .= ' VALUES ';
        $query .= ' ('.implode(', ', array_fill(0, count($columns), '?')).') ';
    
        $stmt = $this->db->prepare($query);

        $stmt->bind_param(str_repeat('s', count($columns)), ...$values);
        $stmt->execute();
    }

    public function update(array $data)
    {
        $id = $data['id'] ?? null;
        unset($data['id']);

        if ($id === null) {
            return;
        }

        $updateables = [];

        foreach ($data as $key => $value) {
            $updateables[] = "`$key` = ?";
        }

        $fillables = [...array_values($data), $id];
        
        $query = "UPDATE `".static::getTable()."` ";
        $query .= 'SET '.implode(', ', $updateables).' WHERE `id` = ?';
    
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(str_repeat('s', count($data) + 1), ...$fillables);
        $stmt->execute();
    }

    public function delete(int|string $id)
    {
        $stmt = $this->db->prepare('DELETE FROM `'.static::getTable().'` WHERE `id` = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();
    }

    public function find(int|string $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM `'.static::getTable().'` WHERE `id` = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            return null;
        }

        return $result->fetch_assoc();
    }

    public function all(): array
    {
        $stmt = $this->db->prepare('SELECT * FROM '.static::getTable());
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getTable(): string
    {
        return static::$table ?? '';
    }

    public function cleanup($value): string
    {
        if (!isset($value)) 
            return '';

        $value = strip_tags($value);
        // $value = $this->db->real_escape_string($value);

        return $value;
    }
}