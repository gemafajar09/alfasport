<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$where = array('id_gudang' => $_POST['id']);
$edit = $con->get('tb_gudang',"*",$where);
echo json_encode($edit);