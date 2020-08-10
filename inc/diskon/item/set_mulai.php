<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$edit = json_decode($json, true);
$id = $edit['id'];
$tanggal_mulai = $edit['tanggal_mulai'];
$tanggalberakhir = $edit['tanggal_berakhir']; 

?>