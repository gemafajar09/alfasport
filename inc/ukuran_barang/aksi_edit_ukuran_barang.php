<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_ukuran_barang", "*", array("ukuran_barang_id" => $_POST["ukuran_barang_id"]));

// $edit = $con->query("SELECT 
// (SELECT ukuran_baju_detail_nama FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'S') as s, 
// (SELECT ukuran_baju_detail_stok FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'S') as stok_s,

// (SELECT ukuran_baju_detail_nama FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'M') as m, 
// (SELECT ukuran_baju_detail_stok FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'M') as stok_m, 

// (SELECT ukuran_baju_detail_nama FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'L') as l, 
// (SELECT ukuran_baju_detail_stok FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'L') as stok_l, 

// (SELECT ukuran_baju_detail_nama FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'XL') as xl ,
// (SELECT ukuran_baju_detail_stok FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = :ukuran_baju_id AND ukuran_baju_detail_nama = 'XL') as stok_xl ,

// tb_ukuran_baju.*

// FROM tb_ukuran_baju 
// JOIN tb_ukuran_baju_detail ON tb_ukuran_baju.ukuran_baju_id = tb_ukuran_baju_detail.ukuran_baju_id 
// WHERE tb_ukuran_baju.ukuran_baju_id = :ukuran_baju_id", array('ukuran_baju_id' => $_POST['ukuran_baju_id']))->fetch();

echo json_encode($edit);
