<?php
namespace App\Models;

use CodeIgniter\Model;

class SuggestionModel extends Model{
    protected $table='suggestion';
    protected $returnType = 'App\Entities\Suggestion';
    protected $allowedFields =['nom_utilisateur','email','date','sujet','description'];
}

?>