<?php
require_once RACINE . "/modele/bdActivite.php";
require_once RACINE . "/modele/bdQuestion.php";

// Traite la requête de réponse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données JSON envoyées depuis le frontend
    $data = json_decode(file_get_contents('php://input'));

    // Vérifie la réponse en utilisant la fonction verifierReponseLabel
    $reponseCorrecte = verifierReponseLabel($data->idQuestion, $data->label);

    // Prépare la réponse à renvoyer
    $reponse = array();
    $reponse['correct'] = $reponseCorrecte;

    // Si la réponse est correcte
    if ($reponseCorrecte) {
        // Ajout d'un message associées à une réponse correcte
        $reponse['message'] = "Bonne réponse!";
         // Insérer le score dans la table de réponses
         insererScoreUtilisateur($_SESSION['idUtilisateur'], $data->idQuestion, 1); // Score de 1 pour une réponse correcte
       
    } else {
        // Ajout d'un message associées à une réponse incorrecte
        $reponse['message'] = "Mauvaise réponse!";
            // Insérer le score dans la table de réponses
            insererScoreUtilisateur($_SESSION['idUtilisateur'], $data->idQuestion, 0); // Score de 0 pour une réponse incorrecte
    }

    // Renvoi la réponse JSON
    header('Content-Type: application/json');
    echo json_encode($reponse);
    exit;
}

// Si l'action n'est pas valide ou si la méthode de requête n'est pas POST,
// renvoi une erreur
http_response_code(400);
echo json_encode(array('error' => 'Action non valide'));
?>
