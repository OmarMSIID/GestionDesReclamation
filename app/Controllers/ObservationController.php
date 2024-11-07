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

        // Sauvegarder dans la base de données
        if ($observationModel->save($observation)) {
            return view('user_interfaces/Soumettre_Forms/Soumettre_Observation', ['showSuccessModal' => true]);
        } else {
            return redirect()->back()->with('error', "Échec de l'ajout d'une observation" . implode(', ', $observationModel->errors()));
        }
    }

    public function afficher_observations()
    {
        $observationModel = new ObservationModel();
        $data['observations'] = $observationModel->findAll();
        
        return view('admin_interfaces/Gestion_Observation', $data);
    }

    public function supprimer_observation($id)
    {
        $observationModel = new ObservationModel();
        if ($observationModel->delete($id)) {
            return redirect()->to('/Liste_Observations')->with('success', 'Observation supprimée.');
        } else {
            return redirect()->to('/Liste_Observations')->with('error', 'Échec de la suppression.');
        }
    }
}
