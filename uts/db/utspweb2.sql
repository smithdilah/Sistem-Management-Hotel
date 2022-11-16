-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 01:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utspweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkamar`
--

CREATE TABLE `tbkamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(10) NOT NULL,
  `harga_kamar` varchar(20) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `status_kamar` text NOT NULL,
  `type_kamar` enum('single room','double room','triple room','twin room') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkamar`
--

INSERT INTO `tbkamar` (`id_kamar`, `no_kamar`, `harga_kamar`, `fasilitas_kamar`, `status_kamar`, `type_kamar`) VALUES
(1, '101', 'Rp 500.000', 'lengkap', 'penuh', 'single room'),
(2, '102', 'Rp 400.000', 'Kurang lengkap', 'Kosong', 'twin room');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkamar`
--
ALTER TABLE `tbkamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkamar`
--
ALTER TABLE `tbkamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
