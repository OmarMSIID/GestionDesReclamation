<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Observation extends Entity
{
    protected $attributes = [
        'id' => null,
        'nom_utilisateur' => null,
        'email' => null,
        'description' => null,
    ];
    // getters et setters pour nom d'utilisateur
    public function setNomUtilisateur(string $nom_utilisateur)
    {
        $this->attributes['nom_utilisateur'] = $nom_utilisateur;
    }
    public function getNomUtilisateur(){
        return $this->attributes['nom_utilisateur'];
    }

    // getters et setters pour l'email
    public function setEmail(string $email)
    {
        $this->attributes['email'] = $email;
    }
    public function getEmail(){
        return $this->attributes['email'];
    }
    
    // getters et setters pour description
    public function setDescription(string $description)
    {
        $this->attributes['description'] = $description;
    }
    public function getDescription(){
        return $this->attributes['description'];
    }
}
