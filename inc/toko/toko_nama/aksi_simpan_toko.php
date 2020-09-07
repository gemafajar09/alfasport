<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['id_toko'] == NULL) {
    $simpan = $con->query("INSERT INTO `toko`(`nama_toko`,`id_prov`,`id_kota`, `alamat_toko`, `telpon_toko`, `kode_pos_toko`, `email`) VALUES ('$_POST[nama_toko]','$_POST[id_prov]','$_POST[id_kota]','$_POST[alamat_toko]','$_POST[no_telpon]','$_POST[kode_pos]','$_POST[email]')");
} else {
    $simpan = $con->query("UPDATE toko SET nama_toko='$_POST[nama_toko]',id_prov='$_POST[id_prov]',id_kota='$_POST[id_kota]', alamat_toko='$_POST[alamat_toko]', telpon_toko='$_POST[no_telpon]', kode_pos_toko='$_POST[kode_pos]', email='$_POST[email]' WHERE id_toko = $_POST[id_toko]");
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
