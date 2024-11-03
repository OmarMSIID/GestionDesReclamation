<?php

namespace App\Controllers;

class Connexion extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Connexion');
    }
}