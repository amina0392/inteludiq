<?php
// Vérifie si la constante de garde n'est pas définie
if (!defined('BD_CONNEXION_INCLUDED')) {
    define('BD_CONNEXION_INCLUDED', true);

    // Chargemeent de Dotenv
    require_once __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
    $dotenv->load();

    // Définition de la fonction de connexion PDO
    function connexionPDO() {
        try {
            // Utilisation des variables d'environnement pour la connexion PDO
            $serveur = $_ENV['DB_HOST'];
            $bd = $_ENV['DB_NAME'];
            $login = $_ENV['DB_USER'];
            $mdp = $_ENV['DB_PASSWORD'];

            $connexion = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch (PDOException $e) {
            die("Erreur de connexion PDO");
        }
    }
}
?>




