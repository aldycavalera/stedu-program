-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 01:06 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core.stedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbt_hasil`
--

CREATE TABLE `cbt_hasil` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `sesi_id` int(10) UNSIGNED NOT NULL,
  `soal_id` int(10) UNSIGNED NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cbt_hasil`
--

INSERT INTO `cbt_hasil` (`id`, `user_id`, `mapel_id`, `sesi_id`, `soal_id`, `jawaban`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 1, '{}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_mapel`
--

CREATE TABLE `cbt_mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KKM` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cbt_mapel`
--

INSERT INTO `cbt_mapel` (`id`, `class_key`, `kode_mapel`, `nama_mapel`, `KKM`, `created_at`, `updated_at`) VALUES
(1, 'AIPV28', '000001', 'Kimia', 76, '2018-08-24 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_sesi`
--

CREATE TABLE `cbt_sesi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `soal_id` int(20) UNSIGNED NOT NULL,
  `sesi_key` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cbt_sesi`
--

INSERT INTO `cbt_sesi` (`id`, `mapel_id`, `class_id`, `soal_id`, `sesi_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'POLA0X', 'active', '2018-08-24 20:06:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_soal`
--

CREATE TABLE `cbt_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `sesi_id` int(10) UNSIGNED NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cbt_soal`
--

INSERT INTO `cbt_soal` (`id`, `mapel_id`, `sesi_id`, `soal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '{\r\n \"title\": \"Contoh soal\",\r\n \"pages\": [\r\n  {\r\n   \"name\": \"page1\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"radiogroup\",\r\n     \"name\": \"contohnya\",\r\n     \"title\": \"Contohnya :\",\r\n     \"correctAnswer\": \"item1\",\r\n     \"choices\": [\r\n      \"Iya\",\r\n      \"Tidak\"\r\n     ],\r\n     \"choicesOrder\": \"random\"\r\n    }\r\n   ]\r\n  },\r\n  {\r\n   \"name\": \"page2\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"radiogroup\",\r\n     \"name\": \"question2\",\r\n     \"title\": \"Boleh makan ?\",\r\n     \"correctAnswer\": \"item3\",\r\n     \"choices\": [\r\n      {\r\n       \"value\": \"item1\",\r\n       \"text\": \"Boleh\"\r\n      },\r\n      {\r\n       \"value\": \"item2\",\r\n       \"text\": \"Tidak\"\r\n      },\r\n      {\r\n       \"value\": \"item3\",\r\n       \"text\": \"Terserah\"\r\n      }\r\n     ]\r\n    }\r\n   ]\r\n  },\r\n  {\r\n   \"name\": \"page3\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"radiogroup\",\r\n     \"name\": \"question3\",\r\n     \"title\": \"Suka ngoding ?\",\r\n     \"correctAnswer\": \"item3\",\r\n     \"choices\": [\r\n      {\r\n       \"value\": \"item1\",\r\n       \"text\": \"Tidak\"\r\n      },\r\n      {\r\n       \"value\": \"item2\",\r\n       \"text\": \"Ngga\"\r\n      },\r\n      {\r\n       \"value\": \"item3\",\r\n       \"text\": \"Lah ?\"\r\n      }\r\n     ]\r\n    }\r\n   ]\r\n  },\r\n  {\r\n   \"name\": \"page4\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"radiogroup\",\r\n     \"name\": \"question4\",\r\n     \"title\": \"Oke\",\r\n     \"correctAnswer\": \"item1\",\r\n     \"choices\": [\r\n      \"item1\",\r\n      \"item2\",\r\n      \"item3\"\r\n     ]\r\n    }\r\n   ]\r\n  },\r\n  {\r\n   \"name\": \"page5\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"radiogroup\",\r\n     \"name\": \"question5\",\r\n     \"title\": \"Ngantuk gak ?\",\r\n     \"choices\": [\r\n      {\r\n       \"value\": \"item1\",\r\n       \"text\": \"Ngga\"\r\n      },\r\n      {\r\n       \"value\": \"item2\",\r\n       \"text\": \"Iya\"\r\n      },\r\n      {\r\n       \"value\": \"item3\",\r\n       \"text\": \"Biasa aja\"\r\n      }\r\n     ]\r\n    }\r\n   ]\r\n  },\r\n  {\r\n   \"name\": \"page6\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"checkbox\",\r\n     \"name\": \"question6\",\r\n     \"choices\": [\r\n      \"item1\",\r\n      \"item2\",\r\n      \"item3\"\r\n     ]\r\n    }\r\n   ]\r\n  },\r\n  {\r\n   \"name\": \"page7\",\r\n   \"elements\": [\r\n    {\r\n     \"type\": \"dropdown\",\r\n     \"name\": \"question7\",\r\n     \"choices\": [\r\n      \"item1\",\r\n      \"item2\",\r\n      \"item3\"\r\n     ]\r\n    }\r\n   ]\r\n  }\r\n ],\r\n \"questionStartIndex\": \"1\",\r\n \"maxTimeToFinish\": 15,\r\n \"showTimerPanel\": \"top\",\r\n \"showTimerPanelMode\": \"survey\"\r\n}', NULL, '2018-08-28 22:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_key`, `value`, `description`, `status`) VALUES
(1, 'YuqZs0', 'XII RPL 1', 'a:1:{s:11:\"description\";s:9:\"XII RPL 1\";}', 'active'),
(2, 'HwzSSd', 'XII RPL 2', 'a:1:{s:11:\"description\";s:9:\"XII RPL 2\";}', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `class_events`
--

CREATE TABLE `class_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `events_for` int(10) UNSIGNED NOT NULL,
  `from_user` int(10) UNSIGNED NOT NULL,
  `events_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
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
(231, '2018_07_29_032830_create_user_class_table', 1),
(246, '2014_10_12_100000_create_password_resets_table', 2),
(247, '2018_07_28_154705_create_classes', 2),
(248, '2018_08_07_032429_create_users_table', 2),
(249, '2018_08_07_032450_create_user_class_table', 2),
(250, '2018_08_07_032745_create_user_data_table', 2),
(251, '2018_08_09_102242_create_class_events_table', 3),
(253, '2018_08_25_141807_create_table_programs', 4),
(258, '2018_08_25_142849_create_programs_table', 5),
(259, '2018_08_25_142911_create_program_events_table', 5),
(265, '2018_08_26_111955_create_cbt_mapel_table', 6),
(266, '2018_08_26_140654_create_cbt_sesi_tables', 7),
(268, '2018_08_26_140738_create_cbt_soal_table', 8),
(270, '2018_08_29_095159_create_cbt_hasil_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aldy04.ac@outlook.com', '$2y$10$nakmG56KnuLleIETsEaUAOpjE3.ayKHFoFcjcPfvpk2vX4HbU56OW', '2018-08-24 10:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxonomy_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `taxonomy_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ulangan Harian Berbasis Komputer', 'Ulangan Harian Berbasis Komputer (UHBK) yang bisa dijadikan sebagai Simulasi UNBK', 'cbt', 'active', '2018-08-24 20:06:09', NULL),
(2, 'OKETIN - Jajan Dikantin Tanpa Perlu Ke Kantin!', 'Bayar murah dan cepat, ongkir disesuaikan dengan permintaan pengirim', 'oketin', 'soon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_events`
--

CREATE TABLE `program_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `accessKey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxonomy_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userClass` int(10) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `userClass`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aldycavalera', 'Aldy Cavalera', 1, 1, 'aldy04.ac@outlook.com', '$2y$10$2HOOFNRb6jgWcIxVGvDr/OPvbXYj2Mzzzvx6J8SxurwXpY5zQFn2K', 'bUxELwgWG0sgcgWteepQNfjTzjdtmxH3m0YwmSbGGQUpaFQlzsCWkVZK33A1', '2018-08-07 06:29:07', '2018-08-07 06:29:07'),
(2, 'titaamel', 'Tita Amelia', 2, 2, 'titaamel@gmail.com', '$2y$10$4cg5kIilmsre.1OFR6Ltn.FOAnJ6.VLvI/g7aZNAKPIUaPPPFdYsi', '8vN5s50hQ7yCuQLyLJR0H5bXToDuQ1g2t2f0Q4siqSD0PqFiD1qOdhcrELUW', '2018-08-08 06:47:08', '2018-08-08 06:47:08'),
(3, 'ahmadrs99', 'Ahmad Ruhiyat S', 1, 1, 'ahmadrs.141200@gmail.com', '$2y$10$P63LQmXOB2Y099YRWbirV.yn1IT6IwezTLKSToOQtuRUZYMDXRy3y', NULL, '2018-08-28 20:07:53', '2018-08-28 20:07:53'),
(5, 'Nurmayanti22', 'Nurmayanti', 1, 1, 'enomaya22@gmail.com', '$2y$10$1Dm/1oh3uJRZRQQ9Vnj7PuSUtJcF7RsW4ZWCh/ltpyjQu/vO1TB1O', NULL, '2018-08-28 20:27:42', '2018-08-28 20:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_class`
--

CREATE TABLE `user_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_class`
--

INSERT INTO `user_class` (`id`, `user_id`, `class_id`, `status`) VALUES
(1, 1, 1, '1'),
(2, 2, 2, '1'),
(3, 3, 1, '1'),
(5, 5, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `currentLoc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `currentLoc`, `created_at`, `updated_at`) VALUES
(4, 2, NULL, '2018-08-24', '2018-08-24 09:35:05'),
(21, 1, '-6.2087634,106.84559899999999', '2018-08-29', '2018-08-28 20:04:19'),
(23, 3, '-6.8342693,107.9997492', '2018-08-29', '2018-08-28 20:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbt_hasil`
--
ALTER TABLE `cbt_hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cbt_hasil_user_id_foreign` (`user_id`),
  ADD KEY `cbt_hasil_sesi_id_foreign` (`sesi_id`),
  ADD KEY `cbt_hasil_mapel_id_foreign` (`mapel_id`),
  ADD KEY `cbt_hasil_soal_id_foreign` (`soal_id`);

--
-- Indexes for table `cbt_mapel`
--
ALTER TABLE `cbt_mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cbt_mapel_kode_mapel_unique` (`kode_mapel`);

--
-- Indexes for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cbt_sesi_sesi_key_unique` (`sesi_key`),
  ADD KEY `cbt_sesi_mapel_id_foreign` (`mapel_id`),
  ADD KEY `cbt_sesi_class_id_foreign` (`class_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cbt_soal_mapel_id_foreign` (`mapel_id`),
  ADD KEY `cbt_soal_sesi_id_foreign` (`sesi_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_events`
--
ALTER TABLE `class_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_events_events_for_foreign` (`events_for`),
  ADD KEY `class_events_from_user_foreign` (`from_user`);

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_events`
--
ALTER TABLE `program_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_events_program_id_foreign` (`program_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_userclass_foreign` (`userClass`);

--
-- Indexes for table `user_class`
--
ALTER TABLE `user_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_class_user_id_foreign` (`user_id`),
  ADD KEY `user_class_class_id_foreign` (`class_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_data_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbt_hasil`
--
ALTER TABLE `cbt_hasil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cbt_mapel`
--
ALTER TABLE `cbt_mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_events`
--
ALTER TABLE `class_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program_events`
--
ALTER TABLE `program_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_class`
--
ALTER TABLE `user_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cbt_hasil`
--
ALTER TABLE `cbt_hasil`
  ADD CONSTRAINT `cbt_hasil_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `cbt_mapel` (`id`),
  ADD CONSTRAINT `cbt_hasil_sesi_id_foreign` FOREIGN KEY (`sesi_id`) REFERENCES `cbt_sesi` (`id`),
  ADD CONSTRAINT `cbt_hasil_soal_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `cbt_soal` (`id`),
  ADD CONSTRAINT `cbt_hasil_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  ADD CONSTRAINT `cbt_sesi_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `cbt_sesi_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `cbt_mapel` (`id`),
  ADD CONSTRAINT `cbt_sesi_soal_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `cbt_soal` (`id`);

--
-- Constraints for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD CONSTRAINT `cbt_soal_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `cbt_mapel` (`id`),
  ADD CONSTRAINT `cbt_soal_sesi_id_foreign` FOREIGN KEY (`sesi_id`) REFERENCES `cbt_sesi` (`id`);

--
-- Constraints for table `class_events`
--
ALTER TABLE `class_events`
  ADD CONSTRAINT `class_events_events_for_foreign` FOREIGN KEY (`events_for`) REFERENCES `user_class` (`id`),
  ADD CONSTRAINT `class_events_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `program_events`
--
ALTER TABLE `program_events`
  ADD CONSTRAINT `program_events_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_userclass_foreign` FOREIGN KEY (`userClass`) REFERENCES `classes` (`id`);

--
-- Constraints for table `user_class`
--
ALTER TABLE `user_class`
  ADD CONSTRAINT `user_class_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `user_class_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
