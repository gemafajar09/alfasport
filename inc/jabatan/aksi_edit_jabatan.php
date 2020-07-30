<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_jabatan", "*", array("jabatan_id" => $_POST["jabatan_id"]));
echo json_encode($edit);
