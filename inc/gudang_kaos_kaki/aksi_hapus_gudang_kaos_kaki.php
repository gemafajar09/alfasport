<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_gudang_kaos_kaki", array("gudang_kaos_kaki_kode" => $_POST["gudang_kaos_kaki_kode"]));
$con->delete("tb_gudang_kaos_kaki_detail", array("gudang_kaos_kaki_kode" => $_POST["gudang_kaos_kaki_kode"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
