<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$edit = $con->query("SELECT a.id_stok_toko, a.jumlah as jml, b.*, c.nama_toko, d.*, e.merk_nama, f.kategori_nama, g.divisi_nama, h.subdivisi_nama, i.gender_nama FROM tb_stok_toko a JOIN tb_gudang b ON a.id_gudang=b.id_gudang JOIN toko c ON a.id_toko=c.id_toko JOIN tb_gudang_detail d ON a.id_gudang=d.id_gudang JOIN tb_merk e ON b.id_merek=e.merk_id JOIN tb_kategori f ON b.id_kategori=f.kategori_id JOIN tb_divisi g ON b.id_divisi=g.divisi_id JOIN tb_subdivisi h ON b.id_sub_divisi=h.subdivisi_id JOIN tb_gender i ON b.id_gender=i.gender_id WHERE a.id_stok_toko='$_POST[id]'")->fetch();
echo json_encode($edit);