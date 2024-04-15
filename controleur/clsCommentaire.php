<?php
require RACINE . "/modele/bdCommentaire.php";
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";
$messageErreur = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libelle = $_POST["libelle"];
    
    if(siUtilisateurConnecte()) {
        $idUtilisateur = $_SESSION['idUtilisateur'];
        
        // Création du commentaire
        $idCommentaire = creerCommentaire($libelle, $idUtilisateur);
        
        if ($idCommentaire) {
            $messageErreur = "Le commentaire a été créé avec succès.";
        } else {
            $messageErreur = "Une erreur est survenue lors de la création du commentaire.";
        }
    } else {
        
        $messageErreur = "Veuillez vous connecter pour ajouter un commentaire.";
    }
} 

include RACINE . "/vue/vueCommentaire.php";
?>
