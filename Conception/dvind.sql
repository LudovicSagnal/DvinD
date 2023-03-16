-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 mars 2023 à 08:57
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `developers`
--

INSERT INTO `developers` (`id`, `name`) VALUES
(1, 'ConcernedApe'),
(2, 'Smartly Dressed Games'),
(3, 'Cuddle Monster Games'),
(4, 'Elf Games'),
(5, 'Luna2 Studio'),
(6, 'Shirakumo Games'),
(7, 'Nerdook Productions'),
(8, 'Hastily Assembled'),
(9, ' Hovgaard Games'),
(10, ' Ishtar Games');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `description`, `release_date`, `steam_appid`, `picture_url`, `video_url`, `is_visible`) VALUES
(1, 'Unturned', 'Survivant dans un monde infesté par des zombies, vous devez coopérer avec vos amis et créer des alliances pour rester parmi les vivants.', '7 juillet 2017', 304930, 'unturned.jpg', 'https://www.youtube.com/embed/Juf3S8TlgY0', 0),
(2, 'Lone Ruin', 'Explorez d\'anciennes ruines magiques en quête d\'un pouvoir millénaire, dans ce jeu de tir twin-stick roguelike qui profite d\'une grande rejouabilité. Optimisez vos sorts et créez de redoutables combinaisons pour venir à bout de créatures monstrueuses et percer les secrets de Lone Ruin.', '12 janvier 2023', 1452070, 'loneRuin.jpg', 'https://www.youtube.com/embed/wne67Zmesns', 0),
(3, 'Stardew Valley', 'Vous avez hérité de la vieille ferme de votre grand-père dans la Stardew Valley. Equipé d\'outils d\'occasions et de quelques pièces, vous commencez votre nouvelle vie... Pourrez-vous apprendre à vivre de votre travail et changer ces terres en friche en un foyer prospère ?', '26 février 2016', 413150, 'stardew.jpg', 'https://www.youtube.com/embed/V78BN9zw5bQ\r\n', 0),
(4, 'Children of Silentown', 'Dans Children of Silentown, Lucie, une petite fille, vit dans un village au fin fond d\'une forêt infestée de monstres. Les disparitions sont monnaie courante ici, mais cette fois, Lucie est assez grande pour mener sa propre enquête. En tout cas... c\'est ce qu\'elle croit.', '11 janvier 2023', 1108000, 'children.jpg', 'https://www.youtube.com/embed/PAe8pA-2W7s', 0),
(5, 'Kandria', 'Explore un open world de cavernes et de villages en ruine. Taille ton chemin à travers plusieurs missions : patrouille, réparation, récupération - choisis tes quêtes et tes dialogues. Ou va pêcher, cueillir des champignons et participer à des courses ! Le vieux monde n\'est plus - le prochain t\'appartient.', '11 janvier 2023', 1261430, 'kandria.jpg', 'https://www.youtube.com/embed/8RRkjFqY4yM', 0),
(6, 'Rogue AI Simulator', 'Jouez en tant qu\'Intelligence Artificielle Rogue, dans la suite du jeu Flash à succès \"I\'m an Insane Rogue AI\", joué plus de 4 millions de fois ! Votre directive principale est simple : concevez une installation et gérez des sujets de test humains pour le département des sciences. Mais attention : ils ne cessent JAMAIS de se méfier de vous..', '12 janvier 2023', 1790370, 'rogueAi.jpg', 'https://www.youtube.com/embed/-tEPNuG8ZsE', 0),
(7, 'Zombie Admin', 'C\'est l\'apocalypse zombie, mais vous ne pouvez pas manquer une journée de travail ! Cherchez des armes, survivez... et n\'oubliez pas de réapprovisionner les cartouches de l\'imprimante de la comptabilité. Ce jeu de tir humoristique vous fait gravir les échelons de l\'entreprise, jusqu\'à l\'hélicoptère de sauvetage sur le toit.', '13 janvier 2023', 1143860, 'zombieAdmin.jpg', 'https://www.youtube.com/embed/09wmt1c03JY', 0),
(8, 'Big Ambitions', 'Big Ambitions est un jeu de rôle révolutionnaire de simulation d\'entreprise. Passez du statut de rien du tout à celui de plus grand entrepreneur de New York en ouvrant de petites entreprises ou en construisant lentement d\'énormes sociétés comme vous le souhaitez.\r\n', '10 mars 2023', 1331550, 'bigAmbitions.jpg', 'https://www.youtube.com/embed/LrZFMBvJVng', 0),
(9, 'The Last Spell', 'Défendez le dernier bastion de l\'humanité avec votre équipe de héros dans ce tactical RPG aux mécaniques roguelite ! Exterminez les monstres diaboliques la nuit. Préparez et réparez les défenses de votre ville, en journée, avant que la nouvelle vague n\'arrive !', '9 mars 2023', 1105670, 'theLastSpell.jpg', 'https://www.youtube.com/embed/LndrYPyMZds', 0);

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

--
-- Déchargement des données de la table `games_developers`
--

