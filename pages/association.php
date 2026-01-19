<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Association</title>
 
</head>
<body>
    <?php
    //J'utilise la variable path pour que le chemin s'adapte en fonction de la page (ce ne sont pas les même chemin si on vient de index ou d'une autre page)
    $path = "../";
    include '../includes/header.php'; 
    ?>
   <h1 class="titre-assoc">Thomas Gavory</h1>
   <h2 class="sous-titre-assoc"> 6ème DAN</h2>
   <p class="paragraphe-assoc"> Diplômé d'État</p>
   
<div class="Thomas-presentation">
    <p><strong>Thomas Gavory</strong> participe à de nombreux événements majeurs, notamment au Festival des Arts  Martiaux de Bercy, où il intervient comme Uke auprès de figures reconnues de l’aïkido : Christian Tissier Shihan (2001, 2003, 2004, 2007), Marc Bachraty Senseï (2011) et Yoko Okamoto Senseï (2012). <br>
    <br>
    En 2012, il se rend au Japon avec la délégation de la FFAAA et assiste Micheline Tissier Senseï lors du 11ᵉ Congrès de la Fédération Internationale d’Aïkido. <br>
    Après avoir enseigné à Noisy-le-Grand de 1994 à 2010 aux côtés de Pierre Helley, Thomas Gavory quitte la région parisienne pour s’installer au Puy-en-Velay. <br>
    <br>
    Aujourd’hui professeur au <strong>club d’Aïkido du Puy-en-Velay</strong>, il anime régulièrement des stages dans d’autres clubs auvergnats (Saint-Flour, CUC de Clermont-Ferrand…). Depuis 2013, il est également l’assistant d’Alain Royer (7ᵉ dan), directeur technique régional de la Ligue Auvergne, avec qui il coanime les stages de ligue.<br>
</p>
</div>
<h1>Galerie</h1>
    <div class="galerie_photoscouleur">
        <img src="../img/photo_cours.png" alt="photo de cours">
        <img src="../img/photo-prise.png" alt="photo prise aikido">
        <img src="../img/photo-sincline.png" alt="photo de thomas gavory et un de ses élève qui se prosterne">
        <img src="../img/photo-prise-sol.png" alt="photo d'une prise au sol">
        <img src="../img/photo-prise-tournoi.png" alt ="photo d'une pris d'aikido à un tournoi">
        <img src="../img/photo-cours-tokyo.png" alt="photo d'un cours à tokyo">
        <img src="../img/photo_cours-endo-sensei.png" alt="photo avec endo sensei">
        <img src="../img/photo-groupe_1.png" alt="photo d'un groupe avec Thomas Gavory">
        <img src="../img/photo-groupe_2.png" alt="photo de groupe avec Thomas Gavory">
    </div>

   <div class="test-carrousel">
        <img id="imageAffiche" src="../img/photo-noir-blanc-couteau.png" style="width: 100%;">
    
        <button id="btnSuivant" class="bouton">Image Suivante</button>

    </div>

    <div class="video-aikido">
        <iframe width="200" height="170" src="https://www.youtube.com/embed/Y8is-ihz_qI?si=C64AoFkzDNRogifY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="200" height="170" src="https://www.youtube.com/embed/Y8is-ihz_qI?si=WYp2VOG539eUcCH5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="200" height="170" src="https://www.youtube.com/embed/-aOPtRwIcXg?si=PFKT952n4CUpYXSX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="200" height="170" src="https://www.youtube.com/embed/GX91U2t4zmI?si=eGrg_0nDaKoo6P4q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="200" height="170" src="https://www.youtube.com/embed/0mJSHEyyKZg?si=1MISYQRsLCXxz2QU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    </div>  
<script src="../js/script.js"></script>  
<footer>
    <?php
    include '../includes/footer.php';
    ?>
</footer>     
</body>
</html>