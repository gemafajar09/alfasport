<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

if($_POST['id_toko'] == NULL)
{
    $simpan = $con->query("INSERT INTO `toko`(`nama_toko`, `alamat_toko`, `telpon_toko`, `hp_toko`, `email`) VALUES ('$_POST[nama_toko]','$_POST[alamat_toko]','$_POST[no_telpon]','$_POST[no_hp]','$_POST[email]')");
}
else
{
    $simpan = $con->query("UPDATE toko SET nama_toko='$_POST[nama_toko]', alamat_toko='$_POST[alamat_toko]', telpon_toko='$_POST[no_telpon]', hp_toko='$_POST[no_hp]', email='$_POST[email]' WHERE id_toko = $_POST[id_toko]");
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}