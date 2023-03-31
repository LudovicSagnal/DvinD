-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 31 mars 2023 à 13:03
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, ' Ishtar Games'),
(11, 'Ami Team'),
(12, '8-bit Caviar'),
(13, 'DON\'T NOD'),
(14, 'Sabotage Studio'),
(15, 'Unreliable Narrators'),
(16, 'ZA/UM'),
(17, 'Ludeon Studios'),
(18, 'Clock Wizard Games'),
(19, 'Flipline Studios'),
(20, 'Juvty Worlds'),
(21, 'CarloC'),
(22, 'Pierre Vigier'),
(23, 'Lost Relic Games'),
(24, 'Fictiorama Studios'),
(25, 'Sleeping Eight Studio'),
(26, 'Chicken Launcher'),
(27, 'KO.DLL'),
(28, 'Smartmelon Games'),
(29, 'Crytek'),
(30, 'Genesz'),
(31, 'Flamebait Games'),
(32, 'Angry Mob Games'),
(33, 'Black Tower Basement');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date DEFAULT NULL,
  `future_release` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Prochainement',
  `steam_appid` int UNSIGNED DEFAULT NULL,
  `picture_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `description`, `release_date`, `future_release`, `steam_appid`, `picture_url`, `video_url`, `is_visible`) VALUES
(1, 'Unturned', 'Survivant dans un monde infesté par des zombies, vous devez coopérer avec vos amis et créer des alliances pour rester parmi les vivants.', '2017-07-07', '7 juillet 2017', 304930, 'unturned.jpg', 'https://www.youtube.com/embed/Juf3S8TlgY0', 0),
(2, 'Lone Ruin', 'Explorez d\'anciennes ruines magiques en quête d\'un pouvoir millénaire, dans ce jeu de tir twin-stick roguelike qui profite d\'une grande rejouabilité. Optimisez vos sorts et créez de redoutables combinaisons pour venir à bout de créatures monstrueuses et percer les secrets de Lone Ruin.', '2023-01-12', '12 janvier 2023', 1452070, 'loneRuin.jpg', 'https://www.youtube.com/embed/wne67Zmesns', 0),
(3, 'Stardew Valley', 'Vous avez hérité de la vieille ferme de votre grand-père dans la Stardew Valley. Equipé d\'outils d\'occasions et de quelques pièces, vous commencez votre nouvelle vie... Pourrez-vous apprendre à vivre de votre travail et changer ces terres en friche en un foyer prospère ?', '2016-02-26', '26 février 2016', 413150, 'stardew.jpg', 'https://www.youtube.com/embed/V78BN9zw5bQ\r\n', 0),
(4, 'Children of Silentown', 'Dans Children of Silentown, Lucie, une petite fille, vit dans un village au fin fond d\'une forêt infestée de monstres. Les disparitions sont monnaie courante ici, mais cette fois, Lucie est assez grande pour mener sa propre enquête. En tout cas... c\'est ce qu\'elle croit.', '2023-01-11', '11 janvier 2023', 1108000, 'children.jpg', 'https://www.youtube.com/embed/PAe8pA-2W7s', 0),
(5, 'Kandria', 'Explore un open world de cavernes et de villages en ruine. Taille ton chemin à travers plusieurs missions : patrouille, réparation, récupération - choisis tes quêtes et tes dialogues. Ou va pêcher, cueillir des champignons et participer à des courses ! Le vieux monde n\'est plus - le prochain t\'appartient.', '2023-01-11', '11 janvier 2023', 1261430, 'kandria.jpg', 'https://www.youtube.com/embed/8RRkjFqY4yM', 0),
(6, 'Rogue AI Simulator', 'Jouez en tant qu\'Intelligence Artificielle Rogue, dans la suite du jeu Flash à succès \"I\'m an Insane Rogue AI\", joué plus de 4 millions de fois ! Votre directive principale est simple : concevez une installation et gérez des sujets de test humains pour le département des sciences. Mais attention : ils ne cessent JAMAIS de se méfier de vous..', '2023-01-12', '12 janvier 2023', 1790370, 'rogueAi.jpg', 'https://www.youtube.com/embed/-tEPNuG8ZsE', 0),
(7, 'Zombie Admin', 'C\'est l\'apocalypse zombie, mais vous ne pouvez pas manquer une journée de travail ! Cherchez des armes, survivez... et n\'oubliez pas de réapprovisionner les cartouches de l\'imprimante de la comptabilité. Ce jeu de tir humoristique vous fait gravir les échelons de l\'entreprise, jusqu\'à l\'hélicoptère de sauvetage sur le toit.', '2023-01-13', '13 janvier 2023', 1143860, 'zombieAdmin.jpg', 'https://www.youtube.com/embed/09wmt1c03JY', 0),
(8, 'Big Ambitions', 'Big Ambitions est un jeu de rôle révolutionnaire de simulation d\'entreprise. Passez du statut de rien du tout à celui de plus grand entrepreneur de New York en ouvrant de petites entreprises ou en construisant lentement d\'énormes sociétés comme vous le souhaitez.\r\n', '2023-03-10', 'test', 1331550, 'bigAmbitions.jpg', 'https://www.youtube.com/embed/LrZFMBvJVng', 0),
(9, 'The Last Spell', 'Défendez le dernier bastion de l\'humanité avec votre équipe de héros dans ce tactical RPG aux mécaniques roguelite ! Exterminez les monstres diaboliques la nuit. Préparez et réparez les défenses de votre ville, en journée, avant que la nouvelle vague n\'arrive !', '2023-03-09', '9 mars 2023', 1105670, 'theLastSpell.jpg', 'https://www.youtube.com/embed/LndrYPyMZds', 0),
(10, 'Ami', 'Ami est un puzzle-plateforme avec une histoire profonde. Au côté de l\'héroïne, vous ferez la connaissance des tragédies de ce monde.', NULL, 'Août 2023', 1223030, 'ami.jpg', 'https://www.youtube.com/embed/R6kqq-iwYa0', 0),
(11, 'Bravers', 'Au plus profond d\'une planète dévastée par le Grand Impact, Bravers vous invite à devenir le capitaine de votre propre vaisseau. Capitaine qui mènera son équipage au travers d\'une aventure fascinante pleine de dangers, de mystères, d\'amis et d\'ennemis. Serez-vous assez courageux ?', NULL, 'Prochainement', 1349460, 'bravers.jpg', 'https://www.youtube.com/embed/NTARhgAxiLc', 0),
(12, 'Sea of Stars', 'Sea of Stars est un RPG classique au tour par tour. Il raconte l\'histoire de deux Enfants du Solstice qui vont combiner les pouvoirs du soleil et de la lune pour exécuter l\'Eclipse Magique, la seule force capable de se débarrasser des monstrueuses créations du maléfique alchimiste connu sous le nom de Fleshmancer.', '2023-08-30', 'Prochainement', 1244090, 'seaofstars.jpg', 'https://www.youtube.com/embed/C_Wj7OkgtqU', 0),
(13, 'Harmony: The Fall of Reverie', 'Le destin de l’humanité est en jeu. Utilisez votre don de clairvoyance pour consulter l’avenir et empêcher l’apocalypse qui menace l’équilibre entre votre monde et celui des divinités.', NULL, 'Juin 2023', 1966420, 'harmonyTheFallOfReverie.jpg', 'https://www.youtube.com/embed/op9Y0aw0pwo\"', 0),
(14, 'Two Falls (Nishu Takuatshina)', 'Explorez les forêts canadiennes du XVIIe siècle à travers les yeux de Jeanne, une jeune Française et Maikan, un chasseur innu qui tente de découvrir ce qui perturbe son environnement. Vos choix façonneront leur personnalité dans cette expérience narrative solo.', NULL, ' 3ᵉ trimestre 2023', 1671740, 'twoFalls.jpg', 'https://www.youtube.com/embed/5bhiPVKL4tQ', 0),
(15, 'Disco Elysium - The Final Cut', 'Disco Elysium - The Final Cut est la version ultime du jeu de rôle révolutionnaire. Incarnez un enquêteur, au système de talents unique, et arpentez tout un pan urbain. Interrogez des personnages inoubliables, résolvez des crimes ou acceptez des pots-de-vin. Devenez un héros ou une véritable épave.', '2019-10-15', 'Prochainement', 632470, 'discoElysium.jpg', 'https://www.youtube.com/embed/htDHk0H5_CI', 0),
(16, 'RimWorld', 'RimWorld suit trois survivants d’un écrasement de vaisseau spatial pendant qu’ils bâtissent leur colonie sur une planète à la frontière de l’espace exploré. Inspiré du genre space western de Firefly, la simulation profonde de Dwarf Fortress, et l’échelle grandiose de Dune et Warhammer 40,000.', '2018-10-17', 'Prochainement', 294100, 'rimWorld.jpg', 'https://www.youtube.com/embed/XXxWQAf0N9I', 0),
(17, 'Demonologist', 'Demonologist est un jeu d\'horreur en coopération qui peut être joué avec au moins 1 et jusqu\'à 4 joueurs. Votre objectif est d\'identifier le type d\'esprit maléfique dans les lieux maudits et de l\'exorciser à l\'aide de votre équipement, seul ou en équipe.', '2023-03-27', 'Prochainement', 1929610, 'demonologist.jpg', 'https://www.youtube.com/embed/eOAs_fj-mjg', 0),
(18, 'Papa\'s Freezeria Deluxe', 'De retour à Calypso Island pour servir de de délicieux sundas dans Papa\'s Freezeria Deluxe ! Créez des sundaes pour tous vos clients excentriques pour gagner des pourboires, points, et autres Recettes Spéciales. Faites un tour dans le Food Truck pour concocter vos propres chili et voir qui se pointera !', '2023-03-31', 'Prochainement', 2291760, 'PapasFreezeriaDeluxe.jpg', 'https://www.youtube.com/embed/O-6LrRtdC78', 0),
(19, 'GrimGrad', 'Construisez votre propre village slave. Surmontez les difficultés de la vie médiévale et n\'offensez pas les Dieux !', '2023-04-05', 'Prochainement', 1837340, 'grimgrad.jpg', 'https://www.youtube.com/embed/66g3ENSCglY', 0),
(20, 'Full Metal Sergeant', 'Devenez l\'instructeur ! Insultez vos recrues sans remords ! Pourrez-vous transformer des recrues mou du genou en machine de guerre en 12 semaines ?', '2023-04-03', 'Prochainement', NULL, 'fullMetalSergeant.jpg', 'https://www.youtube.com/embed/sgoTGpBC8fc', 0),
(21, 'Vagabond', 'Explorez des mondes vivants générés procéduralement dans ce RPG bac-à-sable 2D. Rencontrez des centaines de personnages dans les villages, accomplissez des quêtes, fabriquez de puissants objets, achetez et meublez votre maison ou combattez des monstres dans des donjons.', NULL, '2ᵉ trimestre 2023', 1673090, 'vagabond.jpg', 'https://www.youtube.com/embed/-wk0L8bHkYU', 0),
(22, 'Blood And Mead', 'Decimate deadly foes and formidable bosses, unlock combat abilities, drink mead and go full Berserker Mode! Join Usyldor on a bone-crushing quest for revenge that will make him a legend.\r\n\r\nDécime ennemis mortels et redoutables boss, débloque des compétences de combat, bois de l\'hydromel et passe en mode Berserker ! Rejoins Usyldor dans une sanglante quête de revanche qui fera de lui une légende.', NULL, 'Quand Odin l\'aura décidé !', 1081830, 'bloodAndMead.jpg', 'https://www.youtube.com/embed/SZH5StcDUFA', 0),
(23, 'Myriads: Renaissance', 'Myriads: Renaissance est un jeu de stratégie au tour par tour avec construction de ville et mécanique 4X. Situé dans un monde fantastique composé de milliers d\'îles flottantes, vous devez développer votre capital et étendre votre royaume. Résistez aux vagues de corsaires puissants et construisez des tours de défense pour survivre à leurs incursions.', '2023-06-01', 'Prochainement', 1737220, 'myriadsRenaissance.jpg', 'https://www.youtube.com/embed/jQMtLVX3S7M', 0),
(24, 'Do Not Feed the Monkeys 2099', 'Espionnez à travers les caméras, envahissez des vies privées et découvrez des secrets dans ce simulateur de voyeurisme. Bienvenue dans le futur du Primate Observation Club (Club d’observation des primates). En 2099, la règle d\'or demeure : DO NOT feed the monkeys ! : NE nourrissez PAS les singes !', '2023-05-25', 'Prochainement', 1964040, 'DoNotFeedtheMonkeys2099.jpg', 'https://www.youtube.com/embed/cTQqpwYk5nc', 0),
(25, 'Pan\'orama', 'Pan\'orama est un jeu de simulation de puzzle relaxant et apaisant dans lequel vous créez des paysages incroyables en utilisant différents types de tuiles, mais surtout en découvrant les connexions entre elles et en trouvant des combinaisons uniques.', '2023-07-11', 'Prochainement', 1730250, 'pan\'orama.jpg', 'https://www.youtube.com/embed/yg_IPfzLQ3g', 0),
(26, 'Bzzzt', 'Empêchez le terrible scientifique Badbert de conquérir le monde dans ce génial jeu de plateforme réalisé en pixel art tout droit sorti des années 80 ! contrôlez ZX8000, le petit robot rusé et maîtrisez vos compétences dans un monde en constante évolution rempli de pièges astucieux et de robots.', '2023-07-20', 'Prochainement', 1293170, 'Bzzzt.jpg', 'https://www.youtube.com/embed/Opp65mYyQT8', 0),
(27, 'Lightracer Spark', 'Lightracer Spark est un jeu narratif de science-fiction. Vous êtes un Amender d\'une haute civilisation, descendant dans divers mondes extraterrestres. Guidez les êtres vivants vers la prospérité ou étouffez l\'étincelle dans l\'œuf. Accumulez de la force grâce à des choix et des stratégies pour saisir l\'ascension et la chute de toutes les civilisations.', '2023-04-12', 'Prochainement', 2094270, 'LightracerSpark.jpg', 'https://www.youtube.com/embed/S1koMM19tGA', 0),
(28, 'Hunt: Showdown', 'Hunt: Showdown est un palpitant jeu de tir à la première personne, en JcJcE. Terrassez des monstres cauchemardesques et disputez-vous des primes qui vous apporteront gloire, équipement et de l\'or dans cette implacable – et inoubliable – expérience multijoueur en ligne.', '2019-08-27', 'Prochainement', 594650, 'HuntShowdown.jpg', 'https://www.youtube.com/embed/e0SVpjWn7CM', 0),
(29, 'The Long Drive', 'Jeu de conduite de voiture de survie semi-post apocalyptique en monde ouvert généré aléatoirement.', '2019-09-25', 'Prochainement', 1017180, 'TheLongDrive.jpg', 'https://www.youtube.com/embed/qJ6WmkGrbjo', 0),
(30, 'Trinity Fusion', 'Prenez le contrôle de vos alter egos et partez en mission pour sauver le multivers dans ce rogue-lite de plateforme plein d\'action ! Explorez des mondes de science-fiction et plongez dans des combats effrénés qui mettront vos talents à l\'épreuve.', '2023-04-13', 'Prochainement', 1911360, 'TrinityFusion.jpg', 'https://www.youtube.com/embed/2WorxtJuqP8', 0),
(31, 'Greedventory', 'Greedventory est une expérience d\'action RPG en pixel-art, où la seule chose qui vous sépare d\'une mort rapide est votre souris. Frappez, parez et lancez de puissants sorts sur vos ennemis, trouvez des trésors, explorez un royaume brutal et devenez le héros que vous n\'avez jamais rêvé d\'être !', '2023-05-17', 'Prochainement', 1895820, 'Greedventory.jpg', 'https://www.youtube.com/embed/q7eg7GKHuw4', 0),
(32, 'Passpartout 2: The Lost Artist', 'Lancez-vous dans votre aventure d\'artiste en difficulté. Dessinez et vendez de l\'art à des critiques effrontés pour récupérer votre carrière artistique perdue. Explorez l\'attachante ville affamée d\'art de Phénix et montrez-leur que vous êtes un véritable artiste !', '2023-04-04', 'Prochainement', 1571100, 'Passpartout2TheLostArtist.jpg', 'https://www.youtube.com/embed/qM7OUD_9sOc', 0);

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
(9, 10),
(10, 11),
(11, 12),
(13, 13),
(12, 14),
(14, 15),
(15, 16),
(16, 17),
(17, 18),
(18, 19),
(19, 20),
(20, 21),
(21, 22),
(22, 23),
(24, 24),
(23, 25),
(25, 26),
(26, 27),
(27, 28),
(28, 29),
(29, 30),
(32, 31),
(30, 32),
(31, 33);

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
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(20, 1),
(21, 1),
(25, 1),
(26, 1),
(28, 1),
(30, 1),
(31, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2);

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
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(1, 2),
(3, 2),
(5, 2),
(7, 2),
(8, 2),
(16, 2),
(21, 2),
(26, 2),
(1, 3),
(3, 3),
(8, 3),
(10, 3),
(15, 3),
(16, 3),
(22, 3),
(24, 3),
(26, 3),
(32, 3);

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
(10, 1),
(11, 1),
(17, 1),
(22, 1),
(26, 1),
(28, 1),
(30, 1),
(31, 1),
(4, 2),
(5, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(21, 2),
(22, 2),
(26, 2),
(29, 2),
(31, 2),
(7, 3),
(1, 4),
(3, 4),
(6, 4),
(8, 4),
(9, 4),
(16, 4),
(18, 4),
(19, 4),
(20, 4),
(23, 4),
(29, 4),
(32, 4),
(4, 5),
(17, 5),
(28, 5),
(29, 5),
(5, 6),
(10, 6),
(22, 6),
(26, 6),
(30, 6),
(3, 7),
(5, 7),
(6, 7),
(8, 7),
(9, 7),
(12, 7),
(15, 7),
(21, 7),
(22, 7),
(27, 7),
(30, 7),
(31, 7),
(6, 9),
(9, 9),
(16, 9),
(19, 9),
(20, 9),
(23, 9),
(24, 9),
(25, 9),
(27, 9);

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
  `date` datetime NOT NULL,
  `posted_by_id` int UNSIGNED NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = visible\r\n1 = non-visible',
  PRIMARY KEY (`id`),
  KEY `posted_by_id` (`posted_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `posted_by_id`, `is_visible`) VALUES
