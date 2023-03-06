-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 mars 2023 à 13:51
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `onf`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Protection des membres inférieurs'),
(2, 'Casque forestier et accessoires'),
(3, 'Protection des mains'),
(4, 'Vêtements de protection contre la chenille processionnaire'),
(5, 'Vêtements de pluie'),
(6, 'Autres effets'),
(7, 'EPI haute visibilité'),
(8, 'Lunettes'),
(9, 'Equipements jetables');

-- --------------------------------------------------------

--
-- Structure de la table `commandeepi`
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
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandeepi`
--

INSERT INTO `commandeepi` (`id`, `dateCrea`, `statut`, `idUtilisateur`, `terminer`, `dateCreaFini`) VALUES
(62, '2023-02-02 16:26:56', 'Sylviculteur', 2, 0, NULL),
(63, '2023-02-02 16:27:24', 'Bucheron', 21, 0, NULL),
(64, '2023-03-01 14:01:39', 'Bucheron', 20, 0, NULL),
(79, '2023-03-02 14:23:34', 'Bucheron', 1, 1, '2023-03-02 14:23:38');

-- --------------------------------------------------------

--
-- Structure de la table `commandevet`
--

DROP TABLE IF EXISTS `commandevet`;
CREATE TABLE IF NOT EXISTS `commandevet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCrea` date DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `terminer` tinyint(1) NOT NULL DEFAULT '0',
  `dateCreaFini` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `Message`) VALUES
(1, 'Année 2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `concerne`
--

DROP TABLE IF EXISTS `concerne`;
CREATE TABLE IF NOT EXISTS `concerne` (
  `idStatut` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `quantiteMax` int(11) NOT NULL,
  PRIMARY KEY (`idStatut`,`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `concerne`
--

INSERT INTO `concerne` (`idStatut`, `idType`, `quantiteMax`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 2),
(1, 4, 1),
(1, 7, 1),
(1, 11, 2),
(1, 15, 1),
(1, 16, 3),
(1, 17, 4),
(1, 18, 1),
(1, 20, 2),
(1, 26, 3),
(1, 33, 4),
(2, 1, 1),
(2, 2, 1),
(2, 3, 2),
(2, 4, 1),
(2, 7, 1),
(2, 8, 1),
(2, 10, 2),
(2, 11, 2),
(2, 12, 2),
(2, 15, 1),
(2, 16, 4),
(2, 17, 4),
(2, 18, 1),
(2, 20, 1),
(2, 26, 4),
(2, 33, 4),
(3, 4, 1),
(3, 8, 1),
(3, 12, 2),
(3, 15, 1),
(3, 16, 3),
(3, 17, 3),
(3, 18, 1),
(3, 21, 3),
(3, 26, 3),
(3, 33, 4),
(3, 36, 2),
(4, 15, 1),
(5, 4, 1),
(5, 8, 1),
(5, 12, 2),
(5, 15, 1),
(5, 16, 3),
(5, 17, 3),
(5, 18, 1),
(5, 21, 3),
(5, 26, 3),
(5, 33, 4),
(5, 36, 2),
(6, 4, 1),
(6, 8, 1),
(6, 15, 1),
(6, 16, 3),
(6, 17, 3),
(6, 18, 1),
(6, 19, 2),
(6, 21, 3),
(6, 26, 3);

-- --------------------------------------------------------

--
-- Structure de la table `concerne_categorie_metier`
--

