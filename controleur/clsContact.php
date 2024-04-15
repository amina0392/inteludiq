<?php
require RACINE . "/modele/bdMessage.php";
require RACINE . "/modele/bdUtilisateur.php";
require RACINE . "/controleur/authentification.php";

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])) {
        // Récupère les valeurs du formulaire
        $nom = $_POST['nom']; 
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $idUtilisateur = obtenirIdUtilisateur($email);

        // Appelle la fonction creerMessage avec le nom ajouté
        creerMessage($nom, $email, $message, $idUtilisateur); 

        // Définir un message de confirmation dans la variable de session
        $_SESSION['messageConfirmation'] = "Votre message a été envoyé avec succès !";
    } else {
        // Gère l'erreur si des données sont manquantes dans le formulaire
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}

// Vérifie si l'utilisateur est connecté
if(siUtilisateurConnecte()) {
    // Récupère l'ID de l'utilisateur connecté
    $idUtilisateur = $_SESSION['idUtilisateur'];
    // Obtient les informations de l'utilisateur à partir de la base de données
    $utilisateur = obtenirInformationsUtilisateur($idUtilisateur);
}

include RACINE ."/vue/vueContact.php";
?>

