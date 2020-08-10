<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->update(
    "tb_transfer_detail",
    array(
        'status' => 0
    ),
    array(
        "transfer_detail_id" => $_POST["transfer_detail_id"]
    )
);
