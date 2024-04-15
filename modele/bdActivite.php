<?php
// Vérifie si la constante de garde n'est pas définie
if (!defined('BD_ACTIVITE_INCLUDED')) {
    define('BD_ACTIVITE_INCLUDED', true);
    require RACINE . "/modele/bdConnexion.php";
    function obtenirActivitesSelonAge($age) {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();
    
            // Préparation de la requête SQL pour récupérer les activités selon l'âge de l'utilisateur
            $sql = "SELECT idActivite, matiere FROM activite WHERE min_age <= :age AND max_age >= :age";
    
            // Préparation de la requête
            $stmt = $connexion->prepare($sql);
    
            // Liaison des paramètres
            $stmt->bindParam(":age", $age, PDO::PARAM_INT);
    
            // Exécution de la requête
            $stmt->execute();
    
            // Récupération des résultats
            $activites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connexion = null;
    
            return $activites;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des activités : " . $e->getMessage());
        }
    }
}   

// Récupère l'ID de l'activité en fonction de la matière
function obtenirIdActiviteParMatiere($matiere) {
    // Connexion à la base de données
    $connexion = connexionPDO();
    
    // Requête SQL pour obtenir l'ID de l'activité
    $sql = "SELECT idActivite FROM activite WHERE matiere = :matiere";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(":matiere", $matiere, PDO::PARAM_STR);
    $stmt->execute();
    
    // Récupère l'ID de l'activité
    $idActivite = $stmt->fetchColumn();
    
    // Ferme la connexion
    $connexion = null;
    
    return $idActivite;
}

?>
