<?php
namespace App\Models;

use CodeIgniter\Model;

class SuggestionModel extends Model{
    protected $table='suggestion';
    protected $allowedFields =['sujet','nom_utilisateur','description','date'];
}

?>