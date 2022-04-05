-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: slipstream
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `logo` varchar(150) NOT NULL,
  `prezzo` float NOT NULL,
  PRIMARY KEY (`targa`),
  KEY `pista` (`pista`),
  CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`pista`) REFERENCES `pista` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto`
--

LOCK TABLES `auto` WRITE;
/*!40000 ALTER TABLE `auto` DISABLE KEYS */;
INSERT INTO `auto` VALUES ('EE000HG','Mclaren 720s',717,770,35,3994,'Arancione','0','Autodromo Nazionale Di Monza','V8','1419','2670','img/garage/mclaren720davvanti.png','img/garage/mclaren720dietro.png','img/logo/mclaren.png',2.4),('EH784BG','Aston Martin Vulcan Amr Pro',831,780,30,7000,'Verde chiaro','0','Autodromo Enzo e Dino Ferrari','V12','1350','4500','img/garage/astonmartinvulcandavanti.png','img/garage/astonmartinvulcan.png','img/logo/aston.png',4),('EP865CP','Ferrari 488',670,760,31,3902,'Rosso','0','Autodromo Internazionale Del Mugello','V8','1385','2650','img/garage/ferrari488.png','img/garage/ferrari488back.png','img/logo/ferrari.png',2.8),('EW977KL','Porsche GT3 RS',490,470,26,3996,'Nero','1','Autodromo Internazionale Del Mugello','6 cilindri','1430','2457','img/garage/porschegt3davanti.png','img/garage/porschegt3dietro.png','img/logo/porsche.png',2.5),('EZ769TG','Audi R8',311,410,39,2200,'Bianco','0','Autodromo Enzo e Dino Ferrari','5 cilindri','1595','2597','img/garage/Audi_R8.png','img/garage/Audiback.png','img/logo/audi.png',3),('FA488NT','Lotus Evora GT',416,420,37,3500,'Arancione','0','Autodromo Internazionale Del Mugello','6 cilindri','1248','2580','img/garage/lotusdavanti.png','img/garage/lotusdietro.png','img/logo/lotus.png',2.2),('FC59ODA','Mclaren 570 GT',570,630,29,3799,'Grigio','0','Autodromo Internazionale Del Mugello','V8','1495','2670','img/garage/mclaren570.png','img/garage/mclaren570dietro.png','img/logo/mclaren.png',2.9),('FF462GS','Mercedes AMG GT-R',585,550,37,3982,'Grigio','0','Autodromo Vallelunga','V8','1650','2630','img/garage/mercedesamgdavanti.png','img/garage/mercedesamgdietro.png','img/logo/mercedes.png',3.5),('FH888LY','Pagani Huayra',730,1000,37,5980,'Grigio','1','Autodromo Enzo e Dino Ferrari','V12','1350','2800','img/garage/paganidavanti.png','img/garage/paganidietro.png','img/logo/pagani.png',4.5),('FI119MM','Chevrolet Corvette',495,470,37,6162,'Marrone','0','Autodromo Vallelunga','V8','1592','4630','img/garage/chevroletdavanti.png','img/garage/chevroletdietro.png','img/logo/chevrolet.png',3.6),('FJ558PD','Nissan ZGT 500',570,637,29,4000,'Grigio','0','Autodromo Vallelunga','4 cilindri','1740','2780','img/garage/nissandavanti.png','img/garage/nissandietro.png','img/logo/nissan.png',4.7),('FZ035CX','Ferrari sf90 stradale',479,577,29,2986,'Rosso','0','Autodromo Nazionale Di Monza','V8','1670','2650','img/garage/ferraresf90davanti.png','img/garage/ferrsrisf90dietro.png','img/logo/ferrari.png',4.2),('GA123YK','Mazda RX vision',570,270,36,6216,'Rosso','0','Autodromo Enzo e Dino Ferrari','Rotativo','1250','2700','img/garage/mazdadavanti.png','img/garage/mazdadietro.png','img/logo/mazda.png',5),('GA139KM','Maserati MC20',630,710,33,5204,'Blu','0','Autodromo Nazionale Di Monza','V6','1478','2700','img/garage/maseratimc20avanti.png','img/garage/maseratimc20dietro.png','img/logo/maserati.png',2.6),('GB352WN','Bugatti Divo',1500,1600,39,7993,'Grigio','1','Autodromo Vallelunga','W16','1961','2711','img/garage/bugattidivodavanti.png','img/garage/bugattidivo.png','img/logo/bugatti.png',4.4),('GC228LT','Ford Mustang Shelby',760,840,29,5200,'Lime','0','Autodromo Vallelunga','V8','1778','2720','img/garage/mustangshelbydavanti.png','img/garage/mustangshelbydietro.png','img/logo/mustang.png',3.8),('GEY271K','Lamborghini Aventador',530,615,31,5200,'Bianco','0','Autodromo Internazionale Del Mugello','V12','1600','2700','img/garage/aventador.png','img/garage/aventadorback.png','img/logo/lamborghini.png',2.5),('GL127IJ','Ford GT',410,687,34,3497,'Bianco','0','Autodromo Nazionale Di Monza','V6','1500','2710','img/garage/fordgtdavanti.png','img/garage/fordgtdietro.png','img/logo/ford.png',3),('GM036FA','Bmw i8',570,620,33,4200,'Nero','0','Autodromo Nazionale Di Monza','3 cilindri','1600','2800','img/garage/bmwdavanti.png','img/garage/bmwdietro.png','img/logo/bmw.png',2.2),('GN472VG','Ferrari P80/C',600,700,29,3900,'Rosso','1','Autodromo Enzo e Dino Ferrari','V8','1260','1800','img/garage/ferrariP80davanti.png','img/garage/ferrariP80dietro.png','img/logo/ferrari.png',2.6);
/*!40000 ALTER TABLE `auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES ('admin','$2y$10$SSYfQqw2WIR5NQAaXPBJXOpmKRcmYTlUVSx9vPemeRfj9H08qxOMy','admin@gmail.com'),('ciao','$2y$10$8vPcuKW0vnXlxzzhI4JA..5C5F6iloP1a6vQRXrIDWQdM.t2.bxQq','ciao@gmail.com'),('gino','$2y$10$7vBl.Yv2WbZ8EOEMhyRe/ONMJMeb5mSZHf3RoUjKSjorz2Oi/wNLO','gino@gmail.com'),('pippo','$2y$10$VOklMXHrS/A7ymVNDyK88expU9XlubRNlJLO4sx3DvkD5rDsnjn4u','pippo@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pista`
--

DROP TABLE IF EXISTS `pista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pista` (
  `nome` varchar(50) NOT NULL,
  `nazione` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `km` varchar(30) NOT NULL,
  `imgT` varchar(100) NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pista`
--

LOCK TABLES `pista` WRITE;
/*!40000 ALTER TABLE `pista` DISABLE KEYS */;
INSERT INTO `pista` VALUES ('Autodromo Enzo e Dino Ferrari','Italia','Imola','4,909','img/piste/planimetraImola.png'),('Autodromo Internazionale Del Mugello','Italia','Firenze','5,245','img/piste/mugello1.png'),('Autodromo Nazionale Di Monza','Italia','Monza','5,793','img/piste/monza.png'),('Autodromo Vallelunga','Italia','Roma','3,800','img/piste/circuitoVallelunga.png');
/*!40000 ALTER TABLE `pista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazione`
--

DROP TABLE IF EXISTS `prenotazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazione` (
  `ID` int(29) NOT NULL AUTO_INCREMENT,
  `durata` int(30) NOT NULL,
  `data` date NOT NULL,
  `ora` varchar(6) NOT NULL,
  `oraFine` varchar(6) NOT NULL,
  `targa` varchar(7) NOT NULL,
  `cliente` varchar(51) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `targa` (`targa`),
  KEY `cliente` (`cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazione`
--

LOCK TABLES `prenotazione` WRITE;
/*!40000 ALTER TABLE `prenotazione` DISABLE KEYS */;
INSERT INTO `prenotazione` VALUES (39,190,'2022-04-15','10:20','13:30','GL127IJ','ciao'),(42,60,'2022-03-31','15:00','16:00','GA123YK','admin'),(43,60,'2022-04-07','15:00','16:00','GA123YK','admin');
/*!40000 ALTER TABLE `prenotazione` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-05 20:45:32
