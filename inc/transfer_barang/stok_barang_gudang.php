<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$id = $_POST['id_detail'];
$data = $con->query("SELECT jumlah FROM tb_gudang_detail WHERE id_detail = '$id'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);
