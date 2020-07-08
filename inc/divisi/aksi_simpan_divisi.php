<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['divisi_id'] == NULL) {
    $simpan = $con->insert(
        "tb_divisi",
        array(
            "kategori_id" => $_POST["kategori_id"],
            "divisi_nama" => $_POST["divisi_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_divisi",
        array(
            "kategori_id" => $_POST["kategori_id"],
            "divisi_nama" => $_POST["divisi_nama"],
        ),
        array(
            "divisi_id" => $_POST["divisi_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
