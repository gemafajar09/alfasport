<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->query("SELECT * FROM tb_diskon_umur WHERE id_umur='$_POST[id_umur]'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($edit);