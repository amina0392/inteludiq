<?php
require RACINE . "/modele/bdCommentaire.php";
require RACINE . "/modele/bdUtilisateur.php";

// Récupère les 5 derniers commentaires
$commentaires = recupererDerniersCommentaires(5);

// Pour chaque commentaire, récupère le pseudo de l'utilisateur
foreach ($commentaires as &$commentaire) {
    $pseudo = obtenirPseudoUtilisateur($commentaire['idUtilisateur']);
    $commentaire['pseudo'] = $pseudo;
}
include RACINE . "/vue/vueAccueil.php";
?>