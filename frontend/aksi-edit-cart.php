<?php
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("cart", "*", array("id_cart" => $_POST["id_cart"]));
echo json_encode($edit);

$simpan = $con->update(
  "cart",
  array(
    'qty' => $_POST['qty']
  ),
  array(
    "id_cart" => $_POST["id_cart"]
  )
);
