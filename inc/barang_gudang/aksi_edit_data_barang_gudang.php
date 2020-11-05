<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->get("tb_barang", "*", array("barang_id" => $_POST["barang_id"]));
echo json_encode($edit);
