<?php
// Vérifie si la constante de garde n'est pas définie
if (!defined('BD_COMMENTAIRE_INCLUDED')) {
    define('BD_COMMENTAIRE_INCLUDED', true);
    require RACINE . "/modele/bdConnexion.php";

    // Fonction de création de commentaire
    function creerCommentaire($libelle, $idUtilisateur) {
        $pdo = connexionPDO();
        $date = date("Y-m-d");
        // Utilisation de htmlspecialchars pour échapper les caractères spéciaux
        $libelleSecurise = htmlspecialchars($libelle, ENT_QUOTES);
        $stmt = $pdo->prepare("INSERT INTO commentaire (libelle, _date, idUtilisateur) VALUES (?, ?, ?)");
        $stmt->execute([$libelleSecurise, $date, $idUtilisateur]);
        return $pdo->lastInsertId(); // Retourne l'ID du commentaire nouvellement créé
    }
     
    //  Fonction pour recuperer le commentaire avec l'id : idCommentaire
     
    function obtenirCommentaire($idCommentaire) {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();
    
            // Préparation de la requête SQL pour récupérer les activités selon l'âge de l'utilisateur
            $sql = "SELECT * FROM commentaire WHERE idCommentaire = :idCommentaire";
    
            // Préparation de la requête
            $stmt = $connexion->prepare($sql);    
            // Liaison des paramètres
            $stmt->bindParam(":idCommentaire", $idCommentaire, PDO::PARAM_INT);    
            // Exécution de la requête
            $stmt->execute();    
            // Récupération des résultats
            $commentaire = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connexion = null;
    
            return $commentaire;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération du commentaire : " . $e->getMessage());
        }
    }

   // Fonction pour obtenir les commentaires de l'utilisateur par l'idUtilisateur
   function obtenirCommentairesUtilisateur($idUtilisateur)
   {
       $pdo = connexionPDO();
       $stmt = $pdo->prepare("SELECT * FROM commentaire WHERE idUtilisateur = ?");
       $stmt->execute([$idUtilisateur]);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
    
    // Fonction pour recuperer tous les commentaires 
    
    function obtenirTousLesCommentaires()
    {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();
    
            // Préparation de la requête SQL pour récupérer les activités selon l'âge de l'utilisateur
            $sql = "SELECT * FROM commentaire";
    
            // Préparation de la requête
            $stmt = $connexion->prepare($sql);      
            // Exécution de la requête
            $stmt->execute();    
            // Récupération des résultats
            $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connexion = null;
    
            return $commentaires;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des commentaires : " . $e->getMessage());
        }
    }    
    
    //  Fonction pour recuperer les 5 derniers commentaires 
    function recupererDerniersCommentaires($limit = 5)
    {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();
    
            // Préparation de la requête SQL pour récupérer les 5 derniers commentaires
            $sql = "SELECT * FROM commentaire ORDER BY idCommentaire DESC LIMIT :limit";
    
            // Préparation de la requête
            $stmt = $connexion->prepare($sql);
    
            // Liaison des paramètres
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    
            // Exécution de la requête
            $stmt->execute();
    
            // Récupération des résultats
            $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connexion = null;
    
            return $commentaires;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des 5 derniers commentaires : " . $e->getMessage());
        }
    }
        
    // Fonction pour supprimer un commentaire de la base de données
     
    function supprimerCommentaire($idCommentaire) {
        try {
            if ($idCommentaire !== null) {
                // Connexion
                $pdo = connexionPDO();
                // Contruction de la requete de suppresion
                $sql = 'DELETE FROM commentaire WHERE idCommentaire = :idCommentaire';
                // Preparation du statement d'execution
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':idCommentaire', $idCommentaire);
                // Exécution du statement
                if ($stmt->execute()) {
                    echo 'Le commentaire ' . $idCommentaire . ' a été supprimé.';
                } 
            } else {
                echo 'Erreur lors de la suppression du commentaire - id null';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la suppression du commentaire ' . $idCommentaire . ' : ' . $e->getMessage();
        }
    }

}
?>
