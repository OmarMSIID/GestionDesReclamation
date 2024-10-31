<?php

namespace App\Controllers;

class SuggestionController extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Soumettre_Forms/Soumettre_Suggestion');
    }
}