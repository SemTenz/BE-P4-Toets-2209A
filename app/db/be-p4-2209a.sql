-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 30 mei 2023 om 10:57
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be-p4-2209a`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `StudentId` int(6) NOT NULL,
  `Rijschool` varchar(40) NOT NULL,
  `Stad` varchar(40) NOT NULL,
  `Rijbewijscategorie` varchar(5) NOT NULL,
  `Datum` date NOT NULL,
  `Uitslag` varchar(30) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  `Opmerkingen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `examen`
--

INSERT INTO `examen` (`Id`, `StudentId`, `Rijschool`, `Stad`, `Rijbewijscategorie`, `Datum`, `Uitslag`, `IsActief`, `DatumAangemaakt`, `DatumGewijzigd`, `Opmerkingen`) VALUES
(1, 100234, 'VolGasVooruit', 'Rotterdam', 'B', '2023-03-04', 'Geslaagd', b'1', '2023-05-30 12:52:36.000000', '2023-05-30 12:52:36.000000', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examenperexaminator`
--

DROP TABLE IF EXISTS `examenperexaminator`;
CREATE TABLE IF NOT EXISTS `examenperexaminator` (
  `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ExamenId` tinyint(3) NOT NULL,
  `ExaminatorId` tinyint(3) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `FK_examenperexaminator_examen_Id` (`ExamenId`),
  UNIQUE KEY `FK_examenperexaminator_examinator_Id` (`ExaminatorId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examinator`
--

DROP TABLE IF EXISTS `examinator`;
CREATE TABLE IF NOT EXISTS `examinator` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(50) NOT NULL,
  `Tussenvoegsel` varchar(10) NOT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Mobiel` varchar(12) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `examinator`
--

INSERT INTO `examinator` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Mobiel`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Manuel', 'van', 'Meekeren', '06-28493823', b'1', NULL, '2023-05-30 12:54:37.000000', '2023-05-30 12:54:37.000000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
