<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_barang", array("barang_id" => $_POST["barang_id"]));
$con->delete("tb_barang_detail", array("barang_id" => $_POST["barang_id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
