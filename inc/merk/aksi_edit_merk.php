<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_merk", "*", array("merk_id" => $_POST["merk_id"]));
echo json_encode($edit);
