<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$return_barang_detail_id = $_POST['return_barang_detail_id'];

// cari jumlah_penambahan di table tb_return_barang_detail
$data = $con->query("SELECT * FROM tb_return_barang_detail WHERE return_barang_detail_id= '$return_barang_detail_id'")->fetch(PDO::FETCH_ASSOC);

// cari jumlah_stok_di tb_barang_toko
$stok = $con->query("SELECT * FROM tb_barang_toko WHERE barang_toko_id= '$data[barang_toko_id]'")->fetch(PDO::FETCH_ASSOC);

$kurangi = $stok['barang_toko_jml'] - $data['return_barang_detail_stok_tambah'];

$update = $con->query("UPDATE tb_barang_toko SET barang_toko_jml = '$kurangi' WHERE barang_toko_id='$data[barang_toko_id]'");

$con->query("DELETE FROM tb_return_barang_detail WHERE return_barang_detail_id = '$return_barang_detail_id'");

echo json_encode($data);
