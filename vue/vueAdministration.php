<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) : ?>
        <div class="containerUn">
            <div class="containerDeux">
                <!-- Lien de déconnexion -->
                <a href="?action=administration&deconnexion=1">Déconnexion</a>
                <h1>Adminisation InteludiQ</h1>
                <?php if (!empty($messageErreur)) { ?>
                    <div class="messageErreur"><?php echo $messageErreur; ?></div>
                <?php } ?>

                <!-- Formulaire pour créer une question de type Image -->
                <form action="?action=administration" method="post" enctype="multipart/form-data" onsubmit="return validerFormulaire()">
                    <h2>Actions administratives</h2>
                    <label for="action">Action :</label>
                    <select name="action" id="action" onchange="selectAction()">
                        <option value="creerQuestionImage">Créer une question de type Image</option>
                        <option value="creerQuestionQcm">Créer une question de type QCM</option>
                        <option value="supprimerUtilisateur">Supprimer un utilisateur par son idUtilisateur</option>
                        <option value="supprimerCommentaire">Supprimer un commentaire par son idCommentaire</option>
                        <option value="afficherMessage">Afficher les messages reçus</option>
                        <option value="afficherCommentaires">Afficher les commentaires reçus</option>
                        <option value="afficherUtlisateur">Afficher la liste des utilisateurs</option>
                    </select>
                    <!-- Création question image -->
                    <a name="creerQuestionImage"></a>
                    <div id="creationQuestionImage" class="form-group">
                        <h2>Créer une question de type Image</h2>
                        <label for="matiereImage">Matière :</label>
                        <select name="matiereImage" id="matiereImage">
                            <option value="alphabet">Alphabet</option>
                            <option value="chiffres">Chiffres</option>
                            <option value="couleurs">Couleurs</option>
                            <option value="cultureGenerale">Culture-G</option>
                        </select>
                        <label for="enonceImage">Énoncé :</label>
                        <input type="text" name="enonceImage" id="enonceImage" placeholder="Entrez l'énoncé">
                        <div>
                            <label for="image1">Image 1 :</label>
                            <input type="file" name="image1" id="image1" accept="image/png, image/jpeg" placeholder="Sélectionnez une image">
                            <input type="radio" name="choixImage" value="1">
                        </div>
                        <div>
                            <label for="image2">Image 2 :</label>
                            <input type="file" name="image2" id="image2" accept="image/png, image/jpeg" placeholder="Sélectionnez une image">
                            <input type="radio" name="choixImage" value="2">
                        </div>
                        <div>
                            <label for="image3">Image 3 :</label>
                            <input type="file" name="image3" id="image3" accept="image/png, image/jpeg" placeholder="Sélectionnez une image">
                            <input type="radio" name="choixImage" value="3">
                        </div>
                        <button class="btn" type="submit">Créer question Image</button>
                    </div>


                    <!-- Création question qcm -->
                    <a name="creerQuestionQcm"></a>
                    <div id="creationQuestionQcm" class="form-group">
                        <h2>Créer une question de type QCM</h2>
                        <label for="matiereQcm">Matière :</label>
                        <select name="matiereQcm" id="matiereQcm">
                            <option value="mathematiques">Mathématiques</option>
                            <option value="francais">Français</option>
                        </select>
                        <label for="enonceQcm">Énoncé :</label>
                        <input type="text" name="enonceQcm" id="enonceQcm" placeholder="Entrez l'énoncé">
                        <div>
                            <label for="label1">Option 1 :</label>
                            <input type="text" name="label1" id="label1" placeholder="Option 1">
                            <input type="radio" name="solutionQcm" value="1">
                        </div>
                        <div>
                            <label for="label2">Option 2 :</label>
                            <input type="text" name="label2" id="label2" placeholder="Option 2">
                            <input type="radio" name="solutionQcm" value="2">
                        </div>
                        <div>
                            <label for="label3">Option 3 :</label>
                            <input type="text" name="label3" id="label3" placeholder="Option 3">
                            <input type="radio" name="solutionQcm" value="3">
                        </div>
                        <button class="btn" type="submit">Créer question QCM</button>
                    </div>

                    <!-- Supression d'un utilisateur par son idUtilisateur -->
                    <a name="supprimerUtilisateur"></a>
                    <div id="suppressionUtilisateur" class="form-group">
                        <h2>Supprimer un utilisateur par son idUtilisateur</h2>
                        <label for="idUtilisateur">ID Utilisateur :</label>
                        <input type="number" name="idUtilisateur" id="idUtilisateur" placeholder="Entrez l'idUtilisateur">
                        <button class="btn" type="submit">Supprimer</button>
                    </div>
                    <!-- Suppression d'un commentaire par son idCommentaire -->
                    <a name="supprimerCommentaire"></a>
                    <div id="suppressionCommentaire" class="form-group">
                        <h2>Supprimer un commentaire par son idCommentaire</h2>
                        <label for="idCommentaire">ID Commentaire :</label>
                        <input type="number" name="idCommentaire" id="idCommentaire" placeholder="Entrez l'idCommentaire">
                        <button class="btn" type="submit">Supprimer</button>
                    </div>
                      <!-- Affichage des commentaires reçus -->
                      <a name="afficherCommentaires"></a>
                    <div>
                        <h2>Afficher les commentaires reçus</h2>
                        <a class="btn" href="?action=listeCommentaire" role="button">Afficher les commentaires</a>
                    </div>
                    <!-- Affichage des messages reçus -->
                    <a name="afficherMessage"></a>
                    <div>
                        <h2>Afficher les messages reçus</h2>
                        <a class="btn" href="?action=listeMessage" role="button">Afficher les messages</a>
                    </div>
                    <!-- Affichage de la liste des utilisateurs -->
                    <a name="afficherUtlisateur"></a>
                    <div>
                        <h2>Afficher la liste des utilisateurs</h2>
                        <a class="btn" href="?action=listeUtilisateur" role="button">Afficher la liste des utilisateurs</a>
                    </div>
                <?php else : ?>
                    <p>Accès non autorisé.</p>
            </div>
            </form>
        <?php endif; ?>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>