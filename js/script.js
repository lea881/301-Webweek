//J'initialise ma variable pour l'affichage de la liste des stages sur la page index
//Elle commence à 3 car j'ai déjà afficher les 3 premiers stages
let prochainStage = 3;

//Je me suis basé sur le TP d'AJAX pour afficher
//Fonction BOUTON VOIR PLUS page Index
function listerStages(idStage){
    // requete AJAX
    let xhttp = new XMLHttpRequest();
    // Appel à  l'API listerStage
    xhttp.open("GET", "api/listerStage.php?prochainStage=" + idStage, true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
        // Response
          let response = JSON.parse(this.responseText);
           // si le status vaut OK, tout c'est bien passé donc on peut récupérer les éléments du stage
          if(response["status"] == "OK"){
              if(response["stages"].length > 0) {
                // on récupère le modèle de bloc HTML à remplir pour les ressources
                  let template = document.getElementById('templateressources').innerHTML;
                  // on utilise Mustache pour faire le rendu
                  let rendered = Mustache.render(template, response);
                   // on met le contenu dans la div
                  document.getElementById('nouveauxStages').innerHTML += rendered;
                  // On décale de 3 les stages à afficher (pour ne pas réfficher les mêmes)
                  prochainStage = prochainStage + 3
              } else {
                  // On cache le bouton quand il n'y a plus de stages à afficher
                  document.getElementById('boutonVoirPlus').style.display = 'none';
              }
          }
       }
    };
    xhttp.send();
}


// on ajoute un écouteur à cet élément
function chargerStages() {
    // On récupère la liste des stages en fonction de la variable prochainStage
    listerStages(prochainStage);
}


//Je me suis basé sur le TP d'AJAX pour afficher
//Fonction RECHERCHE pour la page STAGE CARTE
function rechercherStages(valeur) {
    // requete AJAX
    let xhttp = new XMLHttpRequest();
    // Appel à  l'API rechercherStage
    xhttp.open("GET", "../api/rechercherStage.php?recherche=" + valeur, true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //Response
            let response = JSON.parse(this.responseText);
            if (response["status"] == "OK"){
                 // on récupère le modèle de bloc HTML à remplir pour les ressources
                let template = document.getElementById('templateressources').innerHTML;
                // on utilise Mustache pour faire le rendu
                let rendered = Mustache.render(template, response);
                // On remplace la liste de stage par la nouvelle liste en fonction de la recherche
                document.getElementById('resultatsRecherche').innerHTML = rendered;  
            }
        }
    };
    xhttp.send();
}


function rechercheListener() {
    let saisie = this.value;
    let listePHP = document.getElementById('listeCompleteStages');
    let barreRecherche = document.getElementById('resultatsRecherche');

    //Si il a 1 caractère saisie dans la barre de recherche, on efface tout les stages afficher au départ (pour n'afficher que les stages de la recherche)
    if (saisie.length >= 1) {
        if(listePHP) listePHP.style.display = 'none';
        rechercherStages(saisie); //On affiche le résultat de la recherche
    //Si il n'y a rien d'ecrit dans la barre de recherche, on reaffiche tout
    } else {
        if(listePHP) {listePHP.style.display = '';}
        barreRecherche.innerHTML = ""; //On efface l'ancien resultat de la recherche
        return;
    }
}


//CAROUSSEL PAGE ASSOC/GALERIE
let grilleImages = [
    "../img/photo-noir-blanc-couteau.png",
    "../img/photo-noir-blanc-prise.png",
    "../img/photo-noir-blanc_prise-proche.png",
    "../img/photo-noir-blanc-main.png"
];
let index = 0;
// 2. Ta fonction de logique (elle ne s'exécute pas toute seule)
function carrousel() {
    let imageElement = document.getElementById('imageAffiche');
    let boutonSuivant = document.getElementById('btnSuivant');

    // On vérifie si les éléments existent sur la page actuelle
    if (imageElement && boutonSuivant) {
        boutonSuivant.addEventListener('click', function() {
            index = index + 1;
            if (index >= grilleImages.length) {
                index = 0;
            }
            imageElement.src = grilleImages[index];
        });
    }
}

//AFFICHER LE MENU AU CLIC EN FORMAT MOBILE
function basculerMenu() {
    let bouton = document.getElementById('bouton');
    let menu = document.getElementById('menu');

    //Verifier si le menu est deja visible, si oui on le cache, sinon on l'affiche
    if (menu.style.display === "flex") {
        menu.style.display = "none";
        bouton.style.transform = "rotate(0deg)";
    } else {
        menu.style.display = "flex";
        bouton.style.transform = "rotate(180deg)";
    }
}


function init() {
    carrousel();
    // on recupere l'element boutonVoirPlus et on ajoute l'écouteur pour affiche plus de stages
    let boutonStage = document.getElementById('boutonVoirPlus');
    if (boutonStage) {
        boutonStage.addEventListener('click', chargerStages);
    }
    // on recupere l'element inputRecherche et on ajoute l'écouteur pour faire une recherche
    let barre = document.getElementById('inputRecherche');
    
    if (barre) {
        barre.addEventListener('input', rechercheListener);
    }
     // on recupere l'element bouton et on ajoute l'écouteur pour afficher le menu burger
    let boutonMenu = document.getElementById('bouton');
    if (boutonMenu !== null) {
        boutonMenu.addEventListener('click', basculerMenu);
    }
}

 
// Lancement au chargement de la page
window.addEventListener("load", init);

