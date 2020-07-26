<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

$edit = $con->query("SELECT * FROM tb_gudang a JOIN tb_gudang_detail b ON a.id=b.id WHERE b.id_detail = '$_POST[id]'")->fetch();
echo json_encode($edit);