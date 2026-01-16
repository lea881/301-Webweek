<?php
include_once '../classes/database.php';
include_once '../classes/avis.php';

//Verifier que tout les champs du formulaire sont remplis
if (isset($_POST['idAvisActuel'])){ 
    //Se connecter à la BDD aikido
    $db = database::getInstance('aikido');
    $idAvis = $_POST['idAvisActuel'];

    //Requete SQL pour ajouter les valeurs dans la BDD
    $sql = "DELETE FROM Avis WHERE idAvis=$idAvis;";

    //Se connecter à la bdd pour ajouter les infos
    $db->getConnect()->exec($sql);

    //Rediriger vers l'accueil
    header("Location: ../index.php");
}
else {
    // Si le formulaire est envoyé vide on renvoit vers la page accueil
    header("Location: ../index.php");
}