-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 21 Décembre 2013 à 18:27
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `organid`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `Id_Cat` int(5) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`Id_Cat`, `Nom`) VALUES
(1, 'nettoyage'),
(2, 'exterieur'),
(3, 'interieur'),
(4, 'animaux');

-- --------------------------------------------------------

--
-- Structure de la table `conseils`
--

CREATE TABLE IF NOT EXISTS `conseils` (
  `Id_Conseil` int(5) NOT NULL AUTO_INCREMENT,
  `Conseil` varchar(300) NOT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_Conseil`),
  KEY `Id_U` (`Id_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `Id_Msg` int(5) NOT NULL AUTO_INCREMENT,
  `Sujet` varchar(50) NOT NULL,
  `Contenu` varchar(300) NOT NULL,
  `Id_Exp` int(5) NOT NULL,
  `Id_Dest` int(5) NOT NULL,
  PRIMARY KEY (`Id_Msg`),
  KEY `Id_Exp` (`Id_Exp`,`Id_Dest`),
  KEY `Id_Dest` (`Id_Dest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rappels`
--

CREATE TABLE IF NOT EXISTS `rappels` (
  `Id_Rappel` int(5) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Message` varchar(300) NOT NULL,
  `Type` tinyint(4) NOT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_Rappel`),
  KEY `Id_U` (`Id_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `realise`
--

CREATE TABLE IF NOT EXISTS `realise` (
  `Id_R` int(5) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Check` tinyint(4) NOT NULL,
  `Id_U` int(3) NOT NULL,
  `Id_Tm` int(3) NOT NULL,
  PRIMARY KEY (`Id_R`),
  KEY `Id_U` (`Id_U`),
  KEY `Id_Tm` (`Id_Tm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `realise`
--

INSERT INTO `realise` (`Id_R`, `Date`, `Check`, `Id_U`, `Id_Tm`) VALUES
(1, '2013-12-22', 0, 1, 1),
(2, '2013-10-30', 0, 1, 5),
(3, '2013-11-02', 0, 1, 13),
(4, '2013-11-01', 0, 2, 2),
(5, '2013-11-03', 0, 2, 8),
(6, '2013-12-22', 0, 3, 2),
(7, '2013-11-03', 0, 3, 4),
(8, '2013-11-09', 0, 3, 8),
(9, '2013-12-23', 0, 1, 1),
(10, '2013-12-26', 0, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `Id_Tm` int(5) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `Difficulte` int(3) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Id_Cat` int(5) NOT NULL,
  PRIMARY KEY (`Id_Tm`),
  KEY `Id_Cat` (`Id_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`Id_Tm`, `Nom`, `Difficulte`, `Description`, `Id_Cat`) VALUES
(1, 'Vaisselle', 2, 'Faire la vaisselle', 1),
(2, 'Aspirateur', 2, 'Passer l''aspirateur', 1),
(3, 'Tondre la pelouse', 4, '', 2),
(4, 'Tailler haie', 4, 'Tailler les haies', 2),
(5, 'Vitres', 3, 'Nettoyer les vitres', 1),
(6, 'Poussière', 2, 'Faire la poussiere des meubles', 1),
(7, 'Lessive', 1, 'Laver le linge', 3),
(8, 'Étendre linge', 3, '', 3),
(9, 'Repassage', 3, 'Repasser le linge', 3),
(10, 'Courses', 4, 'Faire les courses', 3),
(11, 'Salle de bain', 5, 'Nettoyer la salle de bain', 1),
(12, 'WC', 3, 'Nettoyer les WC', 1),
(13, 'Poubelle', 1, 'Sortir la poubelle', 3),
(14, 'Mettre la table', 1, '', 3),
(15, 'Débarrasser la table', 1, '', 3),
(16, 'Arroser les plantes', 1, '', 3),
(17, 'Sortir le chien', 3, '', 4),
(18, 'Nourrir animaux', 1, '', 4),
(19, 'Changer la cage', 2, '', 4),
(20, 'Terasse', 5, 'Laver la terasse', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
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
  `Admin` tinyint(2) NOT NULL,
  PRIMARY KEY (`Id_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id_U`, `Nom`, `Prenom`, `Age`, `Sexe`, `Email`, `Pwd`, `Telephone`, `Handicap`, `Avatar`, `Admin`) VALUES
(1, 'James', 'Lebron', 28, 'M', 'lebronjames@gmail.com', 'lbj6', 0, 2, '', 1),
(2, 'Bryant', 'Kobe', 34, 'M', 'kobeBryant@gmail.com', 'kb24', 0, 0, '', 0),
(3, 'TOTO', 'toto', 30, 'M', 'toto@gmail.com', 'toto', 324536902, 0, '', 1),
(4, 'Bauhin', 'Jean', 0, 'f', 'jean@bauhin.fr', 'jjj', 0, 0, '', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conseils`
--
ALTER TABLE `conseils`
  ADD CONSTRAINT `Conseils_ibfk_1` FOREIGN KEY (`Id_U`) REFERENCES `utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`Id_Exp`) REFERENCES `utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`Id_Dest`) REFERENCES `utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rappels`
--
ALTER TABLE `rappels`
  ADD CONSTRAINT `Rappels_ibfk_1` FOREIGN KEY (`Id_U`) REFERENCES `utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `realise`
--
ALTER TABLE `realise`
  ADD CONSTRAINT `realise_ibfk_1` FOREIGN KEY (`Id_U`) REFERENCES `utilisateurs` (`Id_U`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realise_ibfk_2` FOREIGN KEY (`Id_Tm`) REFERENCES `taches` (`Id_Tm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `Taches_ibfk_1` FOREIGN KEY (`Id_Cat`) REFERENCES `categories` (`Id_Cat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
