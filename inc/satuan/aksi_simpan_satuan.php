<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['satuan_id'] == NULL) {
    $simpan = $con->insert(
        "tb_satuan",
        array(
            "satuan_nama" => $_POST["satuan_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_satuan",
        array(
            "satuan_nama" => $_POST["satuan_nama"],
        ),
        array(
            "satuan_id" => $_POST["satuan_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
