<?php
session_start();
unset($_SESSION['voucher_id']);
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("cart", array("id" => $_POST["product_id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
