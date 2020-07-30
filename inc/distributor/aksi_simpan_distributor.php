<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['distributor_id'] == NULL) {
    $simpan = $con->query("INSERT INTO `tb_distributor`(`distributor_nama`, `distributor_perusahaan`, `distributor_notelp`, `distributor_email`, `distributor_alamat`) VALUES ('$_POST[distributor_nama]','$_POST[distributor_perusahaan]','$_POST[distributor_notelp]','$_POST[distributor_email]','$_POST[distributor_alamat]')");
} else {
    $simpan = $con->query("UPDATE tb_distributor SET distributor_nama='$_POST[distributor_nama]', distributor_perusahaan='$_POST[distributor_perusahaan]', distributor_notelp='$_POST[distributor_notelp]', distributor_email='$_POST[distributor_email]', distributor_alamat='$_POST[distributor_alamat]' WHERE distributor_id = $_POST[distributor_id]");
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
