<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$cek = $con->query("SELECT b.id_gudang FROM tb_penyesuaian_stok_detail a JOIN tb_stok_toko b ON a.id_toko=b.id_toko WHERE a.penyesuaian_stok_id = '$_POST[id]' ")->fetch();
$data = $con->query("SELECT a.*, b.*, (SELECT artikel FROM tb_gudang WHERE id_gudang = '$cek[id_gudang]' ) as artikel FROM tb_penyesuaian_stok_detail a JOIN tb_penyesuaian_stok b ON a.penyesuaian_stok_id=b.penyesuaian_stok_id WHERE a.penyesuaian_stok_id = '$_POST[id]'")->fetch();
// $edit1 = $con->get("tb_pakai_sendiri", "*", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));

echo json_encode($data);
