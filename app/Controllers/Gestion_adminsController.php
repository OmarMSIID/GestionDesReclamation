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
        if (is_string($mot_de_passe) && !empty($mot_de_passe)) {
            $admin->setMotDePasse($mot_de_passe);
        } else {
            return redirect()->back()->with('error', 'Password is required.');
        }
        // Sauvegarder dans la base de données
        if ($adminModel->save($admin)) {
            return view('admin_interfaces/Ajouter_admins.php', ['showSuccessModal' => true]);
        } else {
            return redirect()->back()->with('error', 'Failed to add admin: ' . implode(', ', $adminModel->errors()));
        }
    }
}
