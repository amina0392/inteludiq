// if (window.location.pathname === 'index.php' || window.location.search === '?action=accueil') {
    document.addEventListener("DOMContentLoaded", function() {
        const diapositives = document.querySelectorAll(".diapo");
        const nombreTotalDiapositives = diapositives.length;
        let diapositiveCourante = 0;
        const intervalleDiapo = 5000; // Interval en millisecondes (ici, 5 secondes)
        let timerDiapo;

        function afficherDiapo(n) {
            diapositives.forEach((diapo) => {
                diapo.style.display = "none";
            });
            diapositives[n].style.display = "block";
        }

        function diapoSuivante() {
            afficherDiapo(diapositiveCourante);
            diapositiveCourante = (diapositiveCourante + 1) % nombreTotalDiapositives;
        }

        function diapoPrecedente() {
            afficherDiapo(diapositiveCourante);
            diapositiveCourante = (diapositiveCourante - 1 + nombreTotalDiapositives) % nombreTotalDiapositives;
        }

        function diapoAutomatique() {
            diapoSuivante();
        }

        // Vérifiez si la classe .slider est présente sur la page
        const slider = document.querySelector(".slider");
        if (slider) {
            // Initialisez le slider uniquement si la classe .slider est présente
            afficherDiapo(diapositiveCourante); // Affichage initial de la première diapo
            timerDiapo = setInterval(diapoAutomatique, intervalleDiapo); // Démarrage automatique du slider

            const boutonSuivant = slider.querySelector(".suivant");
            const boutonPrecedent = slider.querySelector(".precedent");

            boutonSuivant.addEventListener("click", function() {
                diapoSuivante();
                clearInterval(timerDiapo);
                timerDiapo = setInterval(diapoAutomatique, intervalleDiapo);
            });

            boutonPrecedent.addEventListener("click", function() {
                diapoPrecedente();
                clearInterval(timerDiapo);
                timerDiapo = setInterval(diapoAutomatique, intervalleDiapo);
            });
        }
    });
// }



