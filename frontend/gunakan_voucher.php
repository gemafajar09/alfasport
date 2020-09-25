<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$voucher_detail = $con->query("SELECT * FROM tb_voucher_detail WHERE voucher_detail_id='$_POST[voucher_detail]'")->fetchAll();

foreach ($voucher_detail as $t) {
  $voucher = $con->count('tb_voucher_detail', '*', ['member_id' => $_COOKIE["member_id"], 'voucher_detail_status[>]' => 1]);

  if ($voucher == TRUE) {

    $klaim = $con->update(
      "tb_voucher_detail",
      array(
        "voucher_detail_status" => 1,
      ),
      array(
        "voucher_detail_id" => $con->get("tb_voucher_detail", "voucher_detail_id", array("voucher_detail_status" => 2, "member_id" => $_COOKIE['member_id']))
      )
    );

    $klaim = $con->update(
      "cart",
      array(
        "voucher_detail_id" => $_POST['voucher_detail'],
      ),
      array(
        "id_user" => $_COOKIE['member_id']
      )
    );

    $klaim = $con->update(
      "tb_voucher_detail",
      array(
        "voucher_detail_status" => 2,
      ),
      array(
        "voucher_detail_id" => $_POST['voucher_detail']
      )
    );
  } else {
    $klaim = $con->update(
      "tb_voucher_detail",
      array(
        "voucher_detail_status" => 2,
      ),
      array(
        "voucher_detail_id" => $_POST['voucher_detail']
      )
    );

    $klaim = $con->update(
      "cart",
      array(
        "voucher_detail_id" => $_POST['voucher_detail'],
      ),
      array(
        "id_user" => $_COOKIE['member_id']
      )
    );
  }
}
