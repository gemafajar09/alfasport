-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 04:35 AM
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
-- Table structure for table `tb_transfer_detail`
--

CREATE TABLE `tb_transfer_detail` (
  `transfer_detail_id` int(11) NOT NULL,
  `id_transfer` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transfer_detail`
--

INSERT INTO `tb_transfer_detail` (`transfer_detail_id`, `id_transfer`, `id_gudang`, `id_ukuran`, `jumlah`, `status`) VALUES
(1, 1, 93, 1, 4, 1),
(2, 2, 93, 1, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_transfer_detail`
--
ALTER TABLE `tb_transfer_detail`
  ADD PRIMARY KEY (`transfer_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_transfer_detail`
--
ALTER TABLE `tb_transfer_detail`
  MODIFY `transfer_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
