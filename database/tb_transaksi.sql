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
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_kode` varchar(255) NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `transaksi_jumlah_beli` int(11) NOT NULL,
  `transaksi_tipe_bayar` varchar(255) NOT NULL,
  `transaksi_cash` int(11) NOT NULL,
  `transaksi_debit` int(11) NOT NULL,
  `transaksi_bank` varchar(255) NOT NULL,
  `transaksi_create_at` datetime NOT NULL,
  `transaksi_create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_kode`, `transaksi_tgl`, `id_toko`, `transaksi_jumlah_beli`, `transaksi_tipe_bayar`, `transaksi_cash`, `transaksi_debit`, `transaksi_bank`, `transaksi_create_at`, `transaksi_create_by`) VALUES
(1, 'T00001', '2020-07-22', 22, 2, 'cash', 100000, 0, 'bni', '2020-07-22 14:22:38', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
