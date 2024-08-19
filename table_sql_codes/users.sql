-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 11:50 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', NULL, '$2y$10$WUHY9zakB.gAOLg0n4vZNOUS1oeYYwAP3bR56wRPCQ1WBzegVdOGK', NULL, NULL, NULL),
(2, 'nesrine', 'nesrine.abdelhak@ensia.edu.dz', NULL, '$2y$10$Jb3DQ0yEVaWPaqUMDrN9ceq0fxNfFX58d5dnXGS3JkirAeu4MXbgW', NULL, NULL, NULL),
(3, 'nesrine', 'nesrineabdelhak7@gmail.com', NULL, '$2y$10$FCDIJzTb.IEE0FeMe2IACOCxdwfSzJpZgteCCm2mqRFsJo5uGtqxC', NULL, NULL, NULL),
(4, 'nesrine', 'nessabdelhak@gmail.com', NULL, '$2y$10$JhTF.nXwoUCIWYfhmG8rp.IrPdHZCN4IVp26l/V5k4JbYG04G/WC6', NULL, NULL, NULL),
(5, 'nesrine', 'nesrine@gmail.com', NULL, '$2y$10$9W9aVyen43fQAhtVv5NyFe3twa3Vpotu9yaody58XMyV0zTa51oNW', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
