-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 02, 2023 at 09:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_one_page_concept`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(21) NOT NULL,
  `complete_name` varchar(500) NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `complete_name`, `phone`, `address`) VALUES
(6, 'Elvie Dolera', '09051483238', 'Sua-igot'),
(7, 'Elvie Dolera', '09051483238', 'Sua-igot'),
(8, 'Elvie Dolera', '09051483238', 'Sua-igot'),
(9, 'Juan Dela Torre', '09062532323', 'Malinao'),
(10, 'Yoni', 'Yoni', 'Yoni'),
(11, 'Juan Dela Cruz', '12333434', 'Sua-igot'),
(12, 'tea', 'tea', 'tea'),
(13, '33', '33', '3'),
(16, '33', '33', '3'),
(19, 'bbb', 'bbb', 'bbb'),
(21, 'c', 'c', 'c'),
(22, 'Elvie C. Dolera', '09051451233', 'Sua-igot'),
(23, 'Yoni Netanyahu C. Dolera', '09051483238', 'Sua-igot Tabaco City Albay'),
(24, 'Ivan M. Dolera', '09051483235', 'Sua-igot Tabaco City Albay'),
(25, 'Ivan M. Dolera4', '09051483235', 'Sua-igot Tabaco City Albay'),
(26, 'Jvan', 'Jvan', 'Jvan'),
(27, 'Lizamae', '112121', '121212');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `birthday` int(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` int(30) DEFAULT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
