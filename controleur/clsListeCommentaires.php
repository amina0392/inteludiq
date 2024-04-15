<?php
require RACINE . "/modele/bdCommentaire.php";
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";

// Appelle la fonction obtenirMessages pour obtenir tous les messages
$listeCommentaires = obtenirTousLesCommentaires();
// Pour chaque commentaire, récupère le pseudo de l'utilisateur
foreach ($listeCommentaires as &$listeCommentaire) {
    $pseudo = obtenirPseudoUtilisateur($listeCommentaire['idUtilisateur']);
    $email = obtenirEmailUtilisateur($listeCommentaire['idUtilisateur']);
    $listeCommentaire['pseudo'] = $pseudo;
    $listeCommentaire['email'] = $email;

}
include RACINE . "/vue/vueListeCommentaires.php";
?>