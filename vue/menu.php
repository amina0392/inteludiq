<!DOCTYPE html>
<html lang="fr">
<?php
include RACINE . "/vue/enTete.php";
?>
<body>
    <header>
        <!-- menu grand écran -->
        <nav id="menuH">
            <ul>
                <li class="logo"><a href="?action=accueil"><img src="asset/images/generic/logo.png" alt="Logo"></a></li>
                <?php
                // Vérifier si l'utilisateur est connecté
                if (isset($_SESSION['idUtilisateur'])) {
                    // Afficher les liens pour l'utilisateur connecté
                    echo '<li><a href="?action=accueil">Accueil</a></li>';
                    echo '<li class="aSousMenu"><a href="?action=activites">Activités</a>
                            <ul class="sousMenu">
                    <li><a href="?action=troisCinq">3 à 5 ans</a></li>
                    <li><a href="?action=sixDix">6 à 10 ans</a></li>
                    </ul>
                   </li>';
                    echo '<li><a href="?action=mediatheque">Médiathèque</a></li>';
                    echo '<li><a href="?action=contact">Contact</a></li>';
                    // Vérifier si l'utilisateur a le rôle égal à 1 (administrateur)
                    if ($_SESSION['role'] == 1) {
                        // Si l'utilisateur est administrateur, afficher le lien vers l'administration
                        echo '<li><a href="?action=administration">Administration</a></li>';
                    } else {
                        // Sinon, afficher le lien vers le profil
                        echo '<li><a href="?action=profil">Profil</a></li>';
                    }
                } else {
                    // Afficher les liens pour l'utilisateur non connecté
                    echo '<li><a href="?action=accueil">Accueil</a></li>';
                    echo '<li><a href="?action=mediatheque">Médiathèque</a></li>';
                    echo '<li><a href="?action=contact">Contact</a></li>';
                    echo '<li><a href="?action=inscription">Inscription</a></li>';
                    echo '<li><a href="?action=connexion">Connexion</a></li>';
                }
                ?>
            </ul>
        </nav>
        <!-- menu burger visible que en version mobile  -->
        <div id="menuBurger">
            <div class="logo"><a href="?action=accueil"><img src="asset/images/generic/logo.png" alt="Logo"></a></div>
            <div id="burgerIcon"><img src="asset/images/generic/burger.jpg" alt="Menu"></div>
            <div id="burgerMenu">
                <ul>
                    <?php
                    // Afficher les liens pour l'utilisateur connecté ou non connecté
                    if (isset($_SESSION['idUtilisateur'])) {
                        // Afficher les liens pour l'utilisateur connecté
                        echo '<li><a href="?action=accueil">Accueil</a></li>';
                        echo '<li class="aSousMenu"><a href="?action=activites">Activités</a>
                        <ul class="sousMenu">
                        <li><a href="?action=troisCinq">3 à 5 ans</a></li>
                        <li><a href="?action=sixDix">6 à 10 ans</a></li>
                        </ul>
                        </li>';
                        echo '<li><a href="?action=mediatheque">Médiathèque</a></li>';
                        echo '<li><a href="?action=contact">Contact</a></li>';
                        // Vérifier si l'utilisateur a le rôle égal à 1 (administrateur)
                        if ($_SESSION['role'] == 1) {
                            // Si l'utilisateur est administrateur, afficher le lien vers l'administration
                            echo '<li><a href="?action=administration">Administration</a></li>';
                        } else {
                            // Sinon, afficher le lien vers le profil
                            echo '<li><a href="?action=profil">Profil</a></li>';
                        }
                    } else {
                        // Afficher les liens pour l'utilisateur non connecté
                        echo '<li><a href="?action=accueil">Accueil</a></li>';
                        echo '<li><a href="?action=mediatheque">Médiathèque</a></li>';
                        echo '<li><a href="?action=contact">Contact</a></li>';
                        echo '<li><a href="?action=inscription">Inscription</a></li>';
                        echo '<li><a href="?action=connexion">Connexion</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--fin menu burger visible que en version mobile  -->
    </header>