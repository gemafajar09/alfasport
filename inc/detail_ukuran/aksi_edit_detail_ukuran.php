<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_detail_ukuran", "*", array("detail_ukuran_id" => $_POST["detail_ukuran_id"]));
echo json_encode($edit);
