-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 12:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_expense_certificates`
--

CREATE TABLE `annual_expense_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificates`
--

CREATE TABLE `birth_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birth_certificates`
--

INSERT INTO `birth_certificates` (`id`, `created_at`, `updated_at`, `name`, `father_name`, `mother_name`, `adm_no`, `class`, `dob`) VALUES
(4, '2019-10-31 14:18:01', '2019-11-01 11:22:31', 'Singh mansimar', 'Kanwaljit singh', 'Raminder Kaur', '7', '10', '2019-07-13'),
(5, '2019-11-01 12:16:43', '2019-11-01 13:00:36', 'Hardil Singh', 'Kanwaljit singh', 'Raminder Kaur', '1', '12', '2019-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `castes`
--

CREATE TABLE `castes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `castes`
--

INSERT INTO `castes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', NULL, NULL),
(2, 'SC', NULL, NULL),
(3, 'OBC', NULL, NULL),
(4, 'ST', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `character_certificates`
--

CREATE TABLE `character_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `character_certificates`
--

INSERT INTO `character_certificates` (`id`, `name`, `father_name`, `mother_name`, `class`, `dob`, `adm_no`, `created_at`, `updated_at`) VALUES
(2, 'Hardil Singh', 'Kanwaljit singh', 'Raminder KAur', '12', '2019-07-13', '1', '2019-11-01 13:03:55', '2019-11-01 13:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `concessions`
--

CREATE TABLE `concessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concession` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concessions`
--

INSERT INTO `concessions` (`id`, `name`, `concession`, `created_at`, `updated_at`) VALUES
(2, 'Ramade', 24, '2019-11-29 05:44:18', '2019-11-29 10:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fathers`
--

CREATE TABLE `fathers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fathers`
--

INSERT INTO `fathers` (`id`, `name`, `student_id`, `occupation`, `UID`, `qual`, `created_at`, `updated_at`) VALUES
(1, 'KanwalJit Singh', 1, 'bussiness owner', '123456789012', '+12', '2019-10-30 19:46:24', '2019-10-31 08:51:15'),
(2, 'Kanwaljit singh', 2, 'bussiness', '123456789012', '+12', '2019-10-30 20:32:07', '2019-10-30 20:32:07'),
(3, 'Kanwaljit singh', 2, 'bussiness', '123456789012', '+12', '2019-10-31 13:22:30', '2019-10-31 13:22:30'),
(4, 'Kanwaljit singh', 3, 'bussiness', '123456789012', '+12', '2019-11-01 12:10:27', '2019-11-01 12:10:27'),
(5, 'Kanwaljit singh', 4, 'bussiness', '123456789012', '+12', '2019-11-01 12:27:39', '2019-11-01 12:27:39'),
(6, 'Kanwaljit singh', 5, 'bussiness', '123456789012', '+12', '2019-11-01 12:39:17', '2019-11-01 12:39:17'),
(7, 'Kanwaljit singh', 6, 'bussiness', '123456789012', '+12', '2019-11-01 13:03:39', '2019-11-01 13:03:39'),
(8, 'Kanwaljit singh', 7, 'bussiness', '123456789012', '+12', '2019-11-28 08:17:39', '2019-11-28 08:17:39'),
(9, 'Kanwaljit singh', 8, 'bussiness', '0', '+12', '2019-11-28 08:41:05', '2019-11-28 08:41:05'),
(10, 'Kanwaljit singh', 9, 'bussiness', '123456789012', '+12', '2019-11-28 08:43:10', '2019-11-28 08:43:10'),
(11, 'Kanwaljit singh', 10, 'bussiness', '123456789012', '+12', '2019-11-29 05:05:18', '2019-11-29 05:05:18'),
(12, 'Kanwaljit singh', 11, 'bussiness', '123456789012', '+12', '2019-11-29 05:06:29', '2019-11-29 05:06:29'),
(13, 'Kanwaljit singh', 12, 'bussiness', '123456789012', '+12', '2019-11-29 05:07:15', '2019-11-29 05:07:15'),
(14, 'Kanwaljit singh', 13, 'bussiness', '123456789012', '+12', '2019-11-29 05:08:28', '2019-11-29 05:08:28'),
(15, 'Kanwaljit singh', 14, 'bussiness', '123456789012', '+12', '2019-11-29 05:17:52', '2019-11-29 05:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `transport_fee` int(11) NOT NULL,
  `computer_fee` int(11) NOT NULL,
  `totalFee` int(11) NOT NULL,
  `paid_fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `q1`, `q2`, `q3`, `q4`, `fee`, `transport_fee`, `computer_fee`, `totalFee`, `paid_fee`, `created_at`, `updated_at`) VALUES
(1, 13, 0, 0, 0, 0, 1050, 2500, 250, 1300, 0, '2019-11-29 05:08:28', '2019-11-29 05:08:28'),
(2, 14, 1, 0, 1, 0, 1050, 2500, 250, 2500, 0, '2019-11-29 05:17:52', '2019-11-29 05:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `gate_passes`
--

CREATE TABLE `gate_passes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `with_whom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reasons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gate_passes`
--

INSERT INTO `gate_passes` (`id`, `with_whom`, `relation`, `reasons`, `name`, `created_at`, `updated_at`, `father_name`, `class`) VALUES
(1, 'Raminder Kaur', 'Mother', 'sick!!!!', 'Hardil Singh', '2019-11-01 03:58:20', '2019-11-01 11:28:38', 'Kanwaljit singh', '11'),
(2, 'Father', 'fathersick!!', 'singh!!', 'Hardil Singh', '2019-11-01 09:41:52', '2019-11-01 09:41:52', 'Kanwaljit singh', '10');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `computer_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `class`, `created_at`, `updated_at`, `fee`, `computer_fee`) VALUES
(10, 5, '2019-11-29 04:00:17', '2019-11-29 04:00:17', '1050', '250');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_27_064800_create_students_table', 2),
(5, '2019_10_27_072108_create_grades_table', 3),
(6, '2019_10_27_072153_create_sections_table', 3),
(7, '2019_10_27_072215_create_streams_table', 3),
(8, '2019_10_27_072257_create_genders_table', 3),
(9, '2019_10_27_072328_create_fathers_table', 3),
(10, '2019_10_27_072337_create_mothers_table', 3),
(11, '2019_10_27_072405_create_stations_table', 3),
(12, '2019_10_27_072428_create_other_cons_table', 3),
(13, '2019_10_27_072442_create_castes_table', 3),
(14, '2019_10_27_072455_create_religions_table', 3),
(15, '2019_10_29_093610_create_transfer_certificates_table', 4),
(16, '2019_10_29_093709_create_birth_certificates_table', 4),
(17, '2019_10_29_093724_create_annual_expense_certificates_table', 4),
(18, '2019_10_29_093804_create_character_certificates_table', 4),
(19, '2019_10_29_093820_create_gate_passes_table', 4),
(20, '2019_10_29_144756_add_accomodation_to_class', 5),
(21, '2019_10_30_155715_create_employees_table', 6),
(22, '2019_10_30_161835_add_capacity_to_sections', 7),
(23, '2019_11_29_093821_create_fees_table', 8),
(24, '2019_11_29_105515_create_concessions_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mothers`
--

INSERT INTO `mothers` (`id`, `student_id`, `name`, `occupation`, `UID`, `qual`, `created_at`, `updated_at`) VALUES
(1, 1, 'Raminder kaur', 'bussiness owner', '123456789012', '+12', '2019-10-30 19:46:24', '2019-10-31 08:51:15'),
(2, 2, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-10-30 20:32:07', '2019-10-30 20:32:07'),
(3, 2, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-10-31 13:22:30', '2019-10-31 13:22:30'),
(4, 3, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 12:10:27', '2019-11-01 12:10:27'),
(5, 4, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 12:27:39', '2019-11-01 12:27:39'),
(6, 5, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 12:39:17', '2019-11-01 12:39:17'),
(7, 6, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 13:03:39', '2019-11-01 13:03:39'),
(8, 7, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-28 08:17:39', '2019-11-28 08:17:39'),
(9, 8, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-28 08:41:05', '2019-11-28 08:41:05'),
(10, 9, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-28 08:43:10', '2019-11-28 08:43:10'),
(11, 10, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:05:18', '2019-11-29 05:05:18'),
(12, 11, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:06:29', '2019-11-29 05:06:29'),
(13, 12, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:07:15', '2019-11-29 05:07:15'),
(14, 13, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:08:28', '2019-11-29 05:08:28'),
(15, 14, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-29 05:17:52', '2019-11-29 05:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `other_cons`
--

CREATE TABLE `other_cons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hindu', NULL, NULL),
(2, 'Sikh', NULL, NULL),
(3, 'Jain', NULL, NULL),
(4, 'Muslim', NULL, NULL),
(5, 'Christian ', NULL, NULL),
(6, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `grade_id`, `created_at`, `updated_at`, `capacity`) VALUES
(11, 'A', 10, '2019-11-29 04:13:16', '2019-11-29 05:17:52', 25);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`, `created_at`, `updated_at`, `fee`) VALUES
(3, 'Gurdaspur', '2019-11-29 04:04:20', '2019-11-29 04:04:20', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Art', '2019-10-30 12:56:51', '2019-11-01 11:40:56'),
(4, 'Commerce', '2019-10-30 12:56:57', '2019-10-30 12:56:57'),
(5, 'N/A', '2019-10-30 12:59:03', '2019-10-30 12:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` date NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_ad_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_type` int(11) DEFAULT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `stream` int(11) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `adm_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `DOB_certificate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `slc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `report_card` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `aadhar_card` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `document_verified` int(11) NOT NULL,
  `dob` date NOT NULL,
  `father` int(11) DEFAULT NULL,
  `mother` int(11) DEFAULT NULL,
  `tel1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addhar_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `convinience_req` int(11) NOT NULL,
  `station` int(11) NOT NULL,
  `other_con` int(11) DEFAULT NULL,
  `cast_category` int(11) NOT NULL,
  `religion` int(11) NOT NULL,
  `blood_group` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_income` int(11) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `admission_date`, `session`, `previous_ad_number`, `adm_type`, `class`, `section`, `stream`, `roll_number`, `adm_no`, `gender`, `DOB_certificate`, `slc`, `report_card`, `aadhar_card`, `tc`, `document_verified`, `dob`, `father`, `mother`, `tel1`, `tel2`, `addhar_number`, `address`, `convinience_req`, `station`, `other_con`, `cast_category`, `religion`, `blood_group`, `annual_income`, `path`, `created_at`, `updated_at`) VALUES
(6, 'Hardil Singh', '2019-05-15', '2019-2020', '123465ABC', 0, 8, 9, 3, 1, '1', 0, '1', '1', '1', '1', '1', 1, '2019-07-13', 7, 7, '7340910031', '+33617998920', '123456789012', '662/7 Mehar chand Road Gurdaspur', 1, 2, NULL, 2, 3, '0+', 2500000, '1572613419.jpg', '2019-11-01 13:03:39', '2019-11-01 13:03:39'),
(7, 'Hardil Singh', '2019-11-28', '2019-2020', '123465ABC', 1, 8, 9, 3, 2, '2', 0, '1', '1', '1', '1', '1', 0, '2019-07-13', 8, 8, '7340910031', '7340910031', '123456789012', '662/7 Mehar chand Road Gurdaspur', 1, 2, NULL, 1, 1, '0+', 2555, '1574929059.png', '2019-11-28 08:17:39', '2019-11-28 08:17:39'),
(9, 'Hardil Singh', '2019-11-28', '2019-2020', '0', 0, 8, 9, 3, 3, '3', 0, '0', '1', '1', '1', '0', 0, '2222-07-13', 10, 10, '7340910031', '0', '0', '662/7 Mehar chand Road Gurdaspur', 0, 0, NULL, 2, 1, '0+', 6565, '1574930590.png', '2019-11-28 08:43:10', '2019-11-28 08:43:10'),
(13, 'Hardil Singh', '2019-11-29', '2019-2020', '0', 0, 10, 11, 3, 4, '4', 0, '1', '1', '1', '0', '1', 0, '2019-05-13', 14, 14, '7340910031', '0', '123456789012', '662/7 Mehar chand Road Gurdaspur', 1, 3, NULL, 1, 2, '0+', 12500, '1575004108.png', '2019-11-29 05:08:28', '2019-11-29 05:08:28'),
(14, 'Hardil Singh', '2019-11-29', '2019-2020', '0', 0, 10, 11, 3, 5, '5', 0, '1', '1', '0', '1', '1', 1, '2019-05-13', 15, 15, '7340910031', '0', '0', '662/7 Mehar chand Road Gurdaspur', 0, 0, NULL, 1, 1, '0+', 1522200, '1575004672.png', '2019-11-29 05:17:52', '2019-11-29 05:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_certificates`
--

CREATE TABLE `transfer_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `failed` int(11) NOT NULL,
  `subjects` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualified` int(11) NOT NULL,
  `dues_paid_upto` date NOT NULL,
  `fee-cons` int(11) NOT NULL,
  `TPD` int(11) NOT NULL,
  `TWD` int(11) NOT NULL,
  `NCC_cadet` int(11) NOT NULL,
  `extra_caricullar` int(11) NOT NULL,
  `conduct` int(11) NOT NULL,
  `DAC` int(11) NOT NULL,
  `DIC` int(11) NOT NULL,
  `reasons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Hardil Singh', 'hardilsingh87@gmail.com', NULL, '$2y$10$EYS61cLpia1Thz0CBlPVWOhQK/TxgkqVLhMESZ5RvEiSKgfpZiXN2', NULL, '2019-10-26 05:43:40', '2019-10-26 05:43:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_expense_certificates`
--
ALTER TABLE `annual_expense_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `castes`
--
ALTER TABLE `castes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_certificates`
--
ALTER TABLE `character_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concessions`
--
ALTER TABLE `concessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fathers`
--
ALTER TABLE `fathers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gate_passes`
--
ALTER TABLE `gate_passes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_cons`
--
ALTER TABLE `other_cons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_certificates`
--
ALTER TABLE `transfer_certificates`
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
-- AUTO_INCREMENT for table `annual_expense_certificates`
--
ALTER TABLE `annual_expense_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `castes`
--
ALTER TABLE `castes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `character_certificates`
--
ALTER TABLE `character_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `concessions`
--
ALTER TABLE `concessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fathers`
--
ALTER TABLE `fathers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gate_passes`
--
ALTER TABLE `gate_passes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `other_cons`
--
ALTER TABLE `other_cons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transfer_certificates`
--
ALTER TABLE `transfer_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
