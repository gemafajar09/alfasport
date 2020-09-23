<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$micin = json_decode($json, true);
$data = $con->query("SELECT * FROM tb_diskon WHERE id_metode = '$micin[id]' AND id_bank = '$micin[bank]'")->fetch();

echo json_encode($data);
?>