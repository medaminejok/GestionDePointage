<?php

class PointageService{
    private $pDAO;

    public function __construct(){
        $this->pDAO = new PointageDAO();
    }
    public function addPointageService($date,$heure,$type){
        $P = new Pointage('',$date,$heure,$type);
        $this->pDAO->addPointage($P);
    }

    public function editPointageService($oldId,$date,$heure,$type){
        $P = new Pointage('',$date,$heure,$type);
        $this->pDAO->editPointage($oldId, $P);
    }

    public function RemovePointageService($id){
        $this->pDAO->removePointage($id);
    }
    public function getAllPointageService(){
        $listp = $this->pDAO->getAllPointage();
        $listPointageObj = array();
        foreach ($listp as $p){
            $listPointageObj[] = new Pointage($p->Id_P, $p->Date_P,  $p->Heure_P, $p->Type_P);
        }
        return $listPointageObj;
    }
    public function getSerchedPointageService($filter){
        $listPointageDAO = $this->pDAO->getSearchedPointage($filter);
        $listP = array();
        foreach ($listPointageDAO as $p){
            $listP[] = new Pointage($p->Id_P, $p->Date_P,  $p->Heure_P, $p->Type_P);
        }
        return $listP;
    }
    public function getPointageByIdService($id){
        $p = $this->pDAO->getPointageById($id);
        return new Pointage($p->Id_P, $p->Date_P,  $p->Heure_P, $p->Type_P);
    }


}
?>