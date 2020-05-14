<?php

class EmployeDAO
{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=gestionpointage","root","");
    }
    public function addEmploye($e){
        $reqPre = $this->pdo->prepare("INSERT INTO employe (CIN , nom, prenom, dateNaissance, tel, email , sexe, adresse, nbrEnfant, passWord, photo, role, dateRecrutement, codeF, codeC, num)
                                                 VALUES(:cin, :nm, :pr, :dn, :tl, :em, :sx, :adr, :nbE, :pwd, :ph, :rl, :dr, :cdeF, :cdeC, :nmD)");
        $reqPre->execute(array( ":cin"=>$e->getCIN(),
                                ":nm"=>$e->getNom(),
                                ":pr"=>$e->getPrenom(),
                                ":dn"=>$e->getDateNaissance(),
                                ":tl"=>$e->getTel(),
                                ":em"=>$e->getEmail(),
                                ":sx"=>$e->getSexe(),
                                ":adr"=>$e->getAdresse(),
                                ":nbE"=>$e->getNbrEnfant(),
                                ":pwd"=>$e->getPasswd(),
                                ":ph"=>$e->getPhoto(),
                                ":rl"=>$e->getRole(),
                                ":dr"=>$e->getDateRecrutement(),
                                ":cdeF"=>$e->getCodeF(),
                                ":cdeC"=>$e->getCodeC(),
                                ":nmD"=>$e->getNum(),
        ));
    }
    public function editEmploye($cin,$e){
        $reqPre = $this->pdo->prepare("update employe set 
                                        nom = :nm, 
                                        prenom = :pr, 
                                        dateNaissance = :dn, 
                                        tel = :tl, 
                                        email = :em, 
                                        sexe = :sx, 
                                        adresse = :adr, 
                                        nbrEnfant = :nbE, 
                                        passWord = :pwd, 
                                        photo = :ph, 
                                        role = :rl, 
                                        dateRecrutement = :dr,
                                        codeF = :cdeF,
                                        codeC = :cdeC,
                                        num = :nmD,
                                        where CIN = :cin");
        $reqPre->execute(array( ":nm"=>$e->getNom(),
                                ":pr"=>$e->getPrenom(),
                                ":dn"=>$e->getDateNaissance(),
                                ":tl"=>$e->getTel(),
                                ":em"=>$e->getEmail(),
                                ":sx"=>$e->getSexe(),
                                ":adr"=>$e->getAdresse(),
                                ":nbE"=>$e->getNbrEnfant(),
                                ":pwd"=>$e->getPasswd(),
                                ":ph"=>$e->getPhoto(),
                                ":rl"=>$e->getRole(),
                                ":dr"=>$e->getDateRecrutement(),
                                ":cdeF"=>$e->getCodeF(),
                                ":cdeC"=>$e->getCodeC(),
                                ":nmD"=>$e->getNum(),
                                ":cin"=>$cin,
            ));
    }
    public function removeEmploye($CIN){
        $reqPre = $this->pdo->prepare("DELETE FROM employe WHERE CIN = :cin");
        $reqPre->execute(array(":cin"=>$CIN));
    }
    public function getAllEmploye(){
        $reqPre = $this->pdo->prepare("SELECT * FROM employe");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute();
        return $reqPre->fetchAll();
    }
    public function getSearchedEmploye($filter){
        $reqPre = $this->pdo->prepare("SELECT * FROM employe WHERE CIN LIKE :cin OR nom LIKE :cin OR prenom LIKE :cin");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":cin"=>"%".$filter."%"));
        return $reqPre->fetchAll();
    }
    public function getFontionByEmploye($cin){
        $reqPre = $this->pdo->prepare("SELECT * FROM employe WHERE code = :cin");
        $reqPre->setFetchMode(PDO::FETCH_OBJ);
        $reqPre->execute(array(":cin"=>$cin));
        $listF = $reqPre->fetchAll();
        return $listF[0];
    }
}