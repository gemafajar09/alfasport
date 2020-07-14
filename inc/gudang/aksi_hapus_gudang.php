<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$id = $con->query("SELECT id FROM tb_gudang WHERE id_gudang='$_POST[id_gudang]'")->fetch();
$con->delete("tb_gudang", array("id_gudang" => $_POST["id_gudang"]));

$con->delete("tb_gudang_detail", array("id" => $id["id"]));
if (!$con->error()) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
