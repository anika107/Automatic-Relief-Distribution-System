-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 06:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `member` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `collect` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`name`, `id`, `nid`, `gender`, `member`, `address`, `date`, `collect`) VALUES
('xyz', '0000000', '9632587412', 'Female', '2', 'Comilla', '0000-00-00', NULL),
('anik', '014F8F2E', '8705618965', 'Male', '4', 'Tangail', '2020-04-17', 32),
('Afsar', '1010101', '7936527989', 'Male', '7', 'Comilla', '0000-00-00', 1),
('Proshanta', '1111111', '7936527989', 'Male', '3', 'Tangail', '0000-00-00', 1),
('Mreedul', '118484', '8888888', 'Male', '7', 'Faridpur', '0000-00-00', NULL),
('Reyad', '14855251', '1235478956', 'Male', '4', 'Noakhali', '0000-00-00', NULL),
('abc', '1Ef563', '7936527988', 'Female', '3', 'Feni', '0000-00-00', NULL),
('Sakib', '22222', '8705618963', 'Male', '3', 'Feni', '0000-00-00', NULL),
('Al Amin', '248854152', '58469745213', 'Male', '5', 'Rangpur', '0000-00-00', NULL),
('Polash', '2ck669', '7895463215', 'Male', '4', 'Tangail', '0000-00-00', NULL),
('Faizah', '33333', '8705618961', 'Female', '3', 'Dhaka', '0000-00-00', NULL),
('Dip', '3664515', '777777777', 'Male', '5', 'Dhaka', '0000-00-00', NULL),
('Shipra', '444444', '8705618950', 'Female', '4', 'Dhaka', '0000-00-00', NULL),
('Rifat', '555555', '7936527989', 'Male', '5', 'Dhaka', '0000-00-00', NULL),
('Rashed', '6666666', '9954544811', 'Male', '6', 'Noakhali', '0000-00-00', NULL),
('Anika', '7777777777', '8974562188', 'Female', '4', 'Dhaka', '0000-00-00', NULL),
('Afifa', '888888888', '9874159561', 'Female', '4', 'Jessore', '0000-00-00', NULL),
('Mizan', '9999999', '5623412587', 'Male', '2', 'Nator', '0000-00-00', NULL),
('Shoyon', '99999999', '5641238795', 'Male', '3', 'Noakhali', '0000-00-00', NULL),
('Fahad', 'F208D22E', '7936527985', 'Male', '5', 'Feni', '2020-04-22', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
