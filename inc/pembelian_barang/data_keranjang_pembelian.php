<?php
include "../../config/koneksi.php";
session_start();
$data = $con->query("SELECT
                        tb_beli_tmp.beli_tmp_id,
                        tb_beli_tmp.beli_invoice,
                        tb_barang.barang_artikel,
                        tb_beli_tmp.beli_tmp_jml,
                        tb_satuan.satuan_nama,
                        tb_barang.barang_kategori
                    From
                    tb_beli_tmp Inner Join
                    tb_barang_detail On tb_barang_detail.barang_detail_id =
                            tb_beli_tmp.barang_detail_id Inner Join
                    tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                    tb_satuan On tb_satuan.satuan_id = tb_beli_tmp.satuan_id 
                    WHERE tb_beli_tmp.id_karyawan = '$_COOKIE[id_karyawan]'
                    ")->fetchAll();

$jumlah = 0;
foreach ($data as $i => $a) {
    $jumlah += $a['beli_tmp_jml'];
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_kategori'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['beli_tmp_jml'] ?></td>
        <td><?= $a['satuan_nama'] ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapusKeranjang('<?= $a['beli_tmp_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php
}
?>

<tr>
    <th colspan="2">&nbsp;</th>
    <th>Jumlah</th>
    <th><?= $jumlah ?></th>
    <th colspan="2">&nbsp;</th>
</tr>