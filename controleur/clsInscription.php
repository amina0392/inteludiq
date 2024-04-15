<?php

require RACINE . "/modele/bdUtilisateur.php";

// Définie une variable pour stocker le message d'erreur
$message = "";

// Vérifie si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pseudo'], $_POST['email'], $_POST['motDePasse'], $_POST['age'])) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $age = $_POST['age'];

    // Vérifie si l'email existe déjà
    if (emailExisteDeja($email)) {
        // Affecte un message d'erreur
        $message = "Il existe déjà un compte avec cette adresse e-mail. Veuillez vous connecter.";
    } else {
        // Appelle la fonction inscriptionUtilisateur avec les données soumises via le formulaire
        if (inscriptionUtilisateur($pseudo, $motDePasse, $email, $age)) {
            // Redirige vers la page de connexion ou autre traitement après l'inscription réussie
            header("Location: ?action=connexion");
            exit(); // Arrête l'exécution du script après la redirection
        } else {
            // Affecte un message d'erreur si l'inscription échoue
            $message = "L'inscription a échoué. Veuillez réessayer.";
        }
    }
}


include RACINE . "/vue/vueInscription.php";

