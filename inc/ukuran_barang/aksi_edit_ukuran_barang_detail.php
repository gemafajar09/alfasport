<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_ukuran_barang_detail", "*", array("ukuran_barang_detail_id" => $_POST["ukuran_barang_detail_id"]));

echo json_encode($edit);
