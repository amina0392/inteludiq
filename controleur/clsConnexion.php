<?php
require RACINE . "/modele/bdUtilisateur.php";

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['motDePasse'])) {
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];

    // Appele la fonction connexionUtilisateur avec les données soumises via le formulaire
    $utilisateur = connexionUtilisateur($email, $motDePasse);
    if ($utilisateur) {
        $_SESSION['idUtilisateur'] = $utilisateur['idUtilisateur'];
        $_SESSION['role'] = $utilisateur['role'];

        // Redirige vers la page de profil si l'utilisateur a le rôle autre que 1
        if ($utilisateur['role'] != 1) {
            header("Location: ?action=profil");
            exit();
        }
    } else {
        // Affiche un message d'erreur à la vue de connexion
        $messageErreur = "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
        include RACINE . "/vue/vueConnexion.php";
        exit(); // Arrête l'exécution du script après l'affichage du message
    }
} else {
    // Rediriger vers la page de connexion si le formulaire n'a pas été soumis
    include RACINE . "/vue/vueConnexion.php";
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}

// Vérifie si l'utilisateur est connecté et a le rôle 1
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    // Affiche la page d'administration
    include RACINE . "/vue/vueAdministration.php";
} else {
    // Redirige vers une page d'erreur ou afficher un message d'erreur
    echo "Accès non autorisé.";
}
?>


