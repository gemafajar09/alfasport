<?php
include "../../config/koneksi.php";
session_start();
$data = $con->query("SELECT 
                        a.tmp_id, 
                        a.pembelian_no_invoice, 
                        c.artikel, 
                        a.tmp_jumlah, 
                        d.satuan_nama 
                    FROM tb_pembelian_tmp a 
                    JOIN tb_gudang_detail b ON a.id_gudang_detail = b.id_detail
                    JOIN tb_gudang c ON b.id = c.id
                    JOIN tb_satuan d ON a.satuan_id=d.satuan_id 
                    WHERE a.id_karyawan = '$_COOKIE[id_karyawan]'
                    ")->fetchAll();

$jumlah = 0;
foreach ($data as $i => $a) {
    $jumlah += $a['tmp_jumlah'];
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['tmp_jumlah'] ?></td>
        <td><?= $a['satuan_nama'] ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapusKeranjang('<?= $a['tmp_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<tr>
    <th colspan="2">Jumlah</th>
    <th><?= $jumlah ?></th>
    <th colspan="2">&nbsp;</th>
</tr>