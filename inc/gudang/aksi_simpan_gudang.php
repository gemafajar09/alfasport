<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$data = array(
    'nama_member' => $_POST['nama'],
    'alamat' => $_POST['alamat'],
    'no_telpon' => $_POST['no_telpon'],
    'no_hp' => $_POST['no_hp']
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