<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

$edit = $con->get("tb_satuan", "*", array("satuan_id" => $_POST["satuan_id"]));
echo json_encode($edit);