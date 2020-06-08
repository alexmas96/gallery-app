"use strict";

class Gallery {
  constructor() {
    // formation des variables qui representent le container des boutons et le container des resultats
    this.categoryBtns = document.getElementById("btns");
    this.orderedGallery = document.getElementById("byCategory");
  }

  init() {
    // appele de la fonction pour recuperer toutes les peintures
    this.onInitGetPaintings();
    // ajout d'un evenement au click pour le container des boutons
    this.categoryBtns.addEventListener(
      "click",
      this.onSelectCategory.bind(this)
    );
  }
  onInitGetPaintings(){
    // fabriquation de la requete ajax pour recuperer toutes les peintures
    const url = getRequestUrl() + "/gallery?id=0";
    $.getJSON(url, this.onAjaxLoadCategory.bind(this));
  }  

  // fonction qui s'execute au clique sur un bouton
  onSelectCategory(e) {
    // recuperation du nom de l'element cliqué
    var name = e.target.dataset.name;
    if (name == "category"){
      var id = e.target.dataset.category;
    }
    if(name == "theme"){
      var id = e.target.dataset.theme;
    }
    console.log(name);
    console.log(id);
    // fabrication de la requete ajax en y injectant le nom et l'id de l'element cliqué
    var url = getRequestUrl() + "/gallery?id=" + id +"&name=" + name;
    $.getJSON(url, this.onAjaxLoadCategory.bind(this));
  }


  //animation au hover
  onAnimatePainting(e) {
    var paint = e.target;
    paint.classList.remove("animated");
    paint.classList.add("scale");
    paint.addEventListener("mouseout", function(){
      paint.classList.remove("scale");
    })
    // paint.css("transform", "scale(1.2)");
  }


  // fonctions de callback ajax qui va s'executer si la fonction ajax a été executé avec succés
  onAjaxLoadCategory(paintsByCategory) {
    this.orderedGallery.innerHTML = "";
    console.log(paintsByCategory.results);

    $.each(paintsByCategory, function(index, paint) {
      let paintContainer = $("<article class='text-center' style='display:flex; flex-direction: row; justify-content: space-around'>");
      if (paint.Name !== null) {
        paintContainer.append(
          `<a href="${getRequestUrl()}/showpaint?id=${paint.Id}#${
            paint.Name
          }"><div class="animated  painting" style="background-image: url('${getWwwUrl()}/images/paints/${
            paint.Photo
          }'); background-size:cover; background-position:center;"> `
        );
      }

      $("#byCategory").append(paintContainer);
    });
    var painting = document.querySelectorAll(".painting");
    console.log(painting);
    // ajout de l'animation pour chaque peinture recupérées
    painting.forEach(element => {
      element.addEventListener("mouseover", this.onAnimatePainting.bind(this));
    });
  }
}

// Initialisation de la gallery 
const gallery = new Gallery();
gallery.init();
