-- --------------------------------------------------------
-- Hôte :                        dz8959rne9lumkkw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com
-- Version du serveur:           5.7.19-log - MySQL Community Server (GPL)
-- SE du serveur:                Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour gv1zux3l9t7ejpgr
CREATE DATABASE IF NOT EXISTS `gv1zux3l9t7ejpgr` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `gv1zux3l9t7ejpgr`;

-- Export de la structure de la table gv1zux3l9t7ejpgr. artiste
CREATE TABLE IF NOT EXISTS `artiste` (
  `idArtiste` varchar(64) NOT NULL,
  `artisteMdp` text NOT NULL,
  `artisteNom` varchar(64) NOT NULL,
  `artistePrenom` varchar(64) NOT NULL,
  `artisteDescription` varchar(500) DEFAULT NULL,
  `artistePhoto1` varchar(255) DEFAULT NULL,
  `nbOeuvre` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gv1zux3l9t7ejpgr.artiste : ~0 rows (environ)
DELETE FROM `artiste`;
/*!40000 ALTER TABLE `artiste` DISABLE KEYS */;
/*!40000 ALTER TABLE `artiste` ENABLE KEYS */;

-- Export de la structure de la table gv1zux3l9t7ejpgr. exposition
CREATE TABLE IF NOT EXISTS `exposition` (
  `idExposition` int(11) NOT NULL AUTO_INCREMENT,
  `expositionName` varchar(64) NOT NULL,
  `expositionLieux` varchar(250) NOT NULL,
  `expositionDate` date NOT NULL,
  `expositionDescription` varchar(500) DEFAULT NULL,
  `idArtiste` varchar(64) NOT NULL,
  PRIMARY KEY (`idExposition`),
  KEY `créer_par` (`idArtiste`),
  CONSTRAINT `créer_par` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gv1zux3l9t7ejpgr.exposition : ~0 rows (environ)
DELETE FROM `exposition`;
/*!40000 ALTER TABLE `exposition` DISABLE KEYS */;
/*!40000 ALTER TABLE `exposition` ENABLE KEYS */;

-- Export de la structure de la table gv1zux3l9t7ejpgr. oeuvre
CREATE TABLE IF NOT EXISTS `oeuvre` (
  `idOeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `oeuvreName` varchar(32) NOT NULL,
  `oeuvreDescription` varchar(255) DEFAULT NULL,
  `oeuvreDateCreation` date DEFAULT NULL,
  `oeuvrePhoto1` varchar(300) DEFAULT NULL,
  `oeuvrePhoto2` varchar(300) DEFAULT NULL,
  `oeuvrePhoto3` varchar(300) DEFAULT NULL,
  `oeuvrePhoto4` varchar(300) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL,
  `idArtiste` varchar(64) NOT NULL,
  PRIMARY KEY (`idOeuvre`),
  KEY `creer_par` (`idArtiste`),
  KEY `est_type` (`idType`),
  CONSTRAINT `creer_par` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `est_type` FOREIGN KEY (`idType`) REFERENCES `typeoeuvre` (`idType`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Export de données de la table gv1zux3l9t7ejpgr.oeuvre : ~0 rows (environ)
DELETE FROM `oeuvre`;
/*!40000 ALTER TABLE `oeuvre` DISABLE KEYS */;
/*!40000 ALTER TABLE `oeuvre` ENABLE KEYS */;

-- Export de la structure de la table gv1zux3l9t7ejpgr. present
CREATE TABLE IF NOT EXISTS `present` (
  `idArtiste` varchar(64) NOT NULL,
  `idExposition` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`,`idExposition`),
  KEY `exposition_presenter` (`idExposition`),
  CONSTRAINT `artiste_present` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE CASCADE,
  CONSTRAINT `exposition_presenter` FOREIGN KEY (`idExposition`) REFERENCES `exposition` (`idExposition`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gv1zux3l9t7ejpgr.present : ~0 rows (environ)
DELETE FROM `present`;
/*!40000 ALTER TABLE `present` DISABLE KEYS */;
/*!40000 ALTER TABLE `present` ENABLE KEYS */;

-- Export de la structure de la table gv1zux3l9t7ejpgr. typeoeuvre
CREATE TABLE IF NOT EXISTS `typeoeuvre` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `typeLibele` varchar(64) NOT NULL,
  `typeDescription` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Export de données de la table gv1zux3l9t7ejpgr.typeoeuvre : ~6 rows (environ)
DELETE FROM `typeoeuvre`;
/*!40000 ALTER TABLE `typeoeuvre` DISABLE KEYS */;
INSERT INTO `typeoeuvre` (`idType`, `typeLibele`, `typeDescription`) VALUES
	(5, 'Terre cuite', 'l’ensemble des objets, fabriqués à partir de terre argileuse, qui ont subi une transformation physico-chimique irréversible au cours d’une cuisson à température élevée.'),
	(6, 'La faïence', 'Apparue dès le 8e siècle au Moyen-Orient. Après le façonnage et séchage, les pièces en faïence sont cuites une première fois entre 800 et 1 050 °C selon le type de faïence : c\'est la cuisson du biscuit. La pièce biscuitée est poreuse, ce qui permet d\'émailler. La pièce subit une dernière cuisson à 980 °C pour fixer l’émail.'),
	(7, 'Produits réfractaires', 'es produits réfractaires, à base d\'argiles réfractaires, de kaolin et de Chamottes, sont faits pour résister à de hautes températures.'),
	(8, 'Le grès', 'Particulièrement résistant, composé d\'une argile à très forte teneur en silice. Cuite une première fois entre 800 et 1 000 °C. la pièce reste poreuse, c\'est le « dégourdi ». Le dégourdi permet d\'émailler facilement grâce à la porosité de la pièce. La deuxième cuisson, à 1 280 °C, permet l\'auto-vitrification de la terre et la fixation de l\'émail'),
	(9, 'La porcelaine', 'Résultat de l\'évolution de la céramique chinoise, produite en Occident à partir du xviiie siècle, à base de kaolin. Elle se caractérise par son exceptionnelle dureté et son aspect translucide.'),
	(10, 'Le raku', 'abréviation du terme japonais raku-yaki 楽焼 (raku-yaki?, lit. « cuisson confortable ») La technique du raku yaki est un procédé de cuisson. Les pièces incandescentes peuvent être enfumées, trempées dans l\'eau, brûlées ou laissées à l\'air libre. Elles subissent un choc thermique important.');
/*!40000 ALTER TABLE `typeoeuvre` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
