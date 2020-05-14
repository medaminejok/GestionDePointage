<?php

class EmployeService
{
    private $eDAO;

    public function __construct(){
        $this->eDAO = new EmployeDAO();
    }

    public function addEmployeService($CIN,$nom,$prenom,$dateNaissance,$tel,$email,$sexe,$adresse,$nbrEnfant,$passwd,$photo,$role,$dateRecrutement,$codeF,$codeC,$num){
        $E = new Employe($CIN,$nom,$prenom,$dateNaissance,$tel,$email,$sexe,$adresse,$nbrEnfant,$passwd,$photo,$role,$dateRecrutement,$codeF,$codeC,$num);
        $this->eDAO->addEmploye($E);
    }

    public function editCategoryService($oldCIN,$nom,$prenom,$dateNaissance,$tel,$email,$sexe,$adresse,$nbrEnfant,$passwd,$photo,$role,$dateRecrutement,$codeF,$codeC,$num){
        $E = new Employe('',$nom,$prenom,$dateNaissance,$tel,$email,$sexe,$adresse,$nbrEnfant,$passwd,$photo,$role,$dateRecrutement,$codeF,$codeC,$num);
        $this->eDAO->editEmploye($oldCIN, $E);
    }

    public function removeService($CIN){
        $this->eDAO->removeEmploye($CIN);
    }

    public function getAllEmployeService(){
        $listEmployeDAO = $this->eDAO->getAllEmploye();
        $listE = array();
        foreach ($listEmployeDAO as $E){
            $listE[] = new Employe($E->CIN,$E->nom,$E->prenom,$E->dateNaissance,$E->tel,$E->email,$E->sexe,$E->adresse,$E->nbrEnfant,$E->passWor,$E->photo,$E->role,$E->dateRecrutement,$E->$codeF,$E->$codeC,$E->$num);
        }
        return $listE;
    }
    public function getSearchedEmployeService($filter){
        $listEmployeDAO = $this->eDAO->getSearchedEmploye($filter);
        $listE = array();
        foreach ($listEmployeDAO as $E){
            $listE[] = new Employe($E->CIN,$E->nom,$E->prenom,$E->dateNaissance,$E->tel,$E->email,$E->sexe,$E->adresse,$E->nbrEnfant,$E->passWor,$E->photo,$E->role,$E->dateRecrutement,$E->$codeF,$E->$codeC,$E->$num);
        }
        return $listE;
    }
    public function getEmployeByCINService($CIN){
        $E = $this->eDAO->getFontionByCode($CIN);
        return new Employe($E->CIN,$E->nom,$E->prenom,$E->dateNaissance,$E->tel,$E->email,$E->sexe,$E->adresse,$E->nbrEnfant,$E->passWor,$E->photo,$E->role,$E->dateRecrutement,$E->$codeF,$E->$codeC,$E->$num);
    }

}
