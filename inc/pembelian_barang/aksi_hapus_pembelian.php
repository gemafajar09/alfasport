<?php
include "../../config/koneksi.php";


$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$gambar = $con->get("tb_beli", ["beli_nota"], array("beli_id" => $_POST["beli_id"]));

if($gambar['beli_nota'] != 'a4.png'){
    unlink("../../img/nota_pembelian/" . $gambar['beli_nota']);
}


$con->delete("tb_beli_detail", array("beli_id" => $_POST["beli_id"]));
$con->delete("tb_beli", array("beli_id" => $_POST["beli_id"]));

if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
