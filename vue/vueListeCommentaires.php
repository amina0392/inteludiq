<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
<div class="titre">
        <h1>Commentaires reçus</h1>
    </div>
    <div class="containerMessage">
        <?php if (!empty($listeCommentaires)) : ?>
            <ul class="messageList">
                <?php foreach ($listeCommentaires as $listeCommentaire) : ?>
                    <li class="messageItem">
                        <div class="messageContent">
                            <p><?php echo "Pseudo: " . $listeCommentaire['pseudo'] . "<br>"; ?></p>
                            <p><?php echo "Email : " . $listeCommentaire['email'] . "<br>"; ?></p>
                            <p><?php echo "Date : " . $listeCommentaire['_date'] . "<br>"; ?></p>
                            <p><?php echo "Commentaire : " . $listeCommentaire['libelle'] . "<br>"; ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Aucun commentaire disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</main>


<?php
include RACINE . "/vue/piedPage.php";
?>