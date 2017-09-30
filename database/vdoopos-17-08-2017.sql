-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2017 at 12:10 PM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vdoopos`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `manager` varchar(30) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `manager`, `address`, `phone`, `active`, `create_at`, `modify_at`) VALUES
(1, 'Phnom Penh I', 'Vongkol', 'Phnom Penh, Cambodia', '086 397 627', b'1', '2017-08-17 05:05:45', '2017-08-17 05:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`, `create_at`, `modify_at`) VALUES
(1, 'Smart Phone', b'1', '2017-08-17 04:13:09', '2017-08-17 04:13:09'),
(2, 'Beer', b'1', '2017-08-17 04:13:33', '2017-08-17 04:13:33'),
(3, 'Drink', b'1', '2017-08-17 04:13:36', '2017-08-17 04:13:36'),
(4, 'Fresh Milk', b'1', '2017-08-17 04:13:40', '2017-08-17 04:13:40'),
(5, 'Soft Drink', b'1', '2017-08-17 04:13:47', '2017-08-17 04:13:47'),
(6, 'Cocacola', b'1', '2017-08-17 04:13:54', '2017-08-17 04:13:54'),
(7, 'Fan', b'1', '2017-08-17 04:14:00', '2017-08-17 04:14:00'),
(8, 'Lamp', b'1', '2017-08-17 04:14:02', '2017-08-17 04:14:02'),
(9, 'Plastic', b'1', '2017-08-17 04:14:08', '2017-08-17 04:14:08'),
(10, 'Notebook', b'1', '2017-08-17 04:14:17', '2017-08-17 04:14:17'),
(11, 'Desktop', b'1', '2017-08-17 04:14:19', '2017-08-17 04:14:19'),
(12, 'Server', b'1', '2017-08-17 04:14:20', '2017-08-17 04:14:20'),
(13, 'Mouse', b'1', '2017-08-17 04:14:22', '2017-08-17 04:14:22'),
(14, 'Keyboard', b'1', '2017-08-17 04:14:25', '2017-08-17 04:14:25'),
(15, 'Monitor', b'1', '2017-08-17 04:14:30', '2017-08-17 04:14:30'),
(16, 'Dell Monitor', b'1', '2017-08-17 04:14:34', '2017-08-17 04:14:34'),
(17, 'Mac Book', b'1', '2017-08-17 04:14:42', '2017-08-17 04:14:42'),
(18, 'Lenovo Thinkpad', b'1', '2017-08-17 04:14:51', '2017-08-17 04:14:51'),
(19, 'Workstation', b'1', '2017-08-17 04:14:57', '2017-08-17 04:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `list` tinyint(4) NOT NULL DEFAULT '0',
  `insert` tinyint(4) NOT NULL DEFAULT '0',
  `update` tinyint(4) NOT NULL DEFAULT '0',
  `delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `list`, `insert`, `update`, `delete`) VALUES
(1, 'Branch', 0, 0, 0, 0),
(2, 'Class', 0, 0, 0, 0),
(3, 'School Year', 0, 0, 0, 0),
(4, 'Room', 0, 0, 0, 0),
(5, 'Subject', 0, 0, 0, 0),
(6, 'Student', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(4, 'អ្នកបញ្ចូលទិន្នន័យ'),
(5, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `list` int(11) NOT NULL DEFAULT '0',
  `insert` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `list`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 6, 1, 1, 1, 1),
(3, 1, 5, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 3, 1, 1, 1, 1),
(6, 1, 2, 1, 1, 1, 1),
(7, 4, 2, 1, 0, 0, 0),
(8, 4, 3, 1, 0, 0, 0),
(9, 4, 4, 1, 0, 0, 0),
(10, 4, 5, 1, 0, 0, 0),
(11, 4, 6, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `khmer_name` varchar(30) DEFAULT NULL,
  `abbreviation` varchar(30) DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `khmer_name`, `abbreviation`, `active`, `create_at`, `modify_at`) VALUES
(1, 'Samll', 'តូច', 'S', b'1', '2017-08-17 05:00:14', '2017-08-17 05:00:14'),
(2, 'Medium', 'មធ្យម', 'M', b'1', '2017-08-17 05:00:25', '2017-08-17 05:00:25'),
(3, 'Large', 'ធំ', 'L', b'1', '2017-08-17 05:01:18', '2017-08-17 05:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `english_name` varchar(30) DEFAULT NULL,
  `khmer_name` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `english_name`, `khmer_name`, `quantity`, `active`, `create_at`, `modify_at`) VALUES
(1, 'Unit', 'Unit', 'ឯកតា', 1, b'1', '2017-08-17 04:40:52', '2017-08-17 04:40:52'),
(2, 'Meter', 'Meter', 'ម៉ែត្រ', 1, b'1', '2017-08-17 04:41:43', '2017-08-17 04:41:43'),
(3, 'Litter', 'Litter', 'លីត្រ', 1, b'1', '2017-08-17 04:42:00', '2017-08-17 04:42:00'),
(4, 'Box', 'Box', 'ប្រអប់', 1, b'1', '2017-08-17 04:42:14', '2017-08-17 04:42:14'),
(5, 'Case', 'Case', 'កេះ', 1, b'1', '2017-08-17 04:45:05', '2017-08-17 04:45:05'),
(6, '​​Kilo', 'Kilo', 'គីឡូ', 1, b'1', '2017-08-17 04:45:36', '2017-08-17 04:45:36'),
(7, 'Gram', 'Gram', 'ក្រាម', 1, b'1', '2017-08-17 04:45:50', '2017-08-17 04:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `language`, `role_id`) VALUES
(1, 'vongkol', 'admin@gmail.com', '$2y$10$Gsp.GBk0VSV6gCITRnG3..y1G8hVzU86HlXA9kl1CQ46vIq/EU/ey', 'a8wwUskJ3TdTubhmg4CtSghyIX6e0Ie6h1gSv7BBgbl5LUhKjkc0PdGkpdRg', '2017-05-27 22:35:52', '2017-05-27 22:35:52', 'vongkol-photo.jpg', 'en', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_branches`
--

CREATE TABLE `user_branches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_branches`
--

INSERT INTO `user_branches` (`id`, `user_id`, `branch_id`) VALUES
(9, 1, 1),
(10, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_branches`
--
ALTER TABLE `user_branches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_branches`
--
ALTER TABLE `user_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
