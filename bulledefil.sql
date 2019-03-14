-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 14 mars 2019 à 15:18
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
-- Base de données :  `bulledefil`
--

-- --------------------------------------------------------

--
-- Structure de la table `banquedefil`
--

DROP TABLE IF EXISTS `banquedefil`;
CREATE TABLE IF NOT EXISTS `banquedefil` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `nom_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `banquedefil`
--

INSERT INTO `banquedefil` (`id_image`, `nom_image`, `description`) VALUES
(1, 'tissus_uni.jpg', 'Tissus uni'),
(2, 'tissus__etoile_gris.jpg', 'Tissus étoilé'),
(3, 'tissus_liberty.jpg', 'Tissus liberty');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL DEFAULT 'non renseigné',
  `objet` text NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `prenom`, `nom`, `mail`, `telephone`, `objet`) VALUES
(1, ' Nicolas', 'HAMY', 'nicotest@gmail.com', '06 00 00 00 00', 'Bonjour,\r\n\r\nJe vous contact pour passer une commande concernant la couture ...'),
(2, 'Geoffroy', 'DUTOT', 'geoffroytest@gmail.com', '09 00 00 00 00', 'Bonjour,\r\n\r\nJe vous contacte pour avoir des renseignement sur une de vos coutures ...');

-- --------------------------------------------------------

--
-- Structure de la table `data_text`
--

DROP TABLE IF EXISTS `data_text`;
CREATE TABLE IF NOT EXISTS `data_text` (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` varchar(5000) NOT NULL,
  PRIMARY KEY (`id_text`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `data_text`
--

INSERT INTO `data_text` (`id_text`, `name`, `text`) VALUES
(1, 'description', 'Couturière indépendante et passionné  depuis une vingtaine d\'années, je réalise principalement des accessoires esthétique comme des sacs, trousses pour faciliter la vie de chacun au quotidien\r\n\r\n    mais également des coutures pour bébé, enfants, femmes.\r\n\r\n    Soucieuse de la qualité de mon travail, j\'utilise principalement des tissus bio et oeko tex de bonne qualité veillant à ne pas impacter négativement l\'environnement en produisant 0 déchets.\r\n\r\n    Aussi les commandes que vous me confierez seront prises au sérieux, personnalisable selon vos critères et effectuées avec professionnalisme.');

-- --------------------------------------------------------

--
-- Structure de la table `logadmin`
--

DROP TABLE IF EXISTS `logadmin`;
CREATE TABLE IF NOT EXISTS `logadmin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logadmin`
--

INSERT INTO `logadmin` (`id_admin`, `login`, `mdp`, `rank`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
