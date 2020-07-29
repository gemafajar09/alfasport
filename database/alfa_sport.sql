-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 08:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_repeat` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `password_repeat`, `level`) VALUES
(1, 'Owner', 'adminowner', '$2y$10$it4OCh5.x2iRizXwKf/2NezUpicVsOXwx/I1Hsc5ZVNyrAsAkOkDa', 'terbukalah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_ukuran`
--

CREATE TABLE `tb_all_ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ue` varchar(10) NOT NULL,
  `uk` varchar(10) NOT NULL,
  `us` varchar(10) NOT NULL,
  `cm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_all_ukuran`
--

INSERT INTO `tb_all_ukuran` (`id_ukuran`, `id_merek`, `id_kategori`, `ue`, `uk`, `us`, `cm`) VALUES
(1, 1, 1, '36', '4', '3.5', '22'),
(2, 1, 1, '36 2/3', '4.5', '4', '22.5'),
(3, 1, 1, '37 1/3', '5', '4.5', '23'),
(4, 1, 1, '38', '5.5', '5', '23.5'),
(5, 1, 1, '38 2/3', '6', '5.5', '24'),
(6, 1, 1, '39 1/3', '6.5', '6', '24.5'),
(7, 1, 1, '40', '7', '6.5', '25'),
(8, 1, 1, '40 2/3', '7.5', '7', '25.5'),
(9, 1, 1, '41 1/3', '8', '7.5', '26'),
(10, 1, 1, '42', '8.5', '8', '26.5'),
(11, 1, 1, '42 2/3', '9', '8.5', '27'),
(12, 1, 1, '43 1/3', '9.5', '9', '27.5'),
(13, 1, 1, '44', '10', '9.5', '28'),
(14, 1, 1, '44 2/3', '10.5', '10', '28.5'),
(15, 1, 1, '45 1/3', '11', '10.5', '29'),
(16, 1, 1, '46', '11.5', '11', '29.5'),
(17, 1, 1, '46 2/3', '12', '11.5', '30'),
(18, 1, 1, '47 1/3', '12.5', '12', '30.5'),
(19, 1, 1, '48', '13', '12.5', '31'),
(20, 1, 1, '48 2/3', '13.5', '13', '31.5'),
(21, 1, 1, '49 1/3', '14', '13.5', '32'),
(22, 1, 1, '50', '14.5', '14', '32.5'),
(23, 1, 1, '50 2/3', '15', '14.5', '33'),
(24, 1, 1, '51 1/3', '16', '15', '33.5'),
(25, 1, 1, '52 2/3', '17', '16', '34'),
(26, 1, 1, '53 1/3', '18', '17', '34.5'),
(27, 1, 1, '54 2/3', '19', '18', '35'),
(28, 1, 1, '55 2/3', '20', '19', '35.5'),
(29, 1, 1, '37', '4', '4', '22.5'),
(30, 1, 1, '38', '5', '5', '23.5'),
(31, 1, 1, '39', '6', '6', '24.5'),
(32, 1, 1, '40 1/2', '7', '7', '25.5'),
(33, 1, 1, '42', '8', '8', '26.5'),
(34, 1, 1, '43', '9', '9', '27.5'),
(35, 1, 1, '44 1/2', '10', '10', '28.5'),
(36, 1, 1, '46', '11', '11', '29.5'),
(37, 1, 1, '47', '12', '12', '30.5'),
(38, 2, 1, '35 1/2', '3.5', '3', '21.5'),
(39, 2, 1, '36    ', '4', '3.5', '22'),
(40, 2, 1, '36 1/2', '4.5', '4', '22.5'),
(41, 2, 1, '37 1/2', '5', '4.5', '23'),
(42, 2, 1, '38    ', '5.5', '5', '23.5'),
(43, 2, 1, '38 1/2', '6', '5.5', '24'),
(44, 2, 1, '39    ', '6.5', '6', '24.5'),
(45, 2, 1, '40    ', '7', '6', '25'),
(46, 2, 1, '40 1/2', '7.5', '6.5', '25.5'),
(47, 2, 1, '41    ', '8', '7', '26'),
(48, 2, 1, '42    ', '8.5', '7.5', '26.5'),
(49, 2, 1, '42 1/2', '9', '8', '27'),
(50, 2, 1, '43    ', '9.5', '8.5', '27.5'),
(51, 2, 1, '44    ', '10', '9', '28'),
(52, 2, 1, '44 1/2', '10.5', '9.5', '28.5'),
(53, 2, 1, '45    ', '11', '10', '29'),
(54, 2, 1, '45 1/2', '11.5', '10.5', '29.5'),
(55, 2, 1, '46    ', '12', '11', '30'),
(56, 2, 1, '47    ', '12.5', '11.5', '30.5'),
(57, 2, 1, '47 1/2', '13', '12', '31'),
(58, 2, 1, '48    ', '13.5', '12.5', '31.5'),
(59, 2, 1, '48 1/2', '14', '13', '32'),
(60, 2, 1, '49 1/2', '15', '14', '32.5'),
(61, 2, 1, '50 1/2', '16', '15', '33'),
(62, 2, 1, '51 1/2', '17', '16', '33.5'),
(63, 2, 1, '52 1/2', '18', '17', '34'),
(64, 2, 1, '35 1/2', '5', '2.5', '22'),
(65, 2, 1, '36    ', '5.5', '3', '22.4'),
(66, 2, 1, '36 1/2', '6', '3.5', '22.9'),
(67, 2, 1, '37 1/2', '6.5', '4', '23.3'),
(68, 2, 1, '38    ', '7', '4.5', '23.7'),
(69, 3, 1, '38    ', '6', '5', '24'),
(70, 3, 1, '38 1/2', '6.5', '5.5', '24.5'),
(71, 3, 1, '39    ', '7', '6', '25'),
(72, 3, 1, '40    ', '7.5', '6.5', '25.5'),
(73, 3, 1, '40 1/2', '8', '7', '26'),
(74, 3, 1, '41    ', '8.5', '7.5', '26.5'),
(75, 3, 1, '42    ', '9', '8', '27'),
(76, 3, 1, '42 1/2', '9.5', '8.5', '27.5'),
(77, 3, 1, '43    ', '10', '9', '28'),
(78, 3, 1, '44    ', '10.5', '9.5', '28.5'),
(79, 3, 1, '44 1/2', '11', '10', '29'),
(80, 3, 1, '45    ', '11.5', '10.5', '29.5'),
(81, 3, 1, '36    ', '6', '3.5', '22.5'),
(82, 3, 1, '37    ', '6.5', '4', '23'),
(83, 3, 1, '37 1/2', '7', '4.5', '23.5'),
(84, 4, 1, '37    ', '0', '0', '23.5'),
(85, 4, 1, '38    ', '0', '0', '24'),
(86, 4, 1, '39    ', '0', '0', '25'),
(87, 4, 1, '40    ', '0', '0', '25.5'),
(88, 4, 1, '41    ', '0', '0', '26.5'),
(89, 4, 1, '42    ', '0', '0', '27'),
(90, 4, 1, '43    ', '0', '0', '28'),
(91, 4, 1, '44    ', '0', '0', '28.5'),
(92, 4, 1, '45    ', '0', '0', '29.5'),
(93, 4, 1, '46    ', '0', '0', '30'),
(94, 5, 1, '37    ', '4.5', '0', '23.3'),
(95, 5, 1, '38    ', '5', '0', '23.7'),
(96, 5, 1, '39    ', '6', '0', '24.1'),
(97, 5, 1, '40    ', '7', '0', '24.5'),
(98, 5, 1, '41    ', '7.5', '0', '25.4'),
(99, 5, 1, '42    ', '8', '0', '25.8'),
(100, 5, 1, '43    ', '9', '0', '26.7'),
(101, 5, 1, '44    ', '9.5', '0', '27.1'),
(102, 5, 1, '45    ', '10', '0', '27.9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `bank`) VALUES
(1, 'Nagari'),
(2, 'Mandiri'),
(3, 'BNI'),
(4, 'BCA'),
(5, 'BRI'),
(6, 'Bukopin'),
(7, 'Danamon');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `diskon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_diskon`, `id_metode`, `id_bank`, `diskon`) VALUES
(1, 3, 0, 0),
(2, 1, 1, 0.5),
(3, 1, 2, 0),
(4, 1, 3, 0),
(5, 1, 4, 0),
(6, 1, 5, 0),
(7, 1, 6, 0),
(8, 1, 7, 0),
(9, 2, 1, 0),
(10, 2, 2, 0.5),
(11, 2, 3, 0),
(12, 2, 4, 0),
(13, 2, 5, 0),
(14, 2, 6, 0),
(15, 2, 7, 0),
(16, 4, 1, 0),
(17, 4, 2, 0),
(18, 4, 3, 0),
(19, 4, 4, 0),
(20, 4, 5, 0),
(21, 4, 6, 0),
(22, 4, 7, 0),
(23, 5, 1, 0),
(24, 5, 2, 0),
(25, 5, 3, 0),
(26, 5, 4, 0),
(27, 5, 5, 0),
(28, 5, 6, 0),
(29, 5, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `divisi_id` int(11) NOT NULL,
  `divisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`divisi_id`, `divisi_nama`) VALUES
(24, 'Basketball'),
(25, 'Football / Soccess'),
(26, 'Outdoor / Adventur'),
(27, 'Runing'),
(28, 'Skate'),
(29, 'Sportswear'),
(30, 'Tennis'),
(31, 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gender`
--

CREATE TABLE `tb_gender` (
  `gender_id` int(11) NOT NULL,
  `gender_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gender`
--

INSERT INTO `tb_gender` (`gender_id`, `gender_nama`) VALUES
(3, 'Men'),
(4, 'Women'),
(5, 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `artikel` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `id_merek` varchar(50) NOT NULL,
  `modal` varchar(50) NOT NULL,
  `jual` varchar(50) NOT NULL,
  `id_gender` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `id_divisi` varchar(50) NOT NULL,
  `id_sub_divisi` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `id`, `artikel`, `nama`, `id_merek`, `modal`, `jual`, `id_gender`, `id_kategori`, `id_divisi`, `id_sub_divisi`, `tanggal`) VALUES
(7, '1419424518349836', 'ko0923423', 'ADIDAS', '1', '50000', '60000', '3', '1', '24', '10', '2020-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang_detail`
--

CREATE TABLE `tb_gudang_detail` (
  `id_detail` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `id_ukuran` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gudang_detail`
--

INSERT INTO `tb_gudang_detail` (`id_detail`, `id`, `id_ukuran`, `jumlah`, `barcode`, `tanggal`) VALUES
(19, '1419424518349836', 2, 5, '46546879', '2020-07-29'),
(20, '1419424518349836', 1, 15, '45687988', '2020-07-29'),
(21, '1419424518349836', 3, 15, '12345553', '2020-07-29'),
(22, '1419424518349836', 4, 15, '87465465', '2020-07-29'),
(23, '1419424518349836', 5, 15, '132135435', '2020-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(1, 'adminowner'),
(2, 'admingudang'),
(3, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `email_karyawan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_repeat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `id`, `nik`, `nama`, `alamat`, `no_telpon`, `email_karyawan`, `username`, `password`, `password_repeat`, `foto`, `foto_ktp`, `jabatan_id`, `id_toko`) VALUES
(1, '238157', '123456789', 'adminowner', 'padang', '123456789', 'admin@gmail.com', 'adminowner', '$2y$10$ifIlX28K/sSWkmTqTUkMl.k3GM5hu49xZk4wo3ynBqeyKoR448JBq', 'terbukalah', '1-11425.png', '2-15205.png', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Footwear'),
(2, 'Apparel'),
(3, 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk`
--

CREATE TABLE `tb_merk` (
  `merk_id` int(11) NOT NULL,
  `merk_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_merk`
--

INSERT INTO `tb_merk` (`merk_id`, `merk_nama`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Puma'),
(4, 'Specs'),
(5, 'Kelme');

-- --------------------------------------------------------

--
-- Table structure for table `tb_metode`
--

CREATE TABLE `tb_metode` (
  `id_metode` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_metode`
--

INSERT INTO `tb_metode` (`id_metode`, `kategori`) VALUES
(1, 'Credit'),
(2, 'Debit'),
(3, 'Cash'),
(4, 'Card'),
(5, 'Cash+Card');

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
(34, 33, 0, 22, 0, '2020-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyesuaian_stok`
--

CREATE TABLE `tb_penyesuaian_stok` (
  `penyesuaian_stok_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `penyesuaian_stok_tgl` date NOT NULL,
  `penyesuaian_stok_tipe` varchar(255) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `penyesuaian_stok_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `penyesuaian_stok_create_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyesuaian_stok`
--

INSERT INTO `tb_penyesuaian_stok` (`penyesuaian_stok_id`, `id_toko`, `penyesuaian_stok_tgl`, `penyesuaian_stok_tipe`, `id_karyawan`, `penyesuaian_stok_create_at`, `penyesuaian_stok_create_by`) VALUES
(36, 22, '2020-07-22', 'dipakai sendiri', 1, '2020-07-22 03:33:46', '1'),
(38, 22, '2020-07-27', 'dipakai sendiri', 1, '2020-07-27 08:48:55', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyesuaian_stok_detail`
--

CREATE TABLE `tb_penyesuaian_stok_detail` (
  `penyesuaian_stok_detail_id` int(11) NOT NULL,
  `penyesuaian_stok_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_penyesuaian` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyesuaian_stok_detail`
--

INSERT INTO `tb_penyesuaian_stok_detail` (`penyesuaian_stok_detail_id`, `penyesuaian_stok_id`, `id_toko`, `stok_awal`, `stok_penyesuaian`, `stok_akhir`) VALUES
(8, 36, 22, 2, -7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`satuan_id`, `satuan_nama`) VALUES
(11, 'helai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_toko`
--

CREATE TABLE `tb_stok_toko` (
  `id_stok_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `diskon` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_toko`
--

INSERT INTO `tb_stok_toko` (`id_stok_toko`, `id_toko`, `id_gudang`, `jumlah`, `id_ukuran`, `diskon`) VALUES
(8, 22, 2, 1, 5, 0),
(9, 22, 7, 10, 2, 0);

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
(10, 24, 'Basketball Sport'),
(11, 24, 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(255) NOT NULL,
  `supplier_perusahaan` varchar(255) NOT NULL,
  `supplier_notelp` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `detail_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `detail_kode` varchar(255) NOT NULL,
  `detail_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `detail_tipe_konsumen` varchar(255) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `detail_jumlah_beli` int(11) NOT NULL,
  `detail_total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tb_transaksi_detail`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER INSERT ON `tb_transaksi_detail` FOR EACH ROW BEGIN
UPDATE tb_stok_toko SET jumlah = jumlah - NEW.detail_jumlah_beli WHERE id_toko = NEW.id_toko AND id_gudang = NEW.id_gudang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_tmp`
--

CREATE TABLE `tb_transaksi_tmp` (
  `tmp_id` int(11) NOT NULL,
  `tmp_kode` varchar(255) NOT NULL,
  `tmp_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `tmp_tipe_konsumen` varchar(255) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `tmp_jumlah_beli` int(11) NOT NULL,
  `tmp_total_harga` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer`
--

CREATE TABLE `tb_transfer` (
  `id_transfer` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_toko_tujuan` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `acc_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `ukuran_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`ukuran_id`, `ukuran_nama`) VALUES
(1, 'UE'),
(2, 'US'),
(3, 'UK'),
(4, 'CM');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `telpon_toko` varchar(20) DEFAULT NULL,
  `hp_toko` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `telpon_toko`, `hp_toko`, `email`) VALUES
(22, 'Alfasport Padang', '-', '025874125893', '025874125896', 'qeguwyheb@mailinator.com'),
(23, 'Alfasport Bukittinggi', '-', '085213654789', '085214789632', 'bukittinggi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_all_ukuran`
--
ALTER TABLE `tb_all_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`divisi_id`);

--
-- Indexes for table `tb_gender`
--
ALTER TABLE `tb_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tb_gudang_detail`
--
ALTER TABLE `tb_gudang_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `tb_metode`
--
ALTER TABLE `tb_metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `tb_pakai_sendiri`
--
ALTER TABLE `tb_pakai_sendiri`
  ADD PRIMARY KEY (`pakai_sendiri_id`);

--
-- Indexes for table `tb_penyesuaian_stok`
--
ALTER TABLE `tb_penyesuaian_stok`
  ADD PRIMARY KEY (`penyesuaian_stok_id`);

--
-- Indexes for table `tb_penyesuaian_stok_detail`
--
ALTER TABLE `tb_penyesuaian_stok_detail`
  ADD PRIMARY KEY (`penyesuaian_stok_detail_id`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `tb_stok_toko`
--
ALTER TABLE `tb_stok_toko`
  ADD PRIMARY KEY (`id_stok_toko`);

--
-- Indexes for table `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  ADD PRIMARY KEY (`subdivisi_id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  ADD PRIMARY KEY (`tmp_id`);

--
-- Indexes for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_all_ukuran`
--
ALTER TABLE `tb_all_ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_gender`
--
ALTER TABLE `tb_gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_gudang_detail`
--
ALTER TABLE `tb_gudang_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `merk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_metode`
--
ALTER TABLE `tb_metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pakai_sendiri`
--
ALTER TABLE `tb_pakai_sendiri`
  MODIFY `pakai_sendiri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok`
--
ALTER TABLE `tb_penyesuaian_stok`
  MODIFY `penyesuaian_stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok_detail`
--
ALTER TABLE `tb_penyesuaian_stok_detail`
  MODIFY `penyesuaian_stok_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_stok_toko`
--
ALTER TABLE `tb_stok_toko`
  MODIFY `id_stok_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  MODIFY `subdivisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  MODIFY `tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  ADD CONSTRAINT `tb_transfer_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `tb_gudang_detail` (`id_detail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
