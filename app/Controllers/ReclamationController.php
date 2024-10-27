<?php


namespace App\Controllers;

use App\Models\ReclamationModel;
use Dompdf\Dompdf;


class ReclamationController extends BaseController
{
    public function fillClaim()
    {
        return view('user_interfaces/Reclamation_form');
    }

    public function addClaim()
    {
        $model = new ReclamationModel();
        $file = $this->request->getFile('photo');
        $rules = [
            'email' => 'required|valid_email',
            'sujet' => 'required|min_length[5]',
            'username' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('inValid', 'invalid data ');
        }

        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('photos/', $imageName);
            $data = [
                'nom_utilisateur' => $this->request->getPost('username'),
                'sujet' => $this->request->getPost('sujet'),
                'email' => $this->request->getPost('email'),
                'description' => $this->request->getPost('description'),
                'status' => 'no traiter',
                'photo' => $imageName
            ];
            $session = session();
            $session->setFlashdata('succ', 'votre reclamation a ajoute .');
            $model->insert($data);
            $email = \config\Services::email();
            $email->setTo($data['email']);
            $email->setFrom('omar.bhai2015@gmail.com');
            $email->setSubject("Reclamation .");
            $email->setMessage("bonjour ".$data['nom_utilisateur']."<br> votre réclamation a envoyée avec succés .<br> <br> a la date : ".date('Y-m-d H:i:s').".");
            $fileName='reclamation de '.$data['nom_utilisateur'].'.pdf';
            $filePath=$this->generatePdf($data,$fileName);
            $email->attach($filePath);
            $bole = $email->send();
            if (!$bole) {
                $session->set("email", 'on a un probleme dans email sender ');
            }

            return redirect()->to('/reclamation');
        } else {
            $session = session();
            $session->setFlashdata('failed', 'the image is not valid ');

            return redirect()->to('/reclamation');
        }
    }

    public function claimList()
    {
        $model = new ReclamationModel();
        $data['claims'] = $model->findAll();
        return view('admin_interfaces/listDeReclamation', $data);
    }

    public function viewClaim($id)
    {
        $model = new ReclamationModel();
        $data = $model->find($id);
        $data['status'] = 'observer';
        $model->save($data);
        echo $data['id'] . '<br> ' . $data['status'];
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
