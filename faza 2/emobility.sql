-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 01, 2020 at 07:35 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emobility`
--

-- --------------------------------------------------------

--
-- Table structure for table `chargers`
--

DROP TABLE IF EXISTS `chargers`;
CREATE TABLE IF NOT EXISTS `chargers` (
  `chargerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `investorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`chargerID`),
  KEY `investorID` (`investorID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chargers`
--

INSERT INTO `chargers` (`chargerID`, `name`, `owner`, `investorID`) VALUES
(1, 'Bubanj Potok', 'JP Koridori Srbije', 1),
(2, 'IKEA Bubanj Potok', 'IKEA Srbija', 2),
(3, 'Obilicev Venac Belgrade', 'JP Parking Servis', 3),
(4, 'Hyatt Regency Belgrade', 'Hyatt Regency Belgrade', 4),
(5, 'ProCredit Belgrade', 'ProCredit Bank', 5),
(6, 'Novi Banovci', 'Naftna Industrija Srbije', 6),
(7, 'Promenada Novi Sad', 'Shopping center Promenada', 7),
(8, 'EuroPetrol Palic', 'EuroPetrol Serbia ', 8),
(9, 'Don Caffee Simanovci', 'Don Caffee', 9),
(10, 'NIS Velika Plana', 'Naftna Industrija Srbije', 6),
(11, 'Lukoil Aleksinac', 'Lukoil Serbia', 10),
(12, 'Presevo', 'JP Koridori Srbije', 1),
(13, 'Rtanj', 'Hotel Ramonda Rtanj', 11);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

DROP TABLE IF EXISTS `creditcard`;
CREATE TABLE IF NOT EXISTS `creditcard` (
  `cardID` int(11) NOT NULL AUTO_INCREMENT,
  `holderName` varchar(45) DEFAULT NULL,
  `cardNumber` varchar(16) DEFAULT NULL,
  `cvv2` varchar(4) DEFAULT NULL,
  `cardType` varchar(45) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cardID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`cardID`, `holderName`, `cardNumber`, `cvv2`, `cardType`, `customerID`) VALUES
(6, 'Petar Petrovic', '1000200030004000', '100', 'Visa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `address`, `town`, `country`, `email`, `password`) VALUES
(1, 'Petar', 'Petrovic', 'Vladimira Tomanovica 4', 'Beograd', 'Serbia', 'petar@gmail.com', '1234'),
(2, 'Petar', 'Petrovic', 'Vladimira Tomanovica 4', 'Beograd', 'Serbia', 'petarpetrovic0598@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

DROP TABLE IF EXISTS `investors`;
CREATE TABLE IF NOT EXISTS `investors` (
  `investorID` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `PIB` int(9) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`investorID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`investorID`, `companyName`, `address`, `town`, `country`, `PIB`, `email`, `password`) VALUES
(1, 'JP Koridori Srbije', 'Kneza Milosa 2', 'Beograd', 'Srbija', 124888689, 'office.koridori@koridori.rs', '1234'),
(2, 'IKEA Srbija', 'Bulevar Mihajla Pupina 10', 'Beograd', 'Srbija', 102040609, 'ikea.desk@ikeasrbija.com', '1234'),
(3, 'JP Parking servis', 'Masarikova 11', 'Beograd', 'Srbija', 202040608, 'office@parking-servis.rs', '1234'),
(4, 'Hyatt Regency Belgrade', 'Bulevar Milentija Popovica 9', 'Beograd', 'Srbija', 142946980, 'desk@hyatt.com', '1234'),
(5, ' ProCredit Bank', 'Bulevar Milutina Milankovica 15', 'Beograd', 'Srbija', 505048708, 'racunovodstvo@procredit.rs', '1234'),
(6, 'Naftna Industrija Srbije', 'Bulevar Milentija Popovica 1', 'Beograd', 'Srbija', 124288008, 'sektor.energetike@nis.eu', '1234'),
(7, 'Shopping center Promenada', 'Bulevar Evrope 12', 'Novi Sad', 'Srbija', 121248480, 'info@promenada.com', '1234'),
(8, ' EuroPetrol Serbia', 'Bulevar Umetnosti 4', 'Novi Sad', 'Srbija', 129248580, 'desk@europetrol.com', '1234'),
(9, 'Don Caffee', 'Peka Dapcevica 24', 'Simanovci', 'Srbija', 101048503, 'office@doncaffee.rs', '1234'),
(10, ' Lukoil Serbia', 'Cara Dusana 11', 'Beograd', 'Srbija', 101060809, 'office@lukoil.rs', '1234'),
(11, 'Hotel Ramonda Rtanj', 'Kralja Milana 10', 'Rtanj', 'Srbija', 1212788779, 'office@hotelramonda.rs', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`messageID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `firstName`, `lastName`, `email`, `message`) VALUES
(1, 'Petar', 'Petrovic', 'petar@gmail.com', 'Ovo je nova poruka.\r\n                                    '),
(2, 'Petar', 'Petrovic', 'petarpetrovic0598@gmail.com', '11111 \r\n                                    '),
(3, 'Petar', 'Petrovic', 'petarpetrovic0598@gmail.com', '11111 \r\n                                    '),
(4, 'Petar', 'Petrovic', 'petarpetrovic0598@gmail.com', '   afsafs'),
(5, 'Smiljana', 'Cvikic', 'cvikic.smiljana@gmail.com', '1111\r\n                                    '),
(6, 'Petar', 'Petrovic', 'petar@gmail.com', 'Ovo je najnovije!'),
(7, 'Petar', 'Petrovic', 'petarpetrovic0598@gmail.com', '           ad                  '),
(8, 'Petar', 'Petrovic', 'petarpetrovic0598@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) DEFAULT NULL,
  `cardID` int(11) DEFAULT NULL,
  `reservationID` int(11) DEFAULT NULL,
  `holderName` varchar(45) DEFAULT NULL,
  `cardNumber` varchar(16) DEFAULT NULL,
  `cvv2` varchar(4) DEFAULT NULL,
  `expiration` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `customerID` (`customerID`),
  KEY `cardID` (`cardID`),
  KEY `reservationID` (`reservationID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `customerID`, `cardID`, `reservationID`, `holderName`, `cardNumber`, `cvv2`, `expiration`) VALUES
(2, 1, 1, 6, NULL, NULL, NULL, NULL),
(3, 1, 1, 7, NULL, NULL, NULL, NULL),
(4, 1, NULL, 8, 'Nikola Markovic', '1212000050004040', '122', '12/20'),
(5, 1, 2, 9, NULL, NULL, NULL, NULL),
(6, 1, 6, 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationID` int(11) NOT NULL AUTO_INCREMENT,
  `reservationDate` date DEFAULT NULL,
  `reservationTime` time DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `chargerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservationID`),
  KEY `customerID` (`customerID`),
  KEY `chargerID` (`chargerID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `reservationDate`, `reservationTime`, `customerID`, `chargerID`) VALUES
(1, '2020-07-23', '08:00:00', 1, 1),
(2, '2020-07-23', '15:30:00', 1, 1),
(3, '2020-07-23', '08:30:00', 1, 1),
(4, '2020-07-23', '06:20:00', 1, 1),
(5, '2020-07-23', '20:00:00', 1, 1),
(6, '2020-07-23', '20:30:00', 1, 1),
(7, '2020-07-23', '09:00:00', 1, 1),
(8, '2020-07-23', '17:00:00', 1, 1),
(9, '2020-07-23', '23:00:00', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
