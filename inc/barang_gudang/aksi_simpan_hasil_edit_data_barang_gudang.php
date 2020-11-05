<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->update(
    "tb_barang",
    array(
        'barang_artikel' => $_POST['barang_artikel'],
        'barang_nama' => $_POST['barang_nama'],
        'barang_modal' => $_POST['barang_modal'],
        'barang_jual' => $_POST['barang_jual'],
        'barang_berat' => $_POST['barang_berat'],
        'gender_id' => $_POST['gender_id'],
        'barang_thumbnail' => $_POST['barang_thumbnail'],
        'barang_foto1' => $_POST['barang_foto1'],
        'barang_foto2' => $_POST['barang_foto2'],
        'barang_foto3' => $_POST['barang_foto3'],
        'barang_foto4' => $_POST['barang_foto4'],
        'barang_foto5' => $_POST['barang_foto5'],
    ),
    array(
        "barang_id" => $_POST["barang_id"]
    )
);

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
