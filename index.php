<?php 
include_once 'classes/database.php';
include_once 'classes/stage.php';
include_once 'classes/lieu.php';

//Faire appel à la classe database
$db = database::getInstance('aikido'); 

// Requete pour récupérer tout les stages et leurs infos
$stages = $db->getObjects("SELECT * FROM stage LIMIT 3", 'Stage', []);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Accueil</title>
</head>
<body>
    <main>
        <h2> Thomas Gavory 6e dan et ses élèves vous accueillent pour découvrir et pratiquer l'aïkido.</h2>
        <h2> Thomas Gavory</h2>
        <h3>Enseignant diplômé d’état </h3>
        <img src="/img/photo-prise.png" alt=" photo de Thomas Gavory qui fait une prise">
        <p> Thomas Gavory commence l’Aïkido en 1987 dans le club de Pierre Helley, à Noisy-le-Grand. De 1989 à 2010, il s’entraîne de façon quasi quotidienne au Cercle Tissier, à Vincennes, sous la direction de Christian Tissier Shihan dont il devient l'élève. 
        Il obtient son 6ème dan en 2019 et diplômé d’État, à l'âge de 44 ans.
        <br>Les cours sont assurés par Thomas Gavory.</p>
        <a href="cours.php">
        <button type="button">Découvrir les cours -></button>
        </a>

    <!--Afficher les 3 premiers stages -->
        <?php foreach ($stages as $unStage) :
            // Récupérer le lieu associé à chacun des stages afficher (avec la classe lieu)
            $idLieu = $unStage->getIdLieu();
            //Recuperer les infos du lieu en fonction de l'id sur la BDD
            $resultatsLieu = $db->getObjects("SELECT * FROM lieu WHERE idLieu = " . $unStage->getIdLieu(), 'Lieu', []);
            $lieu = $resultatsLieu[0];
        ?>
        
        <!-- Lien pour rediriger vers le stage en détail en fonction de l'id-->
        <a href="pages/articlestage.php?id=<?php echo $unStage->getId(); ?>">
            
        <!-- Afficher les stages--> 
            <div class="carte">
                <img src="<?php echo $unStage->getImage(); ?>" alt="Affiche du stage" />
                <h3> · <?php echo $unStage->getNom(); ?></h3>

                <?php if ($unStage->getDateDebut()===$unStage->getDateFin()) {?>
                    Le <?php echo $unStage->getDateDebut();
                } 
                else { ?>
                    Du <?php echo $unStage->getDateDebut(); ?> au <?php echo $unStage->getDateFin(); 
                }?>
                </p> 
                <p> 
                    <?php echo $lieu->getVille(); ?>
                </p>
            </div>
        </a>
        <?php endforeach; ?>
        <!--Pour afficher les nouveaux stages-->
        <div id="nouveauxStages"></div>
                <button id="boutonVoirPlus">Voir plus de stages</button>
                <!--Afficher les stages en plus grâce à mustache-->
                <script id="templateressources" type="text/html">
                    {{#stages}}
                    <a href="articlestage.php?id={{id}}">
                        <div class="carte">
                            <img src="{{image}}" alt="Affiche" />
                            <h3> · {{nom}}</h3>
                            <p>
                                <!--Afficher différement sir le stage dur une seul jour ou plusieurs (pour avoir le meme affichage que sur les autres pages)-->
                                {{#memeJour}} Le {{debut}} {{/memeJour}}
                                {{^memeJour}} Du {{debut}} au {{fin}} {{/memeJour}}
                            </p>
                            <p>{{ville}}</p>
                        </div>
                    </a>
                    {{/stages}}
                </script>

        <script src="js/mustache.min.js"></script>
        <script src="js/script.js"></script>
        <h2> Association</h2>
        <p>L’association Aïkido Le Puy-en-Velay propose des cours d’aïkido pour adultes et adolescents à partir de 12 ans, au dojo de Quincieu (1, avenue de Bonneville, 43000 Aiguilhe).</p>
        <img src="/img/Cours.png" alt=" image d'un cours au dojo">
        <a href="association.php">
        <button type="button">En svoir plus</button>
        </a>
    </main> 
    <footer>
        <?php
        include '../includes/footer.php';
        ?>
    </footer>
</body>
</html>