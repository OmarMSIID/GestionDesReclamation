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
        $rules = [
            'nom_utilisateur' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'sujet' => 'required|min_length[3]',
            'description' => 'required|min_length[10]'
        ];
        if ($this->validate($rules)) {
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
        else{
            return redirect()->back()->with('error', "Échec de l'ajout d'une suggestion" );
        }
    }
}
