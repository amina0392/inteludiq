<?php
// Vérifie si la constante de garde n'est pas définie
if (!defined('BD_MESSAGE_INCLUDED')) {
    define('BD_MESSAGE_INCLUDED', true);
    require RACINE . "/modele/bdConnexion.php";
    // Fonction creerMessage 
    function creerMessage($nom, $email, $message, $idUtilisateur)
    {
        $pdo = connexionPDO();
        $date = date("Y-m-d");

        // Utilisation de htmlspecialchars pour sécuriser les variables $nom et $message
        $nomSecurise = htmlspecialchars($nom, ENT_QUOTES);
        $messageSecurise = htmlspecialchars($message, ENT_QUOTES);

        // Vérifie si l'utilisateur est inscrit
        if ($idUtilisateur !== null) {
            // L'utilisateur est inscrit, nous avons son ID
            $stmt = $pdo->prepare("INSERT INTO contact (nom, email, message, _date, idUtilisateur) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nomSecurise, $email, $messageSecurise, $date, $idUtilisateur]);
        } else {
            // L'utilisateur n'est pas inscrit, stocker le message sans ID utilisateur
            $stmt = $pdo->prepare("INSERT INTO contact (nom, email, message, _date) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nomSecurise, $email, $messageSecurise, $date]);
        }

        return $pdo->lastInsertId();
    }
    // Fonction pour obtenir les messages de l'utilisateur
    function obtenirMessagesUtilisateur($idUtilisateur)
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT * FROM contact WHERE idUtilisateur = ?");
        $stmt->execute([$idUtilisateur]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fonction pour obtenir les messages de l'utilisateur
    function obtenirMessages()
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT * FROM contact ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fonction pour répondre à un message par l'email de l'utilisateur
    function repondreMessage($emailUtilisateur, $reponseMessage)
    {
        try {
            // Connexion à la base de données
            $pdo = connexionPDO();

            // Préparation de la requête SQL pour récupérer l'ID de l'utilisateur par son email
            $stmt = $pdo->prepare("SELECT idUtilisateur FROM contact WHERE email = ?");
            $stmt->execute([$emailUtilisateur]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $idUtilisateur = $row['idUtilisateur'];

            // Si l'utilisateur existe, nous pouvons insérer la réponse dans la base de données
            if ($idUtilisateur) {
                $date = date("Y-m-d");
                // Utilisation de htmlspecialchars pour sécuriser la réponse
                $reponseMessageSecurise = htmlspecialchars($reponseMessage, ENT_QUOTES);
                $stmtInsert = $pdo->prepare("INSERT INTO contact (nom, email, message, _date, idUtilisateur) VALUES (?, ?, ?, ?, ?)");
                $stmtInsert->execute(['Admin', $emailUtilisateur, $reponseMessageSecurise, $date, $idUtilisateur]);
                return true; // Retourne vrai si la réponse a été ajoutée avec succès
            } else {
                return false; // Retourne faux si l'utilisateur n'existe pas
            }
        } catch (PDOException $e) {
            die("Erreur lors de la réponse au message : " . $e->getMessage());
        }
    }
}
