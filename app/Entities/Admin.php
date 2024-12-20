<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Admin extends Entity
{
    protected $attributes = [
        'id' => null,
        'email' => null,
        'nom_utilisateur' => null,
        'mot_de_passe' => null,
        'reinitialisation_id' => null, // Pour stocker l'identifiant unique temporaire
        'role'=>null,
    ];

    public function setMotDePasse(string $password)
    {
        // Hash le mot de passe lors de la définition
        $this->attributes['mot_de_passe'] = password_hash($password, PASSWORD_DEFAULT);
    }
}
