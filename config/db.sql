-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Gen 28, 2020 alle 10:51
-- Versione del server: 10.1.38-MariaDB-0+deb9u1
-- Versione PHP: 7.0.33-0+deb9u3

DROP DATABASE IF EXISTS basket;
CREATE DATABASE IF NOT EXISTS basket;
USE basket;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Gironi`
--

CREATE TABLE `Gironi` (
  `Id` int(11) NOT NULL,
  `Descrizione` text NOT NULL,
  `IsMaschile` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Gironi`
--

INSERT INTO `Gironi` (`Id`, `Descrizione`, `IsMaschile`) VALUES
(1, 'Girone A', 1),
(2, 'Girone B', 1),
(3, 'Girone C', 1),
(4, 'Girone D', 1),
(5, 'Girone A', 0),
(6, 'Girone B', 0),
(7, 'Girone C', 0),
(8, 'Girone D', 0),
(10, 'Girone Azzurro', 1),
(11, 'Girone Rosa', 0),
(20, 'Girone Verde', 1),
(21, 'Girone Viola', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Orari`
--

CREATE TABLE `Orari` (
  `Evento` text NOT NULL,
  `Ora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Partite`
--

CREATE TABLE `Partite` (
  `Id` int(11) NOT NULL,
  `Sq_A` int(11) NOT NULL,
  `Sq_B` int(11) NOT NULL,
  `Campo` text NOT NULL,
  `Punti_A` int(11) NOT NULL,
  `Punti_B` int(11) NOT NULL,
  `Ora` datetime DEFAULT NULL,
  `UrlVideo` varchar(500) NOT NULL DEFAULT '<iframe width="966" height="543" src="https://www.youtube.com/embed/AMShoQ_qdc0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  `Idgirone` int(11) NOT NULL,
  `isCosa` varchar(10) NOT NULL DEFAULT 'isGironi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Partite`
--

INSERT INTO `Partite` (`Id`, `Sq_A`, `Sq_B`, `Campo`, `Punti_A`, `Punti_B`, `Ora`, `UrlVideo`, `Idgirone`, `isCosa`) VALUES
(9935, 19, 20, 'Campo1', 20, 21, '2019-06-04 09:30:00', '', 0, 'isGironi'),
(9936, 10, 8, 'Campo1', 20, 21, '2019-06-04 10:00:00', '', 0, 'isGironi'),
(9937, 18, 19, 'Campo1', 11, 18, '2019-06-04 10:30:00', '', 0, 'isGironi'),
(9938, 10, 20, 'Campo1', 21, 15, '2019-06-04 11:00:00', '', 0, 'isGironi'),
(9939, 8, 18, 'Campo1', 21, 7, '2019-06-04 11:30:00', '', 0, 'isGironi'),
(9940, 19, 10, 'Campo1', 4, 21, '2019-06-04 12:00:00', '', 0, 'isGironi'),
(9941, 20, 8, 'Campo1', 21, 20, '2019-06-04 15:00:00', 'https://www.instagram.com/p/BySnc4Lndh4/', 0, 'isGironi'),
(9942, 18, 10, 'Campo1', 7, 21, '2019-06-04 15:30:00', '', 0, 'isGironi'),
(9943, 8, 19, 'Campo1', 22, 11, '2019-06-04 16:00:00', '', 0, 'isGironi'),
(9944, 20, 18, 'Campo1', 21, 6, '2019-06-04 16:30:00', 'https://www.instagram.com/p/BySqWOGHp-X/', 0, 'isGironi'),
(9945, 16, 3, 'Campo1', 21, 9, '2019-06-04 09:45:00', '', 0, 'isGironi'),
(9946, 5, 1, 'Campo1', 21, 2, '2019-06-04 10:15:00', '', 0, 'isGironi'),
(9947, 7, 16, 'Campo1', 16, 21, '2019-06-04 10:45:00', '', 0, 'isGironi'),
(9948, 5, 3, 'Campo1', 21, 5, '2019-06-04 11:15:00', '', 0, 'isGironi'),
(9949, 1, 7, 'Campo1', 12, 14, '2019-06-04 11:45:00', '', 0, 'isGironi'),
(9950, 16, 5, 'Campo1', 15, 21, '2019-06-04 12:15:00', '', 0, 'isGironi'),
(9951, 3, 1, 'Campo1', 13, 20, '2019-06-04 15:15:00', 'https://www.instagram.com/p/BySn7HansfM/', 0, 'isGironi'),
(9952, 7, 5, 'Campo1', 19, 20, '2019-06-04 15:45:00', '', 0, 'isGironi'),
(9953, 1, 16, 'Campo1', 10, 18, '2019-06-04 16:15:00', 'https://www.instagram.com/p/ByS1HfWCfb5/', 0, 'isGironi'),
(9954, 3, 7, 'Campo1', 2, 11, '2019-06-04 16:45:00', 'https://www.instagram.com/p/BySr1CnnSUI/', 0, 'isGironi'),
(9955, 2, 15, 'Campo2', 18, 20, '2019-06-04 09:45:00', '', 0, 'isGironi'),
(9956, 6, 13, 'Campo2', 21, 15, '2019-06-04 10:15:00', '', 0, 'isGironi'),
(9957, 9, 2, 'Campo2', 21, 15, '2019-06-04 10:45:00', '', 0, 'isGironi'),
(9958, 6, 15, 'Campo2', 22, 9, '2019-06-04 11:15:00', '', 0, 'isGironi'),
(9959, 13, 9, 'Campo2', 17, 21, '2019-06-04 11:45:00', '', 0, 'isGironi'),
(9960, 2, 6, 'Campo2', 5, 21, '2019-06-04 12:15:00', '', 0, 'isGironi'),
(9961, 15, 13, 'Campo2', 21, 20, '2019-06-04 15:15:00', '', 0, 'isGironi'),
(9962, 9, 6, 'Campo2', 22, 17, '2019-06-04 15:45:00', '', 0, 'isGironi'),
(9963, 13, 2, 'Campo2', 21, 8, '2019-06-04 16:15:00', '', 0, 'isGironi'),
(9964, 15, 9, 'Campo2', 21, 13, '2019-06-04 16:45:00', '', 0, 'isGironi'),
(9965, 11, 17, 'Campo2', 10, 21, '2019-06-04 09:30:00', 'https://www.instagram.com/p/ByTRZ2SHOp9/', 0, 'isGironi'),
(9966, 4, 12, 'Campo2', 15, 17, '2019-06-04 10:00:00', 'https://www.instagram.com/p/ByTSB46nWKx/', 0, 'isGironi'),
(9967, 14, 11, 'Campo2', 19, 13, '2019-06-04 10:30:00', '', 0, 'isGironi'),
(9968, 4, 17, 'Campo2', 11, 21, '2019-06-04 11:00:00', '', 0, 'isGironi'),
(9969, 12, 14, 'Campo2', 17, 17, '2019-06-04 11:30:00', '', 0, 'isGironi'),
(9970, 11, 4, 'Campo2', 21, 15, '2019-06-04 12:00:00', '', 0, 'isGironi'),
(9971, 17, 12, 'Campo2', 21, 12, '2019-06-04 15:00:00', '', 0, 'isGironi'),
(9972, 14, 4, 'Campo2', 11, 19, '2019-06-04 15:30:00', '', 0, 'isGironi'),
(9973, 12, 11, 'Campo2', 21, 14, '2019-06-04 16:00:00', '', 0, 'isGironi'),
(9974, 17, 14, 'Campo2', 21, 14, '2019-06-04 16:30:00', '', 0, 'isGironi'),
(9975, 101, 119, 'Campo 3', 11, 22, '2019-06-04 09:30:00', '', 0, 'isGironi'),
(9976, 109, 110, 'Campo 3', 18, 22, '2019-06-04 10:00:00', '', 0, 'isGironi'),
(9977, 111, 101, 'Campo 3', 21, 10, '2019-06-04 10:30:00', 'https://www.instagram.com/p/ByTS2pCn3Vq/', 0, 'isGironi'),
(9978, 114, 102, 'Campo 4', 22, 14, '2019-06-04 09:45:00', 'https://www.instagram.com/p/ByTVsHrHNrN/', 0, 'isGironi'),
(9979, 112, 117, 'Campo 4', 22, 9, '2019-06-04 10:15:00', 'https://www.instagram.com/p/ByTV_kiHkoB/', 0, 'isGironi'),
(9980, 117, 102, 'Campo 4', 21, 16, '2019-06-04 11:15:00', 'https://www.instagram.com/p/ByTWY3SnP9d/', 0, 'isGironi'),
(9981, 109, 119, 'Campo 3', 13, 21, '2019-06-04 11:00:00', 'https://www.instagram.com/p/ByTTZL5nnrc/', 0, 'isGironi'),
(9982, 112, 114, 'Campo 4', 17, 21, '2019-06-04 11:45:00', 'https://www.instagram.com/p/ByTWhFiHFWl/', 0, 'isGironi'),
(9983, 110, 111, 'Campo 3', 4, 22, '2019-06-04 11:30:00', '', 0, 'isGironi'),
(9984, 112, 102, 'Campo 4', 22, 6, '2019-06-04 15:15:00', 'https://www.instagram.com/p/ByTWuwAHhD6/', 0, 'isGironi'),
(9986, 117, 114, 'Campo 4', 16, 22, '2019-06-04 15:45:00', '', 0, 'isGironi'),
(9987, 119, 110, 'Campo 3', 22, 12, '2019-06-04 15:00:00', '', 0, 'isGironi'),
(9988, 111, 109, 'Campo 3', 21, 9, '2019-06-04 15:30:00', 'https://www.instagram.com/p/ByS3UWfHFHT/', 0, 'isGironi'),
(9989, 105, 106, 'Campo 3', 14, 22, '2019-06-04 09:45:00', '', 0, 'isGironi'),
(9990, 110, 101, 'Campo 3', 19, 17, '2019-06-04 16:00:00', 'https://www.instagram.com/p/ByS3hIvnoaN/', 0, 'isGironi'),
(9991, 119, 111, 'Campo 3', 20, 14, '2019-06-04 16:30:00', 'https://www.instagram.com/p/ByS3-WpHyep/', 0, 'isGironi'),
(9992, 103, 104, 'Campo 4', 4, 21, '2019-06-04 09:30:00', 'https://www.instagram.com/p/ByTVfYtnzeu/', 0, 'isGironi'),
(9993, 115, 113, 'Campo 4', 17, 19, '2019-06-04 10:00:00', 'https://www.instagram.com/p/ByTV25bnhkh/', 0, 'isGironi'),
(9994, 116, 103, 'Campo 4', 21, 7, '2019-06-04 10:30:00', 'https://www.instagram.com/p/ByTWIZdncSJ/', 0, 'isGironi'),
(9995, 115, 104, 'Campo 4', 9, 14, '2019-06-04 11:00:00', 'https://www.instagram.com/p/ByTWRG8HbKp/', 0, 'isGironi'),
(9996, 113, 116, 'Campo 4', 20, 9, '2019-06-04 11:30:00', '', 0, 'isGironi'),
(9997, 107, 108, 'Campo 3', 21, 9, '2019-06-04 10:15:00', 'https://www.instagram.com/p/ByTSXNfn-f_/', 0, 'isGironi'),
(9998, 118, 105, 'Campo 3', 11, 21, '2019-06-04 10:45:00', '', 0, 'isGironi'),
(9999, 103, 115, 'Campo 4', 12, 13, '2019-06-04 12:00:00', 'https://www.instagram.com/p/ByTWo_rn_yn/', 0, 'isGironi'),
(10006, 104, 113, 'Campo 4', 9, 19, '2019-06-04 15:00:00', 'https://www.instagram.com/p/BySzx8anNlL', 0, 'isGironi'),
(10007, 116, 115, 'Campo 4', 14, 22, '2019-06-04 15:30:00', 'https://www.instagram.com/p/ByTW5juHd4N/', 0, 'isGironi'),
(10008, 107, 106, 'Campo 3', 14, 10, '2019-06-04 11:15:00', '', 0, 'isGironi'),
(10009, 113, 103, 'Campo 4', 21, 9, '2019-06-04 16:00:00', 'https://www.instagram.com/p/ByTW_OMHdzz/', 0, 'isGironi'),
(10010, 108, 118, 'Campo 3', 21, 12, '2019-06-04 11:45:00', '', 0, 'isGironi'),
(10011, 104, 116, 'Campo 4', 22, 6, '2019-06-04 16:30:00', '', 0, 'isGironi'),
(10012, 105, 107, 'Campo 3', 12, 22, '2019-06-04 12:15:00', 'https://www.instagram.com/p/ByS5FUjHxGQ/', 0, 'isGironi'),
(10013, 106, 108, 'Campo 3', 13, 11, '2019-06-04 15:15:00', '', 0, 'isGironi'),
(10014, 118, 107, 'Campo 3', 6, 22, '2019-06-04 15:45:00', '', 0, 'isGironi'),
(10015, 108, 105, 'Campo 3', 18, 20, '2019-06-04 16:15:00', '', 0, 'isGironi'),
(10016, 106, 118, 'Campo 3', 22, 4, '2019-06-04 16:45:00', '', 0, 'isGironi'),
(10022, 101, 109, 'Campo 3', 16, 21, '2019-06-04 12:00:00', '', 0, 'isGironi'),
(10024, 107, 112, 'Campo 3', 0, 0, '2019-06-05 09:45:00', '', 0, 'isQuarti'),
(10025, 112, 104, 'Campo 3', 0, 0, '2019-06-05 10:00:00', '', 0, 'isQuarti'),
(10026, 107, 119, 'Campo 3', 0, 0, '2019-06-05 10:15:00', '', 0, 'isQuarti'),
(10027, 119, 104, 'Campo 3', 0, 0, '2019-06-05 09:30:00', '', 0, 'isQuarti'),
(10028, 107, 104, 'Campo 3', 0, 0, '2019-06-05 10:30:00', '', 0, 'isQuarti'),
(10029, 112, 119, 'Campo 3', 0, 0, '2019-06-05 10:45:00', '', 0, 'isQuarti'),
(10030, 113, 111, 'Campo 4', 0, 0, '2019-06-05 09:30:00', '', 0, 'isQuarti'),
(10031, 114, 106, 'Campo 4', 0, 0, '2019-06-05 09:45:00', '', 0, 'isQuarti'),
(10032, 106, 111, 'Campo 4', 0, 0, '2019-06-05 10:00:00', '', 0, 'isQuarti'),
(10033, 114, 113, 'Campo 4', 0, 0, '2019-06-05 10:15:00', '', 0, 'isQuarti'),
(10034, 114, 111, 'Campo 4', 0, 0, '2019-06-05 10:30:00', '', 0, 'isQuarti'),
(10035, 106, 113, 'Campo 4', 0, 0, '2019-06-05 10:45:00', '', 0, 'isQuarti'),
(10036, 10, 12, 'Campo 1', 0, 0, '2019-06-05 09:30:00', '', 0, 'isQuarti'),
(10037, 5, 9, 'Campo 1', 0, 0, '2019-06-05 09:45:00', '', 0, 'isQuarti'),
(10038, 9, 12, 'Campo 1', 0, 0, '2019-06-05 10:00:00', '', 0, 'isQuarti'),
(10039, 5, 10, 'Campo 1', 0, 0, '2019-06-05 10:15:00', '', 0, 'isQuarti'),
(10040, 5, 12, 'Campo 1', 0, 0, '2019-06-05 10:30:00', '', 0, 'isQuarti'),
(10041, 9, 10, 'Campo1', 0, 0, '2019-06-05 10:45:00', '', 0, 'isQuarti'),
(10042, 17, 8, 'Campo 2', 0, 0, '2019-06-05 09:30:00', '', 0, 'isQuarti'),
(10043, 6, 16, 'Campo 2', 0, 0, '2019-06-05 09:45:00', '', 0, 'isQuarti'),
(10044, 16, 8, 'Campo 2', 0, 0, '2019-06-05 10:00:00', '', 0, 'isQuarti'),
(10045, 6, 17, 'Campo 2', 0, 0, '2019-06-05 10:15:00', '', 0, 'isQuarti'),
(10046, 6, 8, 'Campo 2', 0, 0, '2019-06-05 10:30:00', '', 0, 'isQuarti'),
(10047, 16, 17, 'Campo 2', 0, 0, '2019-06-05 10:45:00', '', 0, 'isQuarti');

-- --------------------------------------------------------

--
-- Struttura della tabella `Quarti`
--

CREATE TABLE `Quarti` (
  `Id` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Regione` text NOT NULL,
  `Idgirone` int(11) NOT NULL DEFAULT '1',
  `IsMaschile` tinyint(1) NOT NULL,
  `UrlSito` text NOT NULL,
  `Punti` int(11) NOT NULL DEFAULT '0',
  `UrlVideo` varchar(250) NOT NULL DEFAULT 'https://www.youtube.com/watch?v=Yw6u6YkTgQ4',
  `Descrizione` longtext NOT NULL,
  `Puntifatti` int(11) NOT NULL DEFAULT '0',
  `Puntisubiti` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Squadre`
--

CREATE TABLE `Squadre` (
  `Id` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Regione` text NOT NULL,
  `LogoRegione` varchar(300) NOT NULL DEFAULT '<iframe width="1206" height="603" src="https://www.youtube.com/embed/Yw6u6YkTgQ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  `Idgirone` int(11) NOT NULL DEFAULT '1',
  `IdgironeQ` int(11) NOT NULL,
  `IdgironeS` int(11) NOT NULL,
  `IsMaschile` tinyint(1) NOT NULL,
  `UrlSito` text NOT NULL,
  `Punti` int(11) NOT NULL DEFAULT '0',
  `PuntiQ` int(11) NOT NULL DEFAULT '0',
  `UrlVideo` varchar(250) NOT NULL DEFAULT '<iframe width="1280" height="720" src="https://www.youtube.com/embed/8tZ5ByNWbak" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  `Descrizione` longtext NOT NULL,
  `Puntifatti` int(11) NOT NULL DEFAULT '0',
  `Puntisubiti` int(11) NOT NULL DEFAULT '0',
  `PuntifattiQ` int(11) NOT NULL DEFAULT '0',
  `PuntisubitiQ` int(11) NOT NULL DEFAULT '0',
  `Posizione` int(11) NOT NULL DEFAULT '0',
  `Tiri3Shot` text NOT NULL,
  `Tempo3Shot` double NOT NULL,
  `Nome_3S` text NOT NULL,
  `TiriTorneo` text NOT NULL,
  `TempoTorneo` double NOT NULL,
  `Nome_Torneo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Squadre`
--

INSERT INTO `Squadre` (`Id`, `Nome`, `Regione`, `LogoRegione`, `Idgirone`, `IdgironeQ`, `IdgironeS`, `IsMaschile`, `UrlSito`, `Punti`, `PuntiQ`, `UrlVideo`, `Descrizione`, `Puntifatti`, `Puntisubiti`, `PuntifattiQ`, `PuntisubitiQ`, `Posizione`, `Tiri3Shot`, `Tempo3Shot`, `Nome_3S`, `TiriTorneo`, `TempoTorneo`, `Nome_Torneo`) VALUES
(1, 'LS GALILEI', 'Abruzzo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Regione-Abruzzo-Stemma.svg/800px-Regione-Abruzzo-Stemma.svg.png', 3, 0, 0, 1, 'http://galileipescara.it/', 6, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/20nUf-wip0M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 44, 66, 0, 0, 0, 'a:10:{i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"0\";i:10;s:1:\"0\";}', 27.1, 'Andrea Donofrio', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"5\";}', 0, 'Tommaso Leone, Enrico del Principe'),
(2, 'ITC LOPERFIDO OLIVETTI', 'Basilicata', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Regione-Basilicata-Stemma.svg/80px-Regione-Basilicata-Stemma.svg.png', 4, 0, 0, 1, 'http://www.loperfido-olivetti.gov.it/', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/ZEntcUigkHI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 46, 83, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"0\";i:10;s:1:\"0\";}', 39.9, 'Francesco De Mola', 'a:7:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"5\";i:6;s:1:\"5\";}', 0, 'Francesco De Mola, Pasquale Casareale'),
(3, 'IIS FERMI', 'Calabria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Coat_of_arms_of_Calabria.svg/80px-Coat_of_arms_of_Calabria.svg.png', 3, 0, 0, 1, 'http://www.iisfermi.edu.it', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/nzb8HGrLvew\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 29, 73, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"1\";}', 35.46, 'Raffaele Corapi', '', 0, ''),
(4, 'LS PITAGORA CROCE', 'Campania', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Regione-Campania-Stemma.svg/80px-Regione-Campania-Stemma.svg.png', 2, 0, 0, 1, 'https://liceopitagoracroce.edu.it/', 3, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/ceLFN4Mv9gI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 60, 70, 0, 0, 0, '', 0, '', '', 0, ''),
(5, 'LS ROITI', 'Emilia Romagna', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Regione-Emilia-Romagna-Stemma.svg/80px-Regione-Emilia-Romagna-Stemma.svg.png', 3, 10, 0, 1, 'https://www.liceoroiti.gov.it/pvw/app/FELS0001/pvw_sito.php?sede_codice=FELS0001', 12, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/TFkr3Y7rj0U\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 83, 41, 0, 0, 0, '', 0, '', '', 0, ''),
(6, 'LS OBERDAN', 'Friuli Venezia Giulia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/CoA_of_Friuli-Venezia_Giulia.png/80px-CoA_of_Friuli-Venezia_Giulia.png', 4, 20, 0, 1, 'http://www.liceo-oberdan.edu.it/pvw/app/TSLS0002/pvw_sito.php', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/5GDacLg3pgI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 81, 51, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"1\";}', 33.2, 'Matteo Finati', 'a:11:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"2\";i:6;s:1:\"3\";i:7;s:1:\"4\";i:8;s:1:\"5\";i:9;s:1:\"5\";i:10;s:1:\"5\";}', 0, 'Stefano Longo, Tommaso Eva'),
(7, 'LS JUCCI', 'Lazio', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Lazio_Coat_of_Arms.svg/80px-Lazio_Coat_of_Arms.svg.png', 3, 0, 0, 1, 'http://www.liceocarlojucci.it/', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/xaN6M-G4lKM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 60, 55, 0, 0, 0, 'a:10:{i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"0\";i:10;s:1:\"0\";}', 30.5, 'Maria Nacchia Valeri', '', 0, ''),
(8, 'ISS PARENTUCCI', 'Liguria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Coat_of_arms_of_Liguria.svg/80px-Coat_of_arms_of_Liguria.svg.png', 1, 20, 0, 1, 'http://www.parentucelli-arzela.edu.it/', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/LFIhUt2789w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 84, 59, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"0\";i:10;s:1:\"1\";}', 40.8, 'Matteo Sacchelli', 'a:10:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"3\";i:5;s:1:\"3\";i:6;s:1:\"4\";i:7;s:1:\"4\";i:8;s:1:\"5\";i:9;s:1:\"5\";}', 0, 'Davide Mezzani, Matteo Sacchelli'),
(9, 'LS FERRARIS', 'Lombardia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Flag_of_Lombardy_square.svg/800px-Flag_of_Lombardy_square.svg.png', 4, 10, 0, 1, 'https://www.liceoferrarisvarese.edu.it/', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/pCknyHtTU6o\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 77, 70, 0, 0, 0, '', 0, '', '', 0, ''),
(10, 'LS MARCONI', 'Marche', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Coat_of_arms_of_Marche.svg/800px-Coat_of_arms_of_Marche.svg.png', 1, 10, 0, 1, 'https://liceogmarconi.edu.it/pvw/app/PSLS0001/pvw_sito.php', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/oRgOhT5arDM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 83, 47, 0, 0, 0, '', 0, '', '', 0, ''),
(11, 'IIS PERTINI MONTINI', 'Molise', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Regione-Molise-Stemma.svg/80px-Regione-Molise-Stemma.svg.png', 2, 0, 0, 1, 'http://itaspertini.gov.it/listituto/', 3, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/35cAlarMtEA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 58, 76, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"0\";i:10;s:1:\"1\";}', 34.44, 'Emiliano Esposito', '', 0, ''),
(12, 'IS SOBRERO', 'Piemonte', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Regione-Piemonte-Stemma.svg/80px-Regione-Piemonte-Stemma.svg.png', 2, 10, 0, 1, 'https://www.sobrero.edu.it/', 10, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/Fqg3PbQSpcY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 67, 67, 0, 0, 0, '', 0, '', '', 0, ''),
(13, 'LS FERMI MONTICELLI', 'Puglia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Coat_of_Arms_of_Apulia.svg/75px-Coat_of_Arms_of_Apulia.svg.png', 4, 0, 0, 1, 'http://weareschool.fermiliceobrindisi.it/', 3, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/28s4zy4H5lw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 73, 71, 0, 0, 0, 'a:10:{i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"0\";i:10;s:1:\"0\";}', 37.6, 'Emanuele Marzo', 'a:6:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";i:3;s:1:\"5\";i:4;s:1:\"5\";i:5;s:1:\"5\";}', 0, 'Alessandro Epifania, Matteo Carone'),
(14, 'LS SPANO', 'Sardegna', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Sardegna-Stemma.svg/800px-Sardegna-Stemma.svg.png', 2, 0, 0, 1, 'https://www.liceospano.edu.it/index.php', 4, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/bKB3Cq35Jzw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 61, 70, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"0\";}', 35.41, 'Matteo Cabizza', '', 0, ''),
(15, 'IIS BORGHESE FARANDA', 'Sicilia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Coat_of_arms_of_Sicily.svg/80px-Coat_of_arms_of_Sicily.svg.png', 4, 0, 0, 1, 'http://www.itborghesepatti.edu.it/', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/im6Sr-nv7zM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 71, 73, 0, 0, 0, '', 0, '', '', 0, ''),
(16, 'IIS BENEDETTO VARCHI', 'Toscana', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Coat_of_arms_of_Tuscany.svg/80px-Coat_of_arms_of_Tuscany.svg.png', 3, 20, 0, 1, 'http://www.isisvarchi.gov.it/', 12, 0, '<iframe width=\"966\" height=\"543\" src=\"https://www.youtube.com/embed/8ON6giFcI1A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 75, 56, 0, 0, 0, 'a:10:{i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"1\";}', 34.13, 'Piergiorgio Mascherini', '', 0, ''),
(17, 'IIS FONTANA', 'Trentino-Alto Adige', 'https://upload.wikimedia.org/wikipedia/it/thumb/1/14/Stemma_Trentino_-_S%C3%BCdtirol.svg/80px-Stemma_Trentino_-_S%C3%BCdtirol.svg.png', 2, 20, 0, 1, 'http://www.fgfontana.eu/', 15, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/0Jz7fXjdNVY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 84, 47, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"0\";i:10;s:1:\"1\";}', 55.22, 'Igor Sovanovic', '', 0, ''),
(18, 'LS GALILEI', 'Umbria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Regione-Umbria-Stemma.svg/800px-Regione-Umbria-Stemma.svg.png', 1, 0, 0, 1, 'https://www.galileiterni.gov.it/', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/kiZbruZc1Fw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 31, 81, 0, 0, 0, '', 0, '', '', 0, ''),
(19, 'IIS INNOCENT MANZETTI', 'Valle d\'Aosta', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Valle_d%27Aosta-Stemma.svg/116px-Valle_d%27Aosta-Stemma.svg.png', 1, 0, 0, 1, 'http://www.imanzetti.scuole.vda.it/', 3, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/xELVUiSm2xU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 53, 75, 0, 0, 0, '', 0, '', '', 0, ''),
(20, 'IIS LEVI', 'Veneto', 'https://upload.wikimedia.org/wikipedia/commons/c/cd/Coat_of_Arms_of_Veneto.png', 1, 0, 0, 1, 'http://www.iisprimolevi.gov.it/', 15, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/M1vShOaL34w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 78, 67, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"1\";}', 35.32, 'Giordano Durante', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', 0, 'Nicolò Borga, Filippo Cadorin'),
(101, 'LS D\'ANNUNZIO', 'Abruzzo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Regione-Abruzzo-Stemma.svg/80px-Regione-Abruzzo-Stemma.svg.png', 5, 0, 0, 0, 'http://www.liceoclassicope.edu.it/', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/20nUf-wip0M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 54, 83, 0, 0, 0, ' ', 0, ' ', ' ', 0, ' '),
(102, 'LS VOLTA', 'Calabria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Coat_of_arms_of_Calabria.svg/80px-Coat_of_arms_of_Calabria.svg.png', 8, 0, 0, 0, 'http://www.lsvolta.it/', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/nzb8HGrLvew\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 36, 65, 0, 0, 0, '', 0, '', '', 0, '0'),
(103, 'IIS LIVATINO', 'Campania', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Regione-Campania-Stemma.svg/80px-Regione-Campania-Stemma.svg.png', 6, 0, 0, 0, 'http://www.isisrosariolivatino.edu.it/', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/ceLFN4Mv9gI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 32, 76, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"0\";}', 42.57, 'Siria Delisio', '', 0, '0'),
(104, 'LS MORGAGNI', 'Emilia Romagna', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Regione-Emilia-Romagna-Stemma.svg/80px-Regione-Emilia-Romagna-Stemma.svg.png', 6, 11, 0, 0, 'https://www.morgagni.cloud/', 15, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/TFkr3Y7rj0U\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 66, 38, 0, 0, 0, '', 0, '', '', 0, '0'),
(105, 'LS OBERDAN', 'Friuli Venezia Giulia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/CoA_of_Friuli-Venezia_Giulia.png/80px-CoA_of_Friuli-Venezia_Giulia.png', 7, 0, 0, 0, 'http://www.liceo-oberdan.edu.it/pvw/app/TSLS0002/pvw_sito.php', 6, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/5GDacLg3pgI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 67, 73, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"0\";i:10;s:1:\"0\";}', 37.53, 'Clara Rosini', 'a:10:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"3\";i:5;s:1:\"3\";i:6;s:1:\"4\";i:7;s:1:\"4\";i:8;s:1:\"5\";i:9;s:1:\"5\";}', 0, 'Alessia Santoro, Elena Streri'),
(106, 'IIS SALVINI', 'Lazio', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Lazio_Coat_of_Arms.svg/80px-Lazio_Coat_of_Arms.svg.png', 7, 21, 0, 0, 'https://www.iistommasosalvini.gov.it/', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/xaN6M-G4lKM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 67, 43, 0, 0, 0, '', 0, '', '', 0, '0'),
(107, 'LS PACINOTTI', 'Liguria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Coat_of_arms_of_Liguria.svg/80px-Coat_of_arms_of_Liguria.svg.png', 7, 11, 0, 0, 'https://www.liceopacinotti.edu.it/', 18, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/LFIhUt2789w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 79, 37, 0, 0, 0, '', 0, '', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"3\";i:5;s:1:\"4\";}', 0, 'Vittoria Strata, Diletta Mangano'),
(108, 'LS CAVALLERI', 'Lombardia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Flag_of_Lombardy_square.svg/800px-Flag_of_Lombardy_square.svg.png', 7, 0, 0, 0, 'http://www.liceocavalleri.edu.it/', 3, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/pCknyHtTU6o\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 59, 66, 0, 0, 0, '', 0, '', '', 0, '0'),
(109, 'LS MARCONI', 'Marche', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Coat_of_arms_of_Marche.svg/800px-Coat_of_arms_of_Marche.svg.png', 5, 0, 0, 0, 'https://liceogmarconi.edu.it/pvw/app/PSLS0001/pvw_sito.php', 3, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/oRgOhT5arDM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 61, 80, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"0\";i:10;s:1:\"1\";}', 30, 'Federica Canossini', 'a:6:{i:0;s:1:\"3\";i:1;s:1:\"3\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"4\";i:5;s:0:\"\";}', 0, 'Giorgia Ugolini, Elisa Cecchini'),
(110, 'LS ROMITA', 'Molise', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Regione-Molise-Stemma.svg/80px-Regione-Molise-Stemma.svg.png', 5, 0, 0, 0, 'https://www.liceoscientificoromita.cb.it/', 9, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/35cAlarMtEA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 57, 79, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"1\";}', 35.84, 'Alessandra Farbo', '', 0, ''),
(111, 'LS PEANO', 'Piemonte', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Regione-Piemonte-Stemma.svg/80px-Regione-Piemonte-Stemma.svg.png', 5, 21, 0, 0, 'http://www.liceopeano.it/pvw/app/ALLS0006/pvw_sito.php', 15, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/Fqg3PbQSpcY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 78, 43, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"0\";}', 30.97, 'Matilde Repetto', '', 0, ''),
(112, 'LS FERMI MONTICELLI', 'Puglia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Coat_of_Arms_of_Apulia.svg/75px-Coat_of_Arms_of_Apulia.svg.png', 8, 11, 0, 0, 'http://weareschool.fermiliceobrindisi.it/', 12, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/28s4zy4H5lw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 61, 36, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"1\";i:6;s:1:\"0\";i:7;s:1:\"0\";i:8;s:1:\"0\";i:9;s:1:\"1\";i:10;s:1:\"0\";}', 34.53, 'Angelica Stabile', '', 0, '0'),
(113, 'LS PACINOTTI', 'Sardegna', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Sardegna-Stemma.svg/800px-Sardegna-Stemma.svg.png', 6, 21, 0, 0, 'https://pacinotti.edu.it/', 24, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/bKB3Cq35Jzw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 79, 44, 0, 0, 0, '', 0, '', '', 0, '0'),
(114, 'LS FERMI', 'Sicilia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Coat_of_arms_of_Sicily.svg/80px-Coat_of_arms_of_Sicily.svg.png', 8, 21, 0, 0, 'http://www.liceofermirg.gov.it/', 15, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/im6Sr-nv7zM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 65, 47, 0, 0, 0, '', 0, '', '', 0, '0'),
(115, 'LS GIOVANNI DA S.GIOVANNI', 'Toscana', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Coat_of_arms_of_Tuscany.svg/80px-Coat_of_arms_of_Tuscany.svg.png', 6, 0, 0, 0, 'http://www.liceisgv.gov.it/', 12, 0, '<iframe width=\"966\" height=\"543\" src=\"https://www.youtube.com/embed/8ON6giFcI1A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 61, 59, 0, 0, 0, '', 0, '', '', 0, '0'),
(116, 'LS PASCOLI', 'Trentino-Alto Adige', 'https://upload.wikimedia.org/wikipedia/it/thumb/1/14/Stemma_Trentino_-_S%C3%BCdtirol.svg/80px-Stemma_Trentino_-_S%C3%BCdtirol.svg.png', 6, 0, 0, 0, 'http://www.liceopascolibz.it/index.php/it/', 6, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/0Jz7fXjdNVY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 50, 71, 0, 0, 0, '', 0, '', '', 0, '0'),
(117, 'LS GALILEI', 'Umbria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Regione-Umbria-Stemma.svg/800px-Regione-Umbria-Stemma.svg.png', 8, 0, 0, 0, 'http://www.galileipg.gov.it/pvw/app/PGLS0002/pvw_sito.php', 6, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/kiZbruZc1Fw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 46, 60, 0, 0, 0, '', 0, '', '', 0, '0'),
(118, 'ITPR GEX', 'Valle d\'Aosta', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Valle_d%27Aosta-Stemma.svg/116px-Valle_d%27Aosta-Stemma.svg.png', 7, 0, 0, 0, 'http://www.itpr.vda.it/2012/', 0, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/xELVUiSm2xU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 33, 86, 0, 0, 0, '', 0, '', '', 0, '0'),
(119, 'LS TRON', 'Veneto', 'https://upload.wikimedia.org/wikipedia/commons/c/cd/Coat_of_Arms_of_Veneto.png', 5, 11, 0, 0, 'https://www.tron.gov.it/it/', 18, 0, '<iframe width=\"1206\" height=\"678\" src=\"https://www.youtube.com/embed/M1vShOaL34w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 85, 50, 0, 0, 0, 'a:10:{i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"1\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"0\";i:9;s:1:\"0\";i:10;s:1:\"1\";}', 35.37, 'Matilde Sartore', '', 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `SquadreOld`
--

CREATE TABLE `SquadreOld` (
  `Id` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Regione` text NOT NULL,
  `LogoRegione` varchar(300) NOT NULL DEFAULT '<iframe width="1206" height="603" src="https://www.youtube.com/embed/Yw6u6YkTgQ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  `Idgirone` int(11) NOT NULL DEFAULT '1',
  `IdgironeQ` int(11) NOT NULL,
  `IdgironeS` int(11) NOT NULL,
  `IsMaschile` tinyint(1) NOT NULL,
  `UrlSito` text NOT NULL,
  `Punti` int(11) NOT NULL DEFAULT '0',
  `PuntiQ` int(11) NOT NULL DEFAULT '0',
  `UrlVideo` varchar(250) NOT NULL DEFAULT 'https://www.youtube.com/watch?v=Yw6u6YkTgQ4',
  `Descrizione` longtext NOT NULL,
  `Puntifatti` int(11) NOT NULL DEFAULT '0',
  `Puntisubiti` int(11) NOT NULL DEFAULT '0',
  `PuntifattiQ` int(11) NOT NULL DEFAULT '0',
  `PuntisubitiQ` int(11) NOT NULL DEFAULT '0',
  `Posizione` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `SquadreOld`
--

INSERT INTO `SquadreOld` (`Id`, `Nome`, `Regione`, `LogoRegione`, `Idgirone`, `IdgironeQ`, `IdgironeS`, `IsMaschile`, `UrlSito`, `Punti`, `PuntiQ`, `UrlVideo`, `Descrizione`, `Puntifatti`, `Puntisubiti`, `PuntifattiQ`, `PuntisubitiQ`, `Posizione`) VALUES
(1, 'Juve', 'Torino', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 90, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(2, 'Napoli', 'Vesuvio', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 6, 0, 0, 1, '', 79, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(3, 'Atalanta', 'fds', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 69, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(4, 'Inter', 'fdfgf', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 69, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(5, 'Milan', 'dfskln', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 68, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(6, 'Roma', 'fdskj', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 66, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(7, 'Torino', 'fdsfgg', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 63, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(8, 'Lazio', 'fdsree', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 59, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(9, 'Sampdoria', 'samp', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 53, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(10, 'Bologna', 'bolo', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 44, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(11, 'Sassuolo', 'sass', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 43, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(12, 'Udinese', 'udine', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 1, '', 43, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(13, 'Spal', 'spal', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 42, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(14, 'Parma', 'parma', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 41, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(15, 'Cagliari', 'cagliari', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 41, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(16, 'Fiorentina', 'fiorentina', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 41, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(17, 'Genoa', 'genoa', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 38, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(18, 'Empoli', 'emnpoli', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 38, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(19, 'Frosinone', 'frosi', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 25, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(20, 'Chievo', 'chievo', 'https://www.regione.veneto.it/image/image_gallery?uuid=92e94a10-2851-4453-8a5b-0651cbfb6ef4&groupId=10733&t=1354533590569', 1, 0, 0, 0, '', 17, 0, '<iframe width=\"1206\" height=\"603\" src=\"https://www.youtube.com/embed/Yw6u6YkTgQ4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 0, 0, 0, 0, 0),
(9046, 'Nome', 'Regione', 'LogoRegione', 0, 0, 0, 0, 'UrlSito', 0, 0, 'UrlVideo', 'Descrizione', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `TerrenoDiGioco`
--

CREATE TABLE `TerrenoDiGioco` (
  `IdTDG` int(11) NOT NULL,
  `NomeTDG` text NOT NULL,
  `Location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Gironi`
--
ALTER TABLE `Gironi`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indici per le tabelle `Partite`
--
ALTER TABLE `Partite`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indici per le tabelle `Quarti`
--
ALTER TABLE `Quarti`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indici per le tabelle `Squadre`
--
ALTER TABLE `Squadre`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indici per le tabelle `SquadreOld`
--
ALTER TABLE `SquadreOld`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indici per le tabelle `TerrenoDiGioco`
--
ALTER TABLE `TerrenoDiGioco`
  ADD PRIMARY KEY (`IdTDG`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Partite`
--
ALTER TABLE `Partite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10048;
--
-- AUTO_INCREMENT per la tabella `Quarti`
--
ALTER TABLE `Quarti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `Squadre`
--
ALTER TABLE `Squadre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT per la tabella `SquadreOld`
--
ALTER TABLE `SquadreOld`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9047;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
