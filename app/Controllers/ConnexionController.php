<?php

namespace App\Controllers;

class ConnexionController extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Connexion');
    }
}