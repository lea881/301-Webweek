<?php
//CLASSE ANIMATEUR
class Animateur{
    private $idAnimateur;
    private $nomAnimateur;
    private $niveauAnimateur;

    public function getIdAnimateur(){
        return $this->idAnimateur;
    }
    public function getNomAnimateur() {
        return $this->nomAnimateur; 
    }
    public function getNiveauAnimateur(){ 
        return $this->niveauAnimateur;
    }

}
?>

