<?php

class FonctionService
{
    private $fDAO;

    public function __construct(){
        $this->fDAO = new FonctionDAO();
    }

    public function addFonctionService($code,$nom,$montant){
        $f = new Fonction($code,$nom,$montant);
        $this->fDAO->addFonction($f);
    }

    public function editCategoryService($oldCode, $nom, $montant){
        $f = new Fonction('',$nom,$montant);
        $this->fDAO->editFonction($oldCode, $f);
    }

    public function removeService($code){
        $this->fDAO->removeFonction($code);
    }

    public function getAllFonctionService(){
        $listFonctionDAO = $this->fDAO->getAllFonction();
        $listF = array();
        foreach ($listFonctionDAO as $f){
            $listF[] = new Fonction($f->code, $f->nom, $f->montant);
        }
        return $listF;
    }
    public function getSerchedFonctionService($filter){
        $listFonctionDAO = $this->fDAO->getSearchedFonction($filter);
        $listF = array();
        foreach ($listFonctionDAO as $f){
            $listF[] = new Fonction($f->code, $f->nom, $f->montant);
        }
        return $listF;
    }
    public function getFonctionByCodeService($code){
        $f = $this->fDAO->getFontionByCode($code);
        return new Fonction($f->code, $f->nom ,$f->montant);
    }

}