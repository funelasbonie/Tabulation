-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 04:09 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ACCT_ID` varchar(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ACCT_ID`, `USERNAME`, `PASSWORD`) VALUES
('A1', 'user', 'user'),
('A2', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CANDIDATE_ID` int(50) NOT NULL,
  `CANDIDATE_NO` int(11) DEFAULT NULL,
  `CANDIDATE_NAME` varchar(50) DEFAULT NULL,
  `CANDIDATE_GENDER` varchar(10) DEFAULT NULL,
  `CANDIDATE_IMAGE` text,
  `G_CODE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CANDIDATE_ID`, `CANDIDATE_NO`, `CANDIDATE_NAME`, `CANDIDATE_GENDER`, `CANDIDATE_IMAGE`, `G_CODE`) VALUES
(0, 0, 'def', 'def', 'def', 0),
(1, 1, 'Kathleen Joy Guanez', 'Female', 'images/Candidates/Grade7KathleenJoyGuanez.jpg', 1),
(2, 2, 'Vince Arch Bugaoan', 'Male', 'images/Candidates/Grade7VinceArchBugaoan.jpg', 1),
(3, 3, 'John Michael Jerkine Bonifacio', 'Male', 'images/Candidates/Grade8JohnMichaelJerkineBonifacio.jpg', 2),
(4, 4, 'Stephanie Nicole Mariano', 'Female', 'images/Candidates/Grade8StephanieNicoleMariano.jpg', 2),
(5, 5, 'Julian Louise Cruz', 'Female', 'images/Candidates/Grade9JulianLouiseCruz.jpg', 3),
(6, 6, 'Mateo Cayanga III', 'Male', 'images/Candidates/Grade9MateoCayangaIII.jpg', 3),
(7, 7, 'Mico Arcel De Jesus', 'Male', 'images/Candidates/Grade10MicoArcelDeJesus.jpg', 4),
(8, 8, 'Aaliyah Jin Delos Trinos', 'Female', 'images/Candidates/Grade10Maria.jpg', 4),
(9, 9, 'Luis Alfonsus Rodriguez', 'Male', 'images/Candidates/Grade11LuisAlfonsusRodriguez.jpg', 5),
(10, 10, 'Sophia Pascual', 'Female', 'images/Candidates/Grade11SophiaPascual.jpg', 5),
(11, 11, 'Angelica Bautista', 'Female', 'images/Candidates/Grade12AngelicaBautista.jpg', 6),
(12, 12, 'Jeremy Rentoria', 'Male', 'images/Candidates/GRade12JeremyRentoria.jpg', 6),
(13, 13, ' Athea Shine De Guzman', 'Female', 'images/Candidates/STEAtheaShineDeGuzman.jpg', 7),
(14, 14, 'Hans Patrick Dela Merced', 'Male', 'images/Candidates/STEHansPatrickDelaMerced.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` varchar(50) NOT NULL,
  `CATEGORY_NAME` varchar(50) DEFAULT NULL,
  `CATEGORY_PERC` varchar(50) DEFAULT NULL,
  `CATEGORY_TYPE` varchar(50) DEFAULT NULL,
  `MIN_SCORE` int(11) DEFAULT NULL,
  `MAX_SCORE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CATEGORY_NAME`, `CATEGORY_PERC`, `CATEGORY_TYPE`, `MIN_SCORE`, `MAX_SCORE`) VALUES
('1', 'Casual Attire', '10%', 'JD', 3, 10),
('2', 'Summer Attire', '10%', 'JD', 3, 10),
('3', 'Formal Attire', '10%', 'JD', 3, 10),
('4', 'Beauty', '30%', 'JD', 15, 30),
('5', 'Intelligence', '20%', 'JD', 10, 20),
('6', 'People\'s Choice', '10%', 'AD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE `final_result` (
  `CANDIDATE_ID` int(11) DEFAULT NULL,
  `SCORE` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_result`
--

INSERT INTO `final_result` (`CANDIDATE_ID`, `SCORE`) VALUES
(3, '55.20'),
(4, '35.80'),
(5, '32.00'),
(6, '50.60'),
(7, '51.80'),
(8, '33.80'),
(9, '33.60'),
(10, '34.60'),
(11, '36.40'),
(12, '40.60'),
(14, '32.60'),
(13, '37.40'),
(2, '36.80'),
(1, '44.60');

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `JUDGE_ID` varchar(50) NOT NULL,
  `JUDGE_USERNAME` varchar(50) DEFAULT NULL,
  `JUDGE_PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`JUDGE_ID`, `JUDGE_USERNAME`, `JUDGE_PASSWORD`) VALUES
