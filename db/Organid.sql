-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 17 Octobre 2013 à 08:57
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Organid`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `Id_Cat` int(5) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Categories`
--


-- --------------------------------------------------------

--
-- Structure de la table `Conseils`
--

CREATE TABLE `Conseils` (
  `Id_Conseil` int(5) NOT NULL AUTO_INCREMENT,
  `Conseil` varchar(300) NOT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_Conseil`),
  KEY `Id_U` (`Id_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Conseils`
--


-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `Id_Msg` int(5) NOT NULL AUTO_INCREMENT,
  `Sujet` varchar(50) NOT NULL,
  `Contenu` varchar(300) NOT NULL,
  `Id_Exp` int(5) NOT NULL,
  `Id_Dest` int(5) NOT NULL,
  PRIMARY KEY (`Id_Msg`),
  KEY `Id_Exp` (`Id_Exp`,`Id_Dest`),
  KEY `Id_Dest` (`Id_Dest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Messages`
--


-- --------------------------------------------------------

--
-- Structure de la table `Rappels`
--

CREATE TABLE `Rappels` (
  `Id_Rappel` int(5) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Message` varchar(300) NOT NULL,
  `Type` tinyint(4) NOT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_Rappel`),
  KEY `Id_U` (`Id_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Rappels`
--


-- --------------------------------------------------------

--
-- Structure de la table `Realise`
--

CREATE TABLE `Realise` (
  `Date` date NOT NULL,
  `Check` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Realise`
--


-- --------------------------------------------------------

--
-- Structure de la table `Taches`
--

CREATE TABLE `Taches` (
  `Id_Tm` int(5) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `Difficulte` int(3) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Id_Cat` int(5) NOT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_Tm`),
  KEY `Id_Cat` (`Id_Cat`,`Id_U`),
  KEY `Id_U` (`Id_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Taches`
--


-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `Id_U` int(5) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Age` int(2) NOT NULL,
  `Sexe` varchar(1) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Pwd` varchar(15) NOT NULL,
  `Telephone` int(10) NOT NULL,
  `Handicap` int(2) NOT NULL,
  `Avatar` varchar(200) NOT NULL,
  PRIMARY KEY (`Id_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Utilisateurs`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Conseils`
--
ALTER TABLE `Conseils`
  ADD CONSTRAINT `Conseils_ibfk_1` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`Id_Exp`) REFERENCES `Utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`Id_Dest`) REFERENCES `Utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Rappels`
--
ALTER TABLE `Rappels`
  ADD CONSTRAINT `Rappels_ibfk_1` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Taches`
--
ALTER TABLE `Taches`
  ADD CONSTRAINT `Taches_ibfk_1` FOREIGN KEY (`Id_Cat`) REFERENCES `Categories` (`Id_Cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Taches_ibfk_2` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;
