<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$data = array(
    'id' => $_POST['id'],
    'nama' => $_POST['nama'],
    'id_merek' => $_POST['merek'],
    'jumlah' => $_POST['jumlah'],
    'modal' => $_POST['modal'],
    'jual' => $_POST['jual'],
    'id_gender' => $_POST['gender'],
    'id_kategori' => $_POST['kategori'],
    'id_divisi' => $_POST['divisi'],
    'id_sub_divisi' => $_POST['sub_divisi'],
);

if($_POST['id_gudang'] == NULL)
{
    $simpan = $con->insert('tb_gudang', $data);
}
else
{
    $where = array('id_gudang' => $_POST['id_gudang']);
    $simpan = $con->update('tb_gudang',$data,$where);
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}