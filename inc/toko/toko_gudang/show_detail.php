<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$edit = $con->query("SELECT a.id_stok_toko,
a.jumlah,
a.tanggal,
b.id,
b.artikel,
b.nama,
b.modal,
b.jual,
c.nama_toko,
d.merk_nama,
e.kategori_nama,
f.divisi_nama,
g.subdivisi_nama,
h.gender_nama,
i.ue,
i.uk,
i.us,
i.cm
FROM tb_stok_toko a
JOIN tb_gudang b ON a.id_gudang=b.id_gudang
JOIN toko c ON a.id_toko=c.id_toko
JOIN tb_merk d ON b.id_merek=d.merk_id
JOIN tb_kategori e ON b.id_kategori=e.kategori_id
JOIN tb_divisi f ON b.id_divisi=f.divisi_id
JOIN tb_subdivisi g ON b.id_sub_divisi=g.subdivisi_id
JOIN tb_gender h ON b.id_gender=h.gender_id
JOIN tb_all_ukuran i ON a.id_ukuran=i.id_ukuran
WHERE a.id_stok_toko ='$_POST[id]'")->fetch();
echo json_encode($edit);