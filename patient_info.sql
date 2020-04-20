-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 07:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsomething`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(11) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `nid_birth_certificate` int(11) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `road` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `admission_status` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `critical_status` varchar(255) DEFAULT NULL,
  `living_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patient_id`, `last_name`, `first_name`, `age`, `nid_birth_certificate`, `house`, `road`, `area`, `district`, `zipcode`, `city`, `admission_date`, `admission_status`, `release_date`, `critical_status`, `living_status`) VALUES
(1, 'A', 'B', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-04', 'admitted', NULL, 'yes', NULL),
(2, 'A', 'B', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-16', 'admitted', NULL, 'no', NULL),
(3, 'A', 'B', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-07', 'admitted', NULL, 'no', NULL),
(4, 'A', 'B', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-15', 'admitted', NULL, 'yes', NULL),
(5, 'A', 'B', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-12', 'admitted', NULL, 'yes', NULL),
(6, 'B', 'A', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-12', 'released', '2020-04-19', NULL, 'alive'),
(7, 'B', 'A', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-02', 'released', '2020-04-09', NULL, 'alive'),
(8, 'B', 'A', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-03', 'released', '2020-04-15', NULL, 'dead'),
(9, 'B', 'A', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-15', 'released', '2020-04-19', NULL, 'dead'),
(10, 'B', 'A', '51', 1, '1', '1', '1', '1', '1', '1', '2020-04-09', 'released', '2020-04-12', NULL, 'alive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
