<?php
include "../../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = array(
    'id_gudang' => $_POST['id_gudang'],
    'menipis_status' => "1"
);
$simpan = $con->insert('tb_cek_stok_menipis', $data);
