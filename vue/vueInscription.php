<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
    <div class="containerTrois">
        <div class="containerQuatre">
            <h1>Inscription</h1>
              <!-- Afficher le message d'erreur -->
              <?php if (!empty($message)) { ?>
                <div class="messageErreur"><?php echo $message; ?></div>
            <?php } ?>
           
            <form action="?action=inscription" method="post" onsubmit="return validerFormulaireInscription()" novalidate>
                <div id="emailErreurIns" class="messageErreur"></div>
                <label for="emailInscription">Email :</label>
                <input type="email" id="emailInscription" name="email" placeholder="Entrez votre email">
                
                <div id="motDePasseErreurIns" class="messageErreur"></div>
                <label for="motDePasseInscription">Mot de passe :</label>
                <input type="password" id="motDePasseInscription" name="motDePasse" placeholder="Entrez votre mot de passe">
                
                <div id="confirmMotDePasseErreur" class="messageErreur"></div>
                <label for="confirmMotDePasse">Confirmez le mot de passe :</label>
                <input type="password" id="confirmMotDePasse" name="confirmMotDePasse" placeholder="Confirmez votre mot de passe">
                
                <div id="pseudoErreur" class="messageErreur"></div>
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
                
                <div id="ageErreur" class="messageErreur"></div>
                <label for="age">Âge :</label>
                <input type="number" id="age" name="age" placeholder="Entrez votre âge (minimum 3 ans)" min="3">
                

                <div class="rgpdMentions messageErreur">
                    <input type="checkbox" id="rgpdInscription" name="rgpd">
                    <label for="rgpdInscription"><a href="?action=mentions" target="_blank">J'accepte les mentions légales et la politique de confidentialité.</a></label>
                </div>
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>