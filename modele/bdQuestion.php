<?php
// Vérifie si la constante de garde n'est pas définie
if (!defined('BD_QUESTION_INCLUDED')) {
    define('BD_QUESTION_INCLUDED', true);

    require RACINE . "/modele/bdConnexion.php";

    // Fonction pour récupérer les questions par activité
    function obtenirQuestionsParActivite($idActivite) {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();
    
            // Préparation de la requête SQL pour récupérer les questions par activité
            $sql = "SELECT q.idQuestion, q.enonce, qi.imageLink1, qi.imageLink2, qi.imageLink3
                    FROM question q
                    LEFT JOIN questionimage qi ON q.idQuestion = qi.idQuestion
                    WHERE q.idActivite = :idActivite";
    
            // Préparation de la requête
            $stmt = $connexion->prepare($sql);
    
            // Liaison des paramètres
            $stmt->bindParam(":idActivite", $idActivite, PDO::PARAM_INT);
    
            // Exécution de la requête
            $stmt->execute();
    
            // Récupération des résultats
            $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connexion = null;
    
            return $questions;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des questions : " . $e->getMessage());
        }
    }

    
    
    // Fonction pour récupérer les images des questions par activité
    function obtenirImagesQuestionsParActivite($idActivite) {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();
    
            // Préparation de la requête SQL pour récupérer les images des questions par activité
            $sql = "SELECT imageLink1, imageLink2, imageLink3 FROM questionimage 
                    INNER JOIN question ON questionimage.idQuestion = question.idQuestion 
                    WHERE question.idActivite = :idActivite";
    
            // Préparation de la requête
            $stmt = $connexion->prepare($sql);
    
            // Liaison des paramètres
            $stmt->bindParam(":idActivite", $idActivite, PDO::PARAM_INT);
    
            // Exécution de la requête
            $stmt->execute();
    
            // Récupération des résultats
            $imagesQuestions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connexion = null;
    
            return $imagesQuestions;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des images des questions : " . $e->getMessage());
        }
    }
    function obtenirLabelsQuestionsParActivite($idActivite)
{
    try {
        // Connexion à la base de données
        $connexion = connexionPDO();

        // Préparation de la requête SQL pour obtenir les labels des questions pour une activité donnée
        $sql = "SELECT q.idQuestion, qq.label1, qq.label2, qq.label3
                FROM question q
                INNER JOIN questionqcm qq ON q.idQuestion = qq.idQuestion
                WHERE q.idActivite = :idActivite";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(":idActivite", $idActivite, PDO::PARAM_INT);
        $stmt->execute();

        // Récupération des données
        $labels = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture de la connexion
        $connexion = null;

        return $labels;
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des labels des questions : " . $e->getMessage());
    }
}
     // Fonction pour créer une nouvelle question de type image
     function creerQuestionImage($idActivite, $enonce, $imageLink1, $imageLink2, $imageLink3, $solutionLink) {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();

            // Échapper l'énoncé pour éviter les injections XSS
            $enonceEchappe = htmlspecialchars($enonce, ENT_QUOTES);

            // Préparation de la requête SQL pour insérer une nouvelle question de type image
            $sql = "INSERT INTO question (idActivite, enonce) VALUES (:idActivite, :enonce)";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(":idActivite", $idActivite, PDO::PARAM_INT);
            $stmt->bindParam(":enonce", $enonceEchappe, PDO::PARAM_STR);
            $stmt->execute();

            // Récupérer l'ID de la question nouvellement insérée
            $idQuestion = $connexion->lastInsertId();

            // Préparation de la requête SQL pour insérer les détails de la question d'image
            $sqlImage = "INSERT INTO questionimage (idQuestion, imageLink1, imageLink2, imageLink3, solution) 
                         VALUES (:idQuestion, :imageLink1, :imageLink2, :imageLink3, :solution)";
            $stmtImage = $connexion->prepare($sqlImage);
            $stmtImage->bindParam(":idQuestion", $idQuestion, PDO::PARAM_INT);
            $stmtImage->bindParam(":imageLink1", $imageLink1, PDO::PARAM_STR);
            $stmtImage->bindParam(":imageLink2", $imageLink2, PDO::PARAM_STR);
            $stmtImage->bindParam(":imageLink3", $imageLink3, PDO::PARAM_STR);
            $stmtImage->bindParam(":solution", $solutionLink, PDO::PARAM_INT); 
            $stmtImage->execute();

           
            $connexion = null;

            return true; 
        } catch (PDOException $e) {
            die("Erreur lors de la création de la question : " . $e->getMessage());
        }
    }

 // Fonction pour créer une nouvelle question de type QCM
