<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$return_barang_id = $_POST['return_barang_id'];

$con->query("DELETE FROM `tb_return_barang` WHERE return_barang_id = '$return_barang_id'");
$data = $con->query("DELETE FROM tb_return_barang_detail WHERE return_barang_id = '$return_barang_id'");

echo json_encode($data);
