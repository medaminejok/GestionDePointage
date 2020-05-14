<?php
class Departement{
    private $Num;
    private $Nom;
    private $Descr;

    public function __construct($Num="", $Nom="", $Descr="")
    {
        $this->Num = $Num;
        $this->Nom = $Nom;
        $this->Descr = $Descr;
    }

    public function getNum()
    {
        return $this->Num;
    }

    public function setNum($Num)
    {
        $this->Num = $Num;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }


    public function getDescr()
    {
        return $this->Descr;
    }

    public function setDescr($Descr)
    {
        $this->Descr = $Descr;
    }

}