(1, 'Bienvenu à tous sur DvinD !', '<p>Dvind est votre nouvelle plateforme d\'actualité et de communication autour du jeu vidéo indépendant. Ici, nous pourrons échanger entre passionnés et développeurs sur nos jeux indés préférés et contribuer à leur visibilité.</p>\r\n\r\n<p>Venez participer !</p>', '2023-03-27 09:53:54', 2, 0),
(2, 'Une bonne actu test', '<p> La bonne vieille news test qui fait zizir. </p>', '2023-03-27 10:26:21', 2, 0),
(3, 'Demonologist sort aujourd\'hui !', '<p>Le jeu d\'horreur <a href=\"http://localhost/DvinD/views/view_fiche%20de%20jeu.php?id=17\">Demonologist</a> sort de son accès anticipé ce lundi 27 mars.</p>\r\n\r\n<p>Demonologist est un jeu d\'horreur en coopération qui peut être joué avec au moins 1 et jusqu\'à 4 joueurs.</p>\r\n', '2023-03-27 12:23:20', 2, 0),
(4, 'La news du futur', '<p>Pour voir si tout va bien <3</p>', '2023-03-28 08:22:55', 14, 0),
(5, 'Lightracer Spark annonce sa date de sortie', '<p>Les développeurs de <a href=\"view_fiche de jeu.php?id=27\">Lightracer Spark</a>, le jeu de stratégie spatial, ont officiellement annoncé sa sortie pour le 12 avril prochain.</p>\r\n\r\n<p>Le jeu sera au prix de 12.79€ mais bénéficiera d\'une promotion de -10% la première semaine.</p>', '2023-03-28 09:54:20', 2, 0),
(6, 'Hunt: Showdown - The Ward of the Reptilian Questline', '<p>De nouvelles quêtes sont arrivées !</p>\r\n\r\n<p>Avec la mise à jour 1.12, il y aura deux nouvelles séries de quêtes dans le bayou : \"La protection des reptiliens\" et \"La vengeance des écorchés\". Ces séries de quêtes offrent aux chasseurs de nouveaux types d\'activités à poursuivre, ainsi que de précieuses récompenses à gagner en six actes, notamment le déverrouillage de nouvelles variantes d\'armes, de l\'équipement légendaire, etc.</p>\r\n<p>Les principales récompenses pour les séries de quêtes à venir sont les suivantes. Assurez-vous de jouer à travers les séries de quêtes dans les délais impartis afin de ne pas manquer les récompenses !</p>\r\n\r\n<p>\"Le service du reptilien\"29 mars - 1er mai 2023 </p>\r\n\r\n<ul><li>Acte 1 – Dusters légendaires \"Monongahela Bruiser\"</li>\r\n<li>Acte 2 – Winfield M1876 Centennial Short (déverrouillage d\'arme)</li>\r\n<li>Acte 3 – Légendaire Scottfield Model 3 Précision \"Somber Gale\"</li>\r\n<li>Acte 4 – Winfield M1876 Centennial Shorty (déverrouillage d\'arme)</li>\r\n<li>Acte 5 - Légendaire Berthier Mle 1892 \"Aviron du Passeur\"</li>\r\n<li>Acte 6 – Chasseur Légendaire \"The Scaled Ward\"</li></ul>\r\n\r\n<p>\"La vengeance des écorchés\" arrive peu après The Ward of the Reptilian ! </p>\r\n\r\n<ul><li>Acte 1 - Baïonnette Springfield M1892 Krag (déverrouillage d\'arme)</li>\r\n<li>Acte 2 - Officier légendaire Nagant M1895 Brawler \"Killian\'s Chance\"</li>\r\n<li>Acte 3 – Springfield M1892 Krag Sniper (déverrouillage d\'arme)</li>\r\n<li>Acte 4 – Lance-bombes légendaire \"La vis de Nola\"</li>\r\n<li>Acte 5 – Charme d\'arme \"Marred Murex\"</li>\r\n<li>Acte 6 – Chasseur légendaire \"Le écorché\"</li></ul>\r\n', '2023-03-29 13:28:22', 2, 0),
(7, 'Papa\'s Freezeria Deluxe sort aujourd\'hui', '<img src=\"../image/jeux/PapasFreezeriaDeluxe.jpg\" alt=\"\">\r\n\r\n<p><a href=\"view_fiche de jeu.php?id=18\">Papa\'s Freezeria Deluxe</a>, le dernier jeu de la série des Papa\'s de Flipline Studios, sort ce vendredi 31 mars sur Steam.</p>\r\n\r\n<p>Le prix n\'a toujours pas été officiellement annoncé.</p>', '2023-03-31 10:02:27', 2, 0);

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

