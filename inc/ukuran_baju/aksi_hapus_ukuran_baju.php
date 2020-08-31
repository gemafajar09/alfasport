<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("tb_ukuran_baju", array("ukuran_baju_id" => $_POST["ukuran_baju_id"]));
$con->delete("tb_ukuran_baju_detail", array("ukuran_baju_id" => $_POST["ukuran_baju_id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
