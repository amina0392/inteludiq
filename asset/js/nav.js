document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour afficher ou masquer le sous-menu
    function basculerSousMenu(event) {
        event.preventDefault();
        let sousMenu = this.nextElementSibling;
        // Inverser l'état d'affichage du sous-menu
        sousMenu.style.display = sousMenu.style.display === 'block' ? 'none' : 'block';
    }

    // Sélection des éléments de déclenchement du sous-menu sur grand écran
    let elementsMenu = document.querySelectorAll('#menuH .aSousMenu > a');

    // Ajout d'un écouteur d'événement à chaque élément de déclenchement
    elementsMenu.forEach(function (item) {
        item.addEventListener('click', basculerSousMenu);
    });

    // Sélection de l'élément de déclenchement pour l'onglet "Activités"
    let ongletActivitesH = document.querySelector('#menuH a[href="?action=activites"]');
    let ongletActivitesB = document.querySelector('#burgerMenu a[href="?action=activites"]');

    // Vérifier si les éléments de menu existent avant d'ajouter des écouteurs d'événements
    if (ongletActivitesH) {
        ongletActivitesH.addEventListener('click', function (event) {
            event.preventDefault();
            window.location.href = "?action=activites";
        });
    }

    if (ongletActivitesB) {
        ongletActivitesB.addEventListener('click', function (event) {
            event.preventDefault();
            window.location.href = "?action=activites";
        });
    }

    // Sélection des éléments de déclenchement du sous-menu pour le menu burger
    let elementsMenuBurger = document.querySelectorAll('#menuBurger .aSousMenu > a');

    // Ajout d'un écouteur d'événement à chaque élément de déclenchement dans le menu burger
    elementsMenuBurger.forEach(function (item) {
        item.addEventListener('click', basculerSousMenu);
    });

    // Affichage du menu burger et gestion de son affichage
    let menuH = document.getElementById('menuH');
    let menuBurger = document.getElementById('menuBurger');
    let burgerMenu = document.getElementById('burgerMenu');

    // Vérifier si les éléments de menu existent avant de manipuler leur style
    if (burgerMenu) {
        burgerMenu.style.display = "none";
    }

    // Toujours afficher le menu burger sur les écrans mobiles
    if (window.innerWidth <= 768) {
        if (menuH) {
            menuH.style.display = "none";
        }
        if (menuBurger) {
            menuBurger.style.display = "block";
        }
    } else {
        if (menuH) {
            menuH.style.display = "block";
        }
        if (menuBurger) {
            menuBurger.style.display = "none";
        }
    }

    // Gestion de l'affichage du menu burger
    if (menuBurger) {
        menuBurger.addEventListener('click', function () {
            if (burgerMenu.style.display === 'block') {
                burgerMenu.style.display = 'none';
            } else {
                burgerMenu.style.display = 'block';
            }
        });
    }

    // Fonction pour ajuster l'affichage du menu en fonction de la taille de la fenêtre
    function ajusterAffichageMenu() {
        if (window.innerWidth <= 768) {
            if (menuH) {
                menuH.style.display = "none";
            }
            if (menuBurger) {
                menuBurger.style.display = "block";
            }
        } else {
            if (menuH) {
                menuH.style.display = "block";
            }
            if (menuBurger) {
                menuBurger.style.display = "none";
            }
        }
    }

    // Appeler la fonction d'ajustement de l'affichage du menu lors du redimensionnement de la fenêtre
    window.addEventListener('resize', ajusterAffichageMenu);
});
