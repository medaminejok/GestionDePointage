<?php

class Fonction
{
    private $code;
    private $nom;
    private $description;
    public function __construct($code ="", $nom ="", $description="")
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->description = $description;
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

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
?>