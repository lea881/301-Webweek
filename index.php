<?php 
include_once 'classes/database.php';
include_once 'classes/stage.php';
include_once 'classes/lieu.php';
include_once 'classes/avis.php';

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
    <title>Accueil</title>
</head>
<body>
    <main>
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
        <?php foreach ($avis as $unAvis) : ?>
            <div class="avis">
                <h3><?php echo $unAvis->getNomAvis(). " ". $unAvis->getNoteAvis();?> /5 
                </h3>
                
                <?php echo $unAvis->getTitreAvis(). "<br>". $unAvis->getDescriptionAvis();?>
            </div>
            <form action="api/supprimerAvis.php" method="POST" class="formulaire-avis">
                <input type="hidden" name="idAvisActuel" value="<?php echo $unAvis->getIdAvis(); ?>">
                <button type="submit" class="supprimer">Supprimer l'avis</button>
            </form>
            <form action="api/modifierAvis.php" method="POST" class="formulaire-avis">
                <button type="submit" class="modifier">Modifier l'avis</button>
        </form>
        <?php endforeach ?>
            <section class="section-formulaire-avis">
    <h2>Laissez-nous votre avis</h2>
    
    <form action="api/ajouterAvis.php" method="POST" class="formulaire-avis">
        <div>
        <label>Nom :</label>
        <input type="text" id="nomAvis" name="nomAvis" required placeholder="Jean Dupont">
        </div>
        <div>
        <label>Titre de votre message :</label>
        <input type="text" id="titreAvis" name="titreAvis" required placeholder="Un super club !">
        </div>
        <div>
        <label>Note :</label>
        <select id="noteAvis" name="noteAvis" required>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
        </div>
        <div>    
        <label>Votre commentaire :</label>
        <textarea id="descriptionAvis" name="descriptionAvis" rows="5" required placeholder="Racontez votre expérience"></textarea>
        </div>

        <button type="submit" class="publier">Publier mon avis</button>
    </form>
</section>
                
        <script src="js/mustache.min.js"></script>
        <script src="js/script.js"></script>
    </main> 
</body>
</html>