<?php

namespace App\Controllers;


class SuivreReclamationController extends BaseController
{
    public function afficher_formulaire()
    {
        return view('user_interfaces/Suivre_Reclamation');
    }

    public function verifierEtatReclamation()
{
    $validation = \Config\Services::validation();

    $rules = [
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'L\'email est requis.',
                'valid_email' => 'Veuillez entrer un email valide.',
            ],
        ],
        'generated_id' => [
            'rules' => 'required|min_length[8]|max_length[8]',
            'errors' => [
                'required' => 'Le Reclamation_ID est requis.',
                'min_length' => 'Le Reclamation_ID doit contenir exactement 8 caractères.',
                'max_length' => 'Le Reclamation_ID doit contenir exactement 8 caractères.',
            ],
        ],
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('error', $validation->listErrors());
    }

    $email = $this->request->getPost('email');
    $generated_id = $this->request->getPost('generated_id');
    $model = new \App\Models\ReclamationModel();
    $model_refusee = new \App\Models\RefusedClaimModel();

    // Rechercher la reclamation 
    $reclamation = $model->where('email', $email)->where('generated_id', $generated_id)->first();
    $reclamation_refusee = $model_refusee->where('generated_id', $generated_id)->first();

    if ($reclamation) {
        // Rediriger vers la vue appropriee en fonction du statut
        switch ($reclamation->status) {
            case 'ACCEPTE':
                return view('user_interfaces/StatusReclamation/accepte', ['reclamation' => $reclamation]);
            case 'EN_COUR_DE_TRAITEMENT':
                return view('user_interfaces/StatusReclamation/en_cour_de_traitement', ['reclamation' => $reclamation]);
            default:
                return redirect()->back()->with('error', 'Statut inconnu.');
        }
    }else if($reclamation_refusee){
        return view('user_interfaces/StatusReclamation/refuse', ['reclamation' => $reclamation]);
    }
    else {
        return redirect()->back()->with('error', 'Réclamation introuvable.');
    }
}

}