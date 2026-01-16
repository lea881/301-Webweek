<?php
//CLASSE ADMINISTRATEUR 
class Administrateur {
    private $idAdmin;
    private $mdpAdmin;
    private $emailAdmin;

    public function getIdAdmin(){ 
        return $this->idAdmin; 
    }
    public function getMdpAdmin(){ 
        return $this->mdpAdmin; 
    }
    public function getEmailAdmin(){
        return $this->emailAdmin; 
    }
}
?>


