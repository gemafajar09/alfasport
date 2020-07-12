<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("tb_gudang", array("id_gudang" => $_POST["id_gudang"]));
$con->delete("tb_gudang_detail", array("id_gudang" => $_POST["id_gudang"]));
if (!$con->error()) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
