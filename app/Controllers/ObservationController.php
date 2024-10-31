<?php

namespace App\Controllers;

class ObservationController extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Soumettre_Forms/Soumettre_Observation');
    }
}