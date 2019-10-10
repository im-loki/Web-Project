-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 02:03 PM
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
  `usn` varchar(10) DEFAULT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `descp` varchar(500) DEFAULT NULL,
  `tos` varchar(15) DEFAULT NULL,
  `sug` varchar(10) DEFAULT NULL,
  `ver` varchar(1) DEFAULT NULL,
  `reply` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`usn`, `sub`, `descp`, `tos`, `sug`, `ver`, `reply`) VALUES
('1BI16CS187', 'hello com', 'hello\r\n', 'class', '894346313', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `usn` varchar(10) DEFAULT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `descp` varchar(500) DEFAULT NULL,
  `tos` varchar(15) DEFAULT NULL,
  `sug` varchar(10) DEFAULT NULL,
  `ver` varchar(1) DEFAULT NULL,
  `reply` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`usn`, `sub`, `descp`, `tos`, `sug`, `ver`, `reply`) VALUES
('0', '0', '0', '0', '0', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '101', '0', ''),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '1063988849', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '2064838076', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '955943945', '0', 'done'),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '452729640', '0', NULL),
('', '', '', '', '1584281286', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '1376506880', '0', NULL),
('', '', '', '', '1461447028', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '15999462', '0', NULL),
('', '', '', '', '872930786', '0', NULL),
('', '', '', '', '1549231496', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('', '', '', '', '56', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('1BI16CS187', 'hello', 'Testing\r\n', 'class', '56', '0', NULL),
('1BI16CS187', 'test final', 'testing', 'class', '56', '0', NULL),
('1BI16CS187', 'test final', 'testing', 'class', '11490061', '0', NULL),
('1BI16CS187', 'test 4', 'jgbebfact\r\n\r\n', 'class', '2137879830', '0', NULL),
('1BI16CS187', 'test new email', 'hello', 'class', '846838439', '0', NULL),
('1BI16CS187', 'test new email', 'hello', 'class', '646632287', '0', NULL),
('', '', '', '', '1304808905', '0', NULL),
('1BI16CS187', 'test new email', 'hello', 'class', '352343147', '0', NULL),
('1BI16CS187', 'hello', '', 'class', '1119453434', '0', NULL),
('1BI16CS187', 'Hello', 'new', 'class', '854909395', '0', NULL),
('1BI16CS187', 'hello sug', 'sug', 'class', '1052659281', '0', NULL),
('1BI16CS187', 'hell', '', 'class', '183418048', '0', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
