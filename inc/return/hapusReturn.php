<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$id_return = $_POST['id_return'];

$con->query("DELETE FROM `tb_return` WHERE id_return = '$id_return'");
$data = $con->query("DELETE FROM tb_detail_return WHERE id_return = '$id_return'");

echo json_encode($data);