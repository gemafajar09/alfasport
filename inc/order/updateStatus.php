<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$date = date('Y-m-d H:i:s');

$status_order = $_POST['status_order'];
$id_order = $_POST['id_order'];
$update = $con->query("UPDATE tb_orders SET status_order='$status_order' WHERE id_order='$id_order'");
$con->query("INSERT INTO `tb_status_orders` VALUES ('','$id_order','$status_order','$date')");

// update stok toko
$toko = $con->query("
    SELECT 
    * 
    FROM
    tb_orders_detail a
    LEFT JOIN tb_stok_toko b 
    ON a.id_stok_toko=b.id_stok_toko
    WHERE a.id_order='$id_order' 
");
foreach ($toko as $i => $a) {
    $jumlah = $a['jumlah'] - $a['qty'];
    $con->query("UPDATE tb_stok_toko SET jumlah = '$jumlah' WHERE id_stok_toko = '$a[id_stok_toko]'");
}

$data = $con->query("SELECT * FROM tb_orders WHERE id_order='$id_order'")->fetch(PDO::FETCH_ASSOC);
$point = $con->query("UPDATE tb_member_point SET point=point+'$point', royalti=royalti+'$point' WHERE member_id='$data[member_id]'");
echo json_encode($update);
