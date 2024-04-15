<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
<div class="titre">
        <h1>Liste des utilisateurs</h1>
    </div>
    <div class="containerMessage">
        <?php if (!empty($listeUtilisateurs)) : ?>
            <ul class="messageList">
                <?php foreach ($listeUtilisateurs as $listeUtilisateur) : ?>
                    <li class="messageItem">
                        <div class="messageContent">
                            <p><?php echo "id : " . $listeUtilisateur['idUtilisateur'] . "<br>"; ?></p>
                            <p><?php echo "Pseudo : " . $listeUtilisateur['pseudo'] . "<br>"; ?></p>
                            <p><?php echo "Email: " . $listeUtilisateur['email'] . "<br>"; ?></p>
                            <p><?php echo "Age : " . $listeUtilisateur['age'] . "<br>"; ?></p>
                            <p><?php echo "Role : " . $listeUtilisateur['role'] . "<br>"; ?></p>
                            <p><?php echo "Date d'inscription: " . $listeUtilisateur['_date'] . "<br>"; ?></p>
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