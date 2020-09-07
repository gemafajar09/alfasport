<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$a = $_POST['id_gender'];
$id_gender = implode(",", $a);

if ($_POST['ukuran_barang_detail_id'] == NULL) {
} else {
    $simpan = $con->update(
        "tb_ukuran_barang_detail",
        array(
            "ukuran_barang_detail_nama" => $_POST["ukuran_barang_detail_nama"],
            "ukuran_barang_detail_stok" => $_POST["ukuran_barang_detail_stok"],
        ),
        array(
            "ukuran_barang_detail_id" => $_POST["ukuran_barang_detail_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
