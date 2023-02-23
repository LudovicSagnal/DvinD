-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 fév. 2023 à 19:52
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
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `prenom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mail_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pseudo_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password_utilisateur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `url_utilisateur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `naissance_utilisateur` date NOT NULL,
  `statut_utilisateur` tinyint(1) NOT NULL DEFAULT '0',
  `fin_ban_utilisateur` datetime DEFAULT NULL,
  `id_role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`),
  KEY `fk_posseder_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `pseudo_utilisateur`, `password_utilisateur`, `url_utilisateur`, `naissance_utilisateur`, `statut_utilisateur`, `fin_ban_utilisateur`, `id_role`) VALUES
(1, 'in', 'Carl', 'egor@gmail.com', 'Egor', '$2y$12$uyy3hrX20PQXF5jECCk/meNlpFcGlqaJQTCoXvvyIm6ofgUIRHoCO', 'egor.jpg', '2013-08-13', 0, NULL, 1),
(2, 'Sagnal', 'Ludovic', 'jiraipoint@gmail.com', 'Jiraipoint', '$2y$12$GcYsY.EyFrl1tSZtBcn2C.HMrI7LhEMgZ6cyN8MdUdXdfYH0OzvQC', 'NagnalSnack.png', '1984-10-06', 0, NULL, 2),
(3, 'Mercury', 'Freddie', 'fred@gmail.com', 'xXxQueenxXx', '$2y$12$Mt6el.VDq.Lt/nWXsjS/bO1sB2MIcSY7EhfJu11PCSjDCjJHBnY0i', 'fred.jpg', '1957-04-25', 0, NULL, 2),
(4, 'Spears', 'Brittney', 'b', 'Brit', '$2y$12$WrbgaxMqvT04mVMBB8dKzuX.WI0AQb0fcJvPNh2jPZSz.El095Q7.', 'brit.gif', '1990-12-12', 0, NULL, 0),
(5, 'Woody', 'Sacha', 'sac', 'Sac', '$2y$12$WeLrxYDnGJ4RifnbPd1B6.0EyKIOE4dPOlxHYzVH0QE0IvjPd618q', 'user-default.svg', '2023-01-02', 0, NULL, 0),
(6, 'Raffarin', 'JP', 'raf', 'JPR', '$2y$12$a.IuE73R6hLwWVkvwk.j0.3hoKF.tQpQ3poDIyDM3aKuvLfTFCvB.', 'spaceinvaders.jpg', '1961-05-04', 0, NULL, 0),
(7, 'Chat', 'Chat', 'chat', 'Chat', '$2y$12$Kr3MMaWjMIa/MoAXfgnHA.FbceOOBmZxz6vVUD0NlUbLDQXr9KDJO', 'user-default.svg', '1982-01-08', 0, NULL, 0),
(8, 'Carrau', 'Lancelot', 'lancelot', 'LC', '$2y$12$iF7TzQZ9ELLi/eJFWcQ06OAVKsYE1zKU5Bvcik7RUm83LG8L9AuOq', 'user-default.svg', '2000-02-02', 0, NULL, 0),
(9, 'Deschamps', 'Didier', 'DD', 'DD', '$2y$12$6liqxRE2RGvBNdnGhctNQuW.9doyJRDoSUtxnOTcq6YniycLfjaQy', 'user-default.svg', '1967-05-05', 0, NULL, 0),
(13, 'Rodrigues', 'Marceau', 'marceau@gmail.com', 'Marcinho', '$2y$12$v3nvd1O8Mwo8IWotl.LnDO3mcaYfdX22/x1Ys7fDlcq.F/iiMK96e', 'user-default.svg', '1999-06-06', 0, NULL, 1),
(14, 'Doncker', 'Astrid', 'donck', 'Donck', '$2y$12$uvPmTccYa8Eami0ObVHj4et/3nmFI2lDtvqFLqnLoq.MsleZ6QoF.', 'user-default.svg', '1990-12-23', 0, NULL, 0),
(18, 'Ramdani', 'Lokman', 'lok@gmail.com', 'Lok', '$2y$12$2p2RSXWDOAb3rUGSnWmdPOvNwUOzIkmxI7w3bqA1uA0FiziScP1lO', 'user-default.svg', '1998-04-04', 0, NULL, 0),
(24, 'Crud', 'Test', 'test@gmail.com', 'Test Crud', '$2y$10$0RcrBWVVNj4rohapK6opVusls4/AOzw.WXesieSi6aXqjthiXdmvu', 'user-default.svg', '2023-02-15', 0, NULL, 0),
(47, 'Admin', 'Admin', 'admin@gmail.com', 'Mr Admin', '$2y$10$BWaVKV/tFSytN2XkdRYVnuJFgWYdSbG35bIArpwvEuIDF1WYUoGYe', 'user-default-63f7c2f71cf6e.svg', '2023-02-02', 0, NULL, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_posseder_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
