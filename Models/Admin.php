<?php

namespace App\Models;

class Admin
{
    public function check($data)
    {
        if($data['login'] === 'admin' && md5($data['password']) === '202cb962ac59075b964b07152d234b70') {
            return true;
        }

        return false;
    }

    public function login()
    {
        $_SESSION['login']  = true;
    }
}