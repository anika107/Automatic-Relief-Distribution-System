-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 08:02 PM
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
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_user_info`
--

CREATE TABLE `card_user_info` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `family_size` int(11) DEFAULT NULL,
  `upazilla` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `division` varchar(100) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `last_relief_date` date NOT NULL,
  `relief_collected` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_user_info`
--

INSERT INTO `card_user_info` (`name`, `id`, `nid`, `gender`, `family_size`, `upazilla`, `district`, `division`, `registration_date`, `last_relief_date`, `relief_collected`) VALUES
('Abdus Samad', '014ER020', '9632587412', 'Male', 2, 'Chauddagram', 'Cumilla', 'Chittagong', '2020-04-01', '2020-04-11', 2),
('Anik Shahriar', '014F8F2E', '8705618965', 'Male', 4, 'Ghatail', 'Tangail', 'Dhaka', '2020-04-02', '2020-04-18', 4),
('Halim Uddin', '021145', '8705618965', 'Male', 4, 'Dacope', 'Jessore', 'Khulna', '0000-00-00', '0000-00-00', 4),
('Shahriar Anik ', '0230145', '8705618965', 'Male', 4, 'Golapganj', 'Srimongol', 'Sylhet', '0000-00-00', '0000-00-00', 4),
('Halim Uddin', '02345145', '8705618965', 'Male', 4, 'Companiganj', 'Sylhet', 'Sylhet', '0000-00-00', '0000-00-00', 3),
('Dalim Uddin', '02345185', '8705618465', 'Male', 4, 'Madhobpasha', 'Barishal', 'Barishal', '0000-00-00', '0000-00-00', 5),
('Pencil Ara', '023458145', '8705618965', 'Female', 4, 'Muladi', 'Patuakhali', 'Barishal', '0000-00-00', '0000-00-00', 6),
('Halim Uddin', '02346145', '8705618965', 'Male', 4, 'Babuganj', 'Barishal', 'Barishal', '0000-00-00', '0000-00-00', 4),
('Afsar Ali', '1010101', '7936527989', 'Male', 7, 'Daudkandi', 'Cumilla', 'Chittagong', '2020-04-03', '2020-04-17', 7),
('Proshanta Kumar', '1111111', '7936527989', 'Male', 3, 'Gopalpur', 'Tangail', 'Dhaka', '2020-04-04', '2020-04-15', 1),
('Mreedul Ahmed', '118484', '8888888', 'Male', 7, 'Faridpur', 'Pabna', 'Rajshahi', '2020-04-04', '2020-04-11', 7),
('Reyad Khan', '14855251', '1235478956', 'Male', 4, 'Begumganj', 'Noakhali', 'Chittagong', '2020-04-05', '2020-04-11', 4),
('Tanim Kabir', '1Ef563', '7936527988', 'Female', 3, 'Daganbhuiyan', 'Feni', 'Chittagong', '2020-04-04', '2020-04-11', 3),
('Sakib Mahmud', '22222', '8705618963', 'Male', 3, 'Daganbhuiyan', 'Feni', 'Chittagong', '2020-04-03', '2020-04-11', 3),
('Al Amin', '248854152', '58469745213', 'Male', 5, 'Mithapukur', 'Rangpur', 'Rangpur', '2020-04-10', '2020-04-11', 5),
('Polash Kumar', '2ck669', '7895463215', 'Male', 4, 'Gopalpur', 'Tangail', 'Mymensingh', '2020-04-09', '2020-04-10', 10);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'faiz', 'aaaa', 'f', 'fa', 'f@gmail.com'),
(2, 'admin', '1234', 'dg', 'dh', 'dgfsdgfd'),
(3, 'maha', '456', 'kjdajk', 'jkahs', 'ajkhjk@gmail.com'),
(4, 'gfd', '1234', 'sdgs', 'gd', 'fdg'),
(5, 'xz', '111', 'sa', 'sas', 'das'),
(6, 'gadha', '1234', 'gadha', 'goru', 'goru!cse.uiu.ac.bd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_user_info`
--
ALTER TABLE `card_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
