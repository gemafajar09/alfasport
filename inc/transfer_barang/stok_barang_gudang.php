<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$barang_detail_id = $_POST['barang_detail_id'];
$data = $con->query("SELECT barang_detail_jml FROM tb_barang_detail WHERE barang_detail_id = '$barang_detail_id'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);
