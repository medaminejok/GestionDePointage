<?php
class Pointage{
    private $IdP;
    private $DateP;
    private $HeureP;
    private $TypeP;

    public function __construct($IdP = "", $DateP = "", $HeureP = "", $TypeP = "")
    {
        $this->IdP = $IdP;
        $this->DateP = $DateP;
        $this->HeureP = $HeureP;
        $this->TypeP = $TypeP;
    }


    public function getIdP()
    {
        return $this->IdP;
    }


    public function setIdP($IdP)
    {
        $this->IdP = $IdP;
    }


    public function getDateP()
    {
        return $this->DateP;
    }


    public function setDateP($DateP)
    {
        $this->DateP = $DateP;
    }


    public function getHeureP()
    {
        return $this->HeureP;
    }


    public function setHeureP($HeureP)
    {
        $this->HeureP = $HeureP;
    }


    public function getTypeP()
    {
        return $this->TypeP;
    }

    public function setTypeP($TypeP)
    {
        $this->TypeP = $TypeP;
    }


};
?>