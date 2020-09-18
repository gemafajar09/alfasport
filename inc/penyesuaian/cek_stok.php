<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$datag = $con->query("SELECT * FROM tb_stok_toko WHERE id_stok_toko = '$_POST[id_stok]'")->fetch();

echo json_encode($datag);
