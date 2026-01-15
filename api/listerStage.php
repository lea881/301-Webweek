<?php
include_once '../classes/database.php';
include_once '../classes/stage.php';
include_once '../classes/lieu.php';


//Je me base sur le TP AJAX fait en cours 
$donnees = array();

//J'utilise prochainstage pour pouvoir ouvrir 3 nouveaux stages à chaque fois 
if(!isset($_GET["prochainStage"])){
    //Recuperer sur le TP AJEX
    $donnees["status"] = "PAS DE STAGE"; 
} 
else {
    try {
        //Je me connecte à la base de données
        $db = database::getInstance('aikido');
        
        //Récupérer la valeur pour afficher les prochains stages
        $prochainStage = $_GET["prochainStage"];

        // Récupération des 3 stages suivants avec offset
        //https://www.w3schools.com/mysql/mysql_limit.asp
        $sql = "SELECT * FROM stage LIMIT 3 OFFSET " . $prochainStage;
        $stages = $db->getObjects($sql, 'Stage', []);
        
        //Creer un tableau vide pour recuperer les valeurs 
        $tableauStages = [];
        foreach ($stages as $stage) {
            // Récupération du lieu
            $lieu = $db->getObjects("SELECT ville FROM lieu WHERE idLieu = " . $stage->getIdLieu(), 'Lieu', []);
            

            //Je récupère les objets dans un tableau associatif
            $tableauStages[] = [
                "id" => $stage->getId(),
                "nom" => $stage->getNom(),
                "image" => $stage->getImage(),
                "debut" => $stage->getDateDebut(),
                "fin" => $stage->getDateFin(),
                "ville" =>$lieu[0]->getVille(),
                //Verifier si la date de debut et de fin sont égales (changement d'affichage dans l'index.php)
                "memeJour" => ($stage->getDateDebut() === $stage->getDateFin()),
            ];
        }

        $donnees["status"] = "OK";
        $donnees["stages"] = $tableauStages;

    } 
    catch (Exception $e) {
        $donnees["status"] = "PAS DE STAGE";
    }
} 

// Encodage en format JSON
$donneesJson = json_encode($donnees, JSON_HEX_APOS);
//remplacement des \\n qui peuvent causer des erreurs en JavaScrip
$donneesJson = str_replace("\\n", " ", $donneesJson);
ob_clean();
//on ecrit les données
echo $donneesJson;