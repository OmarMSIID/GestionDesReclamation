<?php

namespace App\Controllers;

class AcceuilController extends BaseController
{
    public function index(): string
    {
        return view('Acceuil');
    }
}