<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_transaksi_online_detail", array("transol_id" => $_POST["transol_id"]));
$con->delete("tb_transaksi_online", array("transol_id" => $_POST["transol_id"]));

if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
