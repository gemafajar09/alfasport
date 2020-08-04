<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$edit = json_decode($json, true);
$id = $edit['id_detail'];
$diskon = $edit['diskon'];

$update = $con->update('tb_gudang_detail',['diskon' => $diskon],['id_detail' => $id]);
$tampil = $con->query("SELECT diskon FROM tb_gudang_detail WHERE id_detail = '$id'")->fetch();
if($tampil != NULL)
{
    echo json_encode($tampil);
}else{
    
}
?>