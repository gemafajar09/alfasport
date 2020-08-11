-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_repeat` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_all_ukuran`;
CREATE TABLE `tb_all_ukuran` (
  `id_ukuran` int(11) NOT NULL AUTO_INCREMENT,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ue` varchar(10) NOT NULL,
  `uk` varchar(10) NOT NULL,
  `us` varchar(10) NOT NULL,
  `cm` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ukuran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_bank`;
CREATE TABLE `tb_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_cek_stok_menipis`;
CREATE TABLE `tb_cek_stok_menipis` (
  `menipis_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gudang` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `menipis_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`menipis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_diskon`;
CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) NOT NULL AUTO_INCREMENT,
  `id_metode` int(11) NOT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `diskon` float NOT NULL,
  PRIMARY KEY (`id_diskon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_diskon_detail`;
CREATE TABLE `tb_diskon_detail` (
  `id_diskon` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko_detail` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `diskon_rupiah` varchar(11) NOT NULL,
  `diskon_persen` double NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_diskon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_distributor`;
CREATE TABLE `tb_distributor` (
  `distributor_id` int(11) NOT NULL AUTO_INCREMENT,
  `distributor_nama` varchar(255) NOT NULL,
  `distributor_perusahaan` varchar(255) NOT NULL,
  `distributor_notelp` varchar(255) NOT NULL,
  `distributor_email` varchar(255) NOT NULL,
  `distributor_alamat` text NOT NULL,
  PRIMARY KEY (`distributor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_divisi`;
CREATE TABLE `tb_divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `divisi_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_gender`;
CREATE TABLE `tb_gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_gudang`;
CREATE TABLE `tb_gudang` (
  `id_gudang` int(11) NOT NULL AUTO_INCREMENT,
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
  `tanggal` date NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `foto1` text DEFAULT NULL,
  `foto2` text DEFAULT NULL,
  `foto3` text DEFAULT NULL,
  `foto4` text DEFAULT NULL,
  `foto5` text DEFAULT NULL,
  PRIMARY KEY (`id_gudang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_gudang_detail`;
CREATE TABLE `tb_gudang_detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL,
  `id_ukuran` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `jabatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan_nama` varchar(255) NOT NULL,
  `jabatan_jobdesk` text NOT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_toko` int(11) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_kota`;
CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_prov` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;


DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `member_profesi` varchar(255) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_merk`;
CREATE TABLE `tb_merk` (
  `merk_id` int(11) NOT NULL AUTO_INCREMENT,
  `merk_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_metode`;
CREATE TABLE `tb_metode` (
  `id_metode` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_metode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_pakai_sendiri`;
CREATE TABLE `tb_pakai_sendiri` (
  `pakai_sendiri_id` int(11) NOT NULL AUTO_INCREMENT,
  `penyesuaian_stok_id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `pakai_sendiri_status` int(11) NOT NULL,
  `pakai_sendiri_tgl` date NOT NULL,
  PRIMARY KEY (`pakai_sendiri_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_pembelian`;
CREATE TABLE `tb_pembelian` (
  `pembelian_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_no_invoice` varchar(255) NOT NULL,
  `pembelian_tgl_beli` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pembelian_create_at` datetime NOT NULL,
  `pembelian_create_by` int(11) NOT NULL,
  PRIMARY KEY (`pembelian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_pembelian_detail`;
CREATE TABLE `tb_pembelian_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) NOT NULL,
  `pembelian_no_invoice` varchar(225) NOT NULL,
  `id_gudang_detail` int(11) NOT NULL,
  `detail_jumlah` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `tambah` AFTER INSERT ON `tb_pembelian_detail` FOR EACH ROW
BEGIN
UPDATE tb_gudang_detail SET jumlah = jumlah + NEW.detail_jumlah WHERE id_detail = NEW.id_gudang_detail;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `tb_pembelian_tmp`;
CREATE TABLE `tb_pembelian_tmp` (
  `tmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_no_invoice` varchar(225) NOT NULL,
  `id_gudang_detail` int(11) NOT NULL,
  `tmp_jumlah` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  PRIMARY KEY (`tmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_penyesuaian_stok`;
CREATE TABLE `tb_penyesuaian_stok` (
  `penyesuaian_stok_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `penyesuaian_stok_tgl` date NOT NULL,
  `penyesuaian_stok_tipe` varchar(255) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `penyesuaian_stok_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `penyesuaian_stok_create_by` varchar(255) NOT NULL,
  PRIMARY KEY (`penyesuaian_stok_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_penyesuaian_stok_detail`;
CREATE TABLE `tb_penyesuaian_stok_detail` (
  `penyesuaian_stok_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `penyesuaian_stok_id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_penyesuaian` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  PRIMARY KEY (`penyesuaian_stok_detail_id`),
  KEY `id_toko` (`id_toko`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_provinsi`;
CREATE TABLE `tb_provinsi` (
  `id_prov` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prov` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_satuan`;
CREATE TABLE `tb_satuan` (
  `satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_stok_toko`;
CREATE TABLE `tb_stok_toko` (
  `id_stok_toko` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_stok_toko`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_subdivisi`;
CREATE TABLE `tb_subdivisi` (
  `subdivisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi_id` int(11) NOT NULL,
  `subdivisi_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`subdivisi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(255) NOT NULL,
  `supplier_perusahaan` varchar(255) NOT NULL,
  `supplier_notelp` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_alamat` text NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `keterangan` text NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_transaksi_detail`;
CREATE TABLE `tb_transaksi_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `detail_kode` varchar(255) NOT NULL,
  `detail_tgl` date NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `detail_tipe_konsumen` varchar(255) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `detail_jumlah_beli` int(11) NOT NULL,
  `detail_total_harga` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `kurang` AFTER INSERT ON `tb_transaksi_detail` FOR EACH ROW
BEGIN
UPDATE tb_stok_toko SET jumlah = jumlah - NEW.detail_jumlah_beli WHERE id_toko = NEW.id_toko AND id_gudang = NEW.id_gudang;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `tb_transaksi_tmp`;
CREATE TABLE `tb_transaksi_tmp` (
  `tmp_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_karyawan` int(11) NOT NULL,
  PRIMARY KEY (`tmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_transfer`;
CREATE TABLE `tb_transfer` (
  `id_transfer` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `id_toko_tujuan` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `acc_owner` int(11) NOT NULL,
  PRIMARY KEY (`id_transfer`),
  KEY `id_detail` (`id_detail`),
  CONSTRAINT `tb_transfer_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `tb_gudang_detail` (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_ukuran`;
CREATE TABLE `tb_ukuran` (
  `ukuran_id` int(11) NOT NULL AUTO_INCREMENT,
  `ukuran_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_voucher`;
CREATE TABLE `tb_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_nama` varchar(255) NOT NULL,
  `voucher_kode` varchar(255) NOT NULL,
  `voucher_tgl` date DEFAULT NULL,
  `voucher_status` int(11) NOT NULL,
  PRIMARY KEY (`voucher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `toko`;
CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `telpon_toko` varchar(20) DEFAULT NULL,
  `hp_toko` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2020-08-11 02:34:52
