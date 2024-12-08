<?php

namespace App\Models;

use CodeIgniter\Model;

class RefusedClaimModel extends Model{
    protected $table="refused_claims";
    protected $primaryKey='id';
    protected $allowedFields =['generated_id'];

    public function countRefuseClaim(){
        $num=$this->countAllResults();
        return $num;
    }

}