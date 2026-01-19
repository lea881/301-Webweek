<?php
//CLASSE ANIMATEUR
class Avis{
    private $idAvis;
    private $nomAvis;
    private $titreAvis;
    private $descriptionAvis;
    private $noteAvis;

    public function getIdAvis(){
        return $this->idAvis;
    }
    public function getNomAvis() {
        return $this->nomAvis; 
    }
    public function getTitreAvis(){ 
        return $this->titreAvis;
    }
    public function getDescriptionAvis(){ 
        return $this->descriptionAvis;
    }
    public function getNoteAvis(){ 
        return $this->noteAvis;
    }
}
?>