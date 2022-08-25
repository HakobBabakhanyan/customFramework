<?php

namespace App\Http\Controllers;

use App\Models\Tasks;

class TaskController
{
    public function index()
    {
        $model = new Tasks();
        $data = $model->paginate();
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($data);
    }

    public function create()
    {
        if (check(['name', 'email', 'text'], $_POST)) {
            $taskModel = new Tasks();
            $taskModel->insert($_POST);
        }

        header('Location: /');
    }

    public function update()
    {
        if (check(['id', 'text'], $_POST) && auth()) {
            $taskModel = new Tasks();
            $taskModel->update($_POST);
        }

        header('Location: /');
    }

    public function updateStatus()
    {
        if (check(['id'], $_POST) && auth()) {
            $taskModel = new Tasks();
            $taskModel->updateStatus($_POST);
        }

        header('Location: /');
    }
}