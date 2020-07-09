<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['merk_id'] == NULL) {
    $simpan = $con->insert(
        "tb_merk",
        array(
            "merk_nama" => $_POST["merk_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_merk",
        array(
            "merk_nama" => $_POST["merk_nama"],
        ),
        array(
            "merk_id" => $_POST["merk_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
