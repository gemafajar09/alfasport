<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);

$data = array(
    'id_gudang' => $_POST['id'],
    'ue' => $_POST['ue'],
    'us' => $_POST['us'],
    'uk' => $_POST['uk'],
    'cm' => $_POST['cm']
);
$cek = $con->select('tb_gudang_detail','*',['id_gudang' => $_POST['id']]);
if($cek == TRUE)
{
    $simpan = $con->update('tb_gudang_detail',$data,['id_gudang' => $_POST['id']]);
}else{
    $simpan = $con->insert('tb_gudang_detail',$data);
}
echo json_encode($simpan);