<?php


namespace App\Controllers;

use App\Models\ReclamationModel;
use App\Entities\Reclamation;
use Config\App;
use Dompdf\Dompdf;
use Masterminds\HTML5\Entities;

class ReclamationController extends BaseController
{
    public function fillClaim()
    {
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
            'description' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('inValid', 'invalid data ');
        }

        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('photos/', $imageName);
            $reclamation= new \App\Entities\Reclamation();
            $reclamation->setNomUtilisateur($this->request->getPost('nom_utilisateur'));
            $reclamation->setSujet($this->request->getPost('sujet'));
            $reclamation->setEmail($this->request->getPost('email'));
            $reclamation->setDescription($this->request->getPost('description'));
            $reclamation->setStatus();
            $reclamation->setPhoto($imageName);
            $session = session();
            $session->setFlashdata('succ', 'votre reclamation a ajoute .');
            $model->save($reclamation);
            $email = \config\Services::email();
            $email->setTo($reclamation->getEmail());
            $email->setFrom('omar.bhai2015@gmail.com');
            $email->setSubject("Reclamation .");
            $email->setMessage("bonjour ".$reclamation->getNomUtilisateur()."<br> votre réclamation a envoyée avec succés .<br> <br> a la date : ".date('Y-m-d H:i:s').".");
            $fileName='reclamation de '.$reclamation->getN.'.pdf';
            $filePath=$this->generatePdf($reclamation,$fileName);
            $email->attach($filePath);
            $bole = $email->send();
            if (!$bole) {
                $session->set("email", 'on a un probleme dans email sender ');
            }

            return redirect()->to('/');
        } else {
            $session = session();
            $session->setFlashdata('failed', 'the image is not valid ');

            return redirect()->to('/');
        }
    }

    public function claimList()
    {
        $model = new ReclamationModel();
        
        return view('admin_interfaces/listDeReclamation',['claims'=>$model->findAll()]);
    }

    public function viewClaim($id)
    {
        $model = new ReclamationModel();
        $reclamation= new \App\Entities\Reclamation();
        $reclamation=$model->find($id);
        if(strcmp($reclamation->getStatus(),'observer')==0){
            return view('admin_interfaces/reclamationInfo',['claim'=>$model->find($id)]);

        }
        $reclamation->setStatus('observer');
        $model->save($reclamation);
        return view('admin_interfaces/reclamationInfo',['claim'=>$model->find($id)]);
    }

    //------------generate pdf ----------------//

    public function generatePdf($data,$fileName){
        $dompdf=new Dompdf();
        $resp=[
            "claim"=>$data,
        ];
        $html=view('loadPdf',$resp);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output=$dompdf->output();
        file_put_contents(WRITEPATH.'uploads/'.$fileName,$output);
        return WRITEPATH.'uploads/'.$fileName;
    }
}