DROP TABLE IF EXISTS `concerne_categorie_metier`;
CREATE TABLE IF NOT EXISTS `concerne_categorie_metier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `idMetier` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `concerne_categorie_metier`
--

INSERT INTO `concerne_categorie_metier` (`id`, `idCategorie`, `idMetier`) VALUES
(1, 1, 1),
(2, 2, 1),
(16, 9, 1),
(15, 8, 1),
(14, 7, 1),
(13, 6, 1),
(12, 5, 1),
(11, 4, 1),
(10, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `disponible`
--

DROP TABLE IF EXISTS `disponible`;
CREATE TABLE IF NOT EXISTS `disponible` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `idTaille` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  PRIMARY KEY (`Id`,`idProduit`),
  KEY `idProduit` (`idProduit`),
  KEY `idTaille` (`idTaille`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `disponible`
--

INSERT INTO `disponible` (`Id`, `idProduit`, `idTaille`, `prix`) VALUES
(1, 1, 2, 0),
(2, 2, 2, 0),
(3, 3, 3, 50),
(4, 4, 2, 50),
(5, 5, 3, 0),
(6, 6, 1, 0),
(7, 13, 1, 0),
(8, 7, 3, 0),
(9, 8, 2, 0),
(10, 9, 2, 0),
(11, 10, 1, 0),
(12, 11, 2, 0),
(13, 12, 3, 0),
(14, 14, 1, 0),
(15, 15, 3, 0),
(16, 16, 1, 0),
(17, 17, 1, 0),
(18, 18, 2, 0),
(19, 19, 3, 0),
(20, 20, 3, 0),
(21, 21, 3, 0),
(22, 22, 1, 0),
(23, 23, 3, 0),
(24, 24, 3, 0),
(25, 25, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
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
-- Déchargement des données de la table `employeur`
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
-- Structure de la table `fournisseur`
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
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
(9, NULL, NULL, NULL, 'E.P.I SUD', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lieulivraion`
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
-- Déchargement des données de la table `lieulivraion`
--

INSERT INTO `lieulivraion` (`id`, `nom`, `codePostal`, `ville`, `telephone`, `mail`, `Siege`) VALUES
(1, 'Site colmar', '68000', 'Colmar', '0604050204', 'mail@gmail.gmail', 'Colmar'),
(2, 'Site Mulhouse', '68420', 'Mulhouse', '0604050208', 'mulhouse@mulhouse.mulhouse', 'Mulhouse');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommandeepi`
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
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lignecommandeepi`
--

