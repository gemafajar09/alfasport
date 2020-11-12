<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$barang_toko_id = $_POST['barang_toko_id'];
$data = $con->query("SELECT barang_toko_jml FROM `tb_barang_toko` WHERE barang_toko_id = '$barang_toko_id'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);
