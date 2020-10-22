<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$id = $_POST['id'];

$data = $con->query("DELETE FROM `tb_metode` WHERE id_metode = '$id'");

echo json_encode($data);