<?php
include "../../config/koneksi.php";
$data = $con->query('SELECT a.id, a.artikel, a.nama, a.id_gudang, a.modal, a.jual, b.merk_nama, c.gender_nama, d.kategori_nama, e.divisi_nama FROM tb_gudang a JOIN tb_merk b ON a.id_merek=b.merk_id JOIN tb_gender c ON a.id_gender=c.gender_id JOIN tb_kategori d ON a.id_kategori=d.kategori_id JOIN tb_divisi e ON a.id_divisi=e.divisi_id')->fetchAll();
foreach($data as $i => $a){
    $modal = 'Rp'.number_format($a['modal']);
    $jual = 'Rp'.number_format($a['jual']);
?>
<tr>
    <td><?= $i+1 ?></td>
    <td><?= $a['id'] ?></td>
    <td><?= $a['artikel'] ?></td>
    <td><?= $a['nama'] ?></td>
    <td><?= $a['merk_nama'] ?></td>
    <td><?= $a['kategori_nama'] ?></td>
    <td><?= $a['divisi_nama'] ?></td>
    <td></td>
    <td><?= $a['gender_nama'] ?></td>
    <td><?= $modal ?></td>
    <td><?= $jual ?></td>
    <!-- <td></td> -->
    <td class="text-center">
        <button type="button" onclick="edit()" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
        <button type="button" id="hapus" onclick="hapus('<?= $a['id_gudang'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        <button type="button" onclick="show('<?= $a['id_gudang'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
    </td>
</tr>
<?php } ?>