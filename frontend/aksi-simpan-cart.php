<?php
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->count('cart', '*', ['id' => $_POST["product_id"]]);

if ($data == 0) {
  $simpan = $con->insert(
    "cart",
    array(
      "id" => $_POST["product_id"],
      "harga" => $_POST["harga"],
      "id_toko" => $_POST["toko"],
      "id_stok_toko" => $_POST["id_stok_toko"],
      "qty" => $_POST["quantity_wanted"],
      "id_user" => '1',
    )
  );
} else {
  $simpan = $con->update(
    "cart",
    array(
      "qty[+]" => $_POST["quantity_wanted"]
    ),
    array(
      "id" => $_POST["product_id"],
      "id_user" => '1'
    )
  );
}


if ($simpan == TRUE) {
  echo json_encode('SUCCESS');
} else {
  echo json_encode('ERROR');
}
