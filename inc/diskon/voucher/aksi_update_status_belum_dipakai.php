<?php
include "../../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->update(
    "tb_voucher_detail",
    array(
        'voucher_detail_status' => "1"
    ),
    array(
        "voucher_detail_id" => $_POST["voucher_detail_id"]
    )
);
