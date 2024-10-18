<?php
namespace App\Models;

use CodeIgniter\Model;

class SuggestionModel extends Model{
    protected $table='suggestion';
    protected $allowedFields =['title','nom_utilisateur','description','date'];
}

?>