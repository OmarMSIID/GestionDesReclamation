<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    protected $table='admin';
    protected $allowedFields =['nom_utilisateur','mot_de_passe'];
}

?>