INSERT INTO `lignecommandeepi` (`Id`, `idProduit`, `quantite`, `idCommandeEPI`, `idTaille`) VALUES
(59, 1, 1, 63, 2),
(60, 3, 2, 63, 3),
(61, 2, 1, 63, 2),
(85, 13, 1, 77, 1),
(84, 13, 1, 76, 1),
(83, 13, 1, 75, 1),
(82, 13, 1, 74, 1),
(81, 13, 1, 73, 1),
(80, 13, 1, 72, 1),
(87, 13, 1, 79, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lignecommandevet`
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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

DROP TABLE IF EXISTS `metier`;
CREATE TABLE IF NOT EXISTS `metier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `metier`
--

INSERT INTO `metier` (`id`, `statut`) VALUES
(1, 'Bucheron'),
(2, 'Sylviculteur'),
(3, 'chauffeur débusqueur'),
(4, 'logisticien'),
(5, 'chauffeur d\'engin'),
(6, 'Débardeurs');

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `points`
--

INSERT INTO `points` (`id`, `point`, `idUtilisateur`) VALUES
(1, 9700, 1),
(2, 1270, 2),
(13, 0, 17),
(14, 0, 20),
(15, 50000, 21),
(16, 0, 22),
(17, 0, 23),
(18, 0, 24),
(19, 0, 25),
(20, 0, 27),
(21, 0, 29);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referenceFournisseur` varchar(50) DEFAULT NULL,
  `fichierPhoto` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `idFournisseur` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFournisseur` (`idFournisseur`),
  KEY `idType` (`idType`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `referenceFournisseur`, `fichierPhoto`, `nom`, `type`, `description`, `idFournisseur`, `idType`) VALUES
(1, 'EBM Distribution', 'Extreme.png', 'Extrême One 944', 'EPI', 'Idéal pour travailler avec une tronçonneuse sur terrain plat', 1, 1),
(2, 'EBM Distribution', 'Santiago.png', 'Santiago', 'EPI', 'Idéal pour travailler avec une tronçonneuse en milieu très humide.', 1, 2),
(3, NULL, 'veste.png', 'VESTE Solidur Inve N°1', 'VET', 'Veste de travail extensible hydrophobe avec manches amovibles', 2, 5),
(4, NULL, 'debardeur.png', 'Débardeur unisexe N°20', 'VET', 'Structure tubulaire', 2, 6),
(5, 'SDM Pro', 'Trekker.png', 'HAIX Trekker Mountain 2.0', 'EPI', 'Doublure intérieur tissus GORE-TEX\r\nSemelle crantée avec profil tout terrain, anti-\r\nperforation et résistante à l’abrasion.', 2, 7),
(6, 'EBM Distribution ', 'Stelvio.png', 'Stelvio', 'EPI', 'Chaussure légère à embout renforcé et\r\nsemelle anti-perforation « Vibram »\r\nIdéal pour chauffeurs d’engin ou travail en\r\natelier.', 1, 8),
(7, 'EBM Distribution ', 'Stubai.png', 'Stubai Twin peak', 'EPI', 'S’adapte à tous les modèles de chaussures.', 1, 9),
(8, 'Zimmer', '1SPV.png', 'SIP 1SPV', 'EPI', 'Pantalon anti-coupure de classe 1\r\nDeux poches enfilées, une poche mètres, une\r\npoche arrière et une poche plaquée sur la\r\ncuisse.', 3, 3),
(9, 'Zimmer', '1RB8.png', 'SIP 1RB8', 'EPI', 'Pas de protection anti-coupure\nPantalon avec renfort avant.\nProtège des projections dans les tibias lors\ndes opérations de débroussaillage.', 3, 10),
(10, 'Zimmer ', '1XT2.png', 'SIP 1XT2', 'EPI', 'Protection anti-coupure de classe 1', 3, 11),
(11, 'Zimmer', '1SSV.png', 'SIP 1SSV', 'EPI', 'Pas de protection anti-coupure\nPantalon léger et résistant idéal pour travauxsans machine.\nTaille élastiquée.\n\nUtilisable en milieu infesté par la chenille processionnaire.', 3, 12),
(12, 'Zimmer', '1SX4.png', 'SIP 1SX4', 'EPI', 'Pas de protection anti-coupure\nGuêtres de débroussaillage renforcé protégeant\ndes projections. Limite la remontée de tiques.\nMaintien par câble sous la chaussure.', 3, 13),
(13, 'Zimmer', 'PFANNER.png', 'PFANNER Protos ', 'EPI', 'Casque forestier avec protection\r\nauditive intégré à la coque du casque.\r\nDurée de vie : 4 ans (selon CCR)\r\nPossibilité d’ajouter une jugulaire pour\r\ntravaux en hauteur.\r\nAccessoires disponibles : Kit hygiène,\r\ncoquilles auditive, visière F39, protège\r\nnuque', 3, 4),
(14, 'Zimmer', 'G500.png', '3M Peltor G500', 'EPI', 'Ensemble anti-bruit / visière idéal pour travaux\r\nde débroussaillage.\r\nProtection du visage contre les projections et\r\nprotection auditive sans la contrainte d’un\r\ncasque complet.', 3, 15),
(15, 'ROSTAING', 'EPS7PBA.png', 'Gant cuir EPS7PBA', 'EPI', 'Gants de manutention en cuir avec protège\r\nartère en cuir.', 4, 16),
(16, 'ROSTAING', 'HMPS7BP.png', 'Gants cuir HMPS7BP', 'EPI', 'Gants de manutention en cuir avec dos\r\nélastique plus respirant avec protège artère\r\nen cuir.', 4, 17),
(17, 'ROSTAING', 'Winterpro.png', 'Winterpro', 'EPI', 'Bon grip grâce aux picots nitrile.\r\nDoublure intérieure permettant une\r\nrésistance au froid jusqu’à -10°C.', 4, 18),
(18, 'ROSTAING', 'Blackstick.png', 'Blackstick+', 'EPI', 'Protection anti-coupure optimale et\r\nexcellente résistance à la perforation', 4, 19),
(19, 'Lyreco', 'GT015.png', 'Francital GT015', 'EPI', 'Gants adaptés pour l’utilisation de la\r\ntronçonneuse.\r\nFermeture par scratch au poignet.\r\nCoussinet anti-vibration.', 5, 20),
(20, 'ROSTAING', 'DENIM.png', 'DENIM', 'EPI', 'Gants étanche avec enduction pour\r\nprotection mécanique, idéal pour travaux de\r\nmaintenance en milieu huileux\r\nRésistance à la coupure.', 4, 21),
(21, 'Fiprotec', 'SOLIDUR.png', 'SOLIDUR FEPA ', 'EPI', 'Pantalon anti-coupure de classe 1\r\nProtège des poils urticants de la chenille\r\nprocessionnaire.', 6, 3),
(22, 'Zimmer', '1SSV.png', 'SIP 1SSV', 'EPI', 'Pas de protection anti-coupure\r\nPantalon léger et résistant idéal pour travaux\r\nsans machine.\r\nTaille élastiquée.\r\nUtilisable en milieu infesté par la chenille\r\nprocessionnaire.', 3, 12),
(23, 'fiprotec', 'FELIN.png', 'SOLIDUR FELIN', 'EPI', 'Protège des poils urticants de la chenille\r\nprocessionnaire.', 6, 25),
(24, 'Fiprotec', 'ERGOS.png', 'ERGOS 359003', 'EPI', 'Gants en cuir fleur de bovin hydrofuge\r\nLimite l’accroche des poils urticants de la\r\nchenille processionnaire.', 6, 26),
(25, 'NK Diffusion', 'H20VE.png', 'SOLIDUR H20VE', 'EPI', 'Veste de pluie avec membrane respirante.\r\nGrande capuche réglable et rabattable.\r\nQuatre poches extérieur étanche, deux\r\npoches sous rabats et une poche intérieure.', 7, 27),
(26, 'NK Diffusion', 'H20PA.png', 'SOLIDUR H20PA', 'EPI', 'Pantalon de pluie avec membrane\r\nrespirante.\r\nCeinture élastiquée.', 7, 5),
(27, 'France Equipement Sécurité', '60510.png', 'Lunette de sécurité 60510', 'EPI', 'Ajustement de la longueur et inclinaison des\r\nbranches.\r\nExiste en version teintée jaune (pour temps\r\nsombre) et teintée solaire (pour temps\r\nensoleillé).', 8, 6),
(28, 'fiprotec', 'MOLDEX2405.png', 'MOLDEX 2405', 'EPI', 'Masque FFP2 avec valve facilitant l’expiration.\r\nRéglage avec élastique\r\nUtilisable en milieu infesté par la chenille\r\nprocessionnaire.', 6, 28),
(29, 'Fiprotec', 'TYVEK800J.png', 'TYVEK 800J', 'EPI', 'Combinaison intégrale avec fermeture à\r\nglissière, passe-pouce et capuche intégrée.\r\nUtilisable en milieu infesté par la chenille\r\nprocessionnaire.', 6, 29),
(30, 'Fiprotec', 'TYVEK500.png', 'TYVEK 500', 'EPI', 'Cagoule à usage unique couvrant les épaules\r\net la tête.\r\nUtilisable en milieu infesté par la chenille\r\nprocessionnaire.', 6, 30),
(31, 'E.P.I SUD ', 'MOLDEX6401.png', 'MOLDEX 6401', 'EPI', 'Bouchon d’oreille réutilisable\r\nRéduction de bruit : 30dB', 9, 31),
(32, 'E.P.I SUD ', 'PORTWEST.png', 'PORTWEST C376', 'EPI', 'Adapté pour le travail en bord de route.\r\nMultiples poches.\r\nMarquage ONF ou COFOR dans le dos.', 9, 32),
(33, 'E.P.I SUD ', 'T-shirt.png', 'T-shirt rouge ', 'EPI', 'Grammage : 185 g/m²\r\nExiste en version col en V\r\nAvec ou sans marquage ONF ou COFOR', 9, 33),
(34, 'E.P.I SUD', 'Advantage.png', 'MSA Advantage 200 LS', 'EPI', 'Possibilité d’avoir plusieurs niveaux de filtration\r\nsur les cartouches.\r\nCartouche prévu au marché EPI : A2P3', 9, 34),
(35, 'Fiprotec', 'CHATARD.png', 'CHATARD ILONA 4', 'EPI', 'Veste hiver format « bombers » avec\r\ncapuche intégré.\r\nCouleur : orange', 6, 35),
(36, 'Fiprotec', 'CEPOVETT.png', 'CEPOVETT 9J86', 'EPI', 'Fermeture à double glissière.\r\nCouleur : orange\r\nUniquement pour conducteurs d’engins et\r\nlogisticiens.', 6, 36);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `commentaire` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`, `commentaire`) VALUES
(1, 'Utilisateur', 'Droit de commander et consulter les produits'),
(2, 'Responsable', 'Droit de commander pour ses subordonnés'),
(4, 'Administrateur', 'Peut crée des utilisateurs et commander pour eux'),
(5, 'Super-Administrateur', 'Accès a tout'),
(3, 'Gestionnaire de commande', 'On accès au recap commande en fonction de leur site ');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`id`, `libelle`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `libelle`, `idCategorie`) VALUES
(1, 'Chaussure anti-coupure plaine', 1),
(2, 'Botte de sécurité anti-coupure', 1),
(3, 'Pantalon anti-coupure', 1),
(4, 'Casque forestier complet', 2),
(5, 'Pantalon de pluie', 5),
(6, 'Lunette de sécurité ', 6),
(7, 'Chaussures anti-coupure montagne', 1),
(8, 'Chaussure de sécurité - chauffeurs et logisticiens', 1),
(9, 'Crampons Forestier ', 1),
(10, 'Pantalon de débroussaillage ', 1),
(11, 'Jambière anti-coupure ', 1),
(12, 'Pantalon de travail', 1),
(13, 'Guêtres', 1),
(22, 'Pantalon anti-coupure ', 4),
(15, 'Ensemble pour travaux de débroussaillage ', 2),
(16, 'Gants cuir hydroléofuge ', 3),
(17, 'Gants cuir avec dos élastique ', 3),
(18, 'Gants de manutention froid ', 3),
(19, 'Gants de débardage ', 3),
(20, 'Gants techniques de bucheronnage ', 3),
(21, 'Gants de protection mécanique ', 3),
(23, 'Pantalon de travail ', 4),
(25, 'Veste de travail non-protégée', 4),
(26, 'Gants en cuir', 4),
(27, 'Veste de pluie ', 5),
(28, 'Masque anti-poussière FFP2', 6),
(29, 'Combinaison jetable ', 6),
(30, 'Cagoule jetable ', 6),
(31, 'Bouchons d\'oreilles', 6),
(32, 'Gillet haute visibilité ', 6),
(33, 'T-shirt rouge', 6),
(34, 'Masque à cartouche ', 6),
(35, 'Veste hiver ', 7),
(36, 'Combinaison de travail ', 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Login`, `password`, `prenom`, `nom`, `email`, `tel`, `idLieuLivraison`, `id_responsable`, `idRole`, `idMetier`, `Agence`, `IdEmployeur`) VALUES
(1, 'John.doe@gmail.doe', '$2y$10$Jn46zxmowvJmkvx6JQCgTuqBgjtZX7PVQwKtXSxaFjTBK4OAtgsQW', 'John', 'Doe', 'john.doe@gmail.doe', '0609090966', 1, 3, 1, 1, 'Colmar', 1),
(2, 'AdminJohnDoe@gmail.doe', '$2y$10$GTMIdo7DAqBv5/jePVEv4.0EK8DqEbYXSwSLLoGsqo6BsC8obnUVm', 'John', 'Doe', 'john.doe@gmail.doe', '0609090966', 1, 3, 4, 2, 'Milhouse', 1),
(3, 'ChefJohn.ChefDoe@gmail.Chef', '$2y$10$L2CkyfVGL0JRIOhCVknQ0uLka5XRZbY5afq0zRTfeq81aVoHH//Za', 'chefJohn', 'chefDoe', 'chefJohn@chefDoe.chef', '0609090666', 1, 3, 2, 3, 'Colmar', 2),
(17, 'test@test.test', '$2y$10$K6Ju207Ig1Ae6jEK1tkcveIh./7waKwuqVk8IsZZ4/UUIpw1aks6m', 'test', 'test', 'test@test.test', '0606060606', 1, 3, 1, 1, 'test', 2),
(20, 'SuperJohn@super.John', '$2y$10$Na5o6ipGj51UWgFEqrjexOZPdjcLKNVMrOk7YoFOavSM.LRsM9YFS', 'Didou', 'John', 'SuperJohn@super.John', '0654589874', 2, 3, 5, 1, 'Mulhouse', NULL),
(21, 'dev', '$2y$10$8p0f5RZSCB06Dlq/Zz/E.ugHO0r.Ztz69gqClzIQOWnOPF3GrNLa2', 'dev', 'dev', 'dev', '0600600606', 1, 3, 1, 1, 'Milhouse', NULL),
(29, 'Johnette@Dobias.com', '$2y$10$k1bFJ0v1h5WTKGHaResL2Od71P/Q84FwFVt6QOi9z6xm7yPXlH4UO', 'Dobias', 'Johnette', 'Johnette@Dobias.com', '0707070707', 1, 3, 3, 3, 'Colmar', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
