-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 10:50 AM
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
-- Table structure for table `card_user_info`
--

CREATE TABLE `card_user_info` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `family_size` varchar(100) NOT NULL,
  `upazilla` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `division` varchar(100) NOT NULL,
  `registration_date` date NOT NULL,
  `last_relief_date` date NOT NULL,
  `relief_collected` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_user_info`
--

INSERT INTO `card_user_info` (`name`, `id`, `nid`, `gender`, `family_size`, `upazilla`, `district`, `division`, `registration_date`, `last_relief_date`, `relief_collected`) VALUES
('Reyad Khan', '02345814', '1235478956', 'Male', '4', 'Begumganj', 'Noakhali', 'Chittagong', '2020-04-05', '2020-04-11', 4),
('Shipra', 'Y24563', '258471369', 'Female', '5', 'Baniachang', 'Habiganj', 'Sylhet ', '2020-04-15', '2020-05-03', 4),
('Rashed', '66522', '55952', 'Male', '2', 'Bhaluka', 'Mymensingh', 'Mymensingh', '2020-05-04', '2020-05-04', 1),
('Al Amin', '14855251', '58469745213', 'Male', '5', 'Mithapukur', 'Rangpur', 'Rangpur', '2020-04-10', '2020-04-11', 5),
('Afsar Ahmed', 'AE645', '789456123', 'Male', '3', 'Bagerhat Sadar', 'Bagerhat', 'Khulna', '2020-05-04', '2020-05-03', 3),
('Polash Kumar', '2ck669', '7895463215', 'Male', '4', 'Gopalpur', 'Tangail', 'Dhaka', '2020-04-09', '2020-04-10', 10),
('Proshanta Kumer', '014F8F', '793652798', 'Male', '3', 'Gopalpur', 'Tangail', 'Dhaka', '2020-04-04', '2020-05-03', 1),
('Tanim Kabir', '024ER020', '7936527988', 'Female', '3', 'Daganbhuiyan', 'Feni', 'Chittagong', '2020-04-04', '2020-04-11', 3),
('Afsar Ali', '02345185', '7936527989', 'Male', '7', 'Daudkandi', 'Comilla', 'Chittagong', '2020-04-03', '2020-04-17', 7),
('anik', '32546', '85601566', 'Male', '6', 'Barisal', 'Barisal', 'Barisal', '2020-05-04', '2020-05-04', 1),
('Sakib Mahmud', '1010101', '8705618963', 'Male', '3', 'Daganbhuiyan', 'Feni', 'Chittagong', '2020-04-03', '2020-04-11', 3),
('Anik Shahriar', '02345145', '8705618965', 'Male', '4', 'Ghatail', 'Tangail', 'Dhaka', '2020-04-02', '2020-04-18', 4),
('Mreedul Ahmed', 'F208D22E', '8888888', 'Male', '7', 'Faridpur', 'Pabna', 'Rajshahi', '2020-04-04', '2020-04-28', 3),
('Abdus Samad', '014F8F2E', '9632587412', 'Male', '2', 'Chauddagram', 'Chittagong', 'Chittagong', '2020-04-01', '2020-05-04', 1),
('Shoyon', '524552', '9982375220', 'Male', '6', 'Alamdanga', 'Chuadanga', 'Khulna', '2020-05-02', '2020-05-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `nid_birth_certificate` varchar(255) NOT NULL,
  `house` varchar(255) DEFAULT NULL,
  `road` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `district` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `admission_date` date NOT NULL,
  `admission_status` varchar(255) NOT NULL,
  `release_date` date DEFAULT NULL,
  `critical_status` varchar(255) DEFAULT NULL,
  `living_status` varchar(255) DEFAULT 'alive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patient_id`, `last_name`, `first_name`, `age`, `nid_birth_certificate`, `house`, `road`, `area`, `district`, `zipcode`, `division`, `admission_date`, `admission_status`, `release_date`, `critical_status`, `living_status`) VALUES
