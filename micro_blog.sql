-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 jan. 2019 à 16:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `micro_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8mb4_bin NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `compteur` int(4) DEFAULT '0',
  `ip` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date`, `compteur`, `ip`) VALUES
(15, 'Message de bienvenue', '2019-01-17 15:06:52.000000', 0, NULL),
(16, 'Bonjour à tous', '2019-01-17 15:06:58.000000', 0, NULL),
(17, 'Ce blog se nomme le fil', '2019-01-17 15:07:08.000000', 0, NULL),
(18, 'Ceci est un message', '2019-01-17 15:09:40.000000', 0, NULL),
(19, 'Maecenas consequat ante sit amet luctus vulputate', '2019-01-17 15:10:14.000000', 0, NULL),
(20, 'Lorem ipsum dolor sit amet', '2019-01-17 15:10:24.000000', 0, NULL),
(21, ' Phasellus et mauris a purus fermentum posuere', '2019-01-17 15:10:35.000000', 0, NULL),
(22, 'Integer at iaculis odio', '2019-01-17 15:10:44.000000', 0, NULL),
(23, 'Duis tempor mi tellus', '2019-01-17 15:10:53.000000', 0, NULL),
(24, 'Fusce malesuada vitae mi quis rutrum', '2019-01-17 15:11:14.000000', 0, NULL),
(25, 'Nullam accumsan orci auctor quam mattis', '2019-01-17 15:11:18.000000', 1, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `password`) VALUES
('theo', 'theo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
