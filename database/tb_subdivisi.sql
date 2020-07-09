-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 09:18 AM
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
-- Table structure for table `tb_subdivisi`
--

CREATE TABLE `tb_subdivisi` (
  `subdivisi_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `subdivisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subdivisi`
--

INSERT INTO `tb_subdivisi` (`subdivisi_id`, `divisi_id`, `subdivisi_nama`) VALUES
(7, 23, 'NB MANE LFC'),
(8, 20, 'NIKE CR7 JFC'),
(9, 21, 'PUMA G7 FCB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  ADD PRIMARY KEY (`subdivisi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  MODIFY `subdivisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
