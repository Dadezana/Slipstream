-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2022 at 02:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slipstream`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `targa` varchar(7) NOT NULL,
  `modello` varchar(30) NOT NULL,
  `potenza` int(30) NOT NULL,
  `coppia` int(30) NOT NULL,
  `freni` int(51) NOT NULL,
  `cilindrata` int(30) NOT NULL,
  `colore` varchar(30) NOT NULL,
  `manutenzione` varchar(51) NOT NULL,
  `pista` varchar(50) NOT NULL,
  `motore` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `passo` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `imgBack` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`targa`, `modello`, `potenza`, `coppia`, `freni`, `cilindrata`, `colore`, `manutenzione`, `pista`, `motore`, `peso`, `passo`, `img`, `imgBack`) VALUES
('EE000HG', 'Mclaren 720s', 717, 770, 35, 3994, 'Arancione', 'true', 'Autodromo Nazionale Di Monza', 'V8', '1419', '2670 mm', 'img/garage/mclaren720davvanti.png', 'img/garage/mclaren720dietro.png'),
('EH784BG', 'Aston Martin Vulcan Amr Pro', 831, 780, 30, 7000, 'Verde chiaro', 'true', 'Autodromo Enzo e Dino Ferrari', 'V12', '1350', '4500 mm', 'img/garage/astonmartinvulcandavanti.png', 'img/garage/astonmartinvulcan.png'),
('EP865CP', 'Ferrari 488', 670, 760, 31, 3902, 'Rosso', 'true', 'Autodromo Internazionale Del Mugello', 'V8', '1385', '2650 mm', 'img/garage/ferrari488.png', 'img/garage/ferrari488back.png'),
('EW977KL', 'Porsche GT3 RS', 490, 470, 26, 3996, 'Nero', 'false', 'Autodromo Internazionale Del Mugello', '6 cilindri', '1430', '2457 mm', 'img/garage/porschegt3davanti.png', 'img/garage/porschegt3dietro.png'),
('EZ769TG', 'Audi R8', 311, 410, 39, 2200, 'Bianco', 'false', 'Autodromo Enzo e Dino Ferrari', '5 cilindri', '1595', '2597 mm', 'img/garage/Audi_R8.png', 'img/garage/Audiback.png'),
('FA488NT', 'Lotus Evora GT', 416, 420, 37, 3500, 'Arancione', 'true', 'Autodromo Internazionale Del Mugello', '6 cilindri', '1248', '2580 mm', 'img/garage/lotusdavanti.png', 'img/garage/lotusdietro.png'),
('FC59ODA', 'Mclaren 570 GT', 570, 630, 29, 3799, 'Grigio', 'true', 'Autodromo Internazionale Del Mugello', 'V8', '1495', '2670 mm', 'img/garage/mclaren570davanti.png', 'img/garage/mclaren570dietro.png'),
('FF462GS', 'Mercedes AMG GT-R', 585, 550, 37, 3982, 'Grigio', 'false', 'Autodromo Vallelunga', 'V8', '1650', '2630 mm', 'img/garage/mercedesamgdavanti.png', 'img/garage/mercedesamgdietro.png'),
('FH888LY', 'Pagani Huayra', 730, 1000, 37, 5980, 'Grigio', 'true', 'Autodromo Enzo e Dino Ferrari', 'V12', '1350', '2800 mm', 'img/garage/paganidavanti.png', 'img/garage/paganidietro.png'),
('FI119MM', 'Chevrolet Corvette', 495, 470, 37, 6162, 'Marrone', 'true', 'Autodromo Vallelunga', 'V8', '1592', '4630 mm', 'img/garage/chevroletdavanti.png', 'img/garage/chevroletdietro.png'),
('FJ558PD', 'Nissan ZGT 500', 570, 637, 29, 4000, 'Grigio', 'false', 'Autodromo Vallelunga', '4 cilindri', '1740', '2780 mm', 'img/garage/nissandavanti.png', 'img/garage/nissandietro.png'),
('FZ035CX', 'Ferrari sf90 stradale', 479, 577, 29, 2986, 'Rosso', 'false', 'Autodromo Nazionale Di Monza', 'V8', '1670', '2650 mm', 'img/garage/ferraresf90davanti.png', 'img/garage/ferrsrisf90dietro.png'),
('GA123YK', 'Mazda RX vision', 570, 270, 36, 6216, 'Rosso', 'true', 'Autodromo Enzo e Dino Ferrari', 'Rotativo', '1250', '2700 mm', 'img/garage/mazdadavanti.png', 'img/garage/mazdadietro.png'),
('GA139KM', 'Maserati MC20', 630, 710, 33, 5204, 'Blu', 'true', 'Autodromo Nazionale Di Monza', 'V6', '1478', '2700 mm', 'img/garage/maseratimc20avanti.png', 'img/garage/maseratimc20dietro.png'),
('GB352WN', 'Bugatti Divo', 1500, 1600, 39, 7993, 'Grigio', 'flase', 'Autodromo Vallelunga', 'W16', '1961', '2711 mm', 'img/garage/bugattidivodavanti.png', 'img/garage/bugattidivo.png'),
('GC228LT', 'Ford Mustang Shelby', 760, 840, 29, 5200, 'Lime', 'false', 'Autodromo Vallelunga', 'V8', '1778', '2720 mm', 'img/garage/mustangshelbydavanti.png', 'img/garage/mustangshelbydietro.png'),
('GEY271K', 'Lamborghini Aventador', 530, 615, 31, 5200, 'Bianco', 'false', 'Autodromo Internazionale Del Mugello', 'V12', '1600', '2700 mm', '', ''),
('GL127IJ', 'Ford GT', 410, 687, 34, 3497, 'Bianco', 'true', 'Autodromo Nazionale Di Monza', 'V6', '1500', '2710 mm', 'img/garage/fordgtdavanti.png', 'img/garage/fordgtdietro.png'),
('GM036FA', 'Bmw i8', 570, 620, 33, 4200, 'Nero', 'false', 'Autodromo Nazionale Di Monza', '3 cilindri', '1600', '2800 mm', 'img/garage/bmwdavanti.png', 'img/garage/bmwdietro.png'),
('GN472VG', 'Ferrari P80/C', 600, 700, 29, 3900, 'Rosso', 'true', 'Autodromo Enzo e Dino Ferrari', 'V8', '1260', '1800 mm', 'img/garage/ferrariP80davanti.png', 'img/garage/ferrariP80dietro.png');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`username`, `password`, `email`) VALUES
('admin', '$2y$10$SSYfQqw2WIR5NQAaXPBJXOpmKRcmYTlUVSx9vPemeRfj9H08qxOMy', 'admin@gmail.com'),
('ciao', '$2y$10$8vPcuKW0vnXlxzzhI4JA..5C5F6iloP1a6vQRXrIDWQdM.t2.bxQq', 'ciao@gmail.com'),
('ddd', '$2y$10$4IbCVgFWkAO72ZWKqU93q.tAcj6FF9JTIdD8go.vuE/BIt8NUZX5K', 'ddd@ddd.dd'),
('gino', '$2y$10$dUt4oVJdMMFNsklKIz5IJOC5pqg4Y8HrQjujsZrUgISOHZIndTVJS', 'gino@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pista`
--

