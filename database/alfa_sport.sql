-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Jul 2020 pada 18.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

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
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `password_repeat`, `level`) VALUES
(1, 'Owner', 'adminowner', '$2y$10$it4OCh5.x2iRizXwKf/2NezUpicVsOXwx/I1Hsc5ZVNyrAsAkOkDa', 'terbukalah', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_all_ukuran`
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
-- Dumping data untuk tabel `tb_all_ukuran`
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
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `divisi_id` int(11) NOT NULL,
  `divisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_divisi`
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
-- Struktur dari tabel `tb_gender`
--

CREATE TABLE `tb_gender` (
  `gender_id` int(11) NOT NULL,
  `gender_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gender`
--

INSERT INTO `tb_gender` (`gender_id`, `gender_nama`) VALUES
(3, 'Men'),
(4, 'Women'),
(5, 'Unisex');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `artikel` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `id_merek` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `jual` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_sub_divisi` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `id`, `artikel`, `nama`, `id_merek`, `modal`, `jual`, `id_gender`, `id_kategori`, `id_divisi`, `id_sub_divisi`, `tanggal`) VALUES
(3, '789', '4568', 'test', 1, 2000, 2000, 3, 1, 24, 0, '2020-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang_detail`
--

CREATE TABLE `tb_gudang_detail` (
  `id_detail` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_ukuran` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gudang_detail`
--

INSERT INTO `tb_gudang_detail` (`id_detail`, `id`, `id_ukuran`, `jumlah`, `tanggal`) VALUES
(11, 789, 9, 5, '2020-07-13'),
(12, 789, 8, 6, '2020-07-13'),
(13, 789, 15, 9, '2020-07-13'),
(14, 789, 16, 10, '2020-07-13'),
(15, 789, 19, 5, '2020-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `toko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `id`, `nik`, `nama`, `alamat`, `no_telpon`, `jabatan`, `toko`) VALUES
(4, '75', '33', 'Dolorem dolore rem d', 'Est adipisci non co', '6', 'Atque eiusmod impedi', 'Dolor maiores pariat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Footwear'),
(2, 'Apparel'),
(3, 'Hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `no_hp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `alamat`, `no_telpon`, `no_hp`) VALUES
(2, 'Et ut adipisicing in', 'Dolor explicabo Bea', '90000000000', '70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk`
--

CREATE TABLE `tb_merk` (
  `merk_id` int(11) NOT NULL,
  `merk_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merk`
--

INSERT INTO `tb_merk` (`merk_id`, `merk_nama`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Puma'),
(4, 'Specs'),
(5, 'Kelme');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`satuan_id`, `satuan_nama`) VALUES
(11, 'helai'),
(14, 'sadasd'),
(19, 'Consequat Vel in nu'),
(20, 'Vitae voluptatem non'),
(22, 'Et nulla pariatur M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_toko`
--

CREATE TABLE `tb_stok_toko` (
  `id_stok_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subdivisi`
--

CREATE TABLE `tb_subdivisi` (
  `subdivisi_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `subdivisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
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
-- Struktur dari tabel `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `ukuran_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`ukuran_id`, `ukuran_nama`) VALUES
(1, 'UE'),
(2, 'US'),
(3, 'UK'),
(4, 'CM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
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
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `telpon_toko`, `hp_toko`, `email`) VALUES
(22, 'Sed velit lorem culp', 'Ex deserunt atque in', 'Inventore quia incid', 'Facilis similique ex', 'qeguwyheb@mailinator.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_all_ukuran`
--
ALTER TABLE `tb_all_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`divisi_id`);

--
-- Indeks untuk tabel `tb_gender`
--
ALTER TABLE `tb_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indeks untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `tb_gudang_detail`
--
ALTER TABLE `tb_gudang_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indeks untuk tabel `tb_stok_toko`
--
ALTER TABLE `tb_stok_toko`
  ADD PRIMARY KEY (`id_stok_toko`);

--
-- Indeks untuk tabel `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  ADD PRIMARY KEY (`subdivisi_id`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_all_ukuran`
--
ALTER TABLE `tb_all_ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_gender`
--
ALTER TABLE `tb_gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_gudang_detail`
--
ALTER TABLE `tb_gudang_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `merk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_stok_toko`
--
ALTER TABLE `tb_stok_toko`
  MODIFY `id_stok_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_subdivisi`
--
ALTER TABLE `tb_subdivisi`
  MODIFY `subdivisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
