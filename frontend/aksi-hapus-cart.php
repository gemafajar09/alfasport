<?php
if (@$_COOKIE['member_id'] == '') {
    echo "<script>window.location='index.php?page=login';</script>";
}
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->delete("cart", array("id" => $_POST["product_id"]));
if (!$con->error()[1]) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
