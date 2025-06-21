-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2025 at 03:51 PM
-- Server version: 8.0.42-0ubuntu0.20.04.1
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
-- Database: `galleria`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_history`
--

CREATE TABLE `activity_history` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `done_by` int DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  `activity` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `notification_status` tinyint(1) NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_history`
--

INSERT INTO `activity_history` (`id`, `user_id`, `ip`, `done_by`, `date`, `activity`, `notification_status`, `data`) VALUES
(1, 17, '::1', NULL, '2025-06-18 09:55:34', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:43:\"dddddddddxxdddcdcsddvvsdsdsddcdcddzxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:72:\"0xesddfsgsxdxsgddcccdsvchdvxdddssddxccdddsfdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 09:55:34\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"0\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:1:\"2\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:1:\"2\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"30400\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:43:\"dddddddddxxdddcdcsddvvsdsdsddcdcddzxcscdxdd\";s:10:\"secure_pin\";i:12426551;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:17;}'),
(2, 18, '::1', NULL, '2025-06-18 09:57:08', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:44:\"dddddddddxxdddcdcsddvvsdsdsddcdcddzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:73:\"0xesddfsgsxdxsgddcccdsvchdvxdddssdddxccdddsfdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 09:57:08\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"1\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:1:\"4\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:1:\"4\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"97563\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:44:\"dddddddddxxdddcdcsddvvsdsdsddcdcddzdxcscdxdd\";s:10:\"secure_pin\";i:21621061;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:18;}'),
(3, 17, '::1', 17, '2025-06-18 10:52:03', 'Successfull login', 0, ''),
(4, 16, '127.0.0.1', 16, '2025-06-18 10:52:36', 'Successfull login', 0, ''),
(5, 19, '::1', NULL, '2025-06-18 10:53:30', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:46:\"dddddddddxxdddcdcsddvvsdsdsddcdcddfdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:74:\"0xesddfsgsxdxsgddcccdsvchdvxdddssdddxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 10:53:30\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"2\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:1:\"6\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:1:\"6\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"30937\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:46:\"dddddddddxxdddcdcsddvvsdsdsddcdcddfdzdxcscdxdd\";s:10:\"secure_pin\";i:74920610;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:19;}'),
(6, 20, '::1', NULL, '2025-06-18 10:53:32', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:47:\"dddddddddxxdddcdcsddvvsdsdsfddcdcddfdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:75:\"0xesddfsgsxdxsgddcccdsvchdvxdddfssdddxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 10:53:32\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"3\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:1:\"8\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:1:\"8\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"06839\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:47:\"dddddddddxxdddcdcsddvvsdsdsfddcdcddfdzdxcscdxdd\";s:10:\"secure_pin\";i:35456884;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:20;}'),
(7, 21, '::1', NULL, '2025-06-18 10:53:34', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:48:\"dddddddddxxdddcdcsddvvsdsdsfdfdcdcddfdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:76:\"0xesddfsgsxdxsgddcccdsvchdvxdddffssdddxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 10:53:34\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"4\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"10\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"10\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"06208\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:48:\"dddddddddxxdddcdcsddvvsdsdsfdfdcdcddfdzdxcscdxdd\";s:10:\"secure_pin\";i:66339090;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:21;}'),
(8, 22, '::1', NULL, '2025-06-18 10:53:36', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:49:\"dddddddddxxdddcdcsddvvsdsdsfdfdcdcddffdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:77:\"0xesddfsgsxdxsgddcccdsvchdvxdddffssdddfxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 10:53:36\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"5\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"12\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"12\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"28204\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:49:\"dddddddddxxdddcdcsddvvsdsdsfdfdcdcddffdzdxcscdxdd\";s:10:\"secure_pin\";i:60441323;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:22;}'),
(9, 22, '::1', 22, '2025-06-18 10:56:49', 'Successfull login', 0, ''),
(10, 23, '::1', NULL, '2025-06-18 11:01:09', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:50:\"dddddddddxxdddcdcsddvvsdsfdsfdfdcdcddffdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:78:\"0xesddfsgsxdxsgddcccdsvchdvxdddfffssdddfxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:09\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"6\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"14\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"14\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"26684\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:50:\"dddddddddxxdddcdcsddvvsdsfdsfdfdcdcddffdzdxcscdxdd\";s:10:\"secure_pin\";i:71962083;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:23;}'),
(11, 24, '::1', NULL, '2025-06-18 11:01:11', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:51:\"dddddddddxxdddcdcsddvvsdsffdsfdfdcdcddffdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:79:\"0xesddfsgsxdxsgddcccdsvchdfvxdddfffssdddfxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:11\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"7\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"16\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"16\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"98713\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:51:\"dddddddddxxdddcdcsddvvsdsffdsfdfdcdcddffdzdxcscdxdd\";s:10:\"secure_pin\";i:93144814;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:24;}'),
(12, 25, '::1', NULL, '2025-06-18 11:01:13', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:52:\"dddddddddxxdddcdcsddvvsdsffdsfdfdcdcfddffdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:80:\"0xesddfsgsxdxsgddcccdsvchdfvxdddfffsfsdddfxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:13\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"8\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"18\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"18\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"20432\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:52:\"dddddddddxxdddcdcsddvvsdsffdsfdfdcdcfddffdzdxcscdxdd\";s:10:\"secure_pin\";i:39860824;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:25;}'),
(13, 26, '::1', NULL, '2025-06-18 11:01:15', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:53:\"dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddffdzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:81:\"0xesddfsgsxdxsgddcccdsvchdfvxdddffffsfsdddfxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:15\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:1:\"9\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"20\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"20\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"28105\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:53:\"dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddffdzdxcscdxdd\";s:10:\"secure_pin\";i:38744352;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:26;}'),
(14, 27, '::1', NULL, '2025-06-18 11:01:17', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:54:\"dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddffdfzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:82:\"0xesddfsgsxdxsgddcccdsvchdfvxdddffffsfsdddffxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:17\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"10\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"22\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"22\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"61874\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:54:\"dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddffdfzdxcscdxdd\";s:10:\"secure_pin\";i:58198029;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:27;}'),
(15, 28, '::1', NULL, '2025-06-18 11:01:19', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:55:\"dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddfffdfzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:83:\"0xesddfsgsxdxsgddcccdsvchdfvxdddffffsfsdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:19\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"11\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"24\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"24\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"86765\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:55:\"dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddfffdfzdxcscdxdd\";s:10:\"secure_pin\";i:33378420;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:28;}'),
(16, 28, '::1', 28, '2025-06-18 11:01:35', 'Successfull login', 0, ''),
(17, 29, '::1', NULL, '2025-06-18 11:01:48', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:56:\"dddddddddxxddsdcdcsddvvsdsffdsffdfdcdcfddfffdfzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:84:\"0xesddfsgsxdxsgsddcccdsvchdfvxdddffffsfsdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:48\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"12\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"26\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"26\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"39377\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:56:\"dddddddddxxddsdcdcsddvvsdsffdsffdfdcdcfddfffdfzdxcscdxdd\";s:10:\"secure_pin\";i:10165908;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:29;}'),
(18, 30, '::1', NULL, '2025-06-18 11:01:50', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:57:\"dddddddddxxddsdcdcsddvvsdsffdsffdfdcsdcfddfffdfzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:85:\"0xesddfsgsxdxsgsddcccdsvchdfvxdddffffssfsdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:50\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"13\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"28\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"28\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"22056\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:57:\"dddddddddxxddsdcdcsddvvsdsffdsffdfdcsdcfddfffdfzdxcscdxdd\";s:10:\"secure_pin\";i:93162777;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:30;}'),
(19, 31, '::1', NULL, '2025-06-18 11:01:52', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:58:\"dddddddddxxddsdcdcsddvvsdsffdsffdfdcsdcsfddfffdfzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:86:\"0xesddfsgsxdxsgsddcccdsvchdfvxdddffffssfssdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:52\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"14\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"30\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"30\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"00141\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:58:\"dddddddddxxddsdcdcsddvvsdsffdsffdfdcsdcsfddfffdfzdxcscdxdd\";s:10:\"secure_pin\";i:83484596;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:31;}'),
(20, 32, '::1', NULL, '2025-06-18 11:01:58', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:29:\"dddddddddxxddsdffdfzdxcscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:38:\"0xesddfsgsxdxsshdddecfdddkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:01:58\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"15\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"32\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"32\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"24984\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:29:\"dddddddddxxddsdffdfzdxcscdxdd\";s:10:\"secure_pin\";i:15009119;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:32;}'),
(21, 33, '::1', NULL, '2025-06-18 11:02:00', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:30:\"dddddddddxxddsdffdfzdxcfscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:39:\"0xesddfsgsxdxsshdddecfddfdkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:00\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"16\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"34\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"34\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"03131\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:30:\"dddddddddxxddsdffdfzdxcfscdxdd\";s:10:\"secure_pin\";i:25556523;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:33;}'),
(22, 34, '::1', NULL, '2025-06-18 11:02:02', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:31:\"dddddddddxxddsdffdfzdxcffscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:40:\"0xesddfsgsxdxsshdddecfddffdkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:02\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"17\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"36\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"36\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"83110\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:31:\"dddddddddxxddsdffdfzdxcffscdxdd\";s:10:\"secure_pin\";i:32272226;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:34;}'),
(23, 35, '::1', NULL, '2025-06-18 11:02:04', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:32:\"dddddddddxxddsdffdfzdxcfffscdxdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:41:\"0xesddfsgsxdxsshdddecfddffdfkdsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:04\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"18\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"38\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"38\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"46528\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:32:\"dddddddddxxddsdffdfzdxcfffscdxdd\";s:10:\"secure_pin\";i:98918435;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:35;}'),
(24, 36, '::1', NULL, '2025-06-18 11:02:06', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:33:\"dddddddddxxddsdffdfzdxcfffscdxfdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:42:\"0xesddfsgsxdxsshdddecfddffdfkdfsdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:06\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"19\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"40\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"40\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"31936\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:33:\"dddddddddxxddsdffdfzdxcfffscdxfdd\";s:10:\"secure_pin\";i:37066998;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:36;}'),
(25, 37, '::1', NULL, '2025-06-18 11:02:08', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:34:\"dddddddddxxddsdffdfzdxcfffscdxffdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:43:\"0xesddfsgsxdxsshdddecfddffdfkdfsfdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:08\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"20\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"42\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"42\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"04836\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:34:\"dddddddddxxddsdffdfzdxcfffscdxffdd\";s:10:\"secure_pin\";i:67540815;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:37;}'),
(26, 38, '::1', NULL, '2025-06-18 11:02:10', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:35:\"dddddddddxxddsdfffdfzdxcfffscdxffdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:44:\"0xesddfsgsxdxsshddfdecfddffdfkdfsfdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:10\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"21\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"44\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"44\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"99894\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:35:\"dddddddddxxddsdfffdfzdxcfffscdxffdd\";s:10:\"secure_pin\";i:39548929;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:38;}'),
(27, 39, '::1', NULL, '2025-06-18 11:02:12', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:36:\"dddddddddxxddfsdfffdfzdxcfffscdxffdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:45:\"0xesddfsgsxdxssfhddfdecfddffdfkdfsfdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:12\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"22\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"46\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"46\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"47592\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:36:\"dddddddddxxddfsdfffdfzdxcfffscdxffdd\";s:10:\"secure_pin\";i:55441041;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:39;}'),
(28, 40, '::1', NULL, '2025-06-18 11:02:14', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:37:\"ddddddddfdxxddfsdfffdfzdxcfffscdxffdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:46:\"0xesddfsgfsxdxssfhddfdecfddffdfkdfsfdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:14\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"23\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"48\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"48\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"43058\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:37:\"ddddddddfdxxddfsdfffdfzdxcfffscdxffdd\";s:10:\"secure_pin\";i:42631069;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:40;}'),
(29, 41, '::1', NULL, '2025-06-18 11:02:16', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:38:\"ddddfddddfdxxddfsdfffdfzdxcfffscdxffdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:47:\"0xesdfdfsgfsxdxssfhddfdecfddffdfkdfsfdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 11:02:16\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"24\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"50\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"50\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:5:\"00452\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:38:\"ddddfddddfdxxddfsdfffdfzdxcfffscdxffdd\";s:10:\"secure_pin\";i:25478192;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:41;}'),
(30, 41, '::1', 41, '2025-06-18 11:03:03', 'Successfull login', 0, ''),
(31, 42, '::1', NULL, '2025-06-18 14:37:34', 'user_registered', 0, 'a:20:{s:14:\"wallet_address\";s:39:\"ddddfdddddfdxxddfsdfffdfzdxcfffscdxffdd\";s:12:\"sponsor_name\";s:5:\"admin\";s:14:\"transaction_id\";s:48:\"0xesdfdfsgfsxdxssfhddfdecdfddffdfkdfsfdshccdds17\";s:8:\"register\";s:9:\"free_join\";s:12:\"joining_date\";s:19:\"2025-06-18 14:37:34\";s:12:\"sponsor_info\";a:10:{s:9:\"user_name\";s:5:\"admin\";s:7:\"user_id\";s:2:\"16\";s:14:\"referral_count\";s:2:\"25\";s:7:\"rank_id\";s:1:\"0\";s:13:\"right_sponsor\";s:2:\"52\";s:12:\"left_sponsor\";s:1:\"1\";s:12:\"right_father\";s:2:\"52\";s:11:\"left_father\";s:1:\"1\";s:13:\"sponsor_level\";s:1:\"0\";s:9:\"full_name\";s:7:\"sur Neo\";}s:10:\"sponsor_id\";s:2:\"16\";s:7:\"package\";i:1;s:14:\"package_amount\";s:7:\"0.00001\";s:12:\"total_amount\";s:7:\"0.00001\";s:12:\"payment_type\";s:9:\"free_join\";s:17:\"registration_type\";s:9:\"free_join\";s:8:\"username\";s:7:\"BC25888\";s:12:\"placement_id\";s:2:\"16\";s:8:\"position\";i:1;s:8:\"password\";s:39:\"ddddfdddddfdxxddfsdfffdfzdxcfffscdxffdd\";s:10:\"secure_pin\";i:32195281;s:10:\"user_level\";i:1;s:13:\"sponsor_level\";i:1;s:7:\"user_id\";i:42;}');

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallet_details`
--

CREATE TABLE `admin_wallet_details` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `mnemonic` text NOT NULL,
  `address` text NOT NULL,
  `private_key` text NOT NULL,
  `public_key` text NOT NULL,
  `enc` int NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_wallet_details`
--

INSERT INTO `admin_wallet_details` (`id`, `user_id`, `mnemonic`, `address`, `private_key`, `public_key`, `enc`, `added_date`) VALUES
(1, 16, 'VmtlYW4yYjdFWkVtVnhpTGdKaURmZWYxYUgxV2FnWkRMTkd2dDNXdld3dFM4cW1NTWRjZk9aSGFqRWVNVVZBV2VOTmFKTXVZYUp3Snp5ZW9iWlRjL2tJZldURHhVL3hUeE5FNHQ0a21UNW5jT1BRQ3RrRllXT1dFNjlpUU1ZZ0kvQjlid3Z4ZFFibFlyYUdMNTl5RDlCZlBiS282TDZkSVVTNWZXNHFTNXJBZ1RidGdoWUxRV3pMcmNXUE5TbCtHOUZDQ0FSZCt4VlNWVDlpUUtFVDVIQT09', 'RkpTVzlWRzRNdUl6TnZMUTBBUlBoWEYzdVlrdjNnRnJ2U3FBYThvSHdiUkZickZCV004ZWpqQTJzNnMwUjFBQQ==', 'WnhjRmVnMVB2VzFrdFJvbEcrYXl4SWFGS3ZaOWhZMktqeHpGT3k4OVpYcGtGc2xhbXBNVjVUcnM5YkZMeWhDYzNLSDBFNkF5MEFBSUIvRjlMd1B6Mk52dDhBVDA3a1h4bVN0SE92Q05PZDQ9', 'RnFJa2h2Sk5BSHZ0Y0E2d1VjZVBPNWZ3dXJJUFVEM3NYNFppZHAzV0lpd1IwcEdLL3VpUGJMbnlsU3BtbTdZZ0sweFdoMkxGbW9aamRxdWNIbWljMDNyYWdmNTZVZzlhK2h0SGphTWt2Nk9kdFdoTUNyRy9tR0tSdXpjTjRGR2ZuandIYTJNa241RERNeHVnSjVnRnBRPT0', 1, '2025-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `amount_type`
--

CREATE TABLE `amount_type` (
  `id` int NOT NULL,
  `db_amt_type` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `show_status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'yes',
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amount_type`
--

INSERT INTO `amount_type` (`id`, `db_amt_type`, `show_status`, `sort_order`) VALUES
(1, 'referral_bonus', 'yes', 1),
(5, 'level_bonus', 'yes', 5),
(13, 'global_bonus', 'yes', 19),
(14, 'global_pending_bonus', 'no', 19),
(15, 'missed_income', 'yes', 19),
(16, 'transaction_fee', 'yes', 19);

-- --------------------------------------------------------

--
-- Table structure for table `commission_details`
--

CREATE TABLE `commission_details` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `from_id` int NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `amount_payable` double NOT NULL DEFAULT '0',
  `amount_type_id` int NOT NULL,
  `date_of_submission` datetime DEFAULT '2017-10-10 00:00:00',
  `service_charge` float NOT NULL DEFAULT '0',
  `fund_transfer_type` varchar(20) NOT NULL DEFAULT 'credit',
  `transaction_note` varchar(200) NOT NULL DEFAULT 'NA',
  `payout_ref_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cron_history`
--

CREATE TABLE `cron_history` (
  `id` int NOT NULL,
  `cron` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crypto_history`
--

CREATE TABLE `crypto_history` (
  `id` int NOT NULL,
  `transaction_id` longtext NOT NULL,
  `user_id` int NOT NULL,
  `from` varchar(100) DEFAULT NULL,
  `to` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `value` varchar(250) NOT NULL,
  `date_added` datetime NOT NULL,
  `transfer_status` varchar(20) NOT NULL DEFAULT 'pending' COMMENT 'pending,success,failed',
  `transactions_data` text NOT NULL,
  `updated_date` datetime NOT NULL,
  `type_amt` longtext NOT NULL,
  `bonus_type` longtext NOT NULL,
  `insert_id` int NOT NULL,
  `missed_ids` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int NOT NULL,
  `title` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `symbol_left` varchar(12) NOT NULL,
  `symbol_right` varchar(12) NOT NULL,
  `value` float(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_status` varchar(6) NOT NULL DEFAULT 'no',
  `date_modified` datetime NOT NULL,
  `decimal_place` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `status`, `delete_status`, `date_modified`, `decimal_place`) VALUES
(2, 'WBTC', 'WBTC', '₿ ', '', 1.00000000, 1, 'no', '2017-09-22 10:30:53', 10),
(3, 'Indian Rupee', 'INR', '₹ ', '', 82.47000122, 1, 'no', '2019-07-31 22:04:14', 10);

-- --------------------------------------------------------

--
-- Table structure for table `global_bonus`
--

CREATE TABLE `global_bonus` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `from_id` int NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `amount_payable` double NOT NULL DEFAULT '0',
  `date_of_submission` datetime DEFAULT '2017-10-10 00:00:00',
  `service_charge` double NOT NULL DEFAULT '0',
  `fund_transfer_type` varchar(20) NOT NULL DEFAULT 'credit',
  `transaction_note` varchar(200) NOT NULL DEFAULT 'NA',
  `payout_ref_id` int NOT NULL DEFAULT '0' COMMENT 'packageid',
  `status` longtext NOT NULL,
  `release_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_bonus`
--

INSERT INTO `global_bonus` (`id`, `user_id`, `from_id`, `total_amount`, `amount_payable`, `date_of_submission`, `service_charge`, `fund_transfer_type`, `transaction_note`, `payout_ref_id`, `status`, `release_status`) VALUES
(1, 18, 17, 0.0000002, 0.00000018, '2025-06-18 09:57:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(2, 18, 17, 0.0000004, 0.00000036, '2025-06-18 09:57:08', 0.00000004, 'credit', 'NA', 2, 'Released', 'pending'),
(3, 18, 17, 0.0000008, 0.00000072, '2025-06-18 09:57:08', 0.00000008, 'credit', 'NA', 3, 'Released', 'pending'),
(4, 18, 17, 0.0000016, 0.00000144, '2025-06-18 09:57:08', 0.00000016, 'credit', 'NA', 4, 'Released', 'pending'),
(5, 18, 17, 0.0000032, 0.00000288, '2025-06-18 09:57:08', 0.00000032, 'credit', 'NA', 5, 'Released', 'pending'),
(6, 18, 17, 0.000064, 0.0000576, '2025-06-18 09:57:08', 0.0000064, 'credit', 'NA', 6, 'Released', 'pending'),
(7, 18, 17, 0.000128, 0.0001152, '2025-06-18 09:57:08', 0.0000128, 'credit', 'NA', 7, 'Released', 'pending'),
(8, 18, 17, 0.000256, 0.0002304, '2025-06-18 09:57:08', 0.0000256, 'credit', 'NA', 8, 'Released', 'pending'),
(9, 18, 17, 0.000512, 0.0004608, '2025-06-18 09:57:08', 0.0000512, 'credit', 'NA', 9, 'Released', 'pending'),
(10, 18, 17, 0.001024, 0.0009216, '2025-06-18 09:57:08', 0.0001024, 'credit', 'NA', 10, 'Released', 'pending'),
(11, 18, 17, 0.002048, 0.0018432, '2025-06-18 09:57:08', 0.0002048, 'credit', 'NA', 11, 'Released', 'pending'),
(12, 18, 17, 0.004096, 0.0036864, '2025-06-18 09:57:08', 0.0004096, 'credit', 'NA', 12, 'Released', 'pending'),
(13, 19, 18, 0.0000002, 0.00000018, '2025-06-18 10:53:30', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(14, 19, 18, 0.0000004, 0.00000036, '2025-06-18 10:53:30', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(15, 19, 18, 0.0000008, 0.00000072, '2025-06-18 10:53:30', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(16, 19, 18, 0.0000016, 0.00000144, '2025-06-18 10:53:30', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(17, 19, 18, 0.0000032, 0.00000288, '2025-06-18 10:53:30', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(18, 19, 18, 0.000064, 0.0000576, '2025-06-18 10:53:30', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(19, 19, 18, 0.000128, 0.0001152, '2025-06-18 10:53:30', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(20, 19, 18, 0.000256, 0.0002304, '2025-06-18 10:53:30', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(21, 19, 18, 0.000512, 0.0004608, '2025-06-18 10:53:30', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(22, 19, 18, 0.001024, 0.0009216, '2025-06-18 10:53:30', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(23, 19, 18, 0.002048, 0.0018432, '2025-06-18 10:53:30', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(24, 19, 18, 0.004096, 0.0036864, '2025-06-18 10:53:30', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(25, 19, 17, 0.0000002, 0.00000018, '2025-06-18 10:53:30', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(26, 19, 17, 0.0000004, 0.00000036, '2025-06-18 10:53:30', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(27, 19, 17, 0.0000008, 0.00000072, '2025-06-18 10:53:30', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(28, 19, 17, 0.0000016, 0.00000144, '2025-06-18 10:53:30', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(29, 19, 17, 0.0000032, 0.00000288, '2025-06-18 10:53:30', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(30, 19, 17, 0.000064, 0.0000576, '2025-06-18 10:53:30', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(31, 19, 17, 0.000128, 0.0001152, '2025-06-18 10:53:30', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(32, 19, 17, 0.000256, 0.0002304, '2025-06-18 10:53:30', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(33, 19, 17, 0.000512, 0.0004608, '2025-06-18 10:53:30', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(34, 19, 17, 0.001024, 0.0009216, '2025-06-18 10:53:30', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(35, 19, 17, 0.002048, 0.0018432, '2025-06-18 10:53:30', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(36, 19, 17, 0.004096, 0.0036864, '2025-06-18 10:53:30', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(37, 20, 19, 0.0000002, 0.00000018, '2025-06-18 10:53:32', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(38, 20, 18, 0.0000002, 0.00000018, '2025-06-18 10:53:32', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(39, 20, 18, 0.0000004, 0.00000036, '2025-06-18 10:53:32', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(40, 20, 18, 0.0000008, 0.00000072, '2025-06-18 10:53:32', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(41, 20, 18, 0.0000016, 0.00000144, '2025-06-18 10:53:32', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(42, 20, 18, 0.0000032, 0.00000288, '2025-06-18 10:53:32', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(43, 20, 18, 0.000064, 0.0000576, '2025-06-18 10:53:32', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(44, 20, 18, 0.000128, 0.0001152, '2025-06-18 10:53:32', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(45, 20, 18, 0.000256, 0.0002304, '2025-06-18 10:53:32', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(46, 20, 18, 0.000512, 0.0004608, '2025-06-18 10:53:32', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(47, 20, 18, 0.001024, 0.0009216, '2025-06-18 10:53:32', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(48, 20, 18, 0.002048, 0.0018432, '2025-06-18 10:53:32', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(49, 20, 18, 0.004096, 0.0036864, '2025-06-18 10:53:32', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(50, 20, 17, 0.0000002, 0.00000018, '2025-06-18 10:53:32', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(51, 20, 17, 0.0000004, 0.00000036, '2025-06-18 10:53:32', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(52, 20, 17, 0.0000008, 0.00000072, '2025-06-18 10:53:32', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(53, 20, 17, 0.0000016, 0.00000144, '2025-06-18 10:53:32', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(54, 20, 17, 0.0000032, 0.00000288, '2025-06-18 10:53:32', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(55, 20, 17, 0.000064, 0.0000576, '2025-06-18 10:53:32', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(56, 20, 17, 0.000128, 0.0001152, '2025-06-18 10:53:32', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(57, 20, 17, 0.000256, 0.0002304, '2025-06-18 10:53:32', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(58, 20, 17, 0.000512, 0.0004608, '2025-06-18 10:53:32', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(59, 20, 17, 0.001024, 0.0009216, '2025-06-18 10:53:32', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(60, 20, 17, 0.002048, 0.0018432, '2025-06-18 10:53:32', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(61, 20, 17, 0.004096, 0.0036864, '2025-06-18 10:53:32', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(62, 21, 20, 0.0000002, 0.00000018, '2025-06-18 10:53:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(63, 21, 19, 0.0000002, 0.00000018, '2025-06-18 10:53:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(64, 21, 18, 0.0000002, 0.00000018, '2025-06-18 10:53:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(65, 21, 18, 0.0000004, 0.00000036, '2025-06-18 10:53:34', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(66, 21, 18, 0.0000008, 0.00000072, '2025-06-18 10:53:34', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(67, 21, 18, 0.0000016, 0.00000144, '2025-06-18 10:53:34', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(68, 21, 18, 0.0000032, 0.00000288, '2025-06-18 10:53:34', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(69, 21, 18, 0.000064, 0.0000576, '2025-06-18 10:53:34', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(70, 21, 18, 0.000128, 0.0001152, '2025-06-18 10:53:34', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(71, 21, 18, 0.000256, 0.0002304, '2025-06-18 10:53:34', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(72, 21, 18, 0.000512, 0.0004608, '2025-06-18 10:53:34', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(73, 21, 18, 0.001024, 0.0009216, '2025-06-18 10:53:34', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(74, 21, 18, 0.002048, 0.0018432, '2025-06-18 10:53:34', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(75, 21, 18, 0.004096, 0.0036864, '2025-06-18 10:53:34', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(76, 21, 17, 0.0000002, 0.00000018, '2025-06-18 10:53:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(77, 21, 17, 0.0000004, 0.00000036, '2025-06-18 10:53:34', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(78, 21, 17, 0.0000008, 0.00000072, '2025-06-18 10:53:34', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(79, 21, 17, 0.0000016, 0.00000144, '2025-06-18 10:53:34', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(80, 21, 17, 0.0000032, 0.00000288, '2025-06-18 10:53:34', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(81, 21, 17, 0.000064, 0.0000576, '2025-06-18 10:53:34', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(82, 21, 17, 0.000128, 0.0001152, '2025-06-18 10:53:34', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(83, 21, 17, 0.000256, 0.0002304, '2025-06-18 10:53:34', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(84, 21, 17, 0.000512, 0.0004608, '2025-06-18 10:53:34', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(85, 21, 17, 0.001024, 0.0009216, '2025-06-18 10:53:34', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(86, 21, 17, 0.002048, 0.0018432, '2025-06-18 10:53:34', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(87, 21, 17, 0.004096, 0.0036864, '2025-06-18 10:53:34', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(88, 22, 21, 0.0000002, 0.00000018, '2025-06-18 10:53:36', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(89, 22, 20, 0.0000002, 0.00000018, '2025-06-18 10:53:36', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(90, 22, 19, 0.0000002, 0.00000018, '2025-06-18 10:53:36', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(91, 22, 18, 0.0000002, 0.00000018, '2025-06-18 10:53:36', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(92, 22, 18, 0.0000004, 0.00000036, '2025-06-18 10:53:36', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(93, 22, 18, 0.0000008, 0.00000072, '2025-06-18 10:53:36', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(94, 22, 18, 0.0000016, 0.00000144, '2025-06-18 10:53:36', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(95, 22, 18, 0.0000032, 0.00000288, '2025-06-18 10:53:36', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(96, 22, 18, 0.000064, 0.0000576, '2025-06-18 10:53:36', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(97, 22, 18, 0.000128, 0.0001152, '2025-06-18 10:53:36', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(98, 22, 18, 0.000256, 0.0002304, '2025-06-18 10:53:36', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(99, 22, 18, 0.000512, 0.0004608, '2025-06-18 10:53:36', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(100, 22, 18, 0.001024, 0.0009216, '2025-06-18 10:53:36', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(101, 22, 18, 0.002048, 0.0018432, '2025-06-18 10:53:36', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(102, 22, 18, 0.004096, 0.0036864, '2025-06-18 10:53:36', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(103, 22, 17, 0.0000002, 0.00000018, '2025-06-18 10:53:36', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(104, 22, 17, 0.0000004, 0.00000036, '2025-06-18 10:53:36', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(105, 22, 17, 0.0000008, 0.00000072, '2025-06-18 10:53:36', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(106, 22, 17, 0.0000016, 0.00000144, '2025-06-18 10:53:36', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(107, 22, 17, 0.0000032, 0.00000288, '2025-06-18 10:53:36', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(108, 22, 17, 0.000064, 0.0000576, '2025-06-18 10:53:36', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(109, 22, 17, 0.000128, 0.0001152, '2025-06-18 10:53:36', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(110, 22, 17, 0.000256, 0.0002304, '2025-06-18 10:53:36', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(111, 22, 17, 0.000512, 0.0004608, '2025-06-18 10:53:36', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(112, 22, 17, 0.001024, 0.0009216, '2025-06-18 10:53:36', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(113, 22, 17, 0.002048, 0.0018432, '2025-06-18 10:53:36', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(114, 22, 17, 0.004096, 0.0036864, '2025-06-18 10:53:36', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(115, 23, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:09', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(116, 23, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:09', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(117, 23, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:09', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(118, 23, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:09', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(119, 23, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:09', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(120, 23, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:09', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(121, 23, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:09', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(122, 23, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:09', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(123, 23, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:09', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(124, 23, 18, 0.000064, 0.0000576, '2025-06-18 11:01:09', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(125, 23, 18, 0.000128, 0.0001152, '2025-06-18 11:01:09', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(126, 23, 18, 0.000256, 0.0002304, '2025-06-18 11:01:09', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(127, 23, 18, 0.000512, 0.0004608, '2025-06-18 11:01:09', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(128, 23, 18, 0.001024, 0.0009216, '2025-06-18 11:01:09', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(129, 23, 18, 0.002048, 0.0018432, '2025-06-18 11:01:09', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(130, 23, 18, 0.004096, 0.0036864, '2025-06-18 11:01:09', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(131, 23, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:09', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(132, 23, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:09', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(133, 23, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:09', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(134, 23, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:09', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(135, 23, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:09', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(136, 23, 17, 0.000064, 0.0000576, '2025-06-18 11:01:09', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(137, 23, 17, 0.000128, 0.0001152, '2025-06-18 11:01:09', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(138, 23, 17, 0.000256, 0.0002304, '2025-06-18 11:01:09', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(139, 23, 17, 0.000512, 0.0004608, '2025-06-18 11:01:09', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(140, 23, 17, 0.001024, 0.0009216, '2025-06-18 11:01:09', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(141, 23, 17, 0.002048, 0.0018432, '2025-06-18 11:01:09', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(142, 23, 17, 0.004096, 0.0036864, '2025-06-18 11:01:09', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(143, 24, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(144, 24, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(145, 24, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(146, 24, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(147, 24, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(148, 24, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(149, 24, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:11', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(150, 24, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:11', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(151, 24, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:11', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(152, 24, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:11', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(153, 24, 18, 0.000064, 0.0000576, '2025-06-18 11:01:11', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(154, 24, 18, 0.000128, 0.0001152, '2025-06-18 11:01:11', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(155, 24, 18, 0.000256, 0.0002304, '2025-06-18 11:01:11', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(156, 24, 18, 0.000512, 0.0004608, '2025-06-18 11:01:11', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(157, 24, 18, 0.001024, 0.0009216, '2025-06-18 11:01:11', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(158, 24, 18, 0.002048, 0.0018432, '2025-06-18 11:01:11', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(159, 24, 18, 0.004096, 0.0036864, '2025-06-18 11:01:11', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(160, 24, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:11', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(161, 24, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:11', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(162, 24, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:11', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(163, 24, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:11', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(164, 24, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:11', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(165, 24, 17, 0.000064, 0.0000576, '2025-06-18 11:01:11', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(166, 24, 17, 0.000128, 0.0001152, '2025-06-18 11:01:11', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(167, 24, 17, 0.000256, 0.0002304, '2025-06-18 11:01:11', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(168, 24, 17, 0.000512, 0.0004608, '2025-06-18 11:01:11', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(169, 24, 17, 0.001024, 0.0009216, '2025-06-18 11:01:11', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(170, 24, 17, 0.002048, 0.0018432, '2025-06-18 11:01:11', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(171, 24, 17, 0.004096, 0.0036864, '2025-06-18 11:01:11', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(172, 25, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(173, 25, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(174, 25, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(175, 25, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(176, 25, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(177, 25, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(178, 25, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(179, 25, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:13', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(180, 25, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:13', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(181, 25, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:13', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(182, 25, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:13', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(183, 25, 18, 0.000064, 0.0000576, '2025-06-18 11:01:13', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(184, 25, 18, 0.000128, 0.0001152, '2025-06-18 11:01:13', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(185, 25, 18, 0.000256, 0.0002304, '2025-06-18 11:01:13', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(186, 25, 18, 0.000512, 0.0004608, '2025-06-18 11:01:13', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(187, 25, 18, 0.001024, 0.0009216, '2025-06-18 11:01:13', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(188, 25, 18, 0.002048, 0.0018432, '2025-06-18 11:01:13', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(189, 25, 18, 0.004096, 0.0036864, '2025-06-18 11:01:13', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(190, 25, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:13', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(191, 25, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:13', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(192, 25, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:13', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(193, 25, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:13', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(194, 25, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:13', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(195, 25, 17, 0.000064, 0.0000576, '2025-06-18 11:01:13', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(196, 25, 17, 0.000128, 0.0001152, '2025-06-18 11:01:13', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(197, 25, 17, 0.000256, 0.0002304, '2025-06-18 11:01:13', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(198, 25, 17, 0.000512, 0.0004608, '2025-06-18 11:01:13', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(199, 25, 17, 0.001024, 0.0009216, '2025-06-18 11:01:13', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(200, 25, 17, 0.002048, 0.0018432, '2025-06-18 11:01:13', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(201, 25, 17, 0.004096, 0.0036864, '2025-06-18 11:01:13', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(202, 26, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(203, 26, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(204, 26, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(205, 26, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(206, 26, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(207, 26, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(208, 26, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(209, 26, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(210, 26, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:15', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(211, 26, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:15', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(212, 26, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:15', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(213, 26, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:15', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(214, 26, 18, 0.000064, 0.0000576, '2025-06-18 11:01:15', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(215, 26, 18, 0.000128, 0.0001152, '2025-06-18 11:01:15', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(216, 26, 18, 0.000256, 0.0002304, '2025-06-18 11:01:15', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(217, 26, 18, 0.000512, 0.0004608, '2025-06-18 11:01:15', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(218, 26, 18, 0.001024, 0.0009216, '2025-06-18 11:01:15', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(219, 26, 18, 0.002048, 0.0018432, '2025-06-18 11:01:15', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(220, 26, 18, 0.004096, 0.0036864, '2025-06-18 11:01:15', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(221, 26, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:15', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(222, 26, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:15', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(223, 26, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:15', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(224, 26, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:15', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(225, 26, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:15', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(226, 26, 17, 0.000064, 0.0000576, '2025-06-18 11:01:15', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(227, 26, 17, 0.000128, 0.0001152, '2025-06-18 11:01:15', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(228, 26, 17, 0.000256, 0.0002304, '2025-06-18 11:01:15', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(229, 26, 17, 0.000512, 0.0004608, '2025-06-18 11:01:15', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(230, 26, 17, 0.001024, 0.0009216, '2025-06-18 11:01:15', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(231, 26, 17, 0.002048, 0.0018432, '2025-06-18 11:01:15', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(232, 26, 17, 0.004096, 0.0036864, '2025-06-18 11:01:15', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(233, 27, 26, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(234, 27, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(235, 27, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(236, 27, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(237, 27, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(238, 27, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(239, 27, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(240, 27, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(241, 27, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(242, 27, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:17', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(243, 27, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:17', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(244, 27, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:17', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(245, 27, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:17', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(246, 27, 18, 0.000064, 0.0000576, '2025-06-18 11:01:17', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(247, 27, 18, 0.000128, 0.0001152, '2025-06-18 11:01:17', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(248, 27, 18, 0.000256, 0.0002304, '2025-06-18 11:01:17', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(249, 27, 18, 0.000512, 0.0004608, '2025-06-18 11:01:17', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(250, 27, 18, 0.001024, 0.0009216, '2025-06-18 11:01:17', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(251, 27, 18, 0.002048, 0.0018432, '2025-06-18 11:01:17', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(252, 27, 18, 0.004096, 0.0036864, '2025-06-18 11:01:17', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(253, 27, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:17', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(254, 27, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:17', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(255, 27, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:17', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(256, 27, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:17', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(257, 27, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:17', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(258, 27, 17, 0.000064, 0.0000576, '2025-06-18 11:01:17', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(259, 27, 17, 0.000128, 0.0001152, '2025-06-18 11:01:17', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(260, 27, 17, 0.000256, 0.0002304, '2025-06-18 11:01:17', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(261, 27, 17, 0.000512, 0.0004608, '2025-06-18 11:01:17', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(262, 27, 17, 0.001024, 0.0009216, '2025-06-18 11:01:17', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(263, 27, 17, 0.002048, 0.0018432, '2025-06-18 11:01:17', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(264, 27, 17, 0.004096, 0.0036864, '2025-06-18 11:01:17', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(265, 28, 27, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(266, 28, 26, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(267, 28, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(268, 28, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(269, 28, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(270, 28, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(271, 28, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(272, 28, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(273, 28, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(274, 28, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(275, 28, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:19', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(276, 28, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:19', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(277, 28, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:19', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(278, 28, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:19', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(279, 28, 18, 0.000064, 0.0000576, '2025-06-18 11:01:19', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(280, 28, 18, 0.000128, 0.0001152, '2025-06-18 11:01:19', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(281, 28, 18, 0.000256, 0.0002304, '2025-06-18 11:01:19', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(282, 28, 18, 0.000512, 0.0004608, '2025-06-18 11:01:19', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(283, 28, 18, 0.001024, 0.0009216, '2025-06-18 11:01:19', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(284, 28, 18, 0.002048, 0.0018432, '2025-06-18 11:01:19', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(285, 28, 18, 0.004096, 0.0036864, '2025-06-18 11:01:19', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(286, 28, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:19', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(287, 28, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:19', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(288, 28, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:19', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(289, 28, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:19', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(290, 28, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:19', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(291, 28, 17, 0.000064, 0.0000576, '2025-06-18 11:01:19', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(292, 28, 17, 0.000128, 0.0001152, '2025-06-18 11:01:19', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(293, 28, 17, 0.000256, 0.0002304, '2025-06-18 11:01:19', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(294, 28, 17, 0.000512, 0.0004608, '2025-06-18 11:01:19', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(295, 28, 17, 0.001024, 0.0009216, '2025-06-18 11:01:19', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(296, 28, 17, 0.002048, 0.0018432, '2025-06-18 11:01:19', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(297, 28, 17, 0.004096, 0.0036864, '2025-06-18 11:01:19', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(298, 29, 28, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(299, 29, 27, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(300, 29, 26, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(301, 29, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(302, 29, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(303, 29, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(304, 29, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(305, 29, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(306, 29, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(307, 29, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(308, 29, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(309, 29, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:48', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(310, 29, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:48', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(311, 29, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:48', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(312, 29, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:48', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(313, 29, 18, 0.000064, 0.0000576, '2025-06-18 11:01:48', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(314, 29, 18, 0.000128, 0.0001152, '2025-06-18 11:01:48', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(315, 29, 18, 0.000256, 0.0002304, '2025-06-18 11:01:48', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(316, 29, 18, 0.000512, 0.0004608, '2025-06-18 11:01:48', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(317, 29, 18, 0.001024, 0.0009216, '2025-06-18 11:01:48', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(318, 29, 18, 0.002048, 0.0018432, '2025-06-18 11:01:48', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(319, 29, 18, 0.004096, 0.0036864, '2025-06-18 11:01:48', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(320, 29, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:48', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(321, 29, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:48', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(322, 29, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:48', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(323, 29, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:48', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(324, 29, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:48', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(325, 29, 17, 0.000064, 0.0000576, '2025-06-18 11:01:48', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(326, 29, 17, 0.000128, 0.0001152, '2025-06-18 11:01:48', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(327, 29, 17, 0.000256, 0.0002304, '2025-06-18 11:01:48', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(328, 29, 17, 0.000512, 0.0004608, '2025-06-18 11:01:48', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(329, 29, 17, 0.001024, 0.0009216, '2025-06-18 11:01:48', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(330, 29, 17, 0.002048, 0.0018432, '2025-06-18 11:01:48', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(331, 29, 17, 0.004096, 0.0036864, '2025-06-18 11:01:48', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(332, 30, 29, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(333, 30, 28, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(334, 30, 27, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(335, 30, 26, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(336, 30, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(337, 30, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(338, 30, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(339, 30, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(340, 30, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(341, 30, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(342, 30, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(343, 30, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(344, 30, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:50', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(345, 30, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:50', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(346, 30, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:50', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(347, 30, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:50', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(348, 30, 18, 0.000064, 0.0000576, '2025-06-18 11:01:50', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(349, 30, 18, 0.000128, 0.0001152, '2025-06-18 11:01:50', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(350, 30, 18, 0.000256, 0.0002304, '2025-06-18 11:01:50', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(351, 30, 18, 0.000512, 0.0004608, '2025-06-18 11:01:50', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(352, 30, 18, 0.001024, 0.0009216, '2025-06-18 11:01:50', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(353, 30, 18, 0.002048, 0.0018432, '2025-06-18 11:01:50', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(354, 30, 18, 0.004096, 0.0036864, '2025-06-18 11:01:50', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(355, 30, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:50', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(356, 30, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:50', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(357, 30, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:50', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(358, 30, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:50', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(359, 30, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:50', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(360, 30, 17, 0.000064, 0.0000576, '2025-06-18 11:01:50', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(361, 30, 17, 0.000128, 0.0001152, '2025-06-18 11:01:50', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(362, 30, 17, 0.000256, 0.0002304, '2025-06-18 11:01:50', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(363, 30, 17, 0.000512, 0.0004608, '2025-06-18 11:01:50', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(364, 30, 17, 0.001024, 0.0009216, '2025-06-18 11:01:50', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(365, 30, 17, 0.002048, 0.0018432, '2025-06-18 11:01:50', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(366, 30, 17, 0.004096, 0.0036864, '2025-06-18 11:01:50', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(367, 31, 30, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(368, 31, 29, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(369, 31, 28, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(370, 31, 27, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(371, 31, 26, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(372, 31, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(373, 31, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(374, 31, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(375, 31, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(376, 31, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(377, 31, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(378, 31, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(379, 31, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(380, 31, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:52', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(381, 31, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:52', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(382, 31, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:52', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(383, 31, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:52', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(384, 31, 18, 0.000064, 0.0000576, '2025-06-18 11:01:52', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(385, 31, 18, 0.000128, 0.0001152, '2025-06-18 11:01:52', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(386, 31, 18, 0.000256, 0.0002304, '2025-06-18 11:01:52', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(387, 31, 18, 0.000512, 0.0004608, '2025-06-18 11:01:52', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(388, 31, 18, 0.001024, 0.0009216, '2025-06-18 11:01:52', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(389, 31, 18, 0.002048, 0.0018432, '2025-06-18 11:01:52', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(390, 31, 18, 0.004096, 0.0036864, '2025-06-18 11:01:52', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(391, 31, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:52', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(392, 31, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:52', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(393, 31, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:52', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(394, 31, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:52', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(395, 31, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:52', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(396, 31, 17, 0.000064, 0.0000576, '2025-06-18 11:01:52', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(397, 31, 17, 0.000128, 0.0001152, '2025-06-18 11:01:52', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(398, 31, 17, 0.000256, 0.0002304, '2025-06-18 11:01:52', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(399, 31, 17, 0.000512, 0.0004608, '2025-06-18 11:01:52', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(400, 31, 17, 0.001024, 0.0009216, '2025-06-18 11:01:52', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(401, 31, 17, 0.002048, 0.0018432, '2025-06-18 11:01:52', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(402, 31, 17, 0.004096, 0.0036864, '2025-06-18 11:01:52', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(403, 32, 31, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(404, 32, 30, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(405, 32, 29, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(406, 32, 28, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(407, 32, 27, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(408, 32, 26, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(409, 32, 25, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(410, 32, 24, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(411, 32, 23, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(412, 32, 22, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(413, 32, 21, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(414, 32, 20, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(415, 32, 19, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(416, 32, 18, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(417, 32, 18, 0.0000004, 0.00000036, '2025-06-18 11:01:58', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(418, 32, 18, 0.0000008, 0.00000072, '2025-06-18 11:01:58', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(419, 32, 18, 0.0000016, 0.00000144, '2025-06-18 11:01:58', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(420, 32, 18, 0.0000032, 0.00000288, '2025-06-18 11:01:58', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(421, 32, 18, 0.000064, 0.0000576, '2025-06-18 11:01:58', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(422, 32, 18, 0.000128, 0.0001152, '2025-06-18 11:01:58', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(423, 32, 18, 0.000256, 0.0002304, '2025-06-18 11:01:58', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(424, 32, 18, 0.000512, 0.0004608, '2025-06-18 11:01:58', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(425, 32, 18, 0.001024, 0.0009216, '2025-06-18 11:01:58', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(426, 32, 18, 0.002048, 0.0018432, '2025-06-18 11:01:58', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(427, 32, 18, 0.004096, 0.0036864, '2025-06-18 11:01:58', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(428, 32, 17, 0.0000002, 0.00000018, '2025-06-18 11:01:58', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(429, 32, 17, 0.0000004, 0.00000036, '2025-06-18 11:01:58', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(430, 32, 17, 0.0000008, 0.00000072, '2025-06-18 11:01:58', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(431, 32, 17, 0.0000016, 0.00000144, '2025-06-18 11:01:58', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(432, 32, 17, 0.0000032, 0.00000288, '2025-06-18 11:01:58', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(433, 32, 17, 0.000064, 0.0000576, '2025-06-18 11:01:58', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(434, 32, 17, 0.000128, 0.0001152, '2025-06-18 11:01:58', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(435, 32, 17, 0.000256, 0.0002304, '2025-06-18 11:01:58', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(436, 32, 17, 0.000512, 0.0004608, '2025-06-18 11:01:58', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(437, 32, 17, 0.001024, 0.0009216, '2025-06-18 11:01:58', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(438, 32, 17, 0.002048, 0.0018432, '2025-06-18 11:01:58', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(439, 32, 17, 0.004096, 0.0036864, '2025-06-18 11:01:58', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(440, 33, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(441, 33, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(442, 33, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(443, 33, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(444, 33, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(445, 33, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(446, 33, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(447, 33, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(448, 33, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending');
INSERT INTO `global_bonus` (`id`, `user_id`, `from_id`, `total_amount`, `amount_payable`, `date_of_submission`, `service_charge`, `fund_transfer_type`, `transaction_note`, `payout_ref_id`, `status`, `release_status`) VALUES
(449, 33, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(450, 33, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(451, 33, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(452, 33, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(453, 33, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(454, 33, 18, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(455, 33, 18, 0.0000004, 0.00000036, '2025-06-18 11:02:00', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(456, 33, 18, 0.0000008, 0.00000072, '2025-06-18 11:02:00', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(457, 33, 18, 0.0000016, 0.00000144, '2025-06-18 11:02:00', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(458, 33, 18, 0.0000032, 0.00000288, '2025-06-18 11:02:00', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(459, 33, 18, 0.000064, 0.0000576, '2025-06-18 11:02:00', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(460, 33, 18, 0.000128, 0.0001152, '2025-06-18 11:02:00', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(461, 33, 18, 0.000256, 0.0002304, '2025-06-18 11:02:00', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(462, 33, 18, 0.000512, 0.0004608, '2025-06-18 11:02:00', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(463, 33, 18, 0.001024, 0.0009216, '2025-06-18 11:02:00', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(464, 33, 18, 0.002048, 0.0018432, '2025-06-18 11:02:00', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(465, 33, 18, 0.004096, 0.0036864, '2025-06-18 11:02:00', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(466, 33, 17, 0.0000002, 0.00000018, '2025-06-18 11:02:00', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(467, 33, 17, 0.0000004, 0.00000036, '2025-06-18 11:02:00', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(468, 33, 17, 0.0000008, 0.00000072, '2025-06-18 11:02:00', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(469, 33, 17, 0.0000016, 0.00000144, '2025-06-18 11:02:00', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(470, 33, 17, 0.0000032, 0.00000288, '2025-06-18 11:02:00', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(471, 33, 17, 0.000064, 0.0000576, '2025-06-18 11:02:00', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(472, 33, 17, 0.000128, 0.0001152, '2025-06-18 11:02:00', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(473, 33, 17, 0.000256, 0.0002304, '2025-06-18 11:02:00', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(474, 33, 17, 0.000512, 0.0004608, '2025-06-18 11:02:00', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(475, 33, 17, 0.001024, 0.0009216, '2025-06-18 11:02:00', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(476, 33, 17, 0.002048, 0.0018432, '2025-06-18 11:02:00', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(477, 33, 17, 0.004096, 0.0036864, '2025-06-18 11:02:00', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(478, 34, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(479, 34, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(480, 34, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(481, 34, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(482, 34, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(483, 34, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(484, 34, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(485, 34, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(486, 34, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(487, 34, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(488, 34, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(489, 34, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(490, 34, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(491, 34, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(492, 34, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(493, 34, 18, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(494, 34, 18, 0.0000004, 0.00000036, '2025-06-18 11:02:02', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(495, 34, 18, 0.0000008, 0.00000072, '2025-06-18 11:02:02', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(496, 34, 18, 0.0000016, 0.00000144, '2025-06-18 11:02:02', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(497, 34, 18, 0.0000032, 0.00000288, '2025-06-18 11:02:02', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(498, 34, 18, 0.000064, 0.0000576, '2025-06-18 11:02:02', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(499, 34, 18, 0.000128, 0.0001152, '2025-06-18 11:02:02', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(500, 34, 18, 0.000256, 0.0002304, '2025-06-18 11:02:02', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(501, 34, 18, 0.000512, 0.0004608, '2025-06-18 11:02:02', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(502, 34, 18, 0.001024, 0.0009216, '2025-06-18 11:02:02', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(503, 34, 18, 0.002048, 0.0018432, '2025-06-18 11:02:02', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(504, 34, 18, 0.004096, 0.0036864, '2025-06-18 11:02:02', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(505, 34, 17, 0.0000002, 0.00000018, '2025-06-18 11:02:02', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(506, 34, 17, 0.0000004, 0.00000036, '2025-06-18 11:02:02', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(507, 34, 17, 0.0000008, 0.00000072, '2025-06-18 11:02:02', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(508, 34, 17, 0.0000016, 0.00000144, '2025-06-18 11:02:02', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(509, 34, 17, 0.0000032, 0.00000288, '2025-06-18 11:02:02', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(510, 34, 17, 0.000064, 0.0000576, '2025-06-18 11:02:02', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(511, 34, 17, 0.000128, 0.0001152, '2025-06-18 11:02:02', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(512, 34, 17, 0.000256, 0.0002304, '2025-06-18 11:02:02', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(513, 34, 17, 0.000512, 0.0004608, '2025-06-18 11:02:02', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(514, 34, 17, 0.001024, 0.0009216, '2025-06-18 11:02:02', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(515, 34, 17, 0.002048, 0.0018432, '2025-06-18 11:02:02', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(516, 34, 17, 0.004096, 0.0036864, '2025-06-18 11:02:02', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(517, 35, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(518, 35, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(519, 35, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(520, 35, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(521, 35, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(522, 35, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(523, 35, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(524, 35, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(525, 35, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(526, 35, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(527, 35, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(528, 35, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(529, 35, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(530, 35, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(531, 35, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(532, 35, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(533, 35, 18, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(534, 35, 18, 0.0000004, 0.00000036, '2025-06-18 11:02:04', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(535, 35, 18, 0.0000008, 0.00000072, '2025-06-18 11:02:04', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(536, 35, 18, 0.0000016, 0.00000144, '2025-06-18 11:02:04', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(537, 35, 18, 0.0000032, 0.00000288, '2025-06-18 11:02:04', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(538, 35, 18, 0.000064, 0.0000576, '2025-06-18 11:02:04', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(539, 35, 18, 0.000128, 0.0001152, '2025-06-18 11:02:04', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(540, 35, 18, 0.000256, 0.0002304, '2025-06-18 11:02:04', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(541, 35, 18, 0.000512, 0.0004608, '2025-06-18 11:02:04', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(542, 35, 18, 0.001024, 0.0009216, '2025-06-18 11:02:04', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(543, 35, 18, 0.002048, 0.0018432, '2025-06-18 11:02:04', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(544, 35, 18, 0.004096, 0.0036864, '2025-06-18 11:02:04', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(545, 35, 17, 0.0000002, 0.00000018, '2025-06-18 11:02:04', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(546, 35, 17, 0.0000004, 0.00000036, '2025-06-18 11:02:04', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(547, 35, 17, 0.0000008, 0.00000072, '2025-06-18 11:02:04', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(548, 35, 17, 0.0000016, 0.00000144, '2025-06-18 11:02:04', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(549, 35, 17, 0.0000032, 0.00000288, '2025-06-18 11:02:04', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(550, 35, 17, 0.000064, 0.0000576, '2025-06-18 11:02:04', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(551, 35, 17, 0.000128, 0.0001152, '2025-06-18 11:02:04', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(552, 35, 17, 0.000256, 0.0002304, '2025-06-18 11:02:04', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(553, 35, 17, 0.000512, 0.0004608, '2025-06-18 11:02:04', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(554, 35, 17, 0.001024, 0.0009216, '2025-06-18 11:02:04', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(555, 35, 17, 0.002048, 0.0018432, '2025-06-18 11:02:04', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(556, 35, 17, 0.004096, 0.0036864, '2025-06-18 11:02:04', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(557, 36, 35, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(558, 36, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(559, 36, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(560, 36, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(561, 36, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(562, 36, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(563, 36, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(564, 36, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(565, 36, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(566, 36, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(567, 36, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(568, 36, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(569, 36, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(570, 36, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(571, 36, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(572, 36, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(573, 36, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(574, 36, 18, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(575, 36, 18, 0.0000004, 0.00000036, '2025-06-18 11:02:06', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(576, 36, 18, 0.0000008, 0.00000072, '2025-06-18 11:02:06', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(577, 36, 18, 0.0000016, 0.00000144, '2025-06-18 11:02:06', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(578, 36, 18, 0.0000032, 0.00000288, '2025-06-18 11:02:06', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(579, 36, 18, 0.000064, 0.0000576, '2025-06-18 11:02:06', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(580, 36, 18, 0.000128, 0.0001152, '2025-06-18 11:02:06', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(581, 36, 18, 0.000256, 0.0002304, '2025-06-18 11:02:06', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(582, 36, 18, 0.000512, 0.0004608, '2025-06-18 11:02:06', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(583, 36, 18, 0.001024, 0.0009216, '2025-06-18 11:02:06', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(584, 36, 18, 0.002048, 0.0018432, '2025-06-18 11:02:06', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(585, 36, 18, 0.004096, 0.0036864, '2025-06-18 11:02:06', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(586, 36, 17, 0.0000002, 0.00000018, '2025-06-18 11:02:06', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(587, 36, 17, 0.0000004, 0.00000036, '2025-06-18 11:02:06', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(588, 36, 17, 0.0000008, 0.00000072, '2025-06-18 11:02:06', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(589, 36, 17, 0.0000016, 0.00000144, '2025-06-18 11:02:06', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(590, 36, 17, 0.0000032, 0.00000288, '2025-06-18 11:02:06', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(591, 36, 17, 0.000064, 0.0000576, '2025-06-18 11:02:06', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(592, 36, 17, 0.000128, 0.0001152, '2025-06-18 11:02:06', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(593, 36, 17, 0.000256, 0.0002304, '2025-06-18 11:02:06', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(594, 36, 17, 0.000512, 0.0004608, '2025-06-18 11:02:06', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(595, 36, 17, 0.001024, 0.0009216, '2025-06-18 11:02:06', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(596, 36, 17, 0.002048, 0.0018432, '2025-06-18 11:02:06', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(597, 36, 17, 0.004096, 0.0036864, '2025-06-18 11:02:06', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(598, 37, 36, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(599, 37, 35, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(600, 37, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(601, 37, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(602, 37, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(603, 37, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(604, 37, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(605, 37, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(606, 37, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(607, 37, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(608, 37, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(609, 37, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(610, 37, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(611, 37, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(612, 37, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(613, 37, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(614, 37, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(615, 37, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(616, 37, 18, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(617, 37, 18, 0.0000004, 0.00000036, '2025-06-18 11:02:08', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(618, 37, 18, 0.0000008, 0.00000072, '2025-06-18 11:02:08', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(619, 37, 18, 0.0000016, 0.00000144, '2025-06-18 11:02:08', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(620, 37, 18, 0.0000032, 0.00000288, '2025-06-18 11:02:08', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(621, 37, 18, 0.000064, 0.0000576, '2025-06-18 11:02:08', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(622, 37, 18, 0.000128, 0.0001152, '2025-06-18 11:02:08', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(623, 37, 18, 0.000256, 0.0002304, '2025-06-18 11:02:08', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(624, 37, 18, 0.000512, 0.0004608, '2025-06-18 11:02:08', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(625, 37, 18, 0.001024, 0.0009216, '2025-06-18 11:02:08', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(626, 37, 18, 0.002048, 0.0018432, '2025-06-18 11:02:08', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(627, 37, 18, 0.004096, 0.0036864, '2025-06-18 11:02:08', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(628, 37, 17, 0.0000002, 0.00000018, '2025-06-18 11:02:08', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(629, 37, 17, 0.0000004, 0.00000036, '2025-06-18 11:02:08', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(630, 37, 17, 0.0000008, 0.00000072, '2025-06-18 11:02:08', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(631, 37, 17, 0.0000016, 0.00000144, '2025-06-18 11:02:08', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(632, 37, 17, 0.0000032, 0.00000288, '2025-06-18 11:02:08', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(633, 37, 17, 0.000064, 0.0000576, '2025-06-18 11:02:08', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(634, 37, 17, 0.000128, 0.0001152, '2025-06-18 11:02:08', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(635, 37, 17, 0.000256, 0.0002304, '2025-06-18 11:02:08', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(636, 37, 17, 0.000512, 0.0004608, '2025-06-18 11:02:08', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(637, 37, 17, 0.001024, 0.0009216, '2025-06-18 11:02:08', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(638, 37, 17, 0.002048, 0.0018432, '2025-06-18 11:02:08', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(639, 37, 17, 0.004096, 0.0036864, '2025-06-18 11:02:08', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(640, 38, 37, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(641, 38, 36, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(642, 38, 35, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(643, 38, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(644, 38, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(645, 38, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(646, 38, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(647, 38, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(648, 38, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(649, 38, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(650, 38, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(651, 38, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(652, 38, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(653, 38, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(654, 38, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(655, 38, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(656, 38, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(657, 38, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(658, 38, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(659, 38, 18, 0.0000002, 0.00000018, '2025-06-18 11:02:10', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(660, 38, 18, 0.0000004, 0.00000036, '2025-06-18 11:02:10', 0.00000004, 'credit', 'NA', 2, 'Pending', 'pending'),
(661, 38, 18, 0.0000008, 0.00000072, '2025-06-18 11:02:10', 0.00000008, 'credit', 'NA', 3, 'Pending', 'pending'),
(662, 38, 18, 0.0000016, 0.00000144, '2025-06-18 11:02:10', 0.00000016, 'credit', 'NA', 4, 'Pending', 'pending'),
(663, 38, 18, 0.0000032, 0.00000288, '2025-06-18 11:02:10', 0.00000032, 'credit', 'NA', 5, 'Pending', 'pending'),
(664, 38, 18, 0.000064, 0.0000576, '2025-06-18 11:02:10', 0.0000064, 'credit', 'NA', 6, 'Pending', 'pending'),
(665, 38, 18, 0.000128, 0.0001152, '2025-06-18 11:02:10', 0.0000128, 'credit', 'NA', 7, 'Pending', 'pending'),
(666, 38, 18, 0.000256, 0.0002304, '2025-06-18 11:02:10', 0.0000256, 'credit', 'NA', 8, 'Pending', 'pending'),
(667, 38, 18, 0.000512, 0.0004608, '2025-06-18 11:02:10', 0.0000512, 'credit', 'NA', 9, 'Pending', 'pending'),
(668, 38, 18, 0.001024, 0.0009216, '2025-06-18 11:02:10', 0.0001024, 'credit', 'NA', 10, 'Pending', 'pending'),
(669, 38, 18, 0.002048, 0.0018432, '2025-06-18 11:02:10', 0.0002048, 'credit', 'NA', 11, 'Pending', 'pending'),
(670, 38, 18, 0.004096, 0.0036864, '2025-06-18 11:02:10', 0.0004096, 'credit', 'NA', 12, 'Pending', 'pending'),
(671, 39, 38, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(672, 39, 37, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(673, 39, 36, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(674, 39, 35, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(675, 39, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(676, 39, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(677, 39, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(678, 39, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(679, 39, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(680, 39, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(681, 39, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(682, 39, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(683, 39, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(684, 39, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(685, 39, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(686, 39, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(687, 39, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(688, 39, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(689, 39, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(690, 39, 19, 0.0000002, 0.00000018, '2025-06-18 11:02:12', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(691, 40, 39, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(692, 40, 38, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(693, 40, 37, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(694, 40, 36, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(695, 40, 35, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(696, 40, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(697, 40, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(698, 40, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(699, 40, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(700, 40, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(701, 40, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(702, 40, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(703, 40, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(704, 40, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(705, 40, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(706, 40, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(707, 40, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(708, 40, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(709, 40, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(710, 40, 20, 0.0000002, 0.00000018, '2025-06-18 11:02:14', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(711, 41, 40, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(712, 41, 39, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(713, 41, 38, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(714, 41, 37, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(715, 41, 36, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(716, 41, 35, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(717, 41, 34, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(718, 41, 33, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(719, 41, 32, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(720, 41, 31, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(721, 41, 30, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(722, 41, 29, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(723, 41, 28, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(724, 41, 27, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(725, 41, 26, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(726, 41, 25, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(727, 41, 24, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(728, 41, 23, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(729, 41, 22, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(730, 41, 21, 0.0000002, 0.00000018, '2025-06-18 11:02:16', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(731, 42, 41, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(732, 42, 40, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(733, 42, 39, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(734, 42, 38, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(735, 42, 37, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(736, 42, 36, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(737, 42, 35, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(738, 42, 34, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(739, 42, 33, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(740, 42, 32, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(741, 42, 31, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(742, 42, 30, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(743, 42, 29, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(744, 42, 28, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(745, 42, 27, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(746, 42, 26, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(747, 42, 25, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(748, 42, 24, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(749, 42, 23, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending'),
(750, 42, 22, 0.0000002, 0.00000018, '2025-06-18 14:37:34', 0.00000002, 'credit', 'NA', 1, 'Released', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `image` varchar(64) NOT NULL,
  `directory` varchar(32) NOT NULL,
  `site_perm` int NOT NULL,
  `login_perm` int NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `name`, `code`, `image`, `directory`, `site_perm`, `login_perm`, `sort_order`) VALUES
(1, 'English', 'en', 'en.png', 'english', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_bonus`
--

CREATE TABLE `level_bonus` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `from_id` int NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `amount_payable` double NOT NULL DEFAULT '0',
  `date_of_submission` datetime DEFAULT '2017-10-10 00:00:00',
  `service_charge` double NOT NULL DEFAULT '0',
  `fund_transfer_type` varchar(20) NOT NULL DEFAULT 'credit',
  `transaction_note` varchar(200) NOT NULL DEFAULT 'NA',
  `payout_ref_id` int NOT NULL DEFAULT '0' COMMENT 'packageid',
  `missed_income_status` int NOT NULL,
  `level_percentage` double NOT NULL,
  `release_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level_commission`
--

CREATE TABLE `level_commission` (
  `id` int NOT NULL,
  `level_no` int NOT NULL DEFAULT '0',
  `level_commission` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_commission`
--

INSERT INTO `level_commission` (`id`, `level_no`, `level_commission`) VALUES
(1, 1, 30),
(2, 2, 10),
(3, 3, 10),
(4, 4, 3),
(5, 5, 2),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail_contents`
--

CREATE TABLE `mail_contents` (
  `id` int NOT NULL,
  `type` varchar(55) NOT NULL DEFAULT 'mail',
  `content` longtext NOT NULL,
  `status` int NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_contents`
--

INSERT INTO `mail_contents` (`id`, `type`, `content`, `status`, `date`) VALUES
(4, 'T&C', '<h2>Terms and Conditions</h2>\r\n<p>These terms and conditions outline the rules and regulations for the use of <!-- -->signature<!-- -->\'s Website, located at <!-- -->signature.com<!-- -->.</p>\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use <!-- -->signature.com<!-- --> if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company&rsquo;s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n<h3>Cookies</h3>\r\n<p>We employ the use of cookies. By accessing <!-- -->signature.com<!-- -->, you agreed to use cookies in agreement with the <!-- -->signature<!-- -->\'s Privacy Policy.<!-- --></p>\r\n<p>Most interactive websites use cookies to let us retrieve the user&rsquo;s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n<h3>License</h3>\r\n<p>Unless otherwise stated, <!-- -->signature<!-- --> and/or its licensors own the intellectual property rights for all material on <!-- -->signature.com<!-- -->. All intellectual property rights are reserved. You may access this from <!-- -->signature.com<!-- --> for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n<p>You must not:</p>\r\n<ul>\r\n<li>Republish material from <!-- -->signature.com</li>\r\n<li>Sell, rent or sub-license material from <!-- -->signature.com</li>\r\n<li>Reproduce, duplicate or copy material from <!-- -->signature.com</li>\r\n<li>Redistribute content from <!-- -->signature.com</li>\r\n</ul>\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. <!-- -->signature<!-- -->does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of<!-- -->signature<!-- -->, its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, <!-- -->signature<!-- --> shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n<p>signature<!-- --> reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n<p>You warrant and represent that:</p>\r\n<ul>\r\n<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n<p>You hereby grant <!-- -->signature<!-- --> a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n<h3>Hyperlinking to our Content</h3>\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n<ul>\r\n<li>Government agencies;</li>\r\n<li>Search engines;</li>\r\n<li>News organizations;</li>\r\n<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link:</p>\r\n<ul class=\"type-alpha\">\r\n<li>is not in any way deceptive;</li>\r\n<li>does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and</li>\r\n<li>fits within the context of the linking party&rsquo;s site.</li>\r\n</ul>\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n<ul>\r\n<li>commonly-known consumer and/or business information sources;</li>\r\n<li>dot.com community sites;</li>\r\n<li>associations or other groups representing charities;</li>\r\n<li>online directory distributors;</li>\r\n<li>internet portals;</li>\r\n<li>accounting, law and consulting firms; and</li>\r\n<li>educational institutions and trade associations.</li>\r\n</ul>\r\n<p>We will approve link requests from these organizations if we decide that:</p>\r\n<ul class=\"type-alpha\">\r\n<li>the link would not make us look unfavorably to ourselves or to our accredited businesses;</li>\r\n<li>the organization does not have any negative records with us;</li>\r\n<li>the benefit to us from the visibility of the hyperlink compensates the absence of <!-- -->signature<!-- -->; and</li>\r\n<li>the link is in the context of general resource information.</li>\r\n</ul>\r\n<p>These organizations may link to our home page so long as the link:</p>\r\n<ul class=\"type-alpha\">\r\n<li>is not in any way deceptive;</li>\r\n<li>does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and</li>\r\n<li>fits within the context of the linking party&rsquo;s site.</li>\r\n</ul>\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to <!-- -->signature<!-- -->. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n<ul>\r\n<li>By use of our corporate name; or</li>\r\n<li>By use of the uniform resource locator being linked to; or</li>\r\n<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party&rsquo;s site.</li>\r\n</ul>\r\n<p>No use of <!-- -->signature<!-- -->\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n<h3>iFrames</h3>\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n<h3>Content Liability</h3>\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n<h3>Your Privacy</h3>\r\n<p>Please read Privacy Policy</p>\r\n<h3>Reservation of Rights</h3>\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it&rsquo;s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n<h3>Removal of links from our website</h3>\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n<h3>Disclaimer</h3>\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n<ul>\r\n<li>limit or exclude our or your liability for death or personal injury;</li>\r\n<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer:</p>\r\n<ul class=\"type-alpha\">\r\n<li>are subject to the preceding paragraph; and</li>\r\n<li>govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory dutys.</li>\r\n</ul>\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', 0, '2022-05-10 14:49:19'),
(5, 'welcome_letter', '<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\"><img src=\"../../assets/images/logo/logo.png\" alt=\"logo\" width=\"78\" height=\"93\" /></p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\"><span style=\"font-size: xx-large;\"><strong>{title} <br /></strong></span></p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\"><span style=\"color: #378eee;\"><span style=\"font-family: aakar;\"><span style=\"font-size: xx-large;\"><strong>Welcome Letter</strong></span></span></span></p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<table class=\"table table-light table-bordered\" style=\"border-collapse: collapse; width: 85.8418%; height: 125px; margin-left: auto; margin-right: auto;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 25px;\">\r\n<td style=\"width: 47.3001%; height: 25px;\"><strong><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\">User Name</span></span></span></strong></td>\r\n<td style=\"width: 49.052%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>{username}</strong></span></span></span></td>\r\n</tr>\r\n<tr style=\"height: 25px;\">\r\n<td style=\"width: 47.3001%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>Name</strong></span></span></span></td>\r\n<td style=\"width: 49.052%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>{full_name}</strong></span></span></span></td>\r\n</tr>\r\n<tr style=\"height: 25px;\">\r\n<td style=\"width: 47.3001%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>Mobile No</strong></span></span></span></td>\r\n<td style=\"width: 49.052%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>{phone}</strong></span></span></span></td>\r\n</tr>\r\n<tr style=\"height: 25px;\">\r\n<td style=\"width: 47.3001%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>Email</strong></span></span></span></td>\r\n<td style=\"width: 49.052%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>{email}</strong></span></span></span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 47.3001%;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>Password<br /></strong></span></span></span></td>\r\n<td style=\"width: 49.052%;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>{password}<br /></strong></span></span></span></td>\r\n</tr>\r\n<tr style=\"height: 25px;\">\r\n<td style=\"width: 47.3001%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>Transaction Password<br /></strong></span></span></span></td>\r\n<td style=\"width: 49.052%; height: 25px;\"><span style=\"color: #666666;\"><span style=\"font-family: aakar;\"><span style=\"font-size: large;\"><strong>{transaction_password}<br /></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%;\" align=\"center\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 100%; padding-right: 30px; padding-left: 30px;\" align=\"justify\"><span style=\"color: #000000;\"><span style=\"font-family: aakar;\"><span style=\"font-size: medium;\"><span style=\"font-weight: normal;\">You have made right decision at the right time and chosen </span></span></span></span><span style=\"color: #000000;\"><span style=\"font-family: aakar;\"><span style=\"font-size: medium;\"><span style=\"font-weight: normal;\">the great company who has offered you great avenues of financial freedom that you have been seeking for so long.</span></span></span></span></p>\r\n<p>&nbsp;</p>', 0, '2022-07-11 10:48:28'),
(6, 'privacy_policy', '<h3>Your Privacy</h3>\r\n<p>Please read Privacy Policy</p>\r\n<h3>Reservation of Rights</h3>\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it&rsquo;s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n<h3>Removal of links from our website</h3>\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n<h3>Disclaimer</h3>\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n<ul>\r\n<li>limit or exclude our or your liability for death or personal injury;</li>\r\n<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer:</p>\r\n<ul class=\"type-alpha\">\r\n<li>are subject to the preceding paragraph; and</li>\r\n<li>govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory dutys.</li>\r\n</ul>\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', 0, '2022-07-05 09:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `en` varchar(99) NOT NULL COMMENT 'English lang: Default',
  `parent_id` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'clip-home-2',
  `status` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `perm_admin` int NOT NULL DEFAULT '0',
  `perm_pre_user` int NOT NULL,
  `perm_user` int DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `target` varchar(20) DEFAULT NULL,
  `type` varchar(99) NOT NULL DEFAULT 'site',
  `category` varchar(20) NOT NULL DEFAULT 'main'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `en`, `parent_id`, `link`, `icon`, `status`, `perm_admin`, `perm_pre_user`, `perm_user`, `order`, `target`, `type`, `category`) VALUES
(1, 'dashboard', '#', 'dashboard', 'fas fa-chart-pie', '1', 1, 1, 1, 1, NULL, 'site', 'main'),
(2, 'logout', '#', 'logout', 'fas fa-thumbs-down', '1', 1, 1, 1, 100001, NULL, 'site', 'users'),
(3, 'signup', '#', 'signup', 'fas fa-user-plus', '1', 1, 1, 0, 2, NULL, 'site', 'main'),
(4, 'settings', '#', '#', 'fas fa-cogs', '1', 1, 1, 0, 3, NULL, 'site', 'components'),
(5, 'company_info', '4', 'settings/site-info', '', '0', 1, 1, 0, 1, NULL, 'site', 'components'),
(6, 'configurations', '4', 'settings/plan-management', '', '1', 1, 1, 0, 2, NULL, 'site', 'components'),
(7, 'tools', '#', '#', 'fas fa-wrench', '0', 1, 1, 1, 4, NULL, 'site', 'components'),
(9, 'profile', '#', 'member/profile', 'fas fa-id-card', '0', 1, 1, 1, 4, NULL, 'site', 'users'),
(10, 'wallet', '#', 'business/wallet', 'fas fa-wallet', '0', 1, 1, 1, 4, NULL, 'site', 'components'),
(11, 'credit_debit_amount', '10', 'business/credit-debit-amount', '', '1', 1, 1, 0, 3, NULL, 'site', 'users'),
(12, 'fund_transfer', '10', 'business/fund-transfer', '', '1', 1, 1, 1, 2, NULL, 'site', 'users'),
(13, 'package_management', '4', 'settings/package-management', '', '1', 1, 1, 0, 2, NULL, 'site', 'components'),
(14, 'networks', '#', '#', 'fas fa-user-times', '1', 1, 1, 1, 4, NULL, 'site', 'components'),
(15, 'genealogy_tree', '14', 'network/genealogy-tree', '', '0', 1, 1, 1, 1, NULL, 'site', 'main'),
(16, 'referral_tree', '14', 'network/referral-tree', '', '1', 1, 1, 1, 2, NULL, 'site', 'main'),
(17, 'level_base_list', '14', 'network/level-base-list', '', '0', 1, 1, 1, 3, NULL, 'site', 'main'),
(18, 'news', '7', 'tools/news', '', '1', 0, 0, 1, 3, NULL, 'site', 'components'),
(19, 'events', '7', 'tools/events', '', '1', 0, 0, 1, 3, NULL, 'site', 'components'),
(20, 'documents', '7', 'tools/docs', '', '1', 0, 0, 1, 3, NULL, 'site', 'components'),
(21, 'news_management', '7', 'tools/news-management', '', '1', 1, 1, 0, 1, NULL, 'site', 'components'),
(22, 'event_management', '7', 'tools/event-management', '', '1', 1, 1, 0, 1, NULL, 'site', 'components'),
(23, 'upload_efiles', '7', 'tools/upload-efiles', '', '1', 1, 1, 0, 1, NULL, 'site', 'components'),
(24, 'email_template', '4', 'settings/email-template', '', '0', 1, 1, 0, 3, NULL, 'site', 'components'),
(25, 'welcome_letter', '4', 'settings/welcome-letter', '', '0', 1, 1, 0, 4, NULL, 'site', 'components'),
(26, 'add_media', '7', 'tools/add-images', 'clip-home-2', '0', 1, 1, 0, 4, NULL, 'site', 'components'),
(27, 'internal_mail', '#', '#', 'fas fa-envelope', '0', 1, 1, 1, 4, NULL, 'site', 'users'),
(28, 'inbox', '27', 'mail/inbox', '', '1', 1, 1, 1, 1, NULL, 'site', 'main'),
(29, 'sent_items', '27', 'mail/mail-sent', '', '1', 1, 1, 1, 2, NULL, 'site', 'main'),
(30, 'compose', '27', 'mail/compose-mail', '', '1', 1, 1, 1, 2, NULL, 'site', 'main'),
(31, 't_c', '4', 'settings/t-and-c', '', '0', 1, 1, 0, 5, NULL, 'site', 'components'),
(32, 'invite_friend', '14', 'network/invite-friend', '', '0', 1, 1, 1, 3, NULL, 'site', 'main'),
(33, 'wallet_summary', '10', 'business/wallets-summary', 'fas fa-chart-pie', '1', 1, 1, 1, 1, NULL, 'site', 'users'),
(34, 'reports', '#', '#', 'fas fa-signal', '1', 1, 1, 1, 4, NULL, 'site', 'users'),
(35, 'user_joining', '34', 'report/user-joining', '', '1', 1, 1, 1, 3, NULL, 'site', 'main'),
(36, 'wallet_details', '34', 'report/wallet-details', '', '1', 1, 1, 1, 3, NULL, 'site', 'main'),
(37, 'activate_inactivate', '34', 'report/active-inactive-report', 'fas fa-users-cog', '0', 1, 1, 0, 3, NULL, 'site', 'main'),
(38, 'Add/Deduct Amount Report', '34', 'report/add-deduct-amount', '', '0', 0, 0, 1, 3, NULL, 'site', 'main'),
(39, 'Upgrade Package', '#', 'member/upgrade-step', 'fas fa-microchip', '1', 0, 0, 1, 3, NULL, 'site', 'components'),
(40, 'payout_release', '10', 'business/payout-release', 'clip-home-2', '1', 1, 1, 0, 4, NULL, 'site', 'users'),
(41, 'rank_management', '4', 'settings/rank-management', '', '0', 1, 1, 0, 2, NULL, 'site', 'components'),
(44, 'package_purchase_report', '34', 'report/package-purchase-report', '', '1', 1, 1, 1, 3, NULL, 'site', 'main'),
(45, 'wallet_summary', '34', 'report/wallet-summary', '', '1', 1, 1, 1, 3, NULL, 'site', 'main'),
(46, 'payout_request', '10', 'business/payout-request', 'clip-home-2', '1', 0, 0, 1, 3, NULL, 'site', 'users'),
(47, 'Balance Sheet', '10', 'settings/balance-sheet', 'fas fa-list', '0', 1, 1, 0, 6, NULL, 'site', 'users'),
(48, 'JSTree', '14', 'network/hierarchical-view', '', '0', 1, 1, 1, 1, NULL, 'site', 'main'),
(49, 'rank_report', '34', 'report/rank-report', '', '0', 1, 1, 1, 3, NULL, 'site', 'main'),
(50, 'sub_admin', '4', 'settings/sub-admin', '', '0', 1, 1, 0, 3, NULL, 'site', 'components'),
(51, 'system-reset', '4', 'settings/system-reset', 'clip-home-2', '0', 1, 0, 0, 6, NULL, 'site', 'components'),
(52, 'mytickets', '#', 'support/my-tickets', 'fas fa-phone', '0', 1, 1, 1, 4, NULL, 'site', 'users'),
(53, 'Pending Global Bonus', '34', 'report/pending-global', '', '1', 1, 1, 1, 3, NULL, 'site', 'main'),
(59, 'Monoline Users', '34', 'report/monoline-users', '', '1', 0, 1, 1, 3, NULL, 'site', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `missed_amount`
--

CREATE TABLE `missed_amount` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` double NOT NULL,
  `package` int NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missed_amount`
--

INSERT INTO `missed_amount` (`id`, `user_id`, `amount`, `package`, `level`) VALUES
(1, 17, 0.0000002, 1, 20),
(2, 17, 0.0000004, 2, 20),
(3, 17, 0.0000008, 3, 20),
(4, 17, 0.0000016, 4, 20),
(5, 17, 0.0000032, 5, 20),
(6, 17, 0.000064, 6, 20),
(7, 17, 0.000128, 7, 20),
(8, 17, 0.000256, 8, 20),
(9, 17, 0.000512, 9, 20),
(10, 17, 0.001024, 10, 20),
(11, 17, 0.002048, 11, 20),
(12, 17, 0.004096, 12, 20),
(13, 18, 0.0000002, 1, 20),
(14, 18, 0.0000004, 2, 20),
(15, 18, 0.0000008, 3, 20),
(16, 18, 0.0000016, 4, 20),
(17, 18, 0.0000032, 5, 20),
(18, 18, 0.000064, 6, 20),
(19, 18, 0.000128, 7, 20),
(20, 18, 0.000256, 8, 20),
(21, 18, 0.000512, 9, 20),
(22, 18, 0.001024, 10, 20),
(23, 18, 0.002048, 11, 20),
(24, 18, 0.004096, 12, 20),
(25, 19, 0.0000002, 1, 20),
(26, 20, 0.0000002, 1, 20),
(27, 21, 0.0000002, 1, 20),
(28, 22, 0.0000002, 1, 20),
(29, 23, 0.0000002, 1, 19),
(30, 24, 0.0000002, 1, 18),
(31, 25, 0.0000002, 1, 17),
(32, 26, 0.0000002, 1, 16),
(33, 27, 0.0000002, 1, 15),
(34, 28, 0.0000002, 1, 14),
(35, 29, 0.0000002, 1, 13),
(36, 30, 0.0000002, 1, 12),
(37, 31, 0.0000002, 1, 11),
(38, 32, 0.0000002, 1, 10),
(39, 33, 0.0000002, 1, 9),
(40, 34, 0.0000002, 1, 8),
(41, 35, 0.0000002, 1, 7),
(42, 36, 0.0000002, 1, 6),
(43, 37, 0.0000002, 1, 5),
(44, 38, 0.0000002, 1, 4),
(45, 39, 0.0000002, 1, 3),
(46, 40, 0.0000002, 1, 2),
(47, 41, 0.0000002, 1, 1),
(48, 42, 0.0000002, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `monoline_structure`
--

CREATE TABLE `monoline_structure` (
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monoline_structure`
--

INSERT INTO `monoline_structure` (`id`, `user_id`) VALUES
(1, 16),
(2, 17),
(3, 18),
(4, 19),
(5, 20),
(6, 21),
(7, 22),
(8, 23),
(9, 24),
(10, 25),
(11, 26),
(12, 27),
(13, 28),
(14, 29),
(15, 30),
(16, 31),
(17, 32),
(18, 33),
(19, 34),
(20, 35),
(21, 36),
(22, 37),
(23, 38),
(24, 39),
(25, 40),
(26, 41),
(27, 42);

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `package_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'active',
  `amount` double NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '2017-10-10 00:00:00',
  `type` varchar(99) NOT NULL DEFAULT 'registration',
  `roi` bigint NOT NULL,
  `sort_order` int NOT NULL,
  `total_income` int NOT NULL,
  `payout` int NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`package_id`, `name`, `status`, `amount`, `date`, `type`, `roi`, `sort_order`, `total_income`, `payout`, `description`) VALUES
(1, 'Starter', 'active', 0.00001, '2019-01-10 15:51:38', 'registration', 0, 1, 1550, 300, ''),
(2, 'Builder', 'active', 0.00002, '2017-12-04 12:31:06', 'registration', 0, 2, 3440, 200, ''),
(3, 'Mentor', 'active', 0.00004, '2017-12-04 12:30:47', 'registration', 0, 3, 2000, 0, ''),
(4, 'Major', 'active', 0.00008, '2017-12-06 10:58:31', 'registration', 0, 4, 2800, 0, ''),
(5, 'Elite Club', 'active', 0.00016, '2017-12-04 12:31:06', 'registration', 0, 5, 4000, 0, ''),
(6, 'Premium Club', 'active', 0.0032, '2017-12-04 12:30:47', 'registration', 0, 6, 5000, 0, ''),
(7, 'Royal Club', 'active', 0.0064, '2017-12-06 10:58:31', 'registration', 0, 7, 0, 0, ''),
(8, 'Golden Club', 'active', 0.0128, '2017-12-04 12:31:06', 'registration', 0, 8, 10000, 10, ''),
(9, 'Diamond Club', 'active', 0.0256, '2017-12-04 12:30:47', 'registration', 0, 9, 0, 0, ''),
(10, 'Crown Club', 'active', 0.0512, '2022-06-03 00:00:00', 'registration', 10, 10, 0, 0, ''),
(11, 'Kings Club', 'active', 0.1024, '2022-06-04 00:00:00', 'registration', 34, 11, 0, 0, ''),
(12, 'Luxury Club', 'active', 0.2048, '2022-04-20 00:00:00', 'registration', 0, 12, 36080, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `package_upgrade_history`
--

CREATE TABLE `package_upgrade_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `old_package` int NOT NULL,
  `new_package` int NOT NULL,
  `method` varchar(100) NOT NULL DEFAULT 'bitcoin',
  `package_amount` double NOT NULL,
  `date` datetime NOT NULL DEFAULT '2018-08-09 00:00:00',
  `transaction_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_upgrade_history`
--

INSERT INTO `package_upgrade_history` (`id`, `user_id`, `old_package`, `new_package`, `method`, `package_amount`, `date`, `transaction_id`) VALUES
(1, 17, 0, 1, 'Signup', 0.00001, '2025-06-18 09:55:34', ''),
(2, 17, 1, 2, 'Upgrade', 0.00002, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(3, 17, 2, 3, 'Upgrade', 0.00004, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(4, 17, 3, 4, 'Upgrade', 0.00008, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(5, 17, 4, 5, 'Upgrade', 0.00016, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(6, 17, 5, 6, 'Upgrade', 0.0032, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(7, 17, 6, 7, 'Upgrade', 0.0064, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(8, 17, 7, 8, 'Upgrade', 0.0128, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(9, 17, 8, 9, 'Upgrade', 0.0256, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(10, 17, 9, 10, 'Upgrade', 0.0512, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(11, 17, 10, 11, 'Upgrade', 0.1024, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(12, 17, 11, 12, 'Upgrade', 0.2048, '2025-06-18 09:55:54', 'adsdsadsxscfdcdxcdxdxdxvddfdsndsscdccddcvxdgxdddcsfddsddvsddsd'),
(13, 18, 0, 1, 'Signup', 0.00001, '2025-06-18 09:57:08', ''),
(14, 18, 1, 2, 'Upgrade', 0.00002, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(15, 18, 2, 3, 'Upgrade', 0.00004, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(16, 18, 3, 4, 'Upgrade', 0.00008, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(17, 18, 4, 5, 'Upgrade', 0.00016, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(18, 18, 5, 6, 'Upgrade', 0.0032, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(19, 18, 6, 7, 'Upgrade', 0.0064, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(20, 18, 7, 8, 'Upgrade', 0.0128, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(21, 18, 8, 9, 'Upgrade', 0.0256, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(22, 18, 9, 10, 'Upgrade', 0.0512, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(23, 18, 10, 11, 'Upgrade', 0.1024, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(24, 18, 11, 12, 'Upgrade', 0.2048, '2025-06-18 09:58:03', 'adsdsadsxscfdcdxcdxdxdxvddfdsncdsscdccddcvxdgxdddcsfddsddvsddsd'),
(25, 19, 0, 1, 'Signup', 0.00001, '2025-06-18 10:53:30', ''),
(26, 20, 0, 1, 'Signup', 0.00001, '2025-06-18 10:53:32', ''),
(27, 21, 0, 1, 'Signup', 0.00001, '2025-06-18 10:53:34', ''),
(28, 22, 0, 1, 'Signup', 0.00001, '2025-06-18 10:53:36', ''),
(29, 23, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:09', ''),
(30, 24, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:11', ''),
(31, 25, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:13', ''),
(32, 26, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:15', ''),
(33, 27, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:17', ''),
(34, 28, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:19', ''),
(35, 29, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:48', ''),
(36, 30, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:50', ''),
(37, 31, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:52', ''),
(38, 32, 0, 1, 'Signup', 0.00001, '2025-06-18 11:01:58', ''),
(39, 33, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:00', ''),
(40, 34, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:02', ''),
(41, 35, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:04', ''),
(42, 36, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:06', ''),
(43, 37, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:08', ''),
(44, 38, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:10', ''),
(45, 39, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:12', ''),
(46, 40, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:14', ''),
(47, 41, 0, 1, 'Signup', 0.00001, '2025-06-18 11:02:16', ''),
(48, 42, 0, 1, 'Signup', 0.00001, '2025-06-18 14:37:34', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_table`
--

CREATE TABLE `password_reset_table` (
  `password_reset_id` int NOT NULL,
  `keyword` bigint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `reset_status` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral_bonus`
--

CREATE TABLE `referral_bonus` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `from_id` int NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `amount_payable` double NOT NULL DEFAULT '0',
  `date_of_submission` datetime DEFAULT '2017-10-10 00:00:00',
  `service_charge` double NOT NULL DEFAULT '0',
  `fund_transfer_type` varchar(20) NOT NULL DEFAULT 'credit',
  `transaction_note` varchar(200) NOT NULL DEFAULT 'NA',
  `payout_ref_id` int NOT NULL DEFAULT '0' COMMENT 'packageid',
  `level_percentage` double NOT NULL,
  `release_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_bonus`
--

INSERT INTO `referral_bonus` (`id`, `user_id`, `from_id`, `total_amount`, `amount_payable`, `date_of_submission`, `service_charge`, `fund_transfer_type`, `transaction_note`, `payout_ref_id`, `level_percentage`, `release_status`) VALUES
(1, 16, 17, 0.000003, 0.0000027, '2025-06-18 09:55:34', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(2, 16, 17, 0.000006, 0.0000054, '2025-06-18 09:55:54', 0.0000006, 'credit', 'Level1', 2, 30, 'pending'),
(3, 16, 17, 0.000012, 0.0000108, '2025-06-18 09:55:54', 0.0000012, 'credit', 'Level1', 3, 30, 'pending'),
(4, 16, 17, 0.000024, 0.0000216, '2025-06-18 09:55:54', 0.0000024, 'credit', 'Level1', 4, 30, 'pending'),
(5, 16, 17, 0.000048, 0.0000432, '2025-06-18 09:55:54', 0.0000048, 'credit', 'Level1', 5, 30, 'pending'),
(6, 16, 17, 0.00096, 0.000864, '2025-06-18 09:55:54', 0.000096, 'credit', 'Level1', 6, 30, 'pending'),
(7, 16, 17, 0.00192, 0.001728, '2025-06-18 09:55:54', 0.000192, 'credit', 'Level1', 7, 30, 'pending'),
(8, 16, 17, 0.00384, 0.003456, '2025-06-18 09:55:54', 0.000384, 'credit', 'Level1', 8, 30, 'pending'),
(9, 16, 17, 0.00768, 0.006912, '2025-06-18 09:55:54', 0.000768, 'credit', 'Level1', 9, 30, 'pending'),
(10, 16, 17, 0.01536, 0.013824, '2025-06-18 09:55:54', 0.001536, 'credit', 'Level1', 10, 30, 'pending'),
(11, 16, 17, 0.03072, 0.027648, '2025-06-18 09:55:54', 0.003072, 'credit', 'Level1', 11, 30, 'pending'),
(12, 16, 17, 0.06144, 0.055296, '2025-06-18 09:55:54', 0.006144, 'credit', 'Level1', 12, 30, 'pending'),
(13, 16, 18, 0.000003, 0.0000027, '2025-06-18 09:57:08', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(14, 16, 18, 0.000006, 0.0000054, '2025-06-18 09:58:03', 0.0000006, 'credit', 'Level1', 2, 30, 'pending'),
(15, 16, 18, 0.000012, 0.0000108, '2025-06-18 09:58:03', 0.0000012, 'credit', 'Level1', 3, 30, 'pending'),
(16, 16, 18, 0.000024, 0.0000216, '2025-06-18 09:58:03', 0.0000024, 'credit', 'Level1', 4, 30, 'pending'),
(17, 16, 18, 0.000048, 0.0000432, '2025-06-18 09:58:03', 0.0000048, 'credit', 'Level1', 5, 30, 'pending'),
(18, 16, 18, 0.00096, 0.000864, '2025-06-18 09:58:03', 0.000096, 'credit', 'Level1', 6, 30, 'pending'),
(19, 16, 18, 0.00192, 0.001728, '2025-06-18 09:58:03', 0.000192, 'credit', 'Level1', 7, 30, 'pending'),
(20, 16, 18, 0.00384, 0.003456, '2025-06-18 09:58:03', 0.000384, 'credit', 'Level1', 8, 30, 'pending'),
(21, 16, 18, 0.00768, 0.006912, '2025-06-18 09:58:03', 0.000768, 'credit', 'Level1', 9, 30, 'pending'),
(22, 16, 18, 0.01536, 0.013824, '2025-06-18 09:58:03', 0.001536, 'credit', 'Level1', 10, 30, 'pending'),
(23, 16, 18, 0.03072, 0.027648, '2025-06-18 09:58:03', 0.003072, 'credit', 'Level1', 11, 30, 'pending'),
(24, 16, 18, 0.06144, 0.055296, '2025-06-18 09:58:03', 0.006144, 'credit', 'Level1', 12, 30, 'pending'),
(25, 16, 19, 0.000003, 0.0000027, '2025-06-18 10:53:30', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(26, 16, 20, 0.000003, 0.0000027, '2025-06-18 10:53:32', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(27, 16, 21, 0.000003, 0.0000027, '2025-06-18 10:53:34', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(28, 16, 22, 0.000003, 0.0000027, '2025-06-18 10:53:36', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(29, 16, 23, 0.000003, 0.0000027, '2025-06-18 11:01:09', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(30, 16, 24, 0.000003, 0.0000027, '2025-06-18 11:01:11', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(31, 16, 25, 0.000003, 0.0000027, '2025-06-18 11:01:13', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(32, 16, 26, 0.000003, 0.0000027, '2025-06-18 11:01:15', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(33, 16, 27, 0.000003, 0.0000027, '2025-06-18 11:01:17', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(34, 16, 28, 0.000003, 0.0000027, '2025-06-18 11:01:19', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(35, 16, 29, 0.000003, 0.0000027, '2025-06-18 11:01:48', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(36, 16, 30, 0.000003, 0.0000027, '2025-06-18 11:01:50', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(37, 16, 31, 0.000003, 0.0000027, '2025-06-18 11:01:52', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(38, 16, 32, 0.000003, 0.0000027, '2025-06-18 11:01:58', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(39, 16, 33, 0.000003, 0.0000027, '2025-06-18 11:02:00', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(40, 16, 34, 0.000003, 0.0000027, '2025-06-18 11:02:02', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(41, 16, 35, 0.000003, 0.0000027, '2025-06-18 11:02:04', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(42, 16, 36, 0.000003, 0.0000027, '2025-06-18 11:02:06', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(43, 16, 37, 0.000003, 0.0000027, '2025-06-18 11:02:08', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(44, 16, 38, 0.000003, 0.0000027, '2025-06-18 11:02:10', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(45, 16, 39, 0.000003, 0.0000027, '2025-06-18 11:02:12', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(46, 16, 40, 0.000003, 0.0000027, '2025-06-18 11:02:14', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(47, 16, 41, 0.000003, 0.0000027, '2025-06-18 11:02:16', 0.0000003, 'credit', 'Level1', 1, 30, 'pending'),
(48, 16, 42, 0.000003, 0.0000027, '2025-06-18 14:37:34', 0.0000003, 'credit', 'Level1', 1, 30, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `send_token_error`
--

CREATE TABLE `send_token_error` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `wallet_address` longtext NOT NULL,
  `amount` double NOT NULL,
  `txId` longtext NOT NULL,
  `status` longtext NOT NULL,
  `datas` longtext NOT NULL,
  `type` longtext NOT NULL,
  `crypto_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'crypto_history_id',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int NOT NULL,
  `code` varchar(32) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `code`, `key`, `value`, `data`) VALUES
(1, 'config', 'mlm_plan', 'Unilevel', ''),
(2, 'config', 'signup_amount', '10', ''),
(6, 'plan', 'max_depth', '5', ''),
(7, 'plan', 'width_ceiling', '3', ''),
(8, 'plan', 'commission_type', 'percentage', ''),
(9, 'plan', 'referral_amount', '50', ''),
(10, 'config', 'package_status', 'yes', ''),
(11, 'config', 'min_withdraw_amt', '0', ''),
(12, 'config', 'tree_level', '3', ''),
(13, 'config', 'user_name_max_len', '6', ''),
(14, 'config', 'password_min_len', '5', ''),
(15, 'config', 'phone_number_length', '10', ''),
(16, 'config', 'referal_status', 'yes', ''),
(5, 'config', 'user_name_min_len', '5', ''),
(4, 'config', 'signup_amount', '10', ''),
(3, 'config', 'password_max_len', '25', ''),
(17, 'user_name_config', 'user_name_prefix', 'NEO', ''),
(18, 'plan', 'package_referral_amount', '50', ''),
(19, 'plan', 'package_referral_amount', '50', ''),
(20, 'config', 'matrix_bonus', '10', ''),
(21, 'config', 'max_withdraw_amt', '500000', ''),
(22, 'config', 'transaction_fee', '10', ''),
(23, 'config', 'google_login', '1', ''),
(24, 'config', 'global_community_pool_bonus', '40', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL DEFAULT 'NA',
  `email` varchar(150) NOT NULL DEFAULT 'NA',
  `phone` varchar(25) NOT NULL DEFAULT 'NA',
  `logo` varchar(100) NOT NULL DEFAULT 'NA',
  `favicon` varchar(200) NOT NULL DEFAULT 'NA',
  `address` longtext,
  `default_lang` int NOT NULL DEFAULT '1',
  `login_lang` int NOT NULL,
  `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'https://facebook.com/',
  `twitter` varchar(99) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'https://plus.google.com/',
  `country_id` int NOT NULL,
  `currency_id` int NOT NULL,
  `maintenance_mode` int NOT NULL DEFAULT '0',
  `maintenance_mode_text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `time_zone` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `name`, `email`, `phone`, `logo`, `favicon`, `address`, `default_lang`, `login_lang`, `facebook`, `twitter`, `country_id`, `currency_id`, `maintenance_mode`, `maintenance_mode_text`, `time_zone`) VALUES
(1, 'BTCCLUB', 'infobtcclub@gmail.com1', '123456789', 'logo.png', 'favicon-32x32.png', 'BTCCLUB', 1, 1, 'https://facebook.com/', 'https://plus.google.com/', 223, 2, 0, 'Site is under maintenance mode', 'Asia/Kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `site_maintenance`
--

CREATE TABLE `site_maintenance` (
  `id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `date_of_availability` date NOT NULL DEFAULT '2017-10-09',
  `block_login` int NOT NULL DEFAULT '0',
  `block_register` int NOT NULL DEFAULT '0',
  `block_ecommerce` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `username_change_history`
--

CREATE TABLE `username_change_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `old_username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `new_username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `modified_date` datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_type` varchar(11) NOT NULL DEFAULT 'user',
  `first_name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `second_name` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `status` varchar(22) NOT NULL DEFAULT 'active',
  `password` varchar(250) NOT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `country` int NOT NULL,
  `state` varchar(200) NOT NULL DEFAULT '0',
  `city` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `zip_code` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `mobile` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `date_of_joining` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_id` int NOT NULL DEFAULT '0',
  `user_photo` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'nophoto.png',
  `secure_pin` varchar(200) NOT NULL,
  `facebook` varchar(99) NOT NULL DEFAULT 'https://facebook.com/',
  `default_lang` int NOT NULL DEFAULT '1',
  `rank_id` int NOT NULL DEFAULT '0',
  `father_id` int NOT NULL,
  `sponsor_id` int NOT NULL,
  `position` int NOT NULL,
  `left_father` int NOT NULL,
  `right_father` int NOT NULL,
  `left_sponsor` int NOT NULL,
  `right_sponsor` int NOT NULL,
  `register_by_using` varchar(99) NOT NULL DEFAULT 'free_join',
  `sponsor_level` int NOT NULL DEFAULT '0',
  `referral_count` int NOT NULL DEFAULT '0',
  `user_level` int NOT NULL DEFAULT '0',
  `twitter` varchar(99) NOT NULL DEFAULT 'https://twitter.com/',
  `linked_in` varchar(99) NOT NULL DEFAULT 'https://www.linkedin.com/',
  `instagram` varchar(99) NOT NULL DEFAULT 'https://www.instagram.com/',
  `auth_tocken` varchar(100) NOT NULL,
  `wallet_address` longtext NOT NULL,
  `transaction_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_type`, `first_name`, `second_name`, `status`, `password`, `address`, `country`, `state`, `city`, `zip_code`, `mobile`, `email`, `date_of_joining`, `package_id`, `user_photo`, `secure_pin`, `facebook`, `default_lang`, `rank_id`, `father_id`, `sponsor_id`, `position`, `left_father`, `right_father`, `left_sponsor`, `right_sponsor`, `register_by_using`, `sponsor_level`, `referral_count`, `user_level`, `twitter`, `linked_in`, `instagram`, `auth_tocken`, `wallet_address`, `transaction_id`) VALUES
(16, 'admin', 'admin', 'sur', 'Neo', 'active', '$2a$08$gMRE7DSoSY3NDVdyULdNmOdtNXijUeoJsSNHjAKQXrGMe2IH4cE2i', 'Neo MLM Software', 4, '166', 'Cochin', '123456', '5589654789', 'admin@neomlm.com', '2025-06-18 09:54:19', 12, 'nophoto.png', '12345678', 'http://facebook.com', 1, 0, 0, 0, 0, 1, 54, 1, 54, 'free_join', 0, 26, 0, 'https://www.linkedin.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', '0x4a3984c64105FE082eb5Dd1965a4AF718DDc6957xcvcvxcv', ''),
(17, '30400', 'user', '', 'NA', 'active', '$2a$08$t7J9DtKLAhagzEgvfX.XyuTYUT2hL.QX6PqI0DSGYuQo2ZVIh1O6W', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 09:55:34', 12, 'nophoto.png', '12426551', 'https://facebook.com/', 1, 0, 0, 16, 0, 2, 3, 2, 3, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsdsddcdcddzxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddssddxccdddsfdddbcshdddecfdddkdsdshccdds17'),
(18, '97563', 'user', '', 'NA', 'active', '$2a$08$FlK70CsERD1pp/x5ZneUEOc5y1sNuBMbQiR4fL3RQa/vdTvOj8tuG', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 09:57:08', 12, 'nophoto.png', '21621061', 'https://facebook.com/', 1, 0, 0, 16, 0, 4, 5, 4, 5, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsdsddcdcddzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddssdddxccdddsfdddbcshdddecfdddkdsdshccdds17'),
(19, '30937', 'user', '', 'NA', 'active', '$2a$08$TkJPd.PJ/HQmnVk2QQW5kOqACWJqyZXFet3gN5i9dWRGfW78rWfuG', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 10:53:30', 1, 'nophoto.png', '74920610', 'https://facebook.com/', 1, 0, 0, 16, 0, 6, 7, 6, 7, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsdsddcdcddfdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddssdddxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(20, '06839', 'user', '', 'NA', 'active', '$2a$08$SsllGo5IxbL.dSj1eRcPOOBPahPIZGHeET1V.5G7iS6/6p1VKP2Bm', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 10:53:32', 1, 'nophoto.png', '35456884', 'https://facebook.com/', 1, 0, 0, 16, 0, 8, 9, 8, 9, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsdsfddcdcddfdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddfssdddxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(21, '06208', 'user', '', 'NA', 'active', '$2a$08$L0ZHJ7lOPHfYG44xU01zPuNWQ8pKe.8PVsF0KyvRK3vUG/IRXzJOm', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 10:53:34', 1, 'nophoto.png', '66339090', 'https://facebook.com/', 1, 0, 0, 16, 0, 10, 11, 10, 11, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsdsfdfdcdcddfdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddffssdddxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(22, '28204', 'user', '', 'NA', 'active', '$2a$08$IKqn6.e5mjsOtX86G9ohg.wlQTd4p7dU5BkekHzphYukL/imAghCe', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 10:53:36', 1, 'nophoto.png', '60441323', 'https://facebook.com/', 1, 0, 0, 16, 0, 12, 13, 12, 13, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsdsfdfdcdcddffdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddffssdddfxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(23, '26684', 'user', '', 'NA', 'active', '$2a$08$Z4QHpcr5VC6ndLLRgh1DMOl0muP5nHkZ6ocOJ/1USnAnx8HhY.hXy', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:09', 1, 'nophoto.png', '71962083', 'https://facebook.com/', 1, 0, 0, 16, 0, 14, 15, 14, 15, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsfdsfdfdcdcddffdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdvxdddfffssdddfxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(24, '98713', 'user', '', 'NA', 'active', '$2a$08$1QnYqAU9XatWqu2SzFyxD.2jplL.wKDvurfdM9KI5Me5na6k3U0ye', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:11', 1, 'nophoto.png', '93144814', 'https://facebook.com/', 1, 0, 0, 16, 0, 16, 17, 16, 17, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsffdsfdfdcdcddffdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdfvxdddfffssdddfxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(25, '20432', 'user', '', 'NA', 'active', '$2a$08$Zd8oSnZyLKFAQVqoITus8./qdStW.rFdiR1vhtx34ro9ANEbo6R/K', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:13', 1, 'nophoto.png', '39860824', 'https://facebook.com/', 1, 0, 0, 16, 0, 18, 19, 18, 19, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsffdsfdfdcdcfddffdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdfvxdddfffsfsdddfxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(26, '28105', 'user', '', 'NA', 'active', '$2a$08$pqjn6xa3rnheqPrDzO1b.OpmxeVKMycuBlnDgCDqFQ81do8kI4ztm', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:15', 1, 'nophoto.png', '38744352', 'https://facebook.com/', 1, 0, 0, 16, 0, 20, 21, 20, 21, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddffdzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdfvxdddffffsfsdddfxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(27, '61874', 'user', '', 'NA', 'active', '$2a$08$ADHAzpmPD90lkzZvyMh15ubmPhtWmpaqc1erHSuRf991fhjSM9gM2', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:17', 1, 'nophoto.png', '58198029', 'https://facebook.com/', 1, 0, 0, 16, 0, 22, 23, 22, 23, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddffdfzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdfvxdddffffsfsdddffxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(28, '86765', 'user', '', 'NA', 'active', '$2a$08$Ub8ZiyWa2Bl0sUXSDJlDpurNlCxRZM29lrLxf9eOzFqzRvAO9.X1W', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:19', 1, 'nophoto.png', '33378420', 'https://facebook.com/', 1, 0, 0, 16, 0, 24, 25, 24, 25, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxdddcdcsddvvsdsffdsffdfdcdcfddfffdfzdxcscdxdd', '0xesddfsgsxdxsgddcccdsvchdfvxdddffffsfsdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(29, '39377', 'user', '', 'NA', 'active', '$2a$08$Wya7Ll0EBX22hJ2O2/v60eWk7d5hQTDj9FNxcpyFH4pydNHh2UmrW', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:48', 1, 'nophoto.png', '10165908', 'https://facebook.com/', 1, 0, 0, 16, 0, 26, 27, 26, 27, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdcdcsddvvsdsffdsffdfdcdcfddfffdfzdxcscdxdd', '0xesddfsgsxdxsgsddcccdsvchdfvxdddffffsfsdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(30, '22056', 'user', '', 'NA', 'active', '$2a$08$7KqGrO5kam2IhzhbxgM6..EGjvwFMCCXe4chK5SC5YuJNl14WZWzq', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:50', 1, 'nophoto.png', '93162777', 'https://facebook.com/', 1, 0, 0, 16, 0, 28, 29, 28, 29, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdcdcsddvvsdsffdsffdfdcsdcfddfffdfzdxcscdxdd', '0xesddfsgsxdxsgsddcccdsvchdfvxdddffffssfsdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(31, '00141', 'user', '', 'NA', 'active', '$2a$08$y3oxjoNZSFVc28AngRZiEudxkIV4fiyGUb/HuIvMhKy0j05Z0vUJi', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:52', 1, 'nophoto.png', '83484596', 'https://facebook.com/', 1, 0, 0, 16, 0, 30, 31, 30, 31, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdcdcsddvvsdsffdsffdfdcsdcsfddfffdfzdxcscdxdd', '0xesddfsgsxdxsgsddcccdsvchdfvxdddffffssfssdddfffxccdddsffdddbcshdddecfdddkdsdshccdds17'),
(32, '24984', 'user', '', 'NA', 'active', '$2a$08$ZKvw/dQeIUOd/.uGmXLGxuIdI0Z8GclLOuhIXeHlYTV29d8b9EstG', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:01:58', 1, 'nophoto.png', '15009119', 'https://facebook.com/', 1, 0, 0, 16, 0, 32, 33, 32, 33, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdffdfzdxcscdxdd', '0xesddfsgsxdxsshdddecfdddkdsdshccdds17'),
(33, '03131', 'user', '', 'NA', 'active', '$2a$08$YNheYqxsxz1JvaERJge5jOYScEvIIY2j2vdChTXoLHaL1Eu0Uuznu', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:00', 1, 'nophoto.png', '25556523', 'https://facebook.com/', 1, 0, 0, 16, 0, 34, 35, 34, 35, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdffdfzdxcfscdxdd', '0xesddfsgsxdxsshdddecfddfdkdsdshccdds17'),
(34, '83110', 'user', '', 'NA', 'active', '$2a$08$29xLSYHtCBB9LL0MW3aIGeSCBNSOi04eHNX73HptBELSSIRjcBYF6', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:02', 1, 'nophoto.png', '32272226', 'https://facebook.com/', 1, 0, 0, 16, 0, 36, 37, 36, 37, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdffdfzdxcffscdxdd', '0xesddfsgsxdxsshdddecfddffdkdsdshccdds17'),
(35, '46528', 'user', '', 'NA', 'active', '$2a$08$eNxvLJtqIoy5ptKM.R.9PuAXTfx6bovQ5bYcOAAzguUBjt43FvO12', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:04', 1, 'nophoto.png', '98918435', 'https://facebook.com/', 1, 0, 0, 16, 0, 38, 39, 38, 39, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdffdfzdxcfffscdxdd', '0xesddfsgsxdxsshdddecfddffdfkdsdshccdds17'),
(36, '31936', 'user', '', 'NA', 'active', '$2a$08$ZUjGMhdx3EEVFYCHZbI7z.XJJZOUCNHp2Bw6bMN4e7Ph5/cFoEkfm', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:06', 1, 'nophoto.png', '37066998', 'https://facebook.com/', 1, 0, 0, 16, 0, 40, 41, 40, 41, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdffdfzdxcfffscdxfdd', '0xesddfsgsxdxsshdddecfddffdfkdfsdshccdds17'),
(37, '04836', 'user', '', 'NA', 'active', '$2a$08$cRmTAw6CxKLWDTpPI62SMuzmd.0lzRxmpi0jOQcifEmAWh1VZKe3y', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:08', 1, 'nophoto.png', '67540815', 'https://facebook.com/', 1, 0, 0, 16, 0, 42, 43, 42, 43, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdffdfzdxcfffscdxffdd', '0xesddfsgsxdxsshdddecfddffdfkdfsfdshccdds17'),
(38, '99894', 'user', '', 'NA', 'active', '$2a$08$TJZcwxxHSQN8Ht0uJ1sSceDcjvIgn.ocZufCo/Zp7VqIGZPWJu7gC', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:10', 1, 'nophoto.png', '39548929', 'https://facebook.com/', 1, 0, 0, 16, 0, 44, 45, 44, 45, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddsdfffdfzdxcfffscdxffdd', '0xesddfsgsxdxsshddfdecfddffdfkdfsfdshccdds17'),
(39, '47592', 'user', '', 'NA', 'active', '$2a$08$rdRT6PcrXlsAZTRLxTCXPOx27O4stSkEpGJ2vRaqvoLI1eT.rVcNe', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:12', 1, 'nophoto.png', '55441041', 'https://facebook.com/', 1, 0, 0, 16, 0, 46, 47, 46, 47, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'dddddddddxxddfsdfffdfzdxcfffscdxffdd', '0xesddfsgsxdxssfhddfdecfddffdfkdfsfdshccdds17'),
(40, '43058', 'user', '', 'NA', 'active', '$2a$08$3mn04fPAzbNKMzbTdC.pBO6i/KkeQR6PTdnfZf4Zt36jqXIR07Ni2', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:14', 1, 'nophoto.png', '42631069', 'https://facebook.com/', 1, 0, 0, 16, 0, 48, 49, 48, 49, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'ddddddddfdxxddfsdfffdfzdxcfffscdxffdd', '0xesddfsgfsxdxssfhddfdecfddffdfkdfsfdshccdds17'),
(41, '00452', 'user', '', 'NA', 'active', '$2a$08$sDLfgNfs/Z4D8Attu8X7MexQYBPHcaVaq.DV4n9K.jMtwn6UqW4.m', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 11:02:16', 1, 'nophoto.png', '25478192', 'https://facebook.com/', 1, 0, 0, 16, 0, 50, 51, 50, 51, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'ddddfddddfdxxddfsdfffdfzdxcfffscdxffdd', '0xesdfdfsgfsxdxssfhddfdecfddffdfkdfsfdshccdds17'),
(42, 'BC25888', 'user', '', 'NA', 'active', '$2a$08$spQsXzbtXIBINdzOYe..v.1BdnYxKTtM6DkCu7Nj6dekXBkbW/QZK', NULL, 0, '0', 'NA', 'NA', '', '', '2025-06-18 14:37:34', 1, 'nophoto.png', '32195281', 'https://facebook.com/', 1, 0, 0, 16, 0, 52, 53, 52, 53, 'free_join', 1, 0, 1, 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'ddddfdddddfdxxddfsdfffdfzdxcfffscdxffdd', '0xesdfdfsgfsxdxssfhddfdecdfddffdfkdfsfdshccdds17');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `wallet` double NOT NULL DEFAULT '0',
  `referral_bonus` double NOT NULL,
  `level_bonus` double NOT NULL,
  `wallet_withdrawal` double NOT NULL,
  `fund_transfer` double NOT NULL,
  `add_fund` double NOT NULL,
  `deduct_fund` double NOT NULL,
  `ewallet_register` double NOT NULL,
  `payout_request` double NOT NULL,
  `payout_delete` double NOT NULL,
  `missed_level_income` double NOT NULL,
  `global_bonus` double NOT NULL,
  `global_bonus_pending` double NOT NULL,
  `transaction_fee` double NOT NULL,
  `transaction_fee_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wallet`
--

INSERT INTO `user_wallet` (`id`, `user_id`, `wallet`, `referral_bonus`, `level_bonus`, `wallet_withdrawal`, `fund_transfer`, `add_fund`, `deduct_fund`, `ewallet_register`, `payout_request`, `payout_delete`, `missed_level_income`, `global_bonus`, `global_bonus_pending`, `transaction_fee`, `transaction_fee_total`) VALUES
(1, 16, 0.21968819999999983, 0.21968819999999983, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.013015099999999998, 0.013015099999999998),
(3, 18, 0.007320779999999999, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.007320779999999999, 4.336808689942018e-19, 0.012201699999999998, 0.012201699999999998),
(4, 19, 0.00000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000036, 0.0146412, 0.0000007000000000000004, 0.0000007000000000000004),
(5, 20, 0.00000054, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000054, 0.0146412, 0.0000007000000000000004, 0.0000007000000000000004),
(6, 21, 0.00000072, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000072, 0.0146412, 0.0000007000000000000004, 0.0000007000000000000004),
(7, 22, 0.0000009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000009, 0.0146412, 0.0000007000000000000004, 0.0000007000000000000004),
(8, 23, 0.00000108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000108, 0.0146412, 0.0000006800000000000004, 0.0000006800000000000004),
(9, 24, 0.00000126, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000126, 0.0146412, 0.0000006600000000000004, 0.0000006600000000000004),
(10, 25, 0.00000144, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000144, 0.0146412, 0.0000006400000000000003, 0.0000006400000000000003),
(11, 26, 0.00000162, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000162, 0.0146412, 0.0000006200000000000003, 0.0000006200000000000003),
(12, 27, 0.0000018, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000018, 0.0146412, 0.0000006000000000000003, 0.0000006000000000000003),
(13, 28, 0.00000198, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000198, 0.0146412, 0.0000005800000000000003, 0.0000005800000000000003),
(14, 29, 0.00000216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000216, 0.0146412, 0.0000005600000000000002, 0.0000005600000000000002),
(15, 30, 0.00000234, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000234, 0.0146412, 0.0000005400000000000002, 0.0000005400000000000002),
(16, 31, 0.00000252, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000252, 0.0146412, 0.0000005200000000000002, 0.0000005200000000000002),
(17, 32, 0.0000027, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000027, 0.0146412, 0.0000005000000000000002, 0.0000005000000000000002),
(18, 33, 0.00000288, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000288, 0.0146412, 0.0000004800000000000002, 0.0000004800000000000002),
(19, 34, 0.00000306, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000306, 0.0146412, 0.00000046000000000000015, 0.00000046000000000000015),
(20, 35, 0.00000324, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000324, 0.0146412, 0.00000044000000000000013, 0.00000044000000000000013),
(21, 36, 0.00000342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00000342, 0.0146412, 0.0000004200000000000001, 0.0000004200000000000001),
(22, 37, 0.0000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000036, 0.0146412, 0.0000004000000000000001, 0.0000004000000000000001),
(23, 38, 0.0000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000036, 0.0073206, 0.00000038000000000000007, 0.00000038000000000000007),
(24, 39, 0.0000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000036, 0, 0.00000036000000000000005, 0.00000036000000000000005),
(25, 40, 0.0000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000036, 0, 0.00000034000000000000003, 0.00000034000000000000003),
(26, 41, 0.0000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000036, 0, 0.00000032, 0.00000032),
(27, 42, 0.0000036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0000036, 0, 0.0000003, 0.0000003);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_payment_details`
--

CREATE TABLE `wallet_payment_details` (
  `id` int NOT NULL,
  `wallet_owner_id` int NOT NULL DEFAULT '0',
  `used_user_id` int NOT NULL DEFAULT '0',
  `used_amount` double NOT NULL DEFAULT '0',
  `used_for` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'NA',
  `security_pin` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wbtc_balance_sheet`
--

CREATE TABLE `wbtc_balance_sheet` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'payout',
  `transaction_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_history`
--
ALTER TABLE `activity_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_wallet_details`
--
ALTER TABLE `admin_wallet_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amount_type`
--
ALTER TABLE `amount_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_details`
--
ALTER TABLE `commission_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cron_history`
--
ALTER TABLE `cron_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_history`
--
ALTER TABLE `crypto_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `global_bonus`
--
ALTER TABLE `global_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `level_bonus`
--
ALTER TABLE `level_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_commission`
--
ALTER TABLE `level_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_contents`
--
ALTER TABLE `mail_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missed_amount`
--
ALTER TABLE `missed_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monoline_structure`
--
ALTER TABLE `monoline_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `package_upgrade_history`
--
ALTER TABLE `package_upgrade_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_table`
--
ALTER TABLE `password_reset_table`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- Indexes for table `referral_bonus`
--
ALTER TABLE `referral_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_token_error`
--
ALTER TABLE `send_token_error`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_maintenance`
--
ALTER TABLE `site_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `username_change_history`
--
ALTER TABLE `username_change_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_payment_details`
--
ALTER TABLE `wallet_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbtc_balance_sheet`
--
ALTER TABLE `wbtc_balance_sheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_history`
--
ALTER TABLE `activity_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin_wallet_details`
--
ALTER TABLE `admin_wallet_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amount_type`
--
ALTER TABLE `amount_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `commission_details`
--
ALTER TABLE `commission_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cron_history`
--
ALTER TABLE `cron_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crypto_history`
--
ALTER TABLE `crypto_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `global_bonus`
--
ALTER TABLE `global_bonus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=751;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_bonus`
--
ALTER TABLE `level_bonus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_commission`
--
ALTER TABLE `level_commission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mail_contents`
--
ALTER TABLE `mail_contents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `missed_amount`
--
ALTER TABLE `missed_amount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `monoline_structure`
--
ALTER TABLE `monoline_structure`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `package_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package_upgrade_history`
--
ALTER TABLE `package_upgrade_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `password_reset_table`
--
ALTER TABLE `password_reset_table`
  MODIFY `password_reset_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_bonus`
--
ALTER TABLE `referral_bonus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `send_token_error`
--
ALTER TABLE `send_token_error`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_maintenance`
--
ALTER TABLE `site_maintenance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `username_change_history`
--
ALTER TABLE `username_change_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wallet_payment_details`
--
ALTER TABLE `wallet_payment_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wbtc_balance_sheet`
--
ALTER TABLE `wbtc_balance_sheet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
