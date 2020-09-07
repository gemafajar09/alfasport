<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->get("tb_gudang", "*", array("id_gudang" => $_POST["id_gudang"]));
echo json_encode($edit);
