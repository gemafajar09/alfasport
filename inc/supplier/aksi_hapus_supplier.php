<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

$hapus = $con->query("DELETE FROM tb_supplier WHERE supplier_id = '$_POST[supplier_id]'");
if($hapus == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}