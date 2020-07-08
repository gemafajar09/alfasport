<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_kategori", "*", array("kategori_id" => $_POST["kategori_id"]));
echo json_encode($edit);
