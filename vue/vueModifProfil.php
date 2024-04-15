<?php include RACINE . "/vue/menu.php"; ?>
<main class="container">
    <div class="titre">
        <h1>Modification du profil</h1>
    </div>
    <div class="containerTrois">
        <div class="containerQuatre">
            <!-- Afficher le message d'erreur -->
            <?php if (!empty($messageErreur)) { ?>
                <div class="messageErreur"><?php echo $messageErreur; ?></div>
            <?php } ?>
            <!-- Formulaire de modification -->
            <form action="?action=modifProfil" method="post" onsubmit="return validerFormulaireModification()" novalidate>
                <div id="emailErreurProfil" class="messageErreur"></div>
                <label for="nouveauEmail">Nouvel email :</label>
                <input type="email" id="nouveauEmail" name="nouveauEmail" placeholder="Entrez votre nouvel email">
                <div id="mdpErreurProfil" class="messageErreur"></div>
                <label for="nouveauMotDePasse">Nouveau mot de passe :</label>
                <input type="password" id="nouveauMotDePasse" name="nouveauMotDePasse" placeholder="Entrez votre nouveau mot de passe">
                <div id="pseudoErreurProfil" class="messageErreur"></div>
                <label for="nouveauPseudo">Nouveau pseudo :</label>
                <input type="text" id="nouveauPseudo" name="nouveauPseudo" placeholder="Entrez votre nouveau pseudo">
                <div id="ageErreurProfil" class="messageErreur"></div>
                <label for="nouvelAge">Nouvel âge :</label>
                <input type="number" id="nouvelAge" name="nouvelAge" placeholder="Entrez votre nouvel âge (minimum 3 ans)" min="3">
                <button type="submit">Modifier</button>
            </form>
        </div>
</main>
<?php include RACINE . "/vue/piedPage.php"; ?>