<?php

namespace App\Controllers;

class Soumettre_Observation extends BaseController
{
    public function index(): string
    {
        return view('Soumettre_Forms/Soumettre_Observation');
    }
}