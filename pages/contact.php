<?php 
    $nom = null;
    $prenom=null;
    //si le formulaire est envoyé 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
        //Je stockes l'email et le mdp dans des variables
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="img/logo.jpg">
    <title>Contact</title>
</head>
<body>
    <?php 
    //J'utilise la variable path pour que le chemin s'adapte en fonction de la page (ce ne sont pas les même chemin si on vient de index ou d'une autre page)
        $path = "../";
        include '../includes/header.php';
    ?>
    <main>
        <?php 
            if ($nom !=null && $prenom !=null){
                echo "<h3> Merci pour votre message ".$nom.  " ". $prenom . "</h3>" ;
            }
        ?>
        <form action="#" method="post">
            <h1>Inscription / Nous contacter</H1>
            
            <label for="nom">Nom :</label><br>
            <input type="text" class="champ" name="nom"><br><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" class="champ" name="prenom"><br><br>

            <label for="email">Email :</label><br>
            <input type="email" class="champ" name="email"><br><br>

            <label for="message">Message :</label><br>
            <textarea id="message" class="champ" name="message"></textarea><br><br>

            <input type="checkbox" required>J'accepte les <a href="mentionslegales.php"> mentions légales<br>

            <button type="submit" class="btn" name="envoyer">Envoyer</button>
        </form>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>