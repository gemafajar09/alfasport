<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

$edit = $con->query("SELECT * FROM toko WHERE id_toko='$_POST[id_toko]'")->fetch();
echo json_encode($edit);