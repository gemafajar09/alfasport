<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->update(
    "tb_transfer_barang_detail",
    array(
        'transfer_barang_detail_status' => "0"
    ),
    array(
        "transfer_barang_detail_id" => $_POST["transfer_barang_detail_id"]
    )
);
