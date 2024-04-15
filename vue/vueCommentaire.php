<?php
include RACINE . "/vue/menu.php";
?>

<main class="container">
<?php if (isset($_SESSION['idUtilisateur'])) : ?>
    <div class="titre">
        <h1>Commentaire</h1>
          <!-- Afficher le message d'erreur -->
          <?php if (!empty($messageErreur)) { ?>
                <div class="messageErreur"><?php echo $messageErreur; ?></div>
            <?php } ?>
        <p>Bonjour les amis ! Ici, c'est votre espace pour partager toutes vos pensées, idées et histoires amusantes. Nous sommes impatients de lire ce que vous avez à dire !</p>
        <p>Que vous souhaitiez parler de vos activités préférées, raconter une blague hilarante ou partager une expérience passionnante, c'est l'endroit parfait pour le faire.</p>
        <p>N'oubliez pas d'être gentils les uns envers les autres !</p>
    </div>
    <div class="containerComment">
        <form id="formComment" action="?action=commentaire" method="post">
            <textarea  name="libelle" placeholder="Votre commentaire ici..."></textarea><br>
            <button class="btn" type="submit">Ajouter </button>
        </form>
    </div>
    <?php else : echo ($_SESSION['idUtilisateur']) ?>
            <p>Veuillez vous connecter pour accéder à cette page.</p>
        <?php endif; ?>
</main>

<?php
include RACINE . "/vue/piedPage.php";
?>