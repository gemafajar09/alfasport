-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 04:44 AM
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
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `pembelian_id` int(11) NOT NULL,
  `pembelian_no_invoice` varchar(255) NOT NULL,
  `pembelian_tgl_beli` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pembelian_create_at` datetime NOT NULL,
  `pembelian_create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`pembelian_id`, `pembelian_no_invoice`, `pembelian_tgl_beli`, `supplier_id`, `pembelian_create_at`, `pembelian_create_by`) VALUES
(1, 'P00001', '2020-08-07', 1, '2020-08-07 09:04:31', 1),
(2, 'P00002', '2020-08-07', 1, '2020-08-07 09:07:19', 1),
(3, 'P00003', '2020-08-07', 1, '2020-08-07 09:33:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
