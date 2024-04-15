<?php
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";

// Vérifie si l'utilisateur est connecté
if (!siUtilisateurConnecte()) {
    header("Location: ?action=connexion");
    exit();
}

// Si l'utilisateur est connecté et demande la suppression de son compte
if (isset($_SESSION['idUtilisateur']) && isset($_POST['submitSupprimerCompte'])) {
    $idUtilisateur = $_SESSION['idUtilisateur'];
    
    // Supprime l'utilisateur de la base de données
    $resultat = supprimerUtilisateurParId($idUtilisateur);
    
    // Déconnecte de l'utilisateur
    deconnexionUtilisateur();
    
    if ($resultat) {
        // Redirige l'utilisateur vers la page d'accueil 
        header("Location: ?action=accueil");
        exit();
    } else {
        $messageErreur = "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
    $messageErreur = "Confirmation non reçue pour la suppression de compte.";
}

include RACINE . "/vue/vueSupCompte.php";
?>
