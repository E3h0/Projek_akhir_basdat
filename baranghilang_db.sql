-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 01:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baranghilang_db`
--
CREATE DATABASE IF NOT EXISTS `baranghilang_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `baranghilang_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '13h10b2022t');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE `cases` (
  `case_id` int(11) NOT NULL,
  `pemilik_id` int(11) NOT NULL,
  `itm_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `pemilik_id`, `itm_id`, `category_id`, `status_id`) VALUES
(16, 25, 21, 3, 1),
(17, 25, 22, 1, 2),
(19, 26, 24, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`) VALUES
(1, 'Elektronik'),
(2, 'Pakaian'),
(3, 'Aksesoris'),
(4, 'Kendaraan');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `lokasi_hilang` varchar(255) NOT NULL,
  `waktu_hilang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `pengguna_id`, `kategori_id`, `st_id`, `item_name`, `detail`, `lokasi_hilang`, `waktu_hilang`) VALUES
(21, 25, 3, 1, 'Laptop', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'bara', '2015-05-03 20:26:00'),
(22, 25, 1, 2, 'SEPATU', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', 'cihuy', '2022-12-03 20:26:00'),
(24, 26, 2, 1, 'kucingaaaaaaaaa', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'statsaaaaaaaaa', '1993-10-03 20:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `phone`) VALUES
(25, 'andi', 'andi@gmail.com', '85782507394'),
(26, 'johnnnnnnnnnnn', 'cika@yahoo.com', '5555555555555555555555');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_name`) VALUES
(1, 'Hilang'),
(2, 'Ditemukan\r\nsudah kembali ke pemilik '),
(3, 'Ditemukan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`),
  ADD KEY `pemilik_id` (`pemilik_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `itm_id` (`itm_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `st_id` (`st_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`pemilik_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cases_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cases_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cases_ibfk_4` FOREIGN KEY (`itm_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`st_id`) REFERENCES `status` (`s_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
