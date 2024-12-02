<?php

namespace App\Controllers;
use App\Models\AdminModel;

class ConnexionController extends BaseController
{
    public function index(): string
    {
        $session=session();
        $session->destroy();
        return view('admin_interfaces/Connexion');
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
                    if($utilisateur->role==='super_admin'){
                        $session->set('super_admin',true);
                    }
                    $session->set("logged", true);
                    $session->set("nom_utilisateur", $utilisateur->nom_utilisateur);
        
                    return redirect()->to('admin/List_Reclamation');
                } else {
                    return redirect()->back()->withInput()->with("error","E-mail ou mot de passe incorrecte !");
                }
            }else{
                return redirect()->back()->withInput()->with("error","Cet utilisateur n'existe pas!");
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

    public function motDePasseOublie()
    {
        $session=session();
        $session->destroy();
        return view('admin_interfaces/reinitialisation_mot_de_passe');
    }

    public function envoyerLien()
    {
        $email = $this->request->getPost('email');
        $model = new AdminModel();
        $admin = $model->where('email', $email)->first();

        if ($admin) {
            // generation d'un id unique
            $identifiantUnique = uniqid(bin2hex(random_bytes(4)), true);

            // mettre à jour l'identifiant unique pour l'admin
            $admin->reinitialisation_id = $identifiantUnique;
            $model->save($admin);

            // envoyer l'email de reinitialisation
            $email_Env = \Config\Services::email();

            $email_Env->setTo($email);
            $email_Env->setFrom('Gestion-des-reclamations');
            $email_Env->setSubject('Réinitialisation de votre mot de passe');
            
            // creation du lien pour la reinitialisation
            $resetLink = base_url("admin/reinitialiser-mot-de-passe/$identifiantUnique");
            $email_Env->setMessage("Bonjour, <br><br>Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant : <a href=\"$resetLink\">rest link </a>");

            // envoyer email
            if ($email_Env->send()) {
                log_message('info', "Lien de réinitialisation envoyé : " . $resetLink);
                return redirect()->to(base_url('Connexion-Connexion-admin'))->with('success', 'Lien de réinitialisation envoyé avec succès.');
            } else {
                log_message('error', "Échec de l'envoi de l'e-mail de réinitialisation.");
                return redirect()->back()->with('error', 'Erreur lors de l\'envoi du lien de réinitialisation.');
            }
        }

        return redirect()->back()->with('error', 'E-mail non trouvé.');
    }

    public function reinitialiserMotDePasse($identifiantUnique)
    {
        $session=session();
        $session->destroy();
        $model = new AdminModel();
        $admin = $model->where('reinitialisation_id', $identifiantUnique)->first();

        if ($admin) {
            return view('admin_interfaces/nouveau_mot_de_passe', ['identifiant' => $identifiantUnique]);
        }

        return redirect()->to(base_url('Connexion-Connexion-admin'))->with('error', 'Lien de réinitialisation invalide ou expiré.');
    }

    public function mettreAJourMotDePasse()
    {
        $identifiantUnique = $this->request->getPost('identifiant');
        $nouveauMotDePasse = $this->request->getPost('mot_de_passe');

        $validation = \Config\Services::Validation();
        $validation->setRules([
            'mot_de_passe' =>'required|min_length[8]|',
        ]);
        $model = new AdminModel();
        $admin = $model->where('reinitialisation_id', $identifiantUnique)->first();

        if($this->Validate($validation->getRules())){
            if ($admin) {
                $admin->setMotDePasse($nouveauMotDePasse);
                $admin->reinitialisation_id = null; // reinitialiser l'identifiant unique
                $model->save($admin);

                return redirect()->to(base_url('Connexion-Connexion-admin'))->with('success', 'Mot de passe mis à jour avec succès.');
            }

            return redirect()->to(base_url('connexion'))->with('error', 'Erreur lors de la mise à jour du mot de passe.');
        }else{
            return redirect()->back()->withInput()->with("error","Mot de passe doit contenir au moins 8 caractères.");
        }
    }
    
}