-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 11:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myinternship`
--

-- --------------------------------------------------------

--
-- Table structure for table `establishement`
--

CREATE TABLE `establishement` (
  `id_establishement` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `profissional_email` varchar(50) NOT NULL,
  `establishement_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `establishement`
--

INSERT INTO `establishement` (`id`, `username`, `profissional_email`, `establishement_name`, `position`, `phone_number`, `pass`, `create_datetime`) VALUES
(1, 'Nesrine Abdelhak', 'nesrine.abdelhak@ensia.edu.dz', 'hihi', 'manager', '12345678', '12345678', '0000-00-00 00:00:00'),
(10, 'nesrine', 'nesrine@gmail.com', 'internship', 'manager', '06765456', '12345678', '0000-00-00 00:00:00'),
(11, 'ness', 'ness@gmail.com', 'inter', 'manager', '12345678', '1234567', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `establishement`
--
ALTER TABLE `establishement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `establishement`
--
ALTER TABLE `establishement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
