-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 05:17 AM
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
-- Table structure for table `tb_cek_stok_menipis`
--

CREATE TABLE `tb_cek_stok_menipis` (
  `menipis_id` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `menipis_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cek_stok_menipis`
--

INSERT INTO `tb_cek_stok_menipis` (`menipis_id`, `id_gudang`, `id`, `menipis_status`) VALUES
(24, 90, '123123123', 0),
(25, 91, '9165380427', 0),
(26, 92, '2349601587', 0);

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
-- Table structure for table `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `distributor_id` int(11) NOT NULL,
  `distributor_nama` varchar(255) NOT NULL,
  `distributor_perusahaan` varchar(255) NOT NULL,
  `distributor_notelp` varchar(255) NOT NULL,
  `distributor_email` varchar(255) NOT NULL,
  `distributor_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `divisi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `divisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`divisi_id`, `kategori_id`, `divisi_nama`) VALUES
(24, 1, 'Basketball'),
(25, 1, 'Football / Soccess'),
(26, 1, 'Outdoor / Adventur'),
(27, 1, 'Runing'),
(28, 1, 'Skate'),
(29, 1, 'Sportswear'),
(30, 1, 'Tennis'),
(31, 1, 'Training'),
(32, 1, 'Sportswear'),
(33, 1, 'Sportswear'),
(34, 1, 'Sportswear'),
(35, 1, 'Sportswear'),
(36, 1, 'Sportswear'),
(37, 1, 'Sportswear'),
(38, 1, 'Football / Soccer'),
(39, 1, 'Football / Soccer'),
(40, 1, 'Running'),
(41, 1, 'Sportswear'),
(42, 1, 'Running'),
(43, 1, 'Running'),
(44, 1, 'Running'),
(45, 1, 'Sportswear'),
(46, 1, 'Sportswear'),
(47, 1, 'Sportswear'),
(48, 1, 'Football / Soccer'),
(49, 1, 'Football / Soccer'),
(50, 1, 'Sportswear'),
(51, 1, 'Sportswear'),
(52, 1, 'Sportswear'),
(53, 1, 'Football / Soccer'),
(54, 1, 'Football / Soccer'),
(55, 1, 'Basketball'),
(56, 1, 'Running'),
(57, 1, 'Tennis'),
(58, 1, 'Sportswear'),
(59, 1, 'Sportswear'),
(60, 1, 'Sportswear'),
(61, 1, 'Sportswear'),
(62, 1, 'Football / Soccer'),
(63, 1, 'Football / Soccer'),
(64, 1, 'Running'),
(65, 1, 'Sportswear'),
(66, 1, 'Running'),
(67, 1, 'Running'),
(68, 1, 'Running'),
(69, 1, 'Sportswear'),
(70, 1, 'Sportswear'),
(71, 1, 'Sportswear'),
(72, 1, 'Football / Soccer'),
(73, 1, 'Football / Soccer'),
(74, 1, 'Sportswear'),
(75, 1, 'Sportswear'),
(76, 1, 'Sportswear'),
(77, 1, 'Football / Soccer'),
(78, 1, 'Football / Soccer'),
(79, 1, 'Basketball'),
(80, 1, 'Running'),
(81, 1, 'Tennis'),
(82, 1, 'Sportswear'),
(83, 1, 'Sportswear'),
(84, 1, 'Sportswear'),
(85, 1, 'Sportswear'),
(86, 1, 'Football / Soccer'),
(87, 1, 'Football / Soccer'),
(88, 1, 'Running'),
(89, 1, 'Sportswear'),
(90, 1, 'Running'),
(91, 1, 'Running'),
(92, 1, 'Running'),
(93, 1, 'Sportswear'),
(94, 1, 'Sportswear'),
(95, 1, 'Sportswear'),
(96, 1, 'Football / Soccer'),
(97, 1, 'Football / Soccer'),
(98, 1, 'Sportswear'),
(99, 1, 'Sportswear'),
(100, 1, 'Sportswear'),
(101, 1, 'Football / Soccer'),
(102, 1, 'Football / Soccer'),
(103, 1, 'Basketball'),
(104, 1, 'Running'),
(105, 1, 'Tennis'),
(106, 0, 'Sportswear'),
(107, 1, 'Sportswear'),
(108, 1, 'Sportswear'),
(109, 1, 'Sportswear'),
(110, 1, 'Sportswear'),
(111, 1, 'Sportswear'),
(112, 1, 'Sportswear'),
(113, 1, 'Sportswear'),
(114, 18, 'bass'),
(116, 1, '321');

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
(93, 'AS-1234566', 'AS-1234566', 'Adidas', '1', '50000', '60000', '3', '20', '24', '10', '2020-08-06');

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
  `tanggal` date NOT NULL,
  `diskon` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gudang_detail`
--

INSERT INTO `tb_gudang_detail` (`id_detail`, `id`, `id_ukuran`, `jumlah`, `barcode`, `tanggal`, `diskon`) VALUES
(29, 'AS-1234566', 1, 35, '78555555', '2020-08-06', '0.5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(255) NOT NULL,
  `jabatan_jobdesk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_jobdesk`) VALUES
(1, 'adminowner', ''),
(3, 'karyawan', '<ul><li>andasd</li><li>sdasd</li><li>sd</li><li>asdas</li></ul>');

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
(3, 'Hardware'),
(15, 'Sportswear'),
(16, 'Football / Soccer'),
(17, 'Running'),
(18, 'Basketball'),
(19, 'Tennis'),
(20, 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `id_prov`, `nama_kota`) VALUES
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(12, 32, 'Agam'),
(13, 23, 'Alor'),
(14, 19, 'Ambon'),
(15, 34, 'Asahan'),
(16, 24, 'Asmat'),
(17, 1, 'Badung'),
(18, 13, 'Balangan'),
(19, 15, 'Balikpapan'),
(20, 21, 'Banda Aceh'),
(21, 18, 'Bandar Lampung'),
(22, 9, 'Bandung'),
(23, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(31, 11, 'Bangkalan'),
(32, 1, 'Bangli'),
(33, 13, 'Banjar'),
(34, 9, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(37, 10, 'Banjarnegara'),
(38, 28, 'Bantaeng'),
(39, 5, 'Bantul'),
(40, 33, 'Banyuasin'),
(41, 10, 'Banyumas'),
(42, 11, 'Banyuwangi'),
(43, 13, 'Barito Kuala'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(47, 28, 'Barru'),
(48, 17, 'Batam'),
(49, 10, 'Batang'),
(50, 8, 'Batang Hari'),
(51, 11, 'Batu'),
(52, 34, 'Batu Bara'),
(53, 30, 'Bau-Bau'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(58, 23, 'Belu'),
(59, 21, 'Bener Meriah'),
(60, 26, 'Bengkalis'),
(61, 12, 'Bengkayang'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(66, 15, 'Berau'),
(67, 24, 'Biak Numfor'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(70, 34, 'Binjai'),
(71, 17, 'Bintan'),
(72, 21, 'Bireuen'),
(73, 31, 'Bitung'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(76, 10, 'Blora'),
(77, 7, 'Boalemo'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(80, 11, 'Bojonegoro'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(85, 30, 'Bombana'),
(86, 11, 'Bondowoso'),
(87, 28, 'Bone'),
(88, 7, 'Bone Bolango'),
(89, 15, 'Bontang'),
(90, 24, 'Boven Digoel'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(93, 32, 'Bukittinggi'),
(94, 1, 'Buleleng'),
(95, 28, 'Bulukumba'),
(96, 16, 'Bulungan (Bulongan)'),
(97, 8, 'Bungo'),
(98, 29, 'Buol'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(105, 10, 'Cilacap'),
(106, 3, 'Cilegon'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(110, 34, 'Dairi'),
(111, 24, 'Deiyai (Deliyai)'),
(112, 34, 'Deli Serdang'),
(113, 10, 'Demak'),
(114, 1, 'Denpasar'),
(115, 9, 'Depok'),
(116, 32, 'Dharmasraya'),
(117, 24, 'Dogiyai'),
(118, 22, 'Dompu'),
(119, 29, 'Donggala'),
(120, 26, 'Dumai'),
(121, 33, 'Empat Lawang'),
(122, 23, 'Ende'),
(123, 28, 'Enrekang'),
(124, 25, 'Fakfak'),
(125, 23, 'Flores Timur'),
(126, 9, 'Garut'),
(127, 21, 'Gayo Lues'),
(128, 1, 'Gianyar'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(132, 28, 'Gowa'),
(133, 11, 'Gresik'),
(134, 10, 'Grobogan'),
(135, 5, 'Gunung Kidul'),
(136, 14, 'Gunung Mas'),
(137, 34, 'Gunungsitoli'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(146, 34, 'Humbang Hasundutan'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(149, 9, 'Indramayu'),
(150, 24, 'Intan Jaya'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(156, 8, 'Jambi'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(160, 11, 'Jember'),
(161, 1, 'Jembrana'),
(162, 28, 'Jeneponto'),
(163, 10, 'Jepara'),
(164, 11, 'Jombang'),
(165, 25, 'Kaimana'),
(166, 26, 'Kampar'),
(167, 14, 'Kapuas'),
(168, 12, 'Kapuas Hulu'),
(169, 10, 'Karanganyar'),
(170, 1, 'Karangasem'),
(171, 9, 'Karawang'),
(172, 17, 'Karimun'),
(173, 34, 'Karo'),
(174, 14, 'Katingan'),
(175, 4, 'Kaur'),
(176, 12, 'Kayong Utara'),
(177, 10, 'Kebumen'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(180, 24, 'Keerom'),
(181, 10, 'Kendal'),
(182, 30, 'Kendari'),
(183, 4, 'Kepahiang'),
(184, 17, 'Kepulauan Anambas'),
(185, 19, 'Kepulauan Aru'),
(186, 32, 'Kepulauan Mentawai'),
(187, 26, 'Kepulauan Meranti'),
(188, 31, 'Kepulauan Sangihe'),
(189, 6, 'Kepulauan Seribu'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kepulauan Sula'),
(192, 31, 'Kepulauan Talaud'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kerinci'),
(195, 12, 'Ketapang'),
(196, 10, 'Klaten'),
(197, 1, 'Klungkung'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(203, 13, 'Kotabaru'),
(204, 31, 'Kotamobagu'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(207, 26, 'Kuantan Singingi'),
(208, 12, 'Kubu Raya'),
(209, 10, 'Kudus'),
(210, 5, 'Kulon Progo'),
(211, 9, 'Kuningan'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(220, 33, 'Lahat'),
(221, 14, 'Lamandau'),
(222, 11, 'Lamongan'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(228, 12, 'Landak'),
(229, 34, 'Langkat'),
(230, 21, 'Langsa'),
(231, 24, 'Lanny Jaya'),
(232, 3, 'Lebak'),
(233, 4, 'Lebong'),
(234, 23, 'Lembata'),
(235, 21, 'Lhokseumawe'),
(236, 32, 'Lima Puluh Koto/Kota'),
(237, 17, 'Lingga'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(242, 33, 'Lubuk Linggau'),
(243, 11, 'Lumajang'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(251, 11, 'Magetan'),
(252, 9, 'Majalengka'),
(253, 27, 'Majene'),
(254, 28, 'Makassar'),
(255, 11, 'Malang'),
(256, 11, 'Malang'),
(257, 16, 'Malinau'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(262, 27, 'Mamasa'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(267, 31, 'Manado'),
(268, 34, 'Mandailing Natal'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(274, 24, 'Mappi'),
(275, 28, 'Maros'),
(276, 22, 'Mataram'),
(277, 25, 'Maybrat'),
(278, 34, 'Medan'),
(279, 12, 'Melawi'),
(280, 8, 'Merangin'),
(281, 24, 'Merauke'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(284, 24, 'Mimika'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(291, 29, 'Morowali'),
(292, 33, 'Muara Enim'),
(293, 8, 'Muaro Jambi'),
(294, 4, 'Muko Muko'),
(295, 30, 'Muna'),
(296, 14, 'Murung Raya'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(299, 24, 'Nabire'),
(300, 21, 'Nagan Raya'),
(301, 23, 'Nagekeo'),
(302, 17, 'Natuna'),
(303, 24, 'Nduga'),
(304, 23, 'Ngada'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(311, 16, 'Nunukan'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(317, 11, 'Pacitan'),
(318, 32, 'Padang'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(323, 34, 'Padang Sidempuan'),
(324, 33, 'Pagar Alam'),
(325, 34, 'Pakpak Bharat'),
(326, 14, 'Palangka Raya'),
(327, 33, 'Palembang'),
(328, 28, 'Palopo'),
(329, 29, 'Palu'),
(330, 11, 'Pamekasan'),
(331, 3, 'Pandeglang'),
(332, 9, 'Pangandaran'),
(333, 28, 'Pangkajene Kepulauan'),
(334, 2, 'Pangkal Pinang'),
(335, 24, 'Paniai'),
(336, 28, 'Parepare'),
(337, 32, 'Pariaman'),
(338, 29, 'Parigi Moutong'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(341, 15, 'Paser'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(344, 10, 'Pati'),
(345, 32, 'Payakumbuh'),
(346, 25, 'Pegunungan Arfak'),
(347, 24, 'Pegunungan Bintang'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(352, 10, 'Pemalang'),
(353, 34, 'Pematang Siantar'),
(354, 15, 'Penajam Paser Utara'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(357, 32, 'Pesisir Selatan'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(360, 28, 'Pinrang'),
(361, 7, 'Pohuwato'),
(362, 27, 'Polewali Mandar'),
(363, 11, 'Ponorogo'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(366, 29, 'Poso'),
(367, 33, 'Prabumulih'),
(368, 18, 'Pringsewu'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(371, 14, 'Pulang Pisau'),
(372, 20, 'Pulau Morotai'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(375, 10, 'Purbalingga'),
(376, 9, 'Purwakarta'),
(377, 10, 'Purworejo'),
(378, 25, 'Raja Ampat'),
(379, 4, 'Rejang Lebong'),
(380, 10, 'Rembang'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(383, 23, 'Rote Ndao'),
(384, 21, 'Sabang'),
(385, 23, 'Sabu Raijua'),
(386, 10, 'Salatiga'),
(387, 15, 'Samarinda'),
(388, 12, 'Sambas'),
(389, 34, 'Samosir'),
(390, 11, 'Sampang'),
(391, 12, 'Sanggau'),
(392, 24, 'Sarmi'),
(393, 8, 'Sarolangun'),
(394, 32, 'Sawah Lunto'),
(395, 12, 'Sekadau'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(397, 4, 'Seluma'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(404, 34, 'Serdang Bedagai'),
(405, 14, 'Seruyan'),
(406, 26, 'Siak'),
(407, 34, 'Sibolga'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(409, 11, 'Sidoarjo'),
(410, 29, 'Sigi'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Sikka'),
(413, 34, 'Simalungun'),
(414, 21, 'Simeulue'),
(415, 12, 'Singkawang'),
(416, 28, 'Sinjai'),
(417, 12, 'Sintang'),
(418, 11, 'Situbondo'),
(419, 5, 'Sleman'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(423, 28, 'Soppeng'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(427, 10, 'Sragen'),
(428, 9, 'Subang'),
(429, 21, 'Subulussalam'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(432, 14, 'Sukamara'),
(433, 10, 'Sukoharjo'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(440, 9, 'Sumedang'),
(441, 11, 'Sumenep'),
(442, 8, 'Sungaipenuh'),
(443, 24, 'Supiori'),
(444, 11, 'Surabaya'),
(445, 10, 'Surakarta (Solo)'),
(446, 13, 'Tabalong'),
(447, 1, 'Tabanan'),
(448, 28, 'Takalar'),
(449, 25, 'Tambrauw'),
(450, 16, 'Tana Tidung'),
(451, 28, 'Tana Toraja'),
(452, 13, 'Tanah Bumbu'),
(453, 32, 'Tanah Datar'),
(454, 13, 'Tanah Laut'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(458, 18, 'Tanggamus'),
(459, 34, 'Tanjung Balai'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(462, 17, 'Tanjung Pinang'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(466, 13, 'Tapin'),
(467, 16, 'Tarakan'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(470, 34, 'Tebing Tinggi'),
(471, 8, 'Tebo'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(476, 10, 'Temanggung'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(481, 34, 'Toba Samosir'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(484, 24, 'Tolikara'),
(485, 31, 'Tomohon'),
(486, 28, 'Toraja Utara'),
(487, 11, 'Trenggalek'),
(488, 19, 'Tual'),
(489, 11, 'Tuban'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(492, 11, 'Tulungagung'),
(493, 28, 'Wajo'),
(494, 30, 'Wakatobi'),
(495, 24, 'Waropen'),
(496, 18, 'Way Kanan'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(501, 5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` int(11) NOT NULL,
  `member_kode` varchar(20) NOT NULL,
  `member_nama` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_password_repeat` varchar(255) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `member_alamat` text NOT NULL,
  `member_notelp` varchar(255) NOT NULL,
  `member_tgl_lahir` date NOT NULL,
  `member_gender` varchar(255) NOT NULL,
  `member_profesi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_kode`, `member_nama`, `member_email`, `member_password`, `member_password_repeat`, `id_prov`, `id_kota`, `member_alamat`, `member_notelp`, `member_tgl_lahir`, `member_gender`, `member_profesi`) VALUES
(1, '200729090609', 'andi', 'andi@andi.com', '$2y$10$UqWf6LvdYtJA2z9.F2AYau4Dit2AWMwIhh9Vc09nrfqJdcUNXufxu', 'andi', 4, 175, 'andi', '083423423534', '2020-07-29', '', ''),
(4, '200729090951', 'Delectus natus volu', 'neputyzaj@mailinator.com', '$2y$10$24m.KgPTFA4z3kG0glWs.uC/aqrYBpTqRnZksbuAOZpolHv7o5HEK', 'Pa$$w0rd!', 16, 96, 'Magnam aut nostrum q', 'Corporis eos obcaec', '2020-07-08', '', ''),
(6, '200729131931', 'Ipsam aut non repreh', 'vynetyvak@mailinator.com', '$2y$10$PU4DqnDjOWyZ9kZ3VFLMEOWKW1FsJOlhdz8KqA/johA5FI1Ql8hUG', 'Pa$$w0rd!', 4, 62, 'Magna nihil alias si', 'Voluptates et tempor', '0000-00-00', 'Pria', 'Karyawan');

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
(5, 'Kelme'),
(6, 'PUMA ACADEMY BACKPACK'),
(7, 'PUMA APEX BACPACK'),
(8, 'PUMA APEX BACKPACK'),
(9, 'ADRENO FG'),
(10, 'PUMA ONE 17.4 IT'),
(11, 'MEGA NIRGY'),
(12, 'TECH EVERFIT TSF'),
(13, 'EASY RIDER'),
(14, 'PUMA DARE'),
(15, 'CORE RUN JKT'),
(16, 'ESS NO.1 LOGO REGLAN TEE'),
(17, 'P48 CORO LOGO TEE'),
(18, 'MERCURIAL VICTORY IV FG'),
(19, 'MERCURIAL VICTORY VI FG'),
(20, 'GTS 16 TXT'),
(21, 'ESS PIQUE SPORT POLO'),
(22, 'PUMA LIFESTYLE'),
(23, 'TIEMPO RIO IV FG'),
(24, 'TIEMPO RIO IV IC'),
(25, 'ZOOM ASSERSION'),
(26, 'ALPHABOUNCE CITY RUN CLIMACOOL M'),
(27, 'BARRICADE CLUB');

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
(3, 'P00003', '2020-08-07', 1, '2020-08-07 09:33:26', 1),
(4, 'P00004', '2020-08-07', 1, '2020-08-07 10:07:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `detail_id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `pembelian_no_invoice` varchar(225) NOT NULL,
  `id_gudang_detail` int(11) NOT NULL,
  `detail_jumlah` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`detail_id`, `pembelian_id`, `pembelian_no_invoice`, `id_gudang_detail`, `detail_jumlah`, `satuan_id`) VALUES
