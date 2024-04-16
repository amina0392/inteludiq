<?php
require RACINE . "/modele/bdActivite.php";
require RACINE . "/modele/bdQuestion.php";
require RACINE . "/modele/bdUtilisateur.php"; // Assurez-vous d'inclure le fichier contenant la fonction insererScoreUtilisateur

// Traite la requête de réponse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données JSON envoyées depuis le frontend
    $data = json_decode(file_get_contents('php://input'));
    
    // Vérifie la réponse en utilisant la fonction verifierReponseImage
    $reponseCorrecte = verifierReponseImage($data->idQuestion, $data->imageUrl);

    // Prépare la réponse à renvoyer
    $reponse = array();
    $reponse['correct'] = $reponseCorrecte;

    // Si la réponse est correcte
    if ($reponseCorrecte) {
        // Ajout d'un message associé à une réponse correcte
        $reponse['message'] = "Bonne réponse!";
        
        // Insérer le score dans la table de réponses
        insererScoreUtilisateur($_SESSION['idUtilisateur'], $data->idQuestion, +1); 
        
    } else {
        // Ajout d'un message associé à une réponse incorrecte
        $reponse['message'] = "Mauvaise réponse!";

        // Insérer le score dans la table de réponses
        insererScoreUtilisateur($_SESSION['idUtilisateur'], $data->idQuestion, 0); 
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



