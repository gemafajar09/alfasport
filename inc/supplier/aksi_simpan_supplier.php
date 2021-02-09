<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

if ($_POST['supplier_id'] == NULL) {
    $simpan = $con->insert(
        "tb_supplier",
        array(
            "supplier_nama" => $_POST["supplier_nama"],
            "supplier_perusahaan" => $_POST["supplier_perusahaan"],
            "supplier_notelp" => $_POST["supplier_notelp"],
            "supplier_email" => $_POST["supplier_email"],
            "supplier_alamat" => $_POST["supplier_alamat"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_supplier",
        array(
            "supplier_nama" => $_POST["supplier_nama"],
            "supplier_perusahaan" => $_POST["supplier_perusahaan"],
            "supplier_notelp" => $_POST["supplier_notelp"],
            "supplier_email" => $_POST["supplier_email"],
            "supplier_alamat" => $_POST["supplier_alamat"],
        ),
        array(
            "supplier_id" => $_POST["supplier_id"]
        )
    );
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}