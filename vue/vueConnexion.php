<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
<div class="containerTrois">
<div class="containerQuatre">
        <h1>Connexion</h1>
         <!-- Afficher le message d'erreur -->
         <?php if (!empty($messageErreur)) { ?>
                <div class="messageErreur"><?php echo $messageErreur; ?></div>
            <?php } ?>
        <form action="?action=connexion" method="post" onsubmit="return validerFormulaireConnexion()" novalidate>
            <div id="emailErreurCon" class="messageErreur"></div>
            <label for="emailConnexion">Email :</label>
            <input type="email" id="emailConnexion" name="email" placeholder="Entrez votre email" required>
            <div id="motDePasseErreurCon" class="messageErreur"></div>
            <label for="motDePasseConnexion">Mot de passe :</label>
            <input type="password" id="motDePasseConnexion" name="motDePasse" placeholder="Entrez votre mot de passe" required>
            
            <div class="redirection">   
            <a href="?action=inscription">Pas encore de compte InteludiQ ? Inscrivez-vous ici</a>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</div>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>