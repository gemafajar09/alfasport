<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_divisi", "*", array("divisi_id" => $_POST["divisi_id"]));
echo json_encode($edit);
