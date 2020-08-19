<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->get("tb_gudang_detail", "*", array("id_detail" => $_POST['id_detail']));
echo json_encode($data);
