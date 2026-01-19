<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Association</title>
    ?>
</head>
<body>
    <?php
    //J'utilise la variable path pour que le chemin s'adapte en fonction de la page (ce ne sont pas les même chemin si on vient de index ou d'une autre page)
    $path = "../";
     include '../includes/header.php'; 
    ?>
   <h1>Thomas Gavory</h1>
   <h2> 6ème DAN</h2>
   <p> Diplômé d'État</p>
   <p>Thomas Gavory participe à de nombreux événements majeurs, notamment au Festival des Arts  Martiaux de Bercy, où il intervient comme Uke auprès de figures reconnues de l’aïkido : Christian Tissier Shihan (2001, 2003, 2004, 2007), Marc Bachraty Senseï (2011) et Yoko Okamoto Senseï (2012). <br>
    En 2012, il se rend au Japon avec la délégation de la FFAAA et assiste Micheline Tissier Senseï lors du 11ᵉ Congrès de la Fédération Internationale d’Aïkido. <br>
    Après avoir enseigné à Noisy-le-Grand de 1994 à 2010 aux côtés de Pierre Helley, Thomas Gavory quitte la région parisienne pour s’installer au Puy-en-Velay. Il y ouvre le Dojo Mugamae, un lieu consacré pendant plusieurs années à la pratique et à la transmission de l’aïkido. Depuis sa fermeture en 2020, les cours se poursuivent au dojo de la halle multisports Célestin Quincieu, à Aiguilhe. <br>
    Aujourd’hui professeur au club d’Aïkido du Puy-en-Velay, il anime régulièrement des stages dans d’autres clubs auvergnats (Saint-Flour, CUC de Clermont-Ferrand…). Depuis 2013, il est également l’assistant d’Alain Royer (7ᵉ dan), directeur technique régional de la Ligue Auvergne, avec qui il coanime les stages de ligue.<br>
    Membre du collège technique national de la FFAAA de 2016 à 2019, Thomas Gavory est aussi formateur BF pour la région Auvergne–Rhône-Alpes.
</p>

<img src="../img/Thomas_Gavory.png" alt="photo de Thomas Gavory">

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

    <div class="carousel-photos">
        <div class="carousel-slides">
            <div class="slide active">
                <img src="../img/photo-noir-blanc-couteau.png" alt="photo proche d'un combt avec couteau">
            </div>
            <div class="slide">
                <img src="../img/photo-noir-blanc-prise.png" alt="prise d aikido">
            </div>
            <div class="slide">
                <img src="../img/photo-noir-blanc_prise-proche.png" alt="prise vu de proche d aikido">
            </div>
            <div class="slide">
                <img src="../img/photo-noir-blanc-main.png" alt="main vu de proche">
            </div>
        </div>

        <button class="prev" id="prevBtn">&#10094;</button>
        <button class="next" id="nextBtn">&#10095;</button>

    </div>
<footer>
    <?php
    include '../includes/footer.php';
    ?>
</footer>     
</body>
</html>