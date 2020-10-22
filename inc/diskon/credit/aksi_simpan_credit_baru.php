<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->insert(
    "tb_diskon",
    array(
        "id_metode" => $_POST['id_metodes'],
        "id_bank" => $_POST['bank'],
        "diskon" => $_POST["diskon"],
        "tanggal_mulai" => $_POST["tanggal_mulai"],
        "tanggal_habis" => $_POST["tanggal_habis"],
    )
);

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
