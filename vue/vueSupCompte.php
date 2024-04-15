<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">

    <div class="containerTrois">
        <div class="containerQuatre">
            <!-- Afficher le message d'erreur -->
            <?php if (!empty($messageErreur)) { ?>
                <div class="messageErreur"><?php echo $messageErreur; ?></div>
            <?php } ?>
            <div class="titre">
                <h1>Suppression de compte</h1>
                <p>Es-tu sûr(e) de vouloir supprimer ton compte ?</p>
                <p>Cela signifie que tu diras au revoir à ton espace. <br>Si tu es certain(e), clique sur 'Supprimer mon compte', sinon nous pourrons continuer à jouer ensemble !</p>

            </div>
            <!-- Formulaire de suppression de compte -->
            <div id="compte">
                <img src="asset/images/generic/triste.png" alt="Orange triste">
                <form id="supprimerCompte" action="?action=supCompte" method="post">
                    <button type="submit" name="submitSupprimerCompte" onclick="return confirm('Es-tu sûr(e) de vouloir supprimer ton compte ? Cela signifie que tu diras au revoir à ton espace.')">Supprimer mon compte</button>
                </form>


            </div>
        </div>
    </div>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>