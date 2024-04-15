<?php include RACINE . "/vue/menu.php"; ?>
<main class="container">
    <div class="titre">
        <h1>Mathématiques</h1>
    </div>
    <div class="propositions">
        <!-- Affichage des questions de type label récupérées depuis le contrôleur -->
        <?php foreach ($donneesMathematique as $question) : ?>
            <div class="question">
                <h2><?php echo $question['enonce']; ?></h2>
                <ul>
                    <li><label><input type="radio" name="question_<?php echo $question['idQuestion']; ?>" value="1" data-question="<?php echo $question['idQuestion']; ?>" data-reponse="1"> <?php echo $question['label1']; ?></label></li>
                    <li><label><input type="radio" name="question_<?php echo $question['idQuestion']; ?>" value="2" data-question="<?php echo $question['idQuestion']; ?>" data-reponse="2"> <?php echo $question['label2']; ?></label></li>
                    <li><label><input type="radio" name="question_<?php echo $question['idQuestion']; ?>" value="3" data-question="<?php echo $question['idQuestion']; ?>" data-reponse="3"> <?php echo $question['label3']; ?></label></li>
                </ul>
                <div class="messageContainer"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="propositions">
        <form action="?action=maths" method="post">
            <!-- Boucle pour inclure l'ID de chaque question -->
            <?php foreach ($donneesMathematique as $question) : ?>
                <input type="hidden" name="idQuestion[]" value="<?php echo $question['idQuestion']; ?>">
            <?php endforeach; ?>
            <!-- Affichage du score de l'utilisateur -->
        <div class="scoreContainer">
            <div class="scoreLabel">Votre score est de :</div>
            <div id="scoreUtilisateur" class="scoreValue">0</div>
        </div>
        </form>
    </div>
</main>
<?php include RACINE . "/vue/piedPage.php"; ?>
