<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['gender_id'] == NULL) {
    $simpan = $con->insert(
        "tb_gender",
        array(
            "gender_nama" => $_POST["gender_nama"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_gender",
        array(
            "gender_nama" => $_POST["gender_nama"],
        ),
        array(
            "gender_id" => $_POST["gender_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
