<?php

namespace App\Controllers;

class Statistiques extends BaseController{
    public function index(): string
    {
        return view("Statistiques.php");
    }
}