<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'home') {
    include "home.php";
  } elseif ($_GET['page'] == 'product') {
    include "product.php";
  } elseif ($_GET['page'] == 'cart') {
    include "shopping_cart.php";
  } elseif ($_GET['page'] == 'whistlist') {
    include "whistlist.php";
  } elseif ($_GET['page'] == 'product_toko') {
    include "product_toko.php";
  } elseif ($_GET['page'] == 'daftar') {
    include "daftar.php";
  } elseif ($_GET['page'] == 'account') {
    include "account.php";
  } elseif ($_GET['page'] == 'password') {
    include "password.php";
  } elseif ($_GET['page'] == 'checkout') {
    include "checkout.php";
  } elseif ($_GET['page'] == 'alamat') {
    include "alamat.php";
  } elseif ($_GET['page'] == 'voucher') {
    include "voucher.php";
  } elseif ($_GET['page'] == 'tampil_transaksi') {
    include "tampil_transaksi.php";
  } elseif ($_GET['page'] == 'detail_order') {
    include "detail_order.php";
  } elseif ($_GET['page'] == 'order_history') {
    include "order_history.php";
  } elseif ($_GET['page'] == 'konfirmasi_pembayaran') {
    include "konfirmasi_pembayaran.php";
  } elseif ($_GET['page'] == 'login') {
    include "login.php";
  }
} else {
  include "home.php";
}
