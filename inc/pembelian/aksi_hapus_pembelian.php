<?php
include "../../config/koneksi.php";
require_once "../../vendor/autoload.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_pembelian_detail", array("pembelian_id" => $_POST["pembelian_id"]));

$gambar = $con->get("tb_pembelian", ["pembelian_nota_id"], array("pembelian_id" => $_POST["pembelian_id"]));

$axios = new GuzzleHttp\Client();

$res = $axios->request('POST', "$base_url/gambar_service/file-delete.php", array(
    "form_params" => array(
        "id" => $gambar['pembelian_nota_id']
    )
));

$con->delete("tb_pembelian", array("pembelian_id" => $_POST["pembelian_id"]));

if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
