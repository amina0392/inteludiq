<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
    <div class="titre">
        <h1>Couleurs</h1>
    </div>
    <div class="sliderContainer">
        <div id="sliderActivite">
            <!-- Images statiques pour le slider -->
            <img src="asset/images/couleurs/noir.png" alt="Chapeau noir">
            <img src="asset/images/couleurs/vert.png" alt="Tortue verte">
            <img src="asset/images/couleurs/bleu.png" alt="Voiture bleu">
        </div>
    </div>

    <div class="propositions">
        <!-- Affichage des questions de type image récupérées depuis le contrôleur -->
        <?php foreach ($donneesCouleurs as $question) : ?>
            <div class="question">
                <h2><?php echo $question['enonce']; ?></h2>
                <!-- Ajouter un attribut data-id pour stocker l'identifiant de la question -->
                <img src="<?php echo $question['imageLink1']; ?>" 
                    alt="Image 1" data-question=<?php echo $question['idQuestion']; ?>
                    data-reponse=1>
                <img src="<?php echo $question['imageLink2']; ?>" 
                    alt="Image 2" data-question=<?php echo $question['idQuestion']; ?>
                    data-reponse=2 >
                <img src="<?php echo $question['imageLink3']; ?>" 
                    alt="Image 3" data-question=<?php echo $question['idQuestion']; ?>
                    data-reponse=3>
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