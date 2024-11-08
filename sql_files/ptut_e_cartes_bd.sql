-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 03 oct. 2020 à 15:06
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ptut_e_cartes_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir_critere`
--

DROP TABLE IF EXISTS `avoir_critere`;
CREATE TABLE IF NOT EXISTS `avoir_critere` (
  `idProduit` int(11) NOT NULL,
  `idCritere` int(11) NOT NULL,
  KEY `idProduit` (`idProduit`),
  KEY `idCritere` (`idCritere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idProduit` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  KEY `idIngredient` (`idIngredient`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `critere`
--

DROP TABLE IF EXISTS `critere`;
CREATE TABLE IF NOT EXISTS `critere` (
  `idCritere` int(11) NOT NULL AUTO_INCREMENT,
  `nomCritere` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idCritere`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngredient` int(11) NOT NULL AUTO_INCREMENT,
  `nomIngredient` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idIngredient`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mdp_cuisine`
--

DROP TABLE IF EXISTS `mdp_cuisine`;
CREATE TABLE IF NOT EXISTS `mdp_cuisine` (
  `mdp` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mdp_cuisine`
--

INSERT INTO `mdp_cuisine` (`mdp`) VALUES
('$2y$10$pVBiK.eP9hNLxLXFUh/i0uK8mnh1hT8Pc6pokOui8scXYjoteXJDK');

-- --------------------------------------------------------

--
-- Structure de la table `mdp_gestion`
--

DROP TABLE IF EXISTS `mdp_gestion`;
CREATE TABLE IF NOT EXISTS `mdp_gestion` (
  `mdp` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mdp_gestion`
--

INSERT INTO `mdp_gestion` (`mdp`) VALUES
('$2y$10$ZO1SkVJejgYpa8Bk9FujJeXmRJmIRWM8edjIzpsivO5M.8NfpPZWa');

-- --------------------------------------------------------

--
-- Structure de la table `platdujour`
--

DROP TABLE IF EXISTS `platdujour`;
CREATE TABLE IF NOT EXISTS `platdujour` (
  `dateJour` varchar(20) COLLATE utf8_bin NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`dateJour`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `NomProduit` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Image1` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Image2` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Image3` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `DateModif` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Prix` double NOT NULL,
  `Allergene` tinyint(1) DEFAULT NULL,
  `TypePlat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dateEtHeure` varchar(50) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
