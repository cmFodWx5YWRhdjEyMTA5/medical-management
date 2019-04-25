-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 10:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalmanagelment`
--

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', NULL, NULL),
(2, 'Sunday', NULL, NULL),
(3, 'Monday', NULL, NULL),
(4, 'Tuesday', NULL, NULL),
(5, 'Wednesday', NULL, NULL),
(6, 'Thursday', NULL, NULL),
(7, 'Friday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `date_doctor`
--

CREATE TABLE `date_doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `date_doctor`
--

INSERT INTO `date_doctor` (`id`, `date_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, '2019-04-11 09:31:35', '2019-04-11 09:31:35'),
(3, 3, 2, '2019-04-11 09:31:35', '2019-04-11 09:31:35'),
(4, 4, 2, '2019-04-11 09:31:35', '2019-04-11 09:31:35'),
(5, 5, 2, '2019-04-11 09:31:35', '2019-04-11 09:31:35'),
(6, 3, 3, '2019-04-11 09:34:30', '2019-04-11 09:34:30'),
(10, 1, 5, '2019-04-14 13:29:00', '2019-04-14 13:29:00'),
(11, 2, 5, '2019-04-14 13:29:00', '2019-04-14 13:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_head` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `location`, `dept_head`, `details`, `stuf`, `date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tharapy', 'Dhaka', 'sdfjlsdaf', 'asdfsadf', 'sadfsdaf', '2019-04-14', NULL, '2019-04-13 15:16:59', '2019-04-13 15:16:59'),
(3, 'Healths', 'Dhaka', 'Rafiq', 'This is Owesome s', 'Rafiqs', '2019-04-14', 1, '2019-04-13 15:36:53', '2019-04-13 15:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `speciality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RegNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `degree`, `user_id`, `speciality`, `experience`, `RegNumber`, `mobile`, `gender`, `fee`, `certificate`, `created_at`, `updated_at`) VALUES
(2, 'asdfdsaf', 10, 'sdafsdaf', 'er', '32434', '01717444', 'male', 3443, 'default.png', '2019-04-11 09:31:34', '2019-04-11 09:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_01_185921_create_roles_table', 1),
(4, '2019_04_11_130710_create_dates_table', 2),
(5, '2019_04_11_131048_create_date_doctor_table', 3),
(6, '2019_04_11_135322_create_doctors_table', 4),
(7, '2019_04_13_193849_create_tests_table', 5),
(8, '2019_04_13_210442_create_departments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Doctor', NULL, NULL),
(3, 'Labassistant', NULL, NULL),
(4, 'Receptionist', NULL, NULL),
(5, 'Employeeer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spiceman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tested_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `username`, `email`, `email_verified_at`, `password`, `image`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr.Admin', 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$FeiWvfkCEpOD7VWbREJkheakcLPypgMC3ZpHzWWfxnleUHrhF3IMu', 'image.png', NULL, NULL, NULL, NULL),
(2, 'Mr.Doctor', 2, 'doctor', 'doctor@gmail.com', NULL, '$2y$10$OSu1Lcl7iPD/VUDrValmDecGd1wuac2KTDZpvyDwOLATs4H56.1aW', 'image.png', NULL, NULL, NULL, NULL),
(3, 'Mr.Labassistant', 3, 'labassistant', 'lab@gmail.com', NULL, '$2y$10$5QvLsdFqhkVlibTMUtJanu9SmZ/ONvvFwRYpAt4Qjv8omv2IwwEne', 'image.png', NULL, NULL, NULL, NULL),
(4, 'Mr.Receptionist', 4, 'receptionist', 'reception@gmail.com', NULL, '$2y$10$Vods52tnbDq.JGwLWBdeyucXH9ABycU/4SFxPGQln96zDHi2Xvsyu', 'image.png', NULL, NULL, NULL, NULL),
(5, 'Mr.Employee', 5, 'mmployee', 'employee@gmail.com', NULL, '$2y$10$2fMFa5vk9MXPDTg0zU09BuWB7IWFgfvgNliw9gjJOQq7aBUDax2zG', 'image.png', NULL, NULL, NULL, NULL),
(8, 'Md.XYZ', 2, 'doctorbd', 'doctor1@gmail.com', NULL, '$2y$10$z3si92PfBmHNK21LqYKo/ekJUr/8io6aCocYSl9N2cu5m9vUzX1IC', 'default.png', NULL, NULL, '2019-04-11 09:28:54', '2019-04-11 09:28:54'),
(10, 'Md.Asasdsd', 2, 'doctors', 'doctor2@gmail.com', NULL, '$2y$10$1l8n4LKYBeg.EFKJYK3yI.8lvuxll3miPgFYEPmHwLjkAzR5HsG8W', 'default.png', NULL, NULL, '2019-04-11 09:31:34', '2019-04-11 09:31:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_doctor`
--
ALTER TABLE `date_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `date_doctor`
--
ALTER TABLE `date_doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
