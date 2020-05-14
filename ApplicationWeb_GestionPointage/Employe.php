<?php

class Employe
{
    private $CIN;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $tel;
    private $email;
    private $sexe;
    private $adresse;
    private $nbrEnfant;
    private $passwd;
    private $photo;
    private $role;
    private $dateRecrutement;
    private $codeF;
    private $codeC;
    private $num;

    public function __construct($CIN, $nom, $prenom, $dateNaissance, $tel, $email, $sexe, $adresse, $nbrEnfant, $passwd, $photo, $role, $dateRecrutement,$codeF,$codeC,$num)
    {
        $this->CIN = $CIN;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->tel = $tel;
        $this->email = $email;
        $this->sexe = $sexe;
        $this->adresse = $adresse;
        $this->nbrEnfant = $nbrEnfant;
        $this->passwd = $passwd;
        $this->photo = $photo;
        $this->role = $role;
        $this->dateRecrutement = $dateRecrutement;
        $this->codeF = $codeF;
        $this->codeC = $codeC;
        $this->num = $num;
    }

    public function getCIN()
    {
        return $this->CIN;
    }

    public function setCIN($CIN)
    {
        $this->CIN = $CIN;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getNbrEnfant()
    {
        return $this->nbrEnfant;
    }

    public function setNbrEnfant($nbrEnfant)
    {
        $this->nbrEnfant = $nbrEnfant;
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getDateRecrutement()
    {
        return $this->dateRecrutement;
    }

    public function setDateRecrutement($dateRecrutement)
    {
        $this->dateRecrutement = $dateRecrutement;
    }

    public function getCodeF()
    {
        return $this->codeF;
    }

    public function setCodeF($codeF)
    {
        $this->codeF = $codeF;
    }

    public function getCodeC()
    {
        return $this->codeC;
    }

    public function setCodeC($codeC)
    {
        $this->codeC = $codeC;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;
    }
    public function getAge(){
        return date("Y") - $this->dateNaissance;
    }
}