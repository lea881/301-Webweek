<?php
include_once '../classes/database.php';
include_once '../classes/stage.php';
include_once '../classes/lieu.php';

// Syntaxe compatible array()
$donnees = array();

if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {
    $db = database::getInstance('aikido');
    $recherche = $_GET['recherche'];

    //Rechercher les noms de stage en utilisant like 
    $sql = "SELECT * FROM stage WHERE nomStage LIKE '%" . $recherche . "%'";
    $stages = $db->getObjects($sql, 'Stage', array());

    //Si les dates de fin et de début sont les même on affiche "le ..." sinon "du... au..."
    if ($stages) {
        foreach ($stages as $s) {
            if ($s->getDateDebut() === $s->getDateFin()) {
                $dateAffiche = "Le " . $s->getDateDebut();
            } else {
                $dateAffiche = "Du " . $s->getDateDebut() . " au " . $s->getDateFin();
            }

            // Récupérer le lieu pour les stages
            $villes = $db->getObjects("SELECT * FROM lieu WHERE idLieu = " . $s->getIdLieu(), 'Lieu', array());
            $villeAffiche =  $villes[0]->getVille();

            $donnees['stages'][] = array(
                "id"    => $s->getId(),
                "nom"   => $s->getNom(),
                "image" => $s->getImage(),
                "date"  => $dateAffiche,  // Nouvelle variable pour Mustache
                "ville" => $villeAffiche  // Nouvelle variable pour Mustache
            );
        }
        $donnees["status"] = "OK";
    }
}

echo json_encode($donnees);