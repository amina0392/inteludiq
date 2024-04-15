<?php
include RACINE . "/vue/menu.php";
?>
<main>

<div class="titre">
    <h1>Les activités InteludiQ!</h1>
    <p>Ces activités offrent aux enfants une opportunité d'apprentissage dynamique et interactif, les aidant à renforcer leurs compétences académiques et à élargir leur compréhension du monde qui les entoure. </p>
</div>
  <section class="containerActivites">
    <article class="articleActivites">
        <div class="colonneActivites">
            <img class="imgAccueil" src="asset\images\generic\petit.jpg" loading="lazy" alt="Petits enfants">
            <h2>Activités 3 à 5 ans</h2>
            <p>Pour les enfants de 3 à 5 ans, les activités d'apprentissage sont conçues de façon ludique, pour stimuler leur développement cognitif tout en favorisant leur curiosité naturelle.</p>
            <p><a class="btn" role="button" href="?action=troisCinq">Accéder</a></p>
        </div>
    </article>
    <article class="articleActivites">
        <div class="colonneActivites">
            <img class="imgAccueil" src="asset\images\generic\grand.jpg" loading="lazy" alt="Grands enfants">
            <h2>Activités 6 à 10 ans</h2>
            <p>Pour les enfants de 6 à 10 ans, une variété d'exercices stimulants sont disponibles pour renforcer leurs compétences en français, en mathématiques et en culture générale.</p>
            <p><a class="btn" href="?action=sixDix" role="button">Accéder</a></p>
        </div>
    </article>
</section>
</main>
<?php
include RACINE . "/vue/piedPage.php";
?>