(1, 'Ahmed', 'Fakhruddin', 50, '33840991', '1', '10', 'Banani', 'Dhaka', '1213', 'Dhaka', '2020-04-04', 'admitted', NULL, 'yes', 'alive'),
(2, 'Bhottacharjyo', 'Priyanka', 51, '948989441', '11', '5', 'Gulshan', 'Dhaka', '1213', 'Dhaka', '2020-04-16', 'admitted', NULL, 'no', 'alive'),
(3, 'Hossain', 'Sayed', 30, '149949489', '', '', 'Badda', 'Dhaka', '1212', 'Dhaka', '2020-04-07', 'admitted', NULL, 'no', 'alive'),
(4, 'Farid', 'Dewan', 41, '318744780', '', '', 'Rangpur', 'Kurigram', '5660', 'Rangpur', '2020-04-15', 'admitted', NULL, 'yes', 'dead'),
(5, 'Rouf', 'Abdur', 56, '489913939', '', '', 'Cumilla', 'Daudkandi', '3516', 'Chittagong', '2020-04-12', 'admitted', NULL, 'yes', 'alive'),
(6, 'Howladar', 'Anika', 29, '8129203', '10', '30', 'Khulna', 'jhenaidah ', '7320', 'Khulna', '2020-04-12', 'released', '2020-04-19', 'no', 'dead'),
(7, 'Deb', 'Nandita', 72, '9193903', '', '', 'Rajshahi', 'Natore', '6400', 'Rajshahi', '2020-04-02', 'released', '2020-04-09', 'no', 'alive'),
(8, 'Dey', 'Pranto', 19, '21333893', '', '', 'Dhaka', 'Manikganj', '1801', 'Dhaka', '2020-04-03', 'released', '2020-04-15', 'no', 'dead'),
(9, 'Chottopadhyay', 'Tonni', 21, '91939803', '50', '3', 'Uttara', 'Dhaka', '1230', 'Dhaka', '2020-04-15', 'released', '2020-04-19', 'no', 'dead'),
(10, 'Ahmed', 'Moeen', 31, '1930903', '', '', 'Mohakhali', 'Dhaka', '1212', 'Dhaka', '2020-04-09', 'released', '2020-04-12', 'no', 'alive'),
(11, 'Azad', 'Humayun', 70, '303840991', '', '', 'Baridhara', 'Dhaka', '1212', 'Dhaka', '2020-04-04', 'admitted', NULL, 'yes', 'alive'),
(12, 'Azam', 'Golam', 81, '939839009', '30', '1', 'Tangail', 'Ghatail', '1980', 'Dhaka', '2020-04-16', 'admitted', NULL, 'no', 'dead'),
(13, 'Mannan', 'Abdul', 41, '50390903', '33', '1', 'Dhaka', 'Gazipur', '1702', 'Dhaka', '2020-04-07', 'admitted', NULL, 'no', 'dead'),
(14, 'Hossain', 'Moazzen', 55, '90390330', '', '', 'Dhaka', 'Kishoreganj', '2300', 'Dhaka', '2020-04-15', 'admitted', NULL, 'yes', 'alive'),
(15, 'Mamun', 'Muntasie', 58, '5390903', '5', '1', 'Rangpur', 'Nilphamari', '5300', 'Rangpur', '2020-04-12', 'admitted', NULL, 'yes', 'dead'),
(16, 'Islam', 'Mirajul', 50, '60960009', '', '', 'Dhaka', 'Manikganj', '1801', 'Dhaka', '2020-04-12', 'released', '2020-04-19', '', 'alive'),
(17, 'Rahman', 'Latifur', 61, '95908585', '', '', 'Khulna', 'Jessore', '7400', 'Khulna', '2020-04-02', 'released', '2020-04-09', '', 'alive'),
(18, 'Rahman', 'Zillur', 41, '65757595', '', '', 'Rajshahi', 'Pabna', '6600', 'Rajshahi', '2020-04-03', 'released', '2020-04-15', '', 'dead'),
(19, 'Sattar', 'Abdus', 72, '959587585', '2', '1', 'Dhaka', 'Baridhara', '1212', 'Dhaka', '2020-04-15', 'released', '2020-04-19', '', 'dead'),
(20, 'Yunus', 'Mohammad', 53, '858588505', '', '', 'Barisal', 'Jhalokati', '8400', 'Barisal', '2020-04-09', 'released', '2020-04-12', '', 'alive');
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
(1, 'faizah', '4321', 'Faizah', 'Anika', 'faizah@gmail.com'),
(2, 'admin', '1234', 'Admin', 'User', 'admin@gmail.com'),
(3, 'anik', '1234', 'Anik', 'Ahmed', 'ahmed@gmail.com'),
(4, 'sabrina', '1111', 'Sabrina', 'Sara', 'sabrina@gmail.com'),
(5, 'anika', '0000', 'Anika', 'Tahsin', 'anika@gmail.com'),
(6, 'sayed', 'abcd', 'Sayed', 'Kabir', 'sayedkabir@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_user_info`
--
ALTER TABLE `card_user_info`
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `nid_birth_certificate` (`nid_birth_certificate`);

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
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
