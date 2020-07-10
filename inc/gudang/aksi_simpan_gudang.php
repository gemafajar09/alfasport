<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$data = array(
    'id' => $_POST['id'],
    'id_merek' => $_POST['nama'],
    'jumlah' => $_POST['jumlah'],
    'modal' => $_POST['modal'],
    'jual' => $_POST['jual'],
    'id_gender' => $_POST['gender'],
    'id_kategori' => $_POST['kategori'],
    'id_divisi' => $_POST['divisi'],
    'id_sub_divisi' => $_POST['sub_divisi'],
);

if($_POST['id_member'] == NULL)
{
    $simpan = $con->insert('tb_member', $data);
}
else
{
    $where = array('id_member' => $_POST['id_member']);
    $simpan = $con->update('tb_member',$data,$where);
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}