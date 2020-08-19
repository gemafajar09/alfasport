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
  }
} else {
  include "home.php";
}
