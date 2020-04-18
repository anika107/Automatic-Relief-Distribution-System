-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 07:57 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quarintined`
--

-- --------------------------------------------------------

--
-- Table structure for table `affected`
--

CREATE TABLE `affected` (
  `affected_id` int(255) NOT NULL,
  `name` varchar(32) NOT NULL,
  `age` int(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `family` int(10) NOT NULL,
  `status` varchar(32) NOT NULL,
  `qday` int(10) NOT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suspected`
--

CREATE TABLE `suspected` (
  `suspected_id` int(255) NOT NULL,
  `name` varchar(32) NOT NULL,
  `age` int(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `family` int(10) NOT NULL,
  `status` varchar(32) NOT NULL,
  `qday` int(10) NOT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `divison` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affected`
--
ALTER TABLE `affected`
  ADD PRIMARY KEY (`affected_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `suspected`
--
ALTER TABLE `suspected`
  ADD PRIMARY KEY (`suspected_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affected`
--
ALTER TABLE `affected`
  ADD CONSTRAINT `affected_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`);

--
-- Constraints for table `suspected`
--
ALTER TABLE `suspected`
  ADD CONSTRAINT `suspected_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
