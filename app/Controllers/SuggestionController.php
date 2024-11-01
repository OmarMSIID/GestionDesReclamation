<?php

namespace App\Controllers;

use App\Models\SuggestionModel;
use App\Entities\Suggestion;
use DateTime;

class SuggestionController extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Soumettre_Forms/Soumettre_Suggestion');
    }

    public function ajouterSuggestion()
    {
        $suggestionModel = new SuggestionModel();
        $suggestion = new Suggestion();

        $suggestion->nom_utilisateur = $this->request->getPost('nom_utilisateur');
        $suggestion->email = $this->request->getPost('email');
        $suggestion->setDate(new DateTime());
        $suggestion->sujet = $this->request->getPost('sujet');
        $suggestion->description = $this->request->getPost('description');
        
        // Sauvegarder dans la base de données
        if ($suggestionModel->save($suggestion)) {
            return view('user_interfaces/Soumettre_Forms/Soumettre_Suggestion', ['showSuccessModal' => true]);
        } else {
            return redirect()->back()->with('error', "Échec de l'ajout d'une suggestion" . implode(', ', $suggestionModel->errors()));
        }
    }
}