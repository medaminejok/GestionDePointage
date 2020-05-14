<?php


class CategorieDAO
{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=gestionpointage","root","");
    }
    public function addCategorie($c){
        $reqPre = $this->pdo->prepare("INSERT INTO categorie (code , libelle, salaire) VALUES(:cde, :lb, :d)");
        $reqPre->execute(array( ":cde"=>$c->getCode(),":lb"=>$c->getLibelle(), ":d"=>$c->getSalaire()));
    }
    public function editCategorie($cde,$c){
        $reqPre = $this->pdo->prepare("update categorie set libelle = :lb, salaire = :d where code = :cde");
        $reqPre->execute(array(":lb"=>$c->getLibelle(),":d"=>$c->getSalaire(),":cde"=>$cde));
    }
    public function removeCategorie($codeCategorie){
        $reqPre = $this->pdo->prepare("DELETE FROM categorie WHERE code = :cde");
        $reqPre->execute(array( ":cde"=>$codeCategorie));
    }

    public function getAllCategorie(){
        $reqPre = $this->pdo->prepare("SELECT * FROM categorie");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute();
        return $reqPre->fetchAll();
    }

    public function getSearchedCategorie($filter){
        $reqPre = $this->pdo->prepare("SELECT * FROM categorie WHERE code LIKE :f OR salaire LIKE :f");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":f"=>"%".$filter."%"));
        return $reqPre->fetchAll();
    }

    public function getCategorieByCode($code){
        $reqPre = $this->pdo->prepare("SELECT * FROM categorie WHERE code = :cde");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":cde"=>$code));
        $listF = $reqPre->fetchAll();
        return $listF[0];
    }
}