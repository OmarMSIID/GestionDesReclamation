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

        $validation = \Config\Services::Validation();
        $validation->setRules([
            'nom_utilisateur' => 'required',
            'email' =>'required|valid_email',
            'sujet' => 'required|min_length[3]',
            'description' => 'required|min_length[15]',
        ]);

        // Sauvegarder dans la base de données
        if($this->validate($validation->getRules())){
            if ($suggestionModel->save($suggestion)) {
                return view('user_interfaces/Soumettre_Forms/Soumettre_Suggestion', ['showSuccessModal' => true]);
            } else {
                return redirect()->back()->with('error', "Échec de l'ajout d'une suggestion" . implode(', ', $suggestionModel->errors()));
            }
        }else{
            return redirect()->back()->withInput()->with("error","Les informations que vous avez fournies ne sont pas valides");
        }
    }
    public function afficher_suggestions()
    {
        $suggestionModel = new SuggestionModel();
        $data['suggestions'] = $suggestionModel->findAll();
        
        return view('admin_interfaces/Gestion_Suggestion', $data);
    }

    public function supprimer_suggestion($id)
    {
        $suggestionModel = new SuggestionModel();
        if ($suggestionModel->delete($id)) {
            return redirect()->to('/Liste_Suggestions')->with('success', 'Suggestion supprimée.');
        } else {
            return redirect()->to('/Liste_Suggestions')->with('error', 'Échec de la suppression.');
        }
    }
}
