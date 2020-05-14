<?php
class DepartementService{
    private $DDAO;

    public function __construct(){
        $this->DDAO = new DepartementDAO();
    }
    public function addDepartementService($Num,$Nom,$Descr){
        $d = new Departement($Num,$Nom,$Descr);
        $this->DDAO->addDepartement($d);
    }

    public function editDepartementService($oldNum, $Nom, $Descr){
        $d = new Departement('',$Nom,$Descr);
        $this->DDAO->editDepartement($oldNum, $d);
    }

    public function removeService($Num){
        $this->DDAO->removeDepartement($Num);
    }

    public function getAllDepartementService(){
        $listd = $this->DDAO->getAllDepartement();
        $listDepartementObj = array();
        foreach ($listd as $d){
            $listDepartementObj[] = new Departement($d->Num, $d->Nom,  $d->Descr);
        }
        return $listDepartementObj;
    }
    public function getSerchedDepartementService($filter){
        $listDepartementDAO = $this->DDAO->getSearchedDepartement($filter);
        $listD = array();
        foreach ($listDepartementDAO as $d){
            $listD[] = new Departement($d->Num, $d->Nom, $d->Descr);
        }
        return $listD;
    }
    public function getDepartementByNumService($Num){
        $d = $this->DDAO->getDepartementByNum($Num);
        return new Departement($d->Num, $d->Nom ,$d->Descr);
    }

    
}
?>
