<footer id="menuF">
      <a href="?action=accueil" class="logo"><img src="asset/images/generic/logo.png" alt="Logo" ></a>
        <p>
          © 2024 - Amina ALI - Tous droits réservés -
          Site créé avec ❤️ pour les petits curieux -
          <a href="?action=mentions">  Mentions légales</a>
        </p>
      
    <a href="#menuH" ><img src="asset/images/generic/fleche.png" alt="Retour en haut" id="imgF"></a>
  </footer>
 
<script src="asset/js/nav.js"></script>


<?php if (!isset($_GET['action']) || $_GET['action'] == 'accueil' || $_GET['action'] == 'defaut'): ?>
    <script src="asset/js/slider.js"></script>
<?php endif; ?>

<?php if (isset($_GET['action']) && ($_GET['action'] == 'inscription' || $_GET['action'] == 'connexion')): ?>
    <script src="asset/js/formulaire.js"></script>
<?php endif; ?>

<?php if (isset($_GET['action']) && $_GET['action'] == 'contact'): ?>
    <script src="asset/js/contact.js"></script>
<?php endif; ?>

<?php if (isset($_GET['action']) && $_GET['action'] == 'modifProfil'): ?>
    <script src="asset/js/compte.js"></script>
<?php endif; ?>

<?php if (isset($_GET['action']) && $_GET['action'] == 'administration'): ?>
    <script src="asset/js/question.js"></script>
<?php endif; ?>

<?php if (isset($_GET['action']) && ($_GET['action'] == 'alphabet' || $_GET['action'] == 'chiffres' || $_GET['action'] == 'couleurs'|| $_GET['action'] == 'culture')): ?>
    <script src="asset/js/requeteImg.js"></script>
<?php endif; ?>
<?php if (isset($_GET['action']) && ($_GET['action'] == 'maths' || $_GET['action'] == 'francais')): ?>
    <script src="asset/js/requeteLabel.js"></script>
<?php endif; ?>

<?php if (isset($_GET['action']) && ($_GET['action'] == 'alphabet' || $_GET['action'] == 'chiffres' || $_GET['action'] == 'couleurs')): ?>
    <script src="asset/js/activite.js"></script>
<?php endif; ?>

</body>
</html>