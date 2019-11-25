-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 03:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `usn` varchar(10) NOT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `descp` varchar(500) DEFAULT NULL,
  `tos` varchar(15) DEFAULT NULL,
  `sug` varchar(10) NOT NULL,
  `ver` varchar(1) DEFAULT NULL,
  `reply` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`usn`, `sub`, `descp`, `tos`, `sug`, `ver`, `reply`) VALUES
('1BI16CS187', 'Benches', 'Benches are not polished', 'classes', '1060558408', '1', ''),
('1BI16CS187', 'Lights', 'New tubelights needed.', 'classes', '1190665922', '0', NULL),
('1BI16CS187', 'New White Board', 'The Board is broken in 500', 'classes', '138538515', '1', 'hello'),
('1BI16CS187', 'Foul complaint check - 01', 'hello darn.', 'classes', '1831219934', '5', NULL),
('1BI16CS187', 'New teacher', 'new teacher for pe', 'teachers', '1875072984', '0', NULL),
('1BI16CS187', 'Foul complaint check - 02', 'hello darn.', 'classes', '1952050335', '5', NULL),
('1BI16CS187', 'Window', 'Window broken in the classroom', 'classes', '2017834477', '0', NULL),
('1BI16CS187', 'Wifi needed', 'wifi needed in campus.', 'others', '245325497', '0', NULL),
('1BI16CS187', 'New Board', 'The Board is broken in 500', 'classes', '354094100', '1', 'hello'),
('1BI16CS187', 'New UI', 'New UI teacher required.', 'teachers', '466700423', '0', NULL),
('1BI16CS187', 'Internet', 'Internet connection required.', 'labs', '679562162', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `usn` varchar(10) NOT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `descp` varchar(500) DEFAULT NULL,
  `tos` varchar(15) DEFAULT NULL,
  `sug` varchar(10) NOT NULL,
  `ver` varchar(1) DEFAULT NULL,
  `reply` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`usn`, `sub`, `descp`, `tos`, `sug`, `ver`, `reply`) VALUES
('1BI16CS187', 'Foul suggestion check - 01', 'hello darn.', 'classes', '1171186933', '5', NULL),
('1BI16CS187', 'Update OS', 'Update the OS of lab computers', 'labs', '1328604326', '0', NULL),
('1BI16CS187', 'Sports teachers', 'Request for PE and sports faculty', 'teachers', '1408398896', '0', NULL),
('1BI16CS187', 'Corridor', 'Please put wet sign on the corridor when wet.', 'others', '1542624643', '0', NULL),
('1BI16CS187', 'Foul suggestion check - 02', 'Hello darn.', 'classes', '2113327486', '5', NULL),
('1BI16CS187', 'Wet Classroom', 'Please put up slippery sign when classroom floor is wet', 'classes', '647966308', '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`usn`,`sug`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`usn`,`sug`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