('1000', 'def', 'def'),
('1001', 'Judge1', '123'),
('1002', 'Judge2', '123'),
('1003', 'Judge3', '123'),
('1004', 'Judge4', '123'),
('1005', 'Judge5', '123');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `CANDIDATE_ID` int(11) DEFAULT NULL,
  `FINAL_SCORE` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`CATEGORY_ID`, `CANDIDATE_ID`, `FINAL_SCORE`) VALUES
(1, 3, '5.80'),
(1, 4, '3.60'),
(1, 5, '3.80'),
(1, 6, '3.60'),
(1, 7, '4.60'),
(1, 8, '3.40'),
(1, 9, '4.20'),
(1, 10, '3.40'),
(1, 11, '4.00'),
(1, 12, '3.60'),
(1, 14, '3.80'),
(2, 1, '4.40'),
(2, 2, '4.40'),
(2, 3, '4.20'),
(2, 4, '4.60'),
(2, 5, '3.60'),
(2, 6, '4.20'),
(2, 7, '4.40'),
(2, 8, '5.00'),
(2, 9, '4.80'),
(2, 10, '5.40'),
(2, 11, '4.80'),
(2, 12, '4.80'),
(2, 13, '4.80'),
(1, 13, '4.00'),
(2, 14, '3.40'),
(3, 1, '4.20'),
(3, 2, '3.00'),
(3, 3, '3.00'),
(3, 4, '3.80'),
(3, 5, '4.00'),
(3, 6, '5.20'),
(3, 8, '3.00'),
(3, 9, '3.40'),
(3, 10, '3.40'),
(3, 11, '5.20'),
(3, 12, '3.80'),
(3, 13, '4.00'),
(3, 14, '3.80'),
(4, 1, '14.80'),
(4, 2, '14.40'),
(4, 3, '15.20'),
(4, 4, '12.40'),
(4, 5, '13.20'),
(4, 6, '15.20'),
(4, 7, '12.40'),
(4, 8, '15.00'),
(4, 9, '12.80'),
(4, 10, '15.00'),
(4, 11, '15.00'),
(4, 12, '15.00'),
(4, 13, '15.20'),
(4, 14, '12.20'),
(5, 1, '6.00'),
(5, 3, '8.00'),
(5, 4, '6.40'),
(5, 5, '6.40'),
(5, 6, '6.40'),
(3, 7, '4.00'),
(5, 7, '6.40'),
(5, 8, '6.40'),
(5, 9, '6.40'),
(5, 10, '6.40'),
(5, 11, '6.40'),
(5, 12, '6.40'),
(5, 13, '8.40'),
(5, 14, '6.40'),
(6, 1, '10.00'),
(6, 4, '5.00'),
(6, 5, '1.00'),
(6, 8, '1.00'),
(6, 10, '1.00'),
(6, 11, '1.00'),
(6, 13, '1.00'),
(6, 2, '1.00'),
(6, 3, '19.00'),
(6, 6, '16.00'),
(6, 7, '20.00'),
(6, 9, '2.00'),
(6, 12, '7.00'),
(6, 14, '3.00'),
(1, 2, '4.00'),
(5, 2, '10.00'),
(1, 1, '5.20');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `SCORE_ID` varchar(50) DEFAULT NULL,
  `JUDGE_NAME` varchar(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `CANDIDATE_ID` int(11) DEFAULT NULL,
  `SCORE` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`SCORE_ID`, `JUDGE_NAME`, `CATEGORY_ID`, `CANDIDATE_ID`, `SCORE`) VALUES
