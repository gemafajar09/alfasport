<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->get("tb_gudang_lainnya", "*", array("gudang_lainnya_id" => $_POST["gudang_lainnya_id"]));
echo json_encode($edit);
