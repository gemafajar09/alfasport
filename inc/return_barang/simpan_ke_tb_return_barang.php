<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->insert(
    "tb_return_barang",
    array(
        "return_barang_kode" => $_POST['return_barang_kode'],
        "return_barang_tgl" => $_POST['return_barang_tgl'],
        "id_toko" => $_POST['id_toko'],
        "id_karyawan" => $_COOKIE['id_karyawan'],
    )
);
