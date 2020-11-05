<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$a = $_POST['gender_id'];
$gender_id = implode(",", $a);

if ($_POST['ukuran_id'] == NULL) {
    // insert
} else {
    $simpan = $con->update(
        "tb_ukuran",
        array(
            "gender_id" => $gender_id,
            "merk_id" => $_POST["merk_id"],
            "kategori_id" => $_POST["kategori_id"],
            "divisi_id" => $_POST["divisi_id"],
            "subdivisi_id" => $_POST["subdivisi_id"],
            "sepatu_ue" => $_POST["sepatu_ue"],
            "sepatu_uk" => $_POST["sepatu_uk"],
            "sepatu_us" => $_POST["sepatu_us"],
            "sepatu_cm" => $_POST["sepatu_cm"],
        ),
        array(
            "ukuran_id" => $_POST["ukuran_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
