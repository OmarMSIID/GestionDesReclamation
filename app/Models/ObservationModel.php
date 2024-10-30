<?php
namespace App\Models;

use CodeIgniter\Model;

class ObservationModel extends Model{
    protected $table='observation';
    protected $allowedFields =['sujet','nom_utilisateur','description','date'];
}

?>