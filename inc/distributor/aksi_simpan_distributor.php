<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['distributor_id'] == NULL) {
    $simpan = $con->insert(
        "tb_distributor",
        array(
            "distributor_nama" => $_POST["distributor_nama"],
            "distributor_perusahaan" => $_POST["distributor_perusahaan"],
            "distributor_notelp" => $_POST["distributor_notelp"],
            "distributor_email" => $_POST["distributor_email"],
            "distributor_alamat" => $_POST["distributor_alamat"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_distributor",
        array(
            "distributor_nama" => $_POST["distributor_nama"],
            "distributor_perusahaan" => $_POST["distributor_perusahaan"],
            "distributor_notelp" => $_POST["distributor_notelp"],
            "distributor_email" => $_POST["distributor_email"],
            "distributor_alamat" => $_POST["distributor_alamat"],
        ),
        array(
            "distributor_id" => $_POST["distributor_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
