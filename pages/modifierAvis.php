<?php
session_start();
include_once '../classes/database.php';
include_once '../classes/avis.php';

//Recuperer l'id de l'avis à modifier
$idAvis = $_POST['idAvisActuel'];

$db = database::getInstance('aikido');
//requete pour recupérer toutes les infos d'un avis 
$resultats = $db->getObjects("SELECT * FROM avis WHERE idAvis = $idAvis", 'Avis', []);
//Prendre le premier objet (l'avis qu'on veut modifier)
$unAvis = $resultats[0];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Avis</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    //J'utilise la variable path pour que le chemin s'adapte en fonction de la page (ce ne sont pas les même chemin si on vient de index ou d'une autre page)
    $path = "../";
    include '../includes/header.php';?> 
    
    <main>
        <!-- Si l'utilisateur est connecté en tant qu'admin il peut modifier-->
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){?>
        <h1>Modifier l'avis de <?php echo $unAvis->getNomAvis()?></h1>
        <!--Formulaire pour les changements remplis avec les informations de l'avis-->
        <!-- Renvoie vers updateAvis/php pour faire la requete dans la BDD-->
        <form action="../api/updateAvis.php" method="POST">
            <input type="hidden" name="idAvisActuel" value="<?php echo $unAvis->getIdAvis() ?>">
            <label class="titre">Nom: </label> <br>
            <input type="text" name="nomAvis" class="champ" value="<?php echo $unAvis->getNomAvis() ?>"><br><br>
            <label class="titre">Titre: </label><br>
            <input type="text" name="titreAvis" class="champ" value="<?php echo $unAvis->getTitreAvis() ?>"><br><br>
            
            <label class="titre">Note :</label><br>
            <select id="noteAvis" name="noteAvis" class="champ" required>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select> <br><br>
            <label class="titre">Commentaire: </label> <br>
            <textarea name="descriptionAvis" class="champ" id="message"><?php echo $unAvis->getDescriptionAvis() ?></textarea><br> <br>
            <button type="submit" class="bouton">Enregistrer les changements</button>
        </form>
        <?php }
        //Si l'utilisateur n'est pas connecté en tant qu'admin, il ne peut pas modifier
        else {
            echo "Vous devez être connecté comme administrateur pour modifier ou supprimer un avis"; ?>
            <form action="connexion.php" method="POST">
                <button type="submit" class="bouton">Se connecter</button>
            </form>
            <?php } ?>
    </main>
    <?php include '../includes/footer.php';?> 
</body>
</html>