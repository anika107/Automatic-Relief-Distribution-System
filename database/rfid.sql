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
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nid` varchar(100) UNIQUE NOT NULL,
  `gender` varchar(100) NOT NULL,
  `family_size` int(11) NOT NULL,
  `upazilla` varchar(255),
  `district` varchar(255) NOT NULL,
  `division` varchar(100) NOT NULL,
  `registration_date` date NOT NULL,
  `last_relief_date` date NOT NULL,
  `relief_collected` int(100)
);

--
-- Dumping data for table `card_user_info`
--

INSERT INTO `card_user_info` (`name`, `nid`, `gender`, `family_size`, `upazilla`, `district`, `division`, `registration_date`, `last_relief_date`, `relief_collected`) VALUES
('Abdus Samad', '9632587412', 'Male', '2', 'Chauddagram', 'Chittagong', 'Cumilla', '2020-04-01', '2020-04-11', 2),
('Anik Shahriar', '8705618965', 'Male', '4', 'Ghatail', 'Dhaka', 'Tangail', '2020-04-02', '2020-04-18', 4),
('Afsar Ali', '7936527989', 'Male', '7', 'Daudkandi', 'Chittagong', 'Cumilla', '2020-04-03', '2020-04-17', 7),
('Proshanta Kumar', '793652798', 'Male', '3', 'Gopalpur', 'Dhaka', 'Tangail', '2020-04-04', '2020-04-15', 1),
('Mreedul Ahmed', '8888888', 'Male', '7', 'Faridpur', 'Rajshahi', 'Pabna', '2020-04-04', '2020-04-11', 7),
('Reyad Khan', '1235478956', 'Male', '4', 'Begumganj', 'Chittagong', 'Noakhali', '2020-04-05', '2020-04-11', 4),
('Tanim Kabir', '7936527988', 'Female', '3', 'Daganbhuiyan', 'Chittagong', 'Feni', '2020-04-04', '2020-04-11', 3),
('Sakib Mahmud', '8705618963', 'Male', '3', 'Daganbhuiyan', 'Chittagong', 'Feni', '2020-04-03', '2020-04-11', 3),
('Al Amin', '58469745213', 'Male', '5', 'Mithapukur', 'Rangpur', 'Rangpur', '2020-04-10', '2020-04-11', 5),
('Polash Kumar', '7895463215', 'Male', '4', 'Gopalpur', 'Mymensingh', 'Tangail', '2020-04-09', '2020-04-10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `nid_birth_certificate` varchar(255) UNIQUE NOT NULL,
  `house` varchar(255),
  `road` varchar(255),
  `area` varchar(255),
  `district` varchar(255) NOT NULL,
  `zipcode` varchar(255),
  `city` varchar(255),
  `admission_date` date NOT NULL,
  `admission_status` varchar(255) NOT NULL,
  `release_date` date,
  `critical_status` varchar(255),
  `living_status` varchar(255) DEFAULT 'alive'
);


--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`last_name`, `first_name`, `age`, `nid_birth_certificate`, `house`, `road`, `area`, `district`, `zipcode`, `city`, `admission_date`, `admission_status`, `release_date`, `critical_status`, `living_status`) VALUES
('Ahmed', 'Fakhruddin', 50, 033840991, '1', '10', 'Banani', 'Dhaka', '1213', 'Dhaka', '2020-04-04', 'admitted', NULL, 'yes', 'alive'),
('Bhottacharjyo', 'Priyanka', 51, 948989441, '11', '5', 'Gulshan', 'Dhaka', '1213', '', '2020-04-16', 'admitted', NULL, 'no', 'alive'),
('Hossain', 'Sayed', 30, 149949489, '', '', 'Badda', 'Dhaka', '1212', '', '2020-04-07', 'admitted', NULL, 'no', 'alive'),
('Farid', 'Dewan', 41, 318744780, '', '', 'Rangpur', 'Kurigram', '5660', 'Rangpur', '2020-04-15', 'admitted', NULL, 'yes', 'dead'),
('Rouf', 'Abdur', 56, 489913939, '', '', 'Cumilla', 'Daudkandi', '3516', '', '2020-04-12', 'admitted', NULL, 'yes', 'alive'),
('Howladar', 'Anika', 29, 8129203, '10', '30', 'Khulna', 'jhenaidah ', '7320', '', '2020-04-12', 'released', '2020-04-19', 'no', 'dead'),
('Deb', 'Nandita', 72, 9193903, '', '', 'Rajshahi', 'Natore', '6400', '', '2020-04-02', 'released', '2020-04-09', 'no', 'alive'),
('Dey', 'Pranto', 19, 21333893, '', '', 'Dhaka', 'Manikganj', '1801', '', '2020-04-03', 'released', '2020-04-15', 'no', 'dead'),
('Chottopadhyay', 'Tonni', 21, 91939803, '50', '3', 'Uttara', 'Dhaka', '1230', 'Dhaka', '2020-04-15', 'released', '2020-04-19', 'no', 'dead'),
('Ahmed', 'Moeen', 31, 1930903, '', '', 'Mohakhali', 'Dhaka', '1212', '', '2020-04-09', 'released', '2020-04-12', 'no', 'alive'),
('Azad', 'Humayun', 70, 0303840991, '', '', 'Baridhara', 'Dhaka', '1212', '', '2020-04-04', 'admitted', NULL, 'yes', 'alive'),
('Azam', 'Golam', 81, 939839009, '30', '1', 'Tangail', 'Ghatail', '1980', '', '2020-04-16', 'admitted', NULL, 'no', 'dead'),
('Mannan', 'Abdul', 41, 50390903, '33', '1', 'Dhaka', 'Gazipur', '1702', 'Dhaka', '2020-04-07', 'admitted', NULL, 'no', 'dead'),
('Hossain', 'Moazzen', 55, 90390330, '', '', 'Dhaka', 'Kishoreganj', '2300', '', '2020-04-15', 'admitted', NULL, 'yes', 'alive'),
('Mamun', 'Muntasie', 58, 5390903, '5', '1', 'Rangpur', 'Nilphamari', '5300', 'Rangpur', '2020-04-12', 'admitted', NULL, 'yes', 'dead'),
('Islam', 'Mirajul', 50, 060960009, '', '', 'Dhaka', 'Manikganj', '1801', '', '2020-04-12', 'released', '2020-04-19', '', 'alive'),
('Rahman', 'Latifur', 61, 95908585, '', '', 'Khulna', 'Jessore', '7400', '', '2020-04-02', 'released', '2020-04-09', '', 'alive'),
('Rahman', 'Zillur', 41, 65757595, '', '', 'Rajshahi', 'Pabna', '6600', 'Rajshahi', '2020-04-03', 'released', '2020-04-15', '', 'dead'),
('Sattar', 'Abdus', 72, 959587585, '2', '1', 'Dhaka', 'Baridhara', '1212', '', '2020-04-15', 'released', '2020-04-19', '', 'dead'),
('Yunus', 'Mohammad', 53, 858588505, '', '', 'Barisal', 'Jhalokati', '8400', '', '2020-04-09', 'released', '2020-04-12', '', 'alive');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE
)

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`) VALUES
('laboni12', 'aaaa', 'Laboni', 'Ahmed', 'laboni@gmail.com'),
('anika22', '1234', 'Anika', 'Tahsin', 'anika22@gmail.com'),
('sabrina', '456', 'Sabrina', 'Jannat', 'sabrina212@gmail.com'),
('mamun2', '1234', 'Mamun', 'Abdullah', 'mamunabdullah3@gmail.com'),
('anika3', '111', 'Faiza', 'Anika', 'anika@gmail.com'),
('sayed', '1234', 'Sayed', 'Kabir', 'kabir@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_user_info`
--
-- Indexes for table `patient_info`


--
-- Indexes for table `users`
--
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `username` (`username`),
--   ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_info`
--
-- ALTER TABLE `patient_info`
--   MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
-- ALTER TABLE `users`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
