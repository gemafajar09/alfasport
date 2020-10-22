<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$metode = $_POST['metode'];

$data = $con->insert("tb_metode", ['kategori' => $metode]);

echo json_encode($data);