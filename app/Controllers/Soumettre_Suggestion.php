<?php

namespace App\Controllers;

class Soumettre_Suggestion extends BaseController
{
    public function index(): string
    {
        return view('Soumettre_Forms/Soumettre_Suggestion');
    }
}