<?php

require RACINE . "/modele/bdQuestion.php";

$donneesAlphabet = obtenirQuestionsParActivite(1); 

include RACINE . "/vue/vueAlphabet.php";
?>

