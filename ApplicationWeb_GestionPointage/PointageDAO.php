<?php
class PointageDAO
{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=gestionpointage","root","");
    }
    public function addPointage($P){
        $reqPre = $this->pdo->prepare("INSERT INTO pointage ( Date_P, Heure_P,Type_P) VALUES(:D, :H, :T)");
        $reqPre->execute(array(":D"=>$P->getDateP(), ":H"=>$P->getHeureP(), ":T"=>$P->getTypeP()));
    }
    public function removePointage($IdPointage){
        $reqPre = $this->pdo->prepare("DELETE FROM pointage WHERE Id_P = :IP");
        $reqPre->execute(array( ":IP"=>$IdPointage));
    }
    public function editPointage($id,$P){
        $reqPre = $this->pdo->prepare("update pointage set Date_P= :dp, Heure_P = :hp , Type_P= :tp where Id_P = :id");
        $reqPre->execute(array(":dp"=>$P->getDateP(), ":hp"=>$P->getHeureP(), ":tp"=>$P->getTypeP(),":id"=>$id));
    }

    public function getAllPointage(){
        $reqPre = $this->pdo->prepare("SELECT * FROM pointage");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute();
        return $reqPre->fetchAll();
    }

    public function getSearchedPointage($filter){
        $reqPre = $this->pdo->prepare("SELECT * FROM pointage WHERE Id_P LIKE :F OR Date_P LIKE :F OR Heure_P LIKE :F OR Type_P like :F");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":F"=>"%".$filter."%"));
        return $reqPre->fetchAll();
    }
    public function getPointageById($id){
        $reqPre = $this->pdo->prepare("SELECT * FROM pointage WHERE Id_P = :id");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":id"=>$id));
        $listP = $reqPre->fetchAll();
        return $listP[0];
    }
}

?>
