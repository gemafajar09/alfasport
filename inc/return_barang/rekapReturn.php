<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// // cari return_barang_id
$cari_return_barang_id = $con->query("SELECT return_barang_id FROM tb_return_barang WHERE return_barang_kode = :return_barang_kode", array('return_barang_kode' => $_POST['return_barang_kode']))->fetch();
// var_dump($cari_return_barang_id['return_barang_id']);
// exit;

// // insert ke tb_return_detail
$con->insert(
    "tb_return_barang_detail",
    array(
        "return_barang_id" => $cari_return_barang_id['return_barang_id'],
        "return_barang_kode" => $_POST['return_barang_kode'],
        "barang_toko_id" => $_POST['barang_toko_id'],
        "return_barang_detail_stok_awal" => $_POST['return_barang_detail_stok_awal'],
        "return_barang_detail_stok_tambah" => $_POST['return_barang_detail_stok_tambah'],
        "return_barang_detail_stok_akhir" => $_POST['return_barang_detail_stok_akhir'],
    )
);

// //update jumlah di tb_barang_toko
$cek = $con->query("SELECT * FROM tb_barang_toko WHERE barang_toko_id = '$_POST[barang_toko_id]'")->fetch(PDO::FETCH_ASSOC);

$jumlah = $cek['barang_toko_jml'] + $_POST['return_barang_detail_stok_tambah'];

$hasil = $con->query("UPDATE tb_barang_toko SET barang_toko_jml = '$jumlah' WHERE barang_toko_id = '$_POST[barang_toko_id]'");

if ($hasil == TRUE) {
    echo json_encode('success');
} else {
    echo json_encode('error');
}
