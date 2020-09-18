<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$id = $_POST['id_detail'];
$data = $con->query("SELECT jumlah FROM tb_stok_toko WHERE id_gudang = '$id'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);
