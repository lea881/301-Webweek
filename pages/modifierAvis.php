<?php
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
</head>
<body>
    <h1>Modifier l'avis de <?php echo $unAvis->getNomAvis()?></h1>
    <!--Formulaire pour les changements remplis avec les informations de l'avis-->
    <!-- Renvoie vers updateAvis/php pour faire la requete dans la BDD-->
    <form action="../api/updateAvis.php" method="POST">
        <input type="hidden" name="idAvisActuel" value="<?php echo $unAvis->getIdAvis() ?>">
        <p>Nom: <input type="text" name="nomAvis" value="<?php echo $unAvis->getNomAvis() ?>"></p>
        <p>Titre: <input type="text" name="titreAvis" value="<?php echo $unAvis->getTitreAvis() ?>"></p>
        <p>Commentaire: <br>
           <textarea name="descriptionAvis"><?php echo $unAvis->getDescriptionAvis() ?></textarea>
        </p>
        <label>Note :</label>
        <select id="noteAvis" name="noteAvis" required>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select> <br>
        <button type="submit">Enregistrer les changements</button>
    </form>
</body>
</html>