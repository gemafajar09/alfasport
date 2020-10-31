<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->get("tb_gudang_kaos_kaki", "*", array("gudang_kaos_kaki_id" => $_POST["gudang_kaos_kaki_id"]));
echo json_encode($edit);
