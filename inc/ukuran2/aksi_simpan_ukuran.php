<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$a = $_POST['id_gender'];
$id_gender = implode(",", $a);

if ($_POST['id_ukuran'] == NULL) {

    $simpan = $con->insert(
        "tb_all_ukuran",
        array(
            "id_merek" => $_POST["id_merek"],
            "id_kategori" => $_POST["id_kategori"],
            "id_divisi" => $_POST["id_divisi"],
            "id_subdivisi" => $_POST["id_subdivisi"],
            "id_gender" => $id_gender,
            "ue" => $_POST["ue"],
            "uk" => $_POST["uk"],
            "us" => $_POST["us"],
            "cm" => $_POST["cm"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_all_ukuran",
        array(
            "id_merek" => $_POST["id_merek"],
            "id_kategori" => $_POST["id_kategori"],
            "id_divisi" => $_POST["id_divisi"],
            "id_subdivisi" => $_POST["id_subdivisi"],
            "id_gender" => $id_gender,
            "ue" => $_POST["ue"],
            "uk" => $_POST["uk"],
            "us" => $_POST["us"],
            "cm" => $_POST["cm"],
        ),
        array(
            "id_ukuran" => $_POST["id_ukuran"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
