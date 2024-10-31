<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    protected $table='admin';
    protected $returnType = 'App\Entities\Admin';
    protected $allowedFields =['email','nom_utilisateur','mot_de_passe'];
}

?>