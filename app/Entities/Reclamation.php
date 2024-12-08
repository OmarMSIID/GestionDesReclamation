<?php

namespace App\Entities;

use App\Enums\ClaimStatus;
use CodeIgniter\Entity\Entity;

class Reclamation extends Entity{

    protected $attributes = [
        'nom_utilisateur' => null,
        'sujet'          => null,
        'email'          => null,
        'description'    => null,
        'status'         => null,
        'date'           =>null,
        'photo'          => null,
        'generated_id'   => null,
    ];

    
    public function setNomUtilisateur(string $nom)
    {
        $this->attributes['nom_utilisateur'] = ucfirst($nom);
        return $this;
    }

    public function setSujet(string $sujet)
    {
        $this->attributes['sujet'] = ucfirst($sujet);
        return $this;
    }

    public function setEmail(string $email)
    {
        $this->attributes['email'] = strtolower($email);
        return $this;
    }

    public function setDescription(string $description)
    {
        $this->attributes['description'] = ucfirst($description);
        return $this;
    }

    public function setPhoto(string $photo)
    {
        $this->attributes['photo'] = $photo;
        return $this;
    }

    public function setStatus(string $status="EN_COUR_DE_TRAITEMENT" )
    {
        $this->attributes['status'] = $status;
        return $this;
    }

    public function setGenerated_id(string $generated_id )
    {
        $this->attributes['generated_id'] = $generated_id;
        return $this;
    }


    public function getNomUtilisateur(): ?string
    {
        return $this->attributes['nom_utilisateur'];
    }

    public function getSujet(): ?string
    {
        return $this->attributes['sujet'];
    }

    public function getEmail(): ?string
    {
        return $this->attributes['email'];
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    public function getStatus(): ?string
    {
        return $this->attributes['status'];
    }

    public function setDate(){
        $this->attributes['date']=date('Y-m-d');
        return $this;
    }

    public function getGeneratedId(){
        return $this->attributes['generated_id'];
    }

    public function getDate(){
        return $this->attributes['date'];
    }

    public function getPhoto(): ?string
    {
        return $this->attributes['photo'];
    }


}
?>