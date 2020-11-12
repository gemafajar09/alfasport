<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$datag = $con->query("SELECT * FROM tb_barang_toko WHERE barang_toko_id = '$_POST[id_stok]' LIMIT 1")->fetch(PDO::FETCH_ASSOC);

echo json_encode($datag);
