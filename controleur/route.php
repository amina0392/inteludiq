
<?php

/**
*	Module du routing (routage).
*	Chaque action est récupérée par la méthode : $_GET
*/

function redirigeVers($action = "defaut") {
    $lesActions = array(
        "defaut" => "clsAccueil.php",
        "accueil" => "clsAccueil.php",
        "activites" => "clsActivite.php",
        "troisCinq" => "clsTroisCinq.php",
        "sixDix" => "clsSixDix.php",
        "alphabet" => "clsAlpabet.php",
        "chiffres" => "clsChiffres.php",
        "couleurs" => "clsCouleurs.php",
        "maths" => "clsMaths.php",
        "francais"=> "clsFrancais.php",
        "culture" => 'clsCulture.php',
        "reponseImg" => 'clsReponseImage.php',
        "reponseLabel" => 'clsReponseLabel.php',
        "mediatheque" => "clsMediatheque.php",
        "contact" => "clsContact.php",
        "connexion" => "clsConnexion.php",
        "inscription" => "clsInscription.php",
        "mentions"=>"clsMentions.php",
        "profil" => "clsProfil.php",
        "modifProfil" => "clsModifProfil.php",
        "supCompte" => "clsSupCompte.php",
        "commentaire" => "clsCommentaire.php",
        "listeMessage" => "clsListeMessages.php",
        "listeCommentaire" => "clsListeCommentaires.php",
        "listeUtilisateur" => "clsListeUtilisateurs.php",
        "administration" => "clsAdministration.php",
    );

    // Si l'action demandée n'est pas trouvée dans le tableau $lesActions
    if (!array_key_exists($action, $lesActions)) {
        // Redirection vers le contrôleur dédié pour les erreurs 404
        return "clsPage404.php";
    }

    // Retourne le contrôleur correspondant à l'action demandée
    return $lesActions[$action];
}

?>