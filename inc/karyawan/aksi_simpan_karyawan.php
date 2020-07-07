<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

if($_POST['id_karyawan'] == NULL)
{
    $simpan = $con->query("INSERT INTO `tb_karyawan`(`id`, `nik`, `nama`, `alamat`, `no_telpon`, `jabatan`, `toko`) VALUES ('$_POST[id]','$_POST[nik]','$_POST[nama]','$_POST[alamat]','$_POST[no_telpon]','$_POST[jabatan]','$_POST[nama_toko]')");
}
else
{
    $simpan = $con->query("UPDATE tb_karyawan SET id='$_POST[id]', nik='$_POST[nik]', nama='$_POST[nama]', alamat='$_POST[alamat]', no_telpon='$_POST[no_telpon]', jabatan='$_POST[jabatan]', toko='$_POST[nama_toko]' WHERE id_karyawan = $_POST[id_karyawan]");
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}