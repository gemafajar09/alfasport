<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_gudang_lainnya.gudang_lainnya_id,
                        tb_gudang_lainnya.gudang_lainnya_kode,
                        tb_gudang_lainnya.gudang_lainnya_artikel,
                        tb_gudang_lainnya.gudang_lainnya_nama,
                        tb_gudang_lainnya.gudang_lainnya_modal,
                        tb_gudang_lainnya.gudang_lainnya_jual,
                        tb_merk.merk_nama,
                        tb_gender.gender_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama
                    FROM
                    tb_gudang_lainnya Left Join
                    tb_merk On tb_merk.merk_id = tb_gudang_lainnya.id_merek Left Join
                    tb_gender On tb_gender.gender_id = tb_gudang_lainnya.id_gender Left Join
                    tb_kategori On tb_kategori.kategori_id = tb_gudang_lainnya.id_kategori Left Join
                    tb_divisi On tb_divisi.divisi_id = tb_gudang_lainnya.id_divisi Left Join
                    tb_subdivisi On tb_subdivisi.subdivisi_id = tb_gudang_lainnya.id_subdivisi
                    WHERE tb_gudang_lainnya.id_merek = '$_POST[merek]'")->fetchAll();

foreach ($data as $i => $a) {
    $modal = 'Rp' . number_format($a['gudang_lainnya_modal']);
    $jual = 'Rp' . number_format($a['gudang_lainnya_jual']);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['gudang_lainnya_artikel'] ?></td>
        <td><?= $a['gudang_lainnya_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $modal ?></td>
        <td><?= $jual ?></td>
        <td class="text-center">
            <button type="button" id="edit" onclick="edit('<?= $a['gudang_lainnya_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="show('<?= $a['gudang_lainnya_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['gudang_lainnya_kode'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<script>

</script>