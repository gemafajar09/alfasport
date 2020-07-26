<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$data = array(
    'id_gudang' => $_POST['gudang'],
    'id_toko' => $_POST['toko'],
    'jumlah' => $_POST['jumlah'],
    'id_ukuran' => $_POST['id_ukuran']
);

if($_POST['id_stok_toko'] == NULL)
{
    $simpan = $con->insert('tb_stok_toko', $data);
    $upstok = $con->query("SELECT * FROM tb_gudang_detail WHERE id_detail='$_POST[id_detail]'")->fetch();
    $total = $upstok['jumlah'] - $_POST['jumlah'];
    $con->update('tb_gudang_detail',['jumlah' => $total],['id_detail' => $_POST['id_detail']]);
}
else
{
    $where = array('id_stok_toko' => $_POST['id_stok_toko']);
    $simpan = $con->update('tb_stok_toko',$data,$where);
}

if($simpan == TRUE)
{
    echo json_encode('SUCCESS');
}
else
{
    echo json_encode('ERROR');
}