(1, 1, 'P00001', 24, 1, 11),
(2, 1, 'P00001', 26, 1, 11),
(4, 2, 'P00002', 24, 2, 11),
(5, 2, 'P00002', 26, 2, 11),
(6, 2, 'P00002', 27, 1, 11),
(7, 3, 'P00003', 24, 5, 11),
(8, 3, 'P00003', 26, 5, 11),
(9, 3, 'P00003', 27, 5, 11),
(10, 4, 'P00004', 29, 15, 11);

--
-- Triggers `tb_pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `tambah` AFTER INSERT ON `tb_pembelian_detail` FOR EACH ROW BEGIN
UPDATE tb_gudang_detail SET jumlah = jumlah + NEW.detail_jumlah WHERE id_detail = NEW.id_gudang_detail;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_tmp`
--

CREATE TABLE `tb_pembelian_tmp` (
  `tmp_id` int(11) NOT NULL,
  `pembelian_no_invoice` varchar(225) NOT NULL,
  `id_gudang_detail` int(11) NOT NULL,
  `tmp_jumlah` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(39, 22, '2020-08-05', 'stock opname', NULL, '2020-08-05 06:53:56', '1'),
(40, 22, '2020-08-05', 'stock opname', 0, '2020-08-05 06:53:56', '1'),
(41, 22, '2020-08-07', 'stock opname', NULL, '2020-08-07 03:02:19', '1'),
(42, 22, '2020-08-07', 'stock opname', 0, '2020-08-07 03:02:19', '1');

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_prov` int(11) NOT NULL,
  `nama_prov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_prov`, `nama_prov`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

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
  `diskon` float NOT NULL DEFAULT 0,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_toko`
--

INSERT INTO `tb_stok_toko` (`id_stok_toko`, `id_toko`, `id_gudang`, `jumlah`, `id_ukuran`, `diskon`, `tanggal`) VALUES
(13, 22, 93, 8, 1, 0, '2020-08-06');

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

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`supplier_id`, `supplier_nama`, `supplier_perusahaan`, `supplier_notelp`, `supplier_email`, `supplier_alamat`) VALUES
(1, 'as', 'as', '12', 'as', 'as');

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
  `transaksi_diskon` varchar(255) NOT NULL DEFAULT '0',
  `transaksi_create_at` datetime NOT NULL,
  `transaksi_create_by` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_kode`, `transaksi_tgl`, `id_toko`, `transaksi_jumlah_beli`, `transaksi_tipe_bayar`, `transaksi_cash`, `transaksi_debit`, `transaksi_bank`, `transaksi_diskon`, `transaksi_create_at`, `transaksi_create_by`, `keterangan`) VALUES
(34, 'T00001', '2020-08-06', 22, 2, '4', 0, 150000, '2', '0', '2020-08-06 18:49:33', 1, '');

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
-- Dumping data for table `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`detail_id`, `transaksi_id`, `detail_kode`, `detail_tgl`, `id_toko`, `id_gudang`, `detail_tipe_konsumen`, `id_konsumen`, `detail_jumlah_beli`, `detail_total_harga`) VALUES
(40, 34, 'T00001', '2020-08-06', 22, 93, '', 0, 2, 119400);

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
  `potongan` varchar(20) NOT NULL,
  `diskon1` varchar(10) DEFAULT NULL,
  `diskon2` varchar(10) DEFAULT NULL,
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
-- Table structure for table `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_nama` varchar(255) NOT NULL,
  `voucher_kode` varchar(255) NOT NULL,
  `voucher_tgl` date DEFAULT NULL,
  `voucher_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher`
