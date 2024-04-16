<?php
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/modele/bdActivite.php";
require RACINE . "/modele/bdQuestion.php";
require RACINE . "/modele/bdCommentaire.php";
require RACINE . "/modele/bdMessage.php";
require RACINE . "/controleur/authentification.php";

// Vérifie si l'utilisateur demande la déconnexion
if (isset($_GET['deconnexion'])) {
    deconnexionUtilisateur();
    header("Location: ?action=accueil"); // Redirige à l'accueil après la déconnexion
    exit();
}

// Vérifie si l'utilisateur est connecté
if (siUtilisateurConnecte()) {
    // Récupère l'ID de l'utilisateur connecté
    $idUtilisateur = $_SESSION['idUtilisateur'];

    // Obtient les informations de l'utilisateur à partir de la base de données
    $utilisateur = obtenirInformationsUtilisateur($idUtilisateur);

    // Obtient les commentaires de l'utilisateur à partir de la base de données
    $commentaires = obtenirCommentairesUtilisateur($idUtilisateur);

    // Obtenir les messages de l'utilisateur à partir de la base de données
    $messages = obtenirMessagesUtilisateur($idUtilisateur);

    // Récupèrer l'âge de l'utilisateur
    $ageUtilisateur = $utilisateur['age'];

    $activites = obtenirActivitesSelonAge($ageUtilisateur);
    
    // Obtenez le cumul des notes par activité pour l'utilisateur actuel
    $cumulNotesParActivite = calculerCumulNotesParActivite($idUtilisateur);
   
}

include RACINE . "/vue/vueProfil.php";
