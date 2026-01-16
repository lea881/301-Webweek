<?php
//CLASSE LIEU
class Lieu {
    private $idLieu;
    private $nomLieu;
    private $codePostale;
    private $ville;

    public function getIdLieu(){ 
        return $this->idLieu; 
    }
    public function getNomLieu(){ 
        return $this->nomLieu; 
    }
    public function getCodePostale(){ 
        return $this->codePostale; 
    }
    public function getVille(){ 
        return $this->ville; 
    }
}
?>

