<?php
//CLASSE STAGE
class Stage{
    private $idStage;
    private $nomStage;
    private $dateDebut;
    private $dateFin;
    private $horaires;
    private $tarifs;
    private $image;
    private $idLieu;

    public function getId() { 
        return $this->idStage; 
    }
    public function getNom() { 
        return $this->nomStage; 
    }
    public function getDateDebut() { 
        return $this->dateDebut; 
    }
    public function getDateFin() { 
        return $this->dateFin; 
    }
    public function getHoraires() { 
        return $this->horaires; 
    }
    public function getTarif() { 
        return $this->tarifs; 
    }
    public function getImage() { 
        return $this->image; 
    }
    public function getIdLieu() { 
        return $this->idLieu; 
    }

    public function ajouterStage(){
    }

    public function modifierStage(){
    }

    public function supprimerStage(){
    }
}
?>

