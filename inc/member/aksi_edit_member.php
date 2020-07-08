<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$where = array('id_member' => $_POST['id_member']);
$edit = $con->get('tb_member',"*",$where);
echo json_encode($edit);