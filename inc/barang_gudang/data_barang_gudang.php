<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_barang.barang_id,
                        tb_barang.barang_kode,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang.barang_modal,
                        tb_barang.barang_jual,
                        tb_gender.gender_nama,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama
                    From
                    tb_barang Inner Join
                    tb_gender On tb_gender.gender_id = tb_barang.gender_id Inner Join
                    tb_merk On tb_merk.merk_id = tb_barang.merk_id Inner Join
                    tb_kategori On tb_kategori.kategori_id = tb_barang.kategori_id Inner Join
                    tb_divisi On tb_divisi.divisi_id = tb_barang.divisi_id Inner Join
                    tb_subdivisi On tb_subdivisi.subdivisi_id = tb_barang.subdivisi_id")->fetchAll();

foreach ($data as $i => $a) {
    $modal = 'Rp' . number_format($a['barang_modal']);
    $jual = 'Rp' . number_format($a['barang_jual']);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_kategori'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $modal ?></td>
        <td><?= $jual ?></td>
        <td class="text-center">
            <button type="button" id="edit" onclick="edit('<?= $a['barang_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="detail('<?= $a['barang_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['barang_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<script>

</script>