<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_gudang_lainnya", array("gudang_lainnya_kode" => $_POST["gudang_lainnya_kode"]));
$con->delete("tb_gudang_lainnya_detail", array("gudang_lainnya_kode" => $_POST["gudang_lainnya_kode"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
