<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_all_ukuran", "*", array("id_ukuran" => $_POST["id_ukuran"]));
echo json_encode($edit);
