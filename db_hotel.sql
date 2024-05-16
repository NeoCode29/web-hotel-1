-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 11:09 AM
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
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(40) NOT NULL,
  `nomer_identitas` varchar(40) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `durasi_menginap` int(11) NOT NULL,
  `gender` enum('pria','wanita') NOT NULL,
  `tipe_kamar` enum('family','deluxe','standart') NOT NULL,
  `harga_kamar` int(11) NOT NULL DEFAULT 0,
  `breakfast` tinyint(1) NOT NULL DEFAULT 0,
  `harga_breakfast` int(11) NOT NULL DEFAULT 0,
  `is_diskon` tinyint(1) NOT NULL DEFAULT 0,
  `total_harga_kamar` int(11) NOT NULL DEFAULT 0,
  `total_harga_breakfast` int(11) NOT NULL DEFAULT 0,
  `total_harga_diskon` int(11) NOT NULL DEFAULT 0,
  `total_tagihan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id`, `nama_pemesan`, `nomer_identitas`, `tanggal_pemesanan`, `durasi_menginap`, `gender`, `tipe_kamar`, `harga_kamar`, `breakfast`, `harga_breakfast`, `is_diskon`, `total_harga_kamar`, `total_harga_breakfast`, `total_harga_diskon`, `total_tagihan`) VALUES
(73, 'budi', '1234567891234567', '2024-05-15', 4, 'pria', 'family', 1000000, 1, 800000, 1, 4000000, 320000, 400000, 3920000),
(74, 'jjfijegetjietijet', '1313343344343434', '2024-05-03', 8, 'pria', 'family', 1000000, 1, 800000, 1, 8000000, 640000, 800000, 7840000),
(75, 'denta', '3333333333333333', '2024-05-17', 3, 'pria', 'deluxe', 750000, 1, 800000, 0, 2250000, 240000, 0, 2490000),
(76, 'denta', '5555555555555555', '2024-05-16', 1020, 'pria', 'family', 1000000, 1, 800000, 1, 1020000000, 81600000, 102000000, 999600000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
