<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$where = array('id_stok_toko' => $_POST['id']);
$edit = $con->select('tb_stok_toko',"*",$where);
echo json_encode($edit);