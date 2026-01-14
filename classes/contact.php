<!-- CLASSE CONTACT -->
 
<?php

class Contact {
    private $idContact;
    private $nomContact;
    private $tel;
    private $lien;

    public function getIdContact(){ 
        return $this->idContact; 
    }
    public function getNomContact(){ 
        return $this->nomContact; 
    }
    public function getTel(){ 
        return $this->tel; 
    }
    public function getLien(){ 
        return $this->lien; 
    }
}
?>