CREATE TABLE `pista` (
  `nome` varchar(50) NOT NULL,
  `nazione` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `km` varchar(30) NOT NULL,
  `imgT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pista`
--

INSERT INTO `pista` (`nome`, `nazione`, `citta`, `km`, `imgT`) VALUES
('Autodromo Enzo e Dino Ferrari', 'Italia', 'Imola', '4,909', 'img/piste/planimetraImola.png'),
('Autodromo Internazionale Del Mugello', 'Italia', 'Firenze', '5,245', 'img/piste/mugello1.png'),
('Autodromo Nazionale Di Monza', 'Italia', 'Monza', '5,793', 'img/piste/monza.png'),
('Autodromo Vallelunga', 'Italia', 'Roma', '3,800', 'img/piste/circuitoVallelunga.png');

-- --------------------------------------------------------

--
-- Table structure for table `prenotazione`
--

CREATE TABLE `prenotazione` (
  `ID` int(29) NOT NULL,
  `costo` int(31) NOT NULL,
  `durata` int(30) NOT NULL,
  `data` varchar(10) NOT NULL,
  `ora` varchar(30) NOT NULL,
  `targa` varchar(7) NOT NULL,
  `cliente` varchar(51) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prenotazione`
--

INSERT INTO `prenotazione` (`ID`, `costo`, `durata`, `data`, `ora`, `targa`, `cliente`) VALUES
(17, 200, 2, '2020-01-01', '12:00', 'GB352WN', 'gino'),
(18, 200, 2, '2022-03-08', '16:30', 'FH888LY', 'ciao'),
(4, 200, 2, '2020-01-01', '12:00', 'EW977KL', 'admin'),
(22, 200, 2, '2022-05-11', '15:30', 'GL127IJ', 'ciao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `pista` (`pista`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pista`
--
ALTER TABLE `pista`
  ADD PRIMARY KEY (`nome`);

--
-- Indexes for table `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `targa` (`targa`),
  ADD KEY `cliente` (`cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `ID` int(29) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`pista`) REFERENCES `pista` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
