<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_subdivisi", "*", array("subdivisi_id" => $_POST["subdivisi_id"]));
echo json_encode($edit);
