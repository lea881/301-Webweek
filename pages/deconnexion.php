<?php
// Démarrez la session pour avoir accès à la connexion
session_start();
// vide la tableau de la session
$_SESSION = array();
// On détruit la session
session_destroy();
// Retour à la page connexion
header("Location: connexion.php");
exit();
?>