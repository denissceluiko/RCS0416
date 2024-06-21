<?php

namespace App\Models;

use App\Models\Model;

class Article extends Model
{
    public function store(array $data)
    {
        $title = $this->cleanup($data['title']);
        $image = $this->cleanup($data['image']);
        $body = $this->cleanup($data['body']);
    
        $this->db->query("INSERT INTO `articles` (`title`, `image_url`, `body`) VALUES ('$title', '$image', '$body')");
    }

    public function update(array $data)
    {
        $id = $this->cleanup($data['id']);
        $title = $this->cleanup($data['title']);
        $image = $this->cleanup($data['image_url']);
        $body = $this->cleanup($data['contents']);
    
        $this->db->query("UPDATE `articles` SET `title` = '$title', `image_url` = '$image', `body` = '$body' WHERE `id`= $id");
    }

    public function edit($id)
    {
        $id = $this->cleanup($id);
        $editResult = $this->db->query("SELECT * FROM `articles` WHERE `id` = $id");
    
        if (mysqli_num_rows($editResult) > 0) {
            return mysqli_fetch_assoc($editResult);
        }
    
        return [];
    }

    public function delete($id)
    {
        $id = $this->cleanup($id);
        $this->db->query("DELETE FROM `articles` WHERE `id`= $id");
    }

    public function all()
    {
        $result = $this->db->query('SELECT * FROM `articles`');
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}