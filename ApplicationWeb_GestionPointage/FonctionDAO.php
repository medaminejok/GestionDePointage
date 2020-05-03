<?php
    class FonctionDAO
    {
        private $pdo;
        public function __construct(){
            $this->pdo = new PDO("mysql:host=localhost;dbname=gestionpointage","root","");
        }
        public function addFonction($f){
            $reqPre = $this->pdo->prepare("INSERT INTO fonction (code , nom , montant) VALUES(:c, :n, :m)");
            $reqPre->execute(array( ":c"=>$f->getCode(),":n"=>$f->getNom(), ":m"=>$f->getMontant()));
        }
        public function editFonction($cde,$f){
            $reqPre = $this->pdo->prepare("update fonction set nom = :nm, montant = :mt where code = :cde");
            $reqPre->execute(array(":nm"=>$f->getNom(),":mt"=>$f->getMontant(),":cde"=>$cde));
        }
        public function removeFonction($codeFonction){
            $reqPre = $this->pdo->prepare("DELETE FROM fonction WHERE code = :cF");
            $reqPre->execute(array( ":cF"=>$codeFonction));
        }

        public function getAllFonction(){
            $reqPre = $this->pdo->prepare("SELECT * FROM fonction");
            $reqPre->setFetchMode(PDO::FETCH_OBJ);
            $reqPre->execute();
            return $reqPre->fetchAll();
        }

        public function getSearchedFonction($filter){
            $reqPre = $this->pdo->prepare("SELECT * FROM fonction WHERE code LIKE :f OR nom LIKE :f OR montant LIKE :f");
            $reqPre->setFetchMode(PDO::FETCH_OBJ);
            $reqPre->execute(array(":f"=>"%".$filter."%"));
            return $reqPre->fetchAll();
        }

        public function getFontionByCode($code){
            $reqPre = $this->pdo->prepare("SELECT * FROM fonction WHERE code = :cde");
            $reqPre->setFetchMode(PDO::FETCH_OBJ);
            $reqPre->execute(array(":cde"=>$code));
            $listF = $reqPre->fetchAll();
            return $listF[0];
        }
    }

?>