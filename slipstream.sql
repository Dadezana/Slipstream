-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2022 at 04:04 PM
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
  `freni` int(30) NOT NULL,
  `cilindrata` int(30) NOT NULL,
  `colore` varchar(30) NOT NULL,
  `manutenzione` varchar(51) NOT NULL,
  `pista` varchar(50) NOT NULL,
  `motore` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `passo` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `imgBack` varchar(100) NOT NULL,
  `prezzo` float NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`targa`, `modello`, `potenza`, `coppia`, `freni`, `cilindrata`, `colore`, `manutenzione`, `pista`, `motore`, `peso`, `passo`, `img`, `imgBack`, `prezzo`, `logo`) VALUES
('EE000HG', 'Mclaren 720s', 717, 770, 35, 3994, 'Arancione', '1', 'Autodromo Nazionale Di Monza', 'V8', '1419', '2670', 'img/garage/mclaren720davvanti.png', 'img/garage/mclaren720dietro.png', 2.4, 'img/logo/mclaren.png'),
('EH784BG', 'Aston Martin Vulcan Amr Pro', 831, 780, 30, 7000, 'Verde chiaro', '0', 'Autodromo Enzo e Dino Ferrari', 'V12', '1350', '4500', 'img/garage/astonmartinvulcandavanti.png', 'img/garage/astonmartinvulcan.png', 4, 'img/logo/aston.png'),
('EP865CP', 'Ferrari 488', 670, 760, 31, 3902, 'Rosso', '0', 'Autodromo Internazionale Del Mugello', 'V8', '1385', '2650', 'img/garage/ferrari488.png', 'img/garage/ferrari488back.png', 2.8, 'img/logo/ferrari.png'),
('EW977KL', 'Porsche GT3 RS', 490, 470, 26, 3996, 'Nero', '1', 'Autodromo Internazionale Del Mugello', '6 cilindri', '1430', '2457', 'img/garage/porschegt3davanti.png', 'img/garage/porschegt3dietro.png', 2.5, 'img/logo/porsche.png'),
('EZ769TG', 'Audi R8', 311, 410, 39, 2200, 'Bianco', '0', 'Autodromo Enzo e Dino Ferrari', '5 cilindri', '1595', '2597', 'img/garage/Audi_R8.png', 'img/garage/Audiback.png', 3, 'img/logo/audi.png'),
('FA488NT', 'Lotus Evora GT', 416, 420, 37, 3500, 'Arancione', '0', 'Autodromo Internazionale Del Mugello', '6 cilindri', '1248', '2580', 'img/garage/lotusdavanti.png', 'img/garage/lotusdietro.png', 2.2, 'img/logo/lotus.png'),
('FC59ODA', 'Mclaren 570 GT', 570, 630, 29, 3799, 'Grigio', '0', 'Autodromo Internazionale Del Mugello', 'V8', '1495', '2670', 'img/garage/mclaren570davanti.png', 'img/garage/mclaren570dietro.png', 2.9, 'img/logo/mclaren.png'),
('FF462GS', 'Mercedes AMG GT-R', 585, 550, 37, 3982, 'Grigio', '0', 'Autodromo Vallelunga', 'V8', '1650', '2630', 'img/garage/mercedesamgdavanti.png', 'img/garage/mercedesamgdietro.png', 3.5, 'img/logo/mercedes.png'),
('FH888LY', 'Pagani Huayra', 730, 1000, 37, 5980, 'Grigio', '0', 'Autodromo Enzo e Dino Ferrari', 'V12', '1350', '2800', 'img/garage/paganidavanti.png', 'img/garage/paganidietro.png', 4.5, 'img/logo/pagani.png'),
('FI119MM', 'Chevrolet Corvette', 495, 470, 37, 6162, 'Marrone', '0', 'Autodromo Vallelunga', 'V8', '1592', '4630', 'img/garage/chevroletdavanti.png', 'img/garage/chevroletdietro.png', 3.6, 'img/logo/chevrolet.png'),
('FJ558PD', 'Nissan ZGT 500', 570, 637, 29, 4000, 'Grigio', '0', 'Autodromo Vallelunga', '4 cilindri', '1740', '2780', 'img/garage/nissandavanti.png', 'img/garage/nissandietro.png', 4.7, 'img/logo/nissan.png'),
('FZ035CX', 'Ferrari sf90 stradale', 479, 577, 29, 2986, 'Rosso', '0', 'Autodromo Nazionale Di Monza', 'V8', '1670', '2650', 'img/garage/ferraresf90davanti.png', 'img/garage/ferrsrisf90dietro.png', 4.2, 'img/logo/ferrari.png'),
('GA123YK', 'Mazda RX vision', 570, 270, 36, 6216, 'Rosso', '0', 'Autodromo Enzo e Dino Ferrari', 'Rotativo', '1250', '2700', 'img/garage/mazdadavanti.png', 'img/garage/mazdadietro.png', 5, 'img/logo/mazda.png'),
('GA139KM', 'Maserati MC20', 630, 710, 33, 5204, 'Blu', '0', 'Autodromo Nazionale Di Monza', 'V6', '1478', '2700', 'img/garage/maseratimc20avanti.png', 'img/garage/maseratimc20dietro.png', 2.6, 'img/logo/maserati.png'),
('GB352WN', 'Bugatti Divo', 1500, 1600, 39, 7993, 'Grigio', '0', 'Autodromo Vallelunga', 'W16', '1961', '2711', 'img/garage/bugattidivodavanti.png', 'img/garage/bugattidivo.png', 4.4, 'img/logo/bugatti.png'),
('GC228LT', 'Ford Mustang Shelby', 760, 840, 29, 5200, 'Lime', '0', 'Autodromo Vallelunga', 'V8', '1778', '2720', 'img/garage/mustangshelbydavanti.png', 'img/garage/mustangshelbydietro.png', 3.8, 'img/logo/mustang.png'),
('GEY271K', 'Lamborghini Aventador', 530, 615, 31, 5200, 'Bianco', '1', 'Autodromo Internazionale Del Mugello', 'V12', '1600', '2700', 'img/garage/aventador.png', 'img/garage/aventadorback.png', 2.5, 'img/logo/lamborghini.png'),
('GL127IJ', 'Ford GT', 410, 687, 34, 3497, 'Bianco', '0', 'Autodromo Nazionale Di Monza', 'V6', '1500', '2710', 'img/garage/fordgtdavanti.png', 'img/garage/fordgtdietro.png', 3, 'img/logo/ford.png'),
('GM036FA', 'Bmw i8', 570, 620, 33, 4200, 'Nero', '0', 'Autodromo Nazionale Di Monza', '3 cilindri', '1600', '2800', 'img/garage/bmwdavanti.png', 'img/garage/bmwdietro.png', 2.2, 'img/logo/bmw.png'),
('GN472VG', 'Ferrari P80/C', 600, 700, 29, 3900, 'Rosso', '1', 'Autodromo Enzo e Dino Ferrari', 'V8', '1260', '1800', 'img/garage/ferrariP80davanti.png', 'img/garage/ferrariP80dietro.png', 2.6, 'img/logo/ferrari.png');

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
('davide', '$2y$10$6Fwaz0RSXI83uNqHaJxa8OTnCp6sG.zU4dHCPdUnsuYarihgX0VOK', 'davide@gmail.com'),
('gino', '$2y$10$7vBl.Yv2WbZ8EOEMhyRe/ONMJMeb5mSZHf3RoUjKSjorz2Oi/wNLO', 'gino@gmail.com'),
('pippo', '$2y$10$VOklMXHrS/A7ymVNDyK88expU9XlubRNlJLO4sx3DvkD5rDsnjn4u', 'pippo@gmail.com');

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
  `durata` int(30) NOT NULL,
  `data` varchar(11) NOT NULL,
  `ora` varchar(6) NOT NULL,
  `oraFine` varchar(6) NOT NULL,
  `targa` varchar(7) NOT NULL,
  `cliente` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prenotazione`
--

INSERT INTO `prenotazione` (`ID`, `durata`, `data`, `ora`, `oraFine`, `targa`, `cliente`) VALUES
(39, 210, '2022-04-14', '11:30', '15:00', 'GL127IJ', 'ciao'),
(42, 270, '2022-03-30', '10:30', '15:00', 'GM036FA', 'gino'),
(45, 120, '2022-04-14', '12:00', '14:00', 'EH784BG', 'admin'),
(46, 90, '2022-04-28', '15:00', '16:30', 'FH888LY', 'davide');

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
  MODIFY `ID` int(29) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
