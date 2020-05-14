<?php

class Categorie
{
    private $Code;
    private $Libelle;
    private $Salaire;
    public function __construct($Code,$Libelle,$Salaire)
    {
        $this->Code = $Code;
        $this->Libelle = $Libelle;
        $this->Salaire = $Salaire;
    }

    public function getCode()
    {
        return $this->Code;
    }

    public function setCode($Code)
    {
        $this->Code = $Code;
    }

    public function getLibelle()
    {
        return $this->Libelle;
    }

    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;
    }

    public function getSalaire()
    {
        return $this->Salaire;
    }

    public function setSalaire($Salaire)
    {
        $this->Salaire = $Salaire;
    }

}