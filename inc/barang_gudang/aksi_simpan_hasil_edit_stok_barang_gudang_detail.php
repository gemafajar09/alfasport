<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->update(
    "tb_barang_detail",
    array(
        "ukuran_id" => $_POST['ukuran_id'],
        "barang_detail_barcode" => $_POST['barang_detail_barcode'],
        "barang_detail_jml" => $_POST['barang_detail_jml'],
    ),
    array(
        "barang_detail_id" => $_POST['barang_detail_id']
    )
);

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
