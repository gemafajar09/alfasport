<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_pembelian_detail", array("pembelian_id" => $_POST["pembelian_id"]));
$con->delete("tb_pembelian", array("pembelian_id" => $_POST["pembelian_id"]));

if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
