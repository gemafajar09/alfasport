<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['jabatan_id'] == NULL) {
    $simpan = $con->insert(
        "tb_jabatan",
        array(
            "jabatan_nama" => $_POST["jabatan_nama"],
            "jabatan_jobdesk" => $_POST["jabatan_jobdesk"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_jabatan",
        array(
            "jabatan_nama" => $_POST["jabatan_nama"],
            "jabatan_jobdesk" => $_POST["jabatan_jobdesk"],
        ),
        array(
            "jabatan_id" => $_POST["jabatan_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
