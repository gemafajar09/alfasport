<?php
include "../../config/koneksi.php";
include "../../components/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['id_karyawan'] == NULL) {
    $data['foto'] = fileUpload($_FILES['foto'], "../../img/karyawan/");
    $data['foto_ktp'] = fileUpload($_FILES['foto'], "../../img/karyawan/");

    $simpan = $con->insert(
        "tb_karyawan",
        array(
            "id" => $_POST["id"],
            "nik" => $_POST["nik"],
            "nama" => $_POST["nama"],
            "no_telpon" => $_POST["no_telpon"],
            "alamat" => $_POST["alamat"],
            "email_karyawan" => $_POST["email_karyawan"],
            "foto" => $data["foto"],
            "foto_ktp" => $data["foto_ktp"],
            "jabatan_id" => $_POST["jabatan_id"],
            "id_toko" => $_POST["id_toko"],
            "id_karyawan" => $_POST["id_karyawan"]
        )
    );
} else {
    $simpan = $con->query("UPDATE tb_karyawan SET id='$_POST[id]', nik='$_POST[nik]', nama='$_POST[nama]', alamat='$_POST[alamat]', no_telpon='$_POST[no_telpon]', jabatan='$_POST[jabatan]', toko='$_POST[nama_toko]' WHERE id_karyawan = $_POST[id_karyawan]");
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
