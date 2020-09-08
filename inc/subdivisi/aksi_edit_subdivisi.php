<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->query("SELECT * FROM tb_subdivisi JOIN tb_divisi ON tb_divisi.divisi_id = tb_subdivisi.divisi_id 
JOIN tb_kategori ON tb_kategori.kategori_id = tb_divisi.kategori_id WHERE tb_subdivisi.subdivisi_id = '$_POST[subdivisi_id]'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($edit);
