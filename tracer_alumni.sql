-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 06:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracer_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_alumni`
--

CREATE TABLE `data_alumni` (
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `kode_prodi` int(255) NOT NULL,
  `no_ijasah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `histori` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_alumni`
--

INSERT INTO `data_alumni` (`nim`, `nama`, `tanggal_lulus`, `kode_prodi`, `no_ijasah`, `histori`, `created_at`, `updated_at`) VALUES
('62017001', 'budi', '2021-11-17', 1, '696968', 'not fresh graduated', NULL, '2021-11-21 04:17:48'),
('672016002', 'aderai', '2020-03-10', 1, '2993716', 'bekerja di pt.maju mundur', '2021-11-10 13:30:14', '2021-11-10 13:30:14'),
('672016012', 'nunung', '2021-01-20', 2, '112345', 'bekerja di sokinasik grup', '2021-11-10 13:35:52', '2021-11-10 13:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `fakultas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `fakultas`) VALUES
(1, 'Teknik Informatika', 'Teknologi informasi'),
(2, 'DKV', 'Teknologi informasi');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `nama_admin`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dodo', 'doy@gmail.com', 'doy', '123', NULL, '2021-11-10 20:47:01', '2021-11-20 00:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_prodi`
--

CREATE TABLE `user_prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_prodi` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_prodi`
--

INSERT INTO `user_prodi` (`id`, `kode_prodi`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'tekinfo@gmail.com', 'tekinfo', '123', '2021-11-10 20:45:18', '2021-11-21 03:18:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_alumni`
--
ALTER TABLE `data_alumni`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_prodi`
--
ALTER TABLE `user_prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodis_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_prodi`
--
ALTER TABLE `user_prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
