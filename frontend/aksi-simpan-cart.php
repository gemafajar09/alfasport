<?php
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$toko = $con->count('cart', '*', ['id_user' => $_COOKIE["member_id"], 'id_toko[!]' => $_POST["toko"]]);

if ($toko == 0) {

  $data = $con->count('cart', '*', ['id' => $_POST["product_id"], 'id_user' => $_COOKIE["member_id"], 'id_stok_toko' => $_POST["id_stok_toko"]]);

  if ($data == 0) {
    $simpan = $con->insert(
      "cart",
      array(
        "id" => $_POST["product_id"],
        "harga" => $_POST["harga"],
        "id_toko" => $_POST["toko"],
        "id_stok_toko" => $_POST["id_stok_toko"],
        "qty" => $_POST["quantity_wanted"],
        "id_user" => $_COOKIE['member_id'],
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
        "id_user" => $_COOKIE['member_id']
      )
    );
  }

  $pesan = array(
    'value' => 1,
    'pesan' => 'Barang ditambah ke keranjang'
  );
} else {

  $pesan = array(
    'value' => 0,
    'pesan' => 'Cek keranjang, 1 transaksi untuk 1 toko'
  );
}

echo json_encode($pesan);
