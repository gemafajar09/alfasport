<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_transaksi_detail", array("transaksi_id" => $_POST["transaksi_id"]));
$con->delete("tb_transaksi", array("transaksi_id" => $_POST["transaksi_id"]));

if (!$con->error()) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
