-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 05:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `datadiri`
--

CREATE TABLE `datadiri` (
  `id_datadiri` char(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kodepos` char(7) DEFAULT NULL,
  `alamatlengkap` varchar(255) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `no_telp` char(15) DEFAULT NULL,
  `image_foto` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datadiri`
--

INSERT INTO `datadiri` (`id_datadiri`, `id_user`, `provinsi`, `kabupaten`, `kecamatan`, `kodepos`, `alamatlengkap`, `agama`, `status`, `no_telp`, `image_foto`, `updated_at`) VALUES
('BIO200614093317', 3, 'Jawa Timur', 'Sidoarjo', 'Waru', '677000', 'Surabaya', 'Islam', 'Belum Kawin', '089900000222', 'pic-200615-fa3095c733.png', '2020-06-14 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'wV0OWpZ3YH5dZ2o7sNo0BBzJi0LyZseLexa86SyqnJlHfhb2gP', 1, 0, 0, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(7, 'uri:service/api_loglogin/index:get', 1, 1592552288, 'wV0OWpZ3YH5dZ2o7sNo0BBzJi0LyZseLexa86Syq'),
(8, 'uri:service/api_loglogin/index:get', 1, 1592552290, 'wV0OWpZ3YH5dZ2o7sNo0BBzJi0LyZseLexa86Syq'),
(9, 'uri:service/api_loglogin/index:get', 3, 1593417943, 'wV0OWpZ3YH5dZ2o7sNo0BBzJi0LyZseLexa86SyqnJlHfhb2gP');

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE `log_users` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(35) NOT NULL,
  `aktifitas` char(15) NOT NULL,
  `browser` varchar(25) NOT NULL,
  `os` varchar(25) NOT NULL,
  `datelog` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_users`
--

INSERT INTO `log_users` (`log_id`, `user_id`, `waktu`, `ip_address`, `aktifitas`, `browser`, `os`, `datelog`) VALUES
(81, 1, '2020-06-14 22:03:03', '::1', 'Logout', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(82, 1, '2020-06-14 22:06:13', '::1', 'Login', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(83, 1, '2020-06-14 22:06:21', '::1', 'Logout', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(84, 3, '2020-06-14 22:07:35', '::1', 'Login', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(85, 3, '2020-06-14 22:08:39', '::1', 'Logout', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(86, 1, '2020-06-14 22:08:44', '::1', 'Login', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(87, 1, '2020-06-14 22:10:09', '::1', 'Logout', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(88, 3, '2020-06-14 22:10:20', '::1', 'Login', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(89, 3, '2020-06-14 22:11:06', '::1', 'Logout', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(90, 1, '2020-06-14 23:09:47', '::1', 'Login', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(91, 1, '2020-06-14 23:15:12', '::1', 'Logout', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-14 00:00:00'),
(92, 3, '2020-06-15 12:52:56', '::1', 'Login', 'Chrome 83.0.4103.97', 'Windows 10', '2020-06-15 00:00:00'),
(93, 1, '2020-06-19 14:11:07', '::1', 'Login', 'Chrome 83.0.4103.106', 'Windows 10', '2020-06-19 00:00:00'),
(94, 1, '2020-08-20 14:50:44', '::1', 'Login', 'Chrome 84.0.4147.135', 'Windows 10', '2020-08-20 00:00:00'),
(95, 1, '2020-08-20 14:50:55', '::1', 'Logout', 'Chrome 84.0.4147.135', 'Windows 10', '2020-08-20 00:00:00'),
(96, 3, '2020-08-20 14:52:43', '::1', 'Login', 'Chrome 84.0.4147.135', 'Windows 10', '2020-08-20 00:00:00'),
(97, 3, '2020-08-20 15:03:13', '::1', 'Logout', 'Chrome 84.0.4147.135', 'Windows 10', '2020-08-20 00:00:00'),
(98, 3, '2020-08-20 18:41:47', '::1', 'Login', 'Chrome 84.0.4147.135', 'Windows 10', '2020-08-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` char(50) NOT NULL,
  `id_datadiri` char(50) DEFAULT NULL,
  `ktpsim` char(18) DEFAULT NULL,
  `kk` char(18) DEFAULT NULL,
  `foto_slipgaji` varchar(255) DEFAULT NULL,
  `pekerjaan` char(50) DEFAULT NULL,
  `gajibulanan` int(11) DEFAULT NULL,
  `kondisi` text DEFAULT NULL,
  `statuspengajuan` char(10) DEFAULT NULL,
  `diverifikasi` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `tanggallahir`, `tempatlahir`, `role_id`, `is_active`, `date_create`, `created_at`) VALUES
(1, 'Admin Ma\'sum', 'admin@admin.com', 'default.png', '$2y$10$pcqP.zLbQEp/T41386juou6cRXHBsGbXoMN9JvbODeEW9hEuUqd92', '0000-00-00', '', 1, 1, 0, '2020-06-07 15:22:40'),
(3, 'Ma\'sum', 'muhammadmasum50@gmail.com', 'default.png', '$2y$10$pcqP.zLbQEp/T41386juou6cRXHBsGbXoMN9JvbODeEW9hEuUqd92', '1999-10-05', 'Ponorogo', 2, 1, 1591790271, '2020-06-10 18:57:51'),
(4, 'Muhammad Ma\'sum', 'muhmasum6661@gmail.com', 'default.jpg', '$2y$10$jhMJtpvkqNVvigWve5wEteBWYYjrbAM3BEtUSVLn2V88Ae7RadN3u', '2020-06-14', 'Ponorogo', 2, 0, 1592149687, '2020-06-14 22:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Penerima Bantuan');

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_token`
--

INSERT INTO `users_token` (`id`, `email`, `token`, `date_created`) VALUES
(43, 'muhmasum6661@gmail.com', 'vxwmX2yzejlsCx9rxAjrfLS9SbouRPmynUtDqSuXxUlEq2x5DcqAz1wB6lu+WExl3L4=', 1592149687);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datadiri`
--
ALTER TABLE `datadiri`
  ADD PRIMARY KEY (`id_datadiri`),
  ADD KEY `fk_datadiriusers` (`id_user`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_users`
--
ALTER TABLE `log_users`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_datadiri` (`id_datadiri`),
  ADD KEY `pengajuan_ibfk_1` (`diverifikasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datadiri`
--
ALTER TABLE `datadiri`
  ADD CONSTRAINT `fk_datadiriusers` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `log_users`
--
ALTER TABLE `log_users`
  ADD CONSTRAINT `log_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`diverifikasi`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `users_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
