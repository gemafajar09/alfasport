<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$where = array('id_gudang' => $_POST['id']);
$edit = $con->query("SELECT a.id, a.artikel, a.nama, a.id_gudang, a.jumlah, a.modal, a.jual, b.merk_nama, c.gender_nama, d.kategori_nama, e.divisi_nama, f.subdivisi_nama, g.ue, g.uk, g.us, g.cm FROM tb_gudang a JOIN tb_merk b ON a.id_merek=b.merk_id JOIN tb_gender c ON a.id_gender=c.gender_id JOIN tb_kategori d ON a.id_kategori=d.kategori_id JOIN tb_divisi e ON a.id_divisi=e.divisi_id JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id JOIN tb_gudang_detail g ON a.id_gudang=g.id_gudang WHERE a.id_gudang='$_POST[id]'")->fetch();
echo json_encode($edit);