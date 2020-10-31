-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 03:19 AM
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
-- Table structure for table `tb_gudang_kaos_kaki`
--

CREATE TABLE `tb_gudang_kaos_kaki` (
  `gudang_kaos_kaki_id` int(11) NOT NULL,
  `gudang_kaos_kaki_kode` varchar(255) NOT NULL,
  `gudang_kaos_kaki_artikel` varchar(255) NOT NULL,
  `gudang_kaos_kaki_nama` varchar(255) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `gudang_kaos_kaki_modal` varchar(255) NOT NULL,
  `gudang_kaos_kaki_jual` varchar(255) NOT NULL,
  `id_gender` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_subdivisi` int(11) NOT NULL,
  `gudang_kaos_kaki_tgl` date NOT NULL,
  `gudang_kaos_kaki_thumbnail` text DEFAULT NULL,
  `gudang_kaos_kaki_foto1` text DEFAULT NULL,
  `gudang_kaos_kaki_foto2` text DEFAULT NULL,
  `gudang_kaos_kaki_foto3` text DEFAULT NULL,
  `gudang_kaos_kaki_foto4` text DEFAULT NULL,
  `gudang_kaos_kaki_foto5` text DEFAULT NULL,
  `gudang_kaos_kaki_berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang_kaos_kaki`
--

INSERT INTO `tb_gudang_kaos_kaki` (`gudang_kaos_kaki_id`, `gudang_kaos_kaki_kode`, `gudang_kaos_kaki_artikel`, `gudang_kaos_kaki_nama`, `id_merek`, `gudang_kaos_kaki_modal`, `gudang_kaos_kaki_jual`, `id_gender`, `id_kategori`, `id_divisi`, `id_subdivisi`, `gudang_kaos_kaki_tgl`, `gudang_kaos_kaki_thumbnail`, `gudang_kaos_kaki_foto1`, `gudang_kaos_kaki_foto2`, `gudang_kaos_kaki_foto3`, `gudang_kaos_kaki_foto4`, `gudang_kaos_kaki_foto5`, `gudang_kaos_kaki_berat`) VALUES
(3, '4892170653', 'GKK0001', 'Culpa ea velit eius', 25, '1231231', '2131231', 1, 1, 1, 3, '2015-06-24', 'Consectetur cillum ', 'Quia exercitationem ', 'Facere quod deleniti', 'Voluptates sit in v', 'Consectetur illum e', 'Illo excepteur ad el', 79),
(7, '5438912067', '1231231', 'dada', 25, '123', '12312', 1, 1, 1, 3, '1991-04-09', 'Optio sed doloribus', 'Voluptas incididunt ', 'Nam reprehenderit s', 'Rerum ut non earum e', 'Consequatur qui tem', 'Nisi a tempore pers', 14),
(11, '1324579086', 'GKK0002', 'asdf', 25, '12324123', '12313123', 2, 1, 1, 3, '2020-10-28', 'a', 'a', 'a', 'a', 'aa', 'a', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang_kaos_kaki_detail`
--

CREATE TABLE `tb_gudang_kaos_kaki_detail` (
  `gudang_kaos_kaki_detail_id` int(11) NOT NULL,
  `gudang_kaos_kaki_kode` varchar(255) NOT NULL,
  `ukuran_kaos_kaki_id` int(11) NOT NULL,
  `gudang_kaos_kaki_detail_jumlah` int(11) NOT NULL,
  `gudang_kaos_kaki_detail_barcode` varchar(255) NOT NULL,
  `gudang_kaos_kaki_detail_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang_kaos_kaki_detail`
--

INSERT INTO `tb_gudang_kaos_kaki_detail` (`gudang_kaos_kaki_detail_id`, `gudang_kaos_kaki_kode`, `ukuran_kaos_kaki_id`, `gudang_kaos_kaki_detail_jumlah`, `gudang_kaos_kaki_detail_barcode`, `gudang_kaos_kaki_detail_tgl`) VALUES
(3, '4892170653', 1, 40, '123', '2020-10-26'),
(4, '4892170653', 2, 30, '124', '2020-10-26'),
(5, '4892170653', 3, 12, '125', '2020-10-26'),
(6, '4892170653', 4, 90, '126', '2020-10-26'),
(7, '4892170653', 2, 10, '132', '2020-10-26'),
(8, '5438912067', 1, 1111, '111111', '2020-10-27'),
(9, '5438912067', 2, 12, '111112', '2020-10-27'),
(10, '5438912067', 3, 23, '6343', '2020-10-27'),
(12, '1324579086', 4, 10, '1990', '2020-10-28'),
(13, '1324579086', 4, 210, '1991', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang_lainnya`
--

CREATE TABLE `tb_gudang_lainnya` (
  `gudang_lainnya_id` int(11) NOT NULL,
  `gudang_lainnya_kode` varchar(255) NOT NULL,
  `gudang_lainnya_artikel` varchar(255) NOT NULL,
  `gudang_lainnya_nama` varchar(255) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `gudang_lainnya_modal` varchar(255) NOT NULL,
  `gudang_lainnya_jual` varchar(255) NOT NULL,
  `id_gender` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_subdivisi` int(11) NOT NULL,
  `gudang_lainnya_tgl` date NOT NULL,
  `gudang_lainnya_thumbnail` text DEFAULT NULL,
  `gudang_lainnya_foto1` text DEFAULT NULL,
  `gudang_lainnya_foto2` text DEFAULT NULL,
  `gudang_lainnya_foto3` text DEFAULT NULL,
  `gudang_lainnya_foto4` text DEFAULT NULL,
  `gudang_lainnya_foto5` text DEFAULT NULL,
  `gudang_lainnya_berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang_lainnya`
--

INSERT INTO `tb_gudang_lainnya` (`gudang_lainnya_id`, `gudang_lainnya_kode`, `gudang_lainnya_artikel`, `gudang_lainnya_nama`, `id_merek`, `gudang_lainnya_modal`, `gudang_lainnya_jual`, `id_gender`, `id_kategori`, `id_divisi`, `id_subdivisi`, `gudang_lainnya_tgl`, `gudang_lainnya_thumbnail`, `gudang_lainnya_foto1`, `gudang_lainnya_foto2`, `gudang_lainnya_foto3`, `gudang_lainnya_foto4`, `gudang_lainnya_foto5`, `gudang_lainnya_berat`) VALUES
(3, '9862370154', '21212', 'Minima qui labore do', 1, '27', '67', 2, 1, 2, 1, '2020-10-27', 'Facilis voluptas aut', 'Reiciendis fugit et', 'Esse et possimus co', 'Dicta aut odio ut su', 'Placeat harum deser', 'Maiores repellendus', 18),
(8, '0925468137', '12454', 'asdasd', 1, '12121', '121212', 3, 1, 1, 3, '2020-10-28', 's', 'a', 'a', 's', 'as', 'as', 324),
(9, '5716320894', '23123', 'asdasfhasa', 1, '122233', '122223', 1, 1, 1, 4, '2020-10-28', 'sd', 'asd', 'asd', 'asd', 'sasdfas', 'asda', 1241);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang_lainnya_detail`
--

CREATE TABLE `tb_gudang_lainnya_detail` (
  `gudang_lainnya_detail_id` int(11) NOT NULL,
  `gudang_lainnya_kode` varchar(255) NOT NULL,
  `ukuran_barang_detail_id` int(11) NOT NULL,
  `gudang_lainnya_detail_jumlah` int(11) NOT NULL,
  `gudang_lainnya_detail_barcode` varchar(255) NOT NULL,
  `gudang_lainnya_detail_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang_lainnya_detail`
--

INSERT INTO `tb_gudang_lainnya_detail` (`gudang_lainnya_detail_id`, `gudang_lainnya_kode`, `ukuran_barang_detail_id`, `gudang_lainnya_detail_jumlah`, `gudang_lainnya_detail_barcode`, `gudang_lainnya_detail_tgl`) VALUES
(3, '9862370154', 24, 0, '1', '2020-10-27'),
(4, '9862370154', 25, 2, '2', '2020-10-27'),
(5, '9862370154', 26, 9, '12', '2020-10-27'),
(6, '9862370154', 27, 120, '122', '2020-10-27'),
(7, '9862370154', 24, 123, '12311', '2020-10-27'),
(8, '0925468137', 24, 100, '12311', '2020-10-28'),
(9, '0925468137', 24, 100, '12311', '2020-10-28'),
(10, '0925468137', 24, 100, '12311', '2020-10-28'),
(11, '0925468137', 24, 100, '12311', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restock_kaos_kaki`
--

CREATE TABLE `tb_restock_kaos_kaki` (
  `restock_kaos_kaki_id` int(11) NOT NULL,
  `gudang_kaos_kaki_detail_id` int(11) NOT NULL,
  `gudang_kaos_kaki_kode` varchar(255) NOT NULL,
  `restock_kaos_kaki_tgl` datetime NOT NULL,
  `restock_kaos_kaki_jml_awal` int(11) NOT NULL,
  `restock_kaos_kaki_jml_tambah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_restock_kaos_kaki`
--

INSERT INTO `tb_restock_kaos_kaki` (`restock_kaos_kaki_id`, `gudang_kaos_kaki_detail_id`, `gudang_kaos_kaki_kode`, `restock_kaos_kaki_tgl`, `restock_kaos_kaki_jml_awal`, `restock_kaos_kaki_jml_tambah`) VALUES
(1, 3, '4892170653', '2020-10-30 16:07:59', 0, 12),
(2, 3, '4892170653', '2020-10-30 16:56:44', 22, 8),
(3, 4, '4892170653', '2020-10-30 16:56:44', 16, 4),
(4, 3, '4892170653', '2020-10-30 16:57:21', 30, 10),
(5, 4, '4892170653', '2020-10-30 16:57:21', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_toko_kaos_kaki`
--

CREATE TABLE `tb_stok_toko_kaos_kaki` (
  `stok_toko_kaos_kaki_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `gudang_kaos_kaki_detail_id` int(11) NOT NULL,
  `stok_toko_kaos_kaki_jumlah` int(11) NOT NULL,
  `ukuran_kaos_kaki_id` int(11) NOT NULL,
  `stok_toko_kaos_kaki_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok_toko_kaos_kaki`
--

INSERT INTO `tb_stok_toko_kaos_kaki` (`stok_toko_kaos_kaki_id`, `id_toko`, `gudang_kaos_kaki_detail_id`, `stok_toko_kaos_kaki_jumlah`, `ukuran_kaos_kaki_id`, `stok_toko_kaos_kaki_tgl`) VALUES
(1, 1, 3, 8, 1, '2020-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_toko_lainnya`
--

CREATE TABLE `tb_stok_toko_lainnya` (
  `stok_toko_lainnya_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `gudang_lainnya_detail_id` int(11) NOT NULL,
  `stok_toko_lainnya_jumlah` int(11) NOT NULL,
  `ukuran_barang_detail_id` int(11) NOT NULL,
  `stok_toko_lainnya_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok_toko_lainnya`
--

INSERT INTO `tb_stok_toko_lainnya` (`stok_toko_lainnya_id`, `id_toko`, `gudang_lainnya_detail_id`, `stok_toko_lainnya_jumlah`, `ukuran_barang_detail_id`, `stok_toko_lainnya_tgl`) VALUES
(1, 1, 9, 3, 27, '2020-10-27'),
(2, 1, 8, 2, 26, '2020-10-27'),
(4, 1, 3, 1, 24, '2020-10-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gudang_kaos_kaki`
--
ALTER TABLE `tb_gudang_kaos_kaki`
  ADD PRIMARY KEY (`gudang_kaos_kaki_id`);

--
-- Indexes for table `tb_gudang_kaos_kaki_detail`
--
ALTER TABLE `tb_gudang_kaos_kaki_detail`
  ADD PRIMARY KEY (`gudang_kaos_kaki_detail_id`);

--
-- Indexes for table `tb_gudang_lainnya`
--
ALTER TABLE `tb_gudang_lainnya`
  ADD PRIMARY KEY (`gudang_lainnya_id`);

--
-- Indexes for table `tb_gudang_lainnya_detail`
--
ALTER TABLE `tb_gudang_lainnya_detail`
  ADD PRIMARY KEY (`gudang_lainnya_detail_id`);

--
-- Indexes for table `tb_restock_kaos_kaki`
--
ALTER TABLE `tb_restock_kaos_kaki`
  ADD PRIMARY KEY (`restock_kaos_kaki_id`);

--
-- Indexes for table `tb_stok_toko_kaos_kaki`
--
ALTER TABLE `tb_stok_toko_kaos_kaki`
  ADD PRIMARY KEY (`stok_toko_kaos_kaki_id`);

--
-- Indexes for table `tb_stok_toko_lainnya`
--
ALTER TABLE `tb_stok_toko_lainnya`
  ADD PRIMARY KEY (`stok_toko_lainnya_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gudang_kaos_kaki`
--
ALTER TABLE `tb_gudang_kaos_kaki`
  MODIFY `gudang_kaos_kaki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_gudang_kaos_kaki_detail`
--
ALTER TABLE `tb_gudang_kaos_kaki_detail`
  MODIFY `gudang_kaos_kaki_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_gudang_lainnya`
--
ALTER TABLE `tb_gudang_lainnya`
  MODIFY `gudang_lainnya_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gudang_lainnya_detail`
--
ALTER TABLE `tb_gudang_lainnya_detail`
  MODIFY `gudang_lainnya_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_restock_kaos_kaki`
--
ALTER TABLE `tb_restock_kaos_kaki`
  MODIFY `restock_kaos_kaki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_stok_toko_kaos_kaki`
--
ALTER TABLE `tb_stok_toko_kaos_kaki`
  MODIFY `stok_toko_kaos_kaki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_stok_toko_lainnya`
--
ALTER TABLE `tb_stok_toko_lainnya`
  MODIFY `stok_toko_lainnya_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
