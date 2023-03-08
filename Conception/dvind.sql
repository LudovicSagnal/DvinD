-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 mars 2023 à 13:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

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
-- Structure de la table `developers`
--

DROP TABLE IF EXISTS `developers`;
CREATE TABLE IF NOT EXISTS `developers` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steam_appid` int UNSIGNED DEFAULT NULL,
  `picture_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `description`, `release_date`, `steam_appid`, `picture_url`, `video_url`, `is_visible`) VALUES
(1, 'Unturned', 'Survivant dans un monde infesté par des zombies, vous devez coopérer avec vos amis et créer des alliances pour rester parmi les vivants.', '7 juillet 2017', 304930, 'unturned.jpg', 'https://www.youtube.com/embed/Juf3S8TlgY0', 0),
(2, 'Lone Ruin', 'Explorez d\'anciennes ruines magiques en quête d\'un pouvoir millénaire, dans ce jeu de tir twin-stick roguelike qui profite d\'une grande rejouabilité. Optimisez vos sorts et créez de redoutables combinaisons pour venir à bout de créatures monstrueuses et percer les secrets de Lone Ruin.', '12 janvier 2023', 1452070, 'loneRuin.jpg', 'https://www.youtube.com/embed/wne67Zmesns', 0),
(3, 'Stardew Valley', 'Vous avez hérité de la vieille ferme de votre grand-père dans la Stardew Valley. Equipé d\'outils d\'occasions et de quelques pièces, vous commencez votre nouvelle vie... Pourrez-vous apprendre à vivre de votre travail et changer ces terres en friche en un foyer prospère ?', '26 février 2016', 413150, 'stardew.jpg', 'https://www.youtube.com/embed/V78BN9zw5bQ\r\n', 0);

-- --------------------------------------------------------

--
-- Structure de la table `games_developers`
--

DROP TABLE IF EXISTS `games_developers`;
CREATE TABLE IF NOT EXISTS `games_developers` (
  `game_id` int UNSIGNED NOT NULL,
  `developer_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`game_id`,`developer_id`),
  KEY `developer_id` (`developer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `games_languages`
--

DROP TABLE IF EXISTS `games_languages`;
CREATE TABLE IF NOT EXISTS `games_languages` (
  `game_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`game_id`,`language_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games_languages`
--

INSERT INTO `games_languages` (`game_id`, `language_id`) VALUES
(2, 1),
(3, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `games_platforms`
--

DROP TABLE IF EXISTS `games_platforms`;
CREATE TABLE IF NOT EXISTS `games_platforms` (
  `game_id` int UNSIGNED NOT NULL,
  `platform_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`game_id`,`platform_id`),
  KEY `platform_id` (`platform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games_platforms`
--

INSERT INTO `games_platforms` (`game_id`, `platform_id`) VALUES
(2, 1),
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `games_tags`
--

DROP TABLE IF EXISTS `games_tags`;
CREATE TABLE IF NOT EXISTS `games_tags` (
  `game_id` int UNSIGNED NOT NULL,
  `tag_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`game_id`,`tag_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games_tags`
--

INSERT INTO `games_tags` (`game_id`, `tag_id`) VALUES
(2, 1),
(3, 4),
(3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'Français'),
(2, 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `posted_by_id` int UNSIGNED NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
  PRIMARY KEY (`id`),
  KEY `posted_by_id` (`posted_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news_games`
--

DROP TABLE IF EXISTS `news_games`;
CREATE TABLE IF NOT EXISTS `news_games` (
  `news_id` int UNSIGNED NOT NULL,
  `game_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`news_id`,`game_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'Windows'),
(2, 'Linux'),
(3, 'Mac');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `screenshots`
--

DROP TABLE IF EXISTS `screenshots`;
CREATE TABLE IF NOT EXISTS `screenshots` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
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
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `picture_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games_developers`
--
ALTER TABLE `games_developers`
  ADD CONSTRAINT `games_developers_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `games_developers_ibfk_2` FOREIGN KEY (`developer_id`) REFERENCES `developers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `games_languages`
--
ALTER TABLE `games_languages`
  ADD CONSTRAINT `games_languages_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `games_languages_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Contraintes pour la table `games_platforms`
--
ALTER TABLE `games_platforms`
  ADD CONSTRAINT `games_platforms_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `games_platforms_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`);

--
-- Contraintes pour la table `games_tags`
--
ALTER TABLE `games_tags`
  ADD CONSTRAINT `games_tags_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `games_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`posted_by_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `news_games`
--
ALTER TABLE `news_games`
  ADD CONSTRAINT `news_games_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `news_games_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Contraintes pour la table `screenshots`
--
ALTER TABLE `screenshots`
  ADD CONSTRAINT `screenshots_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
