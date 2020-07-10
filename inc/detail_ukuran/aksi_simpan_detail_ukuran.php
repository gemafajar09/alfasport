<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['detail_ukuran_id'] == NULL) {
    $simpan = $con->insert(
        "tb_detail_ukuran",
        array(
            "ukuran_id" => $_POST["ukuran_id"],
            "detail_ukuran_ukuran" => $_POST["detail_ukuran_ukuran"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_detail_ukuran",
        array(
            "ukuran_id" => $_POST["ukuran_id"],
            "detail_ukuran_ukuran" => $_POST["detail_ukuran_ukuran"],
        ),
        array(
            "detail_ukuran_id" => $_POST["detail_ukuran_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
