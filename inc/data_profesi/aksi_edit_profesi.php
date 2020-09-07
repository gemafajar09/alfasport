<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_data_profesi", "*", array("data_profesi_id" => $_POST["data_profesi_id"]));
echo json_encode($edit);
