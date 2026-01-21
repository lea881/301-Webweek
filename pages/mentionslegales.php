<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Mentions légales</title>
</head>
<body>
    <?php 
    //J'utilise la variable path pour que le chemin s'adapte en fonction de la page (ce ne sont pas les même chemin si on vient de index ou d'une autre page)
        $path = "../";
        include '../includes/header.php';
    ?>
    <div class="mentions">
        <h1>Mentions légales</h1>
            <h2>1. Editeur du site</h2>
                <p>Le présent site est édité par :
                <br>Aikido Le Puy-en-Velay<br>
                Adresse : Dojo Quincieu (1, avenue de Bonneville, 43000 Aiguilhe)<br>
                Téléphone : 06-10-90-24-32<br>
                Statut juridique : Association<br></p>

            <h2>2. Directeur de la publication</h2>
                <p>Le directeur de la publication est : Thomas Gavory</p>
            <h2>3. Hébergement</h2>
                <p>Le site est hébergé par : Hostinger<br>
                Nom de l’hébergeur : Hostinger</p>
            <h2>4. Propriété intellectuelle</h2>
                <p>L’ensemble du contenu du site (textes, images, graphismes, logos, icônes, vidéos) est la propriété exclusive de Thomas Gavory, sauf mentions contraires.</p>
                <p>Toute reproduction, représentation, modification ou exploitation, totale ou partielle, sans autorisation préalable est strictement interdite.</p>
            <h2>5. Responsabilité</h2>
                <p>Thomas Gavory s’efforce d’assurer l’exactitude et la mise à jour des informations diffusées sur le site. Toutefois, aucune garantie n’est apportée quant à l’exactitude, la précision ou l’exhaustivité des informations.<p><br>
                <p>L’éditeur ne pourra être tenu responsable de dommages directs ou indirects résultant de l’utilisation du site.</p>
    </div>
    <?php include '../includes/footer.php';?> 
</body> 
</html>