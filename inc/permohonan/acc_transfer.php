<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
if ($_POST['cek'] == 1) {
    $update = $con->update('tb_transfer', ['acc_owner' => $_POST['cek']], ['id_transfer' => $_POST['id_transfer']]);
} else {
    $update = $con->update('tb_transfer', ['acc_owner' => $_POST['cek']], ['id_transfer' => $_POST['id_transfer']]);
}

if ($update == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
