-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 07:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurban`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_hewans`
--

CREATE TABLE `detail_hewans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hewan` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_hewans`
--

INSERT INTO `detail_hewans` (`id`, `id_hewan`, `jenis`, `berat`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'limosin', 350, 90000000, '2020-08-28 17:04:16', '2020-08-28 17:04:16'),
(2, 2, 'garut', 70, 3500000, '2020-08-28 17:04:37', '2020-08-28 17:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `hewans`
--

CREATE TABLE `hewans` (
  `id` int(10) UNSIGNED NOT NULL,
  `hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hewans`
--

INSERT INTO `hewans` (`id`, `hewan`, `created_at`, `updated_at`) VALUES
(1, 'Sapi', NULL, NULL),
(2, 'Domba', NULL, NULL);

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
(3, '2020_08_20_145802_create_hewans_table', 1),
(4, '2020_08_20_145833_create_detail_hewans_table', 1),
(5, '2020_08_20_145849_create_nasabahs_table', 1),
(6, '2020_08_20_145906_create_tabungans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabahs`
--

CREATE TABLE `nasabahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_detail_hewan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nasabahs`
--

INSERT INTO `nasabahs` (`id`, `id_detail_hewan`, `nama`, `no_tlp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Eka Arlan Febriyanto', '08888888888', 'Komplek Permata biru blok AB no 86', '2020-08-28 17:04:57', '2020-09-17 16:20:36'),
(2, 2, 'Arlan', '0888888888', 'Kab. Bandung', '2020-08-28 17:05:43', '2020-08-28 17:05:43'),
(3, 2, 'Eka', '080080080', 'permata', '2020-08-28 20:28:54', '2020-08-28 20:28:54');

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
-- Table structure for table `tabungans`
--

CREATE TABLE `tabungans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nasabah` int(10) UNSIGNED NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabungans`
--

INSERT INTO `tabungans` (`id`, `id_nasabah`, `nominal`, `created_at`, `updated_at`) VALUES
(7, 1, 1500000, '2020-08-28 18:42:27', '2020-08-28 18:42:27'),
(8, 1, 3600000, '2020-08-28 19:03:31', '2020-09-21 22:04:33'),
(12, 2, 250000, '2020-08-28 20:27:25', '2020-08-28 20:27:25'),
(13, 3, 250000, '2020-08-31 01:24:19', '2020-08-31 01:24:19'),
(14, 2, 3500000, '2020-09-15 00:40:10', '2020-09-15 00:40:10'),
(15, 3, 4020000, '2020-09-21 06:42:00', '2020-09-21 15:17:18'),
(16, 1, 3900000, '2020-09-21 22:05:48', '2020-09-21 22:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eka Arlan Febriyanto', 'helloci@gmail.com', 'super_admin', '$2y$10$RqNdv13.86PthheYpojmp.a3jg7FzMfIHecSaTyySE2TTx2fYVnNa', '8xtQwhMcD6G2l2XUnrjTrTRdWgLgaPmnUiirFS3okoRSBr1ZckQqqkzDF7cl', '2020-08-28 17:03:13', '2020-09-08 01:38:09'),
(2, 'Admin', 'admin@admin.com', 'admin', '$2y$10$2UYhO4HeE3A6NsVvZMb9COjNescGjRDn4JoL7NvUjwywNp23YMwYW', 'gTdNbt2OZlzX9Dik52HaKXnF3f3wclEDaxzRDhVZT5yICeK81zDpegFBGCeL', '2020-09-07 22:57:36', '2020-09-17 16:44:40'),
(6, 'Super Admin', 'admin@gmail.com', 'super_admin', '$2y$10$ePqGSxG3IV4q9dlCV9aMcOYD2WOitScxvF6J71L6qLQ6qWfBuKtJy', 'RjCOHmp05OP4VwjWRTbBlCtmuc4jNTG6klEBwXlVIw8LqmTwblQ2bC4zBp0K', '2020-09-10 03:42:15', '2020-09-17 15:28:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_hewans`
--
ALTER TABLE `detail_hewans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hewans`
--
ALTER TABLE `hewans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabahs`
--
ALTER TABLE `nasabahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tabungans`
--
ALTER TABLE `tabungans`
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
-- AUTO_INCREMENT for table `detail_hewans`
--
ALTER TABLE `detail_hewans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hewans`
--
ALTER TABLE `hewans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nasabahs`
--
ALTER TABLE `nasabahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabungans`
--
ALTER TABLE `tabungans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
