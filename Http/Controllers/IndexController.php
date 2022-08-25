<?php

namespace App\Http\Controllers;

use App\Models\Tasks;

class IndexController
{
    public function index()
    {
        $model = new Tasks();
        $data = [
            'tasks' => $model->paginate()
        ];

        view('home.php', $data);
    }
}