<?php
session_start();
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$tgl_sekarang = date("Y-m-d");

$data = $con->query("SELECT
    tb_voucher.voucher_id,
    tb_voucher.voucher_nama,
    tb_voucher.voucher_harga,
    tb_voucher.voucher_jenis,
    IFNULL((SELECT member_id FROM tb_voucher_detail WHERE tb_voucher_detail.voucher_id = tb_voucher.voucher_id AND tb_voucher_detail.member_id = '$_COOKIE[member_id]' LIMIT 1), 0) AS status_klaim 
    From
    tb_voucher Inner Join
    tb_voucher_detail WHERE tb_voucher.voucher_tgl_akhir >= '$tgl_sekarang'
    AND tb_voucher.voucher_tgl_mulai <= '$tgl_sekarang' AND tb_voucher_detail.voucher_detail_status = 0 AND tb_voucher.voucher_id='$_POST[voucher]' GROUP BY tb_voucher.voucher_id")->fetch();

if ($data['status_klaim'] == 0) {
  // LAKUKAN PROSES UPDATE STATUS VOUCHER
  $klaim = $con->update(
    "tb_voucher_detail",
    array(
      "voucher_detail_status" => 1,
      "member_id" => $_COOKIE['member_id']
    ),
    array(
      "voucher_detail_id" => $con->get("tb_voucher_detail", "voucher_detail_id", array("voucher_detail_status" => 0, "voucher_id" => $_POST['voucher'], "member_id[!]" => $_COOKIE['member_id']))
    )
  );
}
