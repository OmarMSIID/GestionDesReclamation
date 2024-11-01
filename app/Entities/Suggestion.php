<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;
use DateTime;

class Suggestion extends Entity
{
    protected $attributes = [
        'id' => null,
        'nom_utilisateur' => null,
        'email' => null,
        'date' => null,
        'sujet' => null,
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

    // getters et setters pour date
    public function setDate(DateTime $date)
    {
        $this->attributes['date'] = $date->format('Y-m-d H:i:s');
    }
    public function getDate(){
        return $this->attributes['date'];
    }

    // getters et setters pour sujet
    public function setSujet(string $sujet)
    {
        $this->attributes['sujet'] = $sujet;
    }
    public function getSujet(){
        return $this->attributes['sujet'];
    }
}
