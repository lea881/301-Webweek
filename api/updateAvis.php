<?php
include_once '../classes/database.php';
include_once '../classes/avis.php';

//Verifier que tout les champs du formulaire sont remplis
//Se connecter à la BDD 
$db = database::getInstance('aikido');
$idAvis = $_POST['idAvisActuel'];
$nomAvis = $_POST['nomAvis'];
$titreAvis = $_POST['titreAvis'];
$descriptionAvis = $_POST['descriptionAvis'];
$noteAvis = $_POST['noteAvis'];

//Requete SQL pour ajouter les valeurs dans la BDD
$sql = "UPDATE avis SET nomAvis = ?, titreAvis = ?, descriptionAvis = ?, noteAvis = ? WHERE idAvis = ?";

// Requete préparée opour éviter les problèmes avec les apostrophes dans les textes des avis 
// Doc : https://www.php.net/manual/fr/pdo.prepare.php
$db->getConnect()->prepare($sql)->execute([$nomAvis, $titreAvis, $descriptionAvis, $noteAvis, $idAvis]);

//Rediriger vers l'accueil
header("Location: ../index.php");