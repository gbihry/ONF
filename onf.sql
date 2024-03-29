-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2023 at 01:51 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onf`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) DEFAULT NULL,
  `typeEPI` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `typeEPI`) VALUES
(1, 'Protection des membres inférieurs', 'EPI'),
(2, 'Éléments chaussant', 'EPI'),
(3, 'Protection des mains', 'EPI'),
(6, 'T-shirt', 'EPI'),
(8, 'Lunettes', 'EPI'),
(10, 'Vêtements', 'VET'),
(11, 'Éléments chaussant non ouvrier', 'EPINonOuvrier'),
(12, 'Protection des mains non ouvrier', 'EPINonOuvrier'),
(13, 'Autres effets non ouvrier', 'EPINonOuvrier'),
(14, 'Lunettes non ouvrier', 'EPINonOuvrier'),
(15, 'Casques non ouvrier', 'EPINonOuvrier');

-- --------------------------------------------------------

--
-- Table structure for table `commandeepi`
--

DROP TABLE IF EXISTS `commandeepi`;
CREATE TABLE IF NOT EXISTS `commandeepi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCrea` datetime DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `terminer` tinyint(1) NOT NULL DEFAULT '0',
  `dateCreaFini` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commandevet`
--

DROP TABLE IF EXISTS `commandevet`;
CREATE TABLE IF NOT EXISTS `commandevet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCrea` datetime DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `terminer` tinyint(1) NOT NULL DEFAULT '0',
  `dateCreaFini` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `Message`) VALUES
