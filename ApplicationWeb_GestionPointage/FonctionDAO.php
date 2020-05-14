<?php
    class FonctionDAO
    {
        private $pdo;
        public function __construct(){
            $this->pdo = new PDO("mysql:host=localhost;dbname=gestionpointage","root","");
        }
        public function addFonction($f){
            $reqPre = $this->pdo->prepare("INSERT INTO fonction (code , nom , description) VALUES(:c, :n, :d)");
            $reqPre->execute(array( ":c"=>$f->getCode(),":n"=>$f->getNom(), ":d"=>$f->getDescription()));
        }
        public function editFonction($cde,$f){
            $reqPre = $this->pdo->prepare("update fonction set nom = :nm, description = :d where code = :cde");
            $reqPre->execute(array(":nm"=>$f->getNom(),":d"=>$f->getDescription(),":cde"=>$cde));
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
            $reqPre = $this->pdo->prepare("SELECT * FROM fonction WHERE code LIKE :f OR nom LIKE :f");
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