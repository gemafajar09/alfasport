<?php
include "../../../config/koneksi.php";
$data = $con->query("
SELECT a.id_stok_toko,
       a.jumlah,
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
       h.gender_nama
FROM tb_stok_toko a
JOIN tb_gudang b ON a.id_gudang=b.id_gudang
JOIN toko c ON a.id_toko=c.id_toko
JOIN tb_merk d ON b.id_merek=d.merk_id
JOIN tb_kategori e ON b.id_kategori=e.kategori_id
JOIN tb_divisi f ON b.id_divisi=f.divisi_id
JOIN tb_subdivisi g ON b.id_sub_divisi=g.subdivisi_id
JOIN tb_gender h ON b.id_gender=h.gender_id
")->fetchAll();
foreach($data as $i => $a){
?>
<tr>
    <td><?= $i+1 ?></td>
    <td><?= $a['nama_toko'] ?></td>
    <td><?= $a['id'] ?></td>
    <td><?= $a['nama'] ?></td>
    <td><?= $a['artikel'] ?></td>
    <td><?= $a['merk_nama'] ?></td>
    <td><?= $a['kategori_nama'] ?></td>
    <td><?= $a['divisi_nama'] ?></td>
    <td><?= $a['subdivisi_nama'] ?></td>
    <td><?= $a['gender_nama'] ?></td>
    <td><?= $a['jumlah'] ?></td>
    <td><?= $a['modal'] ?></td>
    <td><?= $a['jual'] ?></td>
    <td class="text-center">
        <button type="button" onclick="edit('<?= $a['id_stok_toko'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
        <button type="button" id="hapus" onclick="hapus('<?= $a['id_stok_toko'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        <button type="button" onclick="show('<?= $a['id_stok_toko'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
    </td>
</tr>
<?php } ?>