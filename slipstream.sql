-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 alle 12:27
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
  PRIMARY KEY (`targa`),
  KEY `pista` (`pista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`targa`, `modello`, `potenza`, `coppia`, `freni`, `cilindrata`, `colore`, `manutenzione`, `pista`) VALUES
('CD59ODA', 'mclaren 570gt', 570, 630, 29, 3799, 'grigio', 'true', 'Autodromo Di Modena'),
('CY271KI', 'lamborghini gallardo', 530, 615, 31, 5200, 'bianco', 'false', 'Autodromo Di Modena'),
('DW977KL', 'porche GT3 RS', 490, 470, 26, 3996, 'nero', 'false', 'Autodromo Kenzo e Pino Ferrari'),
('EE000HG', 'mclaren 720s', 717, 770, 35, 3994, 'arancione', 'true', 'Autodromo Nazionale Di Monza'),
('EP865CP', 'ferrari 488', 670, 760, 31, 3902, 'rosso', 'true', 'Autodromo Nazionale Di Monza'),
('FZ035CX', 'ferrari F40', 479, 577, 29, 2986, 'bianco', 'false', 'Autodromo Di Modena'),
('GA139KM', 'lamborghini huracan evo', 630, 710, 33, 5204, 'nero', 'true', 'Autodromo Kenzo e Pino Ferrari'),
('GM036FA', 'porsche 911 gt3', 570, 620, 33, 4200, 'blu', 'false', 'Autodromo Nazionale Di Monza'),
('LF462GS', 'mercedes amg gt-r', 585, 550, 37, 3982, 'rosso', 'false', 'Autodromo Kenzo e Pino Ferrari');

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
('Autodromo Di Modena', 'Italia', 'Modena', '3,800'),
('Autodromo Kenzo e Pino Ferrari', 'Italia', 'Imola', '4,909'),
('Autodromo Nazionale Di Monza', 'Italia', 'Monza', '5,793');

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
