-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 12:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenitis_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenitis_name`, `created_at`, `updated_at`) VALUES
(4, 'mmmmm', NULL, '2024-08-24 13:50:13'),
(6, 'Selma Hunter', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_19_135823_create_property_types_table', 2),
(6, '2024_08_23_233156_create_amenities_table', 3),
(7, '2024_08_25_115226_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 36),
(8, 'App\\Models\\User', 35),
(8, 'App\\Models\\User', 38);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(18, 'type.menu', 'web', 'Type', '2024-08-31 20:37:33', '2024-08-31 20:37:33'),
(19, 'all.type', 'web', 'Type', '2024-08-31 20:37:53', '2024-08-31 20:37:53'),
(20, 'add.type', 'web', 'Type', '2024-08-31 20:38:14', '2024-08-31 20:38:14'),
(21, 'edit.type', 'web', 'Type', '2024-08-31 20:38:25', '2024-08-31 20:38:25'),
(22, 'delete.type', 'web', 'Type', '2024-08-31 20:38:35', '2024-08-31 20:38:46'),
(23, 'amenities.menu', 'web', 'Amenities', '2024-08-31 20:39:13', '2024-08-31 20:39:13'),
(24, 'all.amenities', 'web', 'Amenities', '2024-08-31 20:39:42', '2024-08-31 20:39:42'),
(25, 'add.amenities', 'web', 'Amenities', '2024-08-31 20:39:54', '2024-08-31 20:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type_name`, `type_icon`, `created_at`, `updated_at`) VALUES
(11, 'Eleanor Bray', 'Doloribus consequatu', NULL, '2024-08-24 12:56:02'),
(12, 'Jesse Em', 'Accusamus nemo qui e', NULL, '2024-08-24 12:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'SuperAdmin', 'web', '2024-08-27 11:35:10', '2024-08-27 18:07:30'),
(6, 'Admin', 'web', '2024-08-27 11:35:22', '2024-08-27 18:07:39'),
(7, 'Sales', 'web', '2024-08-27 11:38:17', '2024-08-27 18:07:48'),
(8, 'Manager', 'web', '2024-08-27 18:08:00', '2024-08-27 18:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(18, 5),
(18, 6),
(19, 5),
(19, 6),
(19, 7),
(20, 5),
(21, 5),
(21, 8),
(22, 5),
(22, 8),
(23, 5),
(23, 6),
(24, 5),
(24, 6),
(24, 7),
(25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','agent','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kufefo', 'qyhezykax', 'matf4866@gmail.com', NULL, '$2y$10$e0ZiUFC/WEcHbVqXuZUWzeHsDtSw9tzbjCYIvf9rA67GPPUaukiay', '342168931724937337.jpg', '+1 (993) 806-4785', 'Non incididunt sunt', 'admin', 'active', NULL, NULL, '2024-08-31 20:28:19'),
(2, 'Admin', 'admin', 'agent@gmail.com', NULL, '$2y$10$jgEHKhkkoJW31gYtT5N2Su8RPUSZjOrA.IFMh7OxSGwkoRcHU802.', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, '2024-08-31 20:47:49'),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$BqdQ6OpRvmYCUEcWpkzjoeVZ7dxs8exddRAxdxQS12IsKpmIyYNzu', NULL, NULL, NULL, 'user', 'active', NULL, NULL, NULL),
(4, 'Dahlia Stanton', 'ayman', 'qpollich@example.com', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/0033aa?text=non', '657-867-2905', '68305 Joanne Prairie\nBlockshire, AR 68769-7381', 'user', 'active', 'pao3q9sIzu', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(5, 'Rigoberto Flatley', NULL, 'bogisich.alisha@example.com', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/000088?text=amet', '309-314-0474', '2206 Norene Avenue Apt. 091\nNorth Aric, UT 01039-1680', 'agent', 'active', 'yZj1QI4Wqr', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(6, 'Clyde Fay PhD', NULL, 'kris90@example.org', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/002200?text=reiciendis', '+1.573.859.7208', '72160 Kathleen Centers\nNew Yasmeen, OH 41192', 'user', 'inactive', 'Hh7p3MO0Wr', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(7, 'Marta Hamill', NULL, 'tillman.paula@example.net', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/00bbbb?text=et', '+17318955874', '78095 McKenzie Plaza Apt. 848\nLeslieshire, AL 08497-0015', 'agent', 'active', 'hxPUPjAlFO', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(10, 'Christiana Feil', NULL, 'nicolas.mireille@example.com', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/00bb00?text=laboriosam', '949-922-9340', '8257 Hegmann Hill\nHirammouth, DE 86251', 'agent', 'inactive', 'flf1EIOVAL', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(11, 'Merle Wyman', NULL, 'wolff.verner@example.com', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/0011dd?text=sed', '+1 (906) 700-3081', '437 Ebert Corners Suite 036\nPort Clyde, TX 06100', 'user', 'inactive', 'GziNY3heKS', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(12, 'Juliet Konopelski', NULL, 'jackeline.schamberger@example.net', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/00bb00?text=sed', '+1-920-436-9231', '501 Virginie Street Suite 228\nPort Daishaberg, AK 84269', 'user', 'inactive', 'YeeZfZtGNh', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(13, 'Prof. Kassandra Carter MD', NULL, 'melody89@example.com', '2024-08-11 08:32:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/50x50.png/00ffdd?text=reiciendis', '586-364-9536', '539 Bosco Ports\nArnulfomouth, GA 35846-6792', 'agent', 'active', 'EiX6GBICwg', '2024-08-11 08:32:45', '2024-08-11 08:32:45'),
(35, 'vepavekej', 'hazes', 'febuqeju@mailinator.com', NULL, '$2y$10$fabkr3iwFhekWiKiHIq3U.BIGGWxD9Suf2l4ChpWyAOZU4N.Bnwfy', NULL, '+1 (645) 685-2787', 'Laudantium accusant', 'admin', 'active', NULL, '2024-08-31 10:18:15', '2024-08-31 12:49:16'),
(36, 'farygojap', 'rimemu', 'zasabyxyni@mailinator.com', NULL, '$2y$10$xju7Jnkanr.DDxeHlsrn2.HV0ezCfuq7kIi/od9YKIJ5WsZSTskVe', NULL, '+1 (719) 393-9536', 'Fuga Dolores minima', 'admin', 'active', NULL, '2024-08-31 10:18:44', '2024-08-31 20:28:48'),
(38, 'mabave', 'taqijomyx', 'mebatazun@mailinator.com', NULL, '$2y$10$oKTiU/8n2H04UI1s8E9Rw.hxPdlJnrE0RQ2xgu0YF/NAzdSRSWP6S', NULL, '+1 (396) 493-8013', 'Sit quod enim evenie', 'admin', 'active', NULL, '2024-08-31 20:51:15', '2024-08-31 20:51:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
