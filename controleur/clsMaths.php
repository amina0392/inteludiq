<?php

require RACINE . "/modele/bdQuestion.php";

$questionsMathematique = obtenirQuestionsParActivite(4);
$labelsMathematique = obtenirLabelsQuestionsParActivite(4); 

$donneesMathematique = array();
foreach ($questionsMathematique as $key => $question) {
    
    if (isset($labelsMathematique[$key])) {
       
        $donneesMathematique[$key] = array_merge($question, $labelsMathematique[$key]);
    } else {
     
        $donneesMathematique[$key] = $question;
    }
}


foreach ($donneesMathematique as $key => $q) {
    // Récupérer l'ID de la question
    $idQuestion = $q['idQuestion'];
    // Ajouter l'ID de la question au tableau associatif de données
    $donneesMathematique[$key]['idQuestion'] = $idQuestion;
}

include RACINE . "/vue/vueMaths.php"; 