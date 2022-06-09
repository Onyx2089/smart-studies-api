-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 08:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `TIME` datetime NOT NULL,
  `cursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ID`, `NAME`, `TIME`, `cursus`) VALUES
(4, 'FR', '2022-06-26 00:00:00', 0),
(5, 'EN', '2022-05-17 00:00:00', 0),
(6, 'Blockchain', '2022-06-06 23:56:00', 0),
(7, 'EPS', '2022-06-26 00:00:00', 0),
(9, 'ECO', '2022-06-06 23:56:00', 0),
(10, 'Blockchain', '2012-06-06 23:56:00', 0),
(11, 'ECO\'', '2022-06-06 20:56:00', 0),
(12, 'ECO\'', '2022-06-06 20:56:00', 0),
(13, 'ECO\'', '2022-06-06 20:56:00', 0),
(14, 'ECO\'', '2022-06-06 20:56:00', 0),
(16, 'API_WEB', '2042-12-12 23:59:59', 0),
(17, 'API_WEB', '2042-12-12 23:59:59', 0),
(19, 'API_WEB', '2042-12-12 23:59:59', 0),
(20, 'API_WEB', '2042-12-12 23:59:59', 0),
(21, 'nop', '2042-12-12 23:59:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL,
  `cursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`ID`, `name`, `birth`, `email`, `stat`, `cursus`) VALUES
(1, 'Arthur RUbiralta', '2001-05-06', 'arthur.rubiralta@ecole-89.com', 2000, 1000),
(2, 'Issam', '1990-01-06', 'issam@ecole-89.com', 1000, 3000),
(3, 'Bruce Wayne', '2018-11-13', 'batman@secret.com', 2000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DEADLINE` date NOT NULL,
  `cursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ID`, `NAME`, `DEADLINE`, `cursus`) VALUES
(1, 'Scandir', '2022-06-14', 0),
(2, 'Web war', '2022-06-03', 0),
(3, 'Final', '2022-05-24', 0),
(4, 'Final', '2022-07-29', 0),
(5, 'nop', '2042-12-12', 0),
(6, 'nop', '2042-12-12', 0),
(7, 'nop', '2042-12-12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
