<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
<div class="titre">
        <h1>Messages reçus</h1>
    </div>
    <div class="containerMessage">
        <?php if (!empty($listeMessages)) : ?>
            <ul class="messageList">
                <?php foreach ($listeMessages as $listeMessage) : ?>
                    <li class="messageItem">
                        <div class="messageContent">
                            <p><?php echo "Nom : " . $listeMessage['nom'] . "<br>"; ?></p>
                            <p><?php echo "Email : " . $listeMessage['email'] . "<br>"; ?></p>
                            <p><?php echo "Date : " . $listeMessage['_date'] . "<br>"; ?></p>
                            <p><?php echo "Message : " . $listeMessage['message'] . "<br>"; ?></p>
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