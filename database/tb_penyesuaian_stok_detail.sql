-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 11:54 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfa_sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyesuaian_stok_detail`
--

CREATE TABLE `tb_penyesuaian_stok_detail` (
  `penyesuaian_stok_detail_id` int(11) NOT NULL,
  `penyesuaian_stok_id` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_penyesuaian` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyesuaian_stok_detail`
--

INSERT INTO `tb_penyesuaian_stok_detail` (`penyesuaian_stok_detail_id`, `penyesuaian_stok_id`, `id_gudang`, `stok_awal`, `stok_penyesuaian`, `stok_akhir`) VALUES
(3, 2, 4, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_penyesuaian_stok_detail`
--
ALTER TABLE `tb_penyesuaian_stok_detail`
  ADD PRIMARY KEY (`penyesuaian_stok_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok_detail`
--
ALTER TABLE `tb_penyesuaian_stok_detail`
  MODIFY `penyesuaian_stok_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;