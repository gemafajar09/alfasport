<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$con->delete("tb_beli_tmp", array("beli_tmp_id" => $_POST["beli_tmp_id"]));

if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
