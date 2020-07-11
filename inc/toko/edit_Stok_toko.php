<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$where = array('id_toko' => $_POST['id']);
$edit = $con->get('tb_stok_toko',"*",$where);
echo json_encode($edit);