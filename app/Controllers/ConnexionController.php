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

        $validation = \Config\Services::Validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' =>'required|min_length[8]|',
        ]);
        if($this->Validate($validation->getRules())){
            if ($utilisateur !== null && is_string($mot_de_passe) && !empty($mot_de_passe)) {
                if (password_verify($mot_de_passe, $utilisateur->mot_de_passe)) {
                    $session = session();
                    $session->regenerate();
                    $session->set("logged", true);
                    $session->set("nom_utilisateur", $utilisateur->nom_utilisateur);
                    return redirect()->to('admin/dashboard');
                } else {
                    return redirect()->back()->withInput()->with("error","E-mail ou mot de passe incorrecte !");
                }
            }else{
                return redirect()->back()->withInput()->with("error","Cet utilisateur n'existe pas !");
            }
        }else{
            return redirect()->back()->withInput()->with("error","Email doit etre valid"."<br>"."Mot de passe doit contenir au moins 8 caractères.");
        }
    }
    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to("/Connexion-Connexion-admin");
    }
    
}