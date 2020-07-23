<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_transaksi_tmp", array("tmp_id" => $_POST["tmp_id"]));

if (!$con->error()) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
