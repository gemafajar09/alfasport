<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

$edit = $con->query("SELECT * FROM tb_karyawan WHERE id_karyawan='$_POST[id_karyawan]'")->fetch();
echo json_encode($edit);