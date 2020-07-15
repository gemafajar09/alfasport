<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_penyesuaian_stok", "*", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));
// $edit1 = $con->get("tb_pakai_sendiri", "*", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));


echo json_encode($edit);
// echo json_encode($edit1);
