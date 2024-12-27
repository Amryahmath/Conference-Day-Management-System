-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2024 at 09:14 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_managment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `event_ID` int NOT NULL,
  `about` varchar(1500) NOT NULL,
  `plase` varchar(100) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`event_ID`, `about`, `plase`, `Date`) VALUES
(0, 'A conference meeting is a formal gathering where individuals discuss specific topics or issues. It typically involves presentations, brainstorming sessions, or decision-making processes. Conferences can be held in-person or virtually, accommodating participants from different locations. They are essential for knowledge sharing, networking, and collaboration among attendees, such as professionals, researchers, or stakeholders. Common in business, academic, and organizational settings, conference meetings foster innovation, problem-solving, and strategic planning for future goals or projects.', ' Javits Center – 655 West 34th Street, New York, NY 10001', '10-13 December, 2018 Monday to Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log_de`
--

DROP TABLE IF EXISTS `admin_log_de`;
CREATE TABLE IF NOT EXISTS `admin_log_de` (
  `admin_ID` int NOT NULL AUTO_INCREMENT,
  `user_Name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_log_de`
--

INSERT INTO `admin_log_de` (`admin_ID`, `user_Name`, `password`) VALUES
(1, 'amry', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `attandence`
--

DROP TABLE IF EXISTS `attandence`;
CREATE TABLE IF NOT EXISTS `attandence` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `time-in` varchar(15) NOT NULL,
  `Email` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attandence`
--

INSERT INTO `attandence` (`ID`, `Name`, `time-in`, `Email`) VALUES
(1, 'amri', '17:28:29', 'amriahamed1@gamil.co'),
(2, 'Aakib', '18:48:41', 'bikaamohammad@gmail.'),
(3, 'AAKIB', '18:51:23', 'mohanadass@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers_details`
--

DROP TABLE IF EXISTS `customers_details`;
CREATE TABLE IF NOT EXISTS `customers_details` (
  `cus_ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `phone_Number` int NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`cus_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_details`
--

INSERT INTO `customers_details` (`cus_ID`, `Name`, `phone_Number`, `Email`, `Address`) VALUES
(14, 'tujee', 751855578, 'mohanadass@gmail.com', 'No 03, katupotha road, kilimpol pahamuna.');

-- --------------------------------------------------------

--
-- Table structure for table `day1`
--

DROP TABLE IF EXISTS `day1`;
CREATE TABLE IF NOT EXISTS `day1` (
  `Day1_ID` int NOT NULL AUTO_INCREMENT,
  `Time` varchar(10) NOT NULL,
  `AMPM` varchar(10) NOT NULL,
  `Tittle` varchar(50) NOT NULL,
  `speekerName` varchar(100) NOT NULL,
  PRIMARY KEY (`Day1_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day2`
--

DROP TABLE IF EXISTS `day2`;
CREATE TABLE IF NOT EXISTS `day2` (
  `Day2_ID` int NOT NULL AUTO_INCREMENT,
  `Time` varchar(10) NOT NULL,
  `AMPM` varchar(10) NOT NULL,
  `Tittle` varchar(50) NOT NULL,
  `speekerName` varchar(100) NOT NULL,
  PRIMARY KEY (`Day2_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day3`
--

DROP TABLE IF EXISTS `day3`;
CREATE TABLE IF NOT EXISTS `day3` (
  `Day3_ID` int NOT NULL AUTO_INCREMENT,
  `Time` varchar(10) NOT NULL,
  `AMPM` varchar(10) NOT NULL,
  `Tittle` varchar(50) NOT NULL,
  `speekerName` varchar(100) NOT NULL,
  PRIMARY KEY (`Day3_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day4`
--

DROP TABLE IF EXISTS `day4`;
CREATE TABLE IF NOT EXISTS `day4` (
  `Day4_ID` int NOT NULL AUTO_INCREMENT,
  `Time` varchar(10) NOT NULL,
  `AMPM` varchar(10) NOT NULL,
  `Tittle` varchar(50) NOT NULL,
  `speekerName` varchar(100) NOT NULL,
  PRIMARY KEY (`Day4_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day5`
--

DROP TABLE IF EXISTS `day5`;
CREATE TABLE IF NOT EXISTS `day5` (
  `Day5_ID` int NOT NULL AUTO_INCREMENT,
  `Time` varchar(10) NOT NULL,
  `AMPM` varchar(10) NOT NULL,
  `Tittle` varchar(50) NOT NULL,
  `speekerName` varchar(100) NOT NULL,
  PRIMARY KEY (`Day5_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_attandedence_detatil`
--

DROP TABLE IF EXISTS `event_attandedence_detatil`;
CREATE TABLE IF NOT EXISTS `event_attandedence_detatil` (
  `avilable_seet` int NOT NULL,
  `qrcunt` int NOT NULL,
  `attended_seet` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_attandedence_detatil`
--

INSERT INTO `event_attandedence_detatil` (`avilable_seet`, `qrcunt`, `attended_seet`) VALUES
(0, 1, 3),
(400, 1, 3),
(0, 1, 3),
(400, 1, 3),
(300, 1, 3),
(500, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `speeker`
--

DROP TABLE IF EXISTS `speeker`;
CREATE TABLE IF NOT EXISTS `speeker` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `IMG_NAME` varchar(255) NOT NULL,
  `Images` longblob NOT NULL,
  `Position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
