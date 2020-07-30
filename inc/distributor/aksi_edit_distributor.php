<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->query("SELECT * FROM tb_distributor WHERE distributor_id='$_POST[distributor_id]'")->fetch();
echo json_encode($edit);
