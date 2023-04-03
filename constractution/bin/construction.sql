-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2023 at 04:50 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_users`
--

CREATE TABLE `assigned_users` (
  `id` int NOT NULL,
  `owner_user_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assigned_users`
--

INSERT INTO `assigned_users` (`id`, `owner_user_id`, `project_id`, `user_id`, `created_date`) VALUES
(11, 14, 7, 10, '2023-03-29 18:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_credit`
--

CREATE TABLE `contractor_credit` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `total_credit` int NOT NULL,
  `credited_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contractor_credit`
--

INSERT INTO `contractor_credit` (`id`, `user_id`, `total_credit`, `credited_date`) VALUES
(1, 6, 160, '2023-03-24 14:39:41'),
(2, 8, 250, '2023-03-27 16:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `owner_services`
--

CREATE TABLE `owner_services` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner_services`
--

INSERT INTO `owner_services` (`id`, `project_id`, `user_id`, `service_id`) VALUES
(1, 1, NULL, 1),
(2, 1, NULL, 2),
(3, 1, NULL, 3),
(4, 1, NULL, 4),
(5, 1, NULL, 5),
(6, 1, NULL, 6),
(7, 1, NULL, 7),
(8, 1, NULL, 8),
(9, 1, NULL, 9),
(10, 1, NULL, 10),
(11, 1, NULL, 11),
(12, 1, NULL, 12),
(13, 1, NULL, 13),
(14, 1, NULL, 14),
(15, 1, NULL, 15),
(16, 1, NULL, 16),
(17, 1, NULL, 17),
(49, 4, NULL, 15),
(56, 3, NULL, 7),
(57, 3, NULL, 8),
(58, 3, NULL, 9),
(59, 3, NULL, 10),
(60, 3, NULL, 11),
(61, 3, NULL, 12),
(62, 3, NULL, 13),
(63, 3, NULL, 14),
(64, 3, NULL, 15),
(65, 3, NULL, 16),
(1137, 7, NULL, 1),
(1138, 7, NULL, 2),
(1139, 7, NULL, 3),
(1140, 7, NULL, 7),
(1141, 7, NULL, 8),
(1161, 2, NULL, 1),
(1162, 2, NULL, 2),
(1163, 2, NULL, 7),
(1164, 2, NULL, 8),
(1165, 2, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `contractor` int DEFAULT NULL,
  `project_address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `project_address2` varchar(250) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `property_type` enum('1','2') NOT NULL,
  `pincode` int NOT NULL,
  `assigned_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 is unassigned , 1 is assigned, 2is Delete',
  `accept_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 is unaccepted , 1 is accepted,2 is delete',
  `delete_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is delete,1 is recover',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_name`, `contractor`, `project_address1`, `project_address2`, `state`, `city`, `property_type`, `pincode`, `assigned_status`, `accept_status`, `delete_status`, `created_date`) VALUES