--
-- Déchargement des données de la table `news_games`
--

INSERT INTO `news_games` (`news_id`, `game_id`) VALUES
(3, 17),
(7, 18),
(5, 27),
(6, 28);

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(36, 'theLastSpell4.jpg', 9),
(37, 'ami1.jpg', 10),
(38, 'ami2.jpg', 10),
(39, 'ami3.jpg', 10),
(40, 'ami4.jpg', 10),
(41, 'bravers1.jpg', 11),
(42, 'bravers2.jpg', 11),
(43, 'bravers3.jpg', 11),
(44, 'bravers4.jpg', 11),
(45, 'harmony1.jpg', 13),
(46, 'harmony2.jpg', 13),
(47, 'harmony3.jpg', 13),
(48, 'harmony4.jpg', 13),
(49, 'sea1.jpg', 12),
(50, 'sea2.jpg', 12),
(51, 'sea3.jpg', 12),
(52, 'sea4.jpg', 12),
(53, 'twoFalls1.jpg', 14),
(54, 'twoFalls2.jpg', 14),
(55, 'twoFalls3.jpg', 14),
(56, 'twoFalls4.jpg', 14),
(57, 'discoElysium1.jpg', 15),
(58, 'discoElysium2.jpg', 15),
(59, 'discoElysium3.jpg', 15),
(60, 'discoElysium4.jpg', 15),
(61, 'rimWolrd1.jpg', 16),
(62, 'rimWolrd2.jpg', 16),
(63, 'rimWolrd3.jpg', 16),
(64, 'rimWolrd4.jpg', 16),
(65, 'demonologist1.jpg', 17),
(66, 'demonologist2.jpg', 17),
(67, 'demonologist3.jpg', 17),
(68, 'demonologist4.jpg', 17),
(69, 'papaFreezeriaDeluxe1.jpg', 18),
(70, 'papaFreezeriaDeluxe2.jpg', 18),
(71, 'papaFreezeriaDeluxe3.jpg', 18),
(72, 'papaFreezeriaDeluxe4.jpg', 18),
(73, 'grimgrad1.jpg', 19),
(74, 'grimgrad2.jpg', 19),
(75, 'grimgrad3.jpg', 19),
(76, 'grimgrad4.jpg', 19),
(77, 'fullMetalSergeant1.jpg', 20),
(78, 'fullMetalSergeant2.jpg', 20),
(79, 'fullMetalSergeant3.jpg', 20),
(80, 'fullMetalSergeant4.jpg', 20),
(81, 'vagabond1.jpg', 21),
(82, 'vagabond2.jpg', 21),
(83, 'vagabond3.jpg', 21),
(84, 'vagabond4.jpg', 21),
(85, 'bloodAndMead1.jpg', 22),
(86, 'bloodAndMead2.jpg', 22),
(87, 'bloodAndMead3.jpg', 22),
(88, 'bloodAndMead4.jpg', 22),
(89, 'MyriadsRenaissance1.jpg', 23),
(90, 'MyriadsRenaissance2.jpg', 23),
(91, 'MyriadsRenaissance3.jpg', 23),
(92, 'MyriadsRenaissance4.jpg', 23),
(93, 'DoNotFeedtheMonkeys20991.jpg', 24),
(94, 'DoNotFeedtheMonkeys20992.jpg', 24),
(95, 'DoNotFeedtheMonkeys20993.jpg', 24),
(96, 'DoNotFeedtheMonkeys20994.jpg', 24),
(97, 'Bzzzt1.jpg', 26),
(98, 'Bzzzt2.jpg', 26),
(99, 'Bzzzt3.jpg', 26),
(100, 'Bzzzt4.jpg', 26),
(101, 'Pan\'orama1.jpg', 25),
(102, 'Pan\'orama2.jpg', 25),
(103, 'Pan\'orama3.jpg', 25),
(104, 'Pan\'orama4.jpg', 25),
(105, 'LightracerSpark1.jpg', 27),
(106, 'LightracerSpark2.jpg', 27),
(107, 'LightracerSpark3.jpg', 27),
(108, 'LightracerSpark4.jpg', 27),
(109, 'HuntShowdown1.jpg', 28),
(110, 'HuntShowdown2.jpg', 28),
(111, 'HuntShowdown3.jpg', 28),
(112, 'HuntShowdown4.jpg', 28),
(113, 'TheLongDrive1.jpg', 29),
(114, 'TheLongDrive2.jpg', 29),
(115, 'TheLongDrive3.jpg', 29),
(116, 'TheLongDrive4.jpg', 29),
(117, 'TrinityFusion1.jpg', 30),
(118, 'TrinityFusion2.jpg', 30),
(119, 'TrinityFusion3.jpg', 30),
(120, 'TrinityFusion4.jpg', 30),
(121, 'Greedventory1.jpg', 31),
(122, 'Greedventory2.jpg', 31),
(123, 'Greedventory3.jpg', 31),
(124, 'Greedventory4.jpg', 31),
(125, 'Passpartout2TheLostArtist1.jpg', 32),
(126, 'Passpartout2TheLostArtist2.jpg', 32),
(127, 'Passpartout2TheLostArtist3.jpg', 32),
(128, 'Passpartout2TheLostArtist4.jpg', 32);

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
