<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_ukuran", "*", array("ukuran_id" => $_POST["ukuran_id"]));
echo json_encode($edit);
