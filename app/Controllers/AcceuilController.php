<?php

namespace App\Controllers;

class AcceuilController extends BaseController
{
    public function index(): string
    {
        $session =session();
        $session->destroy();
        return view('Acceuil');
    }
}