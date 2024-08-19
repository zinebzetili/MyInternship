-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 mai 2023 à 02:33
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myinternship`
--

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

CREATE TABLE `applications` (
  `ID_application` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  `ID_provider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `ID_category` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `establishement`
--

CREATE TABLE `establishement` (
  `id_establishement` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `profissional_email` varchar(50) NOT NULL,
  `establishement_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `bio` varchar(400) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `establishement`
--

INSERT INTO `establishement` (`id_establishement`, `username`, `profissional_email`, `establishement_name`, `position`, `phone_number`, `pass`, `bio`, `create_datetime`, `profile_pic`) VALUES
(20, 'Nesrine12', 'ness@gmail.com', 'ensia', 'manager', '123456', 'qwerty123', '', '2023-04-28 14:10:20', ''),
(21, 'Nesrine Abdelhak', 'zineb@ensia.edu.dz', 'company', 'manager', '12345678', '1234', NULL, '2023-05-02 15:28:40', ''),
(22, 'ness', 'nes@gmail.com', 'here', 'here', '0876543', '12345678', NULL, '2023-05-02 16:06:58', '');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id_files` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id_files`, `file_name`, `file_path`, `file_type`, `file_size`, `id`, `uploaded_at`) VALUES
(1, 'ETCode_report.docx.pdf', 'uploads/ETCode_report.docx.pdf', 'application/pdf', 161152, 1, '2023-04-26 20:32:53'),
(2, 'ETCode_report.docx.pdf', 'uploads/ETCode_report.docx.pdf', 'application/pdf', 161152, 1, '2023-04-26 20:33:19'),
(3, 'ETCode_report.docx.pdf', 'uploads/ETCode_report.docx.pdf', 'application/pdf', 161152, 1, '2023-04-26 21:21:44'),
(4, 'html_css_team2_4.pdf', 'uploads/html_css_team2_4.pdf', 'application/pdf', 53002, 1, '2023-04-27 09:12:07'),
(5, 'The midterm.pdf', 'uploads/The midterm.pdf', 'application/pdf', 256579, 1, '2023-04-28 11:04:24'),
(6, 'The midterm.pdf', 'uploads/The midterm.pdf', 'application/pdf', 256579, 1, '2023-04-28 18:29:57'),
(7, 'php_submission_team2_4.pdf', 'uploads/php_submission_team2_4.pdf', 'application/pdf', 31652, 27, '2023-05-02 11:14:21'),
(8, 'Capture.PNG', 'uploads/Capture.PNG', 'image/png', 28149, 28, '2023-05-02 11:29:39'),
(9, 'download.jpg', 'uploads/download.jpg', 'image/jpeg', 10904, 29, '2023-05-02 14:25:28'),
(10, 'anaconda.txt', 'uploads/anaconda.txt', 'text/plain', 171, 30, '2023-05-28 23:46:31'),
(11, 'download.jpg', 'uploads/download.jpg', 'image/jpeg', 10904, 31, '2023-05-29 00:01:35');

-- --------------------------------------------------------

--
-- Structure de la table `internship`
--

CREATE TABLE `internship` (
  `ID_internship` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `field` varchar(200) DEFAULT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `salary` int(20) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  `id_establishement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `internship`
--

INSERT INTO `internship` (`ID_internship`, `title`, `description`, `field`, `website_link`, `location`, `start_date`, `end_date`, `salary`, `create_datetime`, `id_establishement`) VALUES
(42, '', '', '', '', '', '1970-01-01', '1970-01-01', 0, '2023-05-28 22:09:57', 20),
(43, 'title', 'desc', 'ai', 'linklink', 'location', '2023-05-28', '2023-05-31', 12000, '2023-05-28 22:21:14', 20),
(44, 'Marketing Intern', 'This is a description for internship 1', NULL, 'https://example.com/internship-1', 'Annaba', '2023-09-02', '2023-12-01', 10425, '2023-04-28 10:31:19', 20),
(45, 'Finance Intern', 'This is a description for internship 2', NULL, 'https://example.com/internship-2', 'Constantine', '2023-01-20', '2023-02-19', 8768, '2023-04-28 10:31:19', 20),
(46, 'Marketing Intern', 'This is a description for internship 3', NULL, 'https://example.com/internship-3', 'Constantine', '2023-05-10', '2023-06-09', 14715, '2023-04-28 10:31:19', 20),
(47, 'Software Development Intern', 'This is a description for internship 4', NULL, 'https://example.com/internship-4', 'Setif', '2023-12-05', '2024-04-03', 12809, '2023-04-28 10:31:19', 20),
(48, 'Graphic Design Intern', 'This is a description for internship 5', NULL, 'https://example.com/internship-5', 'Setif', '2023-12-09', '2024-02-07', 9721, '2023-04-28 10:31:19', 20),
(49, 'Marketing Intern', 'This is a description for internship 6', NULL, 'https://example.com/internship-6', 'Annaba', '2023-04-28', '2023-08-26', 6751, '2023-04-28 10:31:19', 20),
(50, 'Marketing Intern', 'This is a description for internship 1', NULL, 'https://example.com/internship-1', 'Setif', '2023-03-17', '2023-06-15', 12202, '2023-04-28 10:31:25', 20),
(51, 'Graphic Design Intern', 'This is a description for internship 2', NULL, 'https://example.com/internship-2', 'Annaba', '2023-05-21', '2023-09-18', 7899, '2023-04-28 10:31:25', 20),
(52, 'Software Development Intern', 'This is a description for internship 3', NULL, 'https://example.com/internship-3', 'Algiers', '2023-05-17', '2023-07-16', 14546, '2023-04-28 10:31:25', 20),
(53, 'Marketing Intern', 'This is a description for internship 4', NULL, 'https://example.com/internship-4', 'Annaba', '2023-02-10', '2023-07-10', 5204, '2023-04-28 10:31:25', 20),
(54, 'Software Development Intern', 'This is a description for internship 5', NULL, 'https://example.com/internship-5', 'Constantine', '2023-04-01', '2023-09-28', 14602, '2023-04-28 10:31:25', 20),
(55, 'Graphic Design Intern', 'This is a description for internship 6', NULL, 'https://example.com/internship-6', 'Constantine', '2023-04-13', '2023-08-11', 6420, '2023-04-28 10:31:25', 20),
(56, 'Finance Intern', 'This is a description for internship ID 81', NULL, 'https://example.com/internship-81', 'Setif', '2023-06-21', '2023-12-18', 7348, '2023-04-28 10:39:18', 20),
(57, 'Graphic Design Intern', 'This is a description for internship ID 68', NULL, 'https://example.com/internship-68', 'Setif', '2023-10-14', '2024-03-12', 9828, '2023-04-28 10:39:18', 20),
(58, 'Finance Intern', 'This is a description for internship ID 4', NULL, 'https://example.com/internship-4', 'Setif', '2023-03-12', '2023-09-08', 13489, '2023-04-28 10:39:18', 20),
(59, 'Software Development Intern', 'This is a description for internship ID 75', NULL, 'https://example.com/internship-75', 'Annaba', '2023-01-13', '2023-04-13', 8932, '2023-04-28 10:39:18', 20),
(60, 'Finance Intern', 'This is a description for internship ID 46', NULL, 'https://example.com/internship-46', 'Oran', '2023-11-15', '2024-01-14', 10598, '2023-04-28 10:39:18', 20),
(61, 'Software Development Intern', 'This is a description for internship ID 76', NULL, 'https://example.com/internship-76', 'Algiers', '2023-04-01', '2023-07-30', 14892, '2023-04-28 10:39:18', 20);

-- --------------------------------------------------------

--
-- Structure de la table `interview`
--

CREATE TABLE `interview` (
  `ID_interview` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs_part`
--

CREATE TABLE `jobs_part` (
  `ID_jobs_part` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `field` varchar(200) DEFAULT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `position` varchar(20) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `id_establishement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `scholarships`
--

CREATE TABLE `scholarships` (
  `ID_scholarships` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `field` int(200) DEFAULT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `id_establishement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scholarships`
--

INSERT INTO `scholarships` (`ID_scholarships`, `title`, `description`, `field`, `website_link`, `location`, `start_date`, `end_date`, `type`, `create_datetime`, `id_establishement`) VALUES
(13, '', '', 0, '', '', '1970-01-01', '1970-01-01', '', '2023-05-28 22:14:52', 20),
(14, '', '', 0, '', '', '1970-01-01', '1970-01-01', '', '2023-05-28 22:15:36', 20),
(15, '', '', 0, '', '', '1970-01-01', '1970-01-01', '', '2023-05-28 22:17:00', 20),
(16, 'scholarship', 'desci', 0, 'link', 'location', '2023-05-21', '2023-05-30', '12000', '2023-05-28 22:22:00', 20),
(27, 'Scholarship 2', 'Description 4', NULL, 'http://www.scholarship1.com', 'Location 5', '2023-05-28', '2023-06-27', 'Partially Funded', '2023-04-28 11:05:09', 20),
(28, 'Scholarship 2', 'Description 4', NULL, 'http://www.scholarship2.com', 'Location 2', '2023-06-27', '2023-07-27', 'Fully Funded', '2023-04-28 11:05:09', 20),
(29, 'Scholarship 3', 'Description 4', NULL, 'http://www.scholarship3.com', 'Location 2', '2023-07-27', '2023-08-26', 'Partially Funded', '2023-04-28 11:05:09', 20),
(30, 'Scholarship 2', 'Description 4', NULL, 'http://www.scholarship4.com', 'Location 1', '2023-08-26', '2023-09-25', 'Partially Funded', '2023-04-28 11:05:09', 20),
(31, 'Scholarship 5', 'Description 1', NULL, 'http://www.scholarship5.com', 'Location 1', '2023-09-25', '2023-10-25', 'Fully Funded', '2023-04-28 11:05:09', 20),
(32, 'Scholarship 2', 'Description 2', NULL, 'http://www.scholarship6.com', 'Location 5', '2023-10-25', '2023-11-24', 'Fully Funded', '2023-04-28 11:05:09', 20),
(33, 'Scholarship 2', 'Description 1', NULL, 'http://www.scholarship7.com', 'Location 1', '2023-11-24', '2023-12-24', 'Partially Funded', '2023-04-28 11:05:09', 20),
(34, 'Scholarship 4', 'Description 5', NULL, 'http://www.scholarship8.com', 'Location 4', '2023-12-24', '2024-01-23', 'Fully Funded', '2023-04-28 11:05:09', 20),
(35, 'Scholarship 3', 'Description 2', NULL, 'http://www.scholarship9.com', 'Location 4', '2024-01-23', '2024-02-22', 'Partially Funded', '2023-04-28 11:05:09', 20),
(36, 'Scholarship 3', 'Description 4', NULL, 'http://www.scholarship10.com', 'Location 5', '2024-02-22', '2024-03-23', 'Partially Funded', '2023-04-28 11:05:09', 20);

-- --------------------------------------------------------

--
-- Structure de la table `talks`
--

CREATE TABLE `talks` (
  `ID_talks` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `field` varchar(200) DEFAULT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  `id_establishement` int(11) NOT NULL,
  `talk_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `talks`
--

INSERT INTO `talks` (`ID_talks`, `name`, `description`, `field`, `website_link`, `location`, `create_datetime`, `id_establishement`, `talk_date`) VALUES
(12, '', '', '', '', '', '2023-05-28 22:16:27', 20, '1970-01-01'),
(13, 'hudguwd', 'udwdwi', 'ai', 'qwidqwiodj', 'qwjioqwdj', '2023-05-28 22:22:37', 20, '2023-05-28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `edu_level` varchar(255) DEFAULT NULL,
  `study_year` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `skills` varchar(400) DEFAULT NULL,
  `job` varchar(200) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `bio_student` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `edu_level`, `study_year`, `field`, `description`, `university`, `skills`, `job`, `company_name`, `bio_student`) VALUES
(1, '', '', NULL, '$2y$10$WUHY9zakB.gAOLg0n4vZNOUS1oeYYwAP3bR56wRPCQ1WBzegVdOGK', NULL, '2023-04-28 18:29:57', '2023-04-28 18:29:57', 'bachlor degree', '', '', '', '', NULL, NULL, NULL, NULL),
(3, 'nesrine', 'nesrineabdelhak7@gmail.com', NULL, '$2y$10$FCDIJzTb.IEE0FeMe2IACOCxdwfSzJpZgteCCm2mqRFsJo5uGtqxC', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'nesrine', 'nessabdelhak@gmail.com', NULL, '$2y$10$JhTF.nXwoUCIWYfhmG8rp.IrPdHZCN4IVp26l/V5k4JbYG04G/WC6', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'nesrine', 'nesrine@gmail.com', NULL, '$2y$10$9W9aVyen43fQAhtVv5NyFe3twa3Vpotu9yaody58XMyV0zTa51oNW', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'nesrine', 'nesrine12@gmail.com', NULL, '$2y$10$yasybaKJT10.TER0hJtUjOqyL7kGDp6c36n/1cmEn2TnOYeSFNhzC', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'nesrine abdelhak', 'nesrine123@gmail.com', NULL, '$2y$10$mMOxyfGjIFjvyeuujFgsCunqrhpd.Pk0dGYNcvIv7Kjk0QZizcKya', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'nesrine abdelhak', 'nesrine13@gmail.com', NULL, '$2y$10$6ehREgaxNu/TqJPRN6OxMOgnj6jBzBFOs3MSyWBZuxS2/AnN40SaO', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'nesrine', 'nesrine.abdelhak123456@ensia.edu.dz', NULL, '12345678', NULL, '2023-04-25 08:35:51', '2023-04-25 08:35:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'nesrine', 'nesrine.abdelhak123@ensia.edu.dz', NULL, '12345678', NULL, '2023-04-25 15:40:18', '2023-04-25 15:40:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'nesrine', 'nesrineabdelhak17@gmail.com', NULL, '12345678', NULL, '2023-04-25 15:41:54', '2023-04-25 15:41:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'nesrine abdelhak', 'nesrineabdelhak18@gmail.com', NULL, '123', NULL, '2023-04-25 18:04:24', '2023-04-25 18:04:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'nesrine', 'nesrine.abdelhak12@ensia.edu.dz', NULL, '123', NULL, '2023-04-26 06:10:20', '2023-04-26 06:10:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'nesrine', 'nesrine.abdelhak19@ensia.edu.dz', NULL, '123456', NULL, '2023-04-26 20:32:06', '2023-04-26 20:32:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'nesrine', 'nesrine.abdelhak1905@ensia.edu.dz', NULL, '1234', NULL, '2023-04-26 21:21:14', '2023-04-26 21:21:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'nesrine abdelhak', 'nesrineabdelhak171@gmail.com', NULL, '12345678', NULL, '2023-04-27 09:11:09', '2023-04-27 09:11:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'nesrine', 'nesrine.abdelhak10@ensia.edu.dz', NULL, '123456', NULL, '2023-04-28 11:03:24', '2023-04-28 11:03:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'nesrine', 'nesrine1233@gmail.com', NULL, '1234', NULL, '2023-04-28 13:08:53', '2023-04-28 13:08:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'nesrine', 'nesrine.abdelhak1900@ensia.edu.dz', NULL, '1234', NULL, '2023-04-28 18:29:33', '2023-04-28 18:29:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'nesrine', 'ne@gmail.com', NULL, '1234', NULL, '2023-05-02 09:01:29', '2023-05-02 09:01:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'nesrine', 'nes@gmail.com', NULL, '1234', NULL, '2023-05-02 09:03:18', '2023-05-02 09:03:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'nesrine', 'nesrie@gmail.com', NULL, '123', NULL, '2023-05-02 10:52:54', '2023-05-02 10:52:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'nesrine', 'nesri@gmail.com', NULL, '123', NULL, '2023-05-02 10:59:49', '2023-05-02 10:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'nesrine', 'nesrine.abd@ensia.edu.dz', NULL, '123', NULL, '2023-05-02 11:00:28', '2023-05-02 11:00:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'nesrine', 'nesrine.abdelhak@ensia.edu.dz', NULL, '123', NULL, '2023-05-02 11:14:21', '2023-05-02 11:14:21', 'bachlor degree', '', '', '', '', NULL, NULL, NULL, NULL),
(28, 'ness', 'nesrine.abdelhak11@ensia.edu.dz', NULL, '123', NULL, '2023-05-02 11:29:39', '2023-05-02 11:29:39', 'bachlor degree', '2nd year ', 'ai ', 'here', 'National school of artificial intelligence', NULL, NULL, NULL, NULL),
(29, 'nesrine', 'sara@gmail.com', NULL, '12345678', NULL, '2023-05-02 14:25:28', '2023-05-02 14:25:28', 'bachlor degree', '2nd year ', 'ai', '', 'National school of artificial intelligence', NULL, NULL, NULL, NULL),
(30, 'nesrine abdelhak', 'nesrine.abdelhak@gmail.com', NULL, '12345678', NULL, '2023-05-28 23:46:31', '2023-05-28 23:46:31', 'bachlor degree', '2nd year ', 'ai ', 'weweuifguwf', 'National school of artificial intelligence', NULL, NULL, NULL, NULL),
(31, 'sarah', 'mahmoudi@gmail.com', NULL, 'qwerty', NULL, '2023-05-29 00:01:35', '2023-05-29 00:01:35', 'bachlor degree', '2nd year ', 'ai ', 'intersting wevygyuew', 'National school of artificial intelligence', 'front ,back,full,databases', 'fullstack', 'the national higher school of artificial intelligence ', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ID_application`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_category`);

--
-- Index pour la table `establishement`
--
ALTER TABLE `establishement`
  ADD PRIMARY KEY (`id_establishement`),
  ADD UNIQUE KEY `profissional_email` (`profissional_email`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_files`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`ID_internship`),
  ADD KEY `id_establishement` (`id_establishement`);

--
-- Index pour la table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`ID_interview`);

--
-- Index pour la table `jobs_part`
--
ALTER TABLE `jobs_part`
  ADD PRIMARY KEY (`ID_jobs_part`),
  ADD KEY `id_establishement` (`id_establishement`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`ID_scholarships`),
  ADD KEY `id_establishement` (`id_establishement`);

--
-- Index pour la table `talks`
--
ALTER TABLE `talks`
  ADD PRIMARY KEY (`ID_talks`),
  ADD KEY `id_establishement` (`id_establishement`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `applications`
--
ALTER TABLE `applications`
  MODIFY `ID_application` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `ID_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `establishement`
--
ALTER TABLE `establishement`
  MODIFY `id_establishement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `internship`
--
ALTER TABLE `internship`
  MODIFY `ID_internship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `interview`
--
ALTER TABLE `interview`
  MODIFY `ID_interview` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs_part`
--
ALTER TABLE `jobs_part`
  MODIFY `ID_jobs_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `ID_scholarships` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `talks`
--
ALTER TABLE `talks`
  MODIFY `ID_talks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`id_establishement`) REFERENCES `establishement` (`id_establishement`) ON DELETE CASCADE;

--
-- Contraintes pour la table `jobs_part`
--
ALTER TABLE `jobs_part`
  ADD CONSTRAINT `jobs_part_ibfk_1` FOREIGN KEY (`id_establishement`) REFERENCES `establishement` (`id_establishement`) ON DELETE CASCADE;

--
-- Contraintes pour la table `scholarships`
--
ALTER TABLE `scholarships`
  ADD CONSTRAINT `scholarships_ibfk_1` FOREIGN KEY (`id_establishement`) REFERENCES `establishement` (`id_establishement`) ON DELETE CASCADE;

--
-- Contraintes pour la table `talks`
--
ALTER TABLE `talks`
  ADD CONSTRAINT `talks_ibfk_1` FOREIGN KEY (`id_establishement`) REFERENCES `establishement` (`id_establishement`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
