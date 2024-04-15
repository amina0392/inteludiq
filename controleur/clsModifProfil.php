<?php
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";

// Vérifie si l'utilisateur est connecté
if (!siUtilisateurConnecte()) {
    header("Location: ?action=connexion");
    exit();
}

$idUtilisateur = $_SESSION['idUtilisateur'];

// Récupère les informations de l'utilisateur depuis la base de données
$utilisateur = obtenirInformationsUtilisateur($idUtilisateur);

// Si le formulaire de modification est soumis
if(isset($_POST['nouveauEmail'],$_POST['nouveauPseudo'], $_POST['nouvelAge'])) {
    // Récupère les nouvelles informations depuis le formulaire
    $nouvelEmail = !empty($_POST['nouveauEmail']) ? $_POST['nouveauEmail'] : null;
    $nouveauPseudo = !empty($_POST['nouveauPseudo']) ? $_POST['nouveauPseudo'] : null;
    $nouvelAge = !empty($_POST['nouvelAge']) ? $_POST['nouvelAge'] : null;
    $nouveauMotDePasse = !empty($_POST['nouveauMotDePasse']) ? $_POST['nouveauMotDePasse'] : null;
    
    // Mets à jour les informations de l'utilisateur dans la base de données
    modifInfosUtilisateur($idUtilisateur, $nouvelEmail, $nouveauPseudo, $nouvelAge, $nouveauMotDePasse);
    
    // Redirige l'utilisateur vers sa page de profil après la mise à jour
    header("Location: ?action=profil");
    exit();
}


include RACINE . "/vue/vueModifProfil.php";
?>
