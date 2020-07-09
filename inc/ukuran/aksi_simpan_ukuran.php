<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['ukuran_id'] == NULL) {
    $simpan = $con->insert(
        "tb_ukuran",
        array(
            "ukuran_nama" => $_POST["ukuran_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_ukuran",
        array(
            "ukuran_nama" => $_POST["ukuran_nama"],
        ),
        array(
            "ukuran_id" => $_POST["ukuran_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
