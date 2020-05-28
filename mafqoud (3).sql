-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 10:19 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mafqoud`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_num` int(11) NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'التصنيف الاول', NULL, 1, '2020-03-19 09:11:13', '2020-03-19 09:11:13'),
(2, 'kjkjkk', 'Desert.jpg', 1, '2020-03-30 10:03:20', '2020-03-30 10:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(62, '2014_10_12_000000_create_users_table', 1),
(63, '2014_10_12_100000_create_password_resets_table', 1),
(64, '2020_03_03_105502_laratrust_setup_tables', 1),
(65, '2020_03_06_155009_create_pages_table', 1),
(66, '2020_03_08_183946_add_type_crud_to_users_table', 1),
(67, '2020_03_08_191604_add_route_to_users_table', 1),
(68, '2020_03_08_191811_add_have_branch_to_users_table', 1),
(69, '2020_03_18_095258_create_categories_table', 2),
(70, '2020_03_24_100640_create_countries_table', 3),
(71, '2020_03_26_084306_create_app_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modeltable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_crud` int(11) DEFAULT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_branch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `from_id`, `url`, `modeltable`, `icon`, `img`, `created_at`, `updated_at`, `type_crud`, `route`, `have_branch`) VALUES
(1, 'المستخدمين', 0, '#', NULL, NULL, NULL, '2020-03-08 17:56:31', '2020-03-08 17:56:31', 2, '#', 1),
(2, 'اضافه  مستخدم', 1, 'admin/users/create', NULL, NULL, NULL, '2020-03-08 17:56:59', '2020-03-08 17:56:59', 1, 'users', 2),
(3, 'صلاحيات المستخدمين', 1, 'admin/users/show', NULL, NULL, NULL, '2020-03-08 17:57:28', '2020-03-08 17:57:28', 2, 'users', 2),
(4, 'ادارات النظام', 0, '#', NULL, NULL, NULL, '2020-03-08 17:58:01', '2020-03-08 17:58:01', 2, '#', 1),
(5, 'اضافه صفحه', 4, 'admin/pages/create', NULL, NULL, NULL, '2020-03-08 17:58:30', '2020-03-08 17:58:30', 1, 'pages', 2),
(6, 'الاعدادات', 0, '#', NULL, NULL, NULL, '2020-03-19 09:44:11', '2020-03-19 09:44:11', NULL, '#', 1),
(7, 'اضافه تصنيف', 6, 'admin/categories/create', NULL, NULL, NULL, '2020-03-19 09:45:35', '2020-03-19 09:45:35', 1, 'categories', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create_users', 'Create Users', 'Create Users', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(2, 'read_users', 'Read Users', 'Read Users', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(3, 'update_users', 'Update Users', 'Update Users', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(4, 'delete_users', 'Delete Users', 'Delete Users', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(5, 'print_users', 'Print Users', 'Print Users', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(6, 'create_pages', 'Create Pages', 'Create Pages', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(7, 'read_pages', 'Read Pages', 'Read Pages', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(8, 'update_pages', 'Update Pages', 'Update Pages', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(9, 'delete_pages', 'Delete Pages', 'Delete Pages', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(10, 'create_main_data', 'Create Main_data', 'Create Main_data', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(11, 'read_main_data', 'Read Main_data', 'Read Main_data', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(12, 'update_main_data', 'Update Main_data', 'Update Main_data', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(13, 'delete_main_data', 'Delete Main_data', 'Delete Main_data', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(14, 'print_printusers', 'Print Printusers', 'Print Printusers', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(15, 'create_categories', 'Create Categories', 'Create Categories', '2020-03-19 08:41:30', '2020-03-19 08:41:30'),
(16, 'read_categories', 'Read Categories', 'Read Categories', '2020-03-19 08:41:30', '2020-03-19 08:41:30'),
(17, 'update_categories', 'Update Categories', 'Update Categories', '2020-03-19 08:41:30', '2020-03-19 08:41:30'),
(18, 'delete_categories', 'Delete Categories', 'Delete Categories', '2020-03-19 08:41:30', '2020-03-19 08:41:30'),
(19, 'print_categories', 'Print Categories', 'Print Categories', '2020-03-19 08:41:30', '2020-03-19 08:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(3, 5, 'App\\User'),
(1, 6, 'App\\User'),
(3, 6, 'App\\User'),
(4, 6, 'App\\User'),
(1, 9, 'App\\User'),
(3, 9, 'App\\User'),
(4, 9, 'App\\User'),
(1, 13, 'App\\User'),
(2, 13, 'App\\User'),
(3, 13, 'App\\User'),
(4, 13, 'App\\User'),
(1, 14, 'App\\User'),
(2, 14, 'App\\User'),
(3, 14, 'App\\User'),
(4, 14, 'App\\User'),
(6, 14, 'App\\User'),
(7, 14, 'App\\User'),
(8, 14, 'App\\User'),
(9, 14, 'App\\User'),
(15, 14, 'App\\User'),
(16, 14, 'App\\User'),
(17, 14, 'App\\User'),
(18, 14, 'App\\User'),
(1, 15, 'App\\User'),
(1, 17, 'App\\User'),
(2, 17, 'App\\User'),
(3, 17, 'App\\User'),
(4, 17, 'App\\User'),
(6, 17, 'App\\User'),
(7, 17, 'App\\User'),
(8, 17, 'App\\User'),
(9, 17, 'App\\User'),
(15, 17, 'App\\User'),
(16, 17, 'App\\User'),
(17, 17, 'App\\User'),
(18, 17, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2020-03-19 08:41:29', '2020-03-19 08:41:29'),
(2, 'admin', 'Admin', 'Admin', '2020-03-19 08:41:31', '2020-03-19 08:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 3, 'App\\User'),
(2, 5, 'App\\User'),
(2, 6, 'App\\User'),
(2, 8, 'App\\User'),
(2, 9, 'App\\User'),
(2, 11, 'App\\User'),
(2, 12, 'App\\User'),
(2, 13, 'App\\User'),
(2, 14, 'App\\User'),
(2, 15, 'App\\User'),
(2, 16, 'App\\User'),
(2, 17, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', 'ahmed@yahoo.com', NULL, '$2y$10$CxwMySMohGU4/QYLF6J2NunuC22yhuZhARfQse8UpGMiF2Tymealm', NULL, '2020-03-19 08:41:31', '2020-03-19 08:41:31'),
(3, 'ahmed', 'admin', NULL, '$2y$10$ZRPanA4gVAI/cofCaG0S2.QUFCYczCc6G8rSXtoC9kXqhjNvONfi2', 'eTFFcng9F7NixbO61FYCyADhe4FUtAuXtHgyTfAHsi12kD7XkjToMCDojnxP', '2020-03-19 08:52:56', '2020-03-19 08:52:56'),
(5, 'ahmed', '2admin', NULL, '$2y$10$5eJNtRQbO3rStQ8ZYd7lt.Y3VjFbcBb9VBFATbya6p.eeL1DRrway', NULL, '2020-03-19 08:56:30', '2020-03-19 08:56:30'),
(6, '343', '434admin', NULL, '$2y$10$aE2ss.OyF9gv17pSJbSOZurr.Buj3IAXScNNcRCae5CQLNMpNMTcS', NULL, '2020-03-19 08:57:44', '2020-03-19 08:57:44'),
(8, 'grgrg', '3admin', NULL, '$2y$10$pzj651tj2AVUINTBtREkauLPAPmYdBf14B89ca7mGvfChe7yCXYWK', NULL, '2020-03-19 08:58:52', '2020-03-19 08:58:52'),
(9, 'rgrgrg', 'grgadmin', NULL, '$2y$10$zUaoMNTxiDLGkfvAYpx4eOzO4RbLJ.wFD.4e1ZWG3.CGzuw4vvXza', NULL, '2020-03-19 09:00:01', '2020-03-19 09:00:01'),
(11, 'effefe', 'efeadmin', NULL, '$2y$10$o2XAfY9gjrp6AATgwzj7EOtlOPfUA7M6JF4YHP2VsDEHpyrcGu256', NULL, '2020-03-19 09:01:15', '2020-03-19 09:01:15'),
(12, 'sfgv', 'bfbadmin', NULL, '$2y$10$iW2bktCQUp.5TsdisUTYFO9VO.bLcLqyaEgqmh0c/MgzRQUMtY7Ei', NULL, '2020-03-19 09:03:20', '2020-03-19 09:03:20'),
(13, '212', '1admin', NULL, '$2y$10$zotSFyC2ISEOsxGM4W/4sOCWu6psmBQ7fPqOoO7mzdMnxk9e9kD.O', NULL, '2020-03-19 09:04:58', '2020-03-19 09:04:58'),
(14, 'hthtdh', '10admin', NULL, '$2y$10$6PdHQhlXwKvGSQGPjONdAu4qGdZtaKw4sPnyM/m9FwZMH11cbZ8Je', 'C1XJWpgpLmy29Jorr64z1khmAGUILastpOgqCK9FJ4pGKLZ6EGL1Nsc6WqMj', '2020-03-19 09:55:35', '2020-03-19 09:55:35'),
(15, 'ahmed', 'ahmed', NULL, '$2y$10$wJxVG/dsdZR7oE9RieQ06O9Sil9Burx1zMRgoMBoR7u6rpnJl1zcC', 'C72R2D4jFazUOGbiZuKWxXxWvtMKLvKTYuFTiUnIBfHBBZHg6wFDMXvCeRU8', '2020-03-19 10:55:26', '2020-03-19 10:55:26'),
(16, 'mohamed', 'mohamed', NULL, '$2y$10$p9BEEbz7ZyXbUQHkoW1ShOuUnYCyQkDA1Ibvdw1ncEFea5Q1.2/v2', NULL, '2020-03-19 10:56:40', '2020-03-19 10:56:40'),
(17, 'alatheer', 'alatheer', NULL, '$2y$10$3A3wZbNTlkzIku7DTllmMujHHERYxdR7WaLmqvKCWI36y/jjXYOQ6', NULL, '2020-03-24 09:26:04', '2020-03-24 09:26:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `app_users_api_token_unique` (`api_token`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

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
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
