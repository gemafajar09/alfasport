<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$gambar = $con->query("SELECT * FROM tb_karyawan WHERE id_karyawan='$_POST[id_karyawan]'")->fetch();
unlink("../../img/karyawan/" . $gambar['foto']);
unlink("../../img/karyawan/" . $gambar['foto_ktp']);

$hapus = $con->query("DELETE FROM tb_karyawan WHERE id_karyawan = '$_POST[id_karyawan]'");
if ($hapus == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
