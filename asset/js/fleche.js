// Détecter le chargement de la page
window.addEventListener("load", function() {
  // Fonction pour mettre à jour l'attribut href en fonction de la taille de l'écran
  function mettreAJourHref() {
      let largeurFenetre = window.innerWidth;
      let lienRetourHaut = document.querySelector("#menuF a[href='#menuH']");
      
      if (largeurFenetre < 768) { // Taille de l'écran pour mobile (exemple: < 768px)
          lienRetourHaut.href = "#menuBurger";
      } else {
          lienRetourHaut.href = "#menuH";
      }
  }

  // Appeler la fonction pour la première fois pour définir l'attribut href initial
  mettreAJourHref();

  // Détecter le redimensionnement de la fenêtre pour mettre à jour l'attribut href en temps réel
  window.addEventListener("resize", mettreAJourHref);

  // Détecter le clic sur l'image de la flèche
  let imgFleche = document.getElementById("imgF");
  if (imgFleche) {
      imgFleche.addEventListener("click", function() {
          window.scrollTo({ top: 0, behavior: 'smooth' }); // Faire défiler vers le haut en douceur
      });
  }
});
