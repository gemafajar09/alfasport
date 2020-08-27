<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_ukuran_kaos_kaki", "*", array("ukuran_kaos_kaki_id" => $_POST["ukuran_kaos_kaki_id"]));
echo json_encode($edit);
