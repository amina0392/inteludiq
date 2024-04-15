<?php
/**
 * Controleur principal  
 */
if(!isset($_SESSION)){
    session_start();
}
require dirname(__FILE__) . "/controleur/configuration.php";
require RACINE . "/controleur/route.php";


// Initialise $action avec une valeur par défaut
$action = "defaut";

// Vérifie si l'action est définie dans l'URL
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

// Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirigeVers($action);

// Vérifie si le fichier du contrôleur existe
if (!file_exists(RACINE . "/controleur/" . $fichier)) {
    // Redirige vers le contrôleur dédié pour les erreurs 404
    $fichier = "clsPage404.php";
}

// Inclut le contrôleur correspondant à l'action demandée
require RACINE . "/controleur/" . $fichier;
?>
