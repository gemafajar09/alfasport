<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$insert = $con->insert('tb_flash_diskon_detail',['id_diskon' => $_POST['id_diskon'], 'artikel' => $_POST['artikel']]);

echo json_encode($insert);