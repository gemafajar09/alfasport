<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_id,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                        tb_merk.merk_nama,
                        tb_gender.gender_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama
                    From
                        tb_gudang_kaos_kaki Inner Join
                        tb_merk On tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek Inner Join
                        tb_gender On tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender Inner Join
                        tb_kategori On tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori Inner Join
                        tb_divisi On tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi Inner Join
                        tb_subdivisi On tb_subdivisi.subdivisi_id = tb_gudang_kaos_kaki.id_subdivisi
                        WHERE 
                        tb_gudang_kaos_kaki.id_gender = '$_POST[gender]'
                        ")->fetchAll();

foreach ($data as $i => $a) {
    $modal = 'Rp' . number_format($a['gudang_kaos_kaki_modal']);
    $jual = 'Rp' . number_format($a['gudang_kaos_kaki_jual']);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['gudang_kaos_kaki_artikel'] ?></td>
        <td><?= $a['gudang_kaos_kaki_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $modal ?></td>
        <td><?= $jual ?></td>
        <td class="text-center">
            <button type="button" id="edit" onclick="edit('<?= $a['gudang_kaos_kaki_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="show('<?= $a['gudang_kaos_kaki_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['gudang_kaos_kaki_kode'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<script>

</script>