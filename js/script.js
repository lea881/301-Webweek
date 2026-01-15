//J'initialise ma variable 
//Elle commence à 3 car j'ai déjà afficher les 3 premiers stages
let prochainStage = 3; 

//Je me suis basé sur le TP d'AJAX pour afficher
function listerStages(idStage){
    // requete AJAX
    let xhttp = new XMLHttpRequest();
    // Appel à  l'API
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

function init() {
    // on recupere l'element selectSAE et on ajoute l'écouteur
    const bouton = document.getElementById('boutonVoirPlus');
    bouton.addEventListener('click', chargerStages);
}

// Lancement au chargement de la page
window.addEventListener("load", init);