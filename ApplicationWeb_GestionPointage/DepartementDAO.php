<?php
class DepartementDAO{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=gestionpointage","root","");
    }
    public function addDepartement($d){
        $reqPre = $this->pdo->prepare("INSERT INTO departement (Num, Nom, Descr) VALUES(:Nu, :Nm, :D)");
        $reqPre->execute(array( ":Nu"=>$d->getNum(),":Nm"=>$d->getNom(), ":D"=>$d->getDescr()));
    }
    public function removeDepartement($NumDep){
        $reqPre = $this->pdo->prepare("DELETE FROM departement WHERE Num = :ND");
        $reqPre->execute(array( ":ND"=>$NumDep));
    }
    // modif
    public function editDepartement($Num,$d){
        $reqPre = $this->pdo->prepare("update departement set Nom = :N, Descr = :D where Num = :Nm");
        $reqPre->execute(array(":N"=>$d->getNom(),":D"=>$d->getDescr(),":Nm"=>$Num));
    }



    public function getAllDepartement(){
        $reqPre = $this->pdo->prepare("SELECT * FROM Departement");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute();
        return $reqPre->fetchAll();
    }

    public function getSearchedDepartement($filter){
        $reqPre = $this->pdo->prepare("SELECT * FROM Departement WHERE Num LIKE :F  OR Descr LIKE :F ");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":F"=>"%".$filter."%"));
        return $reqPre->fetchAll();
    }
    public function getDepartementByNum($Num){
        $reqPre = $this->pdo->prepare("SELECT * FROM departement WHERE Num = :Nm");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":Nm"=>$Num));
        $listF = $reqPre->fetchAll();
        return $listF[0];
    }
}