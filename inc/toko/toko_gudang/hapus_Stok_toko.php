<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("tb_stok_toko", array("id_stok_toko" => $_POST["id_stok_toko"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