function creerQuestionQcm($idActivite, $enonce, $label1, $label2, $label3, $solution) {
    try {
        // Connexion à la base de données
        $connexion = connexionPDO();
        $enonceEchappe = htmlspecialchars($enonce, ENT_QUOTES);
        $label1Echappe = htmlspecialchars($label1, ENT_QUOTES);
        $label2Echappe = htmlspecialchars($label2, ENT_QUOTES);
        $label3Echappe = htmlspecialchars($label3, ENT_QUOTES);

        // Préparation de la requête SQL pour insérer une nouvelle question de type QCM
        $sql = "INSERT INTO question (idActivite, enonce) VALUES (:idActivite, :enonce)";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(":idActivite", $idActivite, PDO::PARAM_INT);
        $stmt->bindParam(":enonce", $enonceEchappe, PDO::PARAM_STR);
        $stmt->execute();

        // Récupère l'ID de la question nouvellement insérée
        $idQuestion = $connexion->lastInsertId();

        // Préparation de la requête SQL pour insérer les détails de la question QCM
        $sqlQcm = "INSERT INTO questionqcm (idQuestion, label1, label2, label3, solution) 
                   VALUES (:idQuestion, :label1, :label2, :label3, :solution)";
        $stmtQcm = $connexion->prepare($sqlQcm);
        $stmtQcm->bindParam(":idQuestion", $idQuestion, PDO::PARAM_INT);
        $stmtQcm->bindParam(":label1", $label1Echappe, PDO::PARAM_STR);
        $stmtQcm->bindParam(":label2", $label2Echappe, PDO::PARAM_STR);
        $stmtQcm->bindParam(":label3", $label3Echappe, PDO::PARAM_STR);
        $stmtQcm->bindParam(":solution", $solution, PDO::PARAM_INT); // Modifier ici
        $stmtQcm->execute();

        // Fermeture de la connexion
        $connexion = null;

        return true; // Retourne vrai si la question a été créée avec succès
    } catch (PDOException $e) {
        die("Erreur lors de la création de la question : " . $e->getMessage());
    }
}


 // Fonction pour vérifier la réponse à une question de type image
function verifierReponseImage($idQuestion, $solution) {
    try {
        // Connexion à la base de données
        $connexion = connexionPDO();

        // Récupère la solution de la question
        $sql = "SELECT solution FROM questionimage WHERE idQuestion = :idQuestion";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(":idQuestion", $idQuestion, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
        // Vérifie si la réponse fournie par l'utilisateur correspond à la solution
        $correct = ($solution == $result['solution']);

        // Ferme la connexion
        $connexion = null;

        return $correct;
    } catch (PDOException $e) {
        // Ajout d'un message de débogage pour afficher l'erreur
        error_log("Erreur lors de la vérification de la réponse : " . $e->getMessage());
        die("Erreur lors de la vérification de la réponse : " . $e->getMessage());
    }
}
// Fonction pour vérifier la réponse à une question de type label
function verifierReponseLabel($idQuestion, $reponseUtilisateur) {
    try {
        // Connexion à la base de données
        $connexion = connexionPDO();

        // Récupère la solution de la question
        $sql = "SELECT solution FROM questionqcm WHERE idQuestion = :idQuestion";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(":idQuestion", $idQuestion, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si la réponse fournie par l'utilisateur correspond à la solution
        $correct = ($reponseUtilisateur == $result['solution']);

        // Ferme la connexion
        $connexion = null;

        return $correct;
    } catch (PDOException $e) {
        // Ajout d'un message de débogage pour afficher l'erreur
        error_log("Erreur lors de la vérification de la réponse : " . $e->getMessage());
        die("Erreur lors de la vérification de la réponse : " . $e->getMessage());
    }
}

    
}
 
    
?>
