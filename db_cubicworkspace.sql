-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2017 at 04:08 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cubicworkspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `codeuser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategoryadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `codeuser`, `codecategoryadmin`, `codeadmin`, `phone`, `image`, `status`, `created_at`, `updated_at`) VALUES
(41, '10', '2', 'ADM001', '87820033395', '97122.jpg', 'N', '2017-09-14 15:18:53', '2017-09-14 15:19:22'),
(42, 'Nava Gia Ginasta', '2', 'ADM002', '87820033395', '54888.png', 'Y', '2017-09-14 15:21:51', '2017-09-14 15:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `adminspartnerships`
--

CREATE TABLE `adminspartnerships` (
  `id` int(10) UNSIGNED NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminspartnerships`
--

INSERT INTO `adminspartnerships` (`id`, `codecompanypartnership`, `codeuser`, `phone`, `image`, `address`, `status`, `created_at`, `updated_at`) VALUES
(8, '7', '10', '1', '97366.png', '1', 'Y', '2017-08-23 00:05:41', '2017-09-12 00:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `billingcompanyservices`
--

CREATE TABLE `billingcompanyservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanyservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codebilling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `currentquota` int(11) NOT NULL,
  `usedquota` int(11) NOT NULL,
  `currentquotauser` int(11) NOT NULL,
  `nowquotauser` int(11) NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerdate` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billingcompanyservices`
--

INSERT INTO `billingcompanyservices` (`id`, `name`, `codecompanyservices`, `codecompanypartnership`, `codebilling`, `quota`, `currentquota`, `usedquota`, `currentquotauser`, `nowquotauser`, `information`, `registerdate`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Special Packages1', 'COS001', '7', '', 10, 10, 0, 0, 0, 'Infromation', '2017-10-03 14:16:47', 'Y', '2017-10-03 07:16:47', '2017-10-03 07:16:47'),
(13, 'Special Packages2', 'COS002', '9', '', 100, 100, 0, 0, 0, 'Infromation', '2017-10-03 14:18:13', 'Y', '2017-10-03 07:18:13', '2017-10-03 07:18:13'),
(14, 'Special Packages3', 'COS003', '7', '', 10, 10, 0, 0, 0, 'Information', '2017-10-03 14:19:17', 'Y', '2017-10-03 07:19:17', '2017-10-03 07:19:17'),
(15, 'Special Packages 4', 'COS004', '7', '', 100, 100, 0, 0, 0, 'Infromation', '2017-10-03 14:40:45', 'Y', '2017-10-03 07:40:45', '2017-10-03 07:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `bookingspaces`
--

CREATE TABLE `bookingspaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `codebookingspace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanyservices` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codebilling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepaymentmethode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `quotauser` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `datein` date NOT NULL,
  `dateout` date NOT NULL,
  `currentquotauser` int(11) NOT NULL,
  `nowquotauser` int(11) NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploadpayment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuspayment` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `dateregister` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingspaces`
--

INSERT INTO `bookingspaces` (`id`, `codebookingspace`, `codecompanyservices`, `codecompanypartnership`, `codebilling`, `codeservices`, `codeuser`, `codepaymentmethode`, `invoice`, `name`, `email`, `phone`, `address`, `quota`, `quotauser`, `price`, `totalprice`, `datein`, `dateout`, `currentquotauser`, `nowquotauser`, `information`, `uploadpayment`, `statuspayment`, `dateregister`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CBS001', '20', '10', '', '2', '34', '1', '57479', 'Nava Gia Ginasta', 'navagiaginasta@gmail.com', '-', '-', 0, 0, 10000000, 70000000, '2017-10-05', '2017-10-12', 0, 0, '', '', 'N', '2017-10-05 07:09:34', 'Y', '2017-10-05 00:09:34', '2017-10-05 00:09:34'),
(3, 'CBS002', '20', '10', '', '2', '34', '1', '60740', 'Nava Gia Ginasta', 'nava.webdevelopers@gmail.com', '-', '-', 0, 0, 10000000, 30000000, '2017-10-01', '2017-10-04', 0, 0, '', '', 'N', '2017-10-05 07:15:10', 'N', '2017-10-05 00:15:10', '2017-10-05 00:15:10'),
(4, 'CBS003', '20', '10', '', '2', '32', '2', '63480', 'Krishna YF', 'nantayp@gmail.com', '-', '-', 0, 0, 10000000, 0, '2017-10-13', '2017-10-13', 0, 0, '', '', 'N', '2017-10-13 07:27:53', 'N', '2017-10-13 00:27:53', '2017-10-13 00:27:53'),
(5, 'CBS004', '21', '9', '', '4', '34', '2', '13262', 'Nava Gia Ginasta', 'nava.webdevelopers@gmail.com', '-', '-', 0, 0, 20000000, 240000000, '2017-10-01', '2017-10-13', 0, 0, '', '', 'N', '2017-10-13 08:33:58', 'N', '2017-10-13 01:33:58', '2017-10-13 01:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtours`
--

CREATE TABLE `bookingtours` (
  `id` int(10) NOT NULL,
  `codecompanyservices` int(50) NOT NULL,
  `codecompanypartnership` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `status` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingtours`
--

INSERT INTO `bookingtours` (`id`, `codecompanyservices`, `codecompanypartnership`, `email`, `phone`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(6, 5, 10, 'navagiaginasta@gmail.com', '087820033395', '2017-09-23', '09:11', 'N', '2017-09-23 01:57:54', '2017-09-23 01:57:54'),
(7, 14, 7, 'navagiaginasta@gmail.com', '87820033395', '2017-09-29', '01:22', 'N', '2017-09-23 02:05:40', '2017-09-23 02:05:40'),
(8, 5, 10, 'navagiaginasta@gmail.com', '87820033395', '2017-09-02', '02:00', 'N', '2017-09-23 02:19:32', '2017-09-23 02:19:32'),
(9, 5, 10, 'ex@gmail.com', '87820033395', '2017-09-09', '03:33', 'N', '2017-09-23 02:20:44', '2017-09-23 02:20:44'),
(10, 5, 10, 'navagiaginasta@gmail.com', '087820033395', '2017-09-09', '03:03', 'N', '2017-09-23 02:21:20', '2017-09-23 02:21:20'),
(11, 8, 9, 'navagiaginasta@gmail.com', '087820033395', '2017-09-08', '00:11', 'N', '2017-09-23 02:22:48', '2017-09-23 02:22:48'),
(12, 8, 9, 'navagiaginasta@gmail.com', '87820033395', '2017-09-29', '16:22', 'N', '2017-09-23 02:31:34', '2017-09-23 02:31:34'),
(13, 8, 9, 'navagiaginasta@gmail.com', 'e', '2017-09-08', '00:01', 'N', '2017-09-23 02:32:13', '2017-09-23 02:32:13'),
(14, 8, 9, 'admin@example.com', '87820033395', '2017-09-23', '14:03', 'N', '2017-09-23 02:32:57', '2017-09-23 02:32:57'),
(15, 13, 7, 'navagiaginasta@gmail.com', '87820033395', '2017-09-04', '01:01', 'N', '2017-09-23 02:33:51', '2017-09-23 02:33:51'),
(16, 5, 10, 'aliando@gmail.com', '010101', '0000-00-00', '02:02', 'N', '2017-09-24 03:56:59', '2017-09-24 03:56:59'),
(17, 5, 10, 'kp@gmail.com', '0899999', '0000-00-00', '10:20', 'N', '2017-09-26 23:26:48', '2017-09-26 23:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `categoryadmins`
--

CREATE TABLE `categoryadmins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategoryadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryadmins`
--

INSERT INTO `categoryadmins` (`id`, `name`, `codecategoryadmin`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ADMIN ALL ACCESS', 'CTA001', '2', 'N', '2017-08-22 10:50:07', '2017-08-22 10:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `categoryevents`
--

CREATE TABLE `categoryevents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategoryevent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryevents`
--

INSERT INTO `categoryevents` (`id`, `name`, `codecategoryevent`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Pelatihan', 'CTE002', 'Pelatihan', 'Y', '2017-09-12 06:02:46', '2017-09-12 06:02:46'),
(4, 'Seminar', 'CTE003', 'Seminar', 'Y', '2017-09-26 07:07:59', '2017-09-26 07:07:59'),
(5, 'Meetup', 'CTE004', 'Meetup', 'Y', '2017-09-26 07:08:18', '2017-09-26 07:09:36'),
(6, 'Bussiness', 'CTE005', 'bisnis', 'Y', '2017-09-26 09:20:21', '2017-09-26 09:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `categorymedia`
--

CREATE TABLE `categorymedia` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategorymedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorymedia`
--

INSERT INTO `categorymedia` (`id`, `name`, `codecategorymedia`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Slider', 'CTM001', 'Slider', 'N', '2017-09-11 21:33:22', '2017-09-26 10:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `categorypaymentmethodes`
--

CREATE TABLE `categorypaymentmethodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategorypaymentmethode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorypaymentmethodes`
--

INSERT INTO `categorypaymentmethodes` (`id`, `name`, `codecategorypaymentmethode`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Category Payment Methode1', 'CPM001', 'Category Payment Methode1', 'N', '2017-08-28 05:39:22', '2017-09-07 01:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `categoryservices`
--

CREATE TABLE `categoryservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategoryservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryservices`
--

INSERT INTO `categoryservices` (`id`, `name`, `codecategoryservices`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Category Services1', 'CTS002', '2', 'N', '2017-08-23 22:22:23', '2017-09-26 09:54:01'),
(4, 'Category Services2', 'CTS003', 'Category Services2', 'Y', '2017-09-06 23:20:51', '2017-09-06 23:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `name`, `codecountry`, `codecity`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Cianjur', '2', 'CIT001', 'Cianjur', 'Y', '2017-08-22 11:44:40', '2017-09-12 00:55:03'),
(3, 'Bandung', '2', 'CIT002', 'Bandung', 'Y', '2017-09-12 06:30:05', '2017-09-12 06:30:05'),
(4, 'Solo', '2', 'CIT003', 'solo', 'Y', '2017-09-26 09:28:34', '2017-09-26 09:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerdate` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `favicon`, `logo`, `email`, `phone`, `fax`, `address`, `maps`, `profile`, `history`, `description`, `vision`, `mision`, `faq`, `registerdate`, `status`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Workspace 53', '55565.png', '20170926175403.png', 'workspace@gmail.com', '087820033395', '022-4200000', 'Jl. Naripan no.53 Bandung', '-6.873364, 107.575632', '<p>Workspace 53 tergolong co-working space baru dan menarik. Lokasinya yang berada di tengah kota Bandung, fasilitas yang lengkap namun dengan harga yang terjangkau menjadi pilihan yang tepat bagi start-up yang sedang mencari co-working space. Lebih dari sekadar ruang bekerja, Workspace menyediakan ekosistem bisnis yang menunjang perkembangan start-up. Selain co-working space dan Office Room yang bisa disewa perbulan, Workspace juga menyediakan Meeting Room dan Virtual Office. Kantin dan coffee shop dengan pilihan menu yang bervariasi juga menambah kenyamanan start-up bekerja di Workspace 53.</p>', 'Workspace 53 mulai beroperasi pada bulan Oktober 2017.', '<p>Workspace menyediakan coworking space, office room, meeting room, dan virtual office. Fasilitas yang disediakan untuk coworking space di antaranya: - High speed internet access - 1 private locker for the team - Free flow coffee &amp; tea in pantry area - Team table max 6 person</p>', 'Menjadi tempat tumbuh kembang kewirausahaan Indonesia melalui coworking space', 'Menyediakan ruang dan ekosistem bisnis untuk start-up dan wirausahawan', '<p>faq</p>', '2017-10-04 05:27:34', 'Y', 'navagiaginasta@gmail.com | 087820033395', '2017-08-21 17:00:00', '2017-10-03 22:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `companypartnerships`
--

CREATE TABLE `companypartnerships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codetagservices` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerdate` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companypartnerships`
--

INSERT INTO `companypartnerships` (`id`, `name`, `codecompanypartnership`, `codetagservices`, `favicon`, `logo`, `email`, `phone`, `fax`, `address`, `maps`, `codecountry`, `codecity`, `profile`, `history`, `description`, `vision`, `mision`, `faq`, `information`, `registerdate`, `status`, `created_at`, `updated_at`) VALUES
(7, 'CO&CO', 'COP001', '3', '88755.jpg', '41297.jpg', 'navagiaginasta@gmail.com', '87820033395', '87820033395', 'Cianjur', '-6.873364, 107.575632', '2', '2', 'Profile CO&CO', '1', '1', '1', '1', '<p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he obsUnpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he obsUnpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he obsUnpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he obsUnpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and</p>', '1', '2017-10-03 15:59:14', 'Y', '2017-09-12 00:37:53', '2017-10-03 08:59:14'),
(8, 'FREENOVATION', 'COP002', '3', '63213.jpg', '47616.jpg', 'fvdfvfdv@gmail.com', '087820033395', '87820033395', 'Cianjur', '-6.9057208,107.6088645', '2', '2', '-', '-', '-', '-', '-', '<p>-</p>', '-', '2017-10-03 16:03:44', 'Y', '2017-09-12 06:32:41', '2017-10-03 09:03:44'),
(9, 'Bandung Digital Valley', 'COP003', '3', '85158.jpg', '46376.jpg', 'bdv@gmail.com', '08919199191', '0', 'Jl.Sari Asih no.54-', '-6.873364, 107.575632', '2', '3', '-', '-', 'His exquisite sincerity education shameless ten earnestly breakfast add. So we me unknown as improve hastily sitting forming. Especially favourable compliment but thoroughly unreserved saw she themselves. Sufficient impossible him may ten insensible put continuing. Oppose exeter income simple few joy cousin but twenty. Scale began quiet up short wrong in in. Sportsmen shy forfeited engrossed may can.', '-', '-', '<p>-</p>', '-', '2017-09-13 12:39:37', 'Y', '2017-09-13 05:34:43', '2017-09-13 05:39:37'),
(10, 'PT.DYCODE INDONESIA', 'COP004', '3', '66913.jpg', '37513.jpg', 'dycode@gmail.com', '0', '0', 'Jl.Sari Asih no.54', '-6.873364, 107.575632', '2', '3', '-', '-', '-', '-', '-', '<p>-</p>', '-', '2017-09-13 13:27:38', 'Y', '2017-09-13 05:40:55', '2017-09-13 06:27:38'),
(12, '1', 'COP005', '3', '57823.jpg', '24848.jpg', 'navagiaginasta@gmail.com', '1', '87820033395', 'Cianjur', 'Cianjur', '2', '2', 'Cianjur', '1', '1', '1', '1', '<p>1</p>', '1', '2017-10-03 16:23:23', 'Y', '2017-10-03 09:20:44', '2017-10-03 09:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `companyservices`
--

CREATE TABLE `companyservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanyservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codetagservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quotauser` int(11) NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerdate` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companyservices`
--

INSERT INTO `companyservices` (`id`, `name`, `codecompanyservices`, `codecompanypartnership`, `codetagservices`, `codeservices`, `codecity`, `quota`, `price`, `quotauser`, `information`, `registerdate`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Special Packages1', 'COS001', '10', '', '2', '2', 10, 10000000, 20, 'Infromation', '2017-10-03 15:55:48', 'Y', '2017-10-03 07:16:47', '2017-10-03 08:55:48'),
(21, 'Special Packages2', 'COS002', '9', '5', '4', '3', 100, 20000000, 10, 'Infromation', '2017-10-03 15:57:15', 'Y', '2017-10-03 07:18:13', '2017-10-03 08:57:15'),
(22, 'Special Packages3', 'COS003', '7', '5', '2', '4', 10, 300000000, 10, 'Information', '2017-10-03 15:56:53', 'Y', '2017-10-03 07:19:17', '2017-10-03 08:56:53'),
(23, 'Special Packages 4', 'COS004', '8', '5', '5', '2', 100, 3500000, 10, 'Infromation', '2017-10-03 15:59:45', 'Y', '2017-10-03 07:40:45', '2017-10-03 08:59:45'),
(30, '1', 'COS005', '7', '5', '2', '2', 1, 1, 1, '1', '2017-10-03 17:18:28', 'Y', '2017-10-03 10:18:28', '2017-10-03 10:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `countrys`
--

CREATE TABLE `countrys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countrys`
--

INSERT INTO `countrys` (`id`, `name`, `codecountry`, `flag`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Indonesia', 'COU001', '55988.png', 'Indonesia', 'N', '2017-08-22 11:40:21', '2017-09-12 00:51:13'),
(3, 'India', 'COU002', '13488.PNG', 'India', 'N', '2017-09-26 09:30:59', '2017-09-26 09:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategoryevent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeevent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `quota` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `codecategoryevent`, `codeevent`, `url`, `description`, `datetime`, `quota`, `image`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Workshop Startup', '3', 'EVT001', '', 'Description Description', '2017-09-26 14:16:18', 10, '57527.jpg', 'Bandung Creative City Forum', 'Y', '2017-09-26 06:52:58', '2017-09-26 07:16:18'),
(2, '100+ Partnership Pelatihan', '3', 'EVT002', '', 'Description', '2017-09-26 14:16:10', 10, '25087.jpg', 'Bandung', 'Y', '2017-09-26 06:58:44', '2017-09-26 07:16:10'),
(3, 'Video Kegiatan Event', '3', 'EVT003', 'https://player.vimeo.com/video/71319358', 'description', '2017-09-26 14:20:34', 0, '17857.jpg', '0', 'Y', '2017-09-26 07:15:24', '2017-09-26 07:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `historybillingcompanyservices`
--

CREATE TABLE `historybillingcompanyservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanyservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codebilling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `currentquota` int(11) NOT NULL,
  `usedquota` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currentquotauser` int(11) NOT NULL,
  `nowquotauser` int(11) NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historybookingspaces`
--

CREATE TABLE `historybookingspaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `codebookingspace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanyservice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecompanypartnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codebilling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `quotauser` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `datein` datetime NOT NULL,
  `dateout` datetime NOT NULL,
  `currentquotauser` int(11) NOT NULL,
  `nowquotauser` int(11) NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historybookingspaces`
--

INSERT INTO `historybookingspaces` (`id`, `codebookingspace`, `codecompanyservice`, `codecompanypartnership`, `codebilling`, `codeservices`, `codeuser`, `invoice`, `name`, `email`, `phone`, `address`, `quota`, `quotauser`, `price`, `totalprice`, `datein`, `dateout`, `currentquotauser`, `nowquotauser`, `information`, `datetime`, `status`, `created_at`, `updated_at`) VALUES
(1, '11', '', '5', '4', '2', '51', '61', 'Nava Gia', 'navagiaginasta@gmail.com', '87820033395', 'Cianjur', 111, 121, 131, 141, '2017-09-07 07:52:49', '2017-09-07 07:52:49', 151, 161, '171', '2017-09-07 07:52:49', 'N', '2017-08-28 05:13:31', '2017-09-07 00:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `informasicompanies`
--

CREATE TABLE `informasicompanies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryinfromasi` enum('HEADER','BOOKING','SERVICES','OFFICE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OFFICE',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasicompanies`
--

INSERT INTO `informasicompanies` (`id`, `name`, `categoryinfromasi`, `title`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, '100+ Partnership', 'HEADER', '100+ Partnership', 'Prepared do an dissuade whatever steepest.', '35922.png', 'Y', '2017-08-21 17:00:00', '2017-09-12 22:06:25'),
(3, '300+ Basecamp', 'HEADER', '300+ Basecamp', 'Tastes giving in passed direct me valley supply.', '29987.png', 'Y', '2017-09-11 22:51:07', '2017-09-12 06:22:55'),
(4, '20000+ Happy Customers', 'HEADER', '20000+ Happy Customers', 'Devonshire invitation discovered indulgence.', '48448.png', 'Y', '2017-09-11 22:51:59', '2017-09-11 22:51:59'),
(5, 'Easy to Booking', 'SERVICES', 'pe-7s-users', 'Blind would equal while oh mr lain led and fact none. One preferred sportsmen resolving the happiness continued. High at of in loud rich true.', '59505.png', 'Y', '2017-09-13 06:32:43', '2017-09-13 07:02:56'),
(6, 'Quality Facilities', 'SERVICES', 'pe-7s-home', 'Admiration stimulated cultivated reasonable be projection possession of. Real no near room ye bred sake if some. Is arranging furnished knowledge.', '90495.png', 'Y', '2017-09-13 06:47:47', '2017-09-13 07:03:08'),
(7, 'Comfortable Room', 'SERVICES', 'pe-7s-car', 'Effect twenty indeed beyond for not had county. The use him without greatly can private. Increasing it unpleasant no of contrasted no continuing.', '37239.png', 'Y', '2017-09-13 06:50:17', '2017-09-13 07:02:34'),
(8, 'Workspace 53', 'OFFICE', 'Workspace 53', 'Jl. Naripan no.53 Bandung, 022-4200000, workspace@gmail.com', '20170926150218.png', 'Y', '2017-09-26 08:02:18', '2017-09-26 08:02:18'),
(9, 'CUBIC INC', 'OFFICE', 'CUBIC INC', 'Jl. Naripan no.53 Bandung, 022-4200000, workspace@gmail.com', '20170926150252.png', 'Y', '2017-09-26 08:02:52', '2017-09-26 08:02:52'),
(10, 'Bandung Creative City Forum', 'OFFICE', 'Bandung Creative City Forum', 'Jl. Naripan no.53 Bandung, 022-4200000, workspace@gmail.com', '20170926150331.jpg', 'Y', '2017-09-26 08:03:31', '2017-09-26 08:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategorymedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codemedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `codecategorymedia`, `codemedia`, `url`, `date`, `writer`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Slider', '5', 'MED001', '#', '12 September 2017 - 11:30', 'Cubic Workspace', '68664.jpg', 'Y', '2017-09-11 21:35:27', '2017-09-11 22:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `mediacompanyservices`
--

CREATE TABLE `mediacompanyservices` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `codecompanyservices` int(10) NOT NULL,
  `codecompanypartnership` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediacompanyservices`
--

INSERT INTO `mediacompanyservices` (`id`, `name`, `codecompanyservices`, `codecompanypartnership`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'MEDIA COMPANY SERVICES1', 20, 7, '20170920165951.jpg', 'Y', '2017-10-03 16:00:56', '2017-10-03 09:00:56'),
(3, 'MEDIA COMPANY SERVICES3', 22, 7, '20170920170047.jpg', 'Y', '2017-10-03 16:01:05', '2017-10-03 09:01:05'),
(4, 'MEDIA COMPANY SERVICES3', 21, 7, '20170920170712.jpg', 'Y', '2017-10-03 16:00:46', '2017-10-03 09:00:46'),
(5, 'MEDIA COMPANY SERVICES4', 23, 8, '20170920170731.jpg', 'Y', '2017-10-03 16:00:35', '2017-10-03 09:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerdate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `codeuser`, `email`, `institution`, `birthday`, `phone`, `address`, `image`, `description`, `information`, `registerdate`, `lastlogin`, `status`, `created_at`, `updated_at`) VALUES
(1, '13', 'user@gmail.com', 'poltekpos', '0101', '087820033395', 'Sarijadi Bandung', '68256.png', '-', '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Y', NULL, '2017-10-03 04:35:50'),
(2, 'CMB001', '', 'poltek', '2017-12-13', '23232323', 'srwrwrwrwrwrwwrrwrw', '45494.PNG', 'qqqqqqqqqqqqqqqqqq', 'qrrrrrrrrrrrrrrrrrr', '2017-09-26 16:13:44', '2017-09-26 16:13:44', 'Y', '2017-09-26 09:13:22', '2017-09-26 09:13:44'),
(3, '32', 'nantayp@gmail.com', 'Cubic', '10/04/2017', '085740172949', 'Antapani', '17301.PNG', '-', '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Y', '2017-10-03 21:53:34', '2017-10-03 22:18:38'),
(4, 'USR008', 'ketut95@gmail.com', 'Poltekpos', '10/05/2017', '0871', '-', '71696.PNG', '-', '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Y', '2017-10-04 22:20:01', '2017-10-04 22:20:01'),
(5, '34', 'nava.webdevelopers@gmail.com', '-', '2017-10-05 07:04:44', '-', '-', '38355.PNG', '-', '-', '2017-10-05 07:04:44', '2017-10-05 07:04:44', 'N', '2017-10-05 00:04:44', '2017-10-05 00:06:01'),
(6, '35', 'd4.ti.1d.polpos@gmail.com', '-', '2017-10-05 07:20:47', '-', '-', '13287.jpg', '-', '-', '2017-10-05 07:20:47', '2017-10-05 07:20:47', 'N', '2017-10-05 00:20:47', '2017-10-05 00:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'wqdqeqf111', 'qefqefef@gmail.com1111', '234234', 'dfsdfsdfds1111', 'Y', '2017-08-28 09:27:14', '2017-08-28 09:27:46'),
(4, 'Nava Gia', 'navagiaginasta@gmail.com', 'konfirmasi pemabyaran dengan invoices 11812', 'konfirmasi pemabyaran dengan invoices 11812konfirmasi pemabyaran dengan invoices 11812konfirmasi pemabyaran dengan invoices 11812konfirmasi pemabyaran dengan invoices 11812', 'N', '2017-09-26 08:59:19', '2017-09-26 08:59:19'),
(5, 'Ketut Adi Wijanarko', 'ketut@gmail.com', 'sudah beres', 'sudah beres pak sudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres paksudah beres pak', 'N', '2017-09-26 10:58:02', '2017-09-26 10:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodes`
--

CREATE TABLE `paymentmethodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategorypaymentmethode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepaymentmethode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nouser` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentmethodes`
--

INSERT INTO `paymentmethodes` (`id`, `name`, `codecategorypaymentmethode`, `codepaymentmethode`, `nameuser`, `nouser`, `description`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '1', 'PAM001', '-', 0, '-', '94121.jpg', 'Y', '2017-09-24 07:15:24', '2017-09-24 07:15:24'),
(2, 'MANDIRI', '1', 'PAM002', '-', 0, '-', '84584.jpg', 'Y', '2017-09-24 07:15:49', '2017-09-24 07:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecategoryservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `codecategoryservices`, `codeservices`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CoWorking', '4', 'SER001', '1231', 'Y', '2017-08-23 22:07:48', '2017-09-13 20:33:18'),
(4, 'Office', '3', 'SER002', 'Office', 'Y', '2017-09-13 20:33:30', '2017-09-13 20:33:30'),
(5, 'Residence', '3', 'SER003', 'Residence', 'Y', '2017-09-13 20:33:41', '2017-09-13 20:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(14, 24, '112227416377852186762', 'google', '2017-09-20 01:22:38', '2017-09-20 01:22:38'),
(18, 34, '1403911603062601', 'facebook', '2017-10-05 00:04:44', '2017-10-05 00:04:44'),
(19, 35, '103641933537457165916', 'google', '2017-10-05 00:20:47', '2017-10-05 00:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `sosialmedias`
--

CREATE TABLE `sosialmedias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sosialmedias`
--

INSERT INTO `sosialmedias` (`id`, `name`, `url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'http://www.facebook.com', 'fa fa-facebook', 'Y', '2017-08-28 05:32:50', '2017-09-26 08:24:11'),
(2, 'Twitter', 'http://www.twitter.com', 'fa fa-twitter', 'Y', '2017-09-26 08:18:37', '2017-09-26 08:24:26'),
(3, 'Google Plus', 'http://www.google.com', 'fa fa-google-plus', 'Y', '2017-09-26 08:19:41', '2017-09-26 08:24:18'),
(4, 'Instagram', 'https://instagram.com', 'fa fa-instagram', 'Y', '2017-09-26 09:05:11', '2017-09-26 10:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Nava Gia', 'navagiaginasta@gmail.com', 'N', '2017-09-13 07:43:32', '2017-09-26 09:12:19'),
(4, '-', 'admin@example.com', 'N', '2017-09-13 07:44:24', '2017-09-13 07:44:24'),
(5, '-', 'ketut@gmail.com', 'N', '2017-09-13 07:46:33', '2017-09-13 07:46:33'),
(7, '-', 'andrey@gmail.com', 'N', '2017-09-13 07:57:33', '2017-09-13 07:57:33'),
(10, '-', 'nav@gmail.com', 'N', '2017-09-13 09:45:40', '2017-09-13 09:45:40'),
(11, '-', 'ry@gmail.com', 'N', '2017-09-20 02:47:44', '2017-09-20 02:47:44'),
(12, 'ker', 'ketut@gmail.com', 'Y', '2017-09-26 09:11:53', '2017-09-26 09:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `tagcompanyservices`
--

CREATE TABLE `tagcompanyservices` (
  `codecompanyservices` int(10) UNSIGNED NOT NULL,
  `codetagservices` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tagcompanyservices`
--

INSERT INTO `tagcompanyservices` (`codecompanyservices`, `codetagservices`, `created_at`, `updated_at`) VALUES
(20, 2, '2017-10-03 07:16:47', '2017-10-03 07:16:47'),
(21, 2, '2017-10-03 07:18:13', '2017-10-03 07:18:13'),
(22, 5, '2017-10-03 07:19:17', '2017-10-03 07:19:17'),
(23, 5, '2017-10-03 07:40:45', '2017-10-03 07:40:45'),
(24, 5, '2017-10-03 07:59:53', '2017-10-03 07:59:53'),
(25, 5, '2017-10-03 08:02:37', '2017-10-03 08:02:37'),
(26, 5, '2017-10-03 08:03:30', '2017-10-03 08:03:30'),
(26, 7, '2017-10-03 08:03:30', '2017-10-03 08:03:30'),
(27, 5, '2017-10-03 08:20:23', '2017-10-03 08:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `tagservices`
--

CREATE TABLE `tagservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codetagservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeservices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choosetagservices` enum('PARTNERSHIP','COMPANY SERVICES') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PARTNERSHIP',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagservices`
--

INSERT INTO `tagservices` (`id`, `name`, `codetagservices`, `codeservices`, `choosetagservices`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hot Service', 'CTS001', '2', 'COMPANY SERVICES', 'Hot Service', 'Y', '2017-08-22 19:47:57', '2017-09-13 05:42:30'),
(3, 'Top Basecamp', 'CTS002', '2', 'PARTNERSHIP', 'Top Basecamp', 'Y', '2017-08-22 19:48:08', '2017-09-12 22:21:42'),
(5, 'Special', 'CTS003', '2', 'COMPANY SERVICES', 'Special', 'Y', '2017-09-12 22:25:28', '2017-09-13 06:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `job`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nava Gia Ginasta', '43327.jpg', 'Web Developers', 'Developers Cubic Workspace', 'Y', '2017-09-26 01:55:00', '2017-09-26 02:01:00'),
(2, 'Ketut Adi Wijanarko', '40881.jpg', 'Analyst', 'Desain Analyst', 'Y', '2017-09-26 02:00:38', '2017-09-26 02:00:38'),
(3, 'Krishna YF', '77240.jpg', 'Bussiness', 'Bussiness', 'Y', '2017-09-26 02:01:33', '2017-09-26 02:01:33'),
(4, 'M.Nurkamal', '20891.jpg', 'Java Developers', 'Programmer', 'Y', '2017-09-26 02:02:51', '2017-09-26 02:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nava Gia Ginasta', '\"Fast response, friendly, and I am really happy with the service of Workspace. I\'ve tried to find an office by myself and it didn\'t work.\"', '27467.jpg', 'Y', '2017-08-28 05:31:55', '2017-09-13 07:04:20'),
(2, 'Ketut Adi Wijanarko', '\"Excellent service. Workspace has deep understanding in office market and a structured way in organizing the information that make it easy for customers to quickly assess options.\".', '58499.jpg', 'Y', '2017-09-13 07:05:27', '2017-09-13 07:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('USER','ADMIN PARTNERSHIP','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `registerdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `codeuser`, `email`, `password`, `remember_token`, `status`, `lastlogin`, `registerdate`, `created_at`, `updated_at`) VALUES
(3, 'Nava Gia Ginasta', 'USR001', 'nava@gmail.com', '$2y$10$wnEhcBgMsVXUz8hyw/uZ3Ot6Br2ggdo6hGCzFmARKAJqkjeA3us02', '9FRzUICmywMIZ6qzVBWfCRHfGNwBOM0rPDp6I4hXDYUuWIUEmSxL1rx65GGo', 'ADMIN', '2017-10-13 08:19:20', '0000-00-00 00:00:00', '2017-08-19 05:52:17', '2017-08-19 05:52:17'),
(10, 'admin@cubic.co.id', 'USR002', 'admin@cubic.co.id', '$2y$10$p5BM.1OpC08eews3rBFJEuuS46ifZ/2Ez1q7Ofkko3H/XNEb5el/2', 'LwlflPD1uq86fXbMo0hLo5xT0Qdb6In01v6bPpEuKT14B4YOi06EnG67c3p5', 'ADMIN', '2017-09-01 08:06:49', '2017-09-01 08:06:49', '2017-08-23 01:20:18', '2017-09-01 08:06:49'),
(13, 'user', 'USR004', 'user@gmail.com', '$2y$10$6eo7DNUnVkVvAm5rUAcweOnkHiL9qSVcFL2jFn4m22FheL6AitaCe', 'GWkIMUtLS10rFBKAn1EZ1HowVlohVv4avA9l9kxkH6QzSGkF7dzdkJgG68Jn', 'USER', '2017-10-04 04:52:02', '2017-09-01 09:14:09', '2017-09-01 09:14:09', '2017-09-01 09:14:09'),
(14, 'Nava Gia', 'USR005', 'nava2@gmail.com', '$2y$10$Ek.5jo6WrLaOkqs/iuuL7OuiIvVOj5m6W0Sf.pePtUt9b65eujvpW', NULL, 'USER', '2017-09-12 06:43:03', '2017-09-12 06:43:03', '2017-09-12 06:43:03', '2017-09-12 06:43:03'),
(25, 'Nava Gia', '', 'navagiaginasta222@gmail.com', '$2y$10$FIwI9eEs6KLDZjznv0DEpepySp5XreSN5qcEN9bjmEXarHQUXIWjK', 'h8Mih29GIpSXujHWOVGdElRbgrm0zeYE7Z36VKEZCqWIjqiGFYimqqQrT6qq', 'USER', '2017-09-20 09:04:34', '2017-09-20 01:36:54', '2017-09-20 01:36:54', '2017-09-20 01:36:54'),
(31, 'a', 'USR006', 'a@gmail.com', '$2y$10$t9lY6QdTG6Cn738YlHD5a.2QPf.6XNmCyDBqvEsSEUo2jmCwB2.CO', NULL, 'USER', '2017-09-24 05:44:23', '2017-09-24 05:44:23', '2017-09-24 05:44:23', '2017-09-24 05:44:23'),
(32, 'Krishna YF', 'USR007', 'nantayp@gmail.com', '$2y$10$EZSG9HQ2mNI5HwboTsaVyO0Ggqc3QwR.UogzMa.f8xRHLraleEKJm', 'onb1KtexBBMSz4RWO60ZOtDRuOJWHiuodCrOSgV1refGG0d6o9OazO5F0qyC', 'USER', '2017-10-13 07:43:03', '2017-10-03 21:53:34', '2017-10-03 21:53:34', '2017-10-03 21:53:34'),
(33, 'Ketut Adi Wijanarko', 'USR008', 'ketut95@gmail.com', '$2y$10$DT9ZwUayejyOIaX.ijFIHu1NqJGs2j8.SWIAJDCDdGKtByn4CrZYS', NULL, 'USER', '2017-10-04 22:20:00', '2017-10-04 22:20:00', '2017-10-04 22:20:01', '2017-10-04 22:20:01'),
(34, 'Nava Gia Ginasta', '', 'nava.webdevelopers@gmail.com', '', 'GrHLvQCMXShRfq76d9yFRafzLor63SxqXT4lKjJlm0GTilJXwrRRSbaUTlaH', 'USER', '2017-10-13 08:31:54', '0000-00-00 00:00:00', '2017-10-05 00:04:44', '2017-10-05 00:04:44'),
(35, 'DEmpat SatuD', '', 'd4.ti.1d.polpos@gmail.com', '', NULL, 'USER', '2017-10-05 07:20:47', '0000-00-00 00:00:00', '2017-10-05 00:20:47', '2017-10-05 00:20:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codeuser` (`codeuser`),
  ADD KEY `codeuser_2` (`codeuser`);

--
-- Indexes for table `adminspartnerships`
--
ALTER TABLE `adminspartnerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billingcompanyservices`
--
ALTER TABLE `billingcompanyservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingspaces`
--
ALTER TABLE `bookingspaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingtours`
--
ALTER TABLE `bookingtours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryadmins`
--
ALTER TABLE `categoryadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryevents`
--
ALTER TABLE `categoryevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorymedia`
--
ALTER TABLE `categorymedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorypaymentmethodes`
--
ALTER TABLE `categorypaymentmethodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryservices`
--
ALTER TABLE `categoryservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companypartnerships`
--
ALTER TABLE `companypartnerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyservices`
--
ALTER TABLE `companyservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrys`
--
ALTER TABLE `countrys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historybillingcompanyservices`
--
ALTER TABLE `historybillingcompanyservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historybookingspaces`
--
ALTER TABLE `historybookingspaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasicompanies`
--
ALTER TABLE `informasicompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediacompanyservices`
--
ALTER TABLE `mediacompanyservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethodes`
--
ALTER TABLE `paymentmethodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosialmedias`
--
ALTER TABLE `sosialmedias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagcompanyservices`
--
ALTER TABLE `tagcompanyservices`
  ADD PRIMARY KEY (`codecompanyservices`,`codetagservices`),
  ADD KEY `tagcompanyservices_codecompanyservices_index` (`codecompanyservices`),
  ADD KEY `tagcompanyservices_codetagservices_index` (`codetagservices`);

--
-- Indexes for table `tagservices`
--
ALTER TABLE `tagservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name` (`name`(191)),
  ADD KEY `codeuser` (`codeuser`(191)),
  ADD KEY `id_2` (`id`),
  ADD KEY `name_2` (`name`(191)),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `adminspartnerships`
--
ALTER TABLE `adminspartnerships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `billingcompanyservices`
--
ALTER TABLE `billingcompanyservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bookingspaces`
--
ALTER TABLE `bookingspaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookingtours`
--
ALTER TABLE `bookingtours`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `categoryadmins`
--
ALTER TABLE `categoryadmins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoryevents`
--
ALTER TABLE `categoryevents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categorymedia`
--
ALTER TABLE `categorymedia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categorypaymentmethodes`
--
ALTER TABLE `categorypaymentmethodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categoryservices`
--
ALTER TABLE `categoryservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companypartnerships`
--
ALTER TABLE `companypartnerships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `companyservices`
--
ALTER TABLE `companyservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `countrys`
--
ALTER TABLE `countrys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `historybillingcompanyservices`
--
ALTER TABLE `historybillingcompanyservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historybookingspaces`
--
ALTER TABLE `historybookingspaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `informasicompanies`
--
ALTER TABLE `informasicompanies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mediacompanyservices`
--
ALTER TABLE `mediacompanyservices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentmethodes`
--
ALTER TABLE `paymentmethodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sosialmedias`
--
ALTER TABLE `sosialmedias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tagservices`
--
ALTER TABLE `tagservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
