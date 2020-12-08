-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 05:06 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_stok_toko` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `voucher_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_divisi` int(11) NOT NULL,
  `id_subdivisi` int(11) NOT NULL,
  `id_gender` varchar(225) NOT NULL,
  `ue` varchar(10) NOT NULL,
  `uk` varchar(10) NOT NULL,
  `us` varchar(10) NOT NULL,
  `cm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_all_ukuran`
--

INSERT INTO `tb_all_ukuran` (`id_ukuran`, `id_merek`, `id_kategori`, `id_divisi`, `id_subdivisi`, `id_gender`, `ue`, `uk`, `us`, `cm`) VALUES
(1, 1, 1, 1, 3, '1,3', '36', '3.5', '4', '22'),
(2, 1, 1, 1, 3, '1,3', '36 2/3', '4', '4.5', '22.5'),
(3, 1, 1, 1, 3, '1,3', '37 1/3', '4.5', '5', '23'),
(4, 1, 1, 1, 3, '1,3', '38', '5', '5.5', '23.5'),
(5, 1, 1, 1, 3, '1,3', '38 2/3', '5.5', '6', '24'),
(6, 1, 1, 1, 3, '1,3', '39 1/3', '6', '6.5', '24.5'),
(7, 1, 1, 1, 3, '1,3', '40', '6.5', '7', '25'),
(8, 1, 1, 1, 3, '1,3', '40 2/3', '7', '7.5', '25.5'),
(9, 1, 1, 1, 3, '1,3', '41 1/3', '7.5', '8', '26'),
(10, 1, 1, 1, 3, '1,3', '42', '8', '8.5', '26.5'),
(11, 1, 1, 1, 3, '1,3', '42 2/3', '8.5', '9', '27'),
(12, 1, 1, 1, 3, '1,3', '43 1/3', '9', '9.5', '27.5'),
(13, 1, 1, 1, 3, '1,3', '44', '9.5', '10', '28'),
(14, 1, 1, 1, 3, '1,3', '44 2/3', '10', '10.5', '28.5'),
(15, 1, 1, 1, 3, '1,3', '45 1/3', '10.5', '11', '29'),
(16, 1, 1, 1, 3, '1,3', '46', '11', '11.5', '29.5'),
(17, 1, 1, 1, 3, '1,3', '46 2/3', '11.5', '12', '30'),
(18, 1, 1, 1, 3, '1,3', '47 1/3', '12', '12.5', '30.5'),
(19, 1, 1, 1, 3, '1,3', '48', '12.5', '13', '31'),
(20, 1, 1, 1, 3, '1,3', '48 2/3', '13', '13.5', '31.5'),
(21, 1, 1, 1, 3, '1,3', '49 1/3', '13.5', '14', '32'),
(22, 1, 1, 1, 3, '1,3', '50', '14', '14.5', '32.5'),
(23, 1, 1, 1, 3, '1,3', '50 2/3', '14.5', '15', '33'),
(24, 1, 1, 1, 3, '1,3', '51 1/3', '15', '16', '33.5'),
(25, 1, 1, 1, 3, '1,3', '52 2/3', '16', '17', '34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `bank`, `no_rek`, `atas_nama`) VALUES
(1, 'Nagari', '12345', 'anu'),
(2, 'Mandiri', '12345', 'anu'),
(3, 'BNI', '12345', 'anu'),
(4, 'BCA', '12345', 'anu'),
(5, 'BRI', '12345', 'anu'),
(6, 'Bukopin', '12345', 'anu'),
(7, 'Danamon', '12345', 'anu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `barang_id` int(11) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `barang_kategori` varchar(255) NOT NULL,
  `barang_artikel` varchar(255) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_modal` varchar(255) NOT NULL,
  `barang_jual` varchar(255) NOT NULL,
  `barang_berat` varchar(255) NOT NULL,
  `barang_tgl` date NOT NULL,
  `gender_id` int(11) NOT NULL,
  `merk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `subdivisi_id` int(11) NOT NULL,
  `barang_thumbnail` varchar(255) NOT NULL,
  `barang_foto1` varchar(255) NOT NULL,
  `barang_foto2` varchar(255) NOT NULL,
  `barang_foto3` varchar(255) NOT NULL,
  `barang_foto4` varchar(255) NOT NULL,
  `barang_foto5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`barang_id`, `barang_kode`, `barang_kategori`, `barang_artikel`, `barang_nama`, `barang_modal`, `barang_jual`, `barang_berat`, `barang_tgl`, `gender_id`, `merk_id`, `kategori_id`, `divisi_id`, `subdivisi_id`, `barang_thumbnail`, `barang_foto1`, `barang_foto2`, `barang_foto3`, `barang_foto4`, `barang_foto5`) VALUES
