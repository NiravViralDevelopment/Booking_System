-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2023 at 06:04 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redspar6_booking_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `quota_per_facility` varchar(255) DEFAULT NULL,
  `quota_per_session` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `title`, `content`, `remarks`, `created_at`, `updated_at`, `quota_per_facility`, `quota_per_session`, `status`) VALUES
(27, 'Public Hall', 'Public Hall', 'Public Hall', '2022-12-20 08:23:19', '2022-12-20 08:24:37', '10', '5', '1'),
(28, 'Game Room', 'Game Room', 'Game Room', '2022-12-20 20:47:23', '2022-12-21 14:00:32', '4', '1', '1'),
(29, 'Test booking', 'Test booking', '123', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '2', '2', '1'),
(31, 'Comelit Meeting Room 1', 'Comelit Meeting Room 1', 'Testing Room', '2023-01-21 10:48:06', '2023-01-21 11:22:54', '2', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `facility_attendance`
--

CREATE TABLE `facility_attendance` (
  `id` int(255) NOT NULL,
  `facility_booking_id` varchar(255) DEFAULT NULL,
  `facility_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `attendance_status` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time_slot` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `month_year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facility_booking`
--

CREATE TABLE `facility_booking` (
  `id` int(255) NOT NULL,
  `facility_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time_slot` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `booking_status` varchar(255) DEFAULT NULL,
  `month_year` varchar(255) DEFAULT NULL,
  `total_hour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_booking`
--

INSERT INTO `facility_booking` (`id`, `facility_id`, `user_id`, `date`, `time_slot`, `created_at`, `updated_at`, `booking_status`, `month_year`, `total_hour`) VALUES
(180, '20', '53', '2023-01-24', '01:00 - 02:00', '2023-01-21 10:52:58', '2023-01-21 10:52:58', '1', 'January-2023', '01'),
(182, '31', '53', '2023-01-25', '00:00 - 00:00', '2023-01-21 11:10:28', '2023-01-21 11:10:28', '1', 'January-2023', '00'),
(183, '31', '55', '2023-01-25', '00:00 - 00:00', '2023-01-21 11:12:44', '2023-01-21 11:12:44', '1', 'January-2023', '00'),
(184, '31', '55', '2023-01-26', '00:00 - 00:00', '2023-01-21 11:13:41', '2023-01-21 11:13:41', '1', 'January-2023', '00'),
(185, '31', '54', '2023-01-26', '00:00 - 00:00', '2023-01-21 11:14:57', '2023-01-21 11:14:57', '1', 'January-2023', '00'),
(186, '29', '53', '2023-01-26', '00:00 - 00:00', '2023-01-21 11:21:17', '2023-01-21 11:21:17', '1', 'January-2023', '00'),
(187, '31', '55', '2023-01-27', '00:00 - 00:00', '2023-01-21 11:23:12', '2023-01-21 11:23:12', '1', 'January-2023', '00'),
(188, '27', '55', '2023-01-21', '08:00 - 10:00', '2023-01-21 11:33:28', '2023-01-21 11:33:28', '1', 'January-2023', '02');

-- --------------------------------------------------------

--
-- Table structure for table `facility_managment`
--

CREATE TABLE `facility_managment` (
  `id` int(255) NOT NULL,
  `facity_id` varchar(255) DEFAULT NULL,
  `_key` varchar(255) DEFAULT NULL,
  `hour_first` varchar(255) DEFAULT NULL,
  `minutes_first` varchar(255) DEFAULT NULL,
  `hour_third` varchar(255) DEFAULT NULL,
  `minutes_four` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `total_hour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_managment`
--

INSERT INTO `facility_managment` (`id`, `facity_id`, `_key`, `hour_first`, `minutes_first`, `hour_third`, `minutes_four`, `created_at`, `updated_at`, `total_hour`) VALUES
(251, '27', 'Mon', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(252, '27', 'Tue', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(253, '27', 'Wed', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(254, '27', 'Thu', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(255, '27', 'Fri', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(256, '27', 'Sat', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(257, '27', 'Sun', '08', '00', '10', '00', '2022-12-20 08:23:19', '2022-12-20 08:23:19', '02'),
(258, '27', 'Mon', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:51', '02'),
(259, '27', 'Tue', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:37', '02'),
(260, '27', 'Wed', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:37', '02'),
(261, '27', 'Thu', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:37', '02'),
(262, '27', 'Fri', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:37', '02'),
(263, '27', 'Sat', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:37', '02'),
(264, '27', 'Sun', '12', '00', '14', '00', '2022-12-20 08:24:37', '2022-12-20 08:24:37', '02'),
(265, '28', 'Mon', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:47:23', '02'),
(266, '28', 'Mon', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:00:32', '02'),
(267, '28', 'Tue', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:47:23', '02'),
(268, '28', 'Tue', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:00:32', '02'),
(269, '28', 'Wed', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:47:23', '02'),
(270, '28', 'Wed', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:00:32', '02'),
(271, '28', 'Thu', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:51:49', '02'),
(272, '28', 'Thu', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:00:32', '02'),
(273, '28', 'Fri', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:51:49', '02'),
(274, '28', 'Fri', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:02:09', '02'),
(275, '28', 'Sat', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:51:49', '02'),
(276, '28', 'Sat', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:02:09', '02'),
(277, '28', 'Sun', '07', '00', '09', '00', '2022-12-20 20:47:23', '2022-12-20 20:51:49', '02'),
(278, '28', 'Sun', '14', '00', '16', '00', '2022-12-20 20:47:23', '2022-12-21 14:02:09', '02'),
(279, '28', 'Mon', '18', '00', '20', '00', '2022-12-21 14:00:32', '2022-12-21 14:00:32', '02'),
(280, '28', 'Tue', '18', '00', '20', '00', '2022-12-21 14:00:32', '2022-12-21 14:00:32', '02'),
(281, '28', 'Wed', '18', '00', '20', '00', '2022-12-21 14:00:32', '2022-12-21 14:00:32', '02'),
(282, '28', 'Thu', '18', '00', '20', '00', '2022-12-21 14:02:09', '2022-12-21 14:02:09', '02'),
(283, '28', 'Fri', '18', '00', '20', '00', '2022-12-21 14:02:09', '2022-12-21 14:02:09', '02'),
(284, '28', 'Sat', '18', '00', '20', '00', '2022-12-21 14:02:09', '2022-12-21 14:02:09', '02'),
(285, '28', 'Sun', '18', '00', '20', '00', '2022-12-21 14:02:09', '2022-12-21 14:02:09', '02'),
(286, '29', 'Mon', '08', '00', '20', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '12'),
(287, '29', 'Tue', '00', '00', '00', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '00'),
(288, '29', 'Wed', '00', '00', '00', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '00'),
(289, '29', 'Thu', '00', '00', '00', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '00'),
(290, '29', 'Fri', '00', '00', '00', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '00'),
(291, '29', 'Sat', '00', '00', '00', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '00'),
(292, '29', 'Sun', '00', '00', '00', '00', '2022-12-30 08:51:17', '2022-12-30 08:51:17', '00'),
(300, '31', 'Mon', '09', '00', '12', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '03'),
(301, '31', 'Mon', '14', '00', '20', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '06'),
(302, '31', 'Tue', '09', '00', '12', '00', '2023-01-21 10:48:06', '2023-01-21 10:50:32', '03'),
(303, '31', 'Wed', '00', '00', '00', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '00'),
(304, '31', 'Thu', '00', '00', '00', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '00'),
(305, '31', 'Fri', '00', '00', '00', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '00'),
(306, '31', 'Sat', '00', '00', '00', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '00'),
(307, '31', 'Sun', '00', '00', '00', '00', '2023-01-21 10:48:06', '2023-01-21 10:48:06', '00'),
(308, '31', 'Tue', '14', '00', '20', '00', '2023-01-21 10:50:32', '2023-01-21 10:50:32', '06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floars`
--

CREATE TABLE `floars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tower_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floars`
--

INSERT INTO `floars` (`id`, `tower_id`, `floar_name`, `created_at`, `updated_at`) VALUES
(6, '21', 'C1', '2022-11-29 04:51:24', '2022-11-29 06:14:47'),
(8, '20', 'B1', '2022-11-29 05:08:45', '2022-11-29 06:14:39'),
(9, '22', 'A-5', '2022-12-02 02:56:06', '2022-12-02 02:56:06'),
(10, '23', 'A-1', '2022-12-06 05:08:19', '2022-12-06 05:08:19'),
(11, '23', 'A-2', '2022-12-06 05:08:29', '2022-12-06 05:08:29'),
(12, '23', 'A-3', '2022-12-06 05:08:40', '2022-12-06 05:08:40'),
(13, '24', 'B', '2022-12-06 05:09:36', '2022-12-08 03:09:40'),
(14, '24', 'C', '2022-12-06 05:10:27', '2022-12-08 03:09:47'),
(15, '25', 'A', '2022-12-06 05:10:38', '2022-12-06 05:10:38'),
(16, '25', 'B', '2022-12-06 05:10:45', '2022-12-06 05:10:45'),
(17, '25', 'C', '2022-12-06 05:10:52', '2022-12-06 05:10:52'),
(18, '25', 'D', '2022-12-06 05:10:59', '2022-12-06 05:10:59'),
(19, '26', 'X-1', '2022-12-06 05:11:10', '2022-12-06 05:11:10'),
(20, '26', 'X-2', '2022-12-06 05:11:21', '2022-12-06 05:11:21'),
(21, '26', 'X-3', '2022-12-06 05:11:28', '2022-12-06 05:11:28'),
(22, '27', 'SK-1', '2022-12-06 05:11:51', '2022-12-06 05:11:51'),
(23, '27', 'SK-2', '2022-12-06 05:11:58', '2022-12-06 05:11:58'),
(24, '27', 'SK-3', '2022-12-06 05:12:06', '2022-12-06 05:12:06'),
(25, '29', 'A-1', '2022-12-20 16:07:45', '2022-12-20 16:08:18'),
(26, '29', 'A-2', '2022-12-20 16:08:28', '2022-12-20 16:08:28'),
(27, '29', 'A-3', '2022-12-20 16:08:46', '2022-12-20 16:08:46'),
(28, '29', 'A-4', '2022-12-20 16:09:03', '2022-12-20 16:09:03'),
(29, '29', 'A-5', '2022-12-20 16:09:17', '2022-12-20 16:09:17'),
(31, '30', '10F', '2023-01-21 15:43:20', '2023-01-21 15:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `master_account`
--

CREATE TABLE `master_account` (
  `id` int(255) NOT NULL,
  `tower_id` varchar(255) DEFAULT NULL,
  `floor_id` varchar(255) DEFAULT NULL,
  `chinese_name` varchar(255) DEFAULT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `country_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_account`
--

INSERT INTO `master_account` (`id`, `tower_id`, `floor_id`, `chinese_name`, `english_name`, `unit_id`, `text`, `email`, `remarks`, `status`, `created_at`, `updated_at`, `country_code`) VALUES
(36, '24', '13', '贝利莱德勒', 'Bailey Laidler', 'null', '(07) 5635 6074', 'BaileyLaidler@dayrep.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '1', '2022-12-15 09:48:27', '2022-12-15 09:48:27', ''),
(43, '23', '12', 'Seguin', 'Seguin', '9', '8899776655', 'seguin@tes', 'Seguin', '1', '2022-12-19 08:38:34', '2022-12-19 08:38:50', '91'),
(44, '22', '9', '希希尔', 'Salin', '5', '9998976051', 'salins@gmail.com', 'ranslate texts & files instantly from English to Chinese (simplified) with the world\'s most accurate translator. Millions translate with DeepL every day.', '1', '2022-12-19 12:01:32', '2022-12-19 12:56:13', '91'),
(50, '20', '8', 'janvi patel', 'janvi patel', '4', '95745352', 'janvi@mailinator.com', 'janvi', '2', '2022-12-20 08:18:23', '2023-01-31 17:04:43', '852'),
(51, '29', '29', 'TOWN', 'TOWN', '27', '10101010', 'town@gmail.com', 'New town', '1', '2022-12-20 20:39:04', '2022-12-20 20:41:01', '852'),
(52, '29', '29', '123', 'Testing', '23', '12345678', '123@123.com', '123', '2', '2022-12-30 08:48:37', '2023-01-31 14:35:11', '852'),
(53, '30', '31', 'Comelit User 1', 'Comelit User 1', '28', '987654321', 'user1@comelit.com.hk', 'Testing', '1', '2023-01-21 10:46:28', '2023-01-31 15:16:24', '852'),
(54, '30', '31', 'Comelit User 4', 'Comelit User 4', '28', '123', 'user1@comelit.com.hk', '123', '2', '2023-01-21 11:11:37', '2023-01-21 11:20:13', '852'),
(55, '30', '31', 'Comelit User 5', 'Comelit User 5', '28', '12345667880', 'user1@comelit.com.hk', '123', '2', '2023-01-21 11:12:26', '2023-01-21 11:13:18', '852');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_28_095615_create_towers_table', 2),
(6, '2022_11_28_121459_create_floars_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quota_by_unit`
--

CREATE TABLE `quota_by_unit` (
  `id` int(255) NOT NULL,
  `facility_enrollment_quota_per_day` varchar(255) DEFAULT NULL,
  `session_enrollment_quota_per_day` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quota_by_unit`
--

INSERT INTO `quota_by_unit` (`id`, `facility_enrollment_quota_per_day`, `session_enrollment_quota_per_day`, `created_at`, `updated_at`) VALUES
(1, '12', '3', '2022-12-03 11:16:34', '2023-01-21 10:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings_data`
--

CREATE TABLE `settings_data` (
  `id` int(255) NOT NULL,
  `_key` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_data`
--

INSERT INTO `settings_data` (`id`, `_key`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Booking', NULL, '1671541486.png', '2022-12-20 12:21:15', '2022-12-20 21:04:46'),
(4, 'front', 'BOOKING PORTAL', 'Front', '1671541447.png', '2022-12-20 12:35:14', '2022-12-20 21:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_account`
--

CREATE TABLE `sub_account` (
  `id` int(255) NOT NULL,
  `master_account_id` varchar(255) DEFAULT NULL,
  `chinese_name` varchar(255) DEFAULT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `sub_text` varchar(255) DEFAULT NULL,
  `sub_email` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `sub_status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sub_country_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_account`
--

INSERT INTO `sub_account` (`id`, `master_account_id`, `chinese_name`, `english_name`, `unit_id`, `sub_text`, `sub_email`, `remarks`, `sub_status`, `created_at`, `updated_at`, `sub_country_code`) VALUES
(15, '44', '希希尔 1', 'SAsa', NULL, '9998976050', 'test@test.com', '希希尔', '1', '2022-12-19 12:01:32', '2022-12-19 12:56:13', '91'),
(16, '44', '希希尔 1', 'Mohan', NULL, '9998976050', 'test@test.com', '希希尔', '1', '2022-12-19 12:01:32', '2022-12-19 12:56:13', '91'),
(32, '50', 'kevin', 'kevin patel', NULL, '95745352', 'kevin@mailinator.com', 'kevin', '1', '2022-12-20 08:18:33', '2022-12-20 20:40:40', '852'),
(33, '50', 'kevin test', 'kevin patel test', NULL, '95745352', 'kevintest@gmail.com', 'kevintest', '1', '2022-12-20 08:19:58', '2022-12-20 20:40:40', '852'),
(34, '51', 'TOWN 1', 'TOWN 1', NULL, '20202020', 'town2@gmail.com', 'TOWN 1', '1', '2022-12-20 20:39:04', '2022-12-20 20:41:01', '852'),
(35, '51', 'rrt', 'rtr', NULL, '435354454', 'come5@gmail.com', 'fgfg', '0', '2022-12-21 19:50:49', '2022-12-21 19:50:57', '852'),
(36, '53', 'Comelit User 2', 'Comelit User 2', NULL, '987654321', '123@123.com', '123', '1', '2023-01-21 11:02:56', '2023-01-21 11:02:56', '852'),
(37, '53', 'Comelit User 3', 'Comelit User 3', NULL, '123456678', '123@123.com', '123', '1', '2023-01-21 11:10:12', '2023-01-21 11:10:12', '852');

-- --------------------------------------------------------

--
-- Table structure for table `towers`
--

CREATE TABLE `towers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tower_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `towers`
--

INSERT INTO `towers` (`id`, `tower_name`, `created_at`, `updated_at`) VALUES
(20, 'Shanghai Tower', '2022-11-29 04:29:37', '2022-11-29 04:29:37'),
(21, 'Ping An Finance Centre', '2022-11-29 04:29:44', '2022-11-29 04:29:44'),
(22, 'Tianjin CTF Finance Centre', '2022-11-29 04:29:51', '2022-11-29 04:29:51'),
(23, 'SEGUIN', '2022-12-06 05:05:33', '2022-12-06 05:05:33'),
(24, 'TRESCA', '2022-12-06 05:05:45', '2022-12-06 05:05:45'),
(25, 'PONCELET', '2022-12-06 05:05:52', '2022-12-06 05:05:52'),
(26, 'LAGRANGE', '2022-12-06 05:06:00', '2022-12-06 05:06:00'),
(27, 'BELANGER', '2022-12-06 05:06:08', '2022-12-06 05:06:08'),
(29, 'ICON', '2022-12-20 16:07:14', '2022-12-20 16:07:14'),
(30, 'Comelit T1', '2023-01-21 15:41:42', '2023-01-21 15:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(255) NOT NULL,
  `tower_id` varchar(255) DEFAULT NULL,
  `floar_id` varchar(255) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `tower_id`, `floar_id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, '20', '8', 'A', '2022-11-29 11:57:35', '2022-11-29 11:57:35'),
(2, '21', '6', 'B', '2022-11-29 12:03:15', '2022-11-29 12:03:15'),
(4, '20', '8', 'B2', '2022-11-30 09:47:19', '2022-11-30 09:47:19'),
(5, '22', '9', 'A', '2022-12-02 08:26:18', '2022-12-02 08:26:18'),
(6, '22', '9', 'B', '2022-12-02 08:26:25', '2022-12-02 08:26:25'),
(7, '22', '9', 'C', '2022-12-02 08:26:32', '2022-12-02 08:26:32'),
(8, '23', '10', 'A-101', '2022-12-06 10:42:47', '2022-12-06 10:42:47'),
(9, '23', '11', 'A-201', '2022-12-06 10:43:11', '2022-12-06 10:43:11'),
(10, '23', '12', 'A-301', '2022-12-06 10:43:23', '2022-12-06 10:43:23'),
(11, '24', '13', '101', '2022-12-06 10:43:41', '2022-12-06 10:43:41'),
(12, '24', '14', '301', '2022-12-06 10:43:54', '2022-12-06 10:43:54'),
(13, '25', '15', '101', '2022-12-06 10:44:05', '2022-12-06 10:44:05'),
(14, '25', '16', '201', '2022-12-06 10:44:21', '2022-12-06 10:44:21'),
(15, '25', '17', '301', '2022-12-06 10:44:33', '2022-12-06 10:44:33'),
(16, '25', '18', '401', '2022-12-06 10:44:44', '2022-12-06 10:44:44'),
(17, '26', '19', '701', '2022-12-06 10:44:54', '2022-12-06 10:44:54'),
(18, '26', '20', '801', '2022-12-06 10:45:03', '2022-12-06 10:45:03'),
(19, '26', '21', '901', '2022-12-06 10:45:12', '2022-12-06 10:45:12'),
(20, '27', '22', '501', '2022-12-06 10:45:21', '2022-12-06 10:45:21'),
(21, '26', '20', '601', '2022-12-06 10:45:29', '2022-12-06 10:45:29'),
(22, '27', '24', '701', '2022-12-06 10:45:38', '2022-12-06 10:45:38'),
(23, '29', '25', '101', '2022-12-20 11:10:20', '2022-12-20 11:10:20'),
(24, '29', '28', '402', '2022-12-20 11:10:34', '2022-12-20 11:10:34'),
(25, '29', '27', '303', '2022-12-20 11:10:50', '2022-12-20 11:10:50'),
(26, '29', '26', '204', '2022-12-20 11:11:15', '2022-12-20 11:11:15'),
(27, '29', '29', '502', '2022-12-20 11:11:41', '2022-12-20 11:11:41'),
(28, '30', '31', 'A', '2023-01-21 10:43:56', '2023-01-21 10:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'johndoe@hotmail.com', '1', NULL, '$2y$10$4HtxwpD4QrJl4dCBQF7iSu8u5madBXmUXKJoSihdhli5EX.DeCpxm', NULL, '2022-11-28 03:47:50', '2022-11-28 03:47:50'),
(2, 'Regular User', 'reguser@gmail.com', '0', NULL, '$2y$10$N.ZUJCCeDWtNXHJ.sVMqAuHHz9UXFlZ6aOBeJ54Q0ASlRtJ4JmuMO', NULL, '2022-11-28 03:47:50', '2022-12-22 21:29:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_attendance`
--
ALTER TABLE `facility_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_booking`
--
ALTER TABLE `facility_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_managment`
--
ALTER TABLE `facility_managment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floars`
--
ALTER TABLE `floars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_account`
--
ALTER TABLE `master_account`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quota_by_unit`
--
ALTER TABLE `quota_by_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_data`
--
ALTER TABLE `settings_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_account`
--
ALTER TABLE `sub_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towers`
--
ALTER TABLE `towers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `facility_attendance`
--
ALTER TABLE `facility_attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `facility_booking`
--
ALTER TABLE `facility_booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `facility_managment`
--
ALTER TABLE `facility_managment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floars`
--
ALTER TABLE `floars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `master_account`
--
ALTER TABLE `master_account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quota_by_unit`
--
ALTER TABLE `quota_by_unit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_data`
--
ALTER TABLE `settings_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_account`
--
ALTER TABLE `sub_account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `towers`
--
ALTER TABLE `towers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
