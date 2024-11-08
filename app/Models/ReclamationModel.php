<?php
namespace App\Models;

use CodeIgniter\Model;

class ReclamationModel extends Model{
    protected $table='reclamation';

    protected $primaryKey='id';
    protected $returnType = 'App\Entities\Reclamation';
    protected $allowedFields =['sujet','nom_utilisateur','description','email','status','photo'];

    public function counteRefuseState(){
        $num=$this->where('status','REFUSE')->countAllResults();
        return $num;
    }

    public function counteAcceptedState(){
        $num=$this->where('status','ACCEPTE')->countAllResults();
        return $num;
    }
    
    public function counteEnCourDeTraitemetState(){
        $num=$this->where('status','EN_COUR_DE_TRAITEMENT')->countAllResults();
        return $num;
    }

   
}

?>