(3, '1408395267', 'Barang Lainnya', 'B92384', 'Baju adidas', '100000', '120000', '1000', '2020-11-03', 2, 1, 1, 1, 3, 'b', 'b', 'b', 'b', 'b', 'b'),
(4, '8321067459', 'Sepatu', 'SP234', 'Nike01239', '90000', '100000', '1000', '2020-11-04', 1, 2, 1, 1, 3, 'a', 'a', 'a', 'a', 'a', 'a'),
(5, '1785024396', 'Kaos Kaki', 'RT1234', 'gado-gaod', '100000', '120000', '1000', '2020-11-04', 1, 1, 1, 1, 3, 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_detail`
--

CREATE TABLE `tb_barang_detail` (
  `barang_detail_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `ukuran_id` int(11) NOT NULL,
  `barang_detail_barcode` varchar(255) NOT NULL,
  `barang_detail_jml` int(11) NOT NULL,
  `barang_detail_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_detail`
--

INSERT INTO `tb_barang_detail` (`barang_detail_id`, `barang_id`, `ukuran_id`, `barang_detail_barcode`, `barang_detail_jml`, `barang_detail_tgl`) VALUES
(10, 4, 7, '1', 10, '2020-11-12'),
(12, 4, 9, '23', 10, '2020-11-04'),
(17, 5, 32, '1', 10, '2020-11-11'),
(18, 5, 33, '3', 10, '2020-11-04'),
(19, 3, 45, '1212', 10, '2020-11-04'),
(20, 4, 7, '3', 10, '2020-11-11'),
(21, 4, 7, '2', 10, '2020-11-11'),
(22, 4, 7, '5', 10, '2020-11-11'),
(25, 3, 45, '2', 10, '2020-11-11'),
(26, 4, 9, '4', 10, '2020-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_restock`
--

CREATE TABLE `tb_barang_restock` (
  `barang_restock_id` int(11) NOT NULL,
  `barang_detail_id` int(11) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `barang_restock_tgl` datetime NOT NULL,
  `barang_restock_jml_awal` int(11) NOT NULL,
  `barang_restock_jml_tambah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_restock`
--

INSERT INTO `tb_barang_restock` (`barang_restock_id`, `barang_detail_id`, `barang_kode`, `barang_restock_tgl`, `barang_restock_jml_awal`, `barang_restock_jml_tambah`) VALUES
(1, 10, '8321067459', '2020-11-06 09:19:11', 110, 10),
(2, 10, '8321067459', '2020-11-06 09:20:05', 120, 10),
(3, 12, '8321067459', '2020-11-06 09:35:08', 98, 2),
(4, 10, '8321067459', '2020-11-06 09:53:26', 130, 10),
(5, 12, '8321067459', '2020-11-06 09:53:26', 100, 10),
(6, 17, '1785024396', '2020-11-06 10:09:23', 98, 12),
(7, 17, '1785024396', '2020-11-06 10:09:48', 110, 10),
(8, 18, '1785024396', '2020-11-06 10:09:52', 99, 1),
(9, 17, '1785024396', '2020-11-06 10:11:54', 120, 10),
(10, 18, '1785024396', '2020-11-06 10:11:54', 100, 10),
(11, 7, '1408395267', '2020-11-06 10:21:38', 99, 1),
(12, 7, '1408395267', '2020-11-06 10:21:54', 100, 1),
(13, 19, '1408395267', '2020-11-06 10:22:07', 100, 1),
(14, 7, '1408395267', '2020-11-06 10:22:22', 101, 9),
(15, 19, '1408395267', '2020-11-06 10:22:22', 101, 4),
(16, 7, '1408395267', '2020-11-06 10:27:47', 110, 10),
(17, 19, '1408395267', '2020-11-06 10:27:47', 105, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_toko`
--

CREATE TABLE `tb_barang_toko` (
  `barang_toko_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `barang_detail_id` int(11) NOT NULL,
  `ukuran_id` int(11) NOT NULL,
  `barang_toko_jml` int(11) NOT NULL,
  `barang_toko_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_toko`
--

INSERT INTO `tb_barang_toko` (`barang_toko_id`, `id_toko`, `barang_detail_id`, `ukuran_id`, `barang_toko_jml`, `barang_toko_tgl`) VALUES
(1, 1, 12, 9, 10, '2020-11-04'),
(3, 1, 10, 7, 10, '2020-11-04'),
(4, 2, 10, 7, 10, '2020-11-04'),
(7, 1, 17, 32, 4, '2020-11-05'),
(8, 1, 7, 43, 10, '2020-11-05'),
(22, 2, 12, 9, 10, '2020-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli`
--

CREATE TABLE `tb_beli` (
  `beli_id` int(11) NOT NULL,
  `beli_invoice` varchar(255) NOT NULL,
  `beli_tgl_beli` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `beli_create_at` datetime NOT NULL,
  `beli_create_by` int(11) NOT NULL,
  `beli_nota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beli`
--

INSERT INTO `tb_beli` (`beli_id`, `beli_invoice`, `beli_tgl_beli`, `supplier_id`, `beli_create_at`, `beli_create_by`, `beli_nota`) VALUES
(3, 'P00001', '2020-11-07', 2, '2020-11-07 08:56:37', 1, '20201107085637-73334.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli_detail`
--

CREATE TABLE `tb_beli_detail` (
  `beli_detail_id` int(11) NOT NULL,
  `beli_id` int(11) NOT NULL,
  `beli_invoice` varchar(255) NOT NULL,
  `barang_detail_id` int(11) NOT NULL,
  `beli_detail_jml` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beli_detail`
--

INSERT INTO `tb_beli_detail` (`beli_detail_id`, `beli_id`, `beli_invoice`, `barang_detail_id`, `beli_detail_jml`, `satuan_id`) VALUES
(7, 3, 'P00001', 10, 1, 1),
(8, 3, 'P00001', 12, 1, 1),
(9, 3, 'P00001', 17, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli_tmp`
--

CREATE TABLE `tb_beli_tmp` (
  `beli_tmp_id` int(11) NOT NULL,
  `beli_invoice` varchar(255) NOT NULL,
  `barang_detail_id` int(11) NOT NULL,
  `beli_tmp_jml` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, '1098275436', 0),
(2, 2, '6950728413', 0),
(3, 3, '0675289314', 0),
(4, 4, '0896415273', 0),
(5, 5, '3627849510', 0),
(6, 6, '5672438019', 0),
(7, 7, '4096831572', 0),
(8, 8, '6409738215', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_alamat`
--

CREATE TABLE `tb_daftar_alamat` (
  `alamat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_telp_penerima` varchar(255) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_alamat`
--

INSERT INTO `tb_daftar_alamat` (`alamat_id`, `member_id`, `nama_penerima`, `no_telp_penerima`, `id_prov`, `id_kota`, `alamat`, `kode_pos`, `keterangan`) VALUES
(2, 1, 'sahrul gunawan', '081234567890', 32, 318, 'Padang', '12345', 'alamat rumah'),
(3, 1, 'ASJL', 'ASDDA', 16, 450, 'HDASDASJK', '46283', 'alamat kantor'),
(4, 3, 'Syahroel', '081234345434', 32, 318, 'Padang', '344343', 'alamat rumah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_profesi`
--

CREATE TABLE `tb_data_profesi` (
  `data_profesi_id` int(11) NOT NULL,
  `data_profesi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_profesi`
--

INSERT INTO `tb_data_profesi` (`data_profesi_id`, `data_profesi_nama`) VALUES
(1, 'Pelajar'),
(2, 'Karyawan Swasta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_toko_online`
--

CREATE TABLE `tb_data_toko_online` (
  `data_toko_online_id` int(11) NOT NULL,
  `data_toko_online_nama` varchar(255) NOT NULL,
  `data_toko_online_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_toko_online`
--

INSERT INTO `tb_data_toko_online` (`data_toko_online_id`, `data_toko_online_nama`, `data_toko_online_link`) VALUES
(1, 'Shopee', '<p><a target=\"_blank\" href=\"http://shopee.co.id\">Shopee</a></p>'),
(2, 'Tokopedia', '<p><a target=\"_blank\" href=\"http://Tokopedia.com\">Tokopedia</a></p>'),
(3, 'Bukalapak', '<p><a target=\"_blank\" href=\"http://Bukalapak.co.id\">Bukalapak</a></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_return`
--

CREATE TABLE `tb_detail_return` (
  `id_detail_return` int(11) NOT NULL,
  `id_return` varchar(191) NOT NULL,
  `id_stok_toko` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `penyesuaian` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_return`
--

INSERT INTO `tb_detail_return` (`id_detail_return`, `id_return`, `id_stok_toko`, `stok_awal`, `penyesuaian`, `stok_akhir`) VALUES
(15, 'STO_1328059674', 2, 137, 3, 140),
(16, 'STO_1328059674', 2, 0, 0, 0),
(17, 'STO_1328059674', 2, 0, 0, 0),
(18, 'STO_1328059674', 2, 0, 0, 0),
(19, 'STO_1328059674', 2, 0, 0, 0),
(20, 'STO_1328059674', 2, 0, 0, 0),
(21, 'STO_1328059674', 2, 0, 0, 0),
(22, 'STO_1328059674', 2, 0, 0, 0),
(23, 'STO_1328059674', 2, 0, 0, 0),
(24, 'STO_1328059674', 2, 0, 0, 0),
(25, 'STO_1328059674', 2, 0, 0, 0),
(26, 'STO_1328059674', 2, 0, 0, 0),
(27, 'STO_1328059674', 2, 0, 0, 0),
(28, 'STO_1328059674', 2, 0, 0, 0),
(29, 'STO_1328059674', 2, 0, 0, 0),
(30, 'STO_1328059674', 2, 0, 0, 0),
(31, 'STO_1328059674', 2, 0, 0, 0),
(32, 'STO_1328059674', 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `diskon` float NOT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_habis` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_diskon`, `id_metode`, `id_bank`, `diskon`, `tanggal_mulai`, `tanggal_habis`) VALUES
(33, 2, 1, 10, '2020-10-19 10:14:00', '2020-12-24 10:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon_detail`
--

CREATE TABLE `tb_diskon_detail` (
  `id_diskon` int(11) NOT NULL,
  `id_toko_detail` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `diskon_rupiah` varchar(11) NOT NULL,
  `diskon_persen` double NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon_umur`
--

CREATE TABLE `tb_diskon_umur` (
  `id_umur` int(11) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `diskon` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diskon_umur`
--

INSERT INTO `tb_diskon_umur` (`id_umur`, `umur`, `diskon`) VALUES
(4, '15', '0.9'),
(5, '90', '8');

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

--
-- Dumping data for table `tb_distributor`
--

INSERT INTO `tb_distributor` (`distributor_id`, `distributor_nama`, `distributor_perusahaan`, `distributor_notelp`, `distributor_email`, `distributor_alamat`) VALUES
(1, '1', '1', '1', '1', '1'),
(3, '1', '1', '1', '1', '1');

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
(1, 1, 'Basket Ball'),
(2, 1, 'Football/Soccers'),
(3, 1, 'Outdoor'),
(4, 1, 'Running'),
(5, 1, 'Sportwear'),
(6, 1, 'Tennis'),
(7, 1, 'Training'),
(8, 2, 'Basket Ball'),
(9, 2, 'Football/Soccers'),
(10, 2, 'Outdoor'),
(11, 2, 'Running'),
(12, 2, 'Sportwear'),
(13, 2, 'Tennis'),
(14, 2, 'Training'),
(15, 3, 'Basket Ball'),
(16, 3, 'Football/Soccers'),
(17, 3, 'Outdoor'),
(18, 3, 'Running'),
(19, 3, 'Sportwear'),
(20, 3, 'Tennis'),
(21, 3, 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `tb_flash_diskon`
--

CREATE TABLE `tb_flash_diskon` (
  `id_diskon` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_berakhir` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_flash_diskon`
--

INSERT INTO `tb_flash_diskon` (`id_diskon`, `judul`, `kategori`, `tgl_mulai`, `tgl_berakhir`, `status`) VALUES
(1, 'testing', 'All', '2020-09-10 06:27:27', '2020-09-24 00:00:00', 0),
(2, 'testing', 'All', '2020-10-17 11:59:00', '2020-10-25 11:59:00', 0),
(3, 'testing', 'All', '2020-10-17 12:21:00', '2020-10-27 12:21:00', 0),
(4, 'testing', 'All', '2020-10-19 09:36:00', '2020-10-31 09:36:00', 0),
(5, '12', 'All', '2020-11-30 04:22:00', '2020-12-30 04:22:00', 0),
(6, 'test', 'All', '2020-02-12 23:59:00', '2020-12-30 23:59:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_flash_diskon_detail`
--

CREATE TABLE `tb_flash_diskon_detail` (
  `id_diskon_detail` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `artikel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_flash_diskon_detail`
--

INSERT INTO `tb_flash_diskon_detail` (`id_diskon_detail`, `id_diskon`, `artikel`) VALUES
(1, 1, '1098275436'),
(2, 2, '1098275436'),
(3, 2, '3627849510'),
(4, 3, '1098275436'),
(5, 3, '3627849510'),
(6, 4, '1098275436'),
(7, 4, '3627849510'),
(8, 5, '3'),
(9, 5, '4'),
(10, 5, '5'),
(11, 6, '3'),
(12, 6, '4'),
(13, 6, '5'),
(14, 6, '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_flash_diskon_persen`
--

CREATE TABLE `tb_flash_diskon_persen` (
  `id_persen` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `artikel` varchar(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `persen` double NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_flash_diskon_persen`
--

INSERT INTO `tb_flash_diskon_persen` (`id_persen`, `id_diskon`, `artikel`, `barcode`, `persen`, `potongan`) VALUES
(1, 1, 'G0001', 'GD0001', 4, 2400),
(2, 1, 'G0001', 'GD0002', 4, 2400),
(3, 1, 'G0001', 'GD0003', 4, 2400),
(4, 6, 'B92384', '1212', 0.9, 900),
(5, 6, 'B92384', '2', 0.9, 900),
(6, 6, 'SP234', '1', 0.9, 900),
(7, 6, 'SP234', '23', 0.9, 900),
(8, 6, 'SP234', '3', 0.9, 900),
(9, 6, 'SP234', '2', 0.9, 900),
(10, 6, 'B92384', '1212', 0.9, 900),
(11, 6, 'B92384', '2', 0.9, 900),
(12, 6, 'SP234', '1', 0.9, 900),
(13, 6, 'SP234', '23', 0.9, 900),
(14, 6, 'SP234', '3', 0.9, 900),
(15, 6, 'SP234', '2', 0.9, 900);

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
(1, 'Men'),
(2, 'Women'),
(3, 'Unisex');

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
(1, 'adminowner', '<p>test</p>'),
(2, 'admingudang', '<p>test</p>'),
(3, 'karyawan', '<p>test</p>');

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
(1, '238157', '123456789', 'Admin Owner', 'padang', '123456789', 'admin@gmail.com', 'adminowner', '$2y$10$ifIlX28K/sSWkmTqTUkMl.k3GM5hu49xZk4wo3ynBqeyKoR448JBq', 'terbukalah', '1-11425.png', '2-15205.png', 1, 0),
(9, '201203113817', 'Nulla exercitationem', 'Exercitationem labor', 'Ratione ipsum illo e', 'Elit eu delectus', 'zexom@mailinator.com', 'cixeb', '$2y$10$juIesvcD1qjHCiQciR/RGuHtAgH8hyRxBa6pVSL8IRaKNqhqHKxoC', '12345', '20201203113817-35383.png', '20201203113817-71988.png', 3, 1);

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
-- Table structure for table `tb_konfirmasi_bayar`
--

CREATE TABLE `tb_konfirmasi_bayar` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `namabanks` varchar(50) NOT NULL,
  `noreks` varchar(50) NOT NULL,
  `atasnamas` varchar(50) NOT NULL,
  `total_bayars` int(11) NOT NULL,
  `bukti` text NOT NULL,
  `tgl_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfirmasi_bayar`
--

INSERT INTO `tb_konfirmasi_bayar` (`id_konfirmasi`, `id_order`, `id_bank`, `namabanks`, `noreks`, `atasnamas`, `total_bayars`, `bukti`, `tgl_bayar`) VALUES
(1, '3320922102744', 1, 'bang gem', '123123', 'bo', 1231231231, '20200922103017jas.png', '2020-09-22 10:30:17'),
(2, '3830922143946', 1, 'BRI', '12312312312321', 'gema fajar', 100000, '20200923143158noimage.png', '2020-09-23 14:31:58');

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
  `member_notelp` varchar(255) NOT NULL,
  `member_tgl_lahir` date NOT NULL,
  `member_gender` varchar(255) NOT NULL,
  `member_profesi` varchar(255) NOT NULL,
  `alamat_id` int(11) NOT NULL,
  `member_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_kode`, `member_nama`, `member_email`, `member_password`, `member_password_repeat`, `member_notelp`, `member_tgl_lahir`, `member_gender`, `member_profesi`, `alamat_id`, `member_foto`) VALUES
(3, '200918103856', 'Sahrul', 'sahrul@gmail.com', '$2y$10$bbAO0Rib4Sgy2W/qRWt7kuA0RNAlV/K1vKDvSDEv26184ZKyb0NcW', '12345', '081234567890', '2020-12-08', 'Pria', '1', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member_point`
--

CREATE TABLE `tb_member_point` (
  `id_point` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `royalti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member_point`
--

INSERT INTO `tb_member_point` (`id_point`, `member_id`, `point`, `royalti`) VALUES
(2, 3, 4208, 21808);

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
(27, 'BARRICADE CLUB'),
(28, '1');

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
(1, 'Cash'),
(2, 'Debit Card'),
(3, 'Credit Card'),
(4, 'Cash + Debit Card'),
(5, 'Cash + Credit Card'),
(6, 'Point'),
(7, 'Point + Credit Card'),
(8, 'Point + Debit Card'),
(9, 'Point + Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `id_order` varchar(20) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `member_id` int(11) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `nama_penerima` varchar(20) NOT NULL,
  `jmlberat` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `resi` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`id_order`, `status_order`, `tgl_order`, `jam_order`, `member_id`, `kurir`, `service`, `ongkir`, `potongan`, `total`, `keterangan`, `id_prov`, `id_kota`, `alamat`, `kode_pos`, `nama_penerima`, `jmlberat`, `id_toko`, `resi`) VALUES
('3830922143946', 'Barang Telah Dikirim', '2020-09-22', '14:39:46', 3, 'jne', 'REG', 22000, 0, 79600, 'alamat rumah', 32, 318, 'Padang', '344343', 'Syahroel', 200, 1, '123123wasd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders_detail`
--

CREATE TABLE `tb_orders_detail` (
  `id_detail_orders` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_stok_toko` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_orders_detail`
--

INSERT INTO `tb_orders_detail` (`id_detail_orders`, `id_order`, `id`, `harga`, `id_stok_toko`, `qty`) VALUES
(2, '3830922143946', 1098275436, 57600, 3, 1);

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
(1, 1, '2020-09-14', 'stock opname', 0, '2020-09-14 04:29:42', '1'),
(6, 1, '2020-09-01', 'barang rusak', 0, '2020-09-14 10:39:11', '1'),
(7, 1, '2020-09-17', 'dipakai sendiri', 1, '2020-09-17 04:24:06', '1'),
(8, 1, '2020-09-24', 'stock opname', 0, '2020-09-24 02:53:14', '1'),
(9, 1, '2020-10-17', 'stock opname', 0, '2020-10-17 09:09:52', '1'),
(10, 1, '2020-10-17', 'stock opname', 0, '2020-10-17 09:20:51', '1'),
(11, 1, '2020-10-17', 'stock opname', 0, '2020-10-17 09:21:37', '1');

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
(1, 1, 2, 90, 0, 90),
(2, 1, 3, 13, 0, 13),
(7, 6, 4, 10, 0, 10),
(8, 6, 9, 20, 0, 20),
(9, 7, 2, 90, 0, 90),
(10, 7, 3, 11, 0, 11),
(11, 8, 2, 137, 0, 137);

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
-- Table structure for table `tb_return_barang`
--

CREATE TABLE `tb_return_barang` (
  `return_barang_id` int(11) NOT NULL,
  `return_barang_kode` varchar(255) NOT NULL,
  `return_barang_tgl` datetime NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_return_barang`
--

INSERT INTO `tb_return_barang` (`return_barang_id`, `return_barang_kode`, `return_barang_tgl`, `id_toko`, `id_karyawan`) VALUES
(4, 'STO_5013769482', '2020-11-07 16:01:15', 1, 1),
(5, 'STO_7320865941', '2020-11-07 16:02:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_return_barang_detail`
--

CREATE TABLE `tb_return_barang_detail` (
  `return_barang_detail_id` int(11) NOT NULL,
  `return_barang_id` int(11) NOT NULL,
  `return_barang_kode` varchar(255) NOT NULL,
  `barang_toko_id` int(11) NOT NULL,
  `return_barang_detail_stok_awal` int(11) NOT NULL,
  `return_barang_detail_stok_tambah` int(11) NOT NULL,
  `return_barang_detail_stok_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_return_barang_detail`
--

INSERT INTO `tb_return_barang_detail` (`return_barang_detail_id`, `return_barang_id`, `return_barang_kode`, `barang_toko_id`, `return_barang_detail_stok_awal`, `return_barang_detail_stok_tambah`, `return_barang_detail_stok_akhir`) VALUES
(6, 4, 'STO_5013769482', 1, 20, 2, 22),
(7, 4, 'STO_5013769482', 3, 9, 1, 10),
(8, 4, 'STO_5013769482', 7, 1, 1, 2),
(9, 5, 'STO_7320865941', 1, 22, 2, 24),
(10, 5, 'STO_7320865941', 7, 2, 2, 4);

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
(1, 'Pasang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_orders`
--

CREATE TABLE `tb_status_orders` (
  `id_status` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `status_order` varchar(50) NOT NULL,
  `tgl_status` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_orders`
--

INSERT INTO `tb_status_orders` (`id_status`, `id_order`, `status_order`, `tgl_status`) VALUES
(1, '3320922102744', 'Menunggu Pembayaran', '2020-09-22 10:27:44'),
(2, '3830922143946', 'Menunggu Pembayaran', '2020-09-22 14:39:46');

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
(1, 2, 'Sepatu Bola'),
(2, 2, 'Sepatu Futsal'),
(3, 1, 'Sepatu Basket'),
(4, 1, 'Sepatu Sneakers Basket'),
(5, 2, 'Sepatu Sneakers Bola'),
(6, 3, 'Sepatu Outdoor'),
(7, 3, 'Sandal Outdoor'),
(8, 7, 'Sepatu Training'),
(9, 7, 'Sepatu Sneakers Training'),
(10, 5, 'Sepatu Sneakers'),
(11, 5, 'Sandal Slides'),
(12, 4, 'Sepatu Running'),
(13, 4, 'Sepatu Sneakers Running'),
(14, 6, 'Sepatu Tenis'),
(15, 6, 'Sepatu Sneakers Tenis'),
(16, 2, 'Basket Ball'),
(18, 3, 'Mount Outdoor'),
(19, 10, 'Mount Outdoor'),
(20, 18, 'Running Beach');

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
(2, '1', '1', '1', '1', '1'),
(3, 'q', 'q', 'q', 'qq', 'q');

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
  `transaksi_point` int(11) NOT NULL,
  `transaksi_total_belanja` varchar(255) NOT NULL,
  `transaksi_kembalian` varchar(255) NOT NULL,
  `transaksi_bank` varchar(255) NOT NULL,
  `transaksi_tipe_diskon` varchar(255) NOT NULL,
  `transaksi_diskon` varchar(255) NOT NULL DEFAULT '0',
  `transaksi_diskon_bank` varchar(11) DEFAULT NULL,
  `transaksi_create_at` datetime NOT NULL,
  `transaksi_create_by` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_kode`, `transaksi_tgl`, `id_toko`, `transaksi_jumlah_beli`, `transaksi_tipe_bayar`, `transaksi_cash`, `transaksi_debit`, `transaksi_point`, `transaksi_total_belanja`, `transaksi_kembalian`, `transaksi_bank`, `transaksi_tipe_diskon`, `transaksi_diskon`, `transaksi_diskon_bank`, `transaksi_create_at`, `transaksi_create_by`, `keterangan`) VALUES
(1, 'T00001', '2020-11-17', 1, 2, '7', 0, 217800, 2200, '220000', '0', '1', '', '0', '0', '2020-11-17 09:10:22', 1, 'ok'),
(2, 'T00002', '2020-11-17', 1, 1, '7', 0, 117800, 2200, '120000', '0', '2', '', '0', '0', '2020-11-17 09:31:54', 1, 'ok'),
(3, 'T00003', '2020-11-17', 1, 1, '1', 100000, 0, 0, '100000', '0', '', 'dis_harga', '20000', '', '2020-11-30 11:55:23', 1, 'ok'),
(4, 'T00004', '2020-12-01', 1, 1, '1', 100000, 0, 0, '100000', '0', '', 'dis_harga', '20000', '', '2020-12-01 09:08:25', 1, 'ok'),
(5, 'T00005', '2020-12-01', 1, 1, '7', 0, 119800, 200, '120000', '0', '1', '', '0', '0', '2020-12-01 11:56:23', 1, 'ok'),
(6, 'T00006', '2020-12-01', 1, 1, '7', 0, 115000, 200, '115200', '0', '4', 'dis_persen', '4', '0', '2020-12-01 13:24:50', 1, 'ok'),
(7, 'T00007', '2020-12-01', 1, 1, '7', 0, 104600, 1000, '105600', '0', '1', 'dis_persen', '12', '0', '2020-12-01 15:28:45', 1, 'ok');

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
  `id_gudang` int(11) NOT NULL COMMENT 'Sebenarnya id_detail dari tb_gudang_detail ',
  `detail_tipe_konsumen` varchar(255) NOT NULL,
  `id_konsumen` varchar(255) DEFAULT NULL,
  `detail_jumlah_beli` int(11) NOT NULL,
  `detail_total_harga` int(11) NOT NULL,
  `detail_potongan` varchar(20) NOT NULL,
  `detail_diskon1` varchar(20) DEFAULT NULL COMMENT 'dari diskon item '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`detail_id`, `transaksi_id`, `detail_kode`, `detail_tgl`, `id_toko`, `id_gudang`, `detail_tipe_konsumen`, `id_konsumen`, `detail_jumlah_beli`, `detail_total_harga`, `detail_potongan`, `detail_diskon1`) VALUES
(1, 1, 'T00001', '2020-11-17', 1, 17, 'Member', '3', 1, 120000, '120000', '0'),
(2, 1, 'T00001', '2020-11-17', 1, 12, 'Member', '3', 1, 100000, '100000', '0'),
(4, 2, 'T00002', '2020-11-17', 1, 17, 'Member', '3', 1, 120000, '120000', '0'),
(5, 3, 'T00003', '2020-11-17', 1, 17, 'Member', '3', 1, 120000, '120000', '0'),
(6, 3, 'T00003', '2020-11-17', 0, 0, '', '0', 0, 0, '', ''),
(7, 4, 'T00004', '2020-12-01', 1, 17, 'Non Member', '0', 1, 120000, '120000', '0'),
(8, 5, 'T00005', '2020-12-01', 1, 17, 'Member', '3', 1, 120000, '120000', '0'),
(9, 6, 'T00006', '2020-12-01', 1, 17, 'Member', '3', 1, 120000, '120000', '0'),
(10, 7, 'T00007', '2020-12-01', 1, 17, 'Member', '3', 1, 120000, '120000', '0');

--
-- Triggers `tb_transaksi_detail`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER INSERT ON `tb_transaksi_detail` FOR EACH ROW BEGIN
UPDATE tb_barang_toko SET barang_toko_jml = barang_toko_jml - NEW.detail_jumlah_beli WHERE id_toko = NEW.id_toko AND barang_detail_id = NEW.id_gudang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_online`
--

CREATE TABLE `tb_transaksi_online` (
  `transol_id` int(11) NOT NULL,
  `transol_kode` varchar(255) NOT NULL,
  `transol_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL COMMENT 'dari toko',
  `data_toko_online_id` int(11) NOT NULL COMMENT 'dati tb_data_toko_online',
  `transol_jumlah_beli` int(11) NOT NULL,
  `transol_tipe_bayar` varchar(255) NOT NULL,
  `transol_cash` int(11) NOT NULL,
  `transol_debit` int(11) NOT NULL,
  `transol_total_belanja` varchar(255) NOT NULL,
  `transol_kembalian` varchar(255) NOT NULL,
  `transol_bank` varchar(255) NOT NULL,
  `transol_tipe_diskon` varchar(255) NOT NULL,
  `transol_diskon` int(11) DEFAULT NULL,
  `transol_diskon_bank` varchar(255) NOT NULL,
  `transol_create_at` datetime NOT NULL,
  `transol_create_by` int(11) NOT NULL,
  `transol_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_online`
--

INSERT INTO `tb_transaksi_online` (`transol_id`, `transol_kode`, `transol_tgl`, `id_toko`, `data_toko_online_id`, `transol_jumlah_beli`, `transol_tipe_bayar`, `transol_cash`, `transol_debit`, `transol_total_belanja`, `transol_kembalian`, `transol_bank`, `transol_tipe_diskon`, `transol_diskon`, `transol_diskon_bank`, `transol_create_at`, `transol_create_by`, `transol_keterangan`) VALUES
(8, 'N00001', '2020-11-17', 1, 1, 2, '1', 220000, 0, '220000', '0', '0', '0', 0, '0', '2020-11-17 14:39:20', 1, 'ok'),
(9, 'N00002', '2020-11-30', 2, 0, 1, '1', 0, 0, '100000', '', '0', '0', 0, '0', '2020-11-30 12:02:42', 1, ''),
(10, 'N00003', '2020-12-01', 1, 1, 2, '1', 216000, 0, '216000', '0', '0', 'dis_persen', 10, '0', '2020-12-01 14:42:05', 1, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_online_detail`
--

CREATE TABLE `tb_transaksi_online_detail` (
  `transol_detail_id` int(11) NOT NULL,
  `transol_id` int(11) NOT NULL,
  `transol_detail_kode` varchar(255) NOT NULL,
  `transol_detail_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL COMMENT 'Sebenarnya id_detail dari tb_gudang_detail ',
  `data_toko_online_id` int(11) NOT NULL,
  `transol_detail_jumlah_beli` int(11) NOT NULL,
  `transol_detail_total_harga` int(11) NOT NULL,
  `transol_detail_potongan` varchar(255) DEFAULT NULL,
  `transol_detail_diskon1` varchar(255) DEFAULT NULL COMMENT 'dari diskon item '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_online_detail`
--

INSERT INTO `tb_transaksi_online_detail` (`transol_detail_id`, `transol_id`, `transol_detail_kode`, `transol_detail_tgl`, `id_toko`, `id_gudang`, `data_toko_online_id`, `transol_detail_jumlah_beli`, `transol_detail_total_harga`, `transol_detail_potongan`, `transol_detail_diskon1`) VALUES
(17, 8, 'N00001', '2020-11-17', 1, 17, 1, 1, 120000, '120000', '0'),
(18, 8, 'N00001', '2020-11-17', 1, 12, 1, 1, 100000, '100000', '0'),
(19, 9, 'N00002', '2020-11-30', 2, 12, 0, 1, 100000, '100000', '0'),
(20, 10, 'N00003', '2020-12-01', 1, 17, 1, 1, 120000, '120000', '0'),
(21, 10, 'N00003', '2020-12-01', 1, 17, 1, 1, 120000, '120000', '0');

--
-- Triggers `tb_transaksi_online_detail`
--
DELIMITER $$
CREATE TRIGGER `kurang_online` AFTER INSERT ON `tb_transaksi_online_detail` FOR EACH ROW BEGIN
UPDATE tb_barang_toko SET barang_toko_jml = barang_toko_jml - NEW.transol_detail_jumlah_beli WHERE id_toko = NEW.id_toko AND barang_detail_id = NEW.id_gudang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_online_tmp`
--

CREATE TABLE `tb_transaksi_online_tmp` (
  `transol_tmp_id` int(11) NOT NULL,
  `transol_tmp_kode` varchar(255) NOT NULL,
  `transol_tmp_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL COMMENT ' 	Sebenarnya id_detail dari tb_gudang_detail ',
  `data_toko_online_id` int(11) NOT NULL,
  `transol_tmp_jumlah_beli` int(11) NOT NULL,
  `transol_tmp_total_harga` int(11) NOT NULL,
  `transol_tmp_potongan` varchar(255) DEFAULT NULL,
  `transol_tmp_diskon1` varchar(255) DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_tmp`
--

CREATE TABLE `tb_transaksi_tmp` (
  `tmp_id` int(11) NOT NULL,
  `tmp_kode` varchar(255) NOT NULL,
  `tmp_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL COMMENT 'Sebenarnya id_detail dari tb_gudang_detail',
  `tmp_tipe_konsumen` varchar(255) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `tmp_jumlah_beli` int(11) NOT NULL,
  `tmp_total_harga` int(11) NOT NULL,
  `potongan` varchar(20) NOT NULL,
  `diskon1` varchar(10) DEFAULT NULL COMMENT 'dari diskon item',
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer_barang`
--

CREATE TABLE `tb_transfer_barang` (
  `transfer_barang_id` int(11) NOT NULL,
  `transfer_barang_kode` varchar(255) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_toko_tujuan` int(11) NOT NULL,
  `transfer_barang_tgl` date NOT NULL,
  `transfer_barang_acc_owner` int(11) NOT NULL,
  `transfer_barang_ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transfer_barang`
--

INSERT INTO `tb_transfer_barang` (`transfer_barang_id`, `transfer_barang_kode`, `id_toko`, `id_toko_tujuan`, `transfer_barang_tgl`, `transfer_barang_acc_owner`, `transfer_barang_ket`) VALUES
(1, 'K00001', 0, 1, '2020-11-12', 3, ''),
(2, 'K00002', 1, 0, '2020-11-13', 3, 'ok'),
(6, 'K00003', 1, 2, '2020-11-14', 3, 'lenkap'),
(7, 'K00004', 1, 2, '2020-11-18', 3, 'lengkap ok manatp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer_barang_detail`
--

CREATE TABLE `tb_transfer_barang_detail` (
  `transfer_barang_detail_id` int(11) NOT NULL,
  `transfer_barang_id` int(11) NOT NULL,
  `barang_detail_id` int(11) NOT NULL,
  `ukuran_id` int(11) NOT NULL,
  `transfer_barang_detail_jml` int(11) NOT NULL,
  `transfer_barang_detail_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transfer_barang_detail`
--

INSERT INTO `tb_transfer_barang_detail` (`transfer_barang_detail_id`, `transfer_barang_id`, `barang_detail_id`, `ukuran_id`, `transfer_barang_detail_jml`, `transfer_barang_detail_status`) VALUES
(1, 1, 10, 7, 1, 1),
(2, 1, 12, 9, 1, 1),
(3, 2, 12, 9, 1, 1),
(4, 2, 10, 7, 1, 1),
(11, 6, 12, 9, 2, 1),
(12, 6, 10, 7, 1, 2),
(13, 7, 12, 9, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `ukuran_kategori` varchar(255) NOT NULL,
  `gender_id` varchar(255) NOT NULL,
  `merk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `subdivisi_id` int(11) NOT NULL,
  `ukuran_default` varchar(255) DEFAULT NULL,
  `sepatu_ue` varchar(255) DEFAULT NULL,
  `sepatu_uk` varchar(255) DEFAULT NULL,
  `sepatu_us` varchar(255) DEFAULT NULL,
  `sepatu_cm` varchar(255) DEFAULT NULL,
  `kaos_kaki_eu` varchar(255) DEFAULT NULL,
  `kaos_kaki_size` varchar(255) DEFAULT NULL,
  `barang_lainnya_nama_ukuran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`ukuran_id`, `ukuran_kategori`, `gender_id`, `merk_id`, `kategori_id`, `divisi_id`, `subdivisi_id`, `ukuran_default`, `sepatu_ue`, `sepatu_uk`, `sepatu_us`, `sepatu_cm`, `kaos_kaki_eu`, `kaos_kaki_size`, `barang_lainnya_nama_ukuran`) VALUES
(2, 'Sepatu', '1,2,3', 1, 1, 1, 3, 'EU', '2', '2', '2', '2', NULL, NULL, NULL),
(3, 'Sepatu', '1,2,3', 1, 1, 1, 3, NULL, '3', '3', '3', '3', NULL, NULL, NULL),
(4, 'Sepatu', '1', 1, 1, 1, 4, NULL, '1', '1', '1', '1', NULL, NULL, NULL),
(5, 'Sepatu', '1', 1, 1, 1, 4, NULL, '2', '2', '2', '2', NULL, NULL, NULL),
(6, 'Sepatu', '1', 1, 1, 1, 4, NULL, '3', '3', '3', '3', NULL, NULL, NULL),
(7, 'Sepatu', '2', 2, 1, 1, 3, 'UK', '1', '1', '1', '1', NULL, NULL, NULL),
(8, 'Sepatu', '2', 2, 1, 1, 3, NULL, '2', '2', '2', '2', NULL, NULL, NULL),
(9, 'Sepatu', '2', 2, 1, 1, 3, 'EU', '1', '2', '3', '4', NULL, NULL, NULL),
(10, 'Sepatu', '3', 2, 1, 1, 4, NULL, '1', '1', '1', '1', NULL, NULL, NULL),
(11, 'Sepatu', '3', 2, 1, 1, 4, NULL, '2', '2', '2', '2', NULL, NULL, NULL),
(12, 'Sepatu', '3', 2, 1, 1, 4, NULL, '3', '3', '3', '3', NULL, NULL, NULL),
(31, 'Kaos Kaki', '1', 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(32, 'Kaos Kaki', '1', 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, '2', '3', NULL),
(33, 'Kaos Kaki', '1', 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL),
(34, 'Kaos Kaki', '2', 1, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(35, 'Kaos Kaki', '2', 1, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(36, 'Kaos Kaki', '2', 1, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(37, 'Kaos Kaki', '1', 2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(38, 'Kaos Kaki', '1', 2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, '2', '2', NULL),
(39, 'Kaos Kaki', '1', 2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL),
(40, 'Kaos Kaki', '2', 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(41, 'Kaos Kaki', '2', 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, '2', '2', NULL),
(42, 'Kaos Kaki', '2', 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL),
(43, 'Barang Lainnya', '1', 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(44, 'Barang Lainnya', '1', 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2'),
(45, 'Barang Lainnya', '1', 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3'),
(46, 'Barang Lainnya', '1', 1, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(47, 'Barang Lainnya', '1', 1, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2'),
(48, 'Barang Lainnya', '1', 1, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3'),
(49, 'Barang Lainnya', '3', 2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(50, 'Barang Lainnya', '3', 2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2'),
(51, 'Barang Lainnya', '3', 2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3'),
(52, 'Barang Lainnya', '1,2', 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(53, 'Barang Lainnya', '1,2', 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2'),
(54, 'Barang Lainnya', '1,2', 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3'),
(59, 'Sepatu', '1', 1, 2, 10, 19, NULL, '36', '3.5', '4', '22', NULL, NULL, NULL),
(60, 'Sepatu', '', 2, 3, 18, 20, NULL, '12', '13', '14', '15', NULL, NULL, NULL),
(61, 'Sepatu', '1', 1, 2, 10, 19, NULL, '36', '3.5', '4', '22', NULL, NULL, NULL),
(62, 'Sepatu', '1,2', 2, 3, 18, 20, NULL, '12', '13', '14', '15', NULL, NULL, NULL),
(63, 'Kaos Kaki', '1', 1, 2, 10, 19, NULL, NULL, NULL, NULL, NULL, '36', '3.5', NULL),
(64, 'Kaos Kaki', '1,2', 2, 3, 18, 20, NULL, NULL, NULL, NULL, NULL, '12', '13', NULL),
(65, 'Sepatu', '1', 1, 2, 10, 19, NULL, '1', '1', '1', '1', NULL, NULL, NULL),
(66, 'Sepatu', '1,2', 2, 3, 18, 20, NULL, '3', '1', '1', '1', NULL, NULL, NULL),
(67, 'Barang Lainnya', '1', 1, 2, 10, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(68, 'Barang Lainnya', '1,2', 2, 3, 18, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3'),
(69, 'Sepatu', '1', 2, 1, 1, 3, 'EU', '4', '5', '6', '7', NULL, NULL, NULL),
(70, 'Sepatu', '1', 2, 1, 1, 3, 'EU', '6', '7', '8', '9', NULL, NULL, NULL),
(71, 'Sepatu', '1', 1, 2, 10, 19, 'EU', '36', '3.5', '4', '22', NULL, NULL, NULL),
(72, 'Sepatu', '1,2', 2, 3, 18, 20, 'UK', '12', '13', '4', '15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_kode` varchar(255) NOT NULL,
  `voucher_nama` varchar(255) NOT NULL,
  `voucher_jenis` varchar(225) NOT NULL,
  `voucher_harga` float NOT NULL,
  `voucher_tgl_mulai` date DEFAULT NULL,
  `voucher_tgl_akhir` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `minimum_belanja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher`
--

INSERT INTO `tb_voucher` (`voucher_id`, `voucher_kode`, `voucher_nama`, `voucher_jenis`, `voucher_harga`, `voucher_tgl_mulai`, `voucher_tgl_akhir`, `id_toko`, `minimum_belanja`) VALUES
(1, 'V00001', '12', 'harga', 4, '2020-09-17', '2020-09-30', 0, NULL),
(2, 'V00002', '1233', 'harga', 5000, '2020-09-24', '2020-09-30', 1, NULL),
(3, 'V00003', '12', 'persen', 12, '2020-11-30', '2020-12-05', 1, '12'),
(4, 'V00004', '123', 'harga', 123, '2020-12-08', '2020-12-15', 0, '123'),
(5, 'V00005', 'yut', 'persen', 10, '2020-12-09', '2020-12-23', 1, '100000'),
(6, 'V00006', 'Ea voluptatum magni ', 'persen', 17, '1978-01-11', '2011-01-14', 2, 'Nemo itaque eos adi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher_detail`
--

CREATE TABLE `tb_voucher_detail` (
  `voucher_detail_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `voucher_detail_token` varchar(255) NOT NULL,
  `voucher_detail_status` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `minimum_belanja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher_detail`
--

INSERT INTO `tb_voucher_detail` (`voucher_detail_id`, `voucher_id`, `voucher_detail_token`, `voucher_detail_status`, `member_id`, `minimum_belanja`) VALUES
(1, 1, 'CiAjRYaG', 1, 3, ''),
(2, 1, '3LBowh8n', 0, 0, ''),
(3, 2, 'AMzUu8Hk', 0, 0, ''),
(4, 2, 'yVnRUIbw', 0, 0, ''),
(5, 0, 'Uay5tfKN', 0, 0, ''),
(6, 0, 'Nuz6Oegc', 0, 0, ''),
(7, 0, 'uMqp6hPd', 0, 0, ''),
(8, 0, 'HaLY8DlK', 0, 0, ''),
(9, 0, 'N7iCltyW', 0, 0, ''),
(10, 0, '7PMqRoQG', 0, 0, ''),
(11, 0, '1s3TnwfH', 0, 0, ''),
(12, 0, 'xf6tTMWq', 0, 0, ''),
(13, 0, 'UIcKF7A8', 0, 0, ''),
(14, 0, 'L1nvFlwx', 0, 0, ''),
(15, 0, 'c3w1sB8l', 0, 0, ''),
(16, 0, 'ovct8hV3', 0, 0, ''),
(17, 0, 'wkTencKj', 0, 0, ''),
(18, 0, 'LwIgPeV9', 0, 0, ''),
(19, 0, '021NvjkD', 0, 0, ''),
(20, 0, 'mE9Y04ZH', 0, 0, ''),
(21, 0, 'KXUrs46q', 0, 0, ''),
(22, 0, 'H5uiqoB6', 0, 0, ''),
(23, 0, 'BULHeXGj', 0, 0, ''),
(24, 0, 'dZGPMcWy', 0, 0, ''),
(25, 0, 'kl3FinbK', 0, 0, ''),
(26, 0, 'QPnd7NMT', 0, 0, ''),
(27, 0, 'ux6ZtP1U', 0, 0, ''),
(28, 0, 'Jm8F4LcC', 0, 0, ''),
(29, 0, '7oOAh5wn', 0, 0, ''),
(30, 3, '1yL5ri0C', 0, 0, ''),
(31, 3, 'J0El5jro', 0, 0, ''),
(32, 3, 'YB90wDbg', 0, 0, ''),
(33, 3, '9OFQSsWw', 0, 0, ''),
(34, 3, '1f9hHnKE', 0, 0, ''),
(35, 3, 'UT8Ggx5Q', 0, 0, ''),
(36, 3, '67qApkwj', 0, 0, ''),
(37, 3, 'ucskeoyS', 0, 0, ''),
(38, 3, '9uBlimt5', 0, 0, ''),
(39, 3, 'KeGHsiQm', 0, 0, ''),
(40, 3, 'iW1SLxlp', 0, 0, ''),
(41, 3, 'zGrkNujw', 0, 0, ''),
(42, 4, 'KBvEM40j', 0, 0, ''),
(43, 4, 'MR07z24e', 0, 0, ''),
(44, 4, '6I5eOdBC', 0, 0, ''),
(45, 4, 'mU6DuPc2', 0, 0, ''),
(46, 4, 'X3sS5qkI', 0, 0, ''),
(47, 4, 'Uo7WmRQY', 0, 0, ''),
(48, 4, 'pHJRzbky', 0, 0, ''),
(49, 4, 'EykW5FCQ', 0, 0, ''),
(50, 4, 'EnAN2OQJ', 0, 0, ''),
(51, 4, 'pufiaxV3', 0, 0, ''),
(52, 4, 'iaO9nRZ0', 0, 0, ''),
(53, 4, 'kdZGfyrj', 0, 0, ''),
(54, 5, 'bpkVdjiz', 0, 0, ''),
(55, 5, 'PCB0w9Lo', 0, 0, ''),
(56, 5, 'mtcNbGDV', 0, 0, ''),
(57, 5, 'NLMpc0Jq', 0, 0, ''),
(58, 5, 'yJUL1YSn', 0, 0, ''),
(59, 5, 'QnPuDOYB', 0, 0, ''),
(60, 5, 'mvPdbTcZ', 0, 0, ''),
(61, 5, 'STW4QEAP', 0, 0, ''),
(62, 5, '9ByFtlNp', 0, 0, ''),
(63, 5, 'RiHghFvZ', 0, 0, ''),
(64, 6, 'gGRJNQcS', 0, 0, ''),
(65, 6, 'Bc2DVgpR', 0, 0, ''),
(66, 6, 'mK0TEojb', 0, 0, ''),
(67, 6, '3iW7n916', 0, 0, ''),
(68, 6, '3MBKlFIs', 0, 0, ''),
(69, 6, 'UowbTIcj', 0, 0, ''),
(70, 6, 'tQCvP4k1', 0, 0, ''),
(71, 6, 'IkW6j4nh', 0, 0, ''),
(72, 6, '3VRhYDj1', 0, 0, ''),
(73, 6, 'JowLr9SW', 0, 0, ''),
(74, 6, 'GsgkNE7r', 0, 0, ''),
(75, 6, '2amNDZxH', 0, 0, ''),
(76, 6, 'nCfALjmq', 0, 0, ''),
(77, 6, 'z1cpGqeh', 0, 0, ''),
(78, 6, '3LbyDKf2', 0, 0, ''),
(79, 6, 'j2e59xX4', 0, 0, ''),
(80, 6, 'kyGRmKB4', 0, 0, ''),
(81, 6, 'OL8lWh3z', 0, 0, ''),
(82, 6, 'GQYjJpCE', 0, 0, ''),
(83, 6, '7VWmJBha', 0, 0, ''),
(84, 6, '72GNAvub', 0, 0, ''),
(85, 6, 'omnXD9dh', 0, 0, ''),
(86, 6, 'uVmDexdJ', 0, 0, ''),
(87, 6, 'trW7fiRY', 0, 0, ''),
(88, 6, '4C1xAHDR', 0, 0, ''),
(89, 6, 'ecS9sPWz', 0, 0, ''),
(90, 6, 'OAclC4vt', 0, 0, ''),
(91, 6, '8GFo0h9u', 0, 0, ''),
(92, 6, 'czNOQ2X0', 0, 0, ''),
(93, 6, '0pVneSTM', 0, 0, ''),
(94, 6, 'pEJ3KwdL', 0, 0, ''),
(95, 6, 'IzqRa1Pr', 0, 0, ''),
(96, 6, 'oAnwBfCg', 0, 0, ''),
(97, 6, '1OkbVX0a', 0, 0, ''),
(98, 6, 'bR3h2kGN', 0, 0, ''),
(99, 6, '9ILXhg4a', 0, 0, ''),
(100, 6, 'pal0o21s', 0, 0, ''),
(101, 6, 'jRA41gcb', 0, 0, ''),
(102, 6, '65gBOu19', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher_detail_ongkir`
--

CREATE TABLE `tb_voucher_detail_ongkir` (
  `voucher_detail_id_ongkir` int(11) NOT NULL,
  `voucher_id_ongkir` int(11) NOT NULL,
  `voucher_detail_token` varchar(255) NOT NULL,
  `voucher_detail_status` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `minimum_belanja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher_detail_ongkir`
--

INSERT INTO `tb_voucher_detail_ongkir` (`voucher_detail_id_ongkir`, `voucher_id_ongkir`, `voucher_detail_token`, `voucher_detail_status`, `member_id`, `minimum_belanja`) VALUES
(1, 5, 'QRuGD1Wn', 0, 0, '100000'),
(2, 5, '1VOMi8Cw', 0, 0, '100000'),
(3, 5, '9xdTjNy0', 0, 0, '100000'),
(4, 5, 'Kn2jtObf', 0, 0, '100000'),
(5, 5, '21VpYcf7', 0, 0, '100000'),
(6, 5, 'lOcYn9Lb', 0, 0, '100000'),
(7, 5, 'GmdcWbJ5', 0, 0, '100000'),
(8, 5, 'Dr3EtPy1', 0, 0, '100000'),
(9, 5, 'oVzLFStQ', 0, 0, '100000'),
(10, 5, 'ps4Vzi9B', 0, 0, '100000'),
(11, 6, 'B3XDC0GF', 0, 0, '1222'),
(12, 6, '8TnFAsB7', 0, 0, '1222');

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher_ongkir`
--

CREATE TABLE `tb_voucher_ongkir` (
  `voucher_id_ongkir` int(11) NOT NULL,
  `voucher_area` varchar(255) NOT NULL,
  `voucher_kode` varchar(255) NOT NULL,
  `voucher_nama` varchar(255) NOT NULL,
  `voucher_jenis` varchar(225) NOT NULL,
  `voucher_harga` float NOT NULL,
  `voucher_tgl_mulai` date DEFAULT NULL,
  `voucher_tgl_akhir` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `minimum_belanja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher_ongkir`
--

INSERT INTO `tb_voucher_ongkir` (`voucher_id_ongkir`, `voucher_area`, `voucher_kode`, `voucher_nama`, `voucher_jenis`, `voucher_harga`, `voucher_tgl_mulai`, `voucher_tgl_akhir`, `id_toko`, `minimum_belanja`) VALUES
(5, '1', 'V00001', '1212', 'harga', 12, '2020-12-01', '2020-12-23', 0, '100000'),
(6, '28', 'V00002', 'd', 'persen', 5, '2020-12-16', '2020-12-17', 0, '1222');

-- --------------------------------------------------------

--
-- Table structure for table `template_excel`
--

CREATE TABLE `template_excel` (
  `id_template` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_excel`
--

INSERT INTO `template_excel` (`id_template`, `nama`) VALUES
(1, 'data_gudang.csv'),
(2, 'ukuran.csv');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat_toko` text NOT NULL,
  `telpon_toko` varchar(20) DEFAULT NULL,
  `kode_pos_toko` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `id_prov`, `id_kota`, `alamat_toko`, `telpon_toko`, `kode_pos_toko`, `email`) VALUES
(0, 'Gudang', 0, 0, '', NULL, NULL, ''),
(1, 'Alfasport Padang', 32, 318, 'Padang', '083617388216', '72432', 'alfasportpadang@gmail.com'),
(2, 'Alfasport Bukittinggi', 32, 93, 'Bukittinggi', '123456', '12345', 'alfasportbukittinggi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `whistlist`
--

CREATE TABLE `whistlist` (
  `id_whistlist` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

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
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tb_barang_detail`
--
ALTER TABLE `tb_barang_detail`
  ADD PRIMARY KEY (`barang_detail_id`);

--
-- Indexes for table `tb_barang_restock`
--
ALTER TABLE `tb_barang_restock`
  ADD PRIMARY KEY (`barang_restock_id`);

--
-- Indexes for table `tb_barang_toko`
--
ALTER TABLE `tb_barang_toko`
  ADD PRIMARY KEY (`barang_toko_id`);

--
-- Indexes for table `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD PRIMARY KEY (`beli_id`);

--
-- Indexes for table `tb_beli_detail`
--
ALTER TABLE `tb_beli_detail`
  ADD PRIMARY KEY (`beli_detail_id`);

--
-- Indexes for table `tb_beli_tmp`
--
ALTER TABLE `tb_beli_tmp`
  ADD PRIMARY KEY (`beli_tmp_id`);

--
-- Indexes for table `tb_cek_stok_menipis`
--
ALTER TABLE `tb_cek_stok_menipis`
  ADD PRIMARY KEY (`menipis_id`);

--
-- Indexes for table `tb_daftar_alamat`
--
ALTER TABLE `tb_daftar_alamat`
  ADD PRIMARY KEY (`alamat_id`);

--
-- Indexes for table `tb_data_profesi`
--
ALTER TABLE `tb_data_profesi`
  ADD PRIMARY KEY (`data_profesi_id`);

--
-- Indexes for table `tb_data_toko_online`
--
ALTER TABLE `tb_data_toko_online`
  ADD PRIMARY KEY (`data_toko_online_id`);

--
-- Indexes for table `tb_detail_return`
--
ALTER TABLE `tb_detail_return`
  ADD PRIMARY KEY (`id_detail_return`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_diskon_detail`
--
ALTER TABLE `tb_diskon_detail`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_diskon_umur`
--
ALTER TABLE `tb_diskon_umur`
  ADD PRIMARY KEY (`id_umur`);

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
-- Indexes for table `tb_flash_diskon`
--
ALTER TABLE `tb_flash_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_flash_diskon_detail`
--
ALTER TABLE `tb_flash_diskon_detail`
  ADD PRIMARY KEY (`id_diskon_detail`);

--
-- Indexes for table `tb_flash_diskon_persen`
--
ALTER TABLE `tb_flash_diskon_persen`
  ADD PRIMARY KEY (`id_persen`);

--
-- Indexes for table `tb_gender`
--
ALTER TABLE `tb_gender`
  ADD PRIMARY KEY (`gender_id`);

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
-- Indexes for table `tb_konfirmasi_bayar`
--
ALTER TABLE `tb_konfirmasi_bayar`
  ADD PRIMARY KEY (`id_konfirmasi`);

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
-- Indexes for table `tb_member_point`
--
ALTER TABLE `tb_member_point`
  ADD PRIMARY KEY (`id_point`);

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
-- Indexes for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  ADD PRIMARY KEY (`id_detail_orders`);

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
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `tb_return_barang`
--
ALTER TABLE `tb_return_barang`
  ADD PRIMARY KEY (`return_barang_id`);

--
-- Indexes for table `tb_return_barang_detail`
--
ALTER TABLE `tb_return_barang_detail`
  ADD PRIMARY KEY (`return_barang_detail_id`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `tb_status_orders`
--
ALTER TABLE `tb_status_orders`
  ADD PRIMARY KEY (`id_status`);

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
-- Indexes for table `tb_transaksi_online`
--
ALTER TABLE `tb_transaksi_online`
  ADD PRIMARY KEY (`transol_id`);

--
-- Indexes for table `tb_transaksi_online_detail`
--
ALTER TABLE `tb_transaksi_online_detail`
  ADD PRIMARY KEY (`transol_detail_id`);

--
-- Indexes for table `tb_transaksi_online_tmp`
--
ALTER TABLE `tb_transaksi_online_tmp`
  ADD PRIMARY KEY (`transol_tmp_id`);

--
-- Indexes for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  ADD PRIMARY KEY (`tmp_id`);

--
-- Indexes for table `tb_transfer_barang`
--
ALTER TABLE `tb_transfer_barang`
  ADD PRIMARY KEY (`transfer_barang_id`);

--
-- Indexes for table `tb_transfer_barang_detail`
--
ALTER TABLE `tb_transfer_barang_detail`
  ADD PRIMARY KEY (`transfer_barang_detail_id`);

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
-- Indexes for table `tb_voucher_detail`
--
ALTER TABLE `tb_voucher_detail`
  ADD PRIMARY KEY (`voucher_detail_id`);

--
-- Indexes for table `tb_voucher_detail_ongkir`
--
ALTER TABLE `tb_voucher_detail_ongkir`
  ADD PRIMARY KEY (`voucher_detail_id_ongkir`);

--
-- Indexes for table `tb_voucher_ongkir`
--
ALTER TABLE `tb_voucher_ongkir`
  ADD PRIMARY KEY (`voucher_id_ongkir`);

--
-- Indexes for table `template_excel`
--
ALTER TABLE `template_excel`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `whistlist`
--
ALTER TABLE `whistlist`
  ADD PRIMARY KEY (`id_whistlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_all_ukuran`
--
ALTER TABLE `tb_all_ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_barang_detail`
--
ALTER TABLE `tb_barang_detail`
  MODIFY `barang_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_barang_restock`
--
ALTER TABLE `tb_barang_restock`
  MODIFY `barang_restock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_barang_toko`
--
ALTER TABLE `tb_barang_toko`
  MODIFY `barang_toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_beli`
--
ALTER TABLE `tb_beli`
  MODIFY `beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_beli_detail`
--
ALTER TABLE `tb_beli_detail`
  MODIFY `beli_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_beli_tmp`
--
ALTER TABLE `tb_beli_tmp`
  MODIFY `beli_tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_cek_stok_menipis`
--
ALTER TABLE `tb_cek_stok_menipis`
  MODIFY `menipis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_daftar_alamat`
--
ALTER TABLE `tb_daftar_alamat`
  MODIFY `alamat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_data_profesi`
--
ALTER TABLE `tb_data_profesi`
  MODIFY `data_profesi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_data_toko_online`
--
ALTER TABLE `tb_data_toko_online`
  MODIFY `data_toko_online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_detail_return`
--
ALTER TABLE `tb_detail_return`
  MODIFY `id_detail_return` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_diskon_detail`
--
ALTER TABLE `tb_diskon_detail`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_diskon_umur`
--
ALTER TABLE `tb_diskon_umur`
  MODIFY `id_umur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `distributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_flash_diskon`
--
ALTER TABLE `tb_flash_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_flash_diskon_detail`
--
ALTER TABLE `tb_flash_diskon_detail`
  MODIFY `id_diskon_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_flash_diskon_persen`
--
ALTER TABLE `tb_flash_diskon_persen`
  MODIFY `id_persen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_gender`
--
ALTER TABLE `tb_gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_konfirmasi_bayar`
--
ALTER TABLE `tb_konfirmasi_bayar`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_member_point`
--
ALTER TABLE `tb_member_point`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `merk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_metode`
--
ALTER TABLE `tb_metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  MODIFY `id_detail_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pakai_sendiri`
--
ALTER TABLE `tb_pakai_sendiri`
  MODIFY `pakai_sendiri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok`
--
ALTER TABLE `tb_penyesuaian_stok`
  MODIFY `penyesuaian_stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penyesuaian_stok_detail`
--
ALTER TABLE `tb_penyesuaian_stok_detail`
  MODIFY `penyesuaian_stok_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_return_barang`
--
ALTER TABLE `tb_return_barang`
  MODIFY `return_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_return_barang_detail`
--
ALTER TABLE `tb_return_barang_detail`
  MODIFY `return_barang_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status_orders`
--
ALTER TABLE `tb_status_orders`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  MODIFY `subdivisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_transaksi_online`
--
ALTER TABLE `tb_transaksi_online`
  MODIFY `transol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_transaksi_online_detail`
--
ALTER TABLE `tb_transaksi_online_detail`
  MODIFY `transol_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_transaksi_online_tmp`
--
ALTER TABLE `tb_transaksi_online_tmp`
  MODIFY `transol_tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_transaksi_tmp`
--
ALTER TABLE `tb_transaksi_tmp`
  MODIFY `tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_transfer_barang`
--
ALTER TABLE `tb_transfer_barang`
  MODIFY `transfer_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_transfer_barang_detail`
--
ALTER TABLE `tb_transfer_barang_detail`
  MODIFY `transfer_barang_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_voucher_detail`
--
ALTER TABLE `tb_voucher_detail`
  MODIFY `voucher_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tb_voucher_detail_ongkir`
--
ALTER TABLE `tb_voucher_detail_ongkir`
  MODIFY `voucher_detail_id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_voucher_ongkir`
--
ALTER TABLE `tb_voucher_ongkir`
  MODIFY `voucher_id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `template_excel`
--
ALTER TABLE `template_excel`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whistlist`
--
ALTER TABLE `whistlist`
  MODIFY `id_whistlist` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
