<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['id_diskon'] == NULL) {
    $simpan = $con->insert(
        "tb_diskon",
        array(
            "diskon" => $_POST["diskon"]
        )
    );
} else {
    $simpan = $con->update(
        "tb_diskon",
        array(
            "diskon" => $_POST["diskon"]
        ),
        array(
            "id_diskon" => $_POST["id_diskon"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
