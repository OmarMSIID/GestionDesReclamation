<?php
namespace App\Models;

use CodeIgniter\Model;

class ReclamationModel extends Model{
    protected $table='reclamation';

    protected $primaryKey='id';
    protected $allowedFields =['sujet','nom_utilisateur','description','email','status','photo'];
}

?>