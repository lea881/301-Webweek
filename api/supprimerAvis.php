<?php
include_once '../classes/database.php';
include_once '../classes/avis.php';
session_start();

//Si l'utilisateur est connecté, on peut supprimer l'avis
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    //Verifier si l'id de l'avis est bien recuperer
    if (isset($_POST['idAvisActuel'])){ 
        //Se connecter à la BDD aikido
        $db = database::getInstance('aikido');
        //Recuperer l'id de l'avis à supprimer
        $idAvis = $_POST['idAvisActuel'];
        //Requete SQL pour ajouter les valeurs dans la BDD
        $sql = "DELETE FROM Avis WHERE idAvis=$idAvis;";
        $db->getConnect()->exec($sql);
        //Rediriger vers l'accueil
        header("Location: ../index.php");
    }
    else {
        // Si le formulaire est envoyé vide on renvoit vers la page accueil
        header("Location: ../index.php");
    }
}
//Si l'utilisateur est pas connecté en admin on le renvoie vers la page connexion
else{
     header("Location: ../pages/connexion.php");
 }
 ?>
