<?php

require RACINE . "/modele/bdQuestion.php";

$donneesCulture = obtenirQuestionsParActivite(6); 

include RACINE . "/vue/vueCulture.php";
?>
