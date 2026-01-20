<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php 
    $path = "../";
    include '../includes/header.php'; ?>
    <h1 class="titre-cours">AÏKIDO Le-Puy-en-Velay </h1>
    <div class="texte_asso">
        <p>L’association Aïkido Le Puy-en-Velay propose des cours d’aïkido pour adultes et adolescents à       partir de 12 ans, au Dojo de Quincieu (1, avenue de Bonneville, 43000 Aiguilhe). Les cours sont assurés par Thomas Gavory, enseignant diplômé d’État, et s’adressent aussi bien aux débutants qu’aux pratiquants confirmés. Les séances se déroulent dans un esprit de partage et de respect, avec des groupes où tous les niveaux sont mélangés afin de favoriser l’apprentissage et la transmission entre les aïkidokas.
        </p> 
    </div>
    <div class="container">
        <div class="image-cours" >
            <img src="../img/Cours_prise.png" alt="Cours prise">
        </div>
        <div class="info-cours">
            <h3><img src="../img/professeur_icone.png" class="icone">Thomas Gavory</h3>
            <p>6ème DAN d'Aïkido, diplômé d'État.</p> 
            <h3><img src="../img/date_icone.png" class="icone"> Horaires: </h3>
            <p>Mardi 19h-21h <br>Jeudi 19h-21h</p>
            <h3><img src="../img/localisation_icone.png" class="icone"> Dojo Quincieu </h3>
            <p> Adresse : 1, Avenue de Bonneville, 43000 Aiguilhe<p>
        </div>    
    </div>
    <div class="tarifs">
        <h2>Tarifs</h2>
        <div class="tarif-grille">
            <div class="carte">
                <div class="carte-header">
                    <h2> Adultes </h2>
                </div>
                <div class="carte-body">
                    <p> 205€ </p>
                    <p> Accès complet aux cours adulte toute l'année.</p>
                </div>
            </div>
            <div class="carte">
                <div class="carte-header">
                    <h2>Ados / Étudiants</h2>
                </div>
                <div class="carte-body">
                    <p>170€</p>
                    <p>Adolescents (14-18 ans), étudiants et demandeurs d'emploi.</p>
                </div>
            </div>
            <div class="carte">
                <div class="carte-header">
                    <h2>Enfants</h2>
                </div>
                <div class="carte-body">
                    <p>105 €</p>
                    <p>12-14 ans : découverte et pratique adaptée aux plus jeunes.</p>
                </div>
            </div>
            <div class="carte">
                <div class="carte-header">
                    <h2>Formule Duo</h2>
                </div>
                <div class="carte-body">
                    <p>-30 €</p>
                    <p>Parrainez un(e) ami(e) et bénéficiez tous deux de cette remise sur votre inscription !</p>
                </div>
            </div>
            </div>
        </div>
        <div class="texte_asso">
            <p> Les prix indiqués ci-dessus comprennent la possibilité de participer à tous les cours correspondant à sa tranche d'âge, la Licence à la FFAAA ainsi que l’assurance et l’adhésion à l’association « Aïkido Le Puy en Velay ». Possibilité d'échelonner le règlement. Tous les chèques devront être remis au moment de l'inscription pour que celle-ci soit effective.
            </p>    
        </div>
    </div>
    <a href="contact.php" class="btn">S'inscrire</a>
    <?php include '../includes/footer.php';?>

</body>
</html>