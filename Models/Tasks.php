<?php

namespace App\Models;


class Tasks extends BaseModel
{
    public function insert($data)
    {
        return $this->mysqli->query("INSERT INTO tasks (name,email,text) 
                                        VALUES ('{$data['name']}', '{$data['email']}', '{$data['text']}');");
    }

    public function update($data)
    {
        return $this->mysqli->query("UPDATE tasks  SET text = '{$data['text']}', updated_at = now() where id = {$data['id']}");
    }

    public function updateStatus($data)
    {
        return $this->mysqli->query("UPDATE tasks  SET status = 1, updated_at = now() where id = {$data['id']}");
    }

}