<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Admin extends Entity
{
    protected $attributs = [
        'email' => null,
        'nom_utilisateur' => null,
        'mot_de_passe' => null,
    ];

    public function setMotDePasse(string $password)
    {
        // Hash le mot de passe
        $this->attributs['mot_de_passe'] = password_hash($password, PASSWORD_DEFAULT);
    }
}
