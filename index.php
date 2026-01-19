<?php 
include_once 'classes/database.php';
include_once 'classes/stage.php';
include_once 'classes/lieu.php';
include_once 'classes/avis.php';

//Pour cette page, j'ai besoin de savoir si l'utilisateur est connecté en tant qu'administrateur ou non donc je fais session start
session_start();
//Faire appel à la classe database
$db = database::getInstance('aikido'); 

// Requete pour récupérer tout les stages et leurs infos
$stages = $db->getObjects("SELECT * FROM stage LIMIT 3", 'Stage', []);
$avis = $db->getObjects("SELECT * FROM avis", 'Avis', []);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/mustache.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <?php 
    $path = "";
    include 'includes/header.php';?>
    <main>
    <div class="banniere-index">
    <h1>AIKIDO</h1>
    <h3>Le puy en Velay</h3>
    </div>

    <div class="prof">
        <div class="prof-gauche">
        <h2> Thomas Gavory</h2>
        <p>Enseignant diplômé d’état </p>
        <img src="img/photo-prise.png" alt=" photo de Thomas Gavory qui fait une prise">
        </div>
        <div class="prof-droite">
        <h2> Thomas Gavory 6e dan et ses élèves vous accueillent pour découvrir et pratiquer l'aïkido.</h2>
        <p> Thomas Gavory commence l’Aïkido en 1987 dans le club de Pierre Helley, à Noisy-le-Grand. De 1989 à 2010, il s’entraîne de façon quasi quotidienne au Cercle Tissier, à Vincennes, sous la direction de Christian Tissier Shihan dont il devient l'élève. 
        Il obtient son 6ème dan en 2019 et diplômé d’État, à l'âge de 44 ans.
        <br>Les cours sont assurés par Thomas Gavory.</p>
        <a href="pages/cours.php"><button type="button" class="bouton">Découvrir les cours -></button></a>
</div>
</div>

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
            <div class="cartestage">
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
                <button id="boutonVoirPlus" class="bouton">Voir plus de stages</button>
                <!--Afficher les stages en plus grâce à mustache-->
                <script id="templateressources" type="text/html" >
                    {{#stages}}
                    <a href="articlestage.php?id={{id}}">
                        <div class="cartestage">
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

        <div class="assoc">
            <div class="assoc-gauche">
            <h2> Association</h2>
            <p>L’association Aïkido Le Puy-en-Velay propose des cours d’aïkido pour adultes et adolescents à partir de 12 ans, au dojo de Quincieu (1, avenue de Bonneville, 43000 Aiguilhe).</p>
            <a href="association.php">
            <button type="button" class="bouton">En savoir plus</button>
            </a>
        </div>
            <div class="assoc-gauche">
        <img src="img/Cours.png" alt=" image d'un cours au dojo">
        </div>
        </div>

        <h2>Avis</h2>
        <?php foreach ($avis as $unAvis) : ?>
        <div class="carte"> 
            <div class="avis">
                <h3><?php echo $unAvis->getNomAvis(). " ". $unAvis->getNoteAvis();?> /5 </h3>
                <?php echo $unAvis->getTitreAvis(). "<br>". $unAvis->getDescriptionAvis();?>
            </div>
        
            <form action="api/supprimerAvis.php" method="POST" class="suppression-avis">
                <input type="hidden" name="idAvisActuel" value="<?php echo $unAvis->getIdAvis(); ?>">
                <button type="submit" class="bouton">Supprimer l'avis</button>
            </form>

            <form action="pages/modifierAvis.php" method="POST" class="modification-avis">
                <input type="hidden" name="idAvisActuel" value="<?php echo $unAvis->getIdAvis(); ?>">
                <button type="submit" class="bouton">Modifier l'avis</button>
            </form>
        </div>
        <?php endforeach ?>

    <section class="section-formulaire-avis">
        <h2>Laissez-nous votre avis</h2>
        <form action="api/ajouterAvis.php" method="POST" class="formulaire-avis">
            <div>
                <label>Nom :</label>
                <input type="text"  class="champ" id="nomAvis" name="nomAvis" required placeholder="Jean Dupont">
            </div>
            <div>
                <label>Titre de votre message :</label>
                <input type="text"  class="champ" id="titreAvis" name="titreAvis" required placeholder="Un super club !">
            </div>

            <div>
                <label>Note :</label>
                <select id="noteAvis" name="noteAvis"  class="champ" required>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>

            <div>    
                <label>Votre commentaire :</label>
                <textarea id="descriptionAvis"  class="champ" name="descriptionAvis" rows="5" required placeholder="Racontez votre expérience"></textarea>
            </div>

            <button type="submit" class="bouton">Publier mon avis</button>
        </form>
    </section>
        
    <script src="js/mustache.min.js"></script>
    <script src="js/script.js"></script>
    </main>
    <?php include 'includes/footer.php';?>     
</body>
</html>