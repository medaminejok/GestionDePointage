<?php


class Fonction
{
    private $code;
    private $nom;
    private $montant;
    public function __construct($code ="", $nom ="", $montant ="")
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->montant = $montant;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getMontant()
    {
        return $this->montant;
    }
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

}
?>