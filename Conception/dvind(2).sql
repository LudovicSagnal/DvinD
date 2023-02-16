-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 fév. 2023 à 16:01
-- Version du serveur : 5.7.40
-- Version de PHP : 7.4.33

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
  `url_asset` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `id_type_asset` tinyint(1) DEFAULT NULL COMMENT '0 pour les photos\r\n1 pour les vidéos',
  PRIMARY KEY (`id_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_langue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_langue` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `pseudo_utilisateur`, `password_utilisateur`, `url_utilisateur`, `naissance_utilisateur`, `statut_utilisateur`, `fin_ban_utilisateur`, `id_role`) VALUES
(1, 'in', 'Carl', 'egor@gmail.com', 'Egor', '$2y$12$uyy3hrX20PQXF5jECCk/meNlpFcGlqaJQTCoXvvyIm6ofgUIRHoCO', 'egor.jpg', '2013-08-13', 0, NULL, 1),
(2, 'Sagnal', 'Ludovic', 'jiraipoint@gmail.com', 'Jiraipoint', '$2y$12$GcYsY.EyFrl1tSZtBcn2C.HMrI7LhEMgZ6cyN8MdUdXdfYH0OzvQC', 'NagnalSnack.png', '1984-10-06', 0, NULL, 2),
(3, 'Mercury', 'Freddie', 'fred@gmail.com', 'xXxQueenxXx', '$2y$12$Mt6el.VDq.Lt/nWXsjS/bO1sB2MIcSY7EhfJu11PCSjDCjJHBnY0i', 'fred.jpg', '1957-04-25', 0, NULL, 0),
(4, 'Spears', 'Brittney', 'b', 'Brit', '$2y$12$WrbgaxMqvT04mVMBB8dKzuX.WI0AQb0fcJvPNh2jPZSz.El095Q7.', 'brit.gif', '1990-12-12', 0, NULL, 0),
(5, 'Woody', 'Sacha', 'sac', 'Sac', '$2y$12$WeLrxYDnGJ4RifnbPd1B6.0EyKIOE4dPOlxHYzVH0QE0IvjPd618q', 'user-default.svg', '2023-01-02', 0, NULL, 0),
(6, 'Raffarin', 'JP', 'raf', 'JPR', '$2y$12$a.IuE73R6hLwWVkvwk.j0.3hoKF.tQpQ3poDIyDM3aKuvLfTFCvB.', 'spaceinvaders.jpg', '1961-05-04', 0, NULL, 0),
(7, 'Chat', 'Chat', 'chat', 'Chat', '$2y$12$Kr3MMaWjMIa/MoAXfgnHA.FbceOOBmZxz6vVUD0NlUbLDQXr9KDJO', 'user-default.svg', '1982-01-08', 0, NULL, 0),
(8, 'Carrau', 'Lancelot', 'lancelot', 'LC', '$2y$12$iF7TzQZ9ELLi/eJFWcQ06OAVKsYE1zKU5Bvcik7RUm83LG8L9AuOq', 'user-default.svg', '2000-02-02', 0, NULL, 0),
(9, 'Deschamps', 'Didier', 'DD', 'DD', '$2y$12$6liqxRE2RGvBNdnGhctNQuW.9doyJRDoSUtxnOTcq6YniycLfjaQy', 'user-default.svg', '1967-05-05', 0, NULL, 0),
(10, 'john', 'john', 'john@gmail.com', 'john', 'john', 'user-default.svg', '2022-02-15', 0, NULL, 0),
(13, 'Rodrigues', 'Marceau', 'marceau@gmail.com', 'Marcinho', '$2y$12$v3nvd1O8Mwo8IWotl.LnDO3mcaYfdX22/x1Ys7fDlcq.F/iiMK96e', 'user-default.svg', '1999-06-06', 0, NULL, 1),
(14, 'Doncker', 'Astrid', 'donck', 'Donck', '$2y$12$uvPmTccYa8Eami0ObVHj4et/3nmFI2lDtvqFLqnLoq.MsleZ6QoF.', 'user-default.svg', '1990-12-23', 0, NULL, 0),
(18, 'Ramdani', 'Lokman', 'lok@gmail.com', 'Lok', '$2y$12$2p2RSXWDOAb3rUGSnWmdPOvNwUOzIkmxI7w3bqA1uA0FiziScP1lO', '', '1998-04-04', 0, NULL, 0),
(24, 'Crud', 'Test', 'test@gmail.com', 'Test Crud', '$2y$10$0RcrBWVVNj4rohapK6opVusls4/AOzw.WXesieSi6aXqjthiXdmvu', 'user-default.svg', '2023-02-15', 0, NULL, 0),
(30, 'ROD', 'Mar', 'egor@gfrmail.com', '1234', '$2y$10$Uxhsrq1RRQCg0Y4sNdr2mOBLoliV7aWlnlH4zDk0Iw1PkRTEG1fv2', 'pdf-63ee51b1becf0.svg', '2023-02-14', 0, NULL, 0),
(34, 'fsf', 'sfsf', 'egor@gfmail.com', 'vxvg', '$2y$10$mBv0Ln0DbFJB3uNgXpsrIOOjxalHKMXtXa22VWjVOWaPAhT8pID6O', 'user-default.svg', '2023-02-08', 0, NULL, 0);

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
