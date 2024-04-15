<?php
include RACINE . "/vue/menu.php";
?>
<main class="container">
  <div class="titre">
    <h1>Avec InteludiQ, apprendre c'est amusant!</h1>
  </div>
  <!-- section slider  -->
  <div class="slider">
    <div class="diapo">
      <img src="asset/images/generic/sliderAlphabet.png" loading="lazy" alt="alphabet">
      <div class="contenu">
        <h1>L'alphabet</h1>
        <p>Nous croyons que la culture générale peut être aussi captivante qu'instructive. Notre
          application combine l'éducation et l'excitation pour créer une expérience
          d'apprentissage holistique.</p>
          <?php
      // Vérifier si l'utilisateur est connecté
      if (isset($_SESSION['idUtilisateur'])) {
        echo '<a class="btnActivites" role="button" href="?action=alphabet">Accéder</a>';
      } else {
        echo '<a class="btnActivites" href="?action=connexion" role="button">Connexion</a>';
      }
      ?>
      </div>
    </div>

    <div class="diapo">
      <img src="asset/images/generic/sliderChiffre.png" loading="lazy" alt="chiffre">
      <div class="contenu">
        <h1>Les chiffres</h1>
        <p>Les activités sont conçues de manière progressive, permettant aux enfants de construire
          leur compréhension des mathématiques étape par étape.</p>
          <?php
      // Vérifier si l'utilisateur est connecté
      if (isset($_SESSION['idUtilisateur'])) {
        echo '<a class="btnActivites" role="button" href="?action=chiffres">Accéder</a>';
      } else {
        echo '<a class="btnActivites" href="?action=connexion" role="button">Connexion</a>';
      }
      ?>
      </div>
    </div>

    <div class="diapo">
      <img src="asset/images/generic/sliderCouleur.jpg" loading="lazy" alt="couleur">
      <div class="contenu">
        <h1>Les couleurs</h1>
        <p>Des illustrations vivantes, des animations engageantes et une interface conviviale créent
          un environnement propice à l'exploration et à l'apprentissage pour les jeunes esprits.
        </p>
        <?php
      // Vérifier si l'utilisateur est connecté
      if (isset($_SESSION['idUtilisateur'])) {
        echo '<a class="btnActivites" role="button" href="?action=couleurs">Accéder</a>';
      } else {
        echo '<a class="btnActivites" href="?action=connexion" role="button">Connexion</a>';
      }
      ?>
      </div>
    </div>
    <button class="precedent">&raquo;</button>
    <button class="suivant">&laquo;</button>
  </div>
  <!-- InteludiQ Résumé -->
  <div id="resume">
    <h2>Rejoignez-nous pour une aventure éducative passionnante !</h2>
    <p>Bienvenue sur InteludiQ, le site éducatif intelligent et ludique conçu pour accompagner les enfants dans leur apprentissage numérique ! Notre mission est d'offrir une expérience interactive et sécurisée, adaptée aux besoins des enfants de moins de 10 ans, ainsi qu'à leurs parents et éducateurs. Grâce à notre contenu éducatif de qualité, spécialement conçu pour correspondre aux niveaux de développement et d'apprentissage des enfants, nous encourageons l'autonomie, la motivation et le plaisir d'apprendre. Avec InteludiQ, les enfants peuvent explorer une variété de sujets, allant des mathématiques à la culture générale, à leur propre rythme, tout en bénéficiant d'une collaboration étroite avec des éducateurs pour garantir la qualité pédagogique.</p>
    <video controls="controls">
      <source src="asset/video/inteludiq.mp4" type="video/mp4"/>
      <source src="asset/video/inteludiq.webm" type="video/webm"/>
      <source src="asset/video/inteludiq.ogv" type="video/ogv"/>
    </video>
  </div>

<!-- section activités -->
<div class="titre">
  <h2>Les activités InteludiQ!</h2>
</div>
<section class="containerActivites">
  <article class="articleActivites">
    <div class="colonneActivites">
      <img class="imgAccueil" src="asset/images/generic/petit.jpg" loading="lazy" alt="Petits enfants">
      <h2>Activités 3 à 5 ans</h2>
      <p>Pour les enfants de 3 à 5 ans, les activités d'apprentissage sont conçues de façon ludique, pour stimuler leur développement cognitif tout en favorisant leur curiosité naturelle.</p>
      <?php
      // Vérifier si l'utilisateur est connecté
      if (isset($_SESSION['idUtilisateur'])) {
        echo '<p><a class="btn" role="button" href="?action=troisCinq">Accéder</a></p>';
      } else {
        echo '<p><a class="btn" href="?action=connexion" role="button">Connexion</a></p>';
      }
      ?>
    </div>
  </article>
  <article class="articleActivites">
    <div class="colonneActivites">
      <img class="imgAccueil" src="asset/images/generic/grand.jpg" loading="lazy" alt="Grands enfants">
      <h2>Activités 6 à 10 ans</h2>
      <p>Pour les enfants de 6 à 10 ans, une variété d'exercices stimulants sont disponibles pour renforcer leurs compétences en français, en mathématiques et en culture générale.</p>
      <?php
      // Vérifier si l'utilisateur est connecté
      if (isset($_SESSION['idUtilisateur'])) {
        echo '<p><a class="btn" href="?action=sixDix" role="button">Accéder</a></p>';
      } else {
        echo '<p><a class="btn" href="?action=connexion" role="button">Connexion</a></p>';
      }
      ?>
    </div>
  </article>
</section>
<section id="commentaire">
  <div class="titre">
    <h2>Avis et commentaires</h2>
  </div>
  <div class="commentaireBordure">
    <?php if (!empty($commentaires)) : ?>
      <ul class="commentairesList">
        <?php foreach ($commentaires as $commentaire) : ?>
          <li class="commentaireItem">
            <div class="commentaireHaut">
              <span class="pseudo"><?php echo $commentaire['pseudo']; ?></span>
              <span class="date"><?php echo $commentaire['_date']; ?></span>
            </div>
            <div class="commentaireContenu">
              <p><?php echo $commentaire['libelle']; ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else : ?>
      <p>Aucun commentaire disponible pour le moment.</p>
    <?php endif; ?>

    <!-- Afficher le bouton pour ajouter un commentaire -->
    <?php if (isset($_SESSION['idUtilisateur'])) : ?>
      <a class="btnCom" href="?action=commentaire" role="button">Ajouter un commentaire</a>
    <?php else : ?>
      <p id="com">Connectez-vous pour ajouter un commentaire.</p>
      <a class="btnCom" href="?action=connexion" role="button">Connexion</a>
    <?php endif; ?>
  </div>
</section>



</main>

<?php
include RACINE . "/vue/piedPage.php";
?>