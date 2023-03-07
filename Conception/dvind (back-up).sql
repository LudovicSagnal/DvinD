-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 fév. 2023 à 12:57
-- Version du serveur : 5.7.40
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dvind`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id_actualite` int(11) NOT NULL AUTO_INCREMENT,
  `titre_actualite` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contenu_actualite` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_actualite` datetime NOT NULL,
  `statut_actualite` tinyint(1) NOT NULL DEFAULT '0',
  `source_actualite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 pour steam\r\n1 pour utilisateurs',
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_jeux` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actualite`),
  KEY `fk_publier_utilisateur` (`id_utilisateur`),
  KEY `fk_contenir_jeux` (`id_jeux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annoter`
--

DROP TABLE IF EXISTS `annoter`;
CREATE TABLE IF NOT EXISTS `annoter` (
  `id_jeux` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `contenu_annotation` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_annotation` datetime NOT NULL,
  `statut_annotation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jeux`,`id_utilisateur`),
  KEY `fk_annoter_utilisateur` (`id_utilisateur`),
  KEY `fk_annoter_jeux` (`id_jeux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `asset`
--

DROP TABLE IF EXISTS `asset`;
CREATE TABLE IF NOT EXISTS `asset` (
  `id_asset` int(11) NOT NULL AUTO_INCREMENT,
  `url_asset` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_type_asset` tinyint(1) NOT NULL COMMENT '0 pour les photos\r\n1 pour les vidéos',
  PRIMARY KEY (`id_asset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `asset`
--

INSERT INTO `asset` (`id_asset`, `url_asset`, `id_type_asset`) VALUES
(1, 'stardew.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

DROP TABLE IF EXISTS `attribuer`;
CREATE TABLE IF NOT EXISTS `attribuer` (
  `id_asset` int(11) NOT NULL,
  `id_jeux` int(11) NOT NULL,
  PRIMARY KEY (`id_asset`,`id_jeux`),
  KEY `fk_attribuer_jeux` (`id_jeux`),
  KEY `fk_attribuer_asset` (`id_asset`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `attribuer`
--

INSERT INTO `attribuer` (`id_asset`, `id_jeux`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_tag` int(11) NOT NULL,
  `id_jeux` int(11) NOT NULL,
  `id_plateforme` int(11) NOT NULL,
  `id_langue` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`,`id_jeux`,`id_plateforme`,`id_langue`) USING BTREE,
  KEY `fk_avoir_jeux` (`id_jeux`),
  KEY `fk_avoir_tag` (`id_tag`) USING BTREE,
  KEY `fk_avoir_langue` (`id_langue`),
  KEY `fk_avoir_plateforme` (`id_plateforme`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_tag`, `id_jeux`, `id_plateforme`, `id_langue`) VALUES
(4, 3, 3, 1),
(7, 3, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `id_actualite` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `contenu_commentaire` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `statut_commentaire` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_actualite`,`id_utilisateur`),
  KEY `fk_commenter_utilisateur` (`id_utilisateur`),
  KEY `fk_commenter_actualite` (`id_actualite`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacter`
--

DROP TABLE IF EXISTS `contacter`;
CREATE TABLE IF NOT EXISTS `contacter` (
  `id_utilisateur` int(11) NOT NULL,
  `id_messagerie` int(11) NOT NULL,
  `id_utilisateur_contacter` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_messagerie`,`id_utilisateur_contacter`),
  KEY `fk_contacter_messagerie` (`id_messagerie`),
  KEY `fk_contacter_utilisateur_contacter` (`id_utilisateur_contacter`),
  KEY `fk_contacter_utilisateur` (`id_utilisateur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `id_jeux` int(11) NOT NULL AUTO_INCREMENT,
  `id_steam_jeux` int(11) DEFAULT NULL,
  `nom_jeux` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `developpeur_jeux` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `desc_jeux` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sortie_jeux` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `source_jeux` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 pour Steam\r\n1 pour utilisateurs',
  PRIMARY KEY (`id_jeux`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_jeux`, `id_steam_jeux`, `nom_jeux`, `developpeur_jeux`, `desc_jeux`, `sortie_jeux`, `source_jeux`) VALUES
(1, 304930, 'Unturned', 'Smartly Dressed Games', 'Survivant dans un monde infesté par des zombies, vous devez coopérer avec vos amis et créer des alliances pour rester parmi les vivants.', '7 juillet 2017', 1),
(2, 1452070, 'Lone Ruin', 'Cuddle Monster Games', 'Explorez d\'anciennes ruines magiques en quête d\'un pouvoir millénaire, dans ce jeu de tir twin-stick roguelike qui profite d\'une grande rejouabilité. Optimisez vos sorts et créez de redoutables combinaisons pour venir à bout de créatures monstrueuses et percer les secrets de Lone Ruin.', '12 janvier 2023', 1),
(3, 413150, 'Stardew Valley', 'ConcernedApe', 'Vous avez hérité de la vieille ferme de votre grand-père dans la Stardew Valley. Equipé d\'outils d\'occasions et de quelques pièces, vous commencez votre nouvelle vie... Pourrez_vous apprendre à vivre de votre travail et changer ces terres en friche en un foyer prospère ?', '26 février 2016', 1),
(4, 1108000, 'Children of Silentown', 'Elf Games, Luna2 Studio', 'Dans Children of Silentown, Lucie, une petite fille, vit dans un village au fin fond d\'une forêt infestée de monstres. Les disparitions sont monnaie courante ici, mais cette fois, Lucie est assez grande pour mener sa propre enquête. En tout cas... c\'est ce qu\'elle croit.', '11 janvier 2023', 1),
(5, 1261430, 'Kandria', 'Shirakumo Games', 'Explore un open world de cavernes et de villages en ruine. Taille ton chemin à travers plusieurs missions : patrouille, réparation, récupération - choisis tes quêtes et tes dialogues. Ou va pêcher, cueillir des champignons et participer à des courses ! L\'ancien monde n\'est plus - le prochain t\'appartient.', '11 janvier 2023', 1),
(6, 1790370, 'Rogue AI Simulator', 'Nerdook Productions', 'Jouez en tant qu\'Intelligence Artificielle Rogue, dans la suite du jeu Flash à succès \"I\'m an Insane Rogue AI\", joué plus de 4 millions de fois ! Votre directive principale est simple : concevez une installation et gérez des sujets de test humains pour le département des sciences. Mais attention : ils ne cessent JAMAIS de se méfier de vous..', '12 janvier 2023', 1),
(7, 1143860, 'Zombie Admin', 'Hastily Assembled', 'C\'est l\'apocalypse zombie, mais vous ne pouvez pas manquer une journée de travail ! Cherchez des armes, survivez... et n\'oubliez pas de réapprovisionner les cartouches de l\'imprimante de la comptabilité. Ce jeu de tir humoristique vous fait gravir les échelons de l\'entreprise, jusqu\'à l\'hélicoptère de sauvetage sur le toit.', '13 janvier 2023', 1);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_langue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_langue` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_langue`, `nom_langue`) VALUES
(1, 'Français'),
(2, 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_messagerie` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_messagerie` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_messagerie` datetime NOT NULL,
  PRIMARY KEY (`id_messagerie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

DROP TABLE IF EXISTS `plateforme`;
CREATE TABLE IF NOT EXISTS `plateforme` (
  `id_plateforme` int(11) NOT NULL AUTO_INCREMENT,
  `nom_plateforme` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_plateforme`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`id_plateforme`, `nom_plateforme`) VALUES
(1, 'Windows'),
(2, 'Linux'),
(3, 'Mac');

-- --------------------------------------------------------

--
-- Structure de la table `post_forum`
--

DROP TABLE IF EXISTS `post_forum`;
CREATE TABLE IF NOT EXISTS `post_forum` (
  `id_post_forum` int(11) NOT NULL AUTO_INCREMENT,
  `titre_post_forum` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contenu_post_forum` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_post_forum` datetime NOT NULL,
  `statut_post_forum` tinyint(1) NOT NULL DEFAULT '0',
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_post_forum`),
  KEY `fk_poster_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

DROP TABLE IF EXISTS `repondre`;
CREATE TABLE IF NOT EXISTS `repondre` (
  `id_post_forum` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `contenu_repondre` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_repondre` datetime NOT NULL,
  `statut_repondre` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post_forum`,`id_utilisateur`),
  KEY `fk_repondre_utilisateur` (`id_utilisateur`),
  KEY `fk_repondre_post_forum` (`id_post_forum`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(0, 'inscrit'),
(1, 'modérateur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tag` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id_tag`, `nom_tag`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Combat'),
(4, 'Gestion'),
(5, 'Horreur'),
(6, 'Plateforme'),
(7, 'RPG'),
(8, 'Sport'),
(9, 'Stratégie');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `prenom_utilisateur` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mail_utilisateur` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pseudo_utilisateur` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password_utilisateur` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `url_utilisateur` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'user-default.svg',
  `naissance_utilisateur` date NOT NULL,
  `statut_utilisateur` tinyint(1) NOT NULL DEFAULT '0',
  `fin_ban_utilisateur` datetime DEFAULT NULL,
  `id_role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`),
  KEY `fk_posseder_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `pseudo_utilisateur`, `password_utilisateur`, `url_utilisateur`, `naissance_utilisateur`, `statut_utilisateur`, `fin_ban_utilisateur`, `id_role`) VALUES
(1, 'in', 'Carl', 'egor@gmail.com', 'Egor', '$2y$12$uyy3hrX20PQXF5jECCk/meNlpFcGlqaJQTCoXvvyIm6ofgUIRHoCO', 'egor.jpg', '2013-08-13', 0, NULL, 1),
(2, 'Sagnal', 'Ludovic', 'jiraipoint@gmail.com', 'Jiraipoint', '$2y$12$GcYsY.EyFrl1tSZtBcn2C.HMrI7LhEMgZ6cyN8MdUdXdfYH0OzvQC', 'NagnalSnack.png', '1984-10-06', 0, NULL, 2),
(3, 'Mercury', 'Freddie', 'fred@gmail.com', 'xXxQueenxXx', '$2y$10$wsuXGndShAEubZYQkzW6TepetdIy8djXIjqgBO0J7IWkJqTDFYP8e', 'fred.jpg', '1957-04-25', 0, NULL, 0),
(4, 'Spears', 'Brittney', 'b', 'Brit', '$2y$12$WrbgaxMqvT04mVMBB8dKzuX.WI0AQb0fcJvPNh2jPZSz.El095Q7.', 'brit.gif', '1990-12-12', 0, NULL, 0),
(5, 'Woody', 'Sacha', 'sac', 'Sac', '$2y$12$WeLrxYDnGJ4RifnbPd1B6.0EyKIOE4dPOlxHYzVH0QE0IvjPd618q', 'user-default.svg', '2023-01-02', 0, NULL, 0),
(6, 'Raffarin', 'JP', 'raf', 'JPR', '$2y$12$a.IuE73R6hLwWVkvwk.j0.3hoKF.tQpQ3poDIyDM3aKuvLfTFCvB.', 'spaceinvaders.jpg', '1961-05-04', 0, NULL, 0),
(7, 'Chat', 'Chat', 'chat', 'Chat', '$2y$12$Kr3MMaWjMIa/MoAXfgnHA.FbceOOBmZxz6vVUD0NlUbLDQXr9KDJO', 'user-default.svg', '1982-01-08', 0, NULL, 0),
(8, 'Carrau', 'Lancelot', 'lancelot', 'LC', '$2y$12$iF7TzQZ9ELLi/eJFWcQ06OAVKsYE1zKU5Bvcik7RUm83LG8L9AuOq', 'user-default.svg', '2000-02-02', 0, NULL, 0),
(9, 'Deschamps', 'Didier', 'DD', 'DD', '$2y$12$6liqxRE2RGvBNdnGhctNQuW.9doyJRDoSUtxnOTcq6YniycLfjaQy', 'user-default.svg', '1967-05-05', 0, NULL, 0),
(13, 'Rodrigues', 'Marceau', 'marceau@gmail.com', 'Marcinho', '$2y$12$v3nvd1O8Mwo8IWotl.LnDO3mcaYfdX22/x1Ys7fDlcq.F/iiMK96e', 'user-default.svg', '1999-06-06', 0, NULL, 1),
(14, 'Doncker', 'Astrid', 'donck', 'Donck', '$2y$12$uvPmTccYa8Eami0ObVHj4et/3nmFI2lDtvqFLqnLoq.MsleZ6QoF.', 'user-default.svg', '1990-12-23', 0, NULL, 0),
(18, 'Ramdani', 'Lokman', 'lok@gmail.com', 'Lok', '$2y$12$2p2RSXWDOAb3rUGSnWmdPOvNwUOzIkmxI7w3bqA1uA0FiziScP1lO', 'user-default.svg', '1998-04-04', 0, NULL, 0),
(36, 'Test', 'Admin', 'admin@gmail.com', 'Mr Admin', '$2y$10$DNut6Hw3QXEfB5nfHCZ4Vu.bgYgHKGKdkI/Gpa7sSGHw8IiWb/vze', 'user-default.svg', '1999-06-10', 0, NULL, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `fk_contenir_jeux` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id_jeux`),
  ADD CONSTRAINT `fk_publier_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `annoter`
--
ALTER TABLE `annoter`
  ADD CONSTRAINT `annoter_ibfk_1` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id_jeux`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_annoter_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `fk_attribuer_asset` FOREIGN KEY (`id_asset`) REFERENCES `asset` (`id_asset`),
  ADD CONSTRAINT `fk_attribuer_jeux` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id_jeux`);

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_ibfk_1` FOREIGN KEY (`id_plateforme`) REFERENCES `plateforme` (`id_plateforme`),
  ADD CONSTRAINT `avoir_ibfk_2` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`),
  ADD CONSTRAINT `fk_avoir_jeux` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id_jeux`),
  ADD CONSTRAINT `fk_avoir_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`);

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `fk_commenter_actualite` FOREIGN KEY (`id_actualite`) REFERENCES `actualite` (`id_actualite`),
  ADD CONSTRAINT `fk_commenter_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `contacter`
--
ALTER TABLE `contacter`
  ADD CONSTRAINT `fk_contacter_messagerie` FOREIGN KEY (`id_messagerie`) REFERENCES `messagerie` (`id_messagerie`),
  ADD CONSTRAINT `fk_contacter_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `fk_contacter_utilisateur_contacter` FOREIGN KEY (`id_utilisateur_contacter`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `post_forum`
--
ALTER TABLE `post_forum`
  ADD CONSTRAINT `fk_poster_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD CONSTRAINT `fk_repondre_post_forum` FOREIGN KEY (`id_post_forum`) REFERENCES `post_forum` (`id_post_forum`),
  ADD CONSTRAINT `fk_repondre_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_posseder_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
