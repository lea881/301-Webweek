<?php
include_once '../classes/database.php';
include_once '../classes/avis.php';

//Verifier que tout les champs du formulaire sont remplis
if (isset($_POST['nomAvis'], $_POST['titreAvis'], $_POST['descriptionAvis'], $_POST['noteAvis'])){ 
    //Se connecter à la BDD aikido
    $db = database::getInstance('aikido');

    //J'utilise addslashes pour gérer les apostrophe dans les textes (éviter qu'ils disparraissent)
    $nom = addslashes($_POST['nomAvis']);
    $titre = addslashes($_POST['titreAvis']);
    $desc = addslashes($_POST['descriptionAvis']);
    $note = $_POST['noteAvis'];

    //Requete SQL pour ajouter les valeurs dans la BDD
    $sql = "INSERT INTO Avis (nomAvis, titreAvis, descriptionAvis, noteAvis) 
        VALUES ('$nom', '$titre', '$desc', '$note')";

    //Se connecter à la bdd pour ajouter les infos
    $db->getConnect()->exec($sql);

    //Rediriger vers l'accueil
    header("Location: ../index.php");
}
else {
    // Si le formulaire est envoyé vide on renvoit vers la page accueil
    header("Location: ../index.php");
}