(1, 2, 'Goverment Hospital', 2, 'Abhaypur', '', 'Punjab', 'Zirakpur', '1', 120320, '0', '1', '1', '2023-03-21 11:02:51'),
(2, 2, 'PMKVY', 2, 'Peer Machhula', '', 'Punjab', 'Zirakpur', '2', 123456, '0', '1', '1', '2023-03-21 11:03:50'),
(3, 2, 'Metro Station', 2, 'CHN', '', 'Punjab', 'Panchkula', '1', 123012, '0', '1', '1', '2023-03-21 11:12:16'),
(4, 3, 'Bricks Chimney', 3, 'Ramgarh', '', 'Haryana', 'Panchkula', '1', 145632, '0', '1', '1', '2023-03-21 13:22:06'),
(7, 14, 'jyoti\'s project', 3, 'patna', '', 'bihar', 'patna', '1', 123456, '1', '1', '1', '2023-03-23 09:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `service` varchar(250) NOT NULL,
  `service_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `service_status`, `created`) VALUES
(1, 'Plants', '1', '2023-03-20 11:52:42'),
(2, 'HAVC', '1', '2023-03-20 11:52:57'),
(3, 'Siding', '1', '2023-03-20 11:53:13'),
(4, 'Roofing', '1', '2023-03-20 11:54:43'),
(5, 'Rough in Plumbing', '1', '2023-03-20 11:55:09'),
(6, 'Exterior Paint', '1', '2023-03-20 11:55:29'),
(7, 'Drywall', '1', '2023-03-20 11:55:40'),
(8, 'Security System', '1', '2023-03-20 11:56:02'),
(9, ' Garage Doors & Openers', '1', '2023-03-20 11:56:25'),
(10, 'Temp Toilet', '1', '2023-03-20 11:57:51'),
(11, 'Temp Utilities', '1', '2023-03-20 11:58:17'),
(12, 'Sewer/Septic', '0', '2023-03-20 11:58:37'),
(13, 'Interior Paint', '0', '2023-03-20 11:59:06'),
(14, 'Insurance1', '1', '2023-03-20 11:59:24'),
(15, 'Insurance113', '1', '2023-03-20 11:59:39'),
(19, 'edwfwerwerw', '0', '2023-03-22 03:54:10'),
(20, 'ghdfdajgjdf', '0', '2023-03-22 04:12:57'),
(21, 'ghdfdajgjdf1', '1', '2023-03-22 06:19:34'),
(22, 'Abcd', '1', '2023-03-22 11:58:35'),
(23, 'Abcd1', '1', '2023-03-24 08:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `set_credit`
--

CREATE TABLE `set_credit` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `credit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `set_credit`
--

INSERT INTO `set_credit` (`id`, `user_id`, `credit`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `own_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is disable, 1 is enable',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1' COMMENT '0 is inactive ,1 is active',
  `delete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1' COMMENT '0 is delete,1 is recover',
  `user_type` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 is admin , 1 is owner,2gc,3sc',
  `token` varchar(255) DEFAULT NULL,
  `approve_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 is unapporove,1 is approve',
  `complete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `own_status`, `status`, `delete_status`, `user_type`, `token`, `approve_status`, `complete_status`, `created_at`, `modified_at`) VALUES
(1, 'yadavblu381@gmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '0', NULL, '1', '1', '2023-03-09 09:21:56', '2023-03-24 09:01:29'),
(2, 'deepu999@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '1', NULL, '1', '1', '2023-03-09 09:24:24', '2023-03-24 09:01:29'),
(3, 'manu@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '1', NULL, '1', '1', '2023-03-09 09:26:06', '2023-03-24 09:01:29'),
(4, 'ankush123@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '1', NULL, '1', '0', '2023-03-09 09:26:51', '2023-03-24 09:01:29'),
(5, 'abhishek123@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '2', NULL, '1', '1', '2023-03-09 09:27:36', '2023-03-28 11:09:05'),
(6, 'harsh123@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '2', NULL, '1', '1', '2023-03-09 09:28:21', '2023-03-24 09:01:29'),
(7, 'prabhat123@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '2', NULL, '1', '1', '2023-03-09 09:29:11', '2023-03-24 09:01:29'),
(8, 'kajal123@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '3', NULL, '1', '1', '2023-03-09 15:50:28', '2023-03-24 09:01:29'),
(9, 'manoj@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '3', NULL, '1', '1', '2023-03-10 12:31:05', '2023-03-24 09:01:29'),
(10, 'vikas@yopmail.com', '$2y$10$i8gTV8L/Zxuz7DEhsogLXOv/WrmfQ9eaOE4LI2gX9Qv5CG7MvHpT6', '1', '1', '1', '3', NULL, '1', '1', '2023-03-13 14:57:39', '2023-03-24 09:01:29'),
(11, 'hulk@yopmail.com', '$2y$10$YZ0NZLnL8i2gHnydkeoYc.pqZIrMWzUZ8DMi0lSKMqU2wV5MeFzjy', '1', '1', '1', '1', NULL, '1', '1', '2023-03-21 15:04:34', '2023-03-24 09:01:29'),
(12, 'bean@yopmail.com', '$2y$10$207MXAm4/u1YrPsbN3g9E.gb3QABqbuZwMMPAQzqq/QkTPJeqGfgK', '1', '1', '1', '2', NULL, '1', '0', '2023-03-21 15:07:20', '2023-03-24 09:01:29'),
(13, 'rohit@yopmail.com', '$2y$10$3ieFRTwDK6IaLtItFmjgs.7GoJVtWfJm2rqOuwQkydyNs4p3Ex5H6', '1', '1', '1', '1', NULL, '1', '0', '2023-03-21 15:12:46', '2023-03-24 09:01:29'),
(14, 'jyoti123@yopmail.com', '$2y$10$UcAyguJXJKCgOvgjI71DzOuwExuUatYkMZgeSYw4ZEGdEmx/AQF0O', '1', '1', '1', '1', NULL, '1', '1', '2023-03-23 09:21:27', '2023-03-24 09:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pincode` int DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address1`, `address2`, `state`, `city`, `pincode`, `company_name`) VALUES
(1, 1, 'Bablu', 'Chaudhary', '9559218299', 'Gopalganj', '', 'Bihar', 'Mirganj', 841438, NULL),
(2, 2, 'Deepu', 'Gour', '7341181718', 'Abheypur', '#316 Abheypur ', 'Haryana', 'Panchkula', 123456, NULL),
(3, 3, 'Manu', 'Yadav', '0123456789', 'DeraBasi', 'jttyejytjytjtrj', 'Haryana', 'Panchkula', 123456, NULL),
(4, 4, 'Ankush', 'Singh', '7988897897', '', 'feredgdgregergre', 'Haryana', 'Panchkula', 123456, 'Teq Mavens'),
(5, 5, 'Abhishek', 'Kumar', '1234567890', 'Yamuna Nagar', '', 'Haryana', 'Yamuna', 123456, 'ACLM'),
(6, 6, 'Harsh', 'Kumar', '9876543210', 'etyeyteytyty', '', 'Haryana', 'Panchkula', 123456, 'HCL'),
(7, 7, 'Prabhat', 'Sharma', '8754659878', 'Kurushetra', '', 'Haryana', 'Kurushetra', 120420, 'PCLM'),
(8, 8, 'Kajal', 'Tyagi', '8844552142', 'Yamuna Nagar', '', 'Haryana', 'Panchkula', 123456, 'KACL'),
(9, 9, 'Manoj', 'Kunwar', '9876543210', 'Jiradei', '', 'Bihar', 'Siwan', 123456, 'MCLM'),
(10, 10, 'Vikash', 'Sharma', '8087965541', 'fgrtwgtrehet', '', 'Bihar', 'Patna', 821452, 'VKL'),
(11, 11, 'Hulk1', 'Kumar', '1232434343', 'csadfgergrtv', 'dsafdsfdsafds', 'sgrwetgrgtrhgtr', 'wgrtwghtr', 123456, NULL),
(12, 12, 'Mr', 'Bean', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, 'rohit', 'sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, 'Jyoti', 'singh', '3435345446', '455fgsbhfdg', '', 'sghgtfhhhhhhhfg', 'shggghgshg', 123455, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `service_id` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `service_id`, `created_date`) VALUES
(66, 5, 16, '2023-03-21 12:37:32'),
(67, 5, 17, '2023-03-21 12:37:32'),
(113, 8, 1, '2023-03-21 15:52:53'),
(114, 8, 2, '2023-03-21 15:52:53'),
(115, 8, 3, '2023-03-21 15:52:53'),
(116, 8, 4, '2023-03-21 15:52:53'),
(117, 8, 5, '2023-03-21 15:52:53'),
(118, 8, 6, '2023-03-21 15:52:53'),
(119, 8, 7, '2023-03-21 15:52:53'),
(120, 8, 8, '2023-03-21 15:52:53'),
(121, 8, 9, '2023-03-21 15:52:53'),
(122, 8, 10, '2023-03-21 15:52:53'),
(123, 8, 11, '2023-03-21 15:52:53'),
(124, 8, 12, '2023-03-21 15:52:53'),
(125, 8, 13, '2023-03-21 15:52:53'),
(126, 8, 14, '2023-03-21 15:52:53'),
(127, 8, 15, '2023-03-21 15:52:53'),
(128, 8, 16, '2023-03-21 15:52:53'),
(129, 8, 17, '2023-03-21 15:52:53'),
(143, 9, 16, '2023-03-21 15:53:09'),
(144, 9, 17, '2023-03-21 15:53:09'),
(146, 6, 1, '2023-03-21 16:42:08'),
(160, 5, 2, '2023-03-22 17:01:22'),
(161, 5, 3, '2023-03-22 17:01:22'),
(162, 5, 4, '2023-03-22 17:01:22'),
(163, 5, 9, '2023-03-22 17:01:22'),
(164, 5, 10, '2023-03-22 17:01:22'),
(165, 9, 1, '2023-03-22 17:05:23'),
(166, 9, 2, '2023-03-22 17:05:23'),
(167, 9, 9, '2023-03-22 17:05:23'),
(168, 9, 10, '2023-03-22 17:05:23'),
(205, 7, 1, '2023-03-22 17:06:39'),
(206, 7, 2, '2023-03-22 17:06:39'),
(207, 7, 3, '2023-03-22 17:06:39'),
(208, 7, 4, '2023-03-22 17:06:39'),
(209, 7, 5, '2023-03-22 17:06:39'),
(210, 7, 6, '2023-03-22 17:06:39'),
(211, 7, 7, '2023-03-22 17:06:39'),
(212, 7, 8, '2023-03-22 17:06:39'),
(213, 7, 9, '2023-03-22 17:06:39'),
(214, 7, 10, '2023-03-22 17:06:39'),
(215, 7, 11, '2023-03-22 17:06:39'),
(216, 7, 12, '2023-03-22 17:06:39'),
(217, 7, 13, '2023-03-22 17:06:39'),
(218, 7, 14, '2023-03-22 17:06:39'),
(219, 7, 15, '2023-03-22 17:06:39'),
(220, 7, 19, '2023-03-22 17:06:39'),
(221, 7, 20, '2023-03-22 17:06:39'),
(222, 7, 21, '2023-03-22 17:06:39'),
(237, 10, 1, '2023-03-22 17:17:08'),
(238, 10, 2, '2023-03-22 17:17:08'),
(239, 10, 3, '2023-03-22 17:17:08'),
(240, 10, 4, '2023-03-22 17:17:08'),
(241, 10, 5, '2023-03-22 17:17:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_users`
--
ALTER TABLE `assigned_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_credit`
--
ALTER TABLE `contractor_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_services`
--
ALTER TABLE `owner_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_credit`
--
ALTER TABLE `set_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_users`
--
ALTER TABLE `assigned_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contractor_credit`
--
ALTER TABLE `contractor_credit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owner_services`
--
ALTER TABLE `owner_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1166;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `set_credit`
--
ALTER TABLE `set_credit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
