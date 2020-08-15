<?php
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$jumlah = json_decode($json, true);

$data = $con->query("SELECT COUNT(id_whistlist) as jumlah FROM whistlist WHERE id_user = '$jumlah[id]'")->fetch();
echo json_encode($data);
