<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT a.jumlah, b.jual, a.id_gudang FROM tb_stok_toko a JOIN tb_gudang b ON a.id_gudang=b.id_gudang WHERE a.id_stok_toko='$_POST[id]'")->fetch();
echo json_encode($data);