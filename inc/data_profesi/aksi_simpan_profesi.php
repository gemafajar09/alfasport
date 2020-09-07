<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['data_profesi_id'] == NULL) {
    $simpan = $con->insert(
        "tb_data_profesi",
        array(
            "data_profesi_nama" => $_POST["data_profesi_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_data_profesi",
        array(
            "data_profesi_nama" => $_POST["data_profesi_nama"],
        ),
        array(
            "data_profesi_id" => $_POST["data_profesi_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
