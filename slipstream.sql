-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 alle 13:04
-- Versione del server: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slipstream`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `targa` varchar(7) NOT NULL,
  `modello` varchar(30) NOT NULL,
  `potenza` int(30) NOT NULL,
  `coppia` int(30) NOT NULL,
  `freni` int(51) NOT NULL,
  `cilindrata` int(30) NOT NULL,
  `colore` varchar(30) NOT NULL,
  `manutenzione` varchar(51) NOT NULL,
  `pista` varchar(30) NOT NULL,
  `motore` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `passo` varchar(30) NOT NULL,
  PRIMARY KEY (`targa`),
  KEY `pista` (`pista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`targa`, `modello`, `potenza`, `coppia`, `freni`, `cilindrata`, `colore`, `manutenzione`, `pista`, `motore`, `peso`, `passo`) VALUES
('EE000HG', 'mclaren 720s', 717, 770, 35, 3994, 'arancione', 'true', 'Autodromo Nazionale Di Monza', 'V8', '1419', '2670 mm'),
('EH784BG', 'Aston Martin Vulcan Amr Pro', 831, 780, 30, 7000, 'verde chiaro', 'true', 'Autodromo Enzo e Dino Ferrari', 'V12', '1350', '4500 mm'),
('EP865CP', 'ferrari 488', 670, 760, 31, 3902, 'rosso', 'true', 'Autodromo Internazionale Del M', 'V8', '1385', '2650 mm'),
('EW977KL', 'porsche GT3 RS', 490, 470, 26, 3996, 'nero', 'false', 'Autodromo Internazionale Del M', '6 cilindri', '1430', '2457 mm'),
('EZ769TG', 'Audi RS2', 311, 410, 39, 2200, 'nero e rosso', 'false', 'Autodromo Enzo e Dino Ferrari', '5 cilindri', '1595', '2597 mm'),
('FA488NT', 'Lotus Evora GT', 416, 420, 37, 3500, 'arancione', 'true', 'Autodromo Internazionale Del M', '6 cilindri', '1248', '2580 mm'),
('FC59ODA', 'mclaren 570gt', 570, 630, 29, 3799, 'grigio', 'true', 'Autodromo Internazionale Del M', 'V8', '1495', '2670 mm'),
('FF462GS', 'mercedes amg gt-r', 585, 550, 37, 3982, 'grigio', 'false', 'Autodromo Vallelunga', 'V8', '1650', '2630 mm'),
('FH888LY', 'pagani huayra', 730, 1000, 37, 5980, 'grigio', 'true', 'Autodromo Enzo e Dino Ferrari', 'V12', '1350', '2800 mm'),
('FI119MM', 'chevrolet corvette', 495, 470, 37, 6162, 'marrone', 'true', 'Autodromo Vallelunga', 'V8', '1592', '4630 mm'),
('FJ558PD', 'Nissan ZGT 500', 570, 637, 29, 4000, 'grigio', 'false', 'Autodromo Vallelunga', '4 cilindri', '1740', '2780 mm'),
('FZ035CX', 'ferrari sf90 stradale', 479, 577, 29, 2986, 'rosso', 'false', 'Autodromo Nazionale Di Monza', 'V8', '1670', '2650 mm'),
('GA123YK', 'mazda RX vision', 570, 270, 36, 62616, 'rossa', 'true', 'Autodromo Enzo e Dino Ferrari', 'rotativo', '1250', '2700 mm'),
('GA139KM', 'maserati mc20', 630, 710, 33, 5204, 'blu', 'true', 'Autodromo Nazionale Di Monza', 'V6', '1478', '2700 mm'),
('GB352WN', 'bugatti Divo', 1500, 1600, 39, 7993, 'grigio', 'flase', 'Autodromo Vallelunga', 'W16', '1961', '2711 mm'),
('GC228LT', 'mustang shelby gt500', 760, 840, 29, 5200, 'verde', 'false', 'Autodromo Vallelunga', 'V8', '1778', '2720 mm'),
('GEY271K', 'lamborghini aventador', 530, 615, 31, 5200, 'bianco', 'false', 'Autodromo Internazionale Del M', 'V12', '1600', '2700 mm'),
('GL127IJ', 'ford GT', 410, 687, 34, 3497, 'bianco', 'true', 'Autodromo Nazionale Di Monza', 'V6', '1500', '2710 mm'),
('GM036FA', 'bmw i8', 570, 620, 33, 4200, 'nero', 'false', 'Autodromo Nazionale Di Monza', '3 cilindri', '1600', '2800 mm'),
('GN472VG', 'Ferrari p80/c', 600, 700, 29, 3900, 'rosso', 'true', 'Autodromo Enzo e Dino Ferrari', 'V8', '1260', '1800 mm');

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `età` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `pista`
--

CREATE TABLE IF NOT EXISTS `pista` (
  `nome` varchar(30) NOT NULL,
  `nazione` varchar(30) NOT NULL,
  `città` varchar(30) NOT NULL,
  `km` varchar(30) NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pista`
--

INSERT INTO `pista` (`nome`, `nazione`, `città`, `km`) VALUES
('Autodromo Enzo e Dino Ferrari', 'Italia', 'Imola', '4,909'),
('Autodromo Internazionale Del M', 'Italia', 'Firenze', '5245'),
('Autodromo Nazionale Di Monza', 'Italia', 'Monza', '5,793'),
('Autodromo Vallelunga', 'Italia', 'Roma', '3,800');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE IF NOT EXISTS `prenotazione` (
  `ID` int(29) NOT NULL,
  `costo` int(31) NOT NULL,
  `durata` int(30) NOT NULL,
  `data` date NOT NULL,
  `ora` varchar(30) NOT NULL,
  `targa` varchar(7) NOT NULL,
  `cliente` varchar(51) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `targa` (`targa`),
  KEY `cliente` (`cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`pista`) REFERENCES `pista` (`nome`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
