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
-- Table structure for table `tb_pakai_sendiri`
--

CREATE TABLE `tb_pakai_sendiri` (
  `pakai_sendiri_id` int(11) NOT NULL,
  `penyesuaian_stok_id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `pakai_sendiri_status` int(11) NOT NULL,
  `pakai_sendiri_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pakai_sendiri`
--

INSERT INTO `tb_pakai_sendiri` (`pakai_sendiri_id`, `penyesuaian_stok_id`, `id_karyawan`, `id_toko`, `pakai_sendiri_status`, `pakai_sendiri_tgl`) VALUES
(2, 2, 6, 22, 0, '2020-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pakai_sendiri`
--
ALTER TABLE `tb_pakai_sendiri`
  ADD PRIMARY KEY (`pakai_sendiri_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pakai_sendiri`
--
ALTER TABLE `tb_pakai_sendiri`
  MODIFY `pakai_sendiri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;