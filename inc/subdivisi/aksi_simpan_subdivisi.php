<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['subdivisi_id'] == NULL) {
    $simpan = $con->insert(
        "tb_subdivisi",
        array(
            "divisi_id" => $_POST["divisi_id"],
            "subdivisi_nama" => $_POST["subdivisi_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_subdivisi",
        array(
            "divisi_id" => $_POST["divisi_id"],
            "subdivisi_nama" => $_POST["subdivisi_nama"],
        ),
        array(
            "subdivisi_id" => $_POST["subdivisi_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
