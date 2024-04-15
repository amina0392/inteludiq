<?php

require RACINE . "/modele/bdQuestion.php";

$questionsFrancais = obtenirQuestionsParActivite(5);
$labelsFrancais = obtenirLabelsQuestionsParActivite(5); 

$donneesFrancais = array();
foreach ($questionsFrancais as $key => $question) {
    
    if (isset($labelsFrancais[$key])) {
       
        $donneesFrancais[$key] = array_merge($question, $labelsFrancais[$key]);
    } else {
     
        $donneesFrancais[$key] = $question;
    }
}


foreach ($donneesFrancais as $key => $q) {
    // Récupérer l'ID de la question
    $idQuestion = $q['idQuestion'];
    // Ajouter l'ID de la question au tableau associatif de données
    $donneesFrancais[$key]['idQuestion'] = $idQuestion;
}

include RACINE . "/vue/vueFrancais.php"; 