('5e68d377b360b', 'Judge3', 1, 1, '10.00'),
('5e68d38e23f73', 'Judge2', 1, 1, '8.00'),
('5e68d39fe69f3', 'Judge3', 1, 2, '5.00'),
('5e68d3a000551', 'Judge2', 1, 2, '5.00'),
('5e68d3c0df8cc', 'Judge3', 1, 3, '10.00'),
('5e68d3c5c07a7', 'Judge1', 1, 3, '10.00'),
('5e68d3cd39143', 'Judge3', 1, 4, '5.00'),
('5e68d3da4ac4a', 'Judge3', 1, 5, '4.00'),
('5e68d3e55a022', 'Judge3', 1, 6, '5.00'),
('5e68d403a65bb', 'Judge3', 1, 7, '8.00'),
('5e68d414206d7', 'Judge3', 1, 8, '4.00'),
('5e68d42b00b10', 'Judge3', 1, 9, '5.00'),
('5e68d436b025c', 'Judge2', 1, 3, '9.00'),
('5e68d43e0a5ff', 'Judge3', 1, 10, '5.00'),
('5e68d440bb4b0', 'Judge2', 1, 4, '7.00'),
('5e68d44b4ca4d', 'Judge2', 1, 5, '9.00'),
('5e68d450f3581', 'Judge3', 1, 11, '5.00'),
('5e68d4537b0d8', 'Judge2', 1, 6, '7.00'),
('5e68d45c4b4c1', 'Judge2', 1, 7, '5.00'),
('5e68d46110ad8', 'Judge3', 1, 12, '7.00'),
('5e68d46bbebad', 'Judge2', 1, 8, '4.00'),
('5e68d47640414', 'Judge2', 1, 9, '10.00'),
('5e68d47695050', 'Judge3', 1, 13, '4.00'),
('5e68d47f6a36e', 'Judge2', 1, 10, '5.00'),
('5e68d48037ead', 'Judge1', 1, 4, '6.00'),
('5e68d4826d6a9', 'Judge3', 1, 14, '5.00'),
('5e68d4886d1d5', 'Judge2', 1, 11, '8.00'),
('5e68d4919f844', 'Judge2', 1, 12, '6.00'),
('5e68d4934fa74', 'Judge1', 1, 5, '6.00'),
('5e68d49aad1b4', 'Judge1', 1, 6, '6.00'),
('5e68d49f43e5f', 'Judge1', 1, 7, '10.00'),
('5e68d4a469d9e', 'Judge1', 1, 8, '9.00'),
('5e68d4a6c2e52', 'Judge2', 1, 14, '6.00'),
('5e68d4a949e15', 'Judge1', 1, 9, '6.00'),
('5e68d4c74cdf3', 'Judge1', 1, 10, '7.00'),
('5e68d4ce7292d', 'Judge1', 1, 11, '7.00'),
('5e68d4d372ab7', 'Judge1', 1, 12, '5.00'),
('5e68d4d8ce456', 'Judge1', 1, 13, '6.00'),
('5e68d4e3a3230', 'Judge1', 1, 14, '8.00'),
('5e68d52a9c946', 'Judge2', 2, 1, '9.00'),
('5e68d52f4868b', 'Judge3', 2, 1, '5.00'),
('5e68d535671bf', 'Judge2', 2, 2, '9.00'),
('5e68d53c94b91', 'Judge3', 2, 2, '5.00'),
('5e68d53f35a23', 'Judge2', 2, 3, '9.00'),
('5e68d548e8bf7', 'Judge2', 2, 4, '8.00'),
('5e68d54d317d9', 'Judge3', 2, 3, '5.00'),
('5e68d5528e799', 'Judge2', 2, 5, '9.00'),
('5e68d5606bd6c', 'Judge2', 2, 6, '7.00'),
('5e68d560e20d4', 'Judge1', 2, 1, '8.00'),
('5e68d56612de1', 'Judge1', 2, 2, '8.00'),
('5e68d5688231e', 'Judge3', 2, 4, '7.00'),
('5e68d569cce35', 'Judge2', 2, 7, '9.00'),
('5e68d56aadeb9', 'Judge1', 2, 3, '7.00'),
('5e68d56f6caaa', 'Judge1', 2, 4, '8.00'),
('5e68d5745b5ab', 'Judge1', 2, 5, '6.00'),
('5e68d5749970b', 'Judge2', 2, 8, '9.00'),
('5e68d5795cc7a', 'Judge1', 2, 6, '9.00'),
('5e68d57c591e2', 'Judge2', 2, 9, '9.00'),
('5e68d58339c36', 'Judge1', 2, 7, '8.00'),
('5e68d5846bfcf', 'Judge2', 2, 10, '9.00'),
('5e68d58846c15', 'Judge3', 2, 5, '3.00'),
('5e68d588b6d4a', 'Judge1', 2, 8, '8.00'),
('5e68d58d1cd19', 'Judge1', 2, 9, '9.00'),
('5e68d590e9650', 'Judge2', 2, 11, '10.00'),
('5e68d5920ac88', 'Judge1', 2, 10, '9.00'),
('5e68d594ef127', 'Judge3', 2, 6, '5.00'),
('5e68d596a3b5b', 'Judge1', 2, 11, '9.00'),
('5e68d59a48e92', 'Judge2', 2, 12, '10.00'),
('5e68d59b2a37d', 'Judge1', 2, 12, '9.00'),
('5e68d5a0271f0', 'Judge1', 2, 13, '9.00'),
('5e68d5a15b778', 'Judge3', 2, 7, '5.00'),
('5e68d5a557edf', 'Judge1', 2, 14, '9.00'),
('5e68d5aeae686', 'Judge3', 2, 8, '8.00'),
('5e68d5b35b482', 'Judge2', 2, 14, '3.00'),
('5e68d5c0ece12', 'Judge3', 2, 9, '6.00'),
('5e68d5d0b2d6f', 'Judge2', 2, 13, '10.00'),
('5e68d5d59b650', 'Judge3', 2, 10, '9.00'),
('5e68d5e13ff19', 'Judge3', 2, 11, '5.00'),
('5e68d5ec5d25d', 'Judge3', 2, 12, '5.00'),
('5e68d6022482a', 'Judge3', 2, 13, '5.00'),
('5e68d60239d43', 'Judge2', 1, 13, '10.00'),
('5e68d61e7b322', 'Judge3', 2, 14, '5.00'),
('5e68d682b7728', 'Judge3', 3, 1, '5.00'),
('5e68d68a35124', 'Judge1', 3, 1, '7.00'),
('5e68d68c20749', 'Judge3', 3, 2, '5.00'),
('5e68d68d04bd9', 'Judge2', 3, 1, '9.00'),
('5e68d68f7f32d', 'Judge1', 3, 2, '7.00'),
('5e68d695c2a50', 'Judge3', 3, 3, '4.00'),
('5e68d6977db3e', 'Judge2', 3, 2, '3.00'),
('5e68d69b185ca', 'Judge1', 3, 3, '7.00'),
('5e68d6a11ba5c', 'Judge2', 3, 3, '4.00'),
('5e68d6a321aa1', 'Judge1', 3, 4, '8.00'),
('5e68d6a3ba1a5', 'Judge3', 3, 4, '6.00'),
('5e68d6a9477cf', 'Judge1', 3, 5, '9.00'),
('5e68d6ab71a51', 'Judge2', 3, 4, '5.00'),
('5e68d6ad6e901', 'Judge3', 3, 5, '7.00'),
('5e68d6b547a75', 'Judge2', 3, 5, '4.00'),
('5e68d6b9e650c', 'Judge3', 3, 6, '10.00'),
('5e68d6be95b88', 'Judge2', 3, 6, '6.00'),
('5e68d6cd55869', 'Judge1', 3, 6, '10.00'),
('5e68d6d367db7', 'Judge2', 3, 7, '3.00'),
('5e68d6d545d9d', 'Judge3', 3, 8, '5.00'),
('5e68d6d64547b', 'Judge1', 3, 7, '7.00'),
('5e68d6dbe3d55', 'Judge1', 3, 8, '7.00'),
('5e68d6dc95a14', 'Judge2', 3, 8, '3.00'),
('5e68d6e504e85', 'Judge1', 3, 9, '5.00'),
('5e68d6e74c77e', 'Judge3', 3, 9, '5.00'),
('5e68d6ebc4608', 'Judge1', 3, 10, '7.00'),
('5e68d6f2aed75', 'Judge1', 3, 11, '10.00'),
('5e68d6f3810dd', 'Judge3', 3, 10, '4.00'),
('5e68d6f9148dc', 'Judge1', 3, 12, '5.00'),
('5e68d6fbf05cd', 'Judge3', 3, 11, '6.00'),
('5e68d6fdf37a5', 'Judge1', 3, 13, '8.00'),
('5e68d7024759d', 'Judge2', 3, 9, '7.00'),
('5e68d70372885', 'Judge1', 3, 14, '8.00'),
('5e68d708dc6d2', 'Judge3', 3, 12, '10.00'),
('5e68d70e42879', 'Judge2', 3, 10, '6.00'),
('5e68d7167da79', 'Judge3', 3, 13, '7.00'),
('5e68d71864264', 'Judge2', 3, 11, '10.00'),
('5e68d7236e2b9', 'Judge3', 3, 14, '8.00'),
('5e68d724ab505', 'Judge2', 3, 12, '4.00'),
('5e68d72e8c3fd', 'Judge2', 3, 13, '5.00'),
('5e68d737ce6b0', 'Judge2', 3, 14, '3.00'),
('5e68d7bec7a0d', 'Judge2', 4, 1, '16.00'),
('5e68d7c9f00be', 'Judge2', 4, 2, '16.00'),
('5e68d7d67dadf', 'Judge3', 4, 1, '30.00'),
('5e68d7d745b29', 'Judge2', 4, 3, '16.00'),
('5e68d7e3bdf5f', 'Judge1', 4, 1, '28.00'),
('5e68d7ebc6878', 'Judge3', 4, 2, '30.00'),
('5e68d7ec16768', 'Judge1', 4, 2, '26.00'),
('5e68d7f115af9', 'Judge2', 4, 4, '16.00'),
('5e68d7f66c927', 'Judge1', 4, 3, '30.00'),
('5e68d7fa25d10', 'Judge3', 4, 3, '30.00'),
('5e68d7fced1cc', 'Judge2', 4, 5, '16.00'),
('5e68d7fd4475f', 'Judge1', 4, 4, '16.00'),
('5e68d806d5eac', 'Judge3', 4, 4, '30.00'),
('5e68d80758fd8', 'Judge1', 4, 5, '20.00'),
('5e68d80a5f116', 'Judge2', 4, 6, '16.00'),
('5e68d80e800ba', 'Judge1', 4, 6, '30.00'),
('5e68d817df88c', 'Judge1', 4, 7, '16.00'),
('5e68d81aca2c1', 'Judge3', 4, 5, '30.00'),
('5e68d81ce1a09', 'Judge1', 4, 8, '30.00'),
('5e68d8236fafd', 'Judge1', 4, 9, '19.00'),
('5e68d824b61fd', 'Judge3', 4, 6, '30.00'),
('5e68d82555da1', 'Judge2', 4, 7, '16.00'),
('5e68d82b824a0', 'Judge1', 4, 10, '30.00'),
('5e68d82e76887', 'Judge2', 4, 8, '15.00'),
('5e68d82fb8cf4', 'Judge3', 4, 7, '30.00'),
('5e68d83141d9a', 'Judge1', 4, 11, '15.00'),
('5e68d83811a50', 'Judge1', 4, 12, '30.00'),
('5e68d838ed6f7', 'Judge2', 4, 9, '15.00'),
('5e68d83d361c1', 'Judge3', 4, 8, '30.00'),
('5e68d83dd9e9b', 'Judge1', 4, 13, '16.00'),
('5e68d8426f895', 'Judge1', 4, 14, '16.00'),
('5e68d847890b4', 'Judge3', 4, 9, '30.00'),
('5e68d8536120c', 'Judge2', 4, 10, '15.00'),
('5e68d8559be3c', 'Judge3', 4, 10, '30.00'),
('5e68d8642ceea', 'Judge2', 4, 11, '30.00'),
('5e68d86d32745', 'Judge2', 4, 12, '15.00'),
('5e68d87777524', 'Judge2', 4, 13, '30.00'),
('5e68d880c3d3b', 'Judge3', 4, 11, '30.00'),
('5e68d88380c80', 'Judge2', 4, 14, '15.00'),
('5e68d88c5b774', 'Judge3', 4, 12, '30.00'),
('5e68d899771c8', 'Judge3', 4, 13, '30.00'),
('5e68d8a989c33', 'Judge3', 4, 14, '30.00'),
('5e68d8f722427', 'Judge2', 5, 1, '10.00'),
('5e68d90173ad6', 'Judge2', 5, 2, '10.00'),
('5e68d9094fa2b', 'Judge1', 5, 1, '10.00'),
('5e68d90a4361b', 'Judge2', 5, 3, '10.00'),
('5e68d917a3d34', 'Judge3', 5, 1, '10.00'),
('5e68d918e1c99', 'Judge2', 5, 4, '10.00'),
('5e68d91c3c4f6', 'Judge1', 5, 3, '12.00'),
('5e68d9214ba9f', 'Judge1', 5, 4, '12.00'),
('5e68d9230e4ca', 'Judge2', 5, 5, '10.00'),
('5e68d9261e5e4', 'Judge1', 5, 5, '12.00'),
('5e68d92a3d7f7', 'Judge1', 5, 6, '12.00'),
('5e68d92d48c88', 'Judge2', 5, 6, '10.00'),
('5e68d92daf620', 'Judge1', 5, 7, '12.00'),
('5e68d9320ba4b', 'Judge1', 5, 8, '12.00'),
('5e68d937ac835', 'Judge3', 5, 2, '20.00'),
('5e68d937f1318', 'Judge1', 5, 9, '12.00'),
('5e68d938edc6a', 'Judge2', 5, 7, '10.00'),
('5e68d93ba715e', 'Judge1', 5, 10, '12.00'),
('5e68d93f3d543', 'Judge1', 5, 11, '12.00'),
('5e68d9430b806', 'Judge1', 5, 12, '12.00'),
('5e68d94438957', 'Judge2', 5, 8, '10.00'),
('5e68d94a9c095', 'Judge1', 5, 13, '12.00'),
('5e68d9513af32', 'Judge2', 5, 9, '10.00'),
('5e68d957b464a', 'Judge3', 5, 3, '18.00'),
('5e68d95ace393', 'Judge2', 5, 10, '10.00'),
('5e68d96213daa', 'Judge3', 5, 4, '10.00'),
('5e68d96519c90', 'Judge2', 5, 11, '10.00'),
('5e68d96c4c226', 'Judge1', 5, 14, '12.00'),
('5e68d971b79aa', 'Judge3', 5, 5, '10.00'),
('5e68d9752ac50', 'Judge2', 5, 12, '10.00'),
('5e68d97b5bb8b', 'Judge3', 5, 6, '10.00'),
('5e68d97e15e4d', 'Judge2', 5, 13, '20.00'),
('5e68d9856bb2c', 'Judge3', 3, 7, '10.00'),
('5e68d988699f3', 'Judge2', 5, 14, '10.00'),
('5e68d98e98a0d', 'Judge3', 5, 7, '10.00'),
('5e68d9985ef61', 'Judge3', 5, 8, '10.00'),
('5e68d9a171d47', 'Judge3', 5, 9, '10.00'),
('5e68d9ab2fbcb', 'Judge3', 5, 10, '10.00'),
('5e68d9b568906', 'Judge3', 5, 11, '10.00'),
('5e68d9c57cd6f', 'Judge3', 5, 12, '10.00'),
('5e68d9d8ec1e6', 'Judge3', 5, 13, '10.00'),
('5e68d9e332dad', 'Judge3', 5, 14, '10.00'),
('5e68da11c818f', 'A2', 6, 1, '10.00'),
('5e68da1954cf1', 'A2', 6, 4, '5.00'),
('5e68da1f1c802', 'A2', 6, 5, '1.00'),
('5e68da297e78d', 'A2', 6, 8, '1.00'),
('5e68da2f38280', 'A2', 6, 10, '1.00'),
('5e68da34d836d', 'A2', 6, 11, '1.00'),
('5e68da44b1d3b', 'A2', 6, 13, '1.00'),
('5e68da4cab341', 'A2', 6, 2, '1.00'),
('5e68da53d2ab3', 'A2', 6, 3, '19.00'),
('5e68da5d95fcc', 'A2', 6, 6, '16.00'),
('5e68da64cbad6', 'A2', 6, 7, '20.00'),
('5e68da6db7651', 'A2', 6, 9, '2.00'),
('5e68da94cb317', 'A2', 6, 12, '7.00'),
('5e68daa0a9c17', 'A2', 6, 14, '3.00'),
('5e68e30d63065', 'Judge1', 1, 2, '10.00'),
('5e68f957a33fa', 'Judge1', 5, 2, '20.00'),
('5e6b345551a7b', 'Judge1', 1, 1, '8.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ACCT_ID`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CANDIDATE_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`JUDGE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
