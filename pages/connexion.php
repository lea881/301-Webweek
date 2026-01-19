<?php
include '../classes/database.php';
//Démarre la session pour pouvoir l'utiliser
session_start();
$db = database::getInstance('aikido');

//si le formulaire est envoyé 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
//Je stockes l'email et le mdp dans des variables
$email = $_POST['email'];
$mdp = $_POST['mdp'];

$db = $db->getConnect(); 
//Requete pour comparer ce qui est rempli dans le formulaire et ce qu'il y a dans la bdd
$sql = "SELECT idAdmin, emailAdmin, mdpAdmin FROM administrateur WHERE emailAdmin = '$email'";
$stmt = $db->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

    //On verifie si c'est égal
    if ($result && $mdp === $result['mdpAdmin']) {
        //On met les infos de connexion dans le tableau session
        $_SESSION['logged_in'] = true;
        $_SESSION['idUser'] = $result['idAdmin'];
        $_SESSION['email'] = $result['emailAdmin'];

        header("Location: connexion.php");
        exit();
    } 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../includes/header.php'; ?>
<main>
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    echo "<h2>Vous êtes connecté en tant que ".  $_SESSION['email']. "</h2>"  ?>
    <div class="container-boutons">
        <form action="deconnexion.php" method="post">
            <input type="submit" name="envoyer" class="bouton" value="Se deconnecter">
        </form>
        <form action="../index.php" method="post">
            <input type="submit" name="envoyer" class="bouton" value="Retourner à la page d'accueil">
        </form>
    </div>
<?php } 
else {?>
    <div class="container">
        <form action="" method="post">
            <h1>Connexion</h1>
            <label>
                <input type="email" name="email" class="champ" placeholder="Adresse e-mail" required>
            </label> <br>
            <label>
                <input type="password" name="mdp" class="champ" placeholder="Mot de passe" required>
            </label><br>
            <input type="submit" name="envoyer" class="bouton" value="Se connecter">
        </form>
    <?php } ?>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>