<?php


namespace App\Controllers;

use App\Models\ReclamationModel;

class ReclamationController extends BaseController
{
    public function fillClaim()
    {
        return view('user_interfaces/Reclamation_form');
    }

    public function addClaim(){
        $model=new ReclamationModel();
        $file=$this->request->getFile('photo');

        if($file->isValid()&& !$file->hasMoved()){
            $imageName=$file->getRandomName();
            $file->move('photos/',$imageName);
            $data=[
                'nom_utilisateur'=>$this->request->getPost('username'),
                'sujet'=>$this->request->getPost('sujet'),
                'email'=>$this->request->getPost('email'),
                'description'=>$this->request->getPost('description'),
                'status'=>'no traiter',
                'photo'=>$imageName
            ];
    
            $model->insert($data);
            return redirect()->to('/reclamation');
        }
        else{
            echo 'error??';
        }
       
    }

    public function claimList(){
        $model=new ReclamationModel();
        $data['claims']=$model->findAll();
        return view('admin_interfaces/listDeReclamation',$data);
    }

    public function viewClaim($id){
        $model=new ReclamationModel();
        $data=$model->find($id);
        $data['status']='observer';
        $model->save($data);
        $resp['claim']=$data;
        echo $data['id'].'<br> '.$data['status'];
    }



}



?>