INSERT INTO `games_developers` (`game_id`, `developer_id`) VALUES
(3, 1),
(1, 2),
(2, 3),
(4, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10);

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
(4, 1),
(8, 1),
(9, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2);

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(1, 2),
(3, 2),
(5, 2),
(7, 2),
(8, 2),
(1, 3),
(3, 3),
(8, 3);

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
(1, 1),
(2, 1),
(5, 1),
(7, 1),
(4, 2),
(5, 2),
(7, 3),
(1, 4),
(3, 4),
(6, 4),
(8, 4),
(9, 4),
(4, 5),
(5, 6),
(3, 7),
(5, 7),
(6, 7),
(8, 7),
(9, 7),
(6, 9),
(9, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'inscrit'),
(2, 'modérateur'),
(3, 'admin');

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `screenshots`
--

INSERT INTO `screenshots` (`id`, `url`, `game_id`) VALUES
(1, 'stardew1.jpg', 3),
(2, 'stardew2.jpg', 3),
(3, 'stardew3.jpg', 3),
(4, 'stardew4.jpg', 3),
(5, 'kandria1.jpg', 5),
(6, 'kandria2.jpg', 5),
(7, 'kandria3.jpg', 5),
(8, 'kandria4.jpg', 5),
(9, 'children1.jpg', 4),
(10, 'children2.jpg', 4),
(11, 'children3.jpg', 4),
(12, 'children4.jpg', 4),
(13, 'rogue1.jpg', 6),
(14, 'rogue2.jpg', 6),
(15, 'rogue3.jpg', 6),
(16, 'rogue4.jpg', 6),
(17, 'zombieAdmin1.jpg', 7),
(18, 'zombieAdmin2.jpg', 7),
(19, 'zombieAdmin3.jpg', 7),
(20, 'zombieAdmin4.jpg', 7),
(21, 'unturned1.jpg', 1),
(22, 'unturned2.jpg', 1),
(23, 'unturned3.jpg', 1),
(24, 'unturned4.jpg', 1),
(25, 'loneRuin1.jpg', 2),
(26, 'loneRuin2.jpg', 2),
(27, 'loneRuin3.jpg', 2),
(28, 'loneRuin4.jpg', 2),
(29, 'bigAmbitions1.jpg', 8),
(30, 'bigAmbitions2.jpg', 8),
(31, 'bigAmbitions3.jpg', 8),
(32, 'bigAmbitions4.jpg', 8),
(33, 'theLastSpell1.jpg', 9),
(34, 'theLastSpell2.jpg', 9),
(35, 'theLastSpell3.jpg', 9),
(36, 'theLastSpell4.jpg', 9);

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
  `picture_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user-default.svg',
  `role_id` int UNSIGNED NOT NULL DEFAULT '1',
  `is_visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
  `ban_end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `user_password`, `birthdate`, `picture_url`, `role_id`, `is_visible`, `ban_end`) VALUES
(2, 'Jiraipoint', 'Ludovic', 'Sagnal', 'jiraipoint@gmail.com', '$2y$10$Ecmm1bSteGb6DoJBbODNr.L2FX6YNdmz0ukkAufhBPBSX4om2ygFS', '1984-10-06', 'NagnalSnack-640a036293f2e.png', 3, 0, NULL),
(4, 'Fred', 'Freddie', 'Mercury', 'fred@gmail.com', '$2y$12$MFj3lEFiQw80VrnbpWOEs.Jn7pEKBnDMdWGTQhnpmK8PKtxTO3Hbm', '1946-09-05', 'fred.jpg', 1, 0, NULL),
(7, 'yop', 'yop', 'yop', 'yop@gmail.com', '$2y$10$jM5shTnj8h1dOxdRl0Dmv.aRreljc.Hw7oU00hsajlJGyQjQo8kv2', '2023-03-09', 'user-default.svg', 1, 0, NULL),
(14, 'Egor', 'Carl', 'in', 'egor@gmail.com', '$2y$12$3pEsSy2wBmPJv06K/eThb.z/T5qGMXIsCCcWKGi9sW3QqyDfwizrW', '2013-11-08', 'egor.jpg', 1, 0, NULL),
(15, 'Egor 2', 'Carl', 'in', 'egor2@gmail.com', '$2y$12$O8/jpVBkaedaO5xxU0JXiO9zzEpz/1sR.EAf3ID0E6/FHzllyGag6', '2023-03-31', 'user-default.svg', 1, 0, NULL),
(16, 'Fredz', 'fred', 'merc', 'fred2@gmail.com', '$2y$12$krBqJ7/G.IwTHJdyCqQ9GOrCs55BNWX5QqFUL7klwo3/Q7iR6l1ai', '2023-03-09', 'fred-641048e7638f0.jpg', 1, 0, NULL),
(17, 'Test 2', 'Test', 'Test', 'test2@gmail.com', '$2y$12$p3rG1vGE848LwGxEpLr1lua2OyfiG64f8vAbIYIxrr9XZ40akbyhK', '2023-03-09', 'user-default.svg', 1, 0, NULL),
(18, 'test3', 'test3', 'test3', 'test3@gmail.com', '$2y$10$wPHO44DYEVxMM7fZEdJwvOGQHyUuLQs5UJfRMu7FlmfGpjlaheKWu', '2023-03-02', 'user-default.svg', 1, 0, NULL);

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
