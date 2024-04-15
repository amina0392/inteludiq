<?php
require RACINE . "/controleur/authentification.php";
require RACINE . "/controleur/activite.php";
require RACINE . "/modele/bdActivite.php";
require RACINE . "/modele/bdQuestion.php";
require RACINE . "/modele/bdCommentaire.php";
require RACINE . "/modele/bdMessage.php";
require RACINE . "/modele/bdUtilisateur.php";

// Vérifie si l'utilisateur demande la déconnexion
if (isset($_GET['deconnexion'])) {
    deconnexionUtilisateur();
    header("Location: ?action=accueil"); // Redirection après la déconnexion
    exit();
}

// Initialise le message d'erreur
$messageErreur = '';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie l'action à effectuer
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'creerQuestionImage':
                // Crée une question de type image
                if (isset($_POST['enonceImage'])) {
                    // Récupère l'idActivite en fonction de la matière sélectionnée
                    $matiere = $_POST['matiereImage'];
                    $idActivite = obtenirIdActiviteParMatiere($matiere);

                    if ($idActivite !== false) {
                        $enonce = $_POST['enonceImage'];
                        $image1 = $_FILES['image1'];
                        $image2 = $_FILES['image2'];
                        $image3 = $_FILES['image3'];
                        $imageLink1 = telechargerFichier($image1);
                        $imageLink2 = telechargerFichier($image2);
                        $imageLink3 = telechargerFichier($image3);

                        if ($imageLink1 !== false && $imageLink2 !== false && $imageLink3 !== false) {
                            $solutionLink = $_POST['choixImage'];
                            $resultat = creerQuestionImage($idActivite, $enonce, $imageLink1, $imageLink2, $imageLink3, $solutionLink);
                            if ($resultat) {
                                $messageErreur = "La question a été créée avec succès.";
                            } else {
                                $messageErreur = "Erreur lors de la création de la question.";
                            }
                        } else {
                            $messageErreur = "Erreur lors du téléchargement des images.";
                        }
                    } else {
                        $messageErreur = "Impossible de récupérer l'ID de l'activité.";
                    }
                } else {
                    $messageErreur = "Tous les champs nécessaires ne sont pas remplis pour la création de la question.";
                }
                break;

            case 'creerQuestionQcm':
                // Crée une question de type QCM
                if (isset($_POST['enonceQcm'])) {
                    // Récupèrer l'idActivite en fonction de la matière sélectionnée
                    $matiere = $_POST['matiereQcm'];
                    $idActivite = obtenirIdActiviteParMatiere($matiere);

                    if ($idActivite !== false) {
                        $enonce = $_POST['enonceQcm'];
                        $labels = [
                            $_POST['label1'],
                            $_POST['label2'],
                            $_POST['label3']
                        ];
                        $solution = $_POST['solutionQcm'];

                        $resultat = creerQuestionQcm($idActivite, $enonce, $labels[0], $labels[1], $labels[2], $solution);

                        if ($resultat) {
                            $messageErreur = "La question a été créée avec succès.";
                        } else {
                            $messageErreur = "Erreur lors de la création de la question.";
                        }
                    } else {
                        $messageErreur = "Impossible de récupérer l'ID de l'activité.";
                    }
                } else {
                    $messageErreur = "Tous les champs nécessaires ne sont pas remplis pour la création de la question.";
                }
                break;

            case 'supprimerUtilisateur':
                // Supprime un utilisateur par son idUtilisateur
                if (isset($_POST['idUtilisateur'])) {
                    $idUtilisateur = $_POST['idUtilisateur'];
                    $resultat = supprimerUtilisateurParId($idUtilisateur);

                    // Affiche un message en fonction du résultat
                    if ($resultat) {
                        $messageErreur = "L'utilisateur a été supprimé avec succès.";
                    } else {
                        $messageErreur = "Erreur lors de la suppression de l'utilisateur.";
                    }
                } else {
                    $messageErreur = "ID utilisateur non spécifié.";
                }
                break;

            case 'supprimerCommentaire':
                // Supprime un commentaire par son idCommentaire
                if (isset($_POST['idCommentaire'])) {
                    $idCommentaire = $_POST['idCommentaire'];
                    $resultat = supprimerCommentaire($idCommentaire);

                    // Affiche un message en fonction du résultat
                    if ($resultat) {
                        $messageErreur = "Le commentaire a été supprimé avec succès.";
                    } else {
                        $messageErreur = "Erreur lors de la suppression du commentaire.";
                    }
                } else {
                    $messageErreur = "ID commentaire non spécifié.";
                }
                break;
                
            default:
                $messageErreur = "Action non reconnue.";
                break;
        }
    } else {
        $messageErreur = "Action non spécifiée.";
    }
}

include RACINE . "/vue/vueAdministration.php";
