<?php
namespace App\Models;

use CodeIgniter\Model;

class ObservationModel extends Model{
    protected $table='observation';
    protected $returnType = 'App\Entities\Observation';
    protected $allowedFields =['nom_utilisateur','email','date','sujet','description'];
}

?>