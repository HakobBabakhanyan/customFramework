<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class LoginController
{
    public function index()
    {
        view('login.php');
    }

    public function login()
    {
        $admin = new Admin();
        if ($admin->check($_POST)) {
            $admin->login();
        }

        header('Location: /');
    }
}