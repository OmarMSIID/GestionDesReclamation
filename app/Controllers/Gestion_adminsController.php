<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Entities\Admin;

class Gestion_adminsController extends BaseController
{
    public function index(): string
    {
        return view('admin_interfaces/Ajouter_admins.php');
    }
    public function ajouterAdmin()
    {
        $adminModel = new AdminModel();
        $admin = new Admin();


        $admin->email = $this->request->getPost('email');
        $admin->nom_utilisateur = $this->request->getPost('nom_utilisateur');
        $mot_de_passe = $this->request->getPost('mot_de_passe');

        $validation = \Config\Services::Validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'nom_utilisateur' =>'required',
            'mot_de_passe' => 'required|min_length[8]',
        ]);

        if ($this->validate($validation->getRules()) && is_string($mot_de_passe) && !empty($mot_de_passe)) {
            $admin->setMotDePasse($mot_de_passe);

            // Sauvegarder dans la base de données
            if ($adminModel->save($admin)) {
                return view('admin_interfaces/Ajouter_admins.php', ['showSuccessModal' => true]);
            } else {
                return redirect()->back()->with('error', 'Failed to add admin: ' . implode(', ', $adminModel->errors()));
            }
        }else{
            return redirect()->back()->withInput()->with("error","Email : L'adresse email doit être valide."."<br>"."Mot de passe : le mot de passe doit contenir au moins 8 caractères.");
        }
    }

    public function afficher_admins()
    {
        $session=session();
        if(!$session->get("logged")){
            return redirect()->to("/Connexion-Connexion-admin");
        }
        $adminModel = new AdminModel();
        $data['admins'] = $adminModel->findAll();
        
        return view('admin_interfaces/Gestion_admins', $data);
    }

    public function supprimer_admin($id)
    {
        $session=session();
        if(!$session->get("logged")){
            return redirect()->to("/Connexion-Connexion-admin");
        }
        $adminModel = new AdminModel();
        if ($adminModel->delete($id)) {
            return redirect()->back()->with("success", "Admin supprimée.");
        } else {
            return redirect()->to('/Liste_Admins')->with('error', 'Échec de la suppression.');
        }
    }

    public function modifier_admin($id)
    {
        $session=session();
        if(!$session->get("logged")){
            return redirect()->to("/Connexion-Connexion-admin");
        }
        $adminModel = new AdminModel();
        $admin = $adminModel->find($id);

        if (!$admin) {
            return redirect()->to('/Liste_Admins')->with('error', 'Admin introuvable.');
        }
            $admin->email = $this->request->getPost('email');
            $admin->nom_utilisateur = $this->request->getPost('nom_utilisateur');

            if ($adminModel->save($admin)) {
                return redirect()->to('/Liste_Admins')->with('success', 'Admin modifié avec succès.');
            } else {
                return redirect()->back()->with('error', 'Erreur lors de la modification de l\'admin.');
            }
        

        return view('admin_interfaces/Modifier_admin', ['admin' => $admin]);
    }
}
