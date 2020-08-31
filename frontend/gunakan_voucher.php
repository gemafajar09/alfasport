<?php
session_start();
if (!empty($_SESSION['voucher_id'])) {
  $voucher_tmp = json_decode($_SESSION['voucher_id']);
  $voucher_tmp[] = $_POST['voucher'];
  $_SESSION['voucher_id'] = json_encode($voucher_tmp);
} else {
  $_SESSION['voucher_id'] = json_encode(array($_POST['voucher']));
}

echo json_encode(array(
  "status" => true,
  "error" => ""
));
