<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
    <div class="titre">
        <h1>Alphabet</h1>
    </div>
    <div class="sliderContainer">
        <div id="sliderActivite">
            <!-- Images statiques pour le slider -->
            <img src="asset/images/alphabet/aComme.png" alt="Lettre a">
            <img src="asset/images/alphabet/bComme.png" alt="Lettre b">
            <img src="asset/images/alphabet/cComme.png" alt="Lettre c">
        </div>
    </div>

    <div class="propositions">
        <!-- Affichage des questions de type image récupérées depuis le contrôleur -->
        <?php foreach ($donneesAlphabet as $question) : ?>
            <div class="question">
                <div class="audioContainer">
                    <div class="audioSymbol">&#128266;</div>
                    <!-- Afficher les fichiers audio au format MP3 et OGG -->
                    <audio controls preload="none">
                        <?php
                        // Définir les chemins des fichiers audio en fonction de l'id de la question
                        $audioPath = "";
                        switch ($question['idQuestion']) {
                            case 1:
                                $audioPath = "asset/audio/alpha1";
                                break;
                            case 2:
                                $audioPath = "asset/audio/alpha2";
                                break;
                            default:
                                // Si l'id de la question n'est pas reconnu, sortir de la boucle
                                break;
                        }
                        ?>
                        <!-- Ajouter les sources pour les fichiers audio MP3 et OGG -->
                        <source src="<?php echo $audioPath ?>.mp3" type="audio/mpeg">
                        <source src="<?php echo $audioPath ?>.ogg" type="audio/ogg">
                        <!-- Message si le navigateur ne supporte pas l'audio -->
                        Votre navigateur ne supporte pas l'élément audio.
                    </audio>
                </div>
                <h2><?php echo $question['enonce']; ?></h2>
                <!-- Ajouter un attribut data-id pour stocker l'identifiant de la question -->
                <img src="<?php echo $question['imageLink1']; ?>" alt="Image 1" data-question=<?php echo $question['idQuestion']; ?> data-reponse=1>
                <img src="<?php echo $question['imageLink2']; ?>" alt="Image 2" data-question=<?php echo $question['idQuestion']; ?> data-reponse=2>
                <img src="<?php echo $question['imageLink3']; ?>" alt="Image 3" data-question=<?php echo $question['idQuestion']; ?> data-reponse=3>
                <div class="messageContainer"></div>
            </div>
        <?php endforeach; ?>

        <!-- Affichage du score de l'utilisateur -->
        <div class="scoreContainer">
            <div class="scoreLabel">Votre score est de :</div>
            <div id="scoreUtilisateur" class="scoreValue">0</div>
        </div>
    </div>
</main>

<?php
include RACINE . "/vue/piedPage.php";
?>