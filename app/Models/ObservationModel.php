<?php
namespace App\Models;

use CodeIgniter\Model;

class ObservationModel extends Model{
    protected $table='observation';
    protected $allowedFields =['title','nom_utilisateur','description','date'];
}

?>