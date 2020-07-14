<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);



$con->delete("tb_penyesuaian_stok", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));
$con->delete("tb_penyesuaian_stok_detail", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));
if (!$con->error()) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
