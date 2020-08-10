<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);







$simpan = $con->update(
    "tb_transfer",
    array(
        'acc_owner' => "3",
        'transfer_ket' => $_POST["transfer_ket"],
    ),
    array(
        "id_transfer" => $_POST["id_transfer"]
    )
);
