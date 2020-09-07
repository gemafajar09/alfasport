<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_data_toko_online", "*", array("data_toko_online_id" => $_POST["data_toko_online_id"]));
echo json_encode($edit);
