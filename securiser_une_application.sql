-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2013 at 07:50 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.7-ZS5.5.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ouvrages`
--
DROP DATABASE IF EXISTS `ouvrages`;
CREATE DATABASE `ouvrages` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ouvrages`;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant technique de la collection',
  `description` varchar(400) DEFAULT NULL,
  `titre` varchar(100) NOT NULL COMMENT 'Nom de la collection',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table contenant les collections' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `description`, `titre`) VALUES
(1, NULL, 'Atrium'),
(2, NULL, 'Cahiers d''exercices'),
(3, NULL, 'Certifications'),
(4, NULL, 'Master Graphisme et Multimédia Médian'),
(5, NULL, 'Memory');

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant technique de l''ouvrage',
  `collection_id` int(2) NOT NULL COMMENT 'Identifiant de la collection Ã  laquelle appartient l''ouvrage',
  `titre` varchar(100) NOT NULL COMMENT 'Titre de l''ouvrage',
  `description` VARCHAR( 200 ) NULL COMMENT  'Description de l''ouvrage',
  `image_couverture` VARCHAR( 50 ) NULL COMMENT 'Image de l''ouvrage',
  PRIMARY KEY (`id`),
  KEY `fk_collection_id` (`collection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table contenant les ouvrages' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `collection_id`, `titre`) VALUES
(4, 2, 'PowerPoint 2013'),
(5, 2, 'Access 2013'),
(6, 3, 'Linux'),
(7, 3, 'Windows 7'),
(8, 3, 'ITIL v3'),
(9, 4, 'Dreamweaver CS6 pour PC/Mac'),
(10, 4, 'Gimp 2.8'),
(11, 4, 'Photoshop CS6'),
(12 , 3,  'PHP 5.5');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant technique de l''utilisateur',
  `identifiant` varchar(20) NOT NULL COMMENT 'Identifiant de l''utilisateur',
  `mdp` varchar(60) NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Table content les utilisateurs' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `identifiant`, `mdp`) VALUES
(1, 'ouvrage', '-edition!4891'),
(2, 'cyrille', 'F9Vu3GqU/jZ2');

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`);
