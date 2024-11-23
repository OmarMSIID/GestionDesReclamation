<?php

namespace App\Controllers;

use App\Models\ObservationModel;
use App\Entities\Observation;
use DateTime;

class ObservationController extends BaseController
{
    public function index(): string
    {
        return view('user_interfaces/Soumettre_Forms/Soumettre_Observation');
    }

    public function ajouterObservation()
    {
        $observationModel = new ObservationModel();
        $observation = new Observation();

        $observation->nom_utilisateur = $this->request->getPost('nom_utilisateur');
        $observation->email = $this->request->getPost('email');
        $observation->setDate(new DateTime());
        $observation->sujet = $this->request->getPost('sujet');
        $observation->description = $this->request->getPost('description');

        $validation = \Config\Services::Validation();
        $validation->setRules([
            'nom_utilisateur' => 'required',
            'email' =>'required|valid_email',
            'sujet' => 'required|min_length[3]',
            'description' => 'required|min_length[15]',
        ]);

        // Sauvegarder dans la base de données
        if($this->validate($validation->getRules())){
            if ($observationModel->save($observation)) {
                return view('user_interfaces/Soumettre_Forms/Soumettre_Observation', ['showSuccessModal' => true]);
            } else {
                return redirect()->back()->with('error', "Échec de l'ajout d'une observation" . implode(', ', $observationModel->errors()));
            }
        }else{
            return redirect()->back()->withInput()->with("error","Les informations que vous avez fournies ne sont pas valides");
        }
    }

    public function afficher_observations()
    {
        $session=session();
        if(!$session->get("logged")){
            return redirect()->to("/Connexion-Connexion-admin");
        }
        $observationModel = new ObservationModel();
        $data['observations'] = $observationModel->findAll();
        
        return view('admin_interfaces/Gestion_Observation', $data);
    }

    public function supprimer_observation($id)
    {
        $session=session();
        if(!$session->get("logged")){
            return redirect()->to("/Connexion-Connexion-admin");
        }
        $observationModel = new ObservationModel();
        if ($observationModel->delete($id)) {
            return redirect()->to('/Liste_Observations')->with('success', 'Observation supprimée.');
        } else {
            return redirect()->to('/Liste_Observations')->with('error', 'Échec de la suppression.');
        }
    }
}
