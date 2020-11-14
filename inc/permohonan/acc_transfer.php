<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
if ($_POST['cek'] == 1) {
    $update = $con->update('tb_transfer_barang', ['transfer_barang_acc_owner' => $_POST['cek']], ['transfer_barang_id' => $_POST['transfer_barang_id']]);
} else {
    $update = $con->update('tb_transfer_barang', ['transfer_barang_acc_owner' => $_POST['cek']], ['transfer_barang_id' => $_POST['transfer_barang_id']]);
}

if ($update == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
