-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 04:29 AM
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
-- Table structure for table `tb_transaksi_tmp`
--

CREATE TABLE `tb_transaksi_tmp` (
  `tmp_id` int(11) NOT NULL,
  `tmp_kode` varchar(255) NOT NULL,
  `tmp_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `tmp_jumlah_beli` int(11) NOT NULL,
  `tmp_total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_tmp`
--

INSERT INTO `tb_transaksi_tmp` (`tmp_id`, `tmp_kode`, `tmp_tgl`, `id_toko`, `tmp_jumlah_beli`, `tmp_total_harga`) VALUES
(31, 'T00002', '2020-07-23', 22, 1, 60000),
(32, 'T00002', '2020-07-23', 22, 1, 60000),
(33, 'T00002', '2020-07-23', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  ADD PRIMARY KEY (`tmp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  MODIFY `tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
