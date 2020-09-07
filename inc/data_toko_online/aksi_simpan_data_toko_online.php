<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['data_toko_online_id'] == NULL) {
    $simpan = $con->insert(
        "tb_data_toko_online",
        array(
            "data_toko_online_nama" => $_POST["data_toko_online_nama"],
            "data_toko_online_link" => $_POST["data_toko_online_link"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_data_toko_online",
        array(
            "data_toko_online_nama" => $_POST["data_toko_online_nama"],
            "data_toko_online_link" => $_POST["data_toko_online_link"],
        ),
        array(
            "data_toko_online_id" => $_POST["data_toko_online_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
