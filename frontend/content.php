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
  } elseif ($_GET['page'] == 'informasi_pribadi') {
    include "informasi_pribadi.php";
  } elseif ($_GET['page'] == 'password') {
    include "password.php";
  } elseif ($_GET['page'] == 'checkout') {
    include "checkout.php";
  } elseif ($_GET['page'] == 'login') {
    include "login.php";
  }
} else {
  include "home.php";
}
