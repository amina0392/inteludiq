<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
    <div class="titre">
        <h1>Chiffres</h1>
    </div>
    <div class="sliderContainer">
        <div id="sliderActivite">
            <!-- Images statiques pour le slider -->
            <img src="asset/images/chiffres/un.png" alt="un">
            <img src="asset/images/chiffres/deux.png" alt="deux">
            <img src="asset/images/chiffres/trois.png" alt="trois">
        </div>
    </div>

    <?php
    // Tableau indexé des chemins des fichiers audio
    $cheminsAudio = [
        "asset/audio/chif1",
        "asset/audio/chif2",
        // Ajoutez d'autres chemins audio au besoin
    ];

    // Boucle for pour générer le contenu
    for ($i = 0; $i < count($donneesChiffres); $i++) {
        $question = $donneesChiffres[$i];
        $audioPath = $cheminsAudio[$i % count($cheminsAudio)]; // Utiliser un chemin audio en boucle
    ?>
        <div class="question">
            <div class="audioContainer">
                <div class="audioSymbol">&#128266;</div>
                <!-- Afficher les fichiers audio au format MP3 et OGG -->
                <audio controls preload="none">
                    <source src="<?php echo $audioPath ?>.mp3" type="audio/mpeg">
                    <source src="<?php echo $audioPath ?>.ogg" type="audio/ogg">
                    <!-- Message si le navigateur ne supporte pas l'audio -->
                    Votre navigateur ne supporte pas l'élément audio.
                </audio>
            </div>
            <h2><?php echo $question['enonce']; ?></h2>
            <!-- Ajouter un attribut data-id pour stocker l'identifiant de la question -->
            <img src="<?php echo $question['imageLink1']; ?>" alt="Image 1" data-question="<?php echo $question['idQuestion']; ?>" data-reponse="1">
            <img src="<?php echo $question['imageLink2']; ?>" alt="Image 2" data-question="<?php echo $question['idQuestion']; ?>" data-reponse="2">
            <img src="<?php echo $question['imageLink3']; ?>" alt="Image 3" data-question="<?php echo $question['idQuestion']; ?>" data-reponse="3">
            <div class="messageContainer"></div>
        </div> 
    <?php
    }
    ?>

    <!-- Affichage du score de l'utilisateur -->
    <div class="scoreContainer">
        <div class="scoreLabel">Votre score est de :</div>
        <div id="scoreUtilisateur" class="scoreValue">0</div>
    </div>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>
