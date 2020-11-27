-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2018 at 02:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lead_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address1`, `postal_code`, `country_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, '434 Hayes BrookCruickshankhaven, NY 56564-5182', '1216', 21, 23, '2018-12-25 09:30:06', '2018-12-25 12:51:15'),
(2, '740 Jocelyn Station Apt. 644\nWest Kelsieport, NJ 19348-1807', '15142', 2, 2, '2018-12-25 09:30:07', '2018-12-25 09:30:07'),
(10, '52996 Maggio Rapid Apt. 068\nShyannechester, CO 52653-5626', '03366-0834', 10, 10, '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(13, 'Level 12, Software Technology Park (Janata Tower), 49 Karwan Bazar Road, Dhaka-1215', '1265', 21, 22, '2018-12-25 09:30:10', '2018-12-25 12:58:54'),
(14, '4918 Marvin Manors Apt. 038\nVerniemouth, NE 75859', '30572-6579', 14, 14, '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(15, '43236 Reanna Pass Suite 491East Elisabethport, NM 09206', '452', 21, 25, '2018-12-25 09:30:10', '2018-12-25 12:50:26'),
(16, '4065 Amanda Shoals Apt. 602\nBrooklynview, OH 16313-1229', '47792-3580', 16, 16, '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(17, '737 Timmothy SpringsTrevorland, MN 73787', '51098', 16, 16, '2018-12-25 09:30:11', '2018-12-25 12:33:21'),
(18, '3601 Kellie Parkway\nRhodaburgh, NE 53881', '79130', 18, 18, '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(19, 'House 21, Road 31, Sector 7, Uttara, Dhaka-1230', '1230', 21, 22, '2018-12-25 09:30:11', '2018-12-25 12:58:29'),
(20, '97479 DuBuque Lock Apt. 670\nEast Etheltown, OR 88437-7950', '93657-5396', 20, 20, '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(21, 'chitagong 23', '1356', 21, 25, '2018-12-25 18:01:49', '2018-12-25 18:01:49'),
(22, 'colilla', '1356', 21, 22, '2018-12-25 18:02:25', '2018-12-25 18:02:25'),
(23, 'colilla', '1356', 21, 24, '2018-12-25 18:02:44', '2018-12-25 18:02:44'),
(24, 'jikorgacha', '1356', 21, 24, '2018-12-25 18:03:21', '2018-12-25 18:03:21'),
(25, 'rupsha , khulna', '1356', 21, 21, '2018-12-25 18:04:20', '2018-12-25 18:04:20'),
(26, 'rupsha , chittagong', '1560', 21, 25, '2018-12-25 18:05:04', '2018-12-25 18:05:04'),
(27, 'uttara', '1230', 21, 22, '2018-12-25 18:05:31', '2018-12-25 18:05:31'),
(28, 'karwan bazar , 1230', '1230', 21, 22, '2018-12-25 18:06:01', '2018-12-25 18:06:01'),
(29, 'mohakhali, dhaka', '1255', 21, 22, '2018-12-25 18:06:29', '2018-12-25 18:06:29'),
(30, 'shabagh, Dhaka', '1210', 21, 22, '2018-12-25 18:07:01', '2018-12-25 18:07:01'),
(31, 'comilla sadar', '3456', 21, 23, '2018-12-25 18:46:46', '2018-12-25 18:46:46'),
(32, 'malibagh, Dhaka', '1260', 21, 22, '2018-12-25 18:47:19', '2018-12-25 18:47:19'),
(33, 'Tongi, Dhaka', '1260', 21, 22, '2018-12-25 18:47:47', '2018-12-25 18:47:47'),
(34, 'Chittagong, bangladesh', '8989', 21, 25, '2018-12-25 18:48:09', '2018-12-25 18:48:09'),
(35, 'jessore, khulna', '3945', 21, 24, '2018-12-25 18:48:26', '2018-12-25 18:48:26'),
(37, 'jessore link road', '4008', 21, 24, '2018-12-25 18:49:09', '2018-12-25 18:49:09'),
(38, 'uttarsa', '1234', 21, 23, '2018-12-25 21:00:04', '2018-12-25 21:00:04'),
(43, 'chittagong , sadar', '345', 21, 25, '2018-12-26 15:26:48', '2018-12-26 15:26:48'),
(44, 'uttara', '1243', 21, 22, '2018-12-26 18:58:02', '2018-12-26 18:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `call_histories`
--

CREATE TABLE `call_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_histories`
--

INSERT INTO `call_histories` (`id`, `user_id`, `client_id`, `project_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 29, 1, 1, '2018-12-25 17:31:23', '2018-12-25 17:31:23'),
(2, 16, 30, 6, 1, '2018-12-25 17:31:33', '2018-12-25 17:31:33'),
(3, 16, 31, 6, 1, '2018-12-25 17:31:46', '2018-12-25 17:31:46'),
(4, 16, 32, 4, 1, '2018-12-25 17:31:55', '2018-12-25 17:31:55'),
(5, 16, 34, 1, 1, '2018-12-25 17:32:05', '2018-12-25 17:32:05'),
(6, 16, 35, 1, 1, '2018-12-25 17:32:13', '2018-12-25 17:32:13'),
(7, 16, 2, 4, 1, '2018-12-25 17:51:16', '2018-12-25 17:51:16'),
(8, 16, 17, 3, 1, '2018-12-25 17:51:24', '2018-12-25 17:51:24'),
(9, 16, 23, 3, 1, '2018-12-25 17:51:32', '2018-12-25 17:51:32'),
(10, 16, 24, 1, 1, '2018-12-25 17:51:41', '2018-12-25 17:51:41'),
(11, 16, 19, 1, 1, '2018-12-25 17:51:49', '2018-12-25 17:51:49'),
(12, 16, 28, 1, 1, '2018-12-25 17:52:38', '2018-12-25 17:52:38'),
(13, 16, 45, 6, 1, '2018-12-25 17:52:49', '2018-12-25 17:52:49'),
(14, 16, 32, 1, 1, '2018-12-25 17:53:05', '2018-12-25 17:53:05'),
(15, 15, 32, 4, 1, '2018-12-25 18:43:54', '2018-12-25 18:43:54'),
(16, 15, 34, 5, 1, '2018-12-25 18:44:05', '2018-12-25 18:44:05'),
(17, 15, 38, 4, 1, '2018-12-25 18:44:13', '2018-12-25 18:44:13'),
(18, 15, 43, 1, 1, '2018-12-25 18:44:22', '2018-12-25 18:44:22'),
(19, 15, 45, 1, 1, '2018-12-25 18:44:34', '2018-12-25 18:44:34'),
(20, 15, 27, 1, 2, '2018-12-25 18:44:46', '2018-12-25 18:44:46'),
(21, 15, 21, 4, 1, '2018-12-25 18:44:55', '2018-12-25 18:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'East Elmoremouth', '2018-12-25 09:30:06', '2018-12-25 09:30:06'),
(2, 2, 'Donnyport', '2018-12-25 09:30:07', '2018-12-25 09:30:07'),
(3, 3, 'Lake Reed', '2018-12-25 09:30:07', '2018-12-25 09:30:07'),
(4, 4, 'West Revaborough', '2018-12-25 09:30:07', '2018-12-25 09:30:07'),
(5, 5, 'Lelandside', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(6, 6, 'Port Maddisonborough', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(7, 7, 'Faytown', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(8, 8, 'Lake Juwan', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(9, 9, 'Alessandraland', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(10, 10, 'Mazieside', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(11, 11, 'West Josephineview', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(12, 12, 'Lake Ervinchester', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(13, 13, 'Verdietown', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(14, 14, 'West Lane', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(15, 15, 'Jakobfort', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(16, 16, 'Melbaville', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(17, 17, 'Eichmanntown', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(18, 18, 'North Jonathon', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(19, 19, 'Destineymouth', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(20, 20, 'Torpton', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(21, 21, 'Khulna', '2018-12-25 12:45:10', '2018-12-25 12:45:10'),
(22, 21, 'Dhaka', '2018-12-25 12:45:19', '2018-12-25 12:45:19'),
(23, 21, 'Comilla', '2018-12-25 12:45:43', '2018-12-25 12:45:43'),
(24, 21, 'Jessore', '2018-12-25 12:45:51', '2018-12-25 12:45:51'),
(25, 21, 'Chittagong', '2018-12-25 12:46:14', '2018-12-25 12:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `company`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dr Harmon Jacobson', 'Anzir Apparels Ltd', '01514286218', 'carole.schmitt@zulauf.com', '1', '2018-12-25 09:30:18', '2018-12-25 13:49:30'),
(2, 'Leon Osinski', 'Anzir Apparels Ltd', '01722554422', 'katharina.lesch@ratke.com', '1', '2018-12-25 09:30:18', '2018-12-25 13:49:59'),
(17, 'Mahmuder Rahman', 'Alif Textiles Ltd', '01724666222', 'khalil57@spinka.net', '1', '2018-12-25 09:30:19', '2018-12-25 13:47:06'),
(18, 'Miss Zella Harber', 'Ama Syntex Ltd', '01765242424', 'cooper.conn@rippin.com', '1', '2018-12-25 09:30:19', '2018-12-25 13:47:36'),
(19, 'Diman Ghosjh', 'AST Knitwear Ltd', '01634272624', 'marc28@christiansen.biz', '1', '2018-12-25 09:30:19', '2018-12-25 13:48:26'),
(20, 'Kieran Moen', 'Asian Homeopathic Medical League', '01526242424', 'ullrich.joel@zboncak.org', '1', '2018-12-25 09:30:19', '2018-12-25 13:48:58'),
(21, 'Amin Islam', 'ABA Garments Ltd', '01621367111', 'abdullah001rti@gmail.com', '1', '2018-12-25 13:46:19', '2018-12-26 15:33:03'),
(22, 'Md Abbas', 'Zhorna limited', '01732876676', 'abdullah001r1ti@gmail.com', '1', '2018-12-25 13:52:43', '2018-12-26 15:32:33'),
(23, 'Ali khan', 'Anzir Ltd', '01562434343', 'muhaiminul23r@gmail.com', '1', '2018-12-25 13:53:26', '2018-12-25 13:53:26'),
(24, 'Rumana Haque', 'Alpha Credit Rating Limited', '01927655432', 'abdullah001rti@yahoo.com', '1', '2018-12-25 13:54:05', '2018-12-25 13:54:05'),
(25, 'Imran Khan', 'Agora Limited', '01675242335', 'imran@systech.com', '1', '2018-12-25 13:54:50', '2018-12-25 13:54:50'),
(26, 'Mahmud khan', 'apex limited', '01647325233', 'mahmud@apex.com', '1', '2018-12-25 13:55:29', '2018-12-25 13:55:29'),
(27, 'Santonu', 'hilex limited', '01782348597', 'santonu@profile.com', '1', '2018-12-25 13:56:19', '2018-12-25 13:56:19'),
(28, 'Mr Treutel', 'manik Beer and Baumbach', '01734454000', 'jayden62@howell.net', '1', '2018-12-25 13:58:06', '2018-12-25 14:05:08'),
(29, 'Sagar Khan', 'Schinner Inc', '01726532247', 'gene68@schaefer.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:00:22'),
(30, 'Faisal Ahmed', 'Schamberger Kessler', '01638247573', 'fkulas@adams.org', '1', '2018-12-25 13:58:07', '2018-12-25 14:00:09'),
(31, 'Maysha', 'Gutmann Funk and Kuphal', '01725656565', 'frederic44@erdman.com', '1', '2018-12-25 13:58:07', '2018-12-25 13:59:30'),
(32, 'Sabbir Ahmed', 'Connelly LLC', '01637625621', 'witting.dulce@schneider.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:01:14'),
(33, 'Dante Ebert', 'Corwin Ltd', '01724545454', 'kuhn.jessyca@conn.net', '1', '2018-12-25 13:58:07', '2018-12-25 14:01:27'),
(34, 'Ms Amira Hartmann', 'Mosciski Kuphal', '01634222222', 'rutherford.zane@schultz.com', '1', '2018-12-25 13:58:07', '2018-12-25 13:59:06'),
(35, 'Mr Jaycee Ondricka', 'Emard and Sons', '01714545454', 'mina21@stanton.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:01:44'),
(36, 'Ms Abigayle Kemmer', 'Koelpin Thiel and Hermann', '01758033613', 'hortense.schultz@muller.org', '1', '2018-12-25 13:58:07', '2018-12-25 14:02:20'),
(37, 'Chloe Ankunding', 'Schinner Kuphal', '01526242422', 'demario83@harvey.biz', '1', '2018-12-25 13:58:07', '2018-12-25 14:03:06'),
(38, 'Wilburn Osinski DVM', 'Romaguera PLC', '01562452722', 'hahn.luis@hauck.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:02:32'),
(39, 'Pierre Sipes IV', 'Wilkinson Farrell and Daniel', '01562323232', 'hudson.reichert@lehner.biz', '1', '2018-12-25 13:58:07', '2018-12-25 14:02:46'),
(40, 'Tristian Graham', 'Kuhlman Legros and Ortiz', '01625232323', 'destin.tillman@conn.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:03:20'),
(41, 'Dorcas Eichmann II', 'Stroman Group', '01676234567', 'adeline.stanton@parisian.org', '1', '2018-12-25 13:58:07', '2018-12-25 14:03:35'),
(42, 'Prof George Heathcote', 'Beer Lindgren', '01734454545', 'will.lehner@dickinson.biz', '1', '2018-12-25 13:58:07', '2018-12-25 14:03:52'),
(43, 'Miss Rafaela Hartmann', 'Larson Feest and Runolfsson', '01734454533', 'dooley.foster@schmitt.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:04:03'),
(44, 'Prof Jaylan Reilly', 'Hickle Group', '01734534343', 'newton.berge@fritsch.net', '1', '2018-12-25 13:58:07', '2018-12-25 14:04:16'),
(45, 'Andres Miller', 'Boyle Weimann', '01734452345', 'mpurdy@steuber.com', '1', '2018-12-25 13:58:07', '2018-12-25 14:04:32'),
(46, 'Mr Kamryn Langosh II', 'China Limited', '01627242539', 'kaitlin23@tromp.biz', '1', '2018-12-25 13:58:07', '2018-12-25 17:52:27'),
(47, 'Modesto Little', 'Steuber Ltd', '01734454589', 'welch.dagmar@mertz.info', '1', '2018-12-25 13:58:07', '2018-12-25 14:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Japan IT', '2018-12-25 09:30:06', '2018-12-25 12:31:41'),
(7, 'Tiger  IT Limited', '2018-12-25 09:30:10', '2018-12-25 12:30:19'),
(8, 'Herman Group', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(9, 'Mangrove IT Limited', '2018-12-25 09:30:11', '2018-12-25 12:29:45'),
(10, 'Systech Digital Limited', '2018-12-25 09:30:11', '2018-12-25 12:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Palestinian Territories', '2018-12-25 09:30:06', '2018-12-25 09:30:06'),
(2, 'Burundi', '2018-12-25 09:30:06', '2018-12-25 09:30:06'),
(3, 'Korea', '2018-12-25 09:30:07', '2018-12-25 09:30:07'),
(4, 'Netherlands Antilles', '2018-12-25 09:30:07', '2018-12-25 09:30:07'),
(5, 'Norway', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(6, 'Chile', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(7, 'Senegal', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(8, 'Nigeria', '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(9, 'Liechtenstein', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(10, 'Equatorial Guinea', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(11, 'Bosnia and Herzegovina', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(12, 'Zambia', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(13, 'Mauritius', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(14, 'Suriname', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(15, 'Saint Barthelemy', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(16, 'Iran', '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(17, 'Palestinian Territories', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(18, 'Grenada', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(19, 'Poland', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(20, 'Faroe Islands', '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(21, 'Bangladesh', '2018-12-25 12:44:26', '2018-12-25 12:44:26'),
(22, 'India', '2018-12-25 12:44:34', '2018-12-25 12:44:34'),
(23, 'Japan', '2018-12-25 12:44:42', '2018-12-25 12:44:42'),
(24, 'Pakistan', '2018-12-25 12:44:56', '2018-12-25 12:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(6, 'Development', '0163672122', 'gerhold.angelina@streich.com', '2018-12-25 09:30:10', '2018-12-25 12:53:04'),
(9, 'Marketing', '01734625423', 'xschneider@systech.com', '2018-12-25 09:30:11', '2018-12-25 12:52:02'),
(10, 'Sales', '01634834363', 'berniece23@hyatt.com', '2018-12-25 09:30:11', '2018-12-25 12:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Senior Developer', 1, '2018-12-25 09:30:08', '2018-12-25 09:30:08'),
(4, 'Junior Developer', 1, '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(9, 'General Manager', 1, '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(10, 'CEO', 1, '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(11, 'Managing Director', 1, '2018-12-25 13:24:41', '2018-12-25 13:24:41'),
(12, 'Business Development Manager', 1, '2018-12-25 13:25:01', '2018-12-25 13:25:01'),
(13, 'Team Leader', 1, '2018-12-25 13:25:08', '2018-12-25 13:25:08'),
(14, 'Project Manager', 1, '2018-12-25 13:25:16', '2018-12-25 13:25:16'),
(15, 'Support Engineer', 1, '2018-12-25 13:25:27', '2018-12-25 13:25:27'),
(16, 'sales Manager', 1, '2018-12-25 13:26:56', '2018-12-25 13:26:56'),
(17, 'sales support', 0, '2018-12-25 13:27:04', '2018-12-25 13:27:11'),
(18, 'marketing support', 1, '2018-12-25 13:27:25', '2018-12-25 13:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `employee_informations`
--

CREATE TABLE `employee_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `office_id` int(10) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_type_id` int(10) UNSIGNED DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/no_image.png',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `salary` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_informations`
--

INSERT INTO `employee_informations` (`id`, `user_id`, `company_id`, `address_id`, `department_id`, `office_id`, `designation_id`, `employee_type_id`, `path`, `gender`, `phone`, `dob`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 2, 6, 10, 13, 6, 'images/no_image.png', 'Male', '01528373623', '1993-01-26', 129156, 1, '2018-12-25 09:30:11', '2018-12-25 13:36:55'),
(5, 5, 10, 10, 6, 10, 16, 6, 'images/no_image.png', 'male', '(232) 497-4373 x80850', '2010-08-08', 334014, 1, '2018-12-25 09:30:12', '2018-12-25 09:30:12'),
(7, 7, 10, 14, 6, 7, 4, 8, 'images/no_image.png', 'Female', '01745233456', '1999-04-10', 20000, 1, '2018-12-25 09:30:12', '2018-12-25 13:37:01'),
(9, 9, 10, 18, 9, 7, 12, 6, 'images/no_image.png', 'Female', '01738868572', '1996-10-23', 156774, 1, '2018-12-25 09:30:12', '2018-12-25 13:29:14'),
(10, 10, 10, 20, 9, 10, 16, 6, 'images/no_image.png', 'Male', '01724365245', '1986-12-30', 374672, 1, '2018-12-25 09:30:12', '2018-12-25 13:30:30'),
(11, 11, 10, NULL, 10, 7, 16, 7, 'images/no_image.png', 'Male', '01738868597', '1995-07-13', 15000, 1, '2018-12-25 13:39:48', '2018-12-25 13:42:06'),
(12, 12, 10, NULL, 10, 10, 17, 6, 'images/no_image.png', 'Male', '01673426662', '1990-11-22', 20000, 1, '2018-12-25 13:41:53', '2018-12-25 13:41:53'),
(13, 13, 10, NULL, 6, 7, 15, 6, 'images/no_image.png', 'Male', '01724362322', '1990-06-06', 25000, 1, '2018-12-25 13:43:04', '2018-12-25 13:43:04'),
(14, 14, 10, NULL, 10, 10, 18, 9, 'images/no_image.png', 'Male', '01623542332', '1990-06-12', 15000, 1, '2018-12-25 13:44:08', '2018-12-25 15:02:00'),
(15, 15, 10, NULL, 9, 7, 18, 6, 'images/no_image.png', 'Male', '01834222777', '2002-01-01', 20000, 1, '2018-12-25 17:02:40', '2018-12-25 17:02:40'),
(16, 16, 10, NULL, 9, 10, 18, 6, 'images/no_image.png', 'Male', '01836254421', '1996-01-31', 30000, 1, '2018-12-25 17:04:37', '2018-12-25 17:04:37'),
(17, 17, 10, NULL, 10, 7, 17, 6, 'images/no_image.png', 'Male', '01768234597', '1996-01-01', 20000, 1, '2018-12-25 17:06:55', '2018-12-25 17:06:55'),
(18, 18, 10, NULL, 10, 8, 17, 7, 'images/no_image.png', 'Male', '01672427320', '1995-12-25', 15000, 1, '2018-12-25 17:08:28', '2018-12-25 17:08:28'),
(19, 19, 10, NULL, 10, 10, 16, 6, 'images/no_image.png', 'Male', '01532456789', '1995-11-27', 12000, 1, '2018-12-25 17:09:55', '2018-12-25 17:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

CREATE TABLE `employee_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_types`
--

INSERT INTO `employee_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Full Time', 1, '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(7, 'Per Time', 1, '2018-12-25 09:30:10', '2018-12-25 09:30:10'),
(8, 'Staff', 1, '2018-12-25 09:30:11', '2018-12-25 09:30:11'),
(9, 'Casual', 1, '2018-12-25 09:30:11', '2018-12-25 09:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `call_history_id` int(11) DEFAULT NULL,
  `followup_time` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `user_id`, `call_history_id`, `followup_time`, `created_at`, `updated_at`) VALUES
(1, 16, 14, '2018-12-26', '2018-12-25 17:54:36', '2018-12-25 17:54:36'),
(2, 16, 13, '2018-12-26', '2018-12-25 17:54:44', '2018-12-25 17:54:44'),
(3, 16, 11, '2018-12-26', '2018-12-25 17:54:50', '2018-12-25 17:54:50'),
(4, 16, 10, '2018-12-26', '2018-12-25 17:54:56', '2018-12-25 17:54:56'),
(5, 16, 9, '2018-12-26', '2018-12-25 17:55:09', '2018-12-25 17:55:09'),
(6, 16, 8, '2018-12-26', '2018-12-25 17:55:14', '2018-12-25 17:55:14'),
(7, 16, 6, '2018-12-26', '2018-12-25 17:55:20', '2018-12-25 17:55:20'),
(8, 16, 6, '2018-12-26', '2018-12-25 17:55:25', '2018-12-25 17:55:25'),
(9, 16, 5, '2018-12-26', '2018-12-25 17:55:31', '2018-12-25 17:55:31'),
(10, 16, 4, '2018-12-26', '2018-12-25 17:55:38', '2018-12-25 17:55:38'),
(11, 16, 3, '2018-12-26', '2018-12-25 17:55:43', '2018-12-25 17:55:43'),
(12, 16, 1, '2018-12-26', '2018-12-25 17:55:48', '2018-12-25 17:55:48'),
(13, 15, 21, '2018-12-27', '2018-12-25 18:45:18', '2018-12-25 18:45:18'),
(14, 15, 20, '2018-12-27', '2018-12-25 18:45:25', '2018-12-25 18:45:25'),
(15, 15, 18, '2018-12-27', '2018-12-25 18:45:37', '2018-12-25 18:45:37'),
(16, 15, 19, '2018-12-27', '2018-12-25 18:45:43', '2018-12-25 18:45:43'),
(17, 15, 17, '2018-12-27', '2018-12-25 18:45:50', '2018-12-25 18:45:50'),
(18, 15, 16, '2018-12-27', '2018-12-25 18:45:59', '2018-12-25 18:45:59'),
(19, 15, 15, '2018-12-27', '2018-12-25 18:46:05', '2018-12-25 18:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `schedule_id` int(10) UNSIGNED DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_time` datetime NOT NULL,
  `tag` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `user_id`, `client_id`, `schedule_id`, `path`, `meeting_time`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 34, 16, 'file/UrPtIePgii0cUxk4KvC1hSZ01ixnwlUPnAQKllrE.pdf', '2018-12-19 07:25:07', 1, 1, '2018-12-25 19:18:04', '2018-12-25 19:56:41'),
(2, 11, 32, 3, 'file/Zd2mwlS7wdCIG2tTfnYZ4YSqPbGDkzjnMmtfH6RX.pdf', '2018-12-26 10:35:07', 1, 1, '2018-12-25 19:27:57', '2018-12-26 17:47:55'),
(3, 11, 45, 10, 'file/uhiJtHggaN6xYUSqCHZCVI6nKccFUL2c4LWUQK8r.pdf', '2018-12-23 14:45:07', 0, 2, '2018-12-25 19:43:34', '2018-12-25 19:43:34'),
(4, 11, 35, 5, 'file/nM2gBF7b2Nvu7GkYlCTWOU2Las8F0SwOXlQXKS9I.pdf', '2018-12-21 14:45:07', 0, 2, '2018-12-25 19:46:00', '2018-12-25 19:46:00'),
(5, 11, 17, 7, 'file/BQs1gawK82UrYAUvBoWYSEvY4FHydNLCDkr0hDTO.pdf', '2018-12-20 13:25:07', 0, 1, '2018-12-25 19:47:20', '2018-12-25 19:47:20'),
(6, 10, 38, 15, 'file/yrLxNJDB5tv2cJ2FXPLYs0p32EZmiIRj170TRlDG.pdf', '2018-12-18 13:25:07', 1, 1, '2018-12-25 19:50:32', '2018-12-25 20:08:53'),
(7, 10, 21, 11, 'file/1gwCOAvaPVomuiWIVeBo4JasIM9wrNxKDrdpLFKw.docx', '2018-12-24 13:25:07', 0, 1, '2018-12-25 19:51:31', '2018-12-25 19:51:31'),
(8, 11, 34, 4, 'file/PsD8PJcPCesHfMmGx7v0EoWZuFdqjI6zkopbVMah.docx', '2018-12-18 13:25:07', 1, 1, '2018-12-25 19:51:54', '2018-12-25 20:07:57'),
(9, 18, 23, 8, 'file/uKfo5Xs8iriWRldqH6jicw0Bzi3Tzr3iYIkVNLvg.docx', '2018-12-24 13:25:07', 0, 1, '2018-12-25 19:52:14', '2018-12-25 19:52:14'),
(10, 10, 27, 12, 'file/E9igWdcVom97DrcmrTyTCHeuJZAwBLp7g065r8ra.docx', '2018-12-19 13:25:07', 0, 1, '2018-12-25 19:52:18', '2018-12-25 19:52:18'),
(11, 11, 35, 6, 'file/j0eazzaLdGqAqdgXP5LRL7Py36CCW3lHJBEVDVBI.docx', '2018-12-24 13:25:07', 1, 1, '2018-12-25 19:52:42', '2018-12-26 17:48:42'),
(12, 18, 43, 13, 'file/oLdVshUiYV6mhpeHMdZp9mgKoOCj9AJ21bctAw3V.docx', '2018-12-24 13:25:07', 0, 1, '2018-12-25 19:52:47', '2018-12-25 19:52:47'),
(13, 10, 45, 14, 'file/i5GMy674RXgi91bvXyZAY3ahIDDAEKjxjCIw0LHJ.docx', '2018-12-25 13:25:07', 0, 1, '2018-12-25 19:53:04', '2018-12-25 19:53:04'),
(14, 18, 19, 9, 'file/8nuCIYw5mpyem7l1JpndD72ErKGEHqqkpJ8eMZ32.docx', '2018-12-20 13:25:07', 0, 1, '2018-12-25 19:53:27', '2018-12-25 19:53:27'),
(15, 14, 32, 1, 'file/hPIOF5h38G87inZGZIYYIl0TQvIL26cNnGyjP3PU.docx', '2018-12-24 13:25:07', 0, 1, '2018-12-25 19:53:35', '2018-12-25 19:53:35'),
(16, 13, 31, 2, 'file/FnmDTC1CaEH7qLuCuKWhVaggop1KqB8lFXZqu23H.docx', '2018-12-24 13:25:07', 0, 1, '2018-12-25 19:53:54', '2018-12-25 19:53:54');

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
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2018_11_17_035340_create_companies_table', 1),
(31, '2018_11_18_071536_create_departments_table', 1),
(32, '2018_11_18_071627_create_offices_table', 1),
(33, '2018_11_18_091832_create_designations_table', 1),
(34, '2018_11_18_092006_create_employee_types_table', 1),
(35, '2018_11_18_095138_create_employee_informations_table', 1),
(36, '2018_11_18_095417_create_addresses_table', 1),
(37, '2018_11_18_105534_create_project_slabs_table', 1),
(38, '2018_11_18_105659_create_project_categories_table', 1),
(39, '2018_11_18_105739_create_clients_table', 1),
(40, '2018_11_19_045155_create_t_a_s_table', 1),
(41, '2018_11_19_045214_create_schedules_table', 1),
(42, '2018_11_19_045239_create_meetings_table', 1),
(43, '2018_11_19_045308_create_followups_table', 1),
(44, '2018_11_19_045334_create_probations_table', 1),
(45, '2018_11_19_045357_create_sales_table', 1),
(46, '2018_11_19_045422_create_call_histories_table', 1),
(47, '2018_11_19_090606_create_countries_table', 1),
(48, '2018_11_19_090644_create_cities_table', 1),
(49, '2018_11_28_062842_create_projects_table', 1),
(50, '2018_12_03_180359_create_roles_table', 1),
(51, '2018_12_03_184753_create_role_user_table', 1),
(52, '2018_12_03_184953_create_permissions_table', 1),
(53, '2018_12_03_185027_create_permission_role_table', 1),
(54, '2018_12_16_134840_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('113f6189-947c-4426-a7e0-a0632148c10c', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 11, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:05:33', '2018-12-25 19:05:33'),
('1917a183-e154-4e20-b802-c86517d99ed1', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 10, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:04:54', '2018-12-25 19:04:54'),
('1b0dbc78-d4fb-4c62-a9a4-69a8ab0483a5', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 18, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:09:20', '2018-12-25 19:09:20'),
('28567bc0-937e-4e70-84b9-9280b0ed9dff', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 14, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:09:47', '2018-12-25 19:09:47'),
('35facc74-82fe-4d92-87cb-abfc997126a2', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 9, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 18:02:25', '2018-12-25 18:02:25'),
('444c3c0c-9821-4ccd-95f1-e1ee0b4531e1', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 11, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 18:59:28', '2018-12-25 18:59:28'),
('457d8e8f-e2cd-401b-8396-0562cc4523c7', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 18, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:09:01', '2018-12-25 19:09:01'),
('47fc5757-cc7e-4b63-8881-442dfe223f5f', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 11, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-26 06:32:15', '2018-12-26 06:32:15'),
('502a2c3b-d73f-4fa9-8122-82abdf47d70b', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 9, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 18:01:49', '2018-12-25 18:01:49'),
('51ed63fa-8868-4ba5-86a6-82518589c9b7', 'App\\Notifications\\MeetingCreate', 'App\\Model\\User', 9, '{\"message\":\"New meeting history..\",\"route\":\"meetings\"}', NULL, '2018-12-25 19:27:57', '2018-12-25 19:27:57'),
('81384066-b50a-4ded-b814-f64e9cabfbab', 'App\\Notifications\\MeetingCreate', 'App\\Model\\User', 9, '{\"message\":\"New meeting history..\",\"route\":\"meetings\"}', NULL, '2018-12-25 19:18:04', '2018-12-25 19:18:04'),
('b5bcfc26-4435-44f2-844e-2ecacc20c2a0', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 10, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:07:09', '2018-12-25 19:07:09'),
('c72100f6-e355-416c-84c0-992c58e5b062', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 18, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:08:45', '2018-12-25 19:08:45'),
('c7624e32-f63a-4d74-a7aa-b5e276261e70', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 9, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-26 15:22:36', '2018-12-26 15:22:36'),
('cb9d836e-fd6c-4c8e-8599-c703c55b74de', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 11, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:04:29', '2018-12-25 19:04:29'),
('d576f6b3-2017-4942-8007-33e9ff421891', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 10, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:05:10', '2018-12-25 19:05:10'),
('db1f34a1-7492-41ca-858a-8c850107de4e', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 11, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-26 06:31:41', '2018-12-26 06:31:41'),
('fe61a3c8-8cf5-4ec6-aaa4-23e239cc7b9a', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 9, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-26 15:26:20', '2018-12-26 15:26:20'),
('fe87fb33-f231-43ce-8eb5-50da085cf137', 'App\\Notifications\\ScheduleCreate', 'App\\Model\\User', 10, '{\"message\":\"New schedule!\",\"route\":\"schedules\"}', NULL, '2018-12-25 19:06:49', '2018-12-25 19:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `company_id`, `address_id`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Head office', 'ceo@harman.com', '01673428653', 1, '2018-12-25 09:30:06', '2018-12-25 12:51:15'),
(7, 10, 13, 'City Office', 'daisy@systechdigital.com', '01568965437', 1, '2018-12-25 09:30:10', '2018-12-25 12:58:54'),
(8, 10, 15, 'Chittagong Office', 'chittagong@systech.com', '01736465464', 1, '2018-12-25 09:30:10', '2018-12-25 12:50:26'),
(9, 9, 17, 'City Office', 'city@mangrove.com', '01653452565', 1, '2018-12-25 09:30:11', '2018-12-25 12:33:21'),
(10, 10, 19, 'Head Office', 'info@systech.com', '01674362362', 1, '2018-12-25 09:30:11', '2018-12-25 12:58:29');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(583, 'employees.index', 'View Employee Page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(584, 'employees.store', 'Insert Employee', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(585, 'employees.edit', 'Edit Employee', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(586, 'employees.create', 'Create Employee', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(587, 'employees.update', 'Update Employee', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(588, 'employees.destroy', 'Delete Employee', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(589, 'employees.show', 'Show individual Employee', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(590, 'employeetypes.index', 'View employee type page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(591, 'employeetypes.store', 'Insert employee type', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(592, 'employeetypes.update', 'Update employee type', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(593, 'employeetypes.destroy', 'Delete employee type', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(594, 'employeetypes.show', 'Show individual employee type', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(595, 'employeetypes.create', 'Create employee type', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(596, 'employeetypes.edit', 'Update employee type', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(597, 'companies.index', 'View Company Page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(598, 'companies.store', 'Insert Company', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(599, 'companies.edit', 'Edit Company', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(600, 'companies.create', 'Create Company', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(601, 'companies.update', 'Update Company', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(602, 'companies.destroy', 'Delete Company', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(603, 'companies.show', 'Show individual Company', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(604, 'offices.index', 'View Office Page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(605, 'offices.store', 'Insert Office', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(606, 'offices.edit', 'Edit Office', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(607, 'offices.create', 'Create Office', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(608, 'offices.update', 'Update Office', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(609, 'offices.destroy', 'Delete Office', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(610, 'offices.show', 'Show Individual Office', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(611, 'clients.index', 'View Client Page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(612, 'clients.store', 'Insert Client', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(613, 'clients.edit', 'Edit Client', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(614, 'clients.create', 'Create Client', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(615, 'clients.update', 'Update Client', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(616, 'clients.destroy', 'Delete Client', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(617, 'clients.show', 'Show individual Client', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(618, 'sales.index', 'View Sale Page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(619, 'sales.store', 'Insert Sales', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(620, 'sales.edit', 'Edit Sales', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(621, 'sales.create', 'Create Sales', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(622, 'sales.update', 'Update Sales', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(623, 'sales.destroy', 'Delete Sales', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(624, 'sales.show', 'Show individual Sale', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(625, 'departments.index', 'View Department Page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(626, 'departments.store', 'Insert Department', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(627, 'departments.edit', 'Edit Department', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(628, 'departments.create', 'Create Department', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(629, 'departments.update', 'Update Department', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(630, 'departments.destroy', 'Delete Department', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(631, 'departments.show', 'Show individual Department', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(632, 'addresses.index', 'View address page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(633, 'addresses.store', 'Insert address', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(634, 'addresses.update', 'Update address', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(635, 'addresses.destroy', 'Delete address', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(636, 'addresses.show', 'Show individual address', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(637, 'addresses.create', 'Create address', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(638, 'addresses.edit', 'Update address', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(639, 'callhistories.index', 'View call history page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(640, 'callhistories.store', 'Insert call history', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(641, 'callhistories.update', 'Update call history', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(642, 'callhistories.destroy', 'Delete call history', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(643, 'callhistories.show', 'Show individual call history', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(644, 'callhistories.create', 'Create call history', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(645, 'callhistories.edit', 'Update call history', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(646, 'cities.index', 'View city page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(647, 'cities.store', 'Insert city', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(648, 'cities.update', 'Update city', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(649, 'cities.destroy', 'Delete city', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(650, 'cities.show', 'Show individual city', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(651, 'cities.create', 'Create city', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(652, 'cities.edit', 'Update city', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(653, 'countries.index', 'View country page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(654, 'countries.store', 'Insert country', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(655, 'countries.update', 'Update country', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(656, 'countries.destroy', 'Delete country', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(657, 'countries.show', 'Show individual country', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(658, 'countries.create', 'Create country', NULL, NULL),
(659, 'countries.edit', 'Update country', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(660, 'designations.index', 'View designation page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(661, 'designations.store', 'Insert designation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(662, 'designations.update', 'Update designation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(663, 'designations.destroy', 'Delete designation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(664, 'designations.show', 'Show individual designation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(665, 'designations.create', 'Create designation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(666, 'designations.edit', 'Update designation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(667, 'followups.index', 'View followup page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(668, 'followups.store', 'Insert followup ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(669, 'followups.update', 'Update followup ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(670, 'followups.destroy', 'Delete followup ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(671, 'followups.show', 'Show individual followup ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(672, 'followups.create', 'Create followup ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(673, 'followups.edit', 'Update followup ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(674, 'meetings.index', 'View meeting page', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(675, 'meetings.store', 'Insert meeting ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(676, 'meetings.update', 'Update meeting ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(677, 'meetings.destroy', 'Delete meeting ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(678, 'meetings.show', 'Show individual meeting ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(679, 'meetings.create', 'Create meeting', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(680, 'meetings.edit', 'Update meeting ', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(681, 'permissions.index', 'View permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(682, 'permissions.store', 'Insert permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(683, 'permissions.update', 'Update permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(684, 'permissions.destroy', 'Delete permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(685, 'permissions.show', 'Show individual permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(686, 'permissions.create', 'Create permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(687, 'permissions.edit', 'Update permission', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(688, 'probations.index', 'View probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(689, 'probations.store', 'Insert probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(690, 'probations.update', 'Update probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(691, 'probations.destroy', 'Delete probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(692, 'probations.show', 'Show individual probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(693, 'probations.create', 'Create probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(694, 'probations.edit', 'Update probation', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(695, 'projectcategories.index', 'View project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(696, 'projectcategories.store', 'Insert project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(697, 'projectcategories.update', 'Update project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(698, 'projectcategories.destroy', 'Delete project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(699, 'projectcategories.show', 'Show individual project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(700, 'projectcategories.create', 'Create project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(701, 'projectcategories.edit', 'Update project category', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(702, 'projects.index', 'View project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(703, 'projects.store', 'Insert project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(704, 'projects.update', 'Update project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(705, 'projects.destroy', 'Delete project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(706, 'projects.show', 'Show individual project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(707, 'projects.create', 'Create project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(708, 'projects.edit', 'Update project', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(709, 'projectslabs.index', 'View project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(710, 'projectslabs.store', 'Insert project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(711, 'projectslabs.update', 'Update project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(712, 'projectslabs.destroy', 'Delete project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(713, 'projectslabs.show', 'Show project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(714, 'projectslabs.create', 'Create project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(715, 'projectslabs.edit', 'Update project slab', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(716, 'roles.index', 'View employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(717, 'roles.store', 'Insert employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(718, 'roles.update', 'Update employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(719, 'roles.destroy', 'Delete employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(720, 'roles.show', 'Show employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(721, 'roles.create', 'Create employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(722, 'roles.edit', 'Update employee role', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(723, 'schedules.index', 'View schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(724, 'schedules.store', 'Insert schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(725, 'schedules.update', 'Update schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(726, 'schedules.destroy', 'Delete schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(727, 'schedules.show', 'Show schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(728, 'schedules.create', 'Create schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(729, 'schedules.edit', 'Update schedule', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(730, 'tadetails.index', 'View travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(731, 'tadetails.store', 'Insert travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(732, 'tadetails.update', 'Update travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(733, 'tadetails.destroy', 'Delete travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(734, 'tadetails.show', 'Show travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(735, 'tadetails.create', 'Create travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(736, 'tadetails.edit', 'Update travelling allowance', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(737, 'createSalesReport', 'Generate Sales Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(738, 'createEmployeesReport', 'Generate Employee Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(739, 'createProjectsReport', 'Generate Projects Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(740, 'createMeetingsReport', 'Generate Meetings Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(741, 'viewProjectsReport', 'View Project Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(742, 'viewEmployeesReport', 'View Employee Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(743, 'viewSalesReport', 'View Sales Report', '2018-12-25 16:24:21', '2018-12-25 16:24:21'),
(744, 'viewMeetingsReport', 'View Meeting Report', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1683, 637, 1),
(1684, 635, 1),
(1685, 638, 1),
(1686, 632, 1),
(1687, 636, 1),
(1688, 633, 1),
(1689, 634, 1),
(1690, 644, 1),
(1691, 642, 1),
(1692, 645, 1),
(1693, 639, 1),
(1694, 643, 1),
(1695, 640, 1),
(1696, 641, 1),
(1697, 651, 1),
(1698, 649, 1),
(1699, 652, 1),
(1700, 646, 1),
(1701, 650, 1),
(1702, 647, 1),
(1703, 648, 1),
(1704, 614, 1),
(1705, 616, 1),
(1706, 613, 1),
(1707, 611, 1),
(1708, 617, 1),
(1709, 612, 1),
(1710, 615, 1),
(1711, 600, 1),
(1712, 602, 1),
(1713, 599, 1),
(1714, 597, 1),
(1715, 603, 1),
(1716, 598, 1),
(1717, 601, 1),
(1718, 658, 1),
(1719, 656, 1),
(1720, 659, 1),
(1721, 653, 1),
(1722, 657, 1),
(1723, 654, 1),
(1724, 655, 1),
(1725, 738, 1),
(1726, 740, 1),
(1727, 739, 1),
(1728, 737, 1),
(1729, 628, 1),
(1730, 630, 1),
(1731, 627, 1),
(1732, 625, 1),
(1733, 631, 1),
(1734, 626, 1),
(1735, 629, 1),
(1736, 665, 1),
(1737, 663, 1),
(1738, 666, 1),
(1739, 660, 1),
(1740, 664, 1),
(1741, 661, 1),
(1742, 662, 1),
(1743, 586, 1),
(1744, 588, 1),
(1745, 585, 1),
(1746, 583, 1),
(1747, 589, 1),
(1748, 584, 1),
(1749, 587, 1),
(1750, 595, 1),
(1751, 593, 1),
(1752, 596, 1),
(1753, 590, 1),
(1754, 594, 1),
(1755, 591, 1),
(1756, 592, 1),
(1757, 672, 1),
(1758, 670, 1),
(1759, 673, 1),
(1760, 667, 1),
(1761, 671, 1),
(1762, 668, 1),
(1763, 669, 1),
(1764, 679, 1),
(1765, 677, 1),
(1766, 680, 1),
(1767, 674, 1),
(1768, 678, 1),
(1769, 675, 1),
(1770, 676, 1),
(1771, 607, 1),
(1772, 609, 1),
(1773, 606, 1),
(1774, 604, 1),
(1775, 610, 1),
(1776, 605, 1),
(1777, 608, 1),
(1778, 686, 1),
(1779, 684, 1),
(1780, 687, 1),
(1781, 681, 1),
(1782, 685, 1),
(1783, 682, 1),
(1784, 683, 1),
(1785, 693, 1),
(1786, 691, 1),
(1787, 694, 1),
(1788, 688, 1),
(1789, 692, 1),
(1790, 689, 1),
(1791, 690, 1),
(1792, 700, 1),
(1793, 698, 1),
(1794, 701, 1),
(1795, 695, 1),
(1796, 699, 1),
(1797, 696, 1),
(1798, 697, 1),
(1799, 707, 1),
(1800, 705, 1),
(1801, 708, 1),
(1802, 702, 1),
(1803, 706, 1),
(1804, 703, 1),
(1805, 704, 1),
(1806, 714, 1),
(1807, 712, 1),
(1808, 715, 1),
(1809, 709, 1),
(1810, 713, 1),
(1811, 710, 1),
(1812, 711, 1),
(1813, 721, 1),
(1814, 719, 1),
(1815, 722, 1),
(1816, 716, 1),
(1817, 720, 1),
(1818, 717, 1),
(1819, 718, 1),
(1820, 621, 1),
(1821, 623, 1),
(1822, 620, 1),
(1823, 618, 1),
(1824, 624, 1),
(1825, 619, 1),
(1826, 622, 1),
(1827, 728, 1),
(1828, 726, 1),
(1829, 729, 1),
(1830, 723, 1),
(1831, 727, 1),
(1832, 724, 1),
(1833, 725, 1),
(1834, 735, 1),
(1835, 733, 1),
(1836, 736, 1),
(1837, 730, 1),
(1838, 734, 1),
(1839, 731, 1),
(1840, 732, 1),
(1841, 742, 1),
(1842, 744, 1),
(1843, 741, 1),
(1844, 743, 1),
(1845, 644, 2),
(1846, 642, 2),
(1847, 645, 2),
(1848, 639, 2),
(1849, 643, 2),
(1850, 640, 2),
(1851, 641, 2),
(1852, 614, 2),
(1853, 616, 2),
(1854, 613, 2),
(1855, 611, 2),
(1856, 617, 2),
(1857, 612, 2),
(1858, 615, 2),
(1859, 738, 2),
(1860, 672, 2),
(1861, 670, 2),
(1862, 673, 2),
(1863, 667, 2),
(1864, 671, 2),
(1865, 668, 2),
(1866, 669, 2),
(1867, 728, 2),
(1868, 726, 2),
(1869, 729, 2),
(1870, 723, 2),
(1871, 727, 2),
(1872, 724, 2),
(1873, 725, 2),
(1874, 742, 2),
(1875, 644, 3),
(1876, 642, 3),
(1877, 645, 3),
(1878, 639, 3),
(1879, 643, 3),
(1880, 640, 3),
(1881, 641, 3),
(1882, 614, 3),
(1883, 616, 3),
(1884, 613, 3),
(1885, 611, 3),
(1886, 617, 3),
(1887, 612, 3),
(1888, 615, 3),
(1889, 738, 3),
(1890, 672, 3),
(1891, 670, 3),
(1892, 673, 3),
(1893, 667, 3),
(1894, 671, 3),
(1895, 668, 3),
(1896, 669, 3),
(1897, 679, 3),
(1898, 677, 3),
(1899, 680, 3),
(1900, 674, 3),
(1901, 678, 3),
(1902, 675, 3),
(1903, 676, 3),
(1904, 694, 3),
(1905, 688, 3),
(1906, 692, 3),
(1907, 689, 3),
(1908, 690, 3),
(1909, 621, 3),
(1910, 623, 3),
(1911, 620, 3),
(1912, 618, 3),
(1913, 624, 3),
(1914, 619, 3),
(1915, 622, 3),
(1916, 728, 3),
(1917, 726, 3),
(1918, 729, 3),
(1919, 723, 3),
(1920, 727, 3),
(1921, 724, 3),
(1922, 725, 3),
(1923, 735, 3),
(1924, 733, 3),
(1925, 736, 3),
(1926, 730, 3),
(1927, 734, 3),
(1928, 731, 3),
(1929, 732, 3),
(1930, 742, 3),
(1931, 644, 4),
(1932, 642, 4),
(1933, 645, 4),
(1934, 639, 4),
(1935, 643, 4),
(1936, 640, 4),
(1937, 641, 4),
(1938, 614, 4),
(1939, 616, 4),
(1940, 613, 4),
(1941, 611, 4),
(1942, 617, 4),
(1943, 612, 4),
(1944, 615, 4),
(1945, 738, 4),
(1946, 740, 4),
(1947, 739, 4),
(1948, 737, 4),
(1949, 589, 4),
(1950, 672, 4),
(1951, 670, 4),
(1952, 673, 4),
(1953, 667, 4),
(1954, 671, 4),
(1955, 668, 4),
(1956, 669, 4),
(1957, 679, 4),
(1958, 677, 4),
(1959, 680, 4),
(1960, 674, 4),
(1961, 678, 4),
(1962, 675, 4),
(1963, 676, 4),
(1964, 693, 4),
(1965, 691, 4),
(1966, 694, 4),
(1967, 688, 4),
(1968, 692, 4),
(1969, 689, 4),
(1970, 690, 4),
(1971, 700, 4),
(1972, 698, 4),
(1973, 701, 4),
(1974, 695, 4),
(1975, 699, 4),
(1976, 696, 4),
(1977, 697, 4),
(1978, 707, 4),
(1979, 705, 4),
(1980, 708, 4),
(1981, 702, 4),
(1982, 706, 4),
(1983, 703, 4),
(1984, 704, 4),
(1985, 714, 4),
(1986, 712, 4),
(1987, 715, 4),
(1988, 709, 4),
(1989, 713, 4),
(1990, 710, 4),
(1991, 711, 4),
(1992, 621, 4),
(1993, 623, 4),
(1994, 620, 4),
(1995, 618, 4),
(1996, 624, 4),
(1997, 619, 4),
(1998, 622, 4),
(1999, 728, 4),
(2000, 726, 4),
(2001, 729, 4),
(2002, 723, 4),
(2003, 727, 4),
(2004, 724, 4),
(2005, 725, 4),
(2006, 735, 4),
(2007, 733, 4),
(2008, 736, 4),
(2009, 730, 4),
(2010, 734, 4),
(2011, 731, 4),
(2012, 732, 4),
(2013, 742, 4),
(2014, 744, 4),
(2015, 741, 4),
(2016, 743, 4),
(2179, 589, 3),
(2180, 589, 2);

-- --------------------------------------------------------

--
-- Table structure for table `probations`
--

CREATE TABLE `probations` (
  `id` int(10) UNSIGNED NOT NULL,
  `probationable_id` int(10) UNSIGNED DEFAULT NULL,
  `probationable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_category_id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Hr & Payroll', 'Payroll is the process by which employers pay an employee for the work they have completed. ...', '1', '2018-12-25 12:57:10', '2018-12-25 12:57:10'),
(2, 6, 'Human Resource Management', 'Organization set up and configuration\r\nHiring management\r\nProfile management', '1', '2018-12-25 13:01:13', '2018-12-25 13:01:13'),
(3, 2, 'Contract Management', 'Contract request & initiation\r\nAuthoring and clause library', '1', '2018-12-25 13:01:38', '2018-12-25 13:01:38'),
(4, 1, 'Board Management', 'Meetings \r\nData management', '1', '2018-12-25 13:02:06', '2018-12-25 13:02:06'),
(5, 3, 'Domain And Hosting', 'Doamin hosing is providing by systech digital', '1', '2018-12-25 13:03:11', '2018-12-25 13:17:21'),
(6, 4, 'HiTranslate', 'HiTranslate - support all language translatorHiTranslate - support all language translator', '1', '2018-12-25 13:05:05', '2018-12-25 13:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Web Solutions', '2018-12-25 12:54:38', '2018-12-25 12:54:38'),
(2, 'Digital Content', '2018-12-25 12:54:50', '2018-12-25 12:54:50'),
(3, 'Domain Hosting', '2018-12-25 12:55:04', '2018-12-25 12:55:04'),
(4, 'Mobile Apps', '2018-12-25 12:55:11', '2018-12-25 12:55:11'),
(5, 'E Commerce', '2018-12-25 12:55:26', '2018-12-25 12:55:26'),
(6, 'Software Solutions', '2018-12-25 12:56:07', '2018-12-25 12:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `project_slabs`
--

CREATE TABLE `project_slabs` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `support_cost` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_slabs`
--

INSERT INTO `project_slabs` (`id`, `project_id`, `name`, `price`, `employee`, `support_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diamond Slab', 200000, 200, 20000, '1', '2018-12-25 13:13:02', '2018-12-25 13:15:48'),
(2, 1, 'premium', 300000, 500, 20000, '1', '2018-12-25 13:15:34', '2018-12-25 13:15:34'),
(3, 6, 'Diamond', 340000, 100, 10000, '1', '2018-12-25 13:16:21', '2018-12-25 13:16:21'),
(4, 2, 'Premium', 450000, 100, 15000, '1', '2018-12-25 13:16:55', '2018-12-25 13:16:55'),
(5, 5, 'Easy', 35000, 100, 4000, '1', '2018-12-25 13:17:53', '2018-12-25 13:17:53'),
(6, 3, 'Silver', 270000, 200, 16000, '1', '2018-12-25 13:18:24', '2018-12-25 13:18:24'),
(7, 4, 'diamond', 3400000, 100, 23000, '1', '2018-12-25 13:19:07', '2018-12-25 13:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL),
(2, 'marketing', 'Marketing Executive', NULL, NULL),
(3, 'sales', 'Sales Executive', NULL, NULL),
(4, 'manager', 'Business Development Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 5),
(2, 3, 11),
(3, 3, 10),
(4, 4, 9),
(5, 3, 12),
(10, 2, 7),
(11, 2, 13),
(12, 2, 14),
(13, 3, 19),
(14, 3, 18),
(15, 3, 17),
(16, 2, 16),
(18, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `project_slab_id` int(10) UNSIGNED DEFAULT NULL,
  `meeting_id` int(10) UNSIGNED DEFAULT NULL,
  `price` int(11) NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `client_id`, `project_id`, `project_slab_id`, `meeting_id`, `price`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 38, 4, 7, 6, 240000, NULL, 0, '2018-12-25 20:15:08', '2018-12-25 20:15:08'),
(2, 11, 34, 1, 2, 8, 300000, NULL, 0, '2018-12-25 20:15:32', '2018-12-25 20:15:32'),
(3, 11, 34, 5, 5, 1, 200000, NULL, 0, '2018-12-25 20:15:48', '2018-12-25 20:15:48'),
(4, 10, 27, 1, 2, 10, 340000, NULL, 0, '2018-12-25 20:28:53', '2018-12-25 20:28:53'),
(5, 11, 17, 3, 6, 5, 25000, NULL, 0, '2018-12-25 20:29:17', '2018-12-25 20:29:17'),
(6, 18, 19, 1, 1, 14, 34000, NULL, 0, '2018-12-25 20:29:42', '2018-12-25 20:29:42'),
(7, 11, 35, 1, 1, 4, 123000, NULL, 0, '2018-12-25 20:29:55', '2018-12-25 20:29:55'),
(8, 11, 45, 6, 3, 3, 500000, NULL, 0, '2018-12-25 20:30:09', '2018-12-25 20:30:09'),
(9, 14, 32, 1, 2, 15, 350000, NULL, 0, '2018-12-25 20:30:21', '2018-12-25 20:30:21'),
(10, 18, 43, 1, 2, 12, 590000, NULL, 0, '2018-12-25 20:30:36', '2018-12-25 20:30:36'),
(11, 11, 35, 1, 1, 11, 350000, NULL, 0, '2018-12-25 20:30:54', '2018-12-25 20:30:54'),
(12, 18, 23, 3, 6, 9, 250000, NULL, 0, '2018-12-25 20:31:09', '2018-12-25 20:31:09'),
(13, 10, 21, 4, 7, 7, 140000, NULL, 0, '2018-12-25 20:31:22', '2018-12-25 20:31:22'),
(14, 13, 31, 6, 3, 16, 230000, NULL, 0, '2018-12-25 20:31:39', '2018-12-25 20:31:39'),
(15, 10, 45, 1, 1, 13, 450000, NULL, 0, '2018-12-25 20:31:52', '2018-12-25 20:31:52'),
(16, 11, 32, 4, 7, 2, 340000, NULL, 0, '2018-12-25 20:32:07', '2018-12-25 20:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `call_history_id` int(10) UNSIGNED DEFAULT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `schedule_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `call_history_id`, `address_id`, `employee_id`, `schedule_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 21, 14, '2018-12-27 18:00:07', 1, '2018-12-25 18:01:49', '2018-12-25 19:09:42'),
(2, 3, 22, 13, '2018-12-27 19:40:07', 1, '2018-12-25 18:02:25', '2018-12-25 19:10:03'),
(3, 4, 23, 11, '2018-12-19 00:00:00', 1, '2018-12-25 18:02:44', '2018-12-25 18:59:22'),
(4, 5, 24, 11, '2018-12-26 08:25:07', 1, '2018-12-25 18:03:21', '2018-12-25 19:04:24'),
(5, 6, 25, 11, '2018-12-20 11:30:00', 1, '2018-12-25 18:04:20', '2018-12-25 19:05:28'),
(6, 6, 26, 11, '2018-12-19 12:40:00', 1, '2018-12-25 18:05:04', '2018-12-25 19:05:56'),
(7, 8, 27, 11, '2018-12-24 14:45:00', 1, '2018-12-25 18:05:31', '2018-12-25 19:06:21'),
(8, 9, 28, 18, '2018-12-26 15:45:00', 1, '2018-12-25 18:06:01', '2018-12-25 19:08:56'),
(9, 11, 29, 18, '2018-12-27 16:50:00', 1, '2018-12-25 18:06:29', '2018-12-25 19:09:15'),
(10, 13, 30, 11, '2018-12-25 21:45:07', 1, '2018-12-25 18:07:01', '2018-12-26 06:31:33'),
(11, 21, 31, 10, '2018-12-25 09:30:07', 1, '2018-12-25 18:46:46', '2018-12-25 19:05:05'),
(12, 20, 32, 10, '2018-12-26 09:30:07', 1, '2018-12-25 18:47:20', '2018-12-25 19:04:48'),
(13, 18, 33, 18, '2018-12-27 15:25:07', 1, '2018-12-25 18:47:47', '2018-12-25 19:08:40'),
(14, 19, 34, 10, '2018-12-27 15:25:07', 1, '2018-12-25 18:48:09', '2018-12-25 19:06:43'),
(15, 17, 35, 10, '2018-12-24 15:25:07', 1, '2018-12-25 18:48:26', '2018-12-25 19:07:04'),
(16, 4, 38, 11, '2018-12-24 21:45:07', 1, '2018-12-25 21:00:04', '2018-12-25 21:01:26'),
(17, 15, 37, 11, '2018-12-11 15:25:07', 1, '2018-12-25 18:49:09', '2018-12-25 19:07:26'),
(22, 21, 43, 11, '2018-12-04 14:25:07', 1, '2018-12-26 15:26:48', '2018-12-26 17:42:54'),
(23, 21, 44, 11, '2018-12-27 21:25:07', 1, '2018-12-26 18:58:02', '2018-12-27 05:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `t_a_s`
--

CREATE TABLE `t_a_s` (
  `id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED DEFAULT NULL,
  `meeting_id` int(10) UNSIGNED DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_a_s`
--

INSERT INTO `t_a_s` (`id`, `schedule_id`, `meeting_id`, `source`, `destination`, `cost`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 'dhaka', 'khulna', '578', NULL, 1, '2018-12-25 19:18:04', '2018-12-25 19:18:04'),
(2, 3, 2, 'Dhaka', 'Jessore', '1000', NULL, 1, '2018-12-25 19:27:57', '2018-12-25 19:27:57'),
(3, 10, 3, 'Dhaka', 'Comilla', '900', NULL, 1, '2018-12-25 19:43:34', '2018-12-25 19:43:34'),
(4, 5, 4, 'Dhaka', 'Comilla', '900', NULL, 1, '2018-12-25 19:46:00', '2018-12-25 19:46:00'),
(5, 7, 5, 'Dhaka', 'Chittagong', '1800', NULL, 1, '2018-12-25 19:47:20', '2018-12-25 19:47:20'),
(6, 15, 6, 'Dhaka', 'Chittagong', '1800', NULL, 1, '2018-12-25 19:50:32', '2018-12-25 19:50:32'),
(7, 11, 7, 'Chittagong', 'dhaka', '1800', NULL, 1, '2018-12-25 19:51:31', '2018-12-25 19:51:31'),
(8, 4, 8, 'Uttara', 'Mohakhali', '180', NULL, 1, '2018-12-25 19:51:55', '2018-12-25 19:51:55'),
(9, 8, 9, 'Uttara', 'Karwan Bazar', '180', NULL, 1, '2018-12-25 19:52:14', '2018-12-25 19:52:14'),
(10, 12, 10, 'Uttara', 'Karwan Bazar', '180', NULL, 1, '2018-12-25 19:52:18', '2018-12-25 19:52:18'),
(11, 6, 11, 'Dhaka', 'Khulna', '1800', NULL, 1, '2018-12-25 19:52:42', '2018-12-25 19:52:42'),
(12, 13, 12, 'Dhaka', 'Khulna', '1800', NULL, 1, '2018-12-25 19:52:47', '2018-12-25 19:52:47'),
(13, 14, 13, 'Dhaka', 'Jessore', '1360', NULL, 1, '2018-12-25 19:53:04', '2018-12-25 19:53:04'),
(14, 9, 14, 'Uttara', 'Sahabagh', '1360', NULL, 1, '2018-12-25 19:53:27', '2018-12-25 19:53:27'),
(15, 1, 15, 'Uttara', 'Sahabagh', '1360', NULL, 1, '2018-12-25 19:53:35', '2018-12-25 19:53:35'),
(16, 2, 16, 'Dhaka', 'Comilla', '1360', NULL, 1, '2018-12-25 19:53:54', '2018-12-25 19:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahsan Zahid Chowdhury', 'ahsanzahid1@systech.com', '2018-12-25 09:30:06', '$2y$10$ZV/wRBnkrsBkXLgXMsHxW.BmjlRoaduYe8m7Nxml9Wjkxk48HQAqi', 'Ay1Deaz8Z3yeVyilO0bfUAooFCw3C6outvOKoug8M0qAhhECD7AneCc9sP5l', '2018-12-25 09:30:06', '2018-12-25 13:31:49'),
(5, 'admin', 'admin@admin.com', '2018-12-25 09:30:09', '$2y$10$LQJCPlBc6SwfmHj6/8KwqOyx9NybIzs2OUBVxg1h5SdoA2vmj4mQ6', 'vO51xqvJRDXXMokM13JLVvJe1XSoMfYZMpxK2E91HoALz9QHwuYEZiYpmcz2', '2018-12-25 09:30:09', '2018-12-25 09:30:09'),
(7, 'Mamun Khan', 'mohaiminul23r@gmail.com', '2018-12-25 09:30:10', '$2y$10$qHEhwfzajLCm99BSH/AbD./LLG48Vy3jpXUPPKeeoaZx3/e9fjBbO', 'qWCcEIQPbd', '2018-12-25 09:30:10', '2018-12-25 13:21:23'),
(9, 'Daisy Sheikh', 'daisy@systech.com', '2018-12-25 09:30:11', '$2y$10$v3PclAx4hC301sGEzFFVyuyx4L9aHvaxEcohgrIOMxBZ7v1j6/pGm', '12KIhP5XNICBNkdXfKlG76KBkQko7NcPuJSAtkMKYG7J1wIUYs7WwpNjAPqv', '2018-12-25 09:30:11', '2018-12-25 13:29:14'),
(10, 'Ashikh Zoha', 'abdullah001rti@yahoo.com', '2018-12-25 09:30:11', '$2y$10$dC7BmRSHrJpK9IgixbhERuaSCV60VlGNMy1R42BvnKtlYY8F/4F0C', 'vOPXc0yZTzsJbNQeHX1zl72vLJL4CXlcZXGW8Sxfk16EKKCaKDkJfLeotd5P', '2018-12-25 09:30:11', '2018-12-25 13:30:29'),
(11, 'Abdullah', 'abdullah001rti@gmail.com', NULL, '$2y$10$WlT26wNWjWDILOa2ZFhbMuMZtm4R5GyDC7job2vcsvex3QudUwUgW', 'ObslzL0JOCLcjgi1MNVbUFVQ2gKXMk0afToYPutuwt6MgbzdWGa7Zp8r7SHq', '2018-12-25 13:39:48', '2018-12-26 04:53:57'),
(12, 'Harisul', 'harisul.agr23@gmail.com', NULL, '$2y$10$LGuJXt.X9240kunxNnMqe.MseAvPYdcsT0YgGdbfldWItCk4KSk92', NULL, '2018-12-25 13:41:53', '2018-12-25 13:41:53'),
(13, 'Imran Rana', 'imran@systech.com', NULL, '$2y$10$N5wstQ27Z7SHUP/P6ecaw.MFDjvU2ehku3CXDCBvVqjVNetX750lq', 'aflicLnkUoBHgjcJWCoEuhcn0w95xA3SerXSMBk2Ni9M0NX5kHwQvCyUfRL9', '2018-12-25 13:43:04', '2018-12-25 13:43:04'),
(14, 'Mahbub Hanif', 'mahbub@systech.com', NULL, '$2y$10$AMvopYqKFkJvLvhH4/WHTupZPS5O759KMSChGOog79hJ2WQIsUIUi', NULL, '2018-12-25 13:44:08', '2018-12-25 13:44:08'),
(15, 'Niam tuhin', 'niamim@gmail.com', NULL, '$2y$10$37.ipo8v2JSHTI6KkHbV0OoMS8dSIkwG/7W1v3.l/YE11aikBUlWW', 'FBudye5xqA7KmP9YYZOiTsX6qCr6KSzQqfzhRRotxTv0lYItaEjPTyabzsnj', '2018-12-25 17:02:40', '2018-12-25 17:02:40'),
(16, 'Tipu Sultan', 'tipu4142@gmail.com', NULL, '$2y$10$gDe9mREiwGZKQshW8G7q4us0Pscl.JG.cYH2ZVuaziB3cRSr70zBe', 'O0tgXW7woNxlIGW6GWRhzhxG2nYRgQCGJg5oW2bfylOmNAcJdDV9Fh242cqJ', '2018-12-25 17:04:36', '2018-12-25 17:04:36'),
(17, 'Suzon mia', 'suzonim@gmail.com', NULL, '$2y$10$rVfnUbROEDXIMCPBVvh47ufImws7rGxXC6WTYezqRBrI/UNUn9R5K', NULL, '2018-12-25 17:06:54', '2018-12-25 17:06:54'),
(18, 'Imam hosen Roni', 'imamhossainroni95@gmail.com', NULL, '$2y$10$EAm/dIbLGGaMla9wvcBnIOLhD7GttcfnkYJaFeulmt6Sk/3pvNcpa', NULL, '2018-12-25 17:08:28', '2018-12-25 17:08:28'),
(19, 'Rakib Rana', 'rakibrana@systech.com', NULL, '$2y$10$SFJqmRWmc5UNs3HdjX7l9.HgFPPma8KaDIRKVsWiCwCaj8aFKXIhm', NULL, '2018-12-25 17:09:55', '2018-12-25 17:09:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_histories`
--
ALTER TABLE `call_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_informations`
--
ALTER TABLE `employee_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_types`
--
ALTER TABLE `employee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `probations`
--
ALTER TABLE `probations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_slabs`
--
ALTER TABLE `project_slabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_a_s`
--
ALTER TABLE `t_a_s`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `call_histories`
--
ALTER TABLE `call_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_informations`
--
ALTER TABLE `employee_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2181;

--
-- AUTO_INCREMENT for table `probations`
--
ALTER TABLE `probations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_slabs`
--
ALTER TABLE `project_slabs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `t_a_s`
--
ALTER TABLE `t_a_s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
