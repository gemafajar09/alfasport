<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$con->query("INSERT INTO tb_detail_return VALUES ('','$_POST[id]','$_POST[id_stok_toko]','$_POST[stok_awal]','$_POST[penyesuaian]','$_POST[stok_akhir]')");
$cek = $con->query("SELECT * FROM tb_stok_toko WHERE id_stok_toko = '$_POST[id_stok_toko]'")->fetch(PDO::FETCH_ASSOC);
$jumlah = $cek['jumlah'] + $_POST['penyesuaian'];
$hasil = $con->query("UPDATE tb_stok_toko SET jumlah = '$jumlah' WHERE  id_stok_toko = '$_POST[id_stok_toko]'");

if($hasil == TRUE)
{
    echo json_encode('success');
}else{
    echo json_encode('error');

}