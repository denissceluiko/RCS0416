<?php

namespace App\Models;

class Model
{
    public \mysqli $db;

    public function __construct()
    {
        $this->db = new \mysqli('db', 'user', 'secret', 'rcs16-db');
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function cleanup($value): string
    {
        if (!isset($value)) 
            return '';

        $value = strip_tags($value);
        $value = $this->db->real_escape_string($value);

        return $value;
    }
}