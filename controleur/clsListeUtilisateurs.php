<?php
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";

// Appel de la fonction obtenirMessages() pour obtenir tous les messages
$listeUtilisateurs = obtenirTousUtilisateurs();


include RACINE . "/vue/vueListeUtilisateurs.php";
?>