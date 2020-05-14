<?php
class CategorieService{
    private $cDAO;
    public function __construct(){
        $this->cDAO = new CategorieDAO();
    }
    public function addCategorieService($Code,$Libelle,$Salaire){
        $C = new Categorie($Code,$Libelle,$Salaire);
        $this->cDAO->addCategorie($C);
    }

    public function editCategorieService($oldCode, $Libelle,$Salaire){
        $C = new Categorie('',$Libelle,$Salaire);
        $this->cDAO->editCategorie($oldCode, $C);
    }

    public function removeService($Code){
        $this->cDAO->removeCategorie($Code);
    }

    public function getAllCategorieService(){
        $listD = $this->cDAO->getAllCategorie();
        $listCategorieObj = array();
        foreach ($listD as $d){
            $listCategorieObj[] = new Categorie($d->code, $d->libelle,  $d->salaire);
        }
        return $listCategorieObj;
    }
    public function getSerchedCategorieService($filter){
        $listCategorieDAO = $this->cDAO->getSearchedCategorie($filter);
        $listD = array();
        foreach ($listCategorieDAO as $d){
            $listD[] = new Categorie($d->code, $d->libelle, $d->salaire);
        }
        return $listD;
    }
    public function getCategorieByCodeService($Code){
        $C = $this->cDAO->getCategorieByCode($Code);
        return new Categorie($C->code, $C->libelle ,$C->salaire);
    }


}
?>


