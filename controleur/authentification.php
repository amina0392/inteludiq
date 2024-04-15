<?php
require RACINE . "/modele/bdConnexion.php";
// Fonction si utilisateur est connecté
function siUtilisateurConnecte() {
    // Vérifie si l'utilisateur est connecté
    return isset($_SESSION['idUtilisateur']);
}

// Fonction pour obtenir l'ID de l'utilisateur connecté
function obtenirIdUtilisateurConnecte() {
    // Vérifie si l'utilisateur est connecté
    if(siUtilisateurConnecte()) {
        // Retourne l'ID de l'utilisateur connecté
        return $_SESSION['idUtilisateur'];
    } else {
        // L'utilisateur n'est pas connecté, retourne null ou une valeur par défaut selon votre besoin
        return null;
    }
}

// Fonction de déconnexion de l'utilisateur
function deconnexionUtilisateur() {
    // Déconnexion de l'utilisateur en détruisant la session
    session_start();
    session_destroy();
}

?>
