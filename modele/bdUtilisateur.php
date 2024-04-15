<?php
// Vérifie si la constante de garde n'est pas définie
if (!defined('BD_UTILISATEUR_INCLUDED')) {
    define('BD_UTILISATEUR_INCLUDED', true);

    require RACINE . "/modele/bdConnexion.php";
    // Définition de la fonction d'inscription d'utilisateur
    function inscriptionUtilisateur($pseudo, $motDePasse, $email, $age)
    {
        $pdo = connexionPDO();
        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);
        $date = date("Y-m-d");
        $role = 2;

        try {

            $pseudoSecurise = htmlspecialchars($pseudo, ENT_QUOTES);
            $ageSecurise = htmlspecialchars($age, ENT_QUOTES);

            $stmt = $pdo->prepare("INSERT INTO utilisateur (pseudo, motDePasse, email, age, role, _date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$pseudoSecurise, $hashedPassword, $email, $ageSecurise, $role, $date]);
            return true; // Retourne true si l'inscription a réussi
        } catch (PDOException $e) {

            return false; // Retourne false en cas d'échec de l'inscription
        }
    }


    // Définition de la fonction de connexion d'utilisateur
    function connexionUtilisateur($email, $motDePasse)
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT idUtilisateur, role, motDePasse FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && isset($utilisateur['motDePasse']) && password_verify($motDePasse, $utilisateur['motDePasse'])) {
            return $utilisateur; // Retourne les informations de l'utilisateur s'il est authentifié avec succès
        } else {
            return false; // Retourne false si l'authentification échoue
        }
    }
    // Fonction pour obtenir les informations de l'utilisateur
    function obtenirInformationsUtilisateur($idUtilisateur)
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ?");
        $stmt->execute([$idUtilisateur]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
   // Fonction pour obtenir tous les utilisateurs
    function obtenirTousUtilisateurs()
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Fonction pour obtenir l'email de l'utilisateur à partir de son ID
    function obtenirEmailUtilisateur($idUtilisateur)
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT email FROM utilisateur WHERE idUtilisateur = ?");
        $stmt->execute([$idUtilisateur]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['email'];
    }

    //Fonction pour obtenir le pseudo de l'utilisateur à partir de son idUtilisateur
    function obtenirPseudoUtilisateur($idUtilisateur)
    {
        try {
            // Connexion à la base de données
            $connexion = connexionPDO();

            // Préparation de la requête SQL pour récupérer le pseudo de l'utilisateur
            $sql = "SELECT pseudo FROM utilisateur WHERE idUtilisateur = :idUtilisateur";

            // Préparation de la requête
            $stmt = $connexion->prepare($sql);

            // Liaison des paramètres
            $stmt->bindParam(":idUtilisateur", $idUtilisateur, PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();

            // Récupération du résultat
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

            // Fermeture de la connexion
            $connexion = null;

            return $resultat['pseudo']; // Retourne le pseudo de l'utilisateur
        } catch (PDOException $e) {
            die("Erreur lors de la récupération du pseudo de l'utilisateur : " . $e->getMessage());
        }
    }
    // Fonction pour obtenir l'Id de l'utilisateur à partir de son email
    function obtenirIdUtilisateur($email)
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT idUtilisateur FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['idUtilisateur'];
    }


    // Fonction pour vérifier si l'e-mail existe déjà dans la base de données
    function emailExisteDeja($email)
    {
        $pdo = connexionPDO();
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }
    // Fonction pour mettre à jour les informations de l'utilisateur dans la base de données
    function modifInfosUtilisateur($idUtilisateur, $nouvelEmail, $nouveauPseudo, $nouvelAge, $nouveauMotDePasse)
    {
        // Connexion à la base de données
        $pdo = connexionPDO();

        // Préparation de la requête SQL
        $sql = "UPDATE utilisateur SET ";
        $params = array();

        // Ajout des champs à mettre à jour seulement s'ils sont renseignés dans le formulaire
        if (!empty($nouvelEmail)) {
            $sql .= "email = ?, ";
            $params[] = $nouvelEmail;
        }

        if (!empty($nouveauPseudo)) {
            $sql .= "pseudo = ?, ";
            $params[] = htmlspecialchars($nouveauPseudo, ENT_QUOTES);
        }

        if (!empty($nouvelAge)) {
            $sql .= "age = ?, ";
            $params[] = htmlspecialchars($nouvelAge, ENT_QUOTES);
        }

        // Si un nouveau mot de passe est fourni, je le hash et l'ajoute à la requête
        if (!empty($nouveauMotDePasse)) {
            $hashedPassword = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);
            $sql .= "motDePasse = ?, ";
            $params[] = $hashedPassword;
        }

        // Supprime la virgule finale et compléter la requête
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE idUtilisateur = ?";
        $params[] = $idUtilisateur;

        // Préparation et exécution de la requête
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }


    // Fonction pour supprimer un utilisateur par son idUtilisateur
    function supprimerUtilisateurParId($idUtilisateur)
    {
        try {
            if ($idUtilisateur !== null) {
                // Connexion à la base de données
                $pdo = connexionPDO();

                // Requête de suppression de l'utilisateur
                $sql = 'DELETE FROM utilisateur WHERE idUtilisateur = :idUtilisateur';

                // Préparation de la requête
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':idUtilisateur', $idUtilisateur);

                // Exécution de la requête
                if ($stmt->execute()) {
                    return true; // Succès
                } else {
                    return false; // Échec
                }
            } else {
                return false; // ID null
            }
        } catch (PDOException $e) {
            return false; // Erreur PDO
        }
    }
}
