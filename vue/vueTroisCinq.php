<?php
include RACINE . "/vue/menu.php";
?>
<main>
<div class="titre">
    <h1>Categorie 3 à 5 ans </h1>
</div>
<div class="caracteristique">
        <div class="caractImage">
            <img src="asset/images/alphabet/alpha.png" loading="lazy" alt="Image alphabet">
        </div>
        <div class="caractContenu">
            <h2>L'alphabet</h2>
            <p>Voyagez à travers des mondes magiques et découvrez les lettres de l'alphabet à chaque étape de votre aventure. Pratique de l'écriture des lettres, reconnaissance visuelle à travers des images, et répétition de l'ordre alphabétique.</p>
            <p><a class="btnActivites" href="?action=alphabet" role="button">Accéder</a></p>
        </div>
    </div>

    <hr class="caractDiviseur">

    <div class="caracteristique">
        <div class="caractImage">
            <img src="asset/images/chiffres/chiffres.png" loading="lazy" alt="Image générique">
        </div>
        <div class="caractContenu">
            <h2>Les chiffres</h2>
            <p>Apprenez à compter, à additionner et à soustraire à travers des jeux stimulants qui rendent les mathématiques aussi amusantes. Formation à l'écriture des chiffres, exercices de comptage et reconnaissance visuelle à travers des images.</p>
            <p><a class="btnActivites" href="?action=chiffres" role="button">Accéder</a></p>
        </div>
    </div>

    <hr class="caractDiviseur">

    <div class="caracteristique">
        <div class="caractImage">
            <img  src="asset/images/couleurs/couleur.png" loading="lazy" alt="Image générique">
        </div>
        <div class="caractContenu">
            <h2>Les couleurs</h2>
            <p>Des graphismes colorés, des personnages adorables et une interface conviviale créent un environnement propice à l'exploration et à l'apprentissage. Identification des couleurs primaires et secondaires à travers des images.</p>
            <p><a class="btnActivites" href="?action=couleurs" role="button">Accéder</a></p>
        </div>
    </div>   
</main>

<?php
include RACINE . "/vue/piedPage.php";
?>