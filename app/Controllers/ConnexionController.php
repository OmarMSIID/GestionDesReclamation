<?php

namespace App\Controllers;
use App\Models\AdminModel;

class ConnexionController extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Connexion');
    }

    public function Connexion() {
        $email = $this->request->getPost('email');
        $mot_de_passe = $this->request->getPost('password');

        $check_admin_model = new AdminModel();
        
        $utilisateur = $check_admin_model->where('email', $email)->first();
    
        if ($utilisateur !== null && is_string($mot_de_passe) && !empty($mot_de_passe)) {
            if (password_verify($mot_de_passe, $utilisateur->mot_de_passe)) {
                $session = session();
                $session->regenerate();
                $session->set("logged", true);
                $session->set("nom_utilisateur", $utilisateur->nom_utilisateur);
                return redirect()->to('admin/list');
            } else {
                return redirect()->back()->withInput()->with("error","E-mail ou mot de passe incorrecte !");
            }
        }
    }
    
}