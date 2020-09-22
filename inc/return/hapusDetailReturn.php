<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$id_detail_return = $_POST['id_detail_return'];

$data = $con->query("SELECT * FROM tb_detail_return WHERE id_detail_return= '$id_detail_return'")->fetch(PDO::FETCH_ASSOC);
$stok = $con->query("SELECT * FROM tb_stok_toko WHERE id_stok_toko= '$data[id_stok_toko]'")->fetch(PDO::FETCH_ASSOC);
$kurangi = $stok['jumlah'] - $data['penyesuaian'];
$update = $con->query("UPDATE tb_stok_toko SET jumlah = '$kurangi' WHERE id_stok_toko='$data[id_stok_toko]'");

$con->query("DELETE FROM `tb_detail_return` WHERE id_detail_return = '$id_detail_return'");

echo json_encode($data);