<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT a.id_stok_toko, a.jumlah as jml, b.*, c.nama_toko, d.*, e.merk_nama, f.kategori_nama, g.divisi_nama, h.subdivisi_nama, i.gender_nama FROM tb_stok_toko a JOIN tb_gudang b ON a.id_gudang=b.id_gudang JOIN toko c ON a.id_toko=c.id_toko JOIN tb_gudang_detail d ON a.id_gudang=d.id_gudang JOIN tb_merk e ON b.id_merek=e.merk_id JOIN tb_kategori f ON b.id_kategori=f.kategori_id JOIN tb_divisi g ON b.id_divisi=g.divisi_id JOIN tb_subdivisi h ON b.id_sub_divisi=h.subdivisi_id JOIN tb_gender i ON b.id_gender=i.gender_id")->fetchAll();
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
    <td><?= $a['jml'] ?></td>
    <td><?= $a['modal'] ?></td>
    <td><?= $a['jual'] ?></td>
    <td></td>
    <td>
        <button type="button" onclick="edit('<?= $a['id_stok_toko'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
        <button type="button" id="hapus" onclick="hapus('<?= $a['id_stok_toko'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
    </td>
</tr>
<?php } ?>