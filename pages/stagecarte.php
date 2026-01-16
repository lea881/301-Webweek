<?php 
include '../includes/header.php';
include '../includes/footer.php';
include_once '../classes/database.php';
include_once '../classes/stage.php';
include_once '../classes/lieu.php';

//Faire appel à la classe database
$db = database::getInstance('aikido'); 

// Requete pour récupérer tous les stages et leurs infos
$stages = $db->getObjects("SELECT * FROM stage", 'Stage', []);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Stages</title>
</head>
<body>
    <main>
      <?php foreach ($stages as $unStage) : ?>
        <?php 
            // Récupérer le lieu associé à chacun des stages afficher (avec la classe lieu)
            $idLieu = $unStage->getIdLieu();
            //Recuperer les infos du lieu en fonction de l'id sur la BDD
            $resultatsLieu = $db->getObjects("SELECT * FROM lieu WHERE idLieu = " . $unStage->getIdLieu(), 'Lieu', []);
            $lieu = $resultatsLieu[0];
        ?>
        
        <!-- Lien pour rediriger vers le stage en détail en fonction de l'id-->
        <a href="articlestage.php?id=<?php echo $unStage->getId(); ?>">
            
        <!-- Afficher les stages--> 
            <div class="cartestage">
                <img src="<?php echo $unStage->getImage(); ?>" alt="Affiche du stage" />
                <h3> · <?php echo $unStage->getNom(); ?></h3>

                <p><?php if ($unStage->getDateDebut()===$unStage->getDateFin()) {?>
                    Le <?php echo $unStage->getDateDebut();
                } 
                else { ?>
                    Du <?php echo $unStage->getDateDebut(); ?> au <?php echo $unStage->getDateFin(); 
                }?>
                </p> 
                <p> 
                    <?php echo $lieu->getVille(); ?>, 
                </p>
            </div>
        </a>
      <?php endforeach; ?>
    </main> 
</body>
</html>