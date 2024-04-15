<?php
require RACINE . "/modele/bdMessage.php";
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";

// Appelle la fonction obtenirMessages pour obtenir tous les messages
$listeMessages = obtenirMessages();

include RACINE . "/vue/vueListeMessages.php";
?>
