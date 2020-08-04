<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_gudang", array("id" => $_POST["id"]));

$con->delete("tb_gudang_detail", array("id" => $_POST["id"]));
$con->delete("tb_cek_stok_menipis", array("id" => $_POST["id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
