<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$id_stok_toko = $_POST['id_stok_toko'];
$data = $con->query("SELECT jumlah FROM `tb_stok_toko` WHERE id_stok_toko = '$id_stok_toko'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);