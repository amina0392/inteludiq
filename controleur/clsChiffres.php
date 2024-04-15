<?php

require RACINE . "/modele/bdQuestion.php";

$donneesChiffres  = obtenirQuestionsParActivite(2); 

include RACINE . "/vue/vueChiffres.php";
?>