(1, 'Année 2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `concerne`
--

DROP TABLE IF EXISTS `concerne`;
CREATE TABLE IF NOT EXISTS `concerne` (
  `idStatut` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `quantiteMax` int(11) NOT NULL,
  PRIMARY KEY (`idStatut`,`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concerne`
--

INSERT INTO `concerne` (`idStatut`, `idType`, `quantiteMax`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 1),
(1, 4, 4),
(1, 5, 3),
(1, 6, 3),
(1, 7, 3),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 0),
(1, 19, 1),
(1, 20, 4),
(1, 21, 100),
(1, 26, 2),
(1, 27, 2),
(2, 1, 1),
(2, 2, 2),
(2, 3, 1),
(2, 4, 4),
(2, 5, 1),
(2, 6, 4),
(2, 7, 4),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 17, 0),
(2, 19, 0),
(2, 20, 4),
(2, 21, 100),
(2, 26, 2),
(2, 27, 2),
(3, 1, 1),
(3, 2, 2),
(3, 3, 1),
(3, 4, 4),
(3, 5, 1),
(3, 6, 3),
(3, 7, 3),
(3, 8, 1),
(3, 9, 3),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(3, 13, 1),
(3, 14, 1),
(3, 15, 1),
(3, 16, 1),
(3, 17, 0),
(3, 19, 0),
(3, 20, 4),
(3, 21, 100),
(3, 26, 2),
(3, 27, 2),
(4, 1, 1),
(4, 2, 2),
(4, 3, 1),
(4, 4, 4),
(4, 5, 1),
(4, 6, 3),
(4, 7, 3),
(4, 8, 1),
(4, 9, 3),
(4, 10, 1),
(4, 11, 1),
(4, 12, 1),
(4, 13, 1),
(4, 14, 2),
(4, 15, 1),
(4, 16, 1),
(4, 17, 0),
(4, 19, 0),
(4, 20, 4),
(4, 21, 100),
(4, 26, 2),
(4, 27, 2),
(5, 1, 1),
(5, 2, 2),
(5, 3, 1),
(5, 4, 4),
(5, 5, 1),
(5, 6, 3),
(5, 7, 3),
(5, 8, 1),
(5, 9, 3),
(5, 10, 1),
(5, 11, 1),
(5, 12, 1),
(5, 13, 1),
(5, 14, 1),
(5, 15, 1),
(5, 16, 1),
(5, 17, 0),
(5, 18, 1),
(5, 20, 4),
(5, 21, 100),
(5, 22, 1),
(5, 23, 1),
(5, 24, 1),
(5, 25, 1),
(5, 26, 2),
(5, 27, 2),
(6, 1, 1),
(6, 2, 2),
(6, 3, 1),
(6, 4, 4),
(6, 5, 1),
(6, 6, 3),
(6, 7, 3),
(6, 8, 1),
(6, 9, 3),
(6, 10, 1),
(6, 11, 1),
(6, 12, 1),
(6, 13, 1),
(6, 14, 1),
(6, 15, 1),
(6, 16, 1),
(6, 17, 1),
(6, 18, 1),
(6, 20, 4),
(6, 21, 100),
(6, 22, 1),
(6, 23, 1),
(6, 24, 1),
(6, 25, 1),
(6, 26, 2),
(6, 27, 2),
(7, 1, 1),
(7, 2, 2),
(7, 3, 1),
(7, 4, 4),
(7, 5, 1),
(7, 6, 3),
(7, 7, 3),
(7, 8, 1),
(7, 9, 3),
(7, 10, 1),
(7, 11, 1),
(7, 12, 1),
(7, 13, 1),
(7, 14, 1),
(7, 15, 1),
(7, 16, 1),
(7, 17, 0),
(7, 18, 1),
(7, 20, 4),
(7, 21, 100),
(7, 22, 1),
(7, 23, 1),
(7, 24, 1),
(7, 25, 1),
(7, 26, 2),
(7, 27, 2),
(8, 1, 1),
(8, 2, 2),
(8, 3, 1),
(8, 4, 4),
(8, 5, 1),
(8, 6, 3),
(8, 7, 3),
(8, 8, 1),
(8, 9, 3),
(8, 10, 1),
(8, 11, 1),
(8, 12, 1),
(8, 13, 1),
(8, 14, 1),
(8, 15, 1),
(8, 16, 1),
(8, 17, 0),
(8, 18, 1),
(8, 20, 4),
(8, 21, 100),
(8, 22, 1),
(8, 23, 1),
(8, 24, 1),
(8, 25, 1),
(8, 26, 2),
(8, 27, 2),
(9, 1, 1),
(9, 2, 2),
(9, 3, 1),
(9, 4, 4),
(9, 5, 2),
(9, 6, 3),
(9, 7, 3),
(9, 8, 1),
(9, 9, 1),
(9, 10, 1),
(9, 11, 1),
(9, 12, 1),
(9, 13, 1),
(9, 14, 1),
(9, 15, 1),
(9, 16, 1),
(9, 17, 0),
(9, 18, 1),
(9, 19, 1),
(9, 20, 4),
(9, 21, 100),
(9, 22, 1),
(9, 23, 1),
(9, 24, 1),
(9, 25, 1),
(9, 26, 2),
(9, 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `concerne_categorie_metier`
--

DROP TABLE IF EXISTS `concerne_categorie_metier`;
CREATE TABLE IF NOT EXISTS `concerne_categorie_metier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `idMetier` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concerne_categorie_metier`
--

INSERT INTO `concerne_categorie_metier` (`id`, `idCategorie`, `idMetier`) VALUES
(1, 1, 1),
(2, 2, 1),
(16, 9, 1),
(15, 8, 1),
(14, 7, 1),
(13, 6, 1),
(95, 12, 5),
(94, 11, 5),
(10, 3, 1),
(18, 1, 2),
(19, 2, 2),
(20, 3, 2),
(21, 4, 2),
(22, 5, 2),
(23, 6, 2),
(24, 7, 2),
(25, 8, 2),
(26, 9, 2),
(27, 1, 3),
(28, 2, 3),
(29, 3, 3),
(30, 4, 3),
(31, 5, 3),
(32, 6, 3),
(33, 7, 3),
(34, 8, 3),
(35, 9, 3),
(36, 1, 4),
(37, 2, 4),
(38, 3, 4),
(39, 4, 4),
(40, 5, 4),
(41, 6, 4),
(42, 7, 4),
(43, 8, 4),
(44, 9, 4),
(45, 1, 5),
(46, 2, 5),
(47, 3, 5),
(48, 4, 5),
(49, 5, 5),
(50, 6, 5),
(51, 7, 5),
(52, 8, 5),
(53, 9, 5),
(54, 1, 6),
(55, 2, 6),
(56, 3, 6),
(57, 4, 6),
(58, 5, 6),
(59, 6, 6),
(60, 7, 6),
(61, 8, 6),
(62, 9, 6),
(63, 1, 7),
(64, 2, 7),
(65, 3, 7),
(66, 4, 7),
(67, 5, 7),
(68, 6, 7),
(69, 7, 7),
(70, 8, 7),
(71, 9, 7),
(72, 1, 8),
(73, 2, 8),
(74, 3, 8),
(75, 4, 8),
(76, 5, 8),
(77, 6, 8),
(78, 7, 8),
(79, 8, 8),
(80, 9, 8),
(81, 11, 5),
(82, 11, 6),
(83, 11, 7),
(84, 11, 8),
(85, 1, 9),
(86, 2, 9),
(87, 3, 9),
(88, 4, 9),
(89, 5, 9),
(90, 6, 9),
(91, 7, 9),
(92, 8, 9),
(93, 9, 9),
(96, 13, 5),
(97, 14, 5),
(98, 15, 5),
(99, 11, 6),
(100, 12, 6),
(101, 13, 6),
(102, 14, 6),
(103, 15, 6),
(104, 11, 7),
(105, 12, 7),
(106, 13, 7),
(107, 14, 7),
(108, 15, 7),
(109, 11, 8),
(110, 12, 8),
(111, 13, 8),
(112, 14, 8),
(113, 15, 8),
(114, 11, 9),
(115, 12, 9),
(116, 13, 9),
(117, 14, 9),
(118, 15, 9);

-- --------------------------------------------------------

--
-- Table structure for table `disponible`
--

DROP TABLE IF EXISTS `disponible`;
CREATE TABLE IF NOT EXISTS `disponible` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `idTaille` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `TailleEntreJambe` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`,`idProduit`),
  KEY `idProduit` (`idProduit`),
  KEY `idTaille` (`idTaille`)
) ENGINE=MyISAM AUTO_INCREMENT=800 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disponible`
--

INSERT INTO `disponible` (`Id`, `idProduit`, `idTaille`, `prix`, `TailleEntreJambe`) VALUES
(1, 37, 8, 87, NULL),
(2, 37, 7, 87, NULL),
(3, 37, 6, 87, NULL),
(4, 37, 5, 87, NULL),
(5, 37, 4, 87, NULL),
(6, 37, 3, 87, NULL),
(7, 37, 2, 87, NULL),
(8, 37, 1, 87, NULL),
(9, 38, 1, 80, NULL),
(10, 38, 2, 80, NULL),
(11, 38, 3, 80, NULL),
(12, 38, 4, 80, NULL),
(13, 38, 5, 80, NULL),
(14, 38, 6, 80, NULL),
(15, 38, 7, 80, NULL),
(16, 39, 2, 57, NULL),
(17, 39, 3, 57, NULL),
(18, 39, 4, 57, NULL),
(19, 39, 5, 57, NULL),
(20, 39, 6, 57, NULL),
(21, 39, 7, 57, NULL),
(22, 39, 8, 57, NULL),
(23, 40, 1, 58, NULL),
(24, 40, 2, 58, NULL),
(25, 40, 3, 58, NULL),
(26, 40, 4, 58, NULL),
(27, 40, 5, 58, NULL),
(28, 40, 6, 58, NULL),
(29, 40, 7, 58, NULL),
(30, 41, 2, 22, NULL),
(31, 41, 3, 22, NULL),
(32, 41, 4, 22, NULL),
(33, 41, 5, 22, NULL),
(34, 41, 6, 22, NULL),
(35, 41, 7, 22, NULL),
(36, 41, 8, 22, NULL),
(37, 42, 1, 20, NULL),
(38, 42, 2, 20, NULL),
(39, 42, 3, 20, NULL),
(40, 42, 4, 20, NULL),
(41, 42, 5, 20, NULL),
(42, 42, 6, 20, NULL),
(43, 42, 7, 20, NULL),
(44, 43, 2, 13, NULL),
(45, 43, 3, 13, NULL),
(46, 43, 4, 13, NULL),
(47, 43, 5, 13, NULL),
(48, 43, 6, 13, NULL),
(49, 43, 7, 13, NULL),
(50, 43, 8, 13, NULL),
(51, 44, 1, 48, 64),
(52, 44, 2, 48, 65),
(53, 44, 3, 48, 66),
(54, 44, 4, 48, 67),
(55, 44, 5, 48, 68),
(56, 44, 6, 48, 69),
(57, 44, 7, 48, 70),
(59, 46, 10, 28, NULL),
(60, 46, 11, 28, NULL),
(61, 46, 12, 28, NULL),
(62, 46, 13, 28, NULL),
(63, 46, 14, 28, NULL),
(64, 46, 15, 28, NULL),
(65, 46, 16, 28, NULL),
(66, 46, 17, 28, NULL),
(67, 46, 18, 28, NULL),
(740, 46, 20, 28, NULL),
(70, 47, 10, 33, NULL),
(71, 47, 11, 33, NULL),
(72, 47, 12, 33, NULL),
(73, 47, 13, 33, NULL),
(74, 47, 14, 33, NULL),
(75, 47, 15, 33, NULL),
(76, 47, 16, 33, NULL),
(77, 47, 17, 33, NULL),
(78, 47, 18, 33, NULL),
(729, 47, 20, 33, NULL),
(81, 48, 21, 48, NULL),
(82, 48, 22, 48, NULL),
(83, 48, 23, 48, NULL),
(84, 48, 24, 48, NULL),
(85, 48, 25, 48, NULL),
(86, 48, 26, 48, NULL),
(87, 48, 27, 48, NULL),
(88, 48, 28, 48, NULL),
(89, 48, 29, 48, NULL),
(90, 48, 30, 48, NULL),
(91, 48, 31, 48, NULL),
(92, 48, 32, 48, NULL),
(93, 48, 33, 48, NULL),
(94, 48, 34, 48, NULL),
(95, 48, 35, 48, NULL),
(720, 48, 37, 48, NULL),
(97, 49, 1, 7, NULL),
(98, 49, 2, 7, NULL),
(99, 49, 3, 7, NULL),
(100, 49, 4, 7, NULL),
(101, 49, 5, 7, NULL),
(102, 49, 6, 7, NULL),
(103, 50, 1, 12, NULL),
(104, 50, 2, 12, NULL),
(105, 50, 3, 12, NULL),
(106, 50, 4, 12, NULL),
(107, 50, 5, 12, NULL),
(108, 50, 6, 12, NULL),
(109, 51, 1, 20, NULL),
(110, 51, 2, 20, NULL),
(111, 51, 3, 20, NULL),
(112, 51, 4, 20, NULL),
(113, 51, 5, 20, NULL),
(114, 51, 6, 20, NULL),
(115, 52, 1, 22, NULL),
(116, 52, 2, 22, NULL),
(117, 52, 3, 22, NULL),
(118, 52, 4, 22, NULL),
(119, 52, 5, 22, NULL),
(120, 52, 6, 22, NULL),
(121, 53, 2, 16, NULL),
(122, 53, 3, 16, NULL),
(123, 53, 4, 16, NULL),
(124, 53, 5, 16, NULL),
(125, 53, 6, 16, NULL),
(126, 53, 7, 16, NULL),
(127, 53, 8, 16, NULL),
(128, 54, 2, 75, NULL),
(129, 54, 3, 75, NULL),
(130, 54, 4, 75, NULL),
(131, 54, 5, 75, NULL),
(132, 54, 6, 75, NULL),
(133, 54, 7, 75, NULL),
(134, 55, 2, 24, NULL),
(135, 55, 3, 24, NULL),
(136, 55, 4, 24, NULL),
(137, 55, 5, 24, NULL),
(138, 55, 6, 24, NULL),
(139, 55, 7, 24, NULL),
(140, 56, 2, 5, NULL),
(141, 56, 3, 5, NULL),
(142, 56, 4, 5, NULL),
(143, 56, 5, 5, NULL),
(144, 56, 6, 5, NULL),
(145, 57, 2, 29, NULL),
(146, 57, 3, 29, NULL),
(147, 57, 4, 29, NULL),
(148, 57, 5, 29, NULL),
(149, 57, 6, 29, NULL),
(150, 57, 7, 29, NULL),
(151, 58, 2, 24, NULL),
(152, 58, 3, 24, NULL),
(153, 58, 4, 24, NULL),
(154, 58, 5, 24, NULL),
(155, 58, 6, 24, NULL),
(156, 59, 2, 54, NULL),
(157, 59, 3, 54, NULL),
(158, 59, 4, 54, NULL),
(159, 59, 5, 54, NULL),
(160, 59, 6, 54, NULL),
(161, 59, 7, 54, NULL),
(162, 59, 8, 54, NULL),
(163, 60, 2, 36, NULL),
(164, 60, 3, 36, NULL),
(165, 60, 4, 36, NULL),
(166, 60, 5, 36, NULL),
(167, 60, 6, 36, NULL),
(168, 61, 2, 60, NULL),
(169, 61, 3, 60, NULL),
(170, 61, 4, 60, NULL),
(171, 61, 5, 60, NULL),
(172, 61, 6, 60, NULL),
(173, 62, 2, 28, NULL),
(174, 62, 3, 28, NULL),
(175, 32, 4, 0, NULL),
(176, 62, 5, 28, NULL),
(177, 62, 6, 28, NULL),
(178, 62, 7, 28, NULL),
(179, 63, 2, 30, NULL),
(180, 63, 3, 30, NULL),
(181, 63, 4, 30, NULL),
(182, 63, 5, 30, NULL),
(183, 63, 6, 30, NULL),
(185, 64, 23, 28, NULL),
(186, 64, 24, 28, NULL),
(187, 64, 25, 28, NULL),
(188, 64, 26, 28, NULL),
(189, 64, 27, 28, NULL),
(190, 64, 28, 28, NULL),
(191, 64, 29, 28, NULL),
(192, 64, 30, 28, NULL),
(193, 64, 31, 28, NULL),
(194, 64, 32, 28, NULL),
(195, 64, 33, 28, NULL),
(196, 64, 34, 28, NULL),
(197, 64, 35, 28, NULL),
(739, 64, 39, 28, NULL),
(738, 64, 38, 28, NULL),
(737, 64, 37, 28, NULL),
(202, 65, 23, 30, NULL),
(203, 65, 24, 30, NULL),
(204, 65, 25, 30, NULL),
(205, 65, 26, 30, NULL),
(206, 65, 27, 30, NULL),
(207, 65, 28, 30, NULL),
(208, 65, 29, 30, NULL),
(209, 65, 30, 30, NULL),
(210, 65, 31, 30, NULL),
(211, 65, 32, 30, NULL),
(212, 65, 33, 30, NULL),
(213, 65, 34, 30, NULL),
(214, 65, 35, 30, NULL),
(734, 65, 39, 30, NULL),
(733, 65, 38, 30, NULL),
(732, 65, 37, 30, NULL),
(748, 66, 41, 18, NULL),
(747, 66, 40, 18, NULL),
(749, 66, 42, 18, NULL),
(752, 67, 42, 16, NULL),
(751, 67, 41, 16, NULL),
(750, 67, 40, 16, NULL),
(746, 68, 57, 18, NULL),
(735, 69, 57, 29, NULL),
(726, 70, 35, 45, NULL),
(725, 70, 33, 45, NULL),
(724, 70, 31, 45, NULL),
(723, 70, 29, 45, NULL),
(722, 70, 27, 45, NULL),
(781, 71, 57, 4, NULL),
(780, 72, 57, 5, NULL),
(775, 73, 57, 7, NULL),
(773, 74, 65, 10, NULL),
(772, 74, 63, 10, NULL),
(771, 74, 61, 10, NULL),
(770, 74, 59, 10, NULL),
(769, 75, 65, 10, NULL),
(768, 75, 63, 10, NULL),
(767, 75, 61, 10, NULL),
(766, 75, 59, 10, NULL),
(765, 76, 64, 11, NULL),
(764, 76, 62, 11, NULL),
(763, 76, 60, 11, NULL),
(762, 76, 58, 11, NULL),
(779, 77, 65, 6, NULL),
(778, 77, 63, 6, NULL),
(777, 77, 61, 6, NULL),
(776, 77, 59, 6, NULL),
(774, 78, 57, 7, NULL),
(251, 79, 50, 16, NULL),
(761, 79, 54, 16, NULL),
(760, 79, 53, 16, NULL),
(759, 79, 52, 16, NULL),
(758, 79, 51, 16, NULL),
(757, 80, 55, 16, NULL),
(756, 80, 54, 16, NULL),
(755, 80, 53, 16, NULL),
(754, 80, 52, 16, NULL),
(753, 80, 51, 16, NULL),
(261, 81, 2, 21, NULL),
(262, 81, 3, 21, NULL),
(265, 81, 6, 21, NULL),
(266, 81, 7, 21, NULL),
(744, 82, 57, 21, NULL),
(736, 83, 57, 29, NULL),
(742, 84, 57, 27, NULL),
(721, 85, 57, 48, NULL),
(730, 86, 57, 32, NULL),
(745, 87, 57, 20, NULL),
(728, 88, 57, 35, NULL),
(743, 89, 57, 26, NULL),
(727, 90, 57, 41, NULL),
(741, 91, 57, 27, NULL),
(731, 92, 57, 30, NULL),
(719, 93, 57, 63, NULL),
(784, 95, 32, 129, NULL),
(783, 95, 90, 129, NULL),
(281, 94, 21, 113, NULL),
(282, 94, 22, 113, NULL),
(283, 94, 23, 113, NULL),
(284, 94, 24, 113, NULL),
(285, 94, 25, 113, NULL),
(286, 94, 26, 113, NULL),
(287, 94, 27, 113, NULL),
(288, 94, 28, 113, NULL),
(289, 94, 29, 113, NULL),
(290, 94, 30, 113, NULL),
(291, 94, 31, 113, NULL),
(786, 94, 32, 113, NULL),
(785, 94, 90, 113, NULL),
(294, 95, 21, 129, NULL),
(295, 95, 22, 129, NULL),
(296, 95, 23, 129, NULL),
(297, 95, 24, 129, NULL),
(298, 95, 25, 129, NULL),
(299, 95, 26, 129, NULL),
(300, 95, 27, 129, NULL),
(301, 95, 28, 129, NULL),
(302, 95, 29, 129, NULL),
(303, 95, 30, 129, NULL),
(304, 95, 31, 129, NULL),
(305, 96, 48, 165, NULL),
(306, 96, 20, 165, NULL),
(307, 96, 21, 165, NULL),
(308, 96, 22, 165, NULL),
(309, 96, 23, 165, NULL),
(310, 96, 24, 165, NULL),
(311, 96, 25, 165, NULL),
(312, 96, 26, 165, NULL),
(313, 96, 27, 165, NULL),
(314, 96, 28, 165, NULL),
(315, 96, 29, 165, NULL),
(316, 96, 30, 165, NULL),
(317, 96, 31, 165, NULL),
(318, 1, 23, 0, NULL),
(319, 1, 28, 0, NULL),
(320, 1, 29, 0, NULL),
(321, 1, 33, 0, NULL),
(322, 1, 31, 0, NULL),
(323, 1, 32, 0, NULL),
(324, 1, 30, 0, NULL),
(325, 1, 27, 0, NULL),
(326, 1, 26, 0, NULL),
(327, 1, 24, 0, NULL),
(328, 1, 25, 0, NULL),
(329, 2, 31, 0, NULL),
(330, 2, 30, 0, NULL),
(331, 2, 28, 0, NULL),
(332, 2, 27, 0, NULL),
(333, 2, 26, 0, NULL),
(334, 2, 25, 0, NULL),
(335, 2, 24, 0, NULL),
(336, 2, 22, 0, NULL),
(337, 2, 32, 0, NULL),
(338, 2, 33, 0, NULL),
(339, 2, 29, 0, NULL),
(340, 2, 23, 0, NULL),
(341, 3, 33, 0, NULL),
(342, 3, 32, 0, NULL),
(343, 3, 31, 0, NULL),
(344, 3, 30, 0, NULL),
(345, 3, 34, 0, NULL),
(346, 3, 29, 0, NULL),
(347, 3, 27, 0, NULL),
(348, 3, 26, 0, NULL),
(349, 3, 25, 0, NULL),
(350, 3, 24, 0, NULL),
(351, 3, 23, 0, NULL),
(352, 3, 22, 0, NULL),
(353, 3, 28, 0, NULL),
(354, 3, 21, 0, NULL),
(355, 4, 25, 0, NULL),
(356, 4, 26, 0, NULL),
(357, 4, 28, 0, NULL),
(358, 4, 29, 0, NULL),
(359, 4, 34, 0, NULL),
(360, 4, 32, 0, NULL),
(361, 4, 30, 0, NULL),
(362, 4, 24, 0, NULL),
(363, 4, 23, 0, NULL),
(364, 4, 22, 0, NULL),
(365, 4, 31, 0, NULL),
(366, 4, 27, 0, NULL),
(367, 4, 21, 0, NULL),
(368, 4, 33, 0, NULL),
(625, 6, 70, 0, NULL),
(579, 6, 84, 0, NULL),
(578, 6, 83, 0, NULL),
(577, 6, 82, 0, NULL),
(624, 6, 69, 0, NULL),
(575, 6, 80, 0, NULL),
(377, 7, 2, 0, NULL),
(378, 7, 3, 0, NULL),
(379, 7, 4, 0, NULL),
(380, 7, 5, 0, NULL),
(381, 7, 6, 0, NULL),
(382, 7, 7, 0, NULL),
(641, 8, 57, 0, NULL),
(384, 9, 1, 0, NULL),
(385, 9, 2, 0, NULL),
(386, 9, 3, 0, NULL),
(387, 9, 4, 0, NULL),
(388, 9, 5, 0, NULL),
(389, 9, 6, 0, NULL),
(390, 9, 7, 0, NULL),
(391, 10, 49, 0, NULL),
(392, 11, 49, 0, NULL),
(393, 12, 49, 0, NULL),
(394, 13, 49, 0, NULL),
(647, 13, 50, 0, NULL),
(657, 15, 50, 0, NULL),
(397, 16, 49, 0, NULL),
(662, 17, 50, 0, NULL),
(693, 188, 52, 0, NULL),
(671, 18, 53, 0, NULL),
(670, 18, 52, 0, NULL),
(669, 18, 51, 0, NULL),
(668, 18, 54, 0, NULL),
(404, 19, 1, 0, 3),
(405, 19, 2, 0, 3),
(406, 19, 3, 0, 3),
(407, 19, 4, 0, 3),
(408, 19, 5, 0, 3),
(409, 19, 6, 0, 3),
(410, 19, 7, 0, 3),
(411, 19, 8, 0, 3),
(412, 20, 1, 0, NULL),
(413, 20, 2, 0, NULL),
(414, 20, 3, 0, NULL),
(415, 20, 4, 0, NULL),
(416, 20, 5, 0, NULL),
(417, 20, 6, 0, NULL),
(418, 20, 7, 0, NULL),
(419, 21, 1, 0, NULL),
(420, 21, 2, 0, NULL),
(421, 21, 3, 0, NULL),
(422, 21, 4, 0, NULL),
(423, 21, 5, 0, NULL),
(424, 21, 6, 0, NULL),
(425, 21, 7, 0, NULL),
(426, 21, 8, 0, NULL),
(427, 22, 50, 0, NULL),
(428, 22, 40, 0, NULL),
(429, 22, 41, 0, NULL),
(430, 22, 42, 0, NULL),
(431, 22, 43, 0, NULL),
(432, 22, 44, 0, NULL),
(433, 22, 66, 0, NULL),
(434, 23, 2, 0, NULL),
(435, 23, 3, 0, NULL),
(436, 23, 4, 0, NULL),
(437, 23, 5, 0, NULL),
(438, 23, 6, 0, NULL),
(439, 23, 7, 0, NULL),
(440, 23, 8, 0, NULL),
(441, 26, 2, 0, NULL),
(442, 26, 3, 0, NULL),
(443, 26, 4, 0, NULL),
(444, 26, 5, 0, NULL),
(445, 26, 6, 0, NULL),
(446, 26, 7, 0, NULL),
(447, 26, 8, 0, NULL),
(674, 27, 68, 0, NULL),
(449, 28, 49, 0, NULL),
(450, 29, 49, 0, NULL),
(451, 30, 49, 0, NULL),
(452, 31, 49, 0, NULL),
(453, 32, 2, 0, NULL),
(454, 32, 3, 0, NULL),
(456, 32, 5, 0, NULL),
(457, 32, 6, 0, NULL),
(458, 32, 7, 0, NULL),
(459, 33, 1, 0, NULL),
(460, 33, 2, 0, NULL),
(461, 33, 3, 0, NULL),
(462, 33, 4, 0, NULL),
(463, 33, 5, 0, NULL),
(464, 33, 6, 0, NULL),
(465, 33, 7, 0, NULL),
(466, 33, 8, 0, NULL),
(794, 33, 9, 0, NULL),
(468, 34, 49, 0, NULL),
(469, 35, 2, 0, NULL),
(470, 35, 3, 0, NULL),
(471, 35, 4, 0, NULL),
(472, 35, 5, 0, NULL),
(473, 35, 6, 0, NULL),
(474, 35, 7, 0, NULL),
(682, 36, 49, 0, NULL),
(681, 36, 48, 0, NULL),
(680, 36, 47, 0, NULL),
(679, 36, 46, 0, NULL),
(678, 36, 45, 0, NULL),
(677, 36, 44, 0, NULL),
(676, 36, 43, 0, NULL),
(686, 183, 34, 0, NULL),
(483, 182, 21, 0, NULL),
(484, 182, 22, 0, NULL),
(485, 182, 23, 0, NULL),
(486, 182, 24, 0, NULL),
(487, 182, 25, 0, NULL),
(488, 182, 26, 0, NULL),
(489, 182, 27, 0, NULL),
(490, 182, 28, 0, NULL),
(491, 182, 29, 0, NULL),
(492, 182, 30, 0, NULL),
(493, 182, 31, 0, NULL),
(494, 182, 32, 0, NULL),
(683, 182, 34, 0, NULL),
(685, 183, 33, 0, NULL),
(497, 183, 21, 0, NULL),
(498, 183, 22, 0, NULL),
(499, 183, 23, 0, NULL),
(500, 183, 24, 0, NULL),
(501, 183, 25, 0, NULL),
(502, 183, 26, 0, NULL),
(503, 183, 27, 0, NULL),
(504, 183, 28, 0, NULL),
(505, 183, 29, 0, NULL),
(684, 183, 32, 0, NULL),
(507, 183, 31, 0, NULL),
(692, 188, 51, 0, NULL),
(509, 184, 21, 0, NULL),
(510, 184, 22, 0, NULL),
(511, 184, 23, 0, NULL),
(512, 184, 24, 0, NULL),
(513, 184, 25, 0, NULL),
(514, 184, 26, 0, NULL),
(515, 184, 27, 0, NULL),
(516, 184, 28, 0, NULL),
(517, 184, 29, 0, NULL),
(518, 184, 30, 0, NULL),
(519, 184, 31, 0, NULL),
(687, 184, 33, 0, NULL),
(691, 188, 50, 0, NULL),
(522, 185, 23, 0, NULL),
(523, 185, 24, 0, NULL),
(524, 185, 25, 0, NULL),
(525, 185, 26, 0, NULL),
(526, 185, 27, 0, NULL),
(527, 185, 28, 0, NULL),
(528, 185, 29, 0, NULL),
(529, 185, 30, 0, NULL),
(530, 185, 31, 0, NULL),
(688, 185, 33, 0, NULL),
(690, 186, 57, 0, NULL),
(689, 187, 57, 0, NULL),
(534, 188, 49, 0, NULL),
(535, 189, 50, 0, NULL),
(699, 189, 54, 0, NULL),
(698, 189, 53, 0, NULL),
(697, 189, 52, 0, NULL),
(696, 189, 51, 0, NULL),
(540, 190, 50, 0, NULL),
(704, 190, 55, 0, NULL),
(703, 190, 54, 0, NULL),
(702, 190, 53, 0, NULL),
(701, 190, 52, 0, NULL),
(700, 190, 51, 0, NULL),
(546, 191, 50, 0, NULL),
(707, 191, 53, 0, NULL),
(706, 191, 52, 0, NULL),
(705, 191, 51, 0, NULL),
(708, 192, 66, 0, NULL),
(711, 193, 57, 0, NULL),
(713, 194, 57, 0, NULL),
(712, 195, 57, 0, NULL),
(715, 196, 57, 0, NULL),
(714, 197, 57, 0, NULL),
(718, 198, 57, 0, NULL),
(557, 199, 2, 0, NULL),
(558, 199, 3, 0, NULL),
(559, 199, 4, 0, NULL),
(560, 199, 5, 0, NULL),
(561, 199, 6, 0, NULL),
(562, 199, 7, 0, NULL),
(717, 200, 57, 0, NULL),
(673, 27, 67, 0, NULL),
(672, 27, 66, 0, NULL),
(799, 185, 32, 0, NULL),
(798, 184, 34, 0, NULL),
(797, 184, 32, 0, NULL),
(796, 183, 30, 0, NULL),
(795, 182, 33, 0, NULL),
(586, 6, 91, 0, NULL),
(587, 6, 92, 0, NULL),
(588, 6, 93, 0, NULL),
(589, 6, 94, 0, NULL),
(590, 6, 95, 0, NULL),
(591, 6, 96, 0, NULL),
(592, 6, 97, 0, NULL),
(593, 6, 98, 0, NULL),
(594, 207, 1, 0, NULL),
(595, 207, 2, 0, NULL),
(596, 207, 3, 0, NULL),
(597, 207, 4, 0, NULL),
(598, 207, 5, 0, NULL),
(599, 207, 6, 0, NULL),
(600, 207, 7, 0, NULL),
(601, 208, 49, 0, NULL),
(602, 209, 1, 0, NULL),
(603, 209, 2, 0, NULL),
(604, 209, 3, 0, NULL),
(605, 209, 4, 0, NULL),
(606, 209, 5, 0, NULL),
(607, 209, 6, 0, NULL),
(608, 209, 7, 0, NULL),
(609, 209, 8, 0, NULL),
(675, 209, 9, 0, NULL),
(716, 214, 57, 0, NULL),
(626, 6, 71, 0, NULL),
(627, 6, 72, 0, NULL),
(628, 6, 73, 0, NULL),
(629, 6, 74, 0, NULL),
(630, 6, 75, 0, NULL),
(631, 6, 76, 0, NULL),
(632, 6, 77, 0, NULL),
(633, 6, 78, 0, NULL),
(634, 6, 79, 0, NULL),
(635, 6, 81, 0, NULL),
(636, 6, 85, 0, NULL),
(637, 6, 86, 0, NULL),
(638, 6, 87, 0, NULL),
(639, 6, 88, 0, NULL),
(640, 6, 89, 0, NULL),
(642, 14, 50, 0, NULL),
(643, 14, 51, 0, NULL),
(644, 14, 52, 0, NULL),
(645, 14, 53, 0, NULL),
(646, 14, 54, 0, NULL),
(648, 13, 51, 0, NULL),
(649, 13, 52, 0, NULL),
(650, 13, 53, 0, NULL),
(651, 13, 54, 0, NULL),
(652, 16, 50, 0, NULL),
(653, 16, 51, 0, NULL),
(654, 16, 52, 0, NULL),
(655, 16, 53, 0, NULL),
(656, 16, 54, 0, NULL),
(658, 15, 51, 0, NULL),
(659, 15, 52, 0, NULL),
(660, 15, 53, 0, NULL),
(661, 15, 54, 0, NULL),
(663, 17, 51, 0, NULL),
(664, 17, 52, 0, NULL),
(665, 17, 53, 0, NULL),
(666, 17, 54, 0, NULL),
(667, 17, 55, 0, NULL),
(694, 188, 53, 0, NULL),
(695, 188, 54, 0, NULL),
(709, 192, 68, 0, NULL),
(710, 192, 67, 0, NULL),
(787, 48, 36, 48, NULL),
(788, 47, 19, 33, NULL),
(789, 65, 36, 30, NULL),
(790, 64, 36, 28, NULL),
(791, 46, 19, 28, NULL),
(792, 81, 4, 21, NULL),
(793, 81, 5, 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employeur`
--

DROP TABLE IF EXISTS `employeur`;
CREATE TABLE IF NOT EXISTS `employeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `roleEmployeur` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeur`
--

INSERT INTO `employeur` (`id`, `prenom`, `nom`, `roleEmployeur`) VALUES
(1, 'aucun', NULL, 'onf'),
(2, 'aucun', NULL, 'syndicat'),
(3, 'pierre', 'lapince', 'onf'),
(4, 'lisa', 'bibine', 'syndicat'),
(5, 'Christophe ', 'Christopher ', 'onf'),
(6, 'Benito', 'Mussolini', 'syndicat');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeFournissuer` varchar(50) DEFAULT NULL,
  `numSAP` varchar(50) DEFAULT NULL,
  `numMarche` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `siren` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `codePostal` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `codeFournissuer`, `numSAP`, `numMarche`, `nom`, `siren`, `numero`, `rue`, `codePostal`, `ville`, `tel`, `slug`) VALUES
(1, '2326', '4600011298', '2021-86000-009', 'Sté EBM Distribution', '000000000000', '3', 'Rue Des Vergers', '67120', 'Dorlsiheim', '06.85.53.97.03', '00000000000000'),
(2, '142697', '4600011299', '2021-86000-009', 'Sté SDM PRO', '0000000000', '49', 'ZA Aubigny', '50300', 'Ponts', '06.36.25.14.15', '000000000000000000'),
(3, '2525', '45845698542', '1458745852', 'Zimmer ', '02122222', '4', 'Rue des Mimosa ', '75000', 'Paris', '07.59.15.48.26', '548756321'),
(4, '458745665', '12546214522', '141414145', 'Rostaing', '000000000', '7', 'Rue des limousines', '69000', 'Befort', '07.23.12.45.56', '45854621542'),
(5, NULL, NULL, NULL, 'Lyreco', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, 'fiprotec', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, 'NK Diffusion', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, 'France équipement sécurité', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, 'E.P.I SUD', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, '', NULL, 'VETEMENTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lieulivraion`
--

DROP TABLE IF EXISTS `lieulivraion`;
CREATE TABLE IF NOT EXISTS `lieulivraion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `codePostal` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `Siege` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lieulivraion`
--

INSERT INTO `lieulivraion` (`id`, `nom`, `codePostal`, `ville`, `telephone`, `mail`, `Siege`) VALUES
(1, 'Site colmar', '68000', 'Colmar', '0604050204', 'mail@gmail.gmail', 'Colmar'),
(2, 'Site Mulhouse', '68420', 'Mulhouse', '0604050208', 'mulhouse@mulhouse.mulhouse', 'Mulhouse');

-- --------------------------------------------------------

--
-- Table structure for table `lignecommandeepi`
--

DROP TABLE IF EXISTS `lignecommandeepi`;
CREATE TABLE IF NOT EXISTS `lignecommandeepi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT '1',
  `idCommandeEPI` int(11) NOT NULL,
  `idTaille` int(11) NOT NULL,
  PRIMARY KEY (`Id`,`idProduit`),
  KEY `idCommandeEPI` (`idCommandeEPI`),
  KEY `idProduit` (`idProduit`),
  KEY `idTaille` (`idTaille`)
) ENGINE=MyISAM AUTO_INCREMENT=310 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lignecommandevet`
--

DROP TABLE IF EXISTS `lignecommandevet`;
CREATE TABLE IF NOT EXISTS `lignecommandevet` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idCommandeVet` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` varchar(50) DEFAULT NULL,
  `idTaille` int(11) NOT NULL,
  PRIMARY KEY (`Id`,`idCommandeVet`),
  KEY `idProduit` (`idProduit`),
  KEY `idCommandeVet` (`idCommandeVet`),
  KEY `idTaille` (`idTaille`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=1434 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `metier`
--

DROP TABLE IF EXISTS `metier`;
CREATE TABLE IF NOT EXISTS `metier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metier`
--

INSERT INTO `metier` (`id`, `statut`) VALUES
(1, 'Bucheron'),
(2, 'Sylviculteur'),
(3, 'Conducteur d\'engins'),
(4, 'Logisticien'),
(5, 'Conducteur de travaux'),
(6, 'Technicien forestier territorial'),
(7, 'Responsable d’unité de production'),
(8, 'Responsable d’unité territoriale'),
(9, 'Débardeur');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `point`, `idUtilisateur`) VALUES
(1, 150, 1),
(2, 150, 2),
(14, 150, 20),
(15, 150, 21),
(16, 150, 22),
(17, 150, 23),
(18, 150, 24),
(19, 150, 25),
(20, 150, 27),
(21, 150, 29),
(22, 150, 30),
(24, 150, 37),
(28, 150, 41),
(74, 150, 89),
(76, 150, 91),
(77, 150, 92);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referenceFournisseur` varchar(50) DEFAULT NULL,
  `fichierPhoto` varchar(50) DEFAULT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(700) DEFAULT NULL,
  `idFournisseur` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `Visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idFournisseur` (`idFournisseur`),
  KEY `idType` (`idType`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `referenceFournisseur`, `fichierPhoto`, `nom`, `type`, `description`, `idFournisseur`, `idType`, `Visible`) VALUES
(1, 'EBM Distribution', 'extremeOne.png', 'Extrême One 944 / Chaussure anti-coupure pleine', 'EPI', 'Idéal pour travailler avec une tronçonneuse sur terrain plat', 1, 1, 1),
(2, 'EBM Distribution', 'Santiago.png', 'Santiago / Botte anti-coupure', 'EPI', 'Idéal pour travailler avec une tronçonneuse en milieu très humide.', 1, 1, 1),
(3, 'SDM Pro', 'Trekker.png', 'HAIX Trekker Mountain 2.0 / Chaussure anti-coupure montagne', 'EPI', 'Doublure intérieur tissus GORE-TEX\r\nSemelle crantée avec profil tout terrain, anti-\r\nperforation et résistante à l’abrasion.', 2, 1, 1),
(4, 'EBM Distribution ', 'Stelvio.png', 'Stelvio / Chaussure chauffeur d\'engin', 'EPI', 'Chaussure légère à embout renforcé et\nsemelle anti-perforation « Vibram »\nIdéal pour chauffeurs d’engin ou travail en\natelier.', 1, 1, 1),
(6, 'Zimmer', '1SPV.png', 'SIP 1SPV / Pantalon anti- coupure ', 'EPI', 'Pantalon anti-coupure de classe 1\r\nDeux poches enfilées, une poche mètres, une\r\npoche arrière et une poche plaquée sur la\r\ncuisse.', 3, 2, 1),
(7, 'Zimmer', '1RB8.png', 'SIP 1RB8 / Pantalon de débroussaillage', 'EPI', 'Pas de protection anti-coupure\nPantalon avec renfort avant.\nProtège des projections dans les tibias lors\ndes opérations de débroussaillage.', 3, 2, 1),
(8, 'Zimmer ', '1XT2.png', 'SIP 1XT2 / Jambière anti-coupure', 'EPI', 'Protection anti-coupure de classe 1', 3, 2, 1),
(13, 'ROSTAING', 'EPS7PBA.png', 'Gant cuir manutention ', 'EPI', 'Gants de manutention en cuir avec protège\r\nartère en cuir.', 4, 6, 1),
(14, 'ROSTAING', 'HMPS7BP.png', 'Gant cuir élastique', 'EPI', 'Gants de manutention en cuir avec dos\r\nélastique plus respirant avec protège artère\r\nen cuir.', 4, 7, 1),
(15, 'ROSTAING', 'Winterpro.png', 'Winterpro / Gant hiver', 'EPI', 'Bon grip grâce aux picots nitrile.\r\nDoublure intérieure permettant une\r\nrésistance au froid jusqu’à -10°C.', 4, 8, 1),
(16, 'ROSTAING', 'Blackstick.png', 'Blackstick+ / Gant de débardage', 'EPI', 'Protection anti-coupure optimale et\r\nexcellente résistance à la perforation', 4, 5, 1),
(17, 'Lyreco', 'GT015.png', 'Francital GT015 / Gant de bucheronnage', 'EPI', 'Gants adaptés pour l’utilisation de la\r\ntronçonneuse.\r\nFermeture par scratch au poignet.\r\nCoussinet anti-vibration.', 5, 5, 1),
(18, 'ROSTAING', 'DENIM.png', 'DENIM / Gant de protection mécanique', 'EPI', 'Gants étanche avec enduction pour\r\nprotection mécanique, idéal pour travaux de\r\nmaintenance en milieu huileux\r\nRésistance à la coupure.', 4, 9, 1),
(27, 'France Equipement Sécurité', '60510.png', 'Lunette de sécurité 60510', 'EPI', 'Ajustement de la longueur et inclinaison des\r\nbranches.\r\nExiste en version teintée jaune (pour temps\r\nsombre) et teintée solaire (pour temps\r\nensoleillé).', 8, 11, 1),
(33, 'E.P.I SUD ', 'T-shirtOnf.png', 'T-shirt ONF rouge ', 'EPI', 'Grammage : 185 g/m²\r\nExiste en version col en V\r\nAvec marquage ONF', 9, 20, 1),
(36, 'Fiprotec', 'CEPOVETT.png', 'CEPOVETT 9J86 / Combinaison de travail', 'EPI', 'Fermeture à double glissière.\r\nCouleur : orange\r\nUniquement pour conducteurs d’engins et\r\nlogisticiens.', 6, 2, 1),
(37, 'ONF', 'Inve.png', 'Veste Solidur Inve N°1', 'VET', 'Veste de travail extensible hydrophobe avec manches amovibles.\nPolyester ripstop hydrophobe, tissu épaules Armortex, tissu bras polyamide enduit. 3 poches extérieures dont 2 poches repose mains et 1\n\npoche téléphone. Liseré réfléchissant sur épaules avant arrière, bande\nréfléchissante hachurée sur les bras. 1 poche dos double ouverture.\nRéglage poignets par ruban autoagrippant et patte caoutchouc.\nRouge/jaune\nTailles XS à 4XL', 10, 17, 1),
(38, 'ONF', 'Kouvola.png', 'Veste Softshell Francital Kouvola N°2 ', 'VET', 'Veste idéale en demi-saison froide et lors des averses grâce à sa mem-\nbrane. 5 poches : 2 poches basses, 2 poches poitrine, 1 poche inté-\nrieure. Grand col montant, patte de resserrage poignet, fermeture à\nglissière simple curseur séparable inversée, système de ventilation\nsous les bras\nTissu trilaminé avec tissu extérieur extensible, traité déperlant + membrane imper-respirante + micropolaire. Coupe-vent & confort thermique.\n46% polyester 37% polyamide 15 % polyuréthane 2 % élasthanne\nRouge/Jaune\nTaille XS-3XL', 10, 17, 1),
(39, 'ONF', 'Woda.png', 'Veste Softshell à manches amovibles Solidur Woda N°3 ', 'VET', 'Veste Softshell 3 couches garantissant résistance à l’eau, au\nvent et respirabilité. Tissu extérieur : 95% polyester, 5% Span-\ndex. Membrane : TPU 35 g/m2. Tissu intérieur : polaire 100%\npolyester. Tissu bi-extensible. Manches amovibles. Micro polaire grattée. Col ergonomique. Fermeture à glissière sous\nrabat. 2 poches poitrines. 2 poches basses. 2 poches intérieures avec étiquette rhésus. Double poche dos. Plan dorsal rallongé. Aération dorsale\nRouge/jaune\nTaille S au 4XL', 10, 17, 1),
(40, 'ONF', 'Ecrin.png', 'Gilet sans manches softshell FRANCITAL Ecrin N°4', 'VET', 'Tissu trilaminé avec tissu extérieur extensible, traité déperlant + membrane imperrespirante + micropolaire. Coupe-vent & confort thermique.\n46% polyester 37% polyamide 15 % polyuréthane 2 % élasthanne. Partie haute : jersey 88% polyester 12% polyuréthane. 4 poches zipées : 2\npoches basses, 2 poches poitrine. Grand col montant avec système de\nréglage et polaire intérieure. Dos rallongé pour protéger les reins. Fermeture à glissière inversée simple curseur.\nRouge/jaune\nTaille XS à 3XL', 38, 17, 1),
(41, 'ONF', 'TeeShirtLongues.png', 'Tee shirt technique manches longues Solidur N°5 ', 'VET', 'Composition 50% Coolmax 50% Coolpass\nPetit col montant avec fermeture zip. Poche poitrine avec Zip\nBas de manche élastiqué. Passe pouce. Fournit une protection\nUVA + UVB contre le soleil.\nJaune\nTaille du S au 4XL', 10, 17, 1),
(42, 'ONF', 'TeeShirtCourtes.png', 'Tee shirt technique manches courtesSolidur N°6 ', 'VET', 'Composition 50% coolmax 50% coolpass. Petit col montant avec ferme-\nture zip, Poche poitrine avec Zip. Fournit une protection UVA + UVB\ncontre le soleil. Permet une meilleure évacuation de la transpiration\nJaune\nTaille XS à 3XL', 10, 17, 1),
(43, 'ONF', 'VestePolaire.png', 'Veste polaire N°7 ', 'VET', '100% polyester micropolaire anti-boulochage. 300 g/m2\n2 poches zippées sur le côté.\nFermeture zippée.\nColoris : Orange\nTailles : S à 4 XL', 10, 17, 1),
(44, 'ONF', 'Cuissard.png', 'FRANCITAL N°8', 'VET', 'Tissu extérieur : Toile construction RipStop de 330g/m2 - 70%PES 30% PA HT\nCordura® avec enduction 100% PU - Performances mécaniques élevées notamment dans les ronces. Ouverture sur le devant – passe main – ouverture sur\nle dos de chaque jambe par un zip – taille unique ouverture.\nCeinture élastique noire avec bouclerie plastique - Bretelles réglables avec bouclerie plastique et amovibles\nEntrejambe 64/70 cm / Taille XS à 3XL\nColoris : vert', 10, 17, 1),
(45, 'ONF', 'CeintureOutil.png', 'Ceinture porte outil OREGON N°9 ', 'VET', 'Ceinture en polyester offrant une résistance élevée à l\'abrasion. Harnais amovible réglable devant et derrière. Fourni\navec 4 pochettes (peinture, étui pour clé/coin/pince de levage, lime/lime plate/clé/kit de premiers soins, crochet/coin/\nruban de bûcheron.', 10, 17, 1),
(46, 'ONF', 'GiletSansManches.png', 'Gilet sans manches softshell femme N°10 ', 'VET', '270 g/m2 - extérieure : 96% polyester, 4% élasthanne -\r\nintérieur : 100% polyester (fleece) - léger et souple - - finition water repellent - résiste au vent et sèche rapidement\r\nColoris: Rouge\r\nTailles : T36 à T46', 10, 17, 1),
(47, 'ONF', 'VesteFemme11.png', 'Veste Softshell femme N°11 ', 'VET', '100% Polyester - Membrane 3 couches. Dos chaud en Softshell\r\ntissé, waterproof et respirant. Finition déperlante durable\r\nFermeture à glissière complète avec protection intérieure\r\n2 poches avec fermeture à glissière et 1 poche poitrine.\r\nOurlet ajustable.\r\nLégèrement cintré.\r\nColoris : Gris\r\nTaille : T36 à T46', 10, 17, 1),
(48, 'ONF', 'PantalonFemme12.png', 'Pantalon femme N°12 ', 'VET', 'Ceinture élastiquée côtés - bouton clou métallique - 5 larges\r\npassants - et braguette zippée - 2 poches italiennes - à droite\r\nau porté 1 poche cuisse à soufflet central et rabat brodé fermé\r\npar bande autoagrippante - 2 poches genouillères si besoin\r\nd’insert protection genoux\r\nréhausse dos et 1 poche plaquée coté droit au porté.\r\nPoints d’arrêts contrastants\r\n99% coton 1% élasthanne - 407 g/m2\r\nColoris : jean\r\nTailles : 36 à 52', 10, 17, 1),
(49, 'ONF', 'TeeShirtFemme.png', 'Tee-shirt femme N°13', 'VET', 'Coupe ajustée, 100% coton, 145 g/m2\nCol rond à bord côte avec élasthanne. Bande de propreté au\ncou. Coutures latérales\nColoris : Rouge\nTailles : XS à 2XL', 10, 17, 1),
(50, 'ONF', 'PoloFemmeCourtes.png', 'Polo femme manches courtes N°14', 'VET', 'Coupe ajustée, 100% coton peigné piqué, 180 g/m2\nBord côte au col et au bord des manches, bande de propreté à l’arrière du\ncol\nPatte de boutonnage avec boutons ton sur ton\nCoutures latérales - surpiqûres à l’ourlet inférieur\nColoris : Rouge\nTailles : XS à 2XL', 10, 17, 1),
(51, 'ONF', 'ChemiseFemmeCourtes.png', 'Chemise femme manches courtes N°15', 'VET', '100% coton peigné, 130 g/m2\nCol féminin - manches à ourlet\nPinces au niveau de la poitrine, sur le devant et le dos pour une coupe\najustée et contemporaine\nBoutons nacrés assortis cousus en croix\nDernière boutonnière horizontale\nColoris : Noir\nTailles : XS à 2XL', 10, 17, 1),
(52, 'ONF', 'ChemiseFemmeLongues.png', 'Chemise femme manches longues N°16', 'VET', '130 g/m2 - 100% coton peigné - col féminin - pinces au niveau de\nla poitrine, sur le devant et sur l arrière pour une coupe ajustée et\ncontemporaine. Boutons nacrés assortis cousus en croix.\nDernière boutonnière horizontale. Poignets en biais 2 boutons\najustables avec boutonnières complémentaires pour mettre des\nboutons de manchette.\nPattes de manche carrées à bouton simple.\nColoris : Noir\nTailles : XS à 2XL', 10, 17, 1),
(53, 'ONF', 'Sweat.png', 'Sweat shirt rouge N°17', 'VET', '80% coton / 20% polyester – 300gr m2\nMolleton gratté 3 fils en coton peigné. Bande de propreté\ncontrastée à l\'encolure. Finition bord-côte poignets et de bas\nde vêtement. Extérieur 100% coton : excellente surface d\'impression. Confection 3 fils : résistance et stabilité au lavage.\nDouceur et confort garantis.\nColoris : Rouge\nTailles : S à 4XL', 10, 17, 1),
(54, 'ONF', 'PullCamionneur.png', 'Pull camionneur rouge N°18 ', 'VET', '50% Laine peignée, 50% Acrylique, Maille perlée cheva-lée Jauge 8, Bord côte 1/1 double,\nRenforts coudes et épaules, Poche centrale zippée passepoilée sur la poitrine\nColoris : Rouge\nTailles : S à 3XL', 10, 17, 1),
(55, 'ONF', 'TeeShirtThermique.png', 'Tee-shirt thermique manches longues N°19 ', 'VET', 'Col montant zippé, interlock 100% polyester céramique 140gr/m2 -\nbarrière infrarouges- Elasticité mécanique durable - évacuation de\nl’humidité – barrière UV total (UPF 70)- coupe près du corps, + 8\ncm dans le dos pour couvrir les reins\nEffet seconde peau\nFacile à laver, sèche de suite, pas de repassage.\nColoris : Rouge\nTailles : S à 3 XL', 10, 17, 1),
(56, 'ONF', 'Debardeur.png', 'Débardeur unisexe N°20', 'VET', 'Structure tubulaire — 100% coton —165 g/m2\nSurpiqûre à la base\nColoris : Rouge\nTailles : S à 2XL', 10, 17, 1),
(57, 'ONF', 'GiletStarTravel.png', 'Gilet Startravel sans manche N°21 ', 'VET', 'Extérieur : 100 % polyester avec enduction PVC.\nOuatinage: 180 g/m2, 100% polyester\nDoublure : 100% polyester.\nrésiste au vent et water repellent - col droit, corps\n\nmatelassé - emmanchures larges avec rabat élasti-\nqué - fermeture à glissière protégée par rabat tem-\npête et boutons-pression - diverses poches\n\npanneau dos long\nColoris : rouge\nTailles : S à 3XL', 10, 17, 1),
(58, 'ONF', 'PullCamionneur22.png', 'Pull camionneur N°22 ', 'VET', 'Coudières coloris contrastant • côtes anglaises chevalées sur\nl’arrière (résistantes à la déformation)\nComposition : 70% acrylique 30% laine peignée\nColoris : gris\nTailles : T2=S à T6=XXL', 10, 17, 1),
(59, 'ONF', 'VesteMancheAmovible.png', 'Veste Softshell à manches amovibles N°23 ', 'VET', 'Softshell 340gr. Extérieur: 94% polyester - 6% élasthanne\nFace intérieure: micro-polaire\nMembrane TPU - Membrane 8000 mm imperméable et respirant.\nFermeture zippée. 3 poches zippées\nManches et capuche à visière amovibles\nCordons de resserrage à la capuche et au bas du vêtement\nColoris : gris\nTailles : S à 4 XL', 10, 17, 1),
(60, 'ONF', 'VesteDemiSaison.png', 'Veste Softshell demi-saison N°24 ', 'VET', '345 g/m2 - Tissu contrecollé 3 couches.\nCouche extérieure : 93% polyester / 7% élasthanne. Couche\nintermédiaire : membrane TPU respirante 1000 g/m2/24h et\nimperméable 8000 mm.\nCouche intérieure : micro polaire. 2 spacieuses poches avant,\n1 poche de poitrine et 1 poche de manche gauche. Pièces en Cordura durable aux épaules et aux coudes. Bas ajustable -\nPassepoil décoratif au niveau des épaules, à l\'avant et à l\'arrière, incorporant les matériaux réfléchissants 3M Scotchlite.\nCordon de serrage ajustable à la taille. Rabat-tempête intérieur. Imperméable et respirant\nColoris : noir\nTailles : S à 2XL', 10, 17, 1),
(61, 'ONF', 'BlousonPolaire.png', 'Blouson polaire N°25 ', 'VET', '2 poches latérales zippées - 2 poches de manches zippées. Surfaces\nVelcro sur le haut du bras, sur la poitrine et au niveau de la nuque.\nInserts Ripstop au niveau des manches, des épaules et du dos afin\nd\'améliorer le confort. Fermetures éclair d\'aération sous les bras et aux\nparties en filet à l\'intérieur. Velcro poignets + cordon élastique.\nMatériel. 100% polyester / inserts: 65% polyester, 35% coton – qualité\n600gr/m2\nColoris : Olive\nTailles : S à 2XL', 10, 17, 1),
(62, 'ONF', 'PantalonTreillis26.png', 'Pantalon treillis bas élastique N°26', 'VET', 'Pantalon stretch multi-poches 98% coton - 2% élasthanne -300gr/m2\nTissu pré-rétréci - Taille élastiquée sur les hanches - Deux poches avant - Deux poches\nlatérales avec doublure intérieure et bouton - Deux poches arrière avec bouton -\nCoutures avant et genoux pour plus de confort - Bas de jambe avec tissu stretch et\ncoutures h cm 5 - Coupe de jambe slim\nColoris : Olive\nTailles : S à 3XL', 10, 17, 1),
(63, 'ONF', 'PantalonTreillis27.png', 'Pantalon treillis N°27 ', 'VET', 'Pantalon treillis US classique en coton ripstop munie de renforts au niveau des\ngenoux et fessier. Braguette boutonnée sous rabat, cordon de serrage au bas\ndes jambes - 2 poches latérales - 2 poches cargo sur les jambes - 2 poches\narrière avec rabat boutonné - 100% coton (tissu ripstop, poids : 220 g/m2)\nTaille : S à XXL / Coloris : olive', 10, 17, 1),
(64, 'ONF', 'PantalonNoir.png', 'Pantalon noir N°28', 'VET', 'Composition : 60% coton 38% polyester 2% élasthanne - 250 g/m2\r\nCeinture élastiquée côtés • braguette zip spirale\r\n2 grandes poches main - 1 poche ticket avec auto-agrippant\r\nCuisse droite : poche à rabat + emplacements outils\r\nCuisse gauche : 1 grande poche avec auto-agrippant + 1 grande poche à rabat\r\n+ 1 poche téléphone + emplacements outils\r\nDos : 2 grandes poches à soufflet, dont 1 avec rabat\r\n1 poche mètre - 1 porte marteau\r\nColoris : noir\r\nTailles : 38 à 54', 10, 17, 1),
(65, 'ONF', 'PantalonJean.png', 'Pantalon jean N°29', 'VET', '99% coton denim / 1% élasthanne. 11,50 oz. Fermeture zippée avec un bouton\r\n\r\nmétal. 2 poches devant et une poche ticket. 2 poches plaquées arrière. Cou-\r\ntures contrastées. Ceinture avec passants. Coupe moderne confortable. Ce pro-\r\nduit a subi un traitement spécial et présente un aspect volontairement vieilli. Ce\r\n\r\nprocédé de fabrication implique des variations de couleurs d\'un produit à l\'autre\r\net rend chaque pièce unique.\r\nTaille : 38 à 54 / Coloris : bleu foncé', 10, 17, 1),
(66, 'ONF', 'SousVetementChaudHaut.png', 'Sous vêtement chaud — haut  du corps N°30 ', 'VET', 'Composition 54% Polyamide, 40% Polypropylène, 6% Elasthanne\r\nLa 1ère couche au contact de la peau (polypropylène) évacue l’humidité\r\n\r\nvers la prochaine couche de tissu - 100% antibactérien grâce à la pro-\r\npriété naturelle de la fibre et un traitement aux ions d’argent.\r\n\r\nLa 2nde couche (polyamide) disperse l’humidité à sa surface.\r\n30 zones spéciales pour optimiser la mobilité, contrôler la compression\r\nmusculaire, et soutenir la circulation sanguine.\r\nLe vêtement conserve ses formes même après de longues périodes\r\nd’utilisation.\r\nColoris noir\r\n3 doubles Tailles : XS/S, M/L, XL/XXL\r\nPAS D’ECHANGE POSSIBLE', 10, 17, 1),
(67, 'ONF', 'SousVetementChaudBas.png', 'Sous vêtement chaud — Bas du corps N°31 ', 'VET', 'Caractéristique idem ci-dessus\r\nColoris noir\r\n3 doubles Tailles : XS/S, M/L, XL/XXL\r\nPAS D’ECHANGE POSSIBLE', 10, 17, 1),
(68, 'ONF', 'Ceinture32.png', 'Ceinture N°32', 'VET', '100% polyester. Boucle métallique ton sur ton.\r\nColoris Noir\r\nTaille unique réglable', 10, 17, 1),
(69, 'ONF', 'Ceinture33.png', 'Ceinture cuir N°33', 'VET', '100% cuir. Largeur : 35mm. Longueur totale de la ceinture : 125cm. Livrée\r\ndans sa pochette en coton.\r\nColoris cognac\r\nTaille unique adaptable', 10, 17, 1),
(70, 'ONF', 'Ceinture34.png', 'Ceinture cuir épaisse N°34 ', 'VET', 'Ceinture en cuir pleine fleur double épaisseur et surpiqûre de renfort. Logo\r\nCarhartt® en relief à l\'arrière, au milieu. Boucle à double ardillon avec finition nickel vieilli. Largeur 4,4 cm.\r\nColoris brun\r\nTaille : 34 (42 FR) - 36 (44 FR) - 38 (46 FR) - 40 (48 FR) - 42 (50 FR)', 10, 17, 1),
(71, 'ONF', 'TourCou.png', 'Tour de cou multi-fonction N°35', 'VET', '100 polyester microfibres, sans\r\ncouture, respirant\r\nColoris Gris (Graphite Grey)\r\nTaille unique', 10, 17, 1),
(72, 'ONF', 'Casquette.png', 'Casquette N°36', 'VET', '260 g/m2 - 98% coton, 2% élasthanne. Panneau avant rigide, visière cour-\r\nbée en PU recyclé - œillets cousus - bande anti-transpiration élastiquée\r\nColoris : noir\r\nTaille : unique => L/XL', 10, 17, 1),
(73, 'ONF', 'BonnetPolaire.png', 'Bonnet polaire N°37', 'VET', '100% polyacrylique (toucher doux)- doublure\r\nThinsulateTM - maille doublée\r\nTaille unique\r\nColoris : rouge', 10, 17, 1),
(74, 'ONF', 'ChaussettesClimatChaud.png', 'Chaussettes climat chaud N°38 ', 'VET', 'Fibre ThermoCool® cumulant les fonctions d’isolation thermique et d’évacuation de la transpiration. Maintien de la cheville et sur le cou de pied sans\r\ncomprimer. Intérieur pied et semelle bouclette. Bord côte double\r\nComposition : 60% polyester ThermoCool®, 40% polyamide\r\nColoris : noir\r\nTaille : 35/38 S – 39/42 M – 43/46 L – 47/50 XL', 10, 17, 1),
(75, 'ONF', 'ChaussettesToutTemps.png', 'Chaussettes tout temps N°39 ', 'VET', 'Fibres de section différentes facilitant l’évacuation de l’humidité et d’améliorant la\r\nthermorégulation. Isole aussi bien du froid que du chaud. Maille variable pour un\r\nmeilleur maintien sans comprimer - - Intérieur pied et semelle bouclette.\r\nComposition : 54% polyester ThermoCool, 34 % acrylique, 12 % polyamide\r\nColoris : noir\r\nTaille : 35/38 S - 39/42 M - 43/46 L - 47/50 XL', 10, 17, 1),
(76, 'ONF', 'ChaussettesRandonnee.png', 'Chaussettes de randonnée N°40 ', 'VET', 'Fibre Coolmax® assurant un excellent transfert de l’humidité (pieds au sec).\r\n\r\nDouble bord côte anti-comprimant. Semelle fine bouclette respirante anato-\r\nmique dissymétrique pied/pied gauche. Maille variable sur le cou de pied pour\r\n\r\nun parfait maintien. Couture de pointe extra-plate\r\nColoris gris\r\nTailles 35/37, 38/40, 41/43, 44/46', 10, 17, 1),
(77, 'ONF', 'ChaussettesLegere.png', 'Chaussettes légère N°41 ', 'VET', 'Composition 88% coton BIO 17% polyamide 1% elasthanne\r\nChaussette agréable, douce à porter et particulièrement adaptée aux\r\nchaussures de ville.\r\nColoris noir\r\nTailles 35/38 – 39/42 – 43/46 – 47/50', 10, 17, 1),
(78, 'ONF', 'GantsTactiles.png', 'Gants tactiles N°42', 'VET', 'Gants tactiles pour Smartphone en acrylique. Les 3 extrémités tactiles\r\ndes doigts sont composées de 30 % de fibres d\'acier inoxydables.\r\nColoris noir\r\nTaille unique', 10, 17, 1),
(79, 'ONF', 'SousGants.png', 'Sous gants N°43 / Confort', 'VET', '100% soie chaud excellent ratio chaleur/minimum encombrement/\r\nconfort. Poignet élastiqué. Paume et dessus de main sans coutures\r\nColoris: noir\r\nTaille S/7 - M/8 - L/9 - XL/10 - XXL/11', 10, 17, 1),
(80, 'ONF', 'GantsRenforces.png', 'Gants renforcés N°44 ', 'VET', 'Cuir synthétique avec renfort Kevlar dans la paume de la main et le\r\ndessous des doigts. Dos respirant. Poignée élastique à fermeture\r\nauto agrippante.\r\nColoris rouge et noir\r\nTaille 8 à 12', 10, 17, 1),
(81, 'ONF', 'ChemiseCotonHomme.png', 'Chemise coton à carreaux homme N°45', 'VET', 'Chemise manches longues en flanelle - 100% Coton tissé teint—190g/m2\r\nFermeture à boutons\r\n1 poche poitrine - poignets fendus fermés par boutons\r\nColoris : bleu\r\nTaille : S au 3XL', 10, 17, 1),
(82, 'ONF', 'SacADos.png', 'Sac à dos 20 Litres N°46 ', 'VET', '100% Polyester (600D/Ripstop)\r\nBretelles réglables rembourrées\r\nPoignée de transport, sangles à la taille et à la poitrine\r\nPanneau dorsal rembourré, respirant et ergonomique\r\nCompatible avec ordinateur portable de 15.6\"\r\nCompatible avec une poche d\'hydratation (019.30-QX510)\r\nHousse de protection contre la pluie\r\nDiverses attaches et passant arrière pour attacher une lampe\r\nPoche sur le côté avec fermeture éclair, poche interne en filet\r\nSangles de compression et bandes réfléchissantes\r\nDimensions: 31 x 48 x 20 cm\r\nColoris noir', 10, 17, 1),
(83, 'ONF', 'SacADosSiege.png', 'Sac à dos siege N°47 ', 'VET', 'Sac à dos avec siège pliable intégré, bonne capacité de\r\nrangement. 100% polyester\r\nDimensions: 34 x 33 x 41 cm\r\nPoids : 1,7kg', 10, 17, 1),
(84, 'ONF', 'Couteau.png', 'Couteau bivouac N°48 ', 'VET', 'Modèle massif lame 20/10 mm. Cran de sécurité, couteau (lame\r\n9cm), fourchette et cuillère détachables, ouvre-boîte affûté avec\r\nperce-boite, tire bouchon 5 spires, housse toile renforcée avec pas-\r\nsant ceinture et crochet métallique pour ceinturon armée', 10, 17, 1),
(85, 'ONF', 'Glaciere.png', 'Glacière rigide Camping gaz N°49 ', 'VET', 'Isolation: PU - Couvercle à charnière. Equipement: Robuste, Isolation:\r\nPU, poignée pratique, design moderne . Performances froid (+/- 1°C):\r\n24 heures\r\nPoids: 2,4kg\r\nCapacité en Litre : 26L - Capacité en bouteilles: 6 x 1.5L bouteilles\r\nDimensions extérieures (L x H x P): 41 x 42 x 32 cm', 10, 17, 1),
(86, 'ONF', 'ThermosNourriture.png', 'Thermos nourriture N°50 ', 'VET', 'Boite alimentaire double paroi en acier inoxydable, composée de\r\ndeux compartiments fermant par un couvercle étanche vissé et\r\nmuni d\'une poignée de transport. La durée de maintien des ali-\r\nments à 45°C est d’environ 10 heures.\r\nCapacité : 1,5 L\r\nPoids : 604 gr\r\nDimensions 18,2cm * diamètre 13,2cm', 10, 17, 1),
(87, 'ONF', 'ThermosGourde.png', 'Thermos gourde Camping gaz N°51 ', 'VET', 'Livrée avec bouchon bec verseur, gobelet et sangle. Large bouchon dévissable\r\nqui peut être utilisé comme gobelet\r\nIntérieur : paroi en polycarbonate, ne conserve pas les odeurs ni les saveurs,\r\nrésiste à l’eau bouillante\r\nExtérieur : Plastique polypropylène\r\nIsolation en mousse de PU sans CFC ni HCFC\r\nDimensions : H 23,2 x L 17,6 x P 10,7 cm\r\nCapacité 1,5L', 10, 17, 1),
(88, 'ONF', 'RechaudCamping.png', 'Réchaud Camping Gaz N°52', 'VET', 'Le réchaud Twister Plus est un réchaud compact et puissant\r\n\r\n(2900W) doté du système Easy Clic Plus qui permet le raccorde-\r\nment du réchaud à la cartouche en 1/4 de tour.\r\n\r\nSes grands bras repliables de 6 cm assure une grande stabilité de\r\ncuisson.\r\nPour utiliser votre réchaud en toute sécurité, un bouclier thermique\r\nprotégera le bouton de commande.\r\nLe réchaud est également fourni avec sa boîte de rangement.\r\nRupture de stock sur le modèle plaque fourni l’année passée', 10, 17, 1),
(89, 'ONF', 'SiegePliant.png', 'Siège pliant N°53 ', 'VET', 'Chaise pliante en polyester 600D et cadre en acier. Pochette\r\nde rangement en nylon incluse. Poids max. admissible 100 kg.\r\nColoris noir.\r\nDimensions: 80X48X86 CM', 10, 17, 1),
(90, 'ONF', 'AbriParapluie.png', 'Abri parapluie N°54 ', 'VET', 'Diamètre 1.75m (arc de 2.20m)\r\nColoris vert—Toile nylon en 210D\r\nArticulation inclinable à 45° ou 90°\r\nMât extensible jusqu’à 2m\r\nLivré dans une housse\r\nBaleines en acier et pic en alu', 10, 17, 1),
(91, 'ONF', 'AbriMoustiquaire.png', 'Abri moustiquaire N°55 ', 'VET', 'Pratique grâce à son seul point d’attache et légère.\r\nAvec housse de rangement.\r\nHauteur d’accroche : 2,5m\r\nCirconférence au sol : 8,5m', 10, 17, 1),
(92, 'ONF', 'ChapeauMoustiquaire.png', 'Chapeau moustiquaire N°56 ', 'VET', '100% polyester avec enduction. Coutures principales\r\ncontrecollées pour une meilleure résistance à l\'eau.\r\nForme elliptique, larges bords souples et pliables avec\r\nboutons pression sur le coté, œillets d\'aération, lanière et\r\nstoppeur. 324 trous/cm2\r\nDisponible en 2 tailles 56/58 CM, 60/62 CM.\r\nColoris noir', 10, 17, 1),
(93, 'ONF', 'TablePliante.png', 'Table pliante N°57 ', 'VET', 'Table pliante en aluminium, latte se roulant sur elles-\r\nmêmes.\r\n\r\nSac de rangement avec bandoulière pour transport\r\nDimansion : 70 x 70 x 72\r\nPoids : 2,7kg', 10, 17, 1),
(94, 'ONF', 'ChaussuresEagle.png', 'Chaussures basses Haix Black EagleNature GTX Low N°58 ', 'VET', 'Hauteur 8 cm. Etanche et respirante grace à la membrane\r\nGore Tex. Doublure résistante à l’abrasion, avec un bon\r\nconfort thermique.\r\nComposition cuir/PU/caoutchouc.\r\nPointure 35 à 47\r\n\r\nPS : Ces chaussures ne sont pas des EPI et ne peu-\r\nvent donc pas être portées sur les chantiers.', 10, 17, 1),
(95, 'ONF', 'ChaussuresScout.png', 'Chaussures mi-hautes Haix scout 2.0 N°59 ', 'VET', 'Hauteur 17 cm. Etanche et respirante grâce à la membrane\r\nGore Tex. Doublure résistante à l’abrasion, avec un bon con-\r\nfort thermique. Antistatique.\r\nComposition cuir/PU/caoutchouc.\r\nPointure 35 à 47\r\nPS : Ces chaussures ne sont pas des EPI et ne peuvent\r\ndonc pas être portées sur les chantiers.', 10, 17, 1),
(182, 'EBM Distribution ', 'Stelvio.png', ' Stelvio / Chaussures plaine', 'EPINonOuvrier', 'Taille : 36 à 49\r\nPas de protection anti-coupure\r\nChaussure légère à embout renforcé et\r\nsemelle anti-perforation « Vibram »\r\nIdéal pour les terrains de plaine.', 1, 18, 1),
(183, 'EBM Distribution ', 'Piémont.png', 'Vancouver Piémont ', 'EPINonOuvrier', 'Taille : 36 à 49\r\nPas de protection anti-coupure\r\nChaussure légère à embout renforcé et semelle\r\nanti-perforation « Vibram »\r\nBon compromis entre mobilité et résistance.\r\nPoids : 1850g en taille 42\r\nIdéal pour les terrains de moyenne montagne.', 1, 18, 1),
(184, 'EBM Distribution ', 'Montagne.png', 'Vancouver Montagne ', 'EPINonOuvrier', 'Taille : 36 à 49\r\nPas de protection anti-coupure\r\nChaussure légère à embout renforcé et semelle\r\nanti-perforation « Vibram »\r\nBon compromis entre mobilité et résistance.\r\nPoids : 1850g en taille 42\r\nIdéal pour les terrains de moyenne montagne.', 1, 18, 1),
(185, 'EBM Distribution ', 'Purofort.png', 'Dunlop Purofort ', 'EPINonOuvrier', 'Taille : 38 à 48\r\nPas de protection anti-coupure\r\nBottes de sécurité en caoutchouc 100%\r\nimperméable à embout renforcé et semelle\r\n\r\nanti-perforation.\r\nIdéal pour déplacement en milieu très\r\nhumide / marécageux.', 1, 18, 1),
(186, 'EBM Distribution ', 'Stubai.png', 'Stubai Twin peak / Crampon forestier', 'EPINonOuvrier', 'Taille unique\r\n\r\nS’adapte à tous les modèles de chaussures, UNIQUEMENT EN CAS DE VERGLAS', 1, 18, 1),
(187, 'Zimmer ', '1SX4.png', 'SIP 1SX4 / Guêtre', 'EPINonOuvrier', 'Pas de protection anti-coupure\r\nGuêtres de débroussaillage renforcé protégeant\r\ndes projections. Limite la remontée de tiques.\r\nMaintien par câble sous la chaussure.', 3, 18, 1),
(188, 'ROSTAING', 'EPS7PBA.png', 'Gants cuir', 'EPINonOuvrier', 'Gants de manutention en cuir avec protège\r\n\r\nartère en cuir.', 4, 22, 1),
(189, 'ROSTAING', 'FeelPro.png', 'FEELPRO', 'EPINonOuvrier', 'Gants fins pour saisie tactile sur smartphone.\r\n\r\nTaille : 7 à 11', 4, 22, 1),
(190, 'ROSTAING', 'MidSeason.png', 'MIDSEASON /', 'EPINonOuvrier', 'Gants épais et étanche pour saisie tactile sur\r\n\r\nsmartphone.\r\nProtège du froid positif\r\nTaille : 7 à 12', 4, 22, 1),
(191, 'ROSTAING', 'MidSeasonNitrile.png', 'Gants nitrile', 'EPINonOuvrier', 'Gants 100% étanche, protection contre les\r\n\r\nrisques chimiques\r\nTaille : 7 à 10', 4, 22, 0),
(192, 'France Equipement Sécurité', '60510.png', 'Réf 60510 / 60513 / 60516', 'EPINonOuvrier', 'Ajustement de la longueur et inclinaison des\r\n\r\nbranches.\r\n\r\nExiste en version teintée jaune (pour temps\r\nsombre) et teintée solaire (pour temps\r\n\r\nensoleillé).', 8, 24, 1),
(193, 'Fiprotec', 'MOLDEX2405.png', 'MOLDEX réf 2405 ', 'EPINonOuvrier', 'Taille unique\r\n\r\nMasque FFP2 avec valve facilitant l’expiration.\r\n\r\nRéglage avec élastique\r\nUtilisable en milieu infesté par la chenille\r\n\r\nprocessionnaire.', 6, 23, 1),
(194, 'Fiprotec', 'TYVEK800J.png', 'TYVEK 800J ', 'EPINonOuvrier', 'Combinaison intégrale avec fermeture à glissière, passe-pouce et capuche intégrée. Utilisable en milieu infesté par la chenille processionnaire.', 6, 23, 1),
(195, 'Fiprotec', 'TYVEK500.png', 'YVEK 500 ', 'EPINonOuvrier', 'Cagoule à usage unique couvrant les épaules\r\net la tête.\r\nUtilisable en milieu infesté par la chenille\r\nprocessionnaire.', 6, 23, 1),
(196, 'E.P.I SUD ', 'VGARD500.png', 'MSA VGARD 500 / Casque de chantier', 'EPINonOuvrier', 'Réglage du casque avec molette.\r\nBandeau anti-sueur en mousse.\r\nDurée de vie : 5 ans', 9, 25, 1),
(197, 'E.P.I SUD', 'MAX300.png', 'COVERGUARD MAX300 / Coquille pour casque de chantier', 'EPINonOuvrier', 'Coquille de protection auditive pour casque de\r\nchantier\r\nRéduction de bruit : 30dB', 9, 25, 1),
(198, 'E.P.I SUD ', 'MOLDEX6401.png', 'MOLDEX réf 6401 ', 'EPINonOuvrier', 'Bouchon d’oreille réutilisable\r\nRéduction de bruit : 30dB', 9, 23, 1),
(200, 'E.P.I SUD ', '200LS.png', 'MSA Advantage 200 LS ', 'EPINonOuvrier', 'Taille unique avec réglage par élastique.\r\nPossibilité d’avoir plusieurs niveaux de filtration\r\nsur les cartouches.\r\nCartouche prévu au marché EPI : A2P3', 9, 23, 1),
(207, 'Zimmer', '1SSV.png', 'SIP 1SSV / Pantalon de travail', 'EPI', 'Pas de protection anti-coupure\r\nPantalon léger et résistant idéal pour travauxsans machine.\r\nTaille élastiquée.\r\n\r\nUtilisable en milieu infesté par la chenille processionnaire.', 3, 2, 1),
(209, 'E.P.I SUD', 'T-shirtCofor.png', 'T-shirt COFOR rouge ', 'EPI', 'Grammage : 185 g/m²\r\nExiste en version col en V\r\nAvec marquage COFOR', 9, 20, 1),
(214, 'E.P.I SUD', 'cartouche.jpg', 'Cartouche MSA Advantage 200 LS (A2P3)', 'EPINonOuvrier', 'Cartouche pour masque MSA Advantage 200 LS ', 9, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `commentaire` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `libelle`, `commentaire`) VALUES
(1, 'Utilisateur', 'Droit de commander et consulter les produits'),
(2, 'Responsable', 'Droit de commander pour ses subordonnés'),
(4, 'Administrateur', 'Accès a tout'),
(3, 'Gestionnaire de commande', 'On accès au recap commande en fonction de leur site ');

-- --------------------------------------------------------

--
-- Table structure for table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taille`
--

INSERT INTO `taille` (`id`, `libelle`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, '3XL'),
(8, '4XL'),
(9, '5XL'),
(10, 'T36'),
(11, 'T37'),
(12, 'T38'),
(13, 'T39'),
(14, 'T40'),
(15, 'T41'),
(16, 'T42'),
(17, 'T43'),
(18, 'T44'),
(19, 'T45'),
(20, 'T46'),
(21, '36'),
(22, '37'),
(23, '38'),
(24, '39'),
(25, '40'),
(26, '41'),
(27, '42'),
(28, '43'),
(29, '44'),
(30, '45'),
(31, '46'),
(32, '47'),
(33, '48'),
(34, '49'),
(35, '50'),
(36, '51'),
(37, '52'),
(38, '53'),
(39, '54'),
(40, 'XS/S'),
(41, 'M/L'),
(42, 'XL/XXL'),
(43, '0'),
(44, '1'),
(45, '2'),
(46, '3'),
(47, '4'),
(48, '5'),
(49, '6'),
(50, '7'),
(51, '8'),
(52, '9'),
(53, '10'),
(54, '11'),
(55, '12'),
(56, '13'),
(57, 'Taille unique'),
(58, '35/37'),
(59, '35/38'),
(60, '38/40'),
(61, '39/42'),
(62, '41/43'),
(63, '43/46'),
(64, '44/46'),
(65, '47/50'),
(66, 'Transparent'),
(67, 'Jaune'),
(68, 'Fumée'),
(69, 'XS Court'),
(70, 'XS Standard '),
(71, 'XS Long'),
(72, 'S Court '),
(73, 'S Standard '),
(74, 'S Long '),
(75, 'M Court '),
(76, 'M Standard '),
(77, 'M Long'),
(78, 'L Court '),
(79, 'L Standard '),
(80, 'L Long'),
(81, 'XL Court '),
(82, 'XL Standard'),
(83, 'XL Long'),
(84, '2XL Court'),
(85, '2XL Standard '),
(86, '2XL Long '),
(87, '3XL Court '),
(88, '3XL Standard '),
(89, '3XL Long '),
(90, '35');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `libelle`, `idCategorie`) VALUES
(1, 'Élément chaussant anticoupures', 2),
(2, 'Pantalons anticoupures', 1),
(20, 'T-shirt', 6),
(4, 'Tee shirts de couleur visible', 7),
(5, 'Gant technique', 3),
(6, 'Gant cuir', 3),
(7, 'Gant cuir/élastique', 3),
(8, 'Gant hiver', 3),
(9, 'Gant mécanique', 3),
(10, 'Gant de débardage', 3),
(11, 'Lunette de protection', 8),
(12, 'Vêtement de pluie', 5),
(13, 'Masque', 9),
(14, 'Combinaison', 1),
(15, 'EPI jetable ', 9),
(16, 'Bouchon', 9),
(17, 'Vêtement', 10),
(18, 'Éléments chaussants non ouvrier', 11),
(19, 'Protection contre la chenille processionnaire', 4),
(21, 'Masque FFP2', 9),
(22, 'Protection des mains non ouvrier', 12),
(23, 'Autre effets non ouvrier', 13),
(24, 'lunettes non ouvrier', 14),
(25, 'casque non ouvrier', 15),
(26, 'Cartouche', 9),
(27, 'Cartouche non ouvrier', 13);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `idLieuLivraison` int(11) NOT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `idRole` int(11) NOT NULL,
  `idMetier` int(11) NOT NULL,
  `Agence` varchar(50) NOT NULL,
  `IdEmployeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idLieuLivraison` (`idLieuLivraison`),
  KEY `id_chef` (`id_responsable`),
  KEY `idRole` (`idRole`),
  KEY `idMetier` (`idMetier`),
  KEY `IdEmployeur` (`IdEmployeur`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Login`, `password`, `prenom`, `nom`, `email`, `tel`, `idLieuLivraison`, `id_responsable`, `idRole`, `idMetier`, `Agence`, `IdEmployeur`) VALUES
(1, 'John.doe@gmail.doe', '$2y$10$Jn46zxmowvJmkvx6JQCgTuqBgjtZX7PVQwKtXSxaFjTBK4OAtgsQW', 'John', 'Doe', 'john.doe@gmail.doe', '0609090966', 1, 3, 1, 1, 'Milhouse', 1),
(2, 'AdminJohnDoe@gmail.doe', '$2y$10$GTMIdo7DAqBv5/jePVEv4.0EK8DqEbYXSwSLLoGsqo6BsC8obnUVm', 'John', 'Doe', 'john.doe@gmail.doe', '0609090966', 1, 2, 3, 2, 'Milhouse', 1),
(3, 'ChefJohn.ChefDoe@gmail.Chef', '$2y$10$7LRUb35AVEmSkXx8jrZwA..S6Mh8XZ5dF.EVm1mADJ932AIPjJqcy', 'chefJohn', 'chefDoe', 'chefJohn@chefDoe.chef', '0609090666', 1, 3, 2, 3, 'Colmar', 2),
(20, 'SuperJohn@super.John', '$2y$10$Na5o6ipGj51UWgFEqrjexOZPdjcLKNVMrOk7YoFOavSM.LRsM9YFS', 'Didou', 'John', 'SuperJohn@super.John', '0654589874', 2, 20, 4, 1, 'Mulhouse', NULL),
(21, 'dev', '$2y$10$8p0f5RZSCB06Dlq/Zz/E.ugHO0r.Ztz69gqClzIQOWnOPF3GrNLa2', 'dev', 'dev', 'dev', '0600600606', 1, 21, 2, 5, 'Milhouse', 1),
(29, 'Johnette@Dobias.com', '$2y$10$ZSli2ceF8XXcFsClG2U2xOZpcNDr757kpgdJcU5rpHyV4YjmuHwB2', 'Dobias', 'Johnette', 'Johnette@Dobias.com', '0707070707', 1, 3, 1, 2, 'Colmar', NULL),
(37, 'Eric@windev.com', '$2y$10$SoeDXLWUxb5P3wTM4RXg5OljbGE55i2zy2kj9qO33xe9DhIfmyUz6', 'fan2Windev', 'Eric', 'Eric@windev.com', '0609110661', 1, 3, 1, 2, 'Colmar', 1),
(41, 'Kiki@psg.com', '$2y$10$2NLFsiOwL06KFWlJ9.aPAuQwXwWIwWBRHsi88zZmhS0i5MTdUNmNe', 'MbbaPied', 'Killian', 'Kiki@psg.com', '4587458744', 2, 3, 1, 6, 'Milhouse', 1),
(89, 'mey.tristan@onf.fr', '$2y$10$zXHTrwjB6yBuwrat6OEBXu0CldVvwxU5oiPUznzxEYtGl26BUVT0K', 'Tristan', 'Mey', 'mey.tristan@onf.fr', '0606060606', 2, 89, 2, 1, 'Milhouse', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
