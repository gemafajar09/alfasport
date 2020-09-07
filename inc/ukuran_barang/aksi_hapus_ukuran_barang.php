<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("tb_ukuran_barang", array("ukuran_barang_id" => $_POST["ukuran_barang_id"]));
$con->delete("tb_ukuran_barang_detail", array("ukuran_barang_id" => $_POST["ukuran_barang_id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
