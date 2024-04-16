<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
    <div class="containerProfil">
        <?php if (isset($_SESSION['idUtilisateur'])) : ?>
            <!-- Lien de déconnexion -->
            <a class="btn" href="?action=profil&deconnexion=1" role="button">Déconnexion</a>
            <h1>Profil de <?php echo $utilisateur['pseudo']; ?></h1>
            <div class="infosUtilisateur">
                <h2>Informations personnelles</h2>
                <p><strong>Email :</strong> <?php echo $utilisateur['email']; ?></p>
                <p><strong>Âge :</strong> <?php echo $utilisateur['age']; ?></p>
                <!-- Lien vers la page de modification des informations personnelles -->
                <a class="btn" href="?action=modifProfil" role="button">Modifier mes informations</a>
            </div>

            <div class="commentaires">
                <h2>Commentaires :</h2>
                <ul>
                    <?php foreach ($commentaires as $commentaire) : ?>
                        <li>Date :<?php echo $commentaire['_date']; ?> <br>Commentaire :<?php echo $commentaire['libelle']; ?></li>

                    <?php endforeach; ?>
                </ul>
                <!-- Lien vers la page de commentaires -->
                <a class="btn" href="?action=commentaire" role="button">Ajouter un commentaire</a>
            </div>

            <div class="messages">
                <h2>Messages :</h2>
                <ul>
                    <?php foreach ($messages as $message) : ?>
                        <li>Date : <?php echo $message['_date']; ?> <br>Message : <?php echo $message['message']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- affichage des notes -->
            <?php if (!empty($activites) && isset($cumulNotesParActivite)) : ?>
    <div class="activites">
        <h2>Activités :</h2>
        <ul>
            <?php foreach ($activites as $activite) : ?>
                <li><?php echo $activite['matiere']; ?>
                    <ul>
                        <?php
                        // Recherche de l'entrée correspondant à l'ID de l'activité dans $cumulNotesParActivite
                        $cumul = 0; // Initialisation à 0 si aucune entrée n'est trouvée
                        foreach ($cumulNotesParActivite as $cumulActivite) {
                            if ($cumulActivite['idActivite'] == $activite['idActivite']) {
                                $cumul = $cumulActivite['somme_notes'];
                                break; // Sortir de la boucle dès qu'une correspondance est trouvée
                            }
                        }
                        ?>
                        <li>Dernier score: <?php echo $cumul; ?></li>
                    </ul> 
                </li> 
            <?php endforeach; ?>
        </ul> 
    </div>
<?php else : ?>
    <p>Aucune activité disponible pour l'âge de <?php echo $ageUtilisateur; ?> ans.</p>
<?php endif; ?>












            <div id="compte">
                <a href="?action=supCompte" role="button">Supprimer mon compte</a>
            </div>
        <?php else : echo ($_SESSION['idUtilisateur']) ?>
            <p>Veuillez vous connecter pour accéder à cette page.</p>
        <?php endif; ?>
    </div>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>