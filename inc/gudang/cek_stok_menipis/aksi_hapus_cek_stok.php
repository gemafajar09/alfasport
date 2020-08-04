<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("tb_cek_stok_menipis", array("id_gudang" => $_POST["id_gudang"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
