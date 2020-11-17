-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 nov. 2020 à 15:40
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `patriciapaint`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Id` smallint(6) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(80) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`Id`, `Category_Name`) VALUES
(1, 'huile'),
(2, 'aquarelle');

-- --------------------------------------------------------

--
-- Structure de la table `paints`
--

DROP TABLE IF EXISTS `paints`;
CREATE TABLE IF NOT EXISTS `paints` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Photo` varchar(80) DEFAULT NULL,
  `Category_Id` smallint(6) DEFAULT NULL,
  `Theme_Id` smallint(6) DEFAULT NULL,
  `Height` int(10) NOT NULL,
  `Width` int(10) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Category_Id` (`Category_Id`),
  KEY `Theme_Id` (`Theme_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `Id` smallint(6) NOT NULL AUTO_INCREMENT,
  `Theme_Name` varchar(80) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`Id`, `Theme_Name`) VALUES
(1, 'portrait'),
(2, 'paysage');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` smallint(6) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(64) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `FirstName`, `Email`, `Password`) VALUES
(2, 'alexis', 'masuyalex@hotmail.com', '$2y$10$BTCg5WK/CBr9wBazCAUDDuanmcCK90TpeW2bLW3hNRLBwYo3A6v4e');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paints`
--
ALTER TABLE `paints`
  ADD CONSTRAINT `paints_ibfk_2` FOREIGN KEY (`Theme_Id`) REFERENCES `theme` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `paints_ibfk_3` FOREIGN KEY (`Category_Id`) REFERENCES `category` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
