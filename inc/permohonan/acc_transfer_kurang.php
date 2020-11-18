<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$update = $con->update(
    'tb_transfer_barang',
    [
        'transfer_barang_acc_owner' => 3,
        'transfer_barang_ket' => $_POST['transfer_ket'],
    ],
    [
        'transfer_barang_id' => $_POST['transfer_barang_id']
    ]
);

if ($update == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
