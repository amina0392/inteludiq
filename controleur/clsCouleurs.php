<?php

require RACINE . "/modele/bdQuestion.php";

$donneesCouleurs  = obtenirQuestionsParActivite(3); 

include RACINE . "/vue/vueCouleurs.php";
?>