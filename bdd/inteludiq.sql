-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 avr. 2024 à 12:03
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inteludiq`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `idActivite` int(11) NOT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`idActivite`, `matiere`, `min_age`, `max_age`) VALUES
(1, 'alphabet', 3, 5),
(2, 'chiffres', 3, 5),
(3, 'couleurs', 3, 5),
(4, 'mathematiques', 6, 10),
(5, 'français', 6, 10),
(6, 'cultureGenerale', 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `_date` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `libelle`, `_date`, `idUtilisateur`) VALUES
(1, 'Le site InteludiQ est super !', '2024-04-10', 4),
(2, 'J&#039;aime beaucoup apprendre avec InteludiQ !', '2024-04-10', 2),
(3, 'Avec InteludiQ, je m&#039;améliore en maths. ', '2024-04-10', 3),
(4, 'Merci d&#039;avoir créer IntelidiQ !', '2024-04-10', 3),
(5, 'Les activités sont chouettes !', '2024-04-10', 5);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `_date` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `email`, `message`, `_date`, `idUtilisateur`, `nom`) VALUES
(1, 'minimina9@outlook.fr', 'Test message', '2024-03-27', 1, 'Amina'),
(2, 'minimina9@outlook.fr', 'Je peux ajouter des messages', '2024-03-28', 1, 'Amina'),
(3, 'tania@gmail.com', 'Je trouve les maths trop top', '2024-03-28', 3, 'Tania'),
(4, 'tania@gmail.com', 'Je voudrais jouer aux activités des petits', '2024-03-30', 3, 'Tania'),
(5, 'tania@gmail.com', 'Je voudrais acceder à mon score de français', '2024-03-01', 3, 'Tania'),
(6, 'kailys@gmail.com', 'Pouvez-vous créer de nouvelles activités', '2024-04-01', 4, 'Kailys'),
(7, 'yassine@outlook.fr', 'Bonjour, je voudrais savoir si le site est gratuit.', '2024-03-29', NULL, 'Yassine'),
(8, 'imany@yahoo.fr', 'Je veux jouer aux couleurs avec plus de couleurs', '2024-04-01', 2, 'Imany'),
(9, 'kailys@gmail.com', 'Bonjour, pouvez-vous faire des activités difficile ?', '2024-03-29', 4, 'Kailys'),
(10, 'imany@yahoo.fr', "Je n\'arrive pas à jouer aux chiffres.", '2024-04-01', 2, 'Imany');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idQuestion` int(11) NOT NULL,
  `enonce` varchar(250) NOT NULL,
  `idActivite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`idQuestion`, `enonce`, `idActivite`) VALUES
(1, 'Clique sur l&#039;image qui commence par la lettre A.', 1),
(2, 'Clique sur l&#039;image qui commence par la lettre B.', 1),
(3, 'Clique sur l&#039;image qui contient 3 fruits.', 2),
(4, 'Clique sur l&#039;image qui contient 2 ballons.', 2),
(5, 'Clique sur le bébé habillé en rose.', 3),
(6, 'Clique sur la voiture orange.', 3),
(7, 'Quel est le drapeau de la France ?', 6),
(8, 'Sur quelle planète habitent les humains ?', 6),
(9, 'Sarah a 5 pommes. Elle en donne 2 à son ami Tom. Combien de pommes lui reste-t-il ?', 4),
(10, 'Dans une forêt, Léo le lapin, Emma la chouette et Max le hérisson trouvent une carte au trésor. Après des énigmes, ils arrivent au trésor, mais une énigme finale les défie : &quot;Combien de pattes ont-ils en tout ?&quot;', 4),
(11, 'Aujourd&#039;hui, Timothée et Léa visitent une ferme. Ils voient des poules, des vaches et des fraises dans le champ. Qu&#039;ont-ils vu dans le champ à la ferme ?', 5),
(12, 'Trouve la faute dans la phrase : &quot;les étoiles brillent dans le ciel comme des diamants magic qui veillent sur notre sommeil&quot;.', 5);

-- --------------------------------------------------------

--
-- Structure de la table `questionimage`
--

CREATE TABLE `questionimage` (
  `idQuestion` int(11) NOT NULL,
  `imageLink1` varchar(250) DEFAULT NULL,
  `imageLink2` varchar(250) DEFAULT NULL,
  `imageLink3` varchar(250) DEFAULT NULL,
  `solution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questionimage`
--

INSERT INTO `questionimage` (`idQuestion`, `imageLink1`, `imageLink2`, `imageLink3`, `solution`) VALUES
(1, 'asset/images/base/ananas.jpg', 'asset/images/base/ballon.png', 'asset/images/base/chat.png', 1),
(2, 'asset/images/base/citrouille.png', 'asset/images/base/vache.png', 'asset/images/base/baleine.png', 3),
(3, 'asset/images/base/prunes.png', 'asset/images/base/fraises.png', 'asset/images/base/pomme.png', 2),
(4, 'asset/images/base/bquatre.png', 'asset/images/base/btrois.png', 'asset/images/base/bdeux.png', 3),
(5, 'asset/images/base/bvert.png', 'asset/images/base/brose.png', 'asset/images/base/violet.png', 2),
(6, 'asset/images/base/vorange.png', 'asset/images/base/vverte.png', 'asset/images/base/vbleue.png', 1),
(7, 'asset/images/base/russie.png', 'asset/images/base/france.png', 'asset/images/base/comores.png', 2),
(8, 'asset/images/base/mars.png', 'asset/images/base/lune.png', 'asset/images/base/terre.png', 3);

-- --------------------------------------------------------

--
-- Structure de la table `questionqcm`
--

CREATE TABLE `questionqcm` (
  `idQuestion` int(11) NOT NULL,
  `label1` varchar(250) DEFAULT NULL,
  `label2` varchar(250) DEFAULT NULL,
  `label3` varchar(250) DEFAULT NULL,
  `solution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questionqcm`
--

INSERT INTO `questionqcm` (`idQuestion`, `label1`, `label2`, `label3`, `solution`) VALUES
(9, '3 pommes', '2 pommes', '4 pommes', 1),
(10, '12 pattes', '14 pattes', '10 pattes', 3),
(11, 'Des pommes', 'Des fraises', 'Des carottes', 2),
(12, 'sommeil', 'veillent', 'magic', 3);

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

CREATE TABLE `repondre` (
  `idUtilisateur` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `dateR` date DEFAULT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `motDePasse` varchar(60) NOT NULL,
  `email` varchar(254) NOT NULL,
  `age` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `motDePasse`, `email`, `age`, `role`, `_date`) VALUES
(1, 'Amina', '$2y$10$4E3bphshgZsAZfWBIx1WDOkyMM7ivY53iKuHG2tS4Y8nBv5FmKrPO', 'minimina9@outlook.fr', 32, 1, '2024-03-26'),
(2, 'Imany', '$2y$10$LsUSFJBnGJw6SHOyherQLuGpfAlmuXqi2DnvpOFZjTpoxlBABubUq', 'imany@yahoo.fr', 4, 2, '2024-03-27'),
(3, 'Tania', '$2y$10$sZk0GpMJlC6tRW9P/BWYtu5mjTpiG0gHZ3exIvj1GHf582fMC0NjO', 'tania@gmail.com', 12, 2, '2024-03-27'),
(4, 'Kailys', '$2y$10$Ar34Ht/VMntU/yQVX9BK1.kOiGoXfO6Bb9HLXz1NqrmFkXSFA0/mq', 'kailys@gmail.com', 8, 2, '2024-03-29'),
(5, 'Yassine', '$2y$10$DQuqeVOr7NPfeKhCjgtBkOuMsCj8MuTAoOPDN6hi4YXg4u5AwQw5a', 'yassine@outlook.fr', 3, 2, '2024-04-09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`idActivite`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `idActivite` (`idActivite`);

--
-- Index pour la table `questionimage`
--
ALTER TABLE `questionimage`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `questionqcm`
--
ALTER TABLE `questionqcm`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD PRIMARY KEY (`idUtilisateur`,`idQuestion`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `idActivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `questionimage`
--
ALTER TABLE `questionimage`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `questionqcm`
--
ALTER TABLE `questionqcm`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `repondre`
--
ALTER TABLE `repondre`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`);

--
-- Contraintes pour la table `questionimage`
--
ALTER TABLE `questionimage`
  ADD CONSTRAINT `questionimage_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);

--
-- Contraintes pour la table `questionqcm`
--
ALTER TABLE `questionqcm`
  ADD CONSTRAINT `questionqcm_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);

--
-- Contraintes pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD CONSTRAINT `repondre_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `repondre_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
