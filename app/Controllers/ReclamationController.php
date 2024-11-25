<?php

namespace App\Controllers;

use App\Models\ReclamationModel;
use App\Models\RefusedClaimModel;
use Dompdf\Dompdf;

class ReclamationController extends BaseController
{
    public function fillClaim()
    {
        $session = session();
        $session->destroy();
        return view('user_interfaces/Soumettre_Forms/Soumettre_Reclamation');
    }

    public function addClaim()
    {
        $model = new ReclamationModel();
        $file = $this->request->getFile('photo');
        $rules = [
            'email' => 'required|valid_email',
            'sujet' => 'required|min_length[5]',
            'nom_utilisateur' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('inValid', 'invalid data');
        }

        if ($file->isValid() && !$file->hasMoved()) {
            // Génération d'un ID unique
            $generated_id = $this->genererIdUnique($model);

            $imageName = $file->getRandomName();
            $file->move('photos/', $imageName);

            $reclamation = new \App\Entities\Reclamation();
            $reclamation->setNomUtilisateur($this->request->getPost('nom_utilisateur'));
            $reclamation->setSujet($this->request->getPost('sujet'));
            $reclamation->setEmail($this->request->getPost('email'));
            $reclamation->setDescription($this->request->getPost('description'));
            $reclamation->setStatus();
            $reclamation->setDate();
            $reclamation->setPhoto($imageName);
            $reclamation->setGenerated_id($generated_id);

            
            $model->save($reclamation);

            // Affichage de la vue de confirmation
            return view('reclamations/confirmation', ['generated_id' => $generated_id]);
        } else {
            $session = session();
            $session->setFlashdata('failed', 'The image is not valid');

            return redirect()->to('/');
        }
    }

    public function claimList()
    {
        $session = session();
        $model = new ReclamationModel();

        if ($session->get("logged")) {
            //5 reclamations par page
            $data['claims'] = $model->paginate(4, 'default');
            $data['pager'] = $model->pager;
            return view('admin_interfaces/listDeReclamation', $data);
        } else {
            return redirect()->to("/Connexion-Connexion-admin");
        }
    }

    public function viewClaim($id)
    {
        $session = session();
        $model = new ReclamationModel();

        if ($session->get("logged")) {
            return view('admin_interfaces/reclamationInfo', ['claim' => $model->find($id)]);
        } else {
            return redirect()->to("/Connexion-Connexion-admin");
        }
    }

    public function deleteClaim($id)
    {
        $refuseModel = new RefusedClaimModel();
        $model = new ReclamationModel();
        $reclamation = $model->find($id);
        $reclamation->setStatus("REFUSE");
        $model->save($reclamation);

        $refuseModel->save(['reason' => $reclamation->getSujet()]);

        $email = \Config\Services::email();
        $email->setTo($reclamation->getEmail());
        $email->setFrom('omar.bhai2015@gmail.com');
        $email->setSubject("Mise à jour de votre demande de réclamation");

        $message = "Cher/Chère " . $reclamation->getNomUtilisateur() . ".<br><br>";
        $message .= "Nous regrettons de vous informer qu'après un examen attentif, votre demande de réclamation (ID : {$id}) a été refusée. ";
        $message .= "Sachez que nous avons pris en compte toutes les informations fournies, mais malheureusement, votre demande ne répond pas à nos critères d'approbation.<br><br>";
        $message .= "Si vous avez des questions ou besoin de plus d'informations, n'hésitez pas à contacter notre équipe de support.<br><br>";
        $message .= "Merci pour votre compréhension.<br><br>";
        $message .= "Cordialement,<br>";
        $message .= "L'équipe de support";

        $email->setMessage($message);

        $boolean = $model->delete($id);

        if ($boolean) {
            $email->send();
            return redirect()->to("admin/List_Reclamation");
        } else {
            return "error!!";
        }
    }

    public function accepteClaim($id)
    {
        $model = new ReclamationModel();
        $reclamation = $model->find($id);
        if($reclamation->getStatus()=="ACCEPTE"){
            return redirect()->to("admin/List_Reclamation")->with('error','ce reclamation deja accepter');
        }
        $reclamation->setStatus("ACCEPTE");
        $model->save($reclamation);

        $email = \Config\Services::email();
        $email->setTo($reclamation->getEmail());
        $email->setFrom('omar.bhai2015@gmail.com');
        $email->setSubject("Votre demande de réclamation a été acceptée");

        $message = "Cher/Chère " . $reclamation->getNomUtilisateur() . ",<br><br>";
        $message .= "Nous avons le plaisir de vous informer que votre demande de réclamation (ID : {$id}) a été acceptée. ";
        $message .= "Notre équipe a examiné votre demande avec attention et a décidé de l'approuver. Nous allons maintenant procéder aux prochaines étapes pour traiter votre réclamation.<br><br>";
        $message .= "Si vous avez des questions ou besoin de plus d'informations, n'hésitez pas à nous contacter.<br><br>";
        $message .= "Merci de votre confiance.<br><br>";
        $message .= "Cordialement,<br>";
        $message .= "L'équipe de support";

        $email->setMessage($message);

        if ($email->send()) {
            return redirect()->to("admin/List_Reclamation");
        } else {
            return "Erreur lors de l'envoi de l'email!";
        }
    }

    public function getDashboard()
    {
        $session = session();

        if ($session->get("logged")) {
            return view('/admin_interfaces/dashboard');
        } else {
            return redirect()->to("/Connexion-Connexion-admin");
        }
    }

    //------------generate pdf ----------------//

    public function generatePdf($data, $fileName)
    {
        $dompdf = new Dompdf();
        $resp = [
            "claim" => $data,
        ];
        $html = view('loadPdf', $resp);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents(WRITEPATH . 'uploads/' . $fileName, $output);
        return WRITEPATH . 'uploads/' . $fileName;
    }

    // Générer un ID unique
    private function genererIdUnique($model)
    {
        do {
            $generated_id = strtoupper(bin2hex(random_bytes(4)));
        } while ($model->where('generated_id', $generated_id)->first());
        return $generated_id;
    }

    // Télécharger le PDF pour suivre une réclamation
    public function telechargerPdf($generated_id)
    {
        $model = new ReclamationModel();
        $reclamation = $model->where('generated_id', $generated_id)->first();

        if (!$reclamation) {
            return redirect()->to('/')->with('error', 'Réclamation introuvable.');
        }

        // Générer le contenu du PDF pour suivre la réclamation
        $dompdf = new Dompdf();
        $html = view('reclamations/pdf', ['reclamation' => $reclamation]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('reclamation_' . $generated_id . '.pdf', ['Attachment' => 1]);
    }
}
