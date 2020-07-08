<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['kategori_id'] == NULL) {
    $simpan = $con->insert(
        "tb_kategori",
        array(
            "kategori_nama" => $_POST["kategori_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_kategori",
        array(
            "kategori_nama" => $_POST["kategori_nama"],
        ),
        array(
            "kategori_id" => $_POST["kategori_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
