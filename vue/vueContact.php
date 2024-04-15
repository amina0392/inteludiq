<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
<div class="containerTrois">
        <div class="containerQuatre">
            <h1>Contactez-nous</h1>
            <!-- Affichage des messages d'erreurs' -->
            <?php if (!empty($erreurMessage)) { ?>
                <div class="messageErreur"><?php echo $erreurMessage; ?></div>
            <?php } ?>
            <!-- Affichage du message de confirmation -->
            <?php if (isset($_SESSION['messageConfirmation'])) { ?>
                <div class="messageConfirmation"><?php echo $_SESSION['messageConfirmation']; ?></div>
                <?php unset($_SESSION['messageConfirmation']); ?> <!-- Suppression du message de la session après l'avoir affiché -->
            <?php } ?>
            <form action="?action=contact" method="post" onsubmit="return verifierFormulaireContact();" novalidate>
                <label for="nomContact">Nom :</label>
                <input type="text" id="nomContact" name="nom" placeholder="Entrez votre nom" value="<?php if (isset($_SESSION['idUtilisateur'])) echo($utilisateur["pseudo"])?>" required>
                <!-- Ajout de l'élément pour afficher les messages d'erreur -->
                <div id="nomErreur" class="messageErreur"></div>
                
                <label for="emailContact">Email :</label>
                <input type="email" id="emailContact" name="email" placeholder="Entrez votre email" value="<?php if (isset($_SESSION['idUtilisateur'])) echo($utilisateur["email"])?>" required>
                <!-- Ajout de l'élément pour afficher les messages d'erreur -->
                <div id="emailContactErreur" class="messageErreur"></div>

                <label for="messageContact">Message :</label>
                <textarea id="messageContact" name="message" placeholder="Entrez votre message" required></textarea>
                <!-- Ajout de l'élément pour afficher les messages d'erreur -->
                <div id="messageErreur" class="messageErreur"></div>

                <div class="rgpdMentions">
                <input type="checkbox" id="rgpdContact" name="rgpd" required>
                <label for="rgpdContact"><a href="?action=mentions">J'accepte les mentions légales et la politique de confidentialité RGPD.</a></label>
                </div>
                <!-- Ajout de l'élément pour afficher les messages d'erreur -->
                <div id="rgpdContainerErreur" class="messageErreur"></div>

                <button type="submit">Envoyer</button>
            </form>
           
        </div>
    </div>
</main>

<?php
include RACINE . "/vue/piedPage.php";
?>
