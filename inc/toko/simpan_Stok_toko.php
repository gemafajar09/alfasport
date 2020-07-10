<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$data = array(
    'id' => $_POST['id'],
    'nama' => $_POST['nama'],
    'artikel' => $_POST['artikel'],
    'id_merek' => $_POST['merek'],
    'jumlah' => $_POST['jumlah'],
    'modal' => $_POST['modal'],
    'jual' => $_POST['jual'],
    'id_gender' => $_POST['gender'],
    'id_kategori' => $_POST['kategori'],
    'id_divisi' => $_POST['divisi'],
    'id_sub_divisi' => $_POST['sub_divisi'],
);

if($_POST['id_toko'] == NULL)
{
    $simpan = $con->insert('tb_toko', $data);
}
else
{
    $where = array('id_toko' => $_POST['id_toko']);
    $simpan = $con->update('tb_toko',$data,$where);
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}