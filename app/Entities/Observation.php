<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Observation extends Entity
{
    protected $attributes = [
        'id' => null,
        'email' => null,
        'nom_utilisateur' => null,
        'mot_de_passe' => null,
    ];

    public function setMotDePasse(string $password)
    {
        // Hash le mot de passe lors de la définition
        $this->attributes['mot_de_passe'] = password_hash($password, PASSWORD_DEFAULT);
    }
}