--

INSERT INTO `tb_voucher` (`voucher_id`, `voucher_nama`, `voucher_kode`, `voucher_tgl`, `voucher_status`) VALUES
(1, 'disko multi guna', 'NDRlwmiP', '0000-00-00', 0),
(2, 'disko multi guna', '37H5c4tg', '0000-00-00', 0),
(3, 'disko multi guna', 'BI0bJY2m', '0000-00-00', 0),
(4, 'disko multi guna', 'QHalR3u8', '0000-00-00', 0),
(5, 'disko multi guna', 'PIefMcdy', '0000-00-00', 0),
(6, 'disko multi guna', 'DPbiM4m5', '0000-00-00', 0),
(7, 'disko multi guna', '9sGQ812V', '0000-00-00', 0),
(8, 'disko multi guna', 'lG70Hs5c', '0000-00-00', 0),
(9, 'disko multi guna', 'iX62KFyp', '0000-00-00', 0),
(10, 'disko multi guna', 'mOqa6N91', '0000-00-00', 0),
(11, 'disko multi guna', 'x1WCHbLv', '0000-00-00', 0),
(12, 'disko multi guna', 'OICwFjDB', '0000-00-00', 0),
(13, 'disko multi guna', 'hrCUIaRO', '0000-00-00', 0),
(14, 'disko multi guna', 't9Y8GC3w', '0000-00-00', 0),
(15, 'disko multi guna', 'UHSncNQ1', '0000-00-00', 0),
(16, 'disko multi guna', 'qe8ykKzD', '0000-00-00', 0),
(17, 'disko multi guna', 'PhKi5AZF', '0000-00-00', 0),
(18, 'disko multi guna', 'E2YxeDLR', '0000-00-00', 0),
(19, 'disko multi guna', 'GZEcj0PU', '0000-00-00', 0),
(20, 'disko multi guna', 'Xi7kmPVf', '0000-00-00', 0),
(21, 'disko multi guna', 'XWUxkeJ9', '0000-00-00', 0),
(22, 'disko multi guna', 'd7T5ro4J', '0000-00-00', 0),
(23, 'disko multi guna', 'mZwuk94a', '0000-00-00', 0),
(24, 'disko multi guna', 'uijLDyFg', '0000-00-00', 0),
(25, 'disko multi guna', 'orlOGAnX', '0000-00-00', 0),
(26, 'disko multi guna', 'd1FObSae', '0000-00-00', 0),
(27, 'disko multi guna', 'vH7QgFdo', '0000-00-00', 0),
(28, 'disko multi guna', 'hCuJGTft', '0000-00-00', 0),
(29, 'disko multi guna', '2cAohMvT', '0000-00-00', 0),
(30, 'disko multi guna', '7GZbdtsY', '0000-00-00', 0),
(31, 'disko multi guna', 'GMhcNkQ3', '0000-00-00', 0),
(32, 'disko multi guna', 't0mYwdg1', '0000-00-00', 0),
(33, 'disko multi guna', 'mYyePXVs', '0000-00-00', 0),
(34, 'disko multi guna', '657yHFuC', '0000-00-00', 0),
(35, 'disko multi guna', 'olFsgteZ', '0000-00-00', 0),
(36, 'disko multi guna', 'WAhxSGkb', '0000-00-00', 0),
(37, 'disko multi guna', 'GuQwRJg9', '0000-00-00', 0),
(38, 'disko multi guna', '1VK2DMia', '0000-00-00', 0),
(39, 'disko multi guna', 'uNjLlReG', '0000-00-00', 0),
(40, 'disko multi guna', '4GM7nqCc', '0000-00-00', 0),
(41, 'disko multi guna', 'TNnXRUvW', '0000-00-00', 0),
(42, 'disko multi guna', 't3uyWvi1', '0000-00-00', 0),
(43, 'disko multi guna', 'hBMQCNHm', '0000-00-00', 0),
(44, 'disko multi guna', 'NLFA2pRE', '0000-00-00', 0),
(45, 'disko multi guna', 'C2DZFyhU', '0000-00-00', 0),
(46, 'disko multi guna', '3HoGgTe5', '0000-00-00', 0),
(47, 'disko multi guna', 'EDHGVSKh', '0000-00-00', 0),
(48, 'disko multi guna', 'e1gYTDz9', '0000-00-00', 0),
(49, 'disko multi guna', 'LkmSIP32', '0000-00-00', 0),
(50, 'disko multi guna', 'f2IknjlD', '0000-00-00', 0);

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
-- Indexes for table `tb_cek_stok_menipis`
--
ALTER TABLE `tb_cek_stok_menipis`
  ADD PRIMARY KEY (`menipis_id`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`distributor_id`);

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
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

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
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_pembelian_tmp`
--
ALTER TABLE `tb_pembelian_tmp`
  ADD PRIMARY KEY (`tmp_id`);

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
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_prov`);

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
-- Indexes for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`voucher_id`);

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
-- AUTO_INCREMENT for table `tb_cek_stok_menipis`
--
ALTER TABLE `tb_cek_stok_menipis`
  MODIFY `menipis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `distributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tb_gender`
--
ALTER TABLE `tb_gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tb_gudang_detail`
--
ALTER TABLE `tb_gudang_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `merk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pembelian_tmp`
--
ALTER TABLE `tb_pembelian_tmp`
  MODIFY `tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok`
--
ALTER TABLE `tb_penyesuaian_stok`
  MODIFY `penyesuaian_stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok_detail`
--
ALTER TABLE `tb_penyesuaian_stok_detail`
  MODIFY `penyesuaian_stok_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_stok_toko`
--
ALTER TABLE `tb_stok_toko`
  MODIFY `id_stok_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  MODIFY `subdivisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  MODIFY `tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
