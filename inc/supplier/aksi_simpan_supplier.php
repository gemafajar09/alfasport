<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

if($_POST['supplier_id'] == NULL)
{
    $simpan = $con->query("INSERT INTO `tb_supplier`(`supplier_nama`, `supplier_perusahaan`, `supplier_notelp`, `supplier_email`, `supplier_alamat`) VALUES ('$_POST[supplier_nama]','$_POST[supplier_perusahaan]','$_POST[supplier_notelp]','$_POST[supplier_email]','$_POST[supplier_alamat]')");
}
else
{
    $simpan = $con->query("UPDATE tb_supplier SET supplier_nama='$_POST[supplier_nama]', supplier_perusahaan='$_POST[supplier_perusahaan]', supplier_notelp='$_POST[supplier_notelp]', supplier_email='$_POST[supplier_email]', supplier_alamat='$_POST[supplier_alamat]' WHERE supplier_id = $_POST[supplier_id]");
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}