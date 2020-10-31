<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("tb_stok_toko_lainnya", array("stok_toko_lainnya_id" => $_POST["stok_toko_